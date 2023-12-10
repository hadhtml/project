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
use Carbon\Carbon;

class EpicController extends Controller
{
    public function getepicmodal(Request $request)
    {
        $data = Epic::find($request->id);
        $html = view('epics.modal', compact('data'))->render();
        return $html;
    }
    public function updategeneral(Request $request)
    {
        $data = Epic::find($request->epic_id);
        $data->epic_name = $request->epic_name;
        $data->epic_start_date = $request->epic_start_date;
        $data->epic_end_date = $request->epic_end_date;
        $data->epic_detail = $request->epic_detail;
        $data->save();  
    }
    public function showepicinboard(Request $request)
    {
        $e = Epic::find($request->id);
        if($request->organization == 'unit')
        {
            $organization  = DB::table('business_units')->where('slug',$request->slug)->first();
        }        
        if($request->organization == 'stream')
        {
            $organization  = DB::table('value_stream')->where('slug',$request->slug)->first();
        }
        if($request->organization == 'BU')
        {
          $organization  = DB::table('unit_team')->where('slug',$request->slug)->first();        
        }
        if($request->organization == 'VS')
        {
            $organization  = DB::table('value_team')->where('slug',$request->slug)->first();
        }
        $html = view('epics.showepicinboard', compact('organization','e'))->render();
        return $html;
    }
    public function showtab(Request $request)
    {
        if($request->tab == 'general')
        {
            $data = Epic::find($request->id);
            $html = view('epics.tabs.general', compact('data'))->render();
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
        $add->type = 'epics';
        $add->value_id = $request->value_id;
        $add->save();
        Cmf::save_activity(Auth::id() , 'Added a New Attachment','epics',$request->value_id);
        $attachments = attachments::where('value_id' , $request->value_id)->where('type' , 'epics')->orderby('id' , 'desc')->get();
        $data = Epic::find($request->value_id);
        $html = view('epics.tabs.attachments', compact('attachments','data'))->render();
        return $html;
    }
    public function deleteattachment(Request $request)
    {
        $attachment = attachments::find($request->id);
        attachments::where('id',$request->id)->delete();
        $attachments = attachments::where('value_id' , $attachment->value_id)->where('type' , 'epics')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Attachment','flags',$attachment->value_id);
        $data = Epic::find($attachment->value_id);
        $html = view('epics.tabs.attachments', compact('attachments','data'))->render();
        return $html;
    }
    public function createchilditem(Request $request)
    {
        $item = new epics_stroy();
        $item->epic_id = $request->epic_id;
        $item->epic_story_name = $request->epic_story_name;
        $item->story_assign = $request->story_assign;
        // $item->story_type = $request->story_type;
        $item->story_status = $request->story_status;
        $item->StoryID = Str::slug('SSP-'.rand(100,999));
        // $item->VS_BU_ID = $request->VS_BU_ID;
        $item->R_id = rand(100,999);
        $item->user_id =  Auth::id();
        $item->save();
        if($request->story_status == 'Done')
        {
            $item = epics_stroy::find($item->id);
            $item->progress =  100;
            $item->save();
        }
        $epic = Epic::find($request->epic_id);
        $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->orderby('id' , 'desc')->get();
        $html = view('epics.tabs.childitems', compact('epic','epicstory'))->render();
        return $html;
    }
    public function savecomment(Request $request)
    {
        $addcomment = new flag_comments();
        $addcomment->flag_id = $request->flag_id;
        $addcomment->user_id = $request->user_id;
        $addcomment->comment = $request->comment;
        $addcomment->type = 'comment';
        $addcomment->comment_type = 'epics';
        $addcomment->save();
        Cmf::save_activity(Auth::id() , 'Added a New Comment','epics',$request->flag_id);
        $comments = flag_comments::where('flag_id' , $request->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = Epic::find($request->flag_id);
        $html = view('epics.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function updatecomment(Request $request)
    {
        $addcomment = flag_comments::find($request->comment_id);
        $addcomment->comment = $request->comment;
        $addcomment->save();
        Cmf::save_activity(Auth::id() , 'Update a Comment','epics',$addcomment->flag_id);
        $comments = flag_comments::where('flag_id' , $addcomment->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = Epic::find($addcomment->flag_id);
        $html = view('epics.tabs.comments', compact('comments','data'))->render();
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
        Cmf::save_activity(Auth::id() , 'Reply a Comment','epics',$request->flag_id);
        $comments = flag_comments::where('flag_id' , $request->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = Epic::find($request->flag_id);
        $html = view('epics.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function deletecomment(Request $request)
    {
        $comment = flag_comments::find($request->id);
        flag_comments::where('id' , $request->id)->delete();
        flag_comments::where('comment_id' , $request->id)->delete();
        $comments = flag_comments::where('flag_id' , $comment->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Comment','epics',$comment->flag_id);
        $data = Epic::find($comment->flag_id);
        $html = view('epics.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
}