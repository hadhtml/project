<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Organization;
use Illuminate\Support\Str;
use App\Helpers\Cmf;
use App\Models\modulenames;
use DB;
use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =   User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_name' => $data['last_name'],
        ]);
        $organization  = new Organization();
        $organization->organization_name = $data['org_name'];
        $organization->email = $user->email;
        $organization->slug = Str::slug($user->name.'-'.rand(10, 99));
        $organization->user_id = $user->id;
        $organization->code =  '#OR' . rand(1000, 9999);
        $organization->type =  'org';
        $organization->save();

        $cretemodulenames = new modulenames;
        $cretemodulenames->user_id = $user->id;
        $cretemodulenames->level_one = $data['level_one'];
        $cretemodulenames->slug_one = Cmf::shorten_url($data['level_one']);
        $cretemodulenames->level_two = $data['level_two'];
        $cretemodulenames->slug_two = Cmf::shorten_url($data['level_two']);
        $cretemodulenames->level_three = $data['level_three'];
        $cretemodulenames->slug_three = Cmf::shorten_url($data['level_three']);
        $cretemodulenames->save();

        if($data['month'])
        {
        DB::table('settings')
        ->insert([
        'month' => $data['month'],
        'user_id' => $user->id,  
        ]);
        }

        if($data['business_type'] == 'yes')
        {
            DB::table('jira_setting')
            ->insert([
              'user_name' => $data['user_name'], 
              'token' => $data['token'],
              'jira_url' => $data['jira_url'], 
              'jira_name' => $data['jira_name'],
              'user_id' => $user->id,  
      
      
              ]);
        }

        $plan = DB::table('plan')->where('status','Active')->orderby('id','DESC')->first();


        if($data['plan-id'] != null)
        {
         $planId = $data['plan-id'];
         $max_user = $data['max-user'];
        }else
        {
        $planId = $plan->plan_id;
        $max_user = 0;
        }

        $newDateTime = Carbon::now()->addDays(30);

        DB::table('user_plan')->insert([
            'plan_id' => $planId,
            'status' => 'active',
            'subscription_ends_at' => $newDateTime,
            'user_id' => $user->id,
            'payment_type' => 'trail',
            'package_status' =>  $max_user,
        ]);

     
        return $user;
    }
}
