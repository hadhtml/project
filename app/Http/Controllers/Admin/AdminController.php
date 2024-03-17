<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use DB;
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
}
