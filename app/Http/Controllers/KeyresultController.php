<?php

namespace App\Http\Controllers;
use App\Helpers\Cmf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\Epic;
use App\Models\activities;
use App\Models\attachments;
use App\Models\flag_members;
use App\Models\flags;
use App\Models\flag_comments;
use App\Models\escalate_cards;
use App\Models\key_result;
use App\Models\key_chart;
use App\Models\team_link_child;
use App\Models\flow_chart_scripts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class KeyresultController extends Controller
{
    public function getkeyresult(Request $request)
    {
        $data = key_result::find($request->id);
        $html = view('keyresult.modal', compact('data'))->render();
        return $html;
    }
    public function updategeneral(Request $request)
    {
        $data = key_result::find($request->id);
        $data->key_name = $request->key_name;
        $data->key_start_date = $request->key_start_date;
        $data->key_end_date = $request->key_end_date;
        $data->key_detail = $request->key_detail;
        $data->save();

        if(!$request->key_name)
        {
            $update = key_result::find($request->id);
            $update->trash = $data->created_at;
            $update->save(); 
        }else{
            $update = key_result::find($request->id);
            $update->trash = Null;
            $update->save(); 
        }


        if ($data->type == "unit") {
            $organization = DB::table("business_units")
                ->where("id", $data->unit_id)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $data->unit_id)
                ->where("trash", null)
                ->where("type", "unit")
                ->get();
        }

        if ($data->type == "stream") {
            $organization = DB::table("value_stream")
                ->where("id", $data->unit_id)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $data->unit_id)
                ->where("trash", null)
                ->where("type", "stream")
                ->get();
        }

        if ($data->type == "BU") {
            $organization = DB::table("unit_team")
                ->where("id", $data->unit_id)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $data->unit_id)
                ->where("trash", null)
                ->where("type", "BU")
                ->get();
        }

        if ($data->type == "VS") {
            $organization = DB::table("value_team")
                ->where("id", $data->unit_id)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $data->unit_id)
                ->where("trash", null)
                ->where("type", "VS")
                ->get();
        }

        if ($data->type == "org") {
            $organization = DB::table("organization")
                ->where("id", $data->unit_id)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $data->unit_id)
                ->where("trash", null)
                ->where("type", "org")
                ->get();
        }

        if ($data->type == "orgT") {
            $organization = DB::table("org_team")
                ->where("id", $data->unit_id)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $data->unit_id)
                ->where("trash", null)
                ->where("type", "orgT")
                ->get();
        }


        return view(
            "objective.objective-render",
            compact("organization", "objective")
        );


    }
    public function showheader(Request $request)
    {
        $data = key_result::find($request->id);
        $html = view('keyresult.modalheader', compact('data'))->render();
        return $html;
    }
    public function showtab(Request $request)
    {
        if($request->tab == 'general')
        {
            $data = key_result::find($request->id);

            $html = view('keyresult.tabs.general', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'targets')
        {
            $data = key_result::find($request->id);
            $html = view('keyresult.tabs.target', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'values')
        {
            $data = key_result::find($request->id);
            $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->first();
            if($report)
            {
                $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
                if(!$KEYChart)
                {

                }
                $key = key_result::find($request->id);
                $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
                $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
            }else{
                $noreport = 'no';
                $html = view('keyresult.tabs.values',compact('data','noreport'));
            }  
            return $html;
        }
        if($request->tab == 'weighttab')
        {
            // $data = key_result::find($request->id);
            $InitData = DB::table('initiative')->where('key_id',$request->id)->get();
            $InitDataCount = DB::table('initiative')->where('key_id',$request->id)->count();
            $Weight = DB::table('initiative')->where('key_id',$request->id)->sum('initiative_weight');

            $html = view('keyresult.tabs.init-weight', compact('InitData','InitDataCount','Weight'))->render();
            return $html;
        }
        if($request->tab == 'charts')
        {
            $data = key_result::find($request->id);
            // $html = view('keyresult.tabs.charts', compact('data'))->render();
            // return $html;

            $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->first();
            if($report)
            {
                $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
                if(!$KEYChart)
                {

                }
                $key = key_result::find($request->id);
                $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
                $html = view('keyresult.tabs.charts',compact('data','KEYChart','key','report','keyQAll'));
            }else{
                $noreport = 'no';
                $html = view('keyresult.tabs.charts',compact('data','noreport'));
            }  
            return $html;
        }
        if($request->tab == 'teams')
        {
            $data = key_result::find($request->id);
            $html = view('keyresult.tabs.teams', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'okrmapper')
        {
            $linking = team_link_child::where('bussiness_key_id' , $request->id)->orderby('created_at' , 'desc')->get();
            $data = key_result::find($request->id);
            $html = view('keyresult.tabs.okrmapper', compact('data','linking'))->render();
            return $html;
        }
    }
    public function addquartervalue(Request $request)
    {
        DB::table('key_quarter_value')->insert([
          'key_chart_id' => $request->key_chart_id,
          'key_id' => $request->id,
          'sprint_id' => $request->sprint_id,
          'value' => $request->value,
        ]);
        $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;
    }
    public function deletequartervalue(Request $request)
    { 
        $key_quarter_value = DB::table('key_quarter_value')->where('id',$request->id)->first();
        $data = key_result::find($key_quarter_value->key_id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$key_quarter_value->key_id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($key_quarter_value->key_id);
        $keyQAll = DB::table('key_chart')->where('key_id',$key_quarter_value->key_id)->get();
        DB::table('key_quarter_value')->where('id',$request->id)->delete(); 
        DB::table('flag_comments')->where('flag_id',$request->id)->delete();
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;
    }
    public function createkeyresult(Request $request)
    {
        $counter = 1;
        $pos = DB::table('key_result')->orderby('id','DESC')->where('obj_id',$request->obj_id)->first();
        if($pos)
        {
        $counter = $pos->IndexCount + 1; 
        }

        $objective = DB::Table('objectives')->where('id' , $request->obj_id)->first();
        $create = new key_result();
        $create->user_id = Auth::id();
        $create->obj_id = $request->obj_id;
        $create->key_status = 'To Do';
        $create->unit_id = $objective->unit_id;
        $create->type = $objective->type;
        $create->save();        
        $update = key_result::find($create->id);
        $update->trash = $create->created_at;
        $update->key_start_date = $create->created_at;
        $update->key_end_date = $create->created_at;
        $update->IndexCount =  $counter;
        $update->save(); 
        return $create->id;
    }
    public function changekeyresultstatus(Request $request)
    {
        $update = key_result::find($request->id);
        $update->key_status = $request->status;
        $update->save();
        $data = key_result::find($request->id);
        $html = view('keyresult.modalheader', compact('data'))->render();
        return $html;
    }
    public function updatetarget(Request $request)
    {
        $update = key_result::find($request->id);
        $update->key_result_type = $request->key_result_type;
        $update->key_unit = $request->key_unit;
        $update->init_value = $request->init_value;
        $update->target_number = $request->target_number;
        $update->save();
        if($request->IndexCount)
        {
            foreach ($request->IndexCount as $indkey => $r) {
                
                $keychart = key_chart::where('key_id' , $request->id)->where('IndexCount' , $r)->first();
                $updatekeychart = key_chart::find($keychart->id);
                $updatekeychart->quarter_value = $request->Target[$indkey];
                $updatekeychart->save();
            }
        }
        $objective = DB::Table('objectives')->where('id' , $update->obj_id)->first();
        $check = key_chart::where('key_id' , $request->id)->count();
        if($check > 0)
        {
            $counter = $check;    
        }else{
            $counter = 0;    
        }
        if($request->has("newtarget")) {
            foreach ($request->newtarget as $key => $value) {
                $counter++;
                DB::table("key_chart")->insert([
                    "quarter_value" => $request->newtarget[$key],
                    "key_id" => $request->id,
                    "buisness_unit_id" => $objective->unit_id,
                    "IndexCount" => $counter,
                ]);
            }
        }
        $data = key_result::find($request->id);
        $html = view('keyresult.tabs.target', compact('data'))->render();
        return $html;
    }
    public function removeweight(Request $request)
    {
        DB::table('key_result')->where('id' , $request->id)->update(array('weight' => 0));
    }
    public function addweight(Request $request)
    {
        DB::table('key_result')->where('id' , $request->id)->update(array('weight' => $request->weight));   
    }
    public function selectteamokrmapper(Request $request)
    {
        if($request->type == 'org')
        {
            $objectives = DB::table('objectives')->where('type' , 'orgT')->where('unit_id' , $request->id)->get();
        }
        if($request->type == 'stream')
        {
            $objectives = DB::table('objectives')->where('type' , 'VS')->where('unit_id' , $request->id)->get();
        }
        if($request->type == 'unit')
        {
            $objectives = DB::table('objectives')->where('type' , 'BU')->where('unit_id' , $request->id)->get();
        }

        if($objectives->count() > 0)
        {
            foreach ($objectives as $r) {
                echo '<option value="'.$r->id.'">'.$r->objective_name.'</option>';
            }
        }else{
            echo 1;
        }
        
    }
    public function okrmapperform(Request $request)
    {
        $add = new team_link_child();
        $add->linked_objective_id = $request->objectiveid;
        $add->bussiness_unit_id = $request->bussiness_unit_id;
        $add->bussiness_obj_id = $request->bussiness_obj_id;
        $add->bussiness_key_id = $request->bussiness_key_id;
        $add->from = $request->type;
        $add->to = $request->to;
        $add->user_id = Auth::id();
        $add->save();
        $linking = team_link_child::where('bussiness_key_id' , $request->bussiness_key_id)->orderby('created_at' , 'desc')->get();
        $data = key_result::find($request->bussiness_key_id);
        $html = view('keyresult.tabs.okrmapper', compact('data','linking'))->render();
        return $html;
    }
    public function checkkeyresultlink(Request $request)
    {
        $check = team_link_child::where('team_id' , $request->team_id)->where('team_obj_id' , $request->team_obj_id)->where('bussiness_unit_id' , $request->bussiness_unit_id)->where('bussiness_obj_id' , $request->bussiness_obj_id)->where('bussiness_key_id' , $request->bussiness_key_id)->count();
        if($check == 0)
        {
            return 1;
        }else{
            return 2;
        }
    }
    public function deletelinking(Request $request)
    {
        $data = team_link_child::where('id' , $request->id)->first();

        team_link_child::where('id' , $request->id)->delete();
        $linking = team_link_child::where('bussiness_key_id' , $data->bussiness_key_id)->get();
        $data = key_result::find($data->bussiness_key_id);
        $html = view('keyresult.tabs.okrmapper', compact('data','linking'))->render();
        return $html;
    }
    public function searchobjectives(Request $request)
    {
        if($request->type == 'org')
        {
            $objectives = DB::table('objectives')->where('user_id' , Auth::id())->wherenull('trash')->where('type' , '!=' , 'org')->where('objective_name', 'LIKE', "%$request->id%")->get();
        }
        if($request->type == 'unit')
        {
            $objectives = DB::table('objectives')->where('user_id' , Auth::id())->wherenull('trash')->where('type' , '!=' , 'org')->where('type' , '!=' , 'unit')->where('objective_name', 'LIKE', "%$request->id%")->get();
        }
        if($request->type == 'stream')
        {
            $objectives = DB::table('objectives')->where('user_id' , Auth::id())->wherenull('trash')->where('type' , '!=' , 'stream')->where('type' , '!=' , 'org')->where('type' , '!=' , 'unit')->where('objective_name', 'LIKE', "%$request->id%")->get();
        }
        $html = view('keyresult.objectiveappend', compact('objectives'))->render();
        return $html;
    }


    public function searchkeyresult(Request $request)
    {
        if($request->type == 'unit')
        {
            $keyresult = DB::table('key_result')->where('user_id' , Auth::id())->wherenull('trash')->where('type' , 'org')->where('key_name', 'LIKE', "%$request->id%")->get();
        }
        if($request->type == 'stream')
        {
            $objectives = DB::table('objectives')->where('user_id' , Auth::id())->wherenull('trash')->where('type' , '!=' , 'stream')->where('type' , '!=' , 'org')->where('type' , '!=' , 'unit')->where('objective_name', 'LIKE', "%$request->id%")->get();
        }
        $html = view('keyresult.keresultappend', compact('keyresult'))->render();
        return $html;
    }

    public function selectkeyreslt(Request $request)
    {
        $data = DB::table('key_result')->where('id' , $request->id)->first();
        if($data->type == 'org')
        {
            echo '<div class="epic">
                <div class="d-flex">
                    <div class="epic-tittle">'.$data->key_name.'</div>
                    <a onclick="removeobjective()" href="javascript:void(0)"><img class="closeimage" src="'.url('public/assets/svg/cross.svg').'"></a>
                </div>
                <input type="hidden" value="'.$data->id.'" name="bussiness_key_id">
                <input type="hidden" value="'.$data->type.'" name="type">
                <input type="hidden" value="'.$data->unit_id.'" name="bussiness_unit_id">
                <input type="hidden" value="'.$data->obj_id.'" name="bussiness_obj_id">
                <div class="epic-detail okrmappersearchdetail">
                    <span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span>
                    <span>'.DB::table('organization')->where('id' , $data->unit_id)->first()->organization_name.'</span>
                </div>
            </div>';
        }

    }

    public function selectobjective(Request $request)
    {
        $data = DB::table('objectives')->where('id' , $request->id)->first();
        if($data->type == 'unit')
        {
            echo '<div class="epic">
                    <div class="d-flex">
                        <div class="epic-tittle">'.$data->objective_name.'</div>
                        <a onclick="removeobjective()" href="javascript:void(0)"><img class="closeimage" src="'.url('public/assets/svg/cross.svg').'"></a>
                    </div>
                    <input type="hidden" value="'.$data->type.'" name="to">
                    <div class="epic-detail okrmappersearchdetail">
                        <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
                        <span>'.DB::table("business_units")->where("id" , $data->unit_id)->first()->business_name.'</span>

                    </div>

                </div>';
        }
        if($data->type == 'stream')
        {
            $valuestream = DB::table('value_stream')->where('id' , $data->unit_id)->first();
            echo '<div class="epic">
                    <div class="d-flex">
                        <div class="epic-tittle">'.$data->objective_name.'</div>
                        <a onclick="removeobjective()" href="javascript:void(0)"><img class="closeimage" src="'.url('public/assets/svg/cross.svg').'"></a>
                    </div>
                    <input type="hidden" value="'.$data->type.'" name="to">
                    <div class="epic-detail okrmappersearchdetail">
                        <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
                        <span>'.$valuestream->value_name.'</span>

                    </div>

                </div>';
        }

        if($data->type == 'VS')
        {
            $valueteam = DB::table('value_team')->where('id' , $data->unit_id)->first();
            $valuestream = DB::table('value_stream')->where('id' , $valueteam->org_id)->first();
            echo '<div class="epic">
                    <div class="d-flex">
                        <div class="epic-tittle">'.$data->objective_name.'</div>
                        <a onclick="removeobjective()" href="javascript:void(0)"><img class="closeimage" src="'.url('public/assets/svg/cross.svg').'"></a>
                    </div>
                    <input type="hidden" value="'.$data->type.'" name="to">
                    <div class="epic-detail okrmappersearchdetail">
                        <span style="font-size:22px" class="material-symbols-outlined mr-1">layers</span>
                        <span>'.$valuestream->value_name.'</span>
                        <span style="font-size:22px" class="material-symbols-outlined mr-1">groups</span>
                        <span>'.$valueteam->team_title.'</span>
                    </div>

                </div>';
        }

        if($data->type == 'BU')
        {
            $businessteam = DB::table('unit_team')->where('id' , $data->unit_id)->first();
            $business_units = DB::table('business_units')->where('id' , $businessteam->org_id)->first();
            echo '<div class="epic">
                    <div class="d-flex">
                        <div class="epic-tittle">'.$data->objective_name.'</div>
                        <a onclick="removeobjective()" href="javascript:void(0)"><img class="closeimage" src="'.url('public/assets/svg/cross.svg').'"></a>
                    </div>
                    <input type="hidden" value="'.$data->type.'" name="to">
                    <div class="epic-detail okrmappersearchdetail">
                        <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
                        <span>'.$business_units->business_name.'</span>
                        <span style="font-size:22px" class="material-symbols-outlined mr-2 ml-2">groups</span>
                        <span>'.$businessteam->team_title.'</span>
                    </div>

                </div>';
        }

        if($data->type == 'orgT')
        {
            $org_team = DB::table('org_team')->where('id' , $data->unit_id)->first();
            $organization = DB::table('organization')->where('id' , $org_team->org_id)->first();
            echo '<div class="epic">
                    <div class="d-flex">
                        <div class="epic-tittle">'.$data->objective_name.'</div>
                        <a onclick="removeobjective()" href="javascript:void(0)"><img class="closeimage" src="'.url('public/assets/svg/cross.svg').'"></a>
                    </div>
                    <input type="hidden" value="'.$data->type.'" name="to">
                    <div class="epic-detail okrmappersearchdetail">
                        <span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span>
                        <span>'.$organization->organization_name.'</span>
                        <span style="font-size:22px" class="material-symbols-outlined mr-2 ml-2">groups</span>
                        <span>'.$org_team->team_title.'</span>
                    </div>

                </div>';
        }
    }
}