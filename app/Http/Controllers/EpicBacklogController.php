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
use App\Models\epics_stroy;
use App\Models\team_backlog;
use App\Models\backlog;
use App\Models\backlog_unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Avatar;
use Carbon\Carbon;

class EpicBacklogController extends Controller
{
    public function getepicmodal(Request $request)
    {
        $data = team_backlog::find($request->id);
        $html = view('epicbacklog.modal', compact('data'))->render();
        return $html;
    }
    public function showheader(Request $request)
    {
        $data = team_backlog::find($request->id);
        $html = view('epicbacklog.modalheader', compact('data'))->render();
        return $html;
    }
    public function showtab(Request $request)
    {
        if($request->tab == 'general')
        {
            $data = team_backlog::find($request->id);
            $html = view('epicbacklog.tabs.general', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'asign')
        {
            $data = team_backlog::find($request->id);
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
        if($request->tab == 'childitems')
        {
            $epic = team_backlog::find($request->id);
            $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->where('epic_type' , 'backlog')->orderby('sort_order' , 'asc')->get();
            $html = view('epicbacklog.tabs.childitems', compact('epic','epicstory'))->render();
            return $html;
        }
    }
    public function changeepicdate(Request $request)
    {
        $data = team_backlog::find($request->epic_id);
        $data->epic_start_date = $request->start;
        $data->epic_end_date = $request->end;
        $data->save();
    }
    public function changeepicstatus(Request $request)
    {
        team_backlog::where('id' , $request->id)->update(array('epic_status' =>$request->status));
    }
    public function updategeneral(Request $request)
    {

        if($request->table == 'team_backlog')
        {
            $data = team_backlog::find($request->epic_id);
            $data->epic_title = $request->epic_name;
            $data->epic_start_date = $request->epic_start_date;
            $data->epic_end_date = $request->epic_end_date;
            $data->epic_detail = $request->epic_detail;
            $data->save();
        }
        
        if($request->table == 'backlog')
        {
            $data = backlog::find($request->epic_id);
            $data->epic_title = $request->epic_name;
            $data->epic_start_date = $request->epic_start_date;
            $data->epic_end_date = $request->epic_end_date;
            $data->epic_detail = $request->epic_detail;
            $data->save();
        }

        if($request->table == 'backlog_unit')
        {
            $data = backlog_unit::find($request->epic_id);
            $data->epic_title = $request->epic_name;
            $data->epic_start_date = $request->epic_start_date;
            $data->epic_end_date = $request->epic_end_date;
            $data->epic_detail = $request->epic_detail;
            $data->save();   
        }

        $table = $request->table;
        $html = view('epicbacklog.tabs.general', compact('data','table'))->render();
        return $html;
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
    public function createchilditem(Request $request)
    {
        $item = new epics_stroy();
        $item->epic_id = $request->epic_id;
        $item->epic_story_name = $request->epic_story_name;
        $item->story_assign = $request->story_assign;
        $item->story_type = $request->story_type;
        $item->story_status = $request->story_status;
        $item->StoryID = Str::slug('SSP-'.rand(100,999));
        $item->epic_type = 'backlog';
        $item->R_id = rand(100,999);
        $item->user_id =  Auth::id();
        $item->save();
        if($request->story_status == 'Done')
        {
            $item = epics_stroy::find($item->id);
            $item->progress =  100;
            $item->save();
        }
        $epic = team_backlog::find($request->epic_id);
        $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->where('epic_type' , 'backlog')->orderby('id' , 'desc')->get();
        $html = view('epics.tabs.childitems', compact('epic','epicstory'))->render();
        return $html;
    }
    public function sortchilditem(Request $request)
    {
        $flagcount = epics_stroy::where('epic_id' , $request->epic_id)->where('epic_type' , 'backlog')->count();
        $i = 0;
        foreach ($request->order as $key=>$r) {
            $test = $key+1;
            if ($i++ > $flagcount) break;
            $item = epics_stroy::find($r);
            $item->sort_order = $i;
            $item->save();       
        }
    }
}