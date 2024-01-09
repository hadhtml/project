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
use App\Models\epics_stroy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Avatar;
use Carbon\Carbon;

class EpicBacklogController extends Controller
{
    public function getepicmodal(Request $request)
    {
        $data = DB::table($request->table)->where('id' , $request->id)->first();
        $table = $request->table;
        $html = view('epicbacklog.modal', compact('data','table'))->render();
        return $html;
    }
    public function showheader(Request $request)
    {
        $data = DB::table($request->table)->where('id' , $request->id)->first();
        $html = view('epicbacklog.modalheader', compact('data'))->render();
        return $html;
    }
    public function showtab(Request $request)
    {
        if($request->tab == 'general')
        {
            $data = DB::table($request->table)->where('id' , $request->id)->first();
            $table = $request->table;
            $html = view('epicbacklog.tabs.general', compact('data','table'))->render();
            return $html;
        }
        if($request->tab == 'asign')
        {
            $data = DB::table($request->table)->where('id' , $request->id)->first();
            $html = view('epicbacklog.tabs.asign', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'comments')
        {
            $comments = flag_comments::where('flag_id' , $request->id)->where('comment_type' , 'epics')->wherenull('comment_id')->orderby('id' , 'desc')->get();
            $data = Epic::find($request->id);
            $html = view('epics.tabs.comments', compact('comments','data'))->render();
            return $html;
        }
        if($request->tab == 'activites')
        {
            $activity = activities::where('value_id' , $request->id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
            $data = Epic::find($request->id);
            $html = view('epics.tabs.activities', compact('activity','data'))->render();
            return $html;
        }
        if($request->tab == 'attachment')
        {
            $extensions = attachments::where('value_id' , $request->id)->groupBy('extension')->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
            $attachments = attachments::where('value_id' , $request->id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
            $data = DB::table($request->table)->where('id' , $request->id)->first();
            $table = $request->table;
            $html = view('epicbacklog.tabs.attachments', compact('attachments','data','table','extensions'))->render();
            return $html;
        }
        if($request->tab == 'teams')
        {
            $data = Epic::find($request->id);
            $html = view('epics.tabs.teams', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'flags')
        {
            $data = Epic::find($request->id);
            $flags = flags::where('epic_id' , $data->id)->orderby('flags.flag_order' , 'asc')->get();
            $html = view('epics.tabs.flags', compact('flags','data'))->render();
            return $html;
        }
        if($request->tab == 'checkins')
        {
            $html = view('epics.tabs.checkins')->render();
            return $html;
        }
    }
    public function uploadattachment(Request $request)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $add = new attachments();
        $add->user_id = Auth::id();
        $add->attachment = Cmf::sendimagetodirectory($request->file);
        $add->file_name = $request->file('file')->getClientOriginalName();
        $add->extension = Cmf::get_file_extension($filename);
        $add->type = 'epicbacklog';
        $add->value_id = $request->value_id;
        $add->save();
        Cmf::save_activity(Auth::id() , 'Added a New Attachment','epicbacklog',$request->value_id);

        $extensions = attachments::where('value_id' , $request->value_id)->groupBy('extension')->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $attachments = attachments::where('value_id' , $request->value_id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $data = DB::table($request->table)->where('id' , $request->value_id)->first();
        $table = $request->table;
        $html = view('epicbacklog.tabs.attachments', compact('attachments','data','table','extensions'))->render();
        return $html;
    }
    public function deleteattachment(Request $request)
    {
        $attachment = attachments::find($request->id);
        attachments::where('id',$request->id)->delete();
        Cmf::save_activity(Auth::id() , 'has Deleted Attachment','epicbacklog',$attachment->value_id);
        $extensions = attachments::where('value_id' , $attachment->value_id)->groupBy('extension')->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $attachments = attachments::where('value_id' , $attachment->value_id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $data = DB::table($request->table)->where('id' , $attachment->value_id)->first();
        $table = $request->table;
        $html = view('epicbacklog.tabs.attachments', compact('attachments','data','table','extensions'))->render();
        return $html;
    }
}