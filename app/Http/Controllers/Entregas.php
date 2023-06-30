<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Entregas extends Controller
{

    public function entregas()
    {
        $response_entregas = $this->consumeApi('listar-ventas', array('token' => Session::get('token')));
        $ventas = $response_entregas->data;
        $response_estados_entregas = $this->consumeApi('estados-entrega', array('token' => Session::get('token')));
        $estados = $response_estados_entregas->data;

        return view('ventas.ventas', compact('ventas', 'estados'));
    }

    public function detalleventas(Request $request, $id)
    {
        $response_entrega = $this->consumeApi('detalle-venta', array('token' => Session::get('token'), 'id_venta' => $id));
        $venta = $response_entrega->data->detalle_venta;
        $response_estados_entregas = $this->consumeApi('estados-entrega', array('token' => Session::get('token')));
        $estados = $response_estados_entregas->data;
        $venta_data = $this->consumeApi('datos-venta', array('token' => Session::get('token'), 'id_venta' => $id));

        $data_venta = $venta_data->data->datos_venta;
        return view('ventas.detalleventa', compact('venta', 'estados', 'data_venta'));
    }

    public function cambiarestadoentrega(Request $request)
    {
        $send = $request->post();
        $send['token'] = Session::get('token');
        $response_venta = $this->consumeApi('modificar-estados-venta', $send);
        return redirect()->route('detalleventas', ['id' => $request->post('id_venta')]);
    }



    public function consumeApi($endpoint, $data)
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

    public function reporteventas()
    {
        $response_entregas = $this->consumeApi('listar-ventas', array('token' => Session::get('token')));
  
        $ventas = $response_entregas->data;
        $response_estados_entregas = $this->consumeApi('estados-entrega', array('token' => Session::get('token')));
        $estados = $response_estados_entregas->data;

        return view('ventas.reporteventas', compact('ventas', 'estados'));
    }
}
