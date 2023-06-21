<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Interno extends Controller {

    public function login(Request $request) {

        if (Session::get('token') != null && Session::get('perfil') <> 'Cliente') {
            return redirect('interno-ini');
        }


        $email = $request->post('email');
        $password = $request->post('password');

        $response = json_decode($this->consumeApi(array('email' => $email, 'password' => $password), 'auth-email'));
        if ($response->status == 'success') {
            //dd($response);
            Session::put("data_usuario", $response->data->datos_usuario);
            Session::put('token', $response->data->token);
            Session::put('perfil', $response->data->datos_usuario->perfil_nombre);
            return redirect('interno-ini');
        } else {
            $mensaje_error = $response->message;
            return View('pages.logininterno', compact('mensaje_error'));
        }
    }

    public function welcomeinterno() {
        return view('pages.welcomeinterno');
    }

    public function adminUsuarios() {
        $response = json_decode($this->consumeApi(array('token' => Session::get('token')), 'listar-usuarios'));
        $usuarios = $response->data->usuarios;
        return view('pages.administrador-adminusuarios', compact('usuarios'));
    }

    public function adminProductos() {
        $response = json_decode($this->consumeApi(array('token' => Session::get('token')), 'listar-instrumentos'));
        $instrumentos = $response->data;
        return view('pages.administrador-adminproductos', compact('instrumentos'));
    }

    public function adminClientes() {
        $response = json_decode($this->consumeApi(array('token' => Session::get('token')), 'obtener-clientes'));
        $clientes = $response->data;
        return view('pages.administrador-adminclientes', compact('clientes'));
    }
    
    public function crearusuario(Request $request){
        dd($request->post());
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

}
