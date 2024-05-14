<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Stripe;
use Stripe\Plan;
use App\Helpers\Cmf;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Stripe\Subscription;
use Auth;
// use Laravel\Cashier\Subscription;


class SubscriptionController extends Controller
{
    public function addPlanModule()
    {
     
        return view('admin.subscriptions.add-plan');
    }

    public function SavePlan(Request $request)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        
       

      if($request->base_price_status == 'price')
      {
        $base_price = $request->base_price;
        $sale_price = 0;

        
        $amount = ($request->base_price * 100);
        $plan = Plan::create([
         'amount' => $amount,
         'currency' => 'GBP',
         'interval' => $request->duration,
         'product' => [
            'name' => $request->plan_title,
         ]
        ]);

      }else
      {
        $base_price = NULL;
        $sale_price = NULL;
    
      }
    
       $id =  DB::table('plan')->insertGetId([
          'plan_title' => $request->plan_title,
          'billing_method' => $request->duration,
          'base_price_status' => $request->base_price_status,
          'base_price' =>  $base_price,
          'sale_price' => $sale_price,
          'max_user' => $request->max_user,
          'per_user_price' => $request->per_user_price,
          'status' => $request->status,
          'description' => $request->description,
          'module' =>  implode(',', $request->module),
           'slug' =>  Str::slug($request->plan_title),
           'plan_id' => $plan->id,
           'currency' => 'GBP',
        
        ]);

    //     $frequency = 'WEEK';

    //     if($request->duration == 'week')
    //     {
    //      $frequency = 'WEEK';
    //     }

        
    //     if($request->duration == 'month')
    //     {
    //      $frequency = 'MONTH';
    //     }

    //     if($request->duration == 'year')
    //     {
    //      $frequency = 'YEAR';
    //     }

    //     $response = Http::withHeaders([
    //       'Authorization' => 'Basic ' . base64_encode(env('PAYPAL_CLIENT_ID') . ':' . env('PAYPAL_CLIENT_SECRET')),
    //       'Content-Type' => 'application/json',
    //   ])->post('https://api.sandbox.paypal.com/v1/billing/plans', [
    //       "product_id" => "PROD-8E576974A10415501",
    //       "name" => $request->plan_title,
    //       "description" => $request->description,
    //       "billing_cycles" => [
    //           [
    //               "frequency" => [
    //                   "interval_unit" => $frequency,
    //                   "interval_count" => 1
    //               ],
    //               "tenure_type" => "REGULAR",
    //               "sequence" => 1,
    //               "total_cycles" => 0,
    //               "pricing_scheme" => [
    //                   "fixed_price" => [
    //                       "value" => $base_price,
    //                       "currency_code" => "USD"
    //                   ]
    //               ]
    //           ]
    //       ],
    //       "payment_preferences" => [
    //           "auto_bill_outstanding" => true,
    //           "setup_fee" => [
    //               "value" => "0",
    //               "currency_code" => "USD"
    //           ],
    //           "setup_fee_failure_action" => "CONTINUE",
    //           "payment_failure_threshold" => 3
    //       ],
    //       "taxes" => [
    //           "percentage" => "0",
    //           "inclusive" => false
    //       ]
    //   ]);

    //   if ($response->successful()) {
          
    //       $planId = $response->json()['id'];
    //       DB::table('plan')->where('id',$id)->update(['paypal_id' => $planId]);
    //   } else {
       
          
    //   }

        foreach($request->features  as $k => $value)
        {
             DB::table('features')
             ->insert([
                'feature' => $request->features[$k],
                'plan_id' => $id
            ]);
        }


        
        return back();

  

    }

    public function AllPlan()
    {
        $this->UpdateUserPlan();
        $data = DB::table('plan')->get();
        return view('admin.subscriptions.all-plan',compact('data'));
    }

    
    public function AllUserPlan()
    {
        $data = DB::table('user_plan')->select(
            "user_plan.*",
            "users.*",
            "plan.*",
            "user_plan.created_at as created")
            ->leftJoin('users', 'user_plan.user_id', '=', 'users.id')
            ->leftJoin('plan', 'user_plan.plan_id', '=', 'plan.id')
            ->get();
        return view('admin.subscriptions.user-plan',compact('data'));
    }

    public function EditPlan($id)
    {
        $data = DB::table('plan')->where('id',$id)->first();
        return view('admin.subscriptions.edit-plan',compact('data'));
    }

    public function UpdatePlan(Request $request)
    {

    
      if($request->base_price_status == 'price')
      {
        $base_price = $request->base_price;
        $sale_price = $request->sale_price;
      }else
      {
        $base_price = NULL;
        $sale_price = NULL;
      }
    
        DB::table('plan')->where('plan_id',$request->id)->update([
          'plan_title' => $request->plan_title,
          'billing_method' => $request->duration,
          'base_price_status' => $request->base_price_status,
          'base_price' => $base_price,
          'sale_price' => $sale_price,
          'max_user' => $request->max_user,
          'per_user_price' => $request->per_user_price,
          'status' => $request->status,
          'description' => $request->description,
          'module' =>  implode(',', $request->module),
           'slug' =>  Str::slug($request->plan_title),
        
        ]);

        if($request->has('f_id'))
        {
        foreach($request->f_id  as $k => $value)
        {
             DB::table('features')
             ->where('id',$request->f_id[$k])
             ->update([
              'feature' => $request->features[$k],
            ]);
        }
        }

        
        return redirect('admin/all-plan');

  

    }

    public function UpdateUserPlan()
    {
      $currentDate = Carbon::now();
      DB::table('user_plan')
      ->whereDate('subscription_ends_at', '<', $currentDate)
      ->update(['status' => 'inactive']);
    }


    public function UpgradePlan(Request $request)
{
    
    $stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

   
    $data = DB::table('subscriptions')->where('user_id',auth::id())->first();
    $subscriptionId = $data->stripe_id;
    $subscription = Subscription::retrieve($subscriptionId);
    $plan = DB::table('plan')->where('id',$request->plan_id)->first();
    $stripe = \Stripe\Subscription::update($subscriptionId, [
        'cancel_at_period_end' => false,
        'proration_behavior' => 'always_invoice',
        'items' => [
          [
            'id' => $subscription->items->data[0]->id,
            'price' => $plan->plan_id,
            'quantity' => $subscription->quantity,

          ],
        ],
      ]);


     DB::table('user_plan')->where('user_id',auth::id())->update([
        'plan_id' => $plan->plan_id,
      ]);

      
     DB::table('subscriptions')->where('user_id',auth::id())->where('stripe_id',$subscriptionId)->update([
      'stripe_price' => $plan->plan_id,
      'quantity' => $subscription->quantity,
      'name' => $plan->plan_title,
    ]);
  
    

}
}
