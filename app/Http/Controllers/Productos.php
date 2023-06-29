<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Productos extends Controller
{

    public function crearproducto()
    {
        $respose_categoria = $this->consumeApi('listar-categorias', array('token' => Session::get('token')));
        $categorias = $respose_categoria->data;
        return view('productos.crearproducto', compact('categorias'));
    }


    public function creandoproducto(Request $request)
    {
        $send = $request->post();
        $send['token'] = Session::get('token');

        $mensaje = null;
        //dd($send);
        $response_insert = $this->consumeApi('insertar-instrumento', $send);
        $errores = null;
        if ($response_insert->http_status_code == 200) {
            $mensaje = $response_insert->message;
            return redirect()->route('admin-instrumentos');
        } else {
            $mensaje = $response_insert->message;
            $errores = [];
            $respose_categoria = $this->consumeApi('listar-categorias', array('token' => Session::get('token')));
            $categorias = $respose_categoria->data;
            return view('productos.crearproducto', compact('categorias', 'mensaje', 'errores'));
        }
    }


    public function modificarproducto(Request $request, $id)
    {
        //actualizar-instrumento
        //obtener-instrumento-por-id
        $response_categoria = $this->consumeApi('listar-categorias', array('token' => Session::get('token')));
        $response_instrumento = $this->consumeApi('obtener-instrumento-por-id', array('token' => Session::get('token'), 'instrumento_id' => $id));
        $instrumento = $response_instrumento->data;
        $categorias = $response_categoria->data;
        return view('productos.modproducto', compact('instrumento', 'categorias'));

    }

    public function modificandoproducto(Request $request){
        //actualizar-instrumento
        $send = $request->post();
        $send['token'] = Session::get('token');
        $response_mod = $this->consumeApi('actualizar-instrumento', $send);
        $mensage = null;
        $errores = [];
        if($response_mod->http_status_code <> 200){
            $mensaje = $response_mod->mensaje;
            $response_categoria = $this->consumeApi('listar-categorias', array('token' => Session::get('token')));
            $response_instrumento = $this->consumeApi('obtener-instrumento-por-id', array('token' => Session::get('token'), 'instrumento_id' => $request->post('instrumento_id')));
            $instrumento = $response_instrumento->data;
            $categorias = $response_categoria->data;
            return view('productos.modproducto', compact('instrumento', 'categorias', 'mensaje', 'errores'));
        } else {
            return redirect()->route('admin-instrumentos');
        }

    }

    public function activarproducto(Request $request, $id)
    {
        //activar-instrumento
        $this->consumeApi('activar-instrumento', array('token' => Session::get('token'), 'instrumento_id' => $id));
        return redirect()->route('admin-instrumentos');
    }

    public function desactivarproducto(Request $request, $id)
    {
        // desactivar-instrumento
        $this->consumeApi('desactivar-instrumento', array('token' => Session::get('token'), 'instrumento_id' => $id));
        return redirect()->route('admin-instrumentos');
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
