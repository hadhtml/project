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
            $comments = flag_comments::where('flag_id' , $request->id)->where('comment_type' , 'epicbacklog')->wherenull('comment_id')->orderby('id' , 'desc')->get();
            $data = team_backlog::find($request->id);
            $html = view('epicbacklog.tabs.comments', compact('comments','data'))->render();
            return $html;
        }
        if($request->tab == 'activites')
        {
            $activity = activities::where('value_id' , $request->id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
            $data = team_backlog::find($request->id);
            $html = view('epicbacklog.tabs.activities', compact('activity','data'))->render();
            return $html;
        }
        if($request->tab == 'attachment')
        {
            $extensions = attachments::where('value_id' , $request->id)->groupBy('extension')->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
            $attachments = attachments::where('value_id' , $request->id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
            $data = team_backlog::find($request->id);
            $html = view('epicbacklog.tabs.attachments', compact('attachments','data','extensions'))->render();
            return $html;
        }
        if($request->tab == 'teams')
        {
            $data = team_backlog::find($request->id);
            $html = view('epicbacklog.tabs.teams', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'flags')
        {
            $data = team_backlog::find($request->id);
            $flags = flags::where('epic_id' , $data->id)->where('epic_type' , 'backlog')->orderby('flags.flag_order' , 'asc')->get();
            $html = view('epicbacklog.tabs.flags', compact('flags','data'))->render();
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
        $data = team_backlog::find($request->epic_id);
        $data->epic_title = $request->epic_name;
        $data->epic_start_date = $request->epic_start_date;
        $data->epic_end_date = $request->epic_end_date;
        $data->epic_detail = $request->epic_detail;
        $data->save();
        if(!$request->epic_name)
        {
            $update = team_backlog::find($request->epic_id);
            $update->trash = $data->created_at;
            $update->save(); 
        }else{
            $update = team_backlog::find($request->epic_id);
            $update->trash = Null;
            $update->save(); 
        }
        $html = view('epicbacklog.tabs.general', compact('data'))->render();
        return $html;
    }
    public function showdataintable(Request $request)
    {
        if($request->type == 'BU')
        {
            $organization = DB::table('unit_team')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'org')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'orgT')
        {
            $organization = DB::table('org_team')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        $type = $request->type;
        $html = view('epicbacklog.indexappend',compact('Backlog','organization','type'));
        return $html;
    }
    public function createchilditem(Request $request)
    {
        $item = new epics_stroy();
        $item->epic_id = $request->epic_id;
        $item->epic_story_name = $request->epic_story_name;
        $item->story_assign = $request->story_assign;
        $item->story_type = $request->story_type;
        $item->description = $request->description;
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

    public function savecomment(Request $request)
    {
        $addcomment = new flag_comments();
        $addcomment->flag_id = $request->flag_id;
        $addcomment->user_id = $request->user_id;
        $addcomment->comment = $request->comment;
        $addcomment->type = 'comment';
        $addcomment->comment_type = 'epicbacklog';
        $addcomment->save();
        Cmf::save_activity(Auth::id() , 'Added a New Comment','epicbacklog',$request->flag_id , 'comment');
        $comments = flag_comments::where('flag_id' , $request->flag_id)->where('comment_type' , 'epicbacklog')->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = team_backlog::find($request->flag_id);
        $html = view('epicbacklog.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function savereply(Request $request)
    {
        $addcomment = new flag_comments();
        $addcomment->flag_id = $request->flag_id;
        $addcomment->user_id = $request->user_id;
        $addcomment->comment = $request->comment;
        $addcomment->type = 'reply';
        $addcomment->comment_id = $request->comment_id;
        $addcomment->save();
        Cmf::save_activity(Auth::id() , 'Reply a Comment','epicbacklog',$request->flag_id, 'reply');
        $comments = flag_comments::where('flag_id' , $request->flag_id)->where('comment_type' , 'epicbacklog')->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = team_backlog::find($request->flag_id);
        $html = view('epicbacklog.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function updatecomment(Request $request)
    {
        $addcomment = flag_comments::find($request->comment_id);
        $addcomment->comment = $request->comment;
        $addcomment->save();
        Cmf::save_activity(Auth::id() , 'Update a Comment','epicbacklog',$addcomment->flag_id, 'comment');
        $comments = flag_comments::where('flag_id' , $addcomment->flag_id)->where('comment_type' , 'epicbacklog')->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = team_backlog::find($addcomment->flag_id);
        $html = view('epicbacklog.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function deletecomment(Request $request)
    {
        $comment = flag_comments::find($request->id);
        flag_comments::where('id' , $request->id)->delete();
        flag_comments::where('comment_id' , $request->id)->delete();
        $comments = flag_comments::where('flag_id' , $comment->flag_id)->where('comment_type' , 'epicbacklog')->wherenull('comment_id')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Comment','epicbacklog',$comment->flag_id, 'delete');
        $data = team_backlog::find($comment->flag_id);
        $html = view('epicbacklog.tabs.comments', compact('comments','data'))->render();
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
        Cmf::save_activity(Auth::id() , 'Added a New Attachment','epicbacklog',$request->value_id , 'attach_file');
        $attachments = attachments::where('value_id' , $request->value_id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $data = team_backlog::find($request->value_id);
        $html = view('epicbacklog.tabs.attachments', compact('attachments','data'))->render();
        return $html;
    }
    public function deleteattachment(Request $request)
    {
        $attachment = attachments::find($request->id);
        attachments::where('id',$request->id)->delete();
        $attachments = attachments::where('value_id' , $attachment->value_id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Attachment','epicbacklog',$attachment->value_id , 'delete');
        $data = team_backlog::find($request->value_id);
        $html = view('epicbacklog.tabs.attachments', compact('attachments','data'))->render();
        return $html;
    }
    public function selectteamforepic(Request $request)
    {
        $update = team_backlog::find($request->epic_id);
        $update->team_id = $request->id;
        $update->save();
        if($update->type == 'unit')
        {
            $teams = DB::table('unit_team')->where('org_id',$update->unit_id)->where('type' , 'BU')->get();
        }
        if($update->type == 'org')
        {
            $teams = DB::table('org_team')->where('org_id',$update->unit_id)->where('type' , 'orgT')->get();
        }
        if($update->type == 'stream')
        {
            $teams = DB::table('value_team')->where('org_id',$update->unit_id)->where('type' , 'VS')->get();
        }
        $update = $update;
        $html = view('epics.teamappend', compact('teams','update'))->render();
        return $html;                 
    }
    public function addnewbacklogepic(Request $request)
    {

        $counter = 0;
        $data = DB::table('team_backlog')->orderby('id','DESC')->where('user_id',Auth::id())->first();
        if($data)
        {
        $counter = $data->position + 1; 
        }
        $add = new team_backlog();
        $add->unit_id = $request->unit_id;
        $add->type = $request->type;
        $add->position = $counter;
        $add->epic_status = 'To Do';
        $add->user_id = Auth::id();
        $add->save();

        $year =  date('Y');
        $month = date('m');
        $day =  date('d');
        $date = $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT);

        $update = team_backlog::find($add->id);
        $update->trash = $add->created_at;
        $update->epic_start_date = $date;
        $update->epic_end_date = $date;
        $update->save();

        return $add->id;
    }
    public function saveepicflag(Request $request)
    {
        $flag = new flags();
        $flag->business_units = $request->business_units;
        $flag->epic_id = $request->flag_epic_id;
        $flag->flag_type = $request->flag_type;
        $flag->flag_title = $request->flag_title;
        $flag->flag_description = $request->flag_description;
        $flag->archived = 2;
        $flag->flag_status = 'todoflag';
        $flag->epic_type = 'backlog';
        $flag->board_type = $request->board_type;
        $flag->save();
        $member = new flag_members();
        $member->member_id = $request->flag_assign;
        $member->flag_id = $flag->id;
        $member->save();
    }
    public function flagupdate(Request $request)
    {
        $update = flags::find($request->flag_id);
        $update->flag_type = $request->flag_type;
        $update->flag_title = $request->flag_title;
        $update->flag_description = $request->flag_description;
        $update->save();
    }
    public function updateflagstatus(Request $request)
    {
        $flags = flags::find($request->id);
        $flags->flag_status = $request->status;
        $flags->save();
    }
}