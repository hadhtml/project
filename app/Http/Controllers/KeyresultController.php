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
            $html = view('keyresult.tabs.values', compact('data'))->render();
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
    public function updatetarget(Request $request)
    {
        
    }
}