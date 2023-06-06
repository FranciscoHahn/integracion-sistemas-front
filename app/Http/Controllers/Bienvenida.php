<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Bienvenida extends Controller {

    public function redirNoLog() {
        $mensaje_error = 'Sesión no iniciada';
        return View('pages.login', compact('mensaje_error'));
    }

    public function login(Request $request) {
        if (Session::get("token") != null) {
            return redirect("/catalogo");
        }


        Session::forget("compra");
        $email = $request->post('email');
        $password = $request->post('password');

        $response = json_decode($this->consumeApi(array('email' => $email, 'password' => $password), 'autenticar-cliente'), true);
        if ($response['status'] == 'success') {
            Session::put('token', $response['data']['token']);
            Session::put("data_cliente", $response["data"]["data_cliente"]);
            Session::put("perfil", $response["data"]["data_cliente"]["perfil_nombre"]);
            return redirect("/catalogo");
        } else {
            $mensaje_error = $response["message"];
            return View('pages.login', compact('mensaje_error'));
        }
    }

    public function catalogo() {
        //listar-instrumentos
        if (Session::get('token') == null) {
            return $this->redirNoLog();
        }
        Session::put("compra");
        $response = json_decode($this->consumeApi(array('token' => Session::get('token')), 'listar-instrumentos'), true);
        $data = $response["data"];
        return View('pages.catalogo', compact('data'));
    }

    public function consumeApi($data, $endpoint) {
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

    public function formRegistro() {
        return View('pages.formregistro');
    }

    public function processRegistro(Request $request) {
        $mensaje = null;
        if ($request->post('password1') <> $request->post('password2')) {
            $mensaje = 'Error al repetir contraseña';
            return View('pages.formregistro', compact('mensaje'));
        }

        $data = array(
            'email' => $request->post('email'),
            'nombre' => $request->post('nombre'),
            'apellido' => $request->post('apellido'),
            'telefono' => $request->post('telefono'),
            'password' => $request->post('password1')
        );
        $response = json_decode($this->consumeApi($data, 'agregar-cliente'), true);

        if ($response["http_status_code"] != '200') {
            $mensaje = $response["message"];
            return View('pages.formregistro', compact('mensaje'));
        } else {
            $mensaje_registro = "Registro finalizado";
            return View('pages.login', compact('mensaje_registro'));
        }
    }

    public function agregarArticuloAVenta(Request $request) {
        $carro = Session::get("compra");
        $newcarro = [];
        $cantidad = 0;
        if ($carro == null) {
            $newcarro[] = $request->post();
            $cantidad = $cantidad + $request->post("cantidad");
        } else {
            $found = false;
            foreach ($carro as $detalle) {
                if ($detalle["id"] == $request->post("id")) {
                    $newcarro[] = ["id" => $request->post("id"), "cantidad" => $request->post("cantidad")];
                    $found = true;
                    $cantidad = $cantidad + $request->post("cantidad");
                } else {
                    $newcarro[] = $detalle;
                    $cantidad = $cantidad + $detalle["cantidad"];
                }
            }

            if (!$found) {
                $newcarro[] = ["id" => $request->post("id"), "cantidad" => $request->post("cantidad")];
                $cantidad = $cantidad + $request->post("cantidad");
            }
        }
        Session::forget("compra");
        Session::put("compra", $newcarro);


        echo $cantidad;
    }

    public function resumenCompra($mensaje = null) {
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

    public function comprarProcess(Request $request) {


        if ($request->post('tipo_entrega') == 'domicilio' && ($request->post('domicilio') == "" || $request->post('domicilio') == null)) {
            return $this->resumenCompra("Indique su domicilio");
        } else {
            $retiro = null;
            if ($request->post('tipo_entrega') == 'domicilio') {
                $retiro = "A domicilio";
            } else {
                $retiro = "En tienda";
            }
            $data = array(
                "tipo_entrega" => $retiro,
                "domicilio" => $request->post('domicilio'),
                "total" => $request->post("total_compra")
            );
            Session::put("datacompra", $data);
            return redirect('/transbank-init');
        }
    }

    public function misCompras() {
        //echo json_encode(Session::all());
        $data = array(
            'token' => Session::get("token")
        );
        $response = json_decode($this->consumeApi($data, 'listar-ventas'));
        $ventas_cliente = [];
        $id_cliente = Session::get("data_cliente")["id_cliente"];
        foreach ($response->data as $venta) {
            if ($venta->cliente_id == $id_cliente) {             
                $detalleventa = json_decode($this->consumeApi(array('token' => Session::get('token'), 'id_venta' => $venta->id), 'detalle-venta'));
                if ($detalleventa->data != null) {
                    $venta->detalle = $detalleventa->data->detalle_venta;
                    $ventas_cliente[] = $venta;
                    //echo json_encode($venta) . "<br/><br/>" . "<br/><br/>" . "<br/><br/>" . "<br/><br/>";
                } 
                
            }
        }

        return view('pages.ventascliente', compact('ventas_cliente'));
    }

}
