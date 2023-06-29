<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Transbank extends Controller
{

    public function init()
    {

        $data_compra = Session::get("datacompra");
        $compraid = uniqid();
        $crear_venta = json_decode($this->consumeApi(array('token' => Session::get("token"), 'forma_retiro' => $data_compra["tipo_entrega"], 'direccion_despacho' => $data_compra["domicilio"]), 'crear-venta'), true);

        if ($crear_venta["http_status_code"] <> 200) {
            return $this->resumenCompra($crear_venta["message"]);
        }
        $id_venta = $crear_venta["data"]["insert_id"];
        Session::put("id_venta", $id_venta);

        $data = [
            "buy_order" => $id_venta . "oc" . $compraid,
            "session_id" => $id_venta . "sid" . $compraid,
            "amount" => $data_compra["total"],
            "return_url" => route('transbank-retorno')
        ];

        $respuesta = $this->respuestaTransbank(json_encode($data), "POST", "/rswebpaytransaction/api/webpay/v1.2/transactions");
        Session::put("token-tb", $respuesta->token);

        return view('pages.totransbank', compact('respuesta'));
    }

    function respuestaTransbank($data, $method, $endpoint)
    {
        $curl = curl_init();
        //testing data & endpoint
        $TbkApiKeyId = '597055555532';
        $TbkApiKeySecret = '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C';
        $url = "https://webpay3gint.transbank.cl" . $endpoint;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Tbk-Api-Key-Id: ' . $TbkApiKeyId . '',
                'Tbk-Api-Key-Secret: ' . $TbkApiKeySecret . '',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function returnFromTransbank(Request $request)
    {
        $token_respuesta = $request->get('token_ws');
        $token = Session::get("token-tb");
        $method = 'PUT';
        $type = 'sandbox';
        $endpoint = '/rswebpaytransaction/api/webpay/v1.2/transactions/' . $token_respuesta;

        $response = $this->respuestaTransbank('', $method, $endpoint);
        //dd($response);
        //dd($response);
        $data = array();
        if ($response->status == "AUTHORIZED") {
            $data_compra = Session::get("compra");
            $data["token"] = Session::get("token");
            $data["id_venta"] = Session::get("id_venta");
            $data["forma_pago"] = $response->payment_type_code == "VD" ? "Debito" : "Credito";
            $data["estado_pago"] = "Pagada";
            $data["estado_entrega"] = "En preparación";
            $response_entrega = $this->consumeApiobj('detalle-venta', array('token' => Session::get('token'), 'id_venta' => $data["id_venta"]));
            $venta = $response_entrega->data->detalle_venta;
            $response_estados_entregas = $this->consumeApiobj('estados-entrega', array('token' => Session::get('token')));
            $estados = $response_estados_entregas->data;
            $venta_data = $this->consumeApiobj('datos-venta', array('token' => Session::get('token'), 'id_venta' => $data["id_venta"]));
            $data_venta = $venta_data->data->datos_venta;
            if ($data_venta->estado_pago <> 'Pagada') {
                foreach ($data_compra as $compra) {
                    $responsea = $this->consumeApi(array("token" => Session::get("token"), "id_instrumento" => $compra["id"], "cantidad" => $compra["cantidad"], "id_venta" => Session::get("id_venta")), 'agregar-producto-venta');
                }
                $response = $this->consumeApi($data, 'modificar-estados-venta');
            }
            
        }

        $response_entrega = $this->consumeApiobj('detalle-venta', array('token' => Session::get('token'), 'id_venta' => $data["id_venta"]));
        $venta = $response_entrega->data->detalle_venta;
        $response_estados_entregas = $this->consumeApiobj('estados-entrega', array('token' => Session::get('token')));
        $estados = $response_estados_entregas->data;
        $venta_data = $this->consumeApiobj('datos-venta', array('token' => Session::get('token'), 'id_venta' => $data["id_venta"]));

        $data_venta = $venta_data->data->datos_venta;
        return view('pages.returnfromtransbank', compact('data', 'data_venta', 'venta'));
    }

    public function consumeApi($data, $endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('API_CI_RUTA') . '/' . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function consumeApiobj($endpoint, $data): object
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('API_CI_RUTA') . '/' . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, false);
    }

    public function resumenCompra($mensaje = null)
    {
        $compra = Session::get('compra');
        $catalogo = json_decode($this->consumeApi(array('token' => Session::get('token')), 'listar-instrumentos'));
        $catalogo = $catalogo->data;
        //echo json_encode($catalogo);
        $resumen_compra = [];

        foreach ($catalogo as $producto) {
            foreach ($compra as $compraproducto) {
                if ($producto->id == $compraproducto["id"]) {
                    $producto->cantidad = $compraproducto["cantidad"];
                    $resumen_compra[] = $producto;
                }
            }
        }
        if ($mensaje == null) {
            return view('pages.resumencompra', compact('resumen_compra'));
        } else {
            return view('pages.resumencompra', compact('resumen_compra', 'mensaje'));
        }
    }

    public function catalogo($mensaje = null)
    {
        //listar-instrumentos
        if (Session::get('token') == null) {
            return $this->redirNoLog();
        }
        Session::put("compra");
        $response = json_decode($this->consumeApi(array('token' => Session::get('token')), 'listar-instrumentos'), true);
        $data = $response["data"];
        if ($mensaje) {
            return View('pages.catalogo', compact('data', 'mensaje'));
        } else {
            return View('pages.catalogo', compact('data'));
        }
    }

    public function printvoucher(Request $request, $id){
        $response_entrega = $this->consumeApiobj('detalle-venta', array('token' => Session::get('token'), 'id_venta' => $id));
        $venta = $response_entrega->data->detalle_venta;
        $response_estados_entregas = $this->consumeApiobj('estados-entrega', array('token' => Session::get('token')));
        $estados = $response_estados_entregas->data;
        $venta_data = $this->consumeApiobj('datos-venta', array('token' => Session::get('token'), 'id_venta' => $id));
        $data_venta = $venta_data->data->datos_venta;
        $total = 0;
        foreach($venta as $instrumento){
            $total = $total + $instrumento->subtotal;
        }
        return view('ventas.printvoucher', compact('data_venta', 'venta', 'total'));
    }
}
