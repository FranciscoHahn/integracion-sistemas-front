<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;

class Transbank extends Controller {

    public function init() {

        $data = [
            "buy_order" => "ordenCompra12345678",
            "session_id" => "sesion1234557545",
            "amount" => 10000,
            "return_url" => "http://192.168.116.135/front-inte-plataformas/public/transbank-retorno"
        ];

        echo json_encode($data);

        $respuesta = $this->respuestaTransbank(json_encode($data), "POST", "/rswebpaytransaction/api/webpay/v1.2/transactions");
        Session::put("token-tb", $respuesta->token);

        return view('pages.totransbank', compact('respuesta'));


        //echo json_encode($respuesta);
    }

    function respuestaTransbank($data, $method, $endpoint) {
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

    public function returnFromTransbank(Request $request) {
        $token_respuesta = $request->get('token_ws');
        $token = Session::get("token-tb");
        $method = 'PUT';
        $type = 'sandbox';
        $endpoint = '/rswebpaytransaction/api/webpay/v1.2/transactions/' . $token_respuesta;

        $response = $this->respuestaTransbank('', $method, $endpoint);

        echo dd($response);
        echo "hello";
    }

}
