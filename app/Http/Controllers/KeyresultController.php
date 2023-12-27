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
            $data = key_result::find($request->id);
            $html = view('keyresult.tabs.weight', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'charts')
        {
            $data = key_result::find($request->id);
            $html = view('keyresult.tabs.charts', compact('data'))->render();
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
            $data = key_result::find($request->id);
            $html = view('keyresult.tabs.okrmapper', compact('data'))->render();
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
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->first();
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
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;
    }
}