<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        if(Auth::id())
        {
          $organization  = Organization::where('user_id',Auth::id())->where('trash',NULL)->first();
          return redirect(route('organization.dashboard'));
        }
        else
        {
          return view('welcome');
        }
    }
    public function dashboard()
    {
        $organization  = Organization::where('user_id',Auth::id())->where('trash',NULL)->first();
        return view('organizations.dashboard',compact('organization'));
    }
    public function asignnames()
    {
        return view('organizations.asignnames');
    }
    public function createmodulenames(Request $request)
    {
        $request->validate([
            'level_one' => 'required',
            'level_two' => 'required',
            'level_three' => 'required',
        ]);
    }
}
