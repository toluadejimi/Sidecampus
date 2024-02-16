<?php

namespace App\Http\Controllers;

use Stripe;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\MyPlan;
use App\Models\Setting;
use GuzzleHttp\Client;
use App\Models\PayInfo;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class PaymentController extends Controller
{

    public function create_order(request $request)
    {

        if ($request->vendor == 'pay_pal') {
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


            // $trx = new Transaction();
            // $trx->trx_id = $trxID;
            // $trx->user_id = Auth::id();
            // $trx->amount = $cost;
            // $trx->status = 3; //initiated;
            // $trx->type = 2; //credit
            // $trx->token = $token;
            // $trx->save();




            if ($link != null) {

                return response()->json([
                    'status' => true,
                    'data' => $body,
                ], 200);
            } else {


                return response()->json([
                    'status' => false,
                    'message' => "Something Went Wrong",
                ], 500);
            }
        }

        if ($request->vendor == "stripe") {


            $cost = Plan::where('id', 1)->first()->amount ?? null;

            $email = Auth::user()->email;
            $id = Auth::user()->id;
            $body = "https://sidecampus.com/stripe?amount=$cost&email=$email&id=$id";



            return response()->json([
                'status' => true,
                'data' => $body,
            ], 200);
        }
    }



    public function pay_with_saved_cards(request $request)
    {

        try {

            $stripe_key = Setting::where('id', 1)->first()->stripe_s;
            \Stripe\Stripe::setApiKey($stripe_key);

            $customerId = $request->customer_id;

            $stripe = \Stripe\Charge::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'customer' => $customerId,
                'description' => 'Charge for Subscription',
            ]);


            $status = $stripe->status ?? null;


            if ($status == 'succeeded') {


                $amount = Plan::where('id', 1)->first()->amount ?? null;
                $user_id = User::where('id', Auth::id())->first()->id;

                $currentDate = Carbon::now();
                $expirationDate = $currentDate->addMonth();


                $currentDateFormatted = $currentDate->toDateString();
                $expirationDateFormatted = $expirationDate->toDateString();


                //dd($currentDateFormatted, $expirationDateFormatted);

                $plan = new MyPlan();
                $plan->user_id = $user_id;
                $plan->subscribe_at = date('Y-m-d');
                $plan->expires_at = $expirationDateFormatted;
                $plan->days_remaining = 0;
                $plan->status = 1;
                $plan->amount = $amount;
                $plan->save();



                $ref = "FUND" . random_int(0000, 9999) . date("his");
                $amount = $request->amount;


                $trx = new Transaction();
                $trx->type = 1;
                $trx->amount = $amount;
                $trx->status = 1;
                $trx->save();


                return response()->json([
                    'status' => true,
                    'message' => "Payment completed"
                ], 200);


            } else {

                return response()->json([
                    'status' => false,
                    'message' => "Payment Declined"
                ], 500);
            }
        } catch (\Exception $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }





    public function charge(request $request)
    {

        $stripe_key = Setting::where('id', 1)->first()->stripe_s;
        \Stripe\Stripe::setApiKey($stripe_key);
        $cost = Plan::where('id', 1)->first()->amount;
        $tok = $request->stripeToken;
        $final = str_replace(" ", "", $tok);


        try {


            if ($request->save_payinfo == 'on') {

                $customer = \Stripe\Customer::create([
                    'source' => $tok,
                    'email' => $request->email,
                ]);


                $stripe = \Stripe\Charge::create([
                    'amount' => $cost * 100,
                    'currency' => 'usd',
                    'customer' => $customer->id,
                ]);


                $ck = PayInfo::where("last4", $stripe->source->last4)->first()->last4 ?? null;

                if($ck != $stripe->source->last4){


                $pay = new PayInfo();
                $pay->user_id = $request->id;
                $pay->customer_id = $customer->id;
                $pay->name = $request->name_on_card;
                $pay->brand = $stripe->source->brand;
                $pay->last4 = $stripe->source->last4;
                $pay->exp_month = $stripe->source->exp_month;
                $pay->exp_year = $stripe->source->exp_year;
                $pay->save();



                }



                $status = $stripe->status ?? null;

                if ($status == 'succeeded') {

                    $amount = Plan::where('id', 1)->first()->amount ?? null;
                    $user_id = User::where('email', $request->email)->first()->id;

                    $currentDate = Carbon::now();
                    $expirationDate = $currentDate->addMonth();

                    $currentDateFormatted = $currentDate->toDateString();
                    $expirationDateFormatted = $expirationDate->toDateString();

                    //dd($currentDateFormatted, $expirationDateFormatted);

                    $plan = new MyPlan();
                    $plan->user_id = $user_id;
                    $plan->subscribe_at = date('Y-m-d');
                    $plan->expires_at = $expirationDateFormatted;
                    $plan->days_remaining = 0;
                    $plan->status = 1;
                    $plan->amount = $amount;
                    $plan->save();

                    Transaction::where('trx_id', $request->trx)->update(['status'=> 1]);


                    $amount = $request->amount;

                    return view('success', compact('ref', 'amount'));
                } else {
                    return view('decline', compact('ref', 'amount'));
                }
            }




            $stripe = \Stripe\Charge::create([
                'amount' => $cost * 100,
                'currency' => 'usd',
                'source' => $tok,
                'description' => 'Charge for Subscription',
            ]);




            $status = $stripe->status ?? null;

            if ($status == 'succeeded') {

                $amount = Plan::where('id', 1)->first()->amount ?? null;
                $user_id = User::where('email', $request->email)->first()->id;

                $currentDate = Carbon::now();
                $expirationDate = $currentDate->addMonth();


                $currentDateFormatted = $currentDate->toDateString();
                $expirationDateFormatted = $expirationDate->toDateString();


                //dd($currentDateFormatted, $expirationDateFormatted);

                $plan = new MyPlan();
                $plan->user_id = $user_id;
                $plan->subscribe_at = date('Y-m-d');
                $plan->expires_at = $expirationDateFormatted;
                $plan->days_remaining = 0;
                $plan->status = 1;
                $plan->amount = $amount;
                $plan->save();


                $ref = $request->trx;
                $amount = $request->amount;

                return view('success', compact('ref', 'amount'));


            } else {
                return view('decline', compact('ref', 'amount'));
            }


        } catch (\Exception $th) {

            return back()->with('error', $th->getMessage());
        }
    }



    public function success(request $request)
    {


        $parametersJson = json_encode($request->all());
        send_notification($parametersJson);

        



        // if ($request->trx == null || $request->amount == null) {
        //     $ref = "FUND" . random_int(0000, 9999) . date("his");
        // } else {
        //     $ref = $request->trx;
        //     $amount = Plan::where('id', 1)->first()->amount ?? null;
        // }

        // $amount = Plan::where('id', 1)->first()->amount ?? null;

        // $currentDate = Carbon::now();
        // $expirationDate = $currentDate->addMonth();
        // $currentDateFormatted = $currentDate->toDateString();
        // $expirationDateFormatted = $expirationDate->toDateString();

        // $plan = new MyPlan();
        // $plan->user_id = $request->user_id;
        // $plan->subscribe_at = date('Y-m-d');
        // $plan->expires_at = $expirationDateFormatted;
        // $plan->days_remaining = 0;
        // $plan->status = 1;
        // $plan->amount = $amount;
        // $plan->save();



        return view('success', compact('ref', 'amount'));
    }


    public function decline()
    {
        $ref = "FUND" . random_int(0000, 9999) . date("his");
        return view('decline', compact('ref'));
    }

    public function processing()
    {

        $ref = "FUND" . random_int(0000, 9999) . date("his");
        return view('processing', compact('ref'));
    }


    public function stripe(request $request)
    {
        $amount = $request->amount;
        $email = $request->email;
        $id = $request->id;
        $trx = $request->trx;



        //$save_cards =


        return view('stripe', compact('amount', 'email', 'id', 'trx'));
    }






    public function verify_payment(request $request)
    {

        if ($request->status == 'true') {

            $token = pay_pal_token();
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api-m.sandbox.paypal.com/v2/checkout/orders/$request->order_token/capture",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => array(
                    "Authorization:Bearer" . " " . $token,
                    'Content-Type: application/json',
                ),
            ));

            $var = curl_exec($curl);

            curl_close($curl);

            $var = json_decode($var);


            $ss = $var->status ?? null;
            $status = $var->details[0]->issue ?? null;
            $amount = $var->purchase_units[0]->payments->captures[0]->amount->value ?? null;
            $order_amount = (int)$amount;




            if ($ss == "COMPLETED") {

                $user_id = User::where('email', $request->email)->first()->id;
                $currentDate = Carbon::tomorrow();
                $expirationDate = $currentDate->addMonth();
                $currentDateFormatted = $currentDate->toDateString();
                $expirationDateFormatted = $expirationDate->toDateString();


                $plan = new MyPlan();
                $plan->user_id = $user_id;
                $plan->subscribe_at = Carbon::now();
                $plan->expired_at = $expirationDateFormatted;
                $plan->days_remaining = 0;
                $plan->amount = $order_amount;
                $plan->save();

                $amount = $order_amount;
                $ref = random_int(0000, 9999);
                return view('success', compact('ref', 'amount'));
            } else {

                $amount = Plan::where('id', 1)->first()->amount ?? null;
                $ref = random_int(0000, 9999);
                return view('decline', compact('ref', 'amount'));
            }
        }


        if ($request->status == 'false') {

            $amount = Plan::where('id', 1)->first()->amount ?? null;
            $ref = random_int(0000, 9999);
            return view('decline', compact('ref', 'amount'));
        }
    }





    public function payment_decline(request $request)
    {

        $ss = $request->status;

        if ($ss == "false") {

            Transaction::where('token', $request->token)->update([
                'status' => 4
            ]);

            $data = "Your payment was not processed, try again";
            $order_token = $request->token;
            $status = $request->status;

            return view('decline', compact('data', 'order_token', 'status'));
        } else {


            return response()->json([
                'status' => false,
                'message' => "Something Went Wrong",
            ], 500);
        }
    }




    public function return(request $request)
    {

        $data = "Payment processing...";
        $order_token = $request->token;
        $status = $request->status;


        return view('success', compact('data', 'order_token', 'status'));
    }




    public function ck_transaction(request $request)
    {


        if($request->status == 'success'){

            return redirect('plan')->with('message', 'Subscription Successful');

        }

    }
}
