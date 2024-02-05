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
    public function index($id,$type)
    {
        if($type == 'BU')
        {
            $organization = DB::table('unit_team')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'BU')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'stream')
        {
            $organization = DB::table('value_stream')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'stream')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'VS')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$id)->first();     
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'org')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'orgT')
        {
            $organization = DB::table('org_team')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->where('type' , 'orgT')->orderby('position')->where('assign_status',NULL)->get();
        }

        if($type == 'unit')
        {
            $organization = DB::table('business_units')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->where('type' , 'unit')->orderby('position')->where('assign_status',NULL)->get();
        }

        return view('epicbacklog.index',compact('Backlog','organization','type'));  
    }
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
        if($request->status == 'Done')
        {
         team_backlog::where('id' , $request->id)->update(array('progress' => 100));  
        }else
        {
            team_backlog::where('id' , $request->id)->update(array('progress' => 0));  

        }
    }
    public function updategeneral(Request $request)
    {
        $data = team_backlog::find($request->epic_id);
        if($data->epic_title != $request->epic_name)
        {
            if($data->epic_title)
            {
                $rand = rand(123456789 , 987654321);
                $activity = 'has updated Title Field <a href="javascript:void(0)" onclick="showdetailsofactivity('.$rand.')">See Details</a> <div class="activitydetalbox deletecomment" id="activitydetalbox'.$rand.'"><div class="row"> <div class="col-md-10"> <h4>Title Update</h4> </div> <div class="col-md-2"> <img onclick="showdetailsofactivity('.$rand.')" src="'.url("public/assets/svg/crossdelete.svg").'"> </div> </div><p style="margin-bottom:0px;">'.$data->epic_title.'</p><div class="text-center mt-2 mb-2"><span class="material-symbols-outlined"> arrow_downward </span></div><p>'.$request->epic_name.'</p></div>';
                Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$request->epic_id, 'edit');
            }else{
                $activity = 'Added a Epic Tittle';
                Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$request->epic_id, 'edit');
            }
        }
        if($data->epic_detail != $request->epic_detail)
        {
            if($data->epic_detail)
            {
                $rand = rand(123456781239 , 987651234321);
                $activity = 'has updated Description Field <a href="javascript:void(0)" onclick="showdetailsofactivity('.$rand.')">See Details</a> <div class="activitydetalbox deletecomment" id="activitydetalbox'.$rand.'"><div class="row"> <div class="col-md-10"> <h4>Description Update</h4> </div> <div class="col-md-2"> <img onclick="showdetailsofactivity('.$rand.')" src="'.url("public/assets/svg/crossdelete.svg").'"> </div> </div><p style="margin-bottom:0px;">'.$data->epic_detail.'</p><div class="text-center mt-2 mb-2"><span class="material-symbols-outlined"> arrow_downward </span></div><p>'.$request->epic_detail.'</p></div>';
                Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$request->epic_id, 'edit');
            }else{
                $activity = 'Added a Description';
                Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$request->epic_id, 'edit');
            }
        }

        if($data->epic_start_date != $request->epic_start_date)
        {
            $activity = 'has updated Start Date From '.Cmf::date_format_new($data->epic_start_date).' To '.Cmf::date_format_new($request->epic_start_date).' ';
            Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$request->epic_id, 'edit');
        }
        if($data->epic_end_date != $request->epic_end_date)
        {
            $activity = 'has updated End Date From '.Cmf::date_format_new($data->epic_end_date).' To '.Cmf::date_format_new($request->epic_end_date).' ';
            Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$request->epic_id, 'edit');
        }
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
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'BU')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'VS')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'stream')
        {
            $organization = DB::table('value_stream')->where('slug',$request->id)->first();     
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'stream')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'org')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'orgT')
        {
            $organization = DB::table('org_team')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'orgT')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($request->type == 'unit')
        {
            $organization = DB::table('business_units')->where('slug',$request->id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->where('type' , 'unit')->orderby('position')->where('assign_status',NULL)->get();
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
            $items = epics_stroy::find($item->id);
            $items->progress =  100;
            $items->save();
        }

        $epicprogress = DB::table("epics_stroy")->where("epic_id", $request->epic_id)->sum("progress");
        $count = DB::table("epics_stroy")->where("epic_id", $request->epic_id)->count();
        if($count > 0)
        {
        $total = round($epicprogress / $count, 2);
        if($total == 100)
        {
        DB::table("team_backlog")->where("id", $request->epic_id)->update(["progress" => $total,"epic_status" => 'Done']);
            
        }else
        {
        DB::table("team_backlog")->where("id", $request->epic_id)->update(["progress" => $total,"epic_status" => 'To Do']);
    
        }
        }

        Cmf::save_activity(Auth::id() , 'Added a New Child Item','epicbacklog',$request->epic_id , 'toc');
        $epic = team_backlog::find($request->epic_id);
        $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->where('epic_type' , 'backlog')->orderby('id' , 'desc')->get();
        $html = view('epicbacklog.tabs.childitems', compact('epic','epicstory'))->render();
        return $html;
    }
    public function updatechlditem(Request $request)
    {
        $item = epics_stroy::find($request->id);
        $item->epic_story_name = $request->epic_story_name;
        $item->story_assign = $request->story_assign;
        $item->story_type = $request->story_type;
        $item->description = $request->description;
        $item->story_status = $request->story_status;
        $item->save();
        if($request->story_status == 'Done')
        {
            $items = epics_stroy::find($item->id);
            $items->progress =  100;
            $items->save();
        }else
        {
            $items = epics_stroy::find($item->id);
            $items->progress =  0;
            $items->save();
        }

        $epicid = DB::table("epics_stroy")->where("id", $request->id)->first();
        $epicprogress = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->sum("progress");
        $count = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->count();
        if($count > 0)
        {
        $total = round($epicprogress / $count, 2);
        if($total == 100)
        {
        DB::table("team_backlog")->where("id", $epicid->epic_id)->update(["progress" => $total,"epic_status" => 'Done']);
            
        }else
        {
        DB::table("team_backlog")->where("id", $epicid->epic_id)->update(["progress" => $total,"epic_status" => 'To Do']);
    
        }
        }
        $epic = team_backlog::find($item->epic_id);
        $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->where('epic_type' , 'backlog')->orderby('id' , 'desc')->get();
        $html = view('epicbacklog.tabs.childitems', compact('epic','epicstory'))->render();
        return $html;
    }

    public function deletechilditem(Request $request)
    {
        epics_stroy::where('id' , $request->id)->delete();
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
        $extensions = attachments::where('value_id' , $request->value_id)->groupBy('extension')->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $attachments = attachments::where('value_id' , $request->value_id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $data = team_backlog::find($request->value_id);
        $html = view('epicbacklog.tabs.attachments', compact('attachments','data','extensions'))->render();
        return $html;
    }
    public function deleteattachment(Request $request)
    {
        $attachment = attachments::find($request->id);
        attachments::where('id',$request->id)->delete();
        $attachments = attachments::where('value_id' , $attachment->value_id)->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Attachment','epicbacklog',$attachment->value_id , 'delete');
        $data = team_backlog::find($attachment->value_id);
        $extensions = attachments::where('value_id' , $attachment->value_id)->groupBy('extension')->where('type' , 'epicbacklog')->orderby('id' , 'desc')->get();
        $html = view('epicbacklog.tabs.attachments', compact('attachments','data','extensions'))->render();
        return $html;
    }
    public function selectteamforepic(Request $request)
    {
        $update = team_backlog::find($request->epic_id);
        if($update->team_id == $request->id)
        {
            $update->team_id = Null;
        }else{
            $update->team_id = $request->id;
        }
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
        if($update->type == 'VS')
        {
            $teams = DB::table('value_team')->where('id',$update->unit_id)->where('type' , 'VS')->get();
        }
        if($update->type == 'BU')
        {
            $teams = DB::table('unit_team')->where('id',$update->unit_id)->where('type' , 'BU')->get();
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

        $activity = 'Created the Epic on '.Cmf::date_format_new($update->created_at).' at '.Cmf::date_format_time($update->created_at);
        Cmf::save_activity(Auth::id() , $activity,'epicbacklog',$update->id , 'image');
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
    public function changeitemstatus(Request $request)
    {
        $item = epics_stroy::find($request->id);
        $item->story_status = $request->status;
        $item->save();

        if($request->status == 'Done')
        {
            $items = epics_stroy::find($item->id);
            $items->progress =  100;
            $items->save();
        }else
        {
            $items = epics_stroy::find($item->id);
            $items->progress =  0;
            $items->save();
        }

        $epicid = DB::table("epics_stroy")->where("id", $request->id)->first();
        $epicprogress = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->sum("progress");
        $count = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->count();
        if($count > 0)
        {
        $total = round($epicprogress / $count, 2);
        if($total == 100)
        {
        DB::table("team_backlog")->where("id", $epicid->epic_id)->update(["progress" => $total,"epic_status" => 'Done']);
            
        }else
        {
        DB::table("team_backlog")->where("id", $epicid->epic_id)->update(["progress" => $total,"epic_status" => 'To Do']);
    
        }
        }
       
    }
    public function cloneepic($id,$type)
    {
        $log = DB::table('team_backlog')->where('id',$id)->first();
        $count = DB::table('team_backlog')->where('backlog_id',$id)->count();
        $Pos = DB::table('team_backlog')->orderby('id','DESC')->where('user_id',Auth::id())->first();
        $counterepic = 1;
        if($count > 0)
        {
            $counterepic = $count ++;
        }
        $counter = $Pos->position + 1;
        $add = new team_backlog();
        $add->epic_status = $log->epic_status;
        $add->epic_title = $log->epic_title. '-Copy('.$counterepic.')';
        $add->epic_detail = $log->epic_detail;
        $add->epic_start_date = $log->epic_start_date;
        $add->epic_end_date = $log->epic_end_date;
        $add->unit_id = $log->unit_id;
        $add->assign_status = $log->assign_status;
        $add->jira_id = $log->jira_id;
        $add->quarter = $log->quarter;
        $add->jira_project = $log->jira_project;
        $add->team_id = $log->team_id;
        $add->position = $counter;
        $add->account_id = $log->account_id;
        $add->type = $log->type;
        $add->user_id = Auth::id();
        $add->backlog_id = $id;
        $add->progress = $log->progress;;
        $add->save();
        foreach (epics_stroy::where('epic_id' , $id)->where('epic_type' , 'epicbacklog')->get() as $r) {
            $item = new epics_stroy();
            $item->epic_id = $add->id;
            $item->epic_story_name = $r->epic_story_name;
            $item->story_assign = $r->story_assign;
            $item->story_type = $r->story_type;
            $item->description = $r->description;
            $item->story_status = $r->story_status;
            $item->StoryID = $r->StoryID;
            $item->epic_type = $r->epic_type;
            $item->R_id = $r->R_id;
            $item->user_id =  $r->user_id;
            $item->save();
            if($r->story_status == 'Done')
            {
                $item = epics_stroy::find($item->id);
                $item->progress =  100;
                $item->save();
            }
        }
        foreach(activities::where('value_id' , $id)->get() as $r) {
            $activity = new activities();
            $activity->user_id = $r->user_id;
            $activity->activity = $r->activity;
            $activity->is_read = $r->is_read;
            $activity->value_id = $add->id;
            $activity->type = $r->type;
            $activity->icon = $r->icon;
            $activity->created_at = $r->created_at;
            $activity->updated_at = $r->updated_at;
            $activity->save();
        }
        foreach(epics_stroy::where('epic_id' , $id)->get() as $r) {
            $item = new epics_stroy();
            $item->epic_id = $add->id;
            $item->epic_story_name = $r->epic_story_name;
            $item->story_assign = $r->story_assign;
            $item->story_type = $r->story_type;
            $item->description = $r->description;
            $item->story_status = $r->story_status;
            $item->StoryID = $r->StoryID;
            $item->epic_type = $r->epic_type;
            $item->progress =  $r->progress;
            $item->R_id = $r->R_id;
            $item->user_id =  $r->user_id;
            $item->save();
        }
        foreach(flag_comments::where('flag_id' , $id)->get() as $r) {
            $comment = new flag_comments();
            $comment->flag_id = $add->id;
            $comment->user_id = $r->user_id;
            $comment->comment = $r->comment;
            $comment->type = $r->type;
            $comment->comment_id = $r->comment_id;
            $comment->comment_type = $r->comment_type;
            $comment->created_at = $r->created_at;
            $comment->updated_at = $r->updated_at;
            $comment->save();

            $commentReply = flag_comments::where('flag_id',$comment->flag_id)->where('type','comment')->first();
            flag_comments::where('flag_id',$comment->flag_id)->where('type','reply')->update(['comment_id' => $commentReply->id ]);

        }
        foreach(attachments::where('value_id' , $id)->get() as $r) {
            $attachment = new attachments();
            $attachment->user_id = $r->user_id;
            $attachment->attachment = $r->attachment;
            $attachment->file_name = $r->file_name;
            $attachment->extension = $r->extension;
            $attachment->type = $r->type;
            $attachment->value_id = $add->id;
            $attachment->created_at = $r->created_at;
            $attachment->updated_at = $r->updated_at;
            $attachment->save();
        }
        foreach(flags::where('epic_id' , $id)->where('epic_type' , 'backlog')->get() as $r) {
            $flag = new flags();
            $flag->epic_id = $add->id;
            $flag->business_units = $r->business_units;
            $flag->flag_type = $r->flag_type;
            $flag->flag_title = $r->flag_title;
            $flag->flag_description = $r->flag_description;
            $flag->flag_status = $r->flag_status;
            $flag->flag_order = $r->flag_order;
            $flag->archived = $r->archived;
            $flag->board_type = $r->board_type;
            $flag->board_order = $r->board_order;
            $flag->escalate = $r->escalate;
            $flag->flag_assign = $r->flag_assign;
            $flag->epic_type = $r->epic_type;
            $flag->created_at = $r->created_at;
            $flag->updated_at = $r->updated_at;
            $flag->save();
        }
        return redirect()->back()->with('message', 'Epic Clone Successfully');
    }

    public function orderbychilditembacklog(Request $request)
    {
        $orderby = $request->order;
        $epic = team_backlog::find($request->epic_id);
        if($request->order == 'To Do')
        {
            $epicstory = DB::table('epics_stroy')->where('epic_id',$request->epic_id)->where('epic_type' , 'backlog')->orderByRaw(DB::raw("FIELD(story_status, 'To Do', 'In progress', 'Done')"))->get();   
        }
        if($request->order == 'In progress')
        {
            $epicstory = DB::table('epics_stroy')->where('epic_id',$request->epic_id)->where('epic_type' , 'backlog')->orderByRaw(DB::raw("FIELD(story_status, 'In progress', 'To Do', 'Done')"))->get();   
        }
        if($request->order == 'Done')
        {
            $epicstory = DB::table('epics_stroy')->where('epic_id',$request->epic_id)->where('epic_type' , 'backlog')->orderByRaw(DB::raw("FIELD(story_status, 'Done', 'In progress', 'To Do')"))->get();   
        }
        $html = view('epicbacklog.tabs.childitems', compact('epic','epicstory'))->render();
        return $html;   
    }
}