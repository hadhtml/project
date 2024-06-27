<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Organization;
use Illuminate\Support\Str;
use App\Models\modulenames;
use DB;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()

    {

    
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('email', $user->email)->first();
              

            if($finduser)
            {

         

           Auth::login($finduser);

        if(modulenames::where('user_id' ,$finduser->id)->count() == 1)
        {
          $organization  = Organization::where('user_id',$finduser->id)->where('trash',NULL)->first();
          return redirect('organization/dashboard');
        }
        else
        {
          return view('organizations.asignnames');
        }

                

     

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,
                    'email_verified_at'=> Carbon::now(),
                    'password' => encrypt('123456dummy')

                ]);

                $organization  = new Organization();
                $organization->organization_name = $user->name;
                $organization->email = $user->email;
                $organization->slug = Str::slug($user->name.'-'.rand(10, 99));
                $organization->user_id = $newUser->id;
                $organization->code =  '#OR' . rand(1000, 9999);
                $organization->type =  'org';
                $organization->save();

                $newDateTime = Carbon::now()->addDays(30);
       
                 $plan = DB::table('plan')->where('status','Active')->orderby('id','DESC')->first();


               
                $planId = $plan->plan_id;
                $max_user = 0;
                
        
                $newDateTime = Carbon::now()->addDays(30);
        
                DB::table('user_plan')->insert([
                    'plan_id' => $planId,
                    'status' => 'active',
                    'subscription_ends_at' => $newDateTime,
                    'user_id' => $newUser->id,
                    'payment_type' => 'trail',
                    'package_status' =>  $max_user,
                ]);

                Auth::login($newUser);

     

                return view('organizations.asignnames');

            }

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    

  

    }

    public function redirectToFacebook()

    {

        return Socialite::driver('facebook')->redirect();

    }

           

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleFacebookCallback()

    {

        try {

        

            $user = Socialite::driver('facebook')->user();

         

            $finduser = User::where('facebook_id', $user->id)->first();

         

            if($finduser){

         

                Auth::login($finduser);

       

                return redirect()->intended('organization/dashboard');

         

            }else{

                $newUser = User::updateOrCreate(['email' => $user->email],[

                        'name' => $user->name,
                        'facebook_id'=> $user->id,
                        'email_verified_at'=> Carbon::now(),
                        'password' => encrypt('123456dummy')

                    ]);

                    $organization  = new Organization();
                    $organization->organization_name = $user->name;
                    $organization->email = $user->email;
                    $organization->slug = Str::slug($user->name.'-'.rand(10, 99));
                    $organization->user_id = $newUser->id;
                    $organization->code =  '#OR' . rand(1000, 9999);
                    $organization->type =  'org';
                    $organization->save();

                    $newDateTime = Carbon::now()->addDays(14);
       
                    DB::table('user_plan')->insert([
                        'plan_id' => 'plan_2qf8GZaKJD',
                        'status' => 'active',
                        'subscription_ends_at' => $newDateTime,
                        'user_id' =>  $newUser->id,
                        'payment_type' => 'trail',
                    ]);

        

                Auth::login($newUser);

        

                return redirect()->intended('organization/dashboard');

            }

       

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
        
}
