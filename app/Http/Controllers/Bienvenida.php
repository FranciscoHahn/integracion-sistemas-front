<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Bienvenida extends Controller {

    public function login(Request $request) {
        $email = $request->post('email');
        $password = $request->post('password');

        $response = json_decode($this->consumeApi(array('email' => $email, 'password' => $password), 'autenticar-cliente'), true);
        if ($response['status'] == 'success') {
            Session::put('token', $response['data']['token']);
            //echo $response['data']['token'];
            return redirect("/catalogo");
        } else {
            $mensaje_error = $response["message"];
            return View('pages.login', compact('mensaje_error'));
        }
    }

    public function catalogo() {
        //listar-instrumentos
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

}
