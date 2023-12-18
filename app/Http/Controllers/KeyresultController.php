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
            $html = view('keyresult.modalheader', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'childitems')
        {
            $epic = Epic::find($request->id);
            $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->orderby('id' , 'desc')->get();
            $html = view('epics.tabs.childitems', compact('epic','epicstory'))->render();
            return $html;
        }
        if($request->tab == 'comments')
        {
            $comments = flag_comments::where('flag_id' , $request->id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
            $data = Epic::find($request->id);
            $html = view('epics.tabs.comments', compact('comments','data'))->render();
            return $html;
        }
        if($request->tab == 'activites')
        {
            $activity = activities::where('value_id' , $request->id)->where('type' , 'epics')->orderby('id' , 'desc')->get();
            $data = Epic::find($request->id);
            $html = view('epics.tabs.activities', compact('activity','data'))->render();
            return $html;
        }
        if($request->tab == 'attachment')
        {
            $attachments = attachments::where('value_id' , $request->id)->where('type' , 'epics')->orderby('id' , 'desc')->get();
            $data = Epic::find($request->id);
            $html = view('epics.tabs.attachments', compact('attachments','data'))->render();
            return $html;
        }
        if($request->tab == 'teams')
        {
            $html = view('epics.tabs.teams')->render();
            return $html;
        }
        if($request->tab == 'flags')
        {
            $data = Epic::find($request->id);
            $flags = flags::where('epic_id' , $data->id)->orderby('flag_order' , 'asc')->get();
            $html = view('epics.tabs.flags', compact('flags','data'))->render();
            return $html;
        }
        if($request->tab == 'checkins')
        {
            $html = view('epics.tabs.checkins')->render();
            return $html;
        }
    }
}