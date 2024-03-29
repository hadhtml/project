<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;
use Carbon\Carbon;
use DB;
use Auth;
use Stripe;
use Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BraintreeController extends Controller
{
    
    public function generateClientToken()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return response()->json(['clientToken' => $clientToken]);
    }

    public function processPayment(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
        
        $plan =  DB::table('plan')->where('id',$request->plan_id)->first();
        $value = $plan->base_price;


        $result = $gateway->transaction()->sale([
            'amount' => $value,
            'paymentMethodNonce' => $request->input('nonce'),
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
     
     
           $newDateTime = Carbon::now()->addDays(30);

       
           DB::table('user_plan')->insert([
               'plan_id' => $request->plan_id,
               'amount' => $value,
               'status' => 1,
               'transaction_id' => $result->transaction->id,
               'plan_expire' => $newDateTime,
               'user_id' => auth::id(),
           ]);



        if ($result->success) {
       
            return response()->json(['success' => true, 'message' => 'Your Plan is Complete']);
        } else {
            // Payment failed
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }

    public function paymentPage($slug)
    {
   
    $plan = DB::table('plan')->where('slug',$slug)->first();

    if($plan->base_price_status == 'free')
    {

        $newDateTime = Carbon::now()->addDays($plan->duration);
       
        DB::table('user_plan')->insert([
            'plan_id' => $plan->id,
            'amount' => 0,
            'status' => 1,
            'plan_expire' => $newDateTime,
            'user_id' => auth::id(),
            'package_status' => 1,

        ]);

     return redirect('organization/dashboard');

    }else
    {
    return view('settings.payment',compact('plan'));
    }

    

    }

    public function paypalpay(Request $request)
    {


        $value = $request['value'];
        
        $newDateTime = Carbon::now()->addDays(30);

       
           DB::table('user_plan')->insert([
               'plan_id' => $request->plan_id,
               'amount' => $value,
               'status' => 1,
               'transaction_id' => $request->transaction,
               'plan_expire' => $newDateTime,
               'user_id' => auth::id(),
           ]);

        $url = url('organization/dashboard');
        return $url;

    }

    public function stripePost(Request $request)

    {

        $plan =  DB::table('plan')->where('id',$request->id)->first();
        $value = $plan->base_price;


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';
        $session = \Stripe\Checkout\Session::create([
      'success_url' => $redirectUrl,
      'cancel_url' => route('checkout.cancel', [], true),
      "payment_method_types" => ['card'],
       "mode" => 'payment',
       "line_items" => [
        [
           "price_data" =>[
               "currency" =>"usd",
               "product_data" =>[
                   "name"=> "Training Session",
                   "description" => "Training Session"
               ],
               "unit_amount" => $value * 100,
           ],
           "quantity" => 1 
        ],

     
    ]
        ]);

        // Stripe\Charge::create ([

        //         "amount" => $value * 100,

        //         "currency" => "usd",

        //         "source" => $request->stripeToken,

        // ]);

        $newDateTime = Carbon::now()->addDays(30);

        $planId =  DB::table('user_plan')->where('plan_id',$request->id)->where('user_id',auth::id())->first();
        if($planId)
        {
        DB::table('user_plan')->where('plan_id',$request->id)->where('user_id',auth::id())->update([ 'transaction_id' => $session->id,]);
        }else
        {
        DB::table('user_plan')->insert([
        'plan_id' => $plan->id,
        'amount' => $value,
        'status' => 0,
        'transaction_id' => $session->id,
        'plan_expire' => $newDateTime,
        'user_id' => auth::id(),
        ]);
        }
       

      
       
        return redirect($session->url);



    }

    public function getPaypalClientId()
{
    return response()->json([
        'paypal_client_id' => env('paypal_client_id')
    ]);
}

public function stripeCheckoutSuccess(Request $request)

{

    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));



   try {
    $session = $stripe->checkout->sessions->retrieve($request->session_id);
    if (!$session) {
        throw new NotFoundHttpException;
    }

    $order = DB::table('user_plan')->where('transaction_id', $session->id)->first();
    if (!$order) {
        throw new NotFoundHttpException();
    }
    if ($order->status == 0) {
       
        DB::table('user_plan')->where('transaction_id',$session->id)->update(['status' => 1,'package_status' => 1]);
    }

return redirect('organization/dashboard');
} catch (\Exception $e) {
    throw new NotFoundHttpException();
}




}

public function cancel()
{
return redirect()->back()->with('error-message', 'Error');

}


}
