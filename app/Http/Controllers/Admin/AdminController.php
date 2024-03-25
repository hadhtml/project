<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use DB;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard/index');
    }
    public function allusers()
    {
        $data = Organization::select(
                "users.id",
                "users.name",
                "users.email",
                "users.created_at",
                "organization.organization_name")
                ->wherenull('users.type')
                ->leftJoin('users', 'organization.user_id', '=', 'users.id')
                ->paginate(10);
        return view('admin.users.all')->with(array('data' => $data));
    }
    public function cloneuser()
    {
        $data = Organization::select(
                "users.id",
                "users.name",
                "users.last_name",
                "users.created_at",
                "organization.organization_name")
                ->wherenull('users.type')
                ->leftJoin('users', 'organization.user_id', '=', 'users.id')
                ->get();
        return view('admin.users.cloneuser')->with(array('data' => $data));
    }
    public function getuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $html = view('admin.users.userdata', compact('from' , 'to'))->render();
        return $html;
    }
    public function gettabledata($tablename , $user_id)
    {
        return DB::table($tablename)->where('user_id' , $user_id)->get();
    }
    public function importuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $activities = $this->gettabledata('activities' , $from);
        print_r($activities);
    }

    public function addPlanModule()
    {
     
        return view('admin.subscriptions.add-plan');
    }

    public function SavePlan(Request $request)
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
    
        DB::table('plan')->insert([
          'plan_title' => $request->plan_title,
          'duration' => $request->duration,
          'base_price_status' => $request->base_price_status,
          'base_price' => $base_price,
          'sale_price' => $sale_price,
          'max_user' => $request->max_user,
          'per_user_price' => $request->per_user_price,
          'status' => $request->status,
          'description' => $request->description,
          'module' => $request->module,
           'slug' =>  Str::slug($request->plan_title),
        
        ]);


        
        return back();

  

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
}
