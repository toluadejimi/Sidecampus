<?php

use App\Models\Setting;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;





function send_notification($message)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.telegram.org/bot6140179825:AAGfAmHK6JQTLegsdpnaklnhBZ4qA1m2c64/sendMessage?chat_id=1316552414',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'chat_id' => "1316552414",
            'text' => $message,

        ),
        CURLOPT_HTTPHEADER => array(),
    ));

    $var = curl_exec($curl);
    curl_close($curl);

    $var = json_decode($var);
}




function pay_pal_token()
{


    $paypal_clinet = Setting::where('id', 1)->first()->paypal_clinet;
    $paypal_s = Setting::where('id', 1)->first()->paypal_s;




    $clientId = base64_encode($paypal_clinet);
    $clientSecret = base64_encode($paypal_s);

    $apiUrl = "https://api-m.sandbox.paypal.com/v1/oauth2/token";
    $credentials = "$clientId:$clientSecret";

    $data = [
        'grant_type' => 'client_credentials',
    ];

    $options = [
        CURLOPT_URL => $apiUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $credentials,
        ],
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);

    $var = curl_exec($ch);

    $var = json_decode($var);
    curl_close($ch);

    return $var->access_token;
}


function paypal_pay()
{

        $token = pay_pal_token();
        $trxID = "SIDE-" . date('ymd-his');
        $user_id = Auth::id();

        $cost = Plan::where('id', 1)->first()->amount ?? null;

        $url = url('');

        $curl = curl_init();
        $data = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "$trxID",
                "amount" => [
                    "value" => $cost,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => "$url/cancel?status=false&ref=$trxID",
                "return_url" => "$url/success?status=true&ref=$trxID&amount=$cost&user_id=$user_id"
            ]
        ];

        $post_data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v2/checkout/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "Authorization:Bearer" . " " . $token,
                'Content-Type: application/json',
            ),
        ));


        $var = curl_exec($curl);

        curl_close($curl);

        $var = json_decode($var);
        $link = $var->links[1]->href ?? null;
        $query = parse_url($link, PHP_URL_QUERY);
        parse_str($query, $query_params);
        $token = $query_params['token'];




        $body = $link;


        $trx = new Transaction();
        $trx->trx_id = $trxID;
        $trx->user_id = Auth::id();
        $trx->amount = $cost;
        $trx->status = 3; //initiated;
        $trx->type = 2; //credit
        $trx->token = $token;
        $trx->save();




        if ($link != null) {
            return  $body;
        } else {
            return null;
        }
    }


    function stripe_pay(){

        $cost = Plan::where('id', 1)->first()->amount ?? null;

        $email = Auth::user()->email;
        $id = Auth::user()->id;
        $body = url('') . "/stripe?amount=$cost&email=$email&id=$id";

        return $body;

    }




