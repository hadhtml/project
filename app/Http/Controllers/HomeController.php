<?php

namespace App\Http\Controllers;
use App\Helpers\Cmf;
use Illuminate\Http\Request;
use App\Models\Organization;
use Auth;
use DB;
use App\Models\modulenames;
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
        if(DB::table('user_plan')->where('user_id',Auth::id())->where('status','active')->count() == 1)
        {
          $organization  = Organization::where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->where('trash',NULL)->first();
          return view('organizations.dashboard',compact('organization'));
        }else
        {
          return view('profile.user-plan-page');
        }
      
    }
    public function asignmodule()
    {
        return view('settings.asignmodule');
    }
    public function asignnames()
    {
        if(modulenames::where('user_id' , Auth::id())->count() == 1)
        {
          $organization  = Organization::where('user_id',Auth::id())->where('trash',NULL)->first();
          return redirect(route('organization.dashboard'));
        }
        else
        {
          return view('organizations.asignnames');
        }
    }
    public function createmodulenames(Request $request)
    {
        $cretemodulenames = new modulenames;
        $cretemodulenames->user_id = Auth::id();
        $cretemodulenames->level_one = $request->level_one;
        $cretemodulenames->slug_one = Cmf::shorten_url($request->level_one);
        $cretemodulenames->level_two = $request->level_two;
        $cretemodulenames->slug_two = Cmf::shorten_url($request->level_two);
        $cretemodulenames->level_three = $request->level_three;
        $cretemodulenames->slug_three = Cmf::shorten_url($request->level_three);
        $cretemodulenames->save();
    }
    public function updatemodulenames(Request $request)
    {
        $data = modulenames::where('user_id' , Auth::id())->first();

        $updatemodulenames = modulenames::find($data->id);
        $updatemodulenames->user_id = Auth::id();
        $updatemodulenames->level_one = $request->level_one;
        $updatemodulenames->slug_one = Cmf::shorten_url($request->level_one);
        $updatemodulenames->level_two = $request->level_two;
        $updatemodulenames->slug_two = Cmf::shorten_url($request->level_two);
        $updatemodulenames->level_three = $request->level_three;
        $updatemodulenames->slug_three = Cmf::shorten_url($request->level_three);
        $updatemodulenames->save();
        return redirect()->back()->with('message', 'Website Change Successfully');
    }
}
