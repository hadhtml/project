<?php

namespace App\Http\Controllers;
use App\Helpers\Cmf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\Epic;
use App\Models\flags;
use App\Models\flag_comments;
use App\Models\escalate_cards;
use App\Models\team_link_child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class MapperController extends Controller
{
    public function saveteamlevellinking(Request $request)
    {
        $add = new team_link_child();
        $add->team_id = $request->team_id;
        $add->team_obj_id = $request->team_obj_id;
        $add->bussiness_unit_id = $request->bussiness_unit_id;
        $add->bussiness_obj_id = $request->bussiness_obj_id;
        $add->bussiness_key_id = $request->bussiness_key_id;
        $add->type = $request->type;
        $add->save();

        $linking = team_link_child::where('team_obj_id' , $request->team_obj_id)->get();
        $type = $request->type;
        if ($type == "unit") {
            $organization = DB::table("business_units")->where("id", $request->unit_id)->first();
        }
        if ($type == "stream") {
            $organization = DB::table("value_stream")->where("id", $request->unit_id)->first();
        }
        if ($type == "BU") {
            $organization = DB::table("unit_team")->where("id", $request->unit_id)->first();
        }
        if ($type == "VS") {
            $organization = DB::table("value_team")->where("id", $request->unit_id)->first();
            
        }
        if ($type == "org") {
            $organization = DB::table("organization")->where("id", $request->unit_id)->first();
        }
        if ($type == "orgT") {
            $organization = DB::table("org_team")->where("id", $request->unit_id)->first();
        }
        $objective = DB::table('objectives')->where('id' , $request->id)->first();
        $html = view('Team.Get-Obj-link', compact('linking','type','organization','objective'))->render();
        return $html;
    }
    public function checkkeyresultmapper(Request $request)
    {
        $check = team_link_child::where('team_id' , $request->team_id)->where('team_obj_id' , $request->team_obj_id)->where('bussiness_unit_id' , $request->bussiness_unit_id)->where('bussiness_obj_id' , $request->bussiness_obj_id)->where('bussiness_key_id' , $request->bussiness_key_id)->count();
        if($check == 0)
        {
            return 1;
        }else{
            return 2;
        }
    }
    public function getorganizationkeyresult(Request $request)
    {
        $objective = DB::table('key_result')->where('obj_id',$request->id)->get();
        return $objective;
    }
    public function mapperbytype($url , $type)
    {
        if($type == 'unit')
        {
            $organization = DB::table('business_units')->where('slug'  , $url)->first();
            $data = DB::table('business_units')->where('slug'  , $url)->first();
            $valuestream = DB::table('value_stream')->where('unit_id'  , $data->id)->orderby('id' , 'asc')->get();
            foreach ($valuestream as $key => $v) {
                $objective = DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'stream')->count();
                $key_result = DB::table('key_result')->where('unit_id' , $v->id)->where('type' , 'stream')->count();
                if($key+1 == 1){
                   DB::table('value_stream')->where('id' , $v->id)->update(array('mapper_height' => -60)); 
                }else{

                }
            }
            $buteam = DB::table('unit_team')->where('org_id'  , $data->id)->get();
            return view('mapper.unit.index',compact('data','valuestream','buteam','organization')); 
        }

        if($type == 'stream')
        {
            $organization = DB::table('value_stream')->where('slug'  , $url)->first();
            $data = DB::table('value_stream')->where('slug'  , $url)->first();
            $valueteam = DB::table('value_team')->where('org_id'  , $data->id)->get();
            return view('mapper.stream.index',compact('data','valueteam','organization')); 
        }


    }
}