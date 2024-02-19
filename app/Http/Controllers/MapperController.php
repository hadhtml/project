<?php

namespace App\Http\Controllers;
use App\Helpers\Cmf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\Epic;
use App\Models\flags;
use App\Models\flag_comments;
use App\Models\temp_data_counts;
use App\Models\team_link_child;
use App\Models\value_stream;
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
            $valuestream = DB::table('value_stream')->where('unit_id'  , $data->id)->orderby('id' , 'asc')->limit(4)->get();
            $count = 1;
            foreach ($valuestream as $key => $v) {
                $objective = DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'stream')->count();
                $key_result = DB::table('key_result')->where('unit_id' , $v->id)->where('type' , 'stream')->count();
                $totalrows  = ($objective+$key_result+1)*50;
                $temp = new temp_data_counts();
                $temp->value_id = $v->id;
                $temp->indexcount = $key+1;
                $temp->type = 'stream';
                $temp->user_id = Auth::id();
                $temp->height = $totalrows;
                $temp->save();
            }
            foreach (temp_data_counts::where('user_id' , Auth::id())->orderby('indexcount' , 'asc')->where('type', 'stream')->get() as $key=> $r) {
                if($r->indexcount == 1)
                {
                    $update = temp_data_counts::find($r->id);
                    $update->exactheight = -60;
                    $update->save();
                }
                if($r->indexcount == 2)
                {
                    $exactheightv = temp_data_counts::where('user_id' , Auth::id())->where('indexcount' , 1)->where('type', 'stream')->sum('height');
                    $update = temp_data_counts::find($r->id);
                    $update->exactheight = $exactheightv;
                    $update->save();
                }
                if($r->indexcount == 3)
                {
                    $exactheightv = temp_data_counts::where('user_id' , Auth::id())->where('indexcount' , 2)->where('type', 'stream')->value(DB::raw("SUM(exactheight + height)"));
                    $update = temp_data_counts::find($r->id);
                    $update->exactheight = $exactheightv;
                    $update->save();
                }
                if($r->indexcount == 4)
                {
                    $exactheightv = temp_data_counts::where('user_id' , Auth::id())->where('indexcount' , 3)->where('type', 'stream')->value(DB::raw("SUM(exactheight + height)"));
                    $update = temp_data_counts::find($r->id);
                    $update->exactheight = $exactheightv;
                    $update->save();
                }
            }
            foreach (temp_data_counts::where('user_id' , Auth::id())->orderby('indexcount' , 'asc')->where('type', 'stream')->get() as $r) {
                $updatevaluestream = value_stream::find($r->value_id);
                $updatevaluestream->mapper_height = $r->exactheight;
                $updatevaluestream->save();
            }
            temp_data_counts::where('user_id' , Auth::id())->orderby('indexcount' , 'asc')->where('type', 'stream')->delete();
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