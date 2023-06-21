<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Usuarios extends Controller
{

    public function registrarusuario()
    {
        $response_perfiles = $this->consumeApi('listar-perfiles', array('token' => Session::get('token')));
        $perfiles = $response_perfiles->data->perfiles;
        return view('pages.administrador-crearusuario', compact('perfiles'));
    }

    public function registrandousuario(Request $request)
    {
        $mensaje = "";
        $errores = [];
        $data = array(
            'token' => Session::get('token'),
            'apellidos' => $request->post('apellidos'),
            'nombres' => $request->post('nombres'),
            'password' => $request->post('password1'),
            'email' => $request->post('email'),
            'direccion' => $request->post('direccion'),
            'id_perfil' => $request->post('perfil_id'),
            'nombreusuario' => $request->post('nombreusuario'),
            'rut' => $request->post('rut')
        );

        //dd($data);
        if ($request->post('password1') <> $request->post('password2')) {
            $mensaje = 'Contraseña distinta';
        } else {
            $response_registro = $this->consumeApi('insertar-usuario', $data);
            if ($response_registro->http_status_code <> 200) {
                $mensaje = $response_registro->message;
            }
        }

        $response_perfiles = $this->consumeApi('listar-perfiles', array('token' => Session::get('token')));
        $perfiles = $response_perfiles->data->perfiles;
        if($mensaje == "inputs con errores"){
            foreach($response_registro->data->errores as $error){
                $errores[] = $error->msg;
            }
        }

        return view('pages.administrador-crearusuario', compact('perfiles', 'data', 'mensaje', 'errores'));
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
}
