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
        if($data->epic_name != $request->epic_name)
        {
            $rand = rand(123456789 , 987654321);
            $activity = 'has updated Title Field <a href="javascript:void(0)" onclick="showdetailsofactivity('.$rand.')">See Details</a> <div class="activitydetalbox deletecomment" id="activitydetalbox'.$rand.'"><div class="row"> <div class="col-md-10"> <h4>Title Update</h4> </div> <div class="col-md-2"> <img onclick="showdetailsofactivity('.$rand.')" src="'.url("public/assets/svg/crossdelete.svg").'"> </div> </div><p style="margin-bottom:0px;">'.$data->epic_name.'</p><div class="text-center mt-2 mb-2"><span class="material-symbols-outlined"> arrow_downward </span></div><p>'.$request->epic_name.'</p></div>';
            Cmf::save_activity(Auth::id() , $activity,'epics',$request->epic_id, 'edit');
        }
        if($data->epic_detail != $request->epic_detail)
        {
            if($data->epic_detail)
            {
                $rand = rand(123456781239 , 987651234321);
                $activity = 'has updated Description Field <a href="javascript:void(0)" onclick="showdetailsofactivity('.$rand.')">See Details</a> <div class="activitydetalbox deletecomment" id="activitydetalbox'.$rand.'"><div class="row"> <div class="col-md-10"> <h4>Description Update</h4> </div> <div class="col-md-2"> <img onclick="showdetailsofactivity('.$rand.')" src="'.url("public/assets/svg/crossdelete.svg").'"> </div> </div><p style="margin-bottom:0px;">'.$data->epic_detail.'</p><div class="text-center mt-2 mb-2"><span class="material-symbols-outlined"> arrow_downward </span></div><p>'.$request->epic_detail.'</p></div>';
                Cmf::save_activity(Auth::id() , $activity,'epics',$request->epic_id, 'edit');
            }else{
                $activity = 'Added a Description';
                Cmf::save_activity(Auth::id() , $activity,'epics',$request->epic_id, 'edit');
            }
        }
        $data->epic_name = $request->epic_name;
        $data->epic_start_date = $request->epic_start_date;
        $data->epic_end_date = $request->epic_end_date;
        $data->epic_detail = $request->epic_detail;
        $data->save();





        $month = date("F",strtotime($request->epic_end_date));
        $year = date("Y",strtotime($request->epic_end_date));
        $quarterMonth  = DB::table('quarter_month')->where('id' , $data->month_id)->first();        
        $quarterMonthtoselect  = DB::table('quarter_month')->where('year' , $year)->where('month' , $month)->where('initiative_id' , $data->initiative_id)->first();
        $data = Epic::find($request->epic_id);
        $data->month_id = $quarterMonthtoselect->id;
        $data->save();
        if(!$request->epic_name)
        {
            $update = Epic::find($request->epic_id);
            $update->trash = $data->created_at;
            $update->save(); 
        }else{
            $update = Epic::find($request->epic_id);
            $update->trash = Null;
            $update->save(); 
        }
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $yearMonthString = $currentDate->format("Y");
        $yearMonth = $currentDate->format("F");
        $CurrentQuarter = "";
        $QuarterCount = "";
        $CurrentQuarter = DB::table("quarter_month")->where("initiative_id", $data->initiative_id)->where("month", $yearMonth)->where("year", $yearMonthString)->first();
        $Quartertotal = 0;
        $totalinitiative = 0;
        $finaltotal = 0;
        $Quarter = DB::table("epics")->where("id", $data->id)->first();
        if ($CurrentQuarter) {
            $QuarterCount = DB::table("epics")->where("quarter_id", $CurrentQuarter->quarter_id)->where("trash", null)->count();
            $Quarterprogress = DB::table("epics")->where("quarter_id", $CurrentQuarter->quarter_id)->where("epic_progress", "=", 100)->where("trash", null)->count();
        }
        if ($QuarterCount > 0) {
            $Quartertotal = round(($Quarterprogress / $QuarterCount) * 100, 2);
            DB::table("quarter")->where("id", $CurrentQuarter->quarter_id)->update(["quarter_progress" => $Quartertotal]);
            DB::table("initiative")->where("id", $CurrentQuarter->initiative_id)->update(["q_initiative_prog" => $Quartertotal]);
        }
        $initcount = DB::table("initiative")->where("key_id", $data->key_id)->sum("initiative_weight");
        if ($initcount == 100) {
            $epic = DB::table("epics")->where("id", $data->id)->first();
            $epicinitiativecount = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("trash", null)->count();
            $initiativeprogress = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("epic_progress", "=", 100)->where("trash", null)->count();
            $totalinitiative = $initiativeprogress / $epicinitiativecount;
            $finaltotal = $totalinitiative * 100;
            $intw = DB::table("initiative")->where("id", $epic->initiative_id)->first();
            $resultinit = $intw->initiative_weight / 100;
            $newresultinit = round($resultinit * $finaltotal, 2);
            DB::table("initiative")->where("id", $epic->initiative_id)->update(["initiative_prog" => $newresultinit]);
        } else {
            $epic = DB::table("epics")->where("id", $data->id)->first();
            $epicinitiativecount = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("trash", null)->count();
            $initiativeprogress = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("trash", null)->where("epic_progress", "=", 100)->count();
            if ($epicinitiativecount > 0) {
                $totalinitiative = $initiativeprogress / $epicinitiativecount;
                $finaltotal = $totalinitiative * 100;
            }
            DB::table("initiative")->where("id", $epic->initiative_id)->update(["initiative_prog" => $finaltotal]);
        }
        $objwcount = DB::table("key_result")->where("obj_id", $data->obj_id)->sum("weight");
        if ($objwcount == 100) {
            $keycount = DB::table("initiative")->where("key_id", $data->key_id)->count();
            $keyprogress = DB::table("initiative")->where("key_id", $data->key_id)->where("initiative_prog", "=", 100)->count();
            $totalkey = $keyprogress / $keycount;
            $finaltotalkey = $totalkey * 100;
            $keyw = DB::table("key_result")->where("id", $data->key_id)->first();
            $result = $keyw->weight / 100;
            $newresult = intval($result * $finaltotalkey);
            DB::table("key_result")->where("id", $data->key_id)->update(["key_prog" => $newresult]);
        } else {
            $keycount = DB::table("initiative")->where("key_id", $data->key_id)->count();
            $keyprogress = DB::table("initiative")->where("key_id", $data->key_id)->where("initiative_prog", "=", 100)->count();
            $totalkey = $keyprogress / $keycount;
            $finaltotalkey = $totalkey * 100;
            DB::table("key_result")->where("id", $data->key_id)->update(["key_prog" => $finaltotalkey]);
            $QuarterprogressKey = DB::table("initiative")->where("key_id", $request->epic_key)->where("q_initiative_prog", "=", 100)->count();
            $QuartertotalKey = round(($QuarterprogressKey / $keycount) * 100,2);
            DB::table("key_result")->where("id", $data->key_id)->update(["q_key_prog" => $QuartertotalKey]);
        }
        $objcount = DB::table("key_result")->where("obj_id", $data->obj_id)->count();
        $objprogress = DB::table("key_result")->where("obj_id", $data->obj_id)->where("key_prog", "=", 100)->count();
        $totalobj = $objprogress / $objcount;
        $finaltotalobj = $totalobj * 100;
        DB::table("objectives")->where("id", $data->obj_id)->update(["obj_prog" => $finaltotalobj]);
        $QuarterprogressObj = DB::table("key_result")->where("obj_id", $data->obj_id)->where("q_key_prog", "=", 100)->count();
        $QuartertotalObj = round(($QuarterprogressObj / $objcount) * 100, 2);
        DB::table("objectives")->where("id", $data->obj_id)->update(["q_obj_prog" => $QuartertotalObj]);
        if ($data->epic_type == "unit") {
            $organization = DB::table("business_units")->where("id", $data->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $data->buisness_unit_id)->where("trash", null)->where("type", "unit")->get();
        }
        if ($data->epic_type == "stream") {
        
            $organization = DB::table("value_stream")->where("id", $data->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $data->buisness_unit_id)->where("trash", null)->where("type", "stream")->get();
        }
        if ($data->epic_type == "BU") {
            $organization = DB::table("unit_team")->where("id", $data->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $data->buisness_unit_id)->where("trash", null)->where("type", "BU")->get();
        }
        if ($data->epic_type == "VS") {
            $organization = DB::table("value_team")->where("id", $data->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $data->buisness_unit_id)->where("trash", null)->where("type", "VS")->get();
        }
        if ($data->epic_type == "org") {
            $organization = DB::table("organization")->where("id", $data->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $data->buisness_unit_id)->where("trash", null)->where("type", "org")->get();
        }
        if ($data->epic_type == "orgT") {
            $organization = DB::table("org_team")->where("id", $data->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $data->buisness_unit_id)->where("trash", null)->where("type", "orgT")->get();
        }
        return view("objective.objective-render",compact("organization", "objective"));
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
        if($request->organization == 'org')
        {
            $organization  = DB::table('organization')->where('slug',$request->slug)->first();
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
            $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->id)->orderby('sort_order' , 'asc')->get();
            $html = view('epics.tabs.childitems', compact('epic','epicstory'))->render();
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
    public function removeteamfromepic(Request $request)
    {
        $data = Epic::find($request->id);
        $data->team_id = null;
        $data->save();
        $html = view('epics.tabs.teams', compact('data'))->render();
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
        $add->type = 'epics';
        $add->value_id = $request->value_id;
        $add->save();
        Cmf::save_activity(Auth::id() , 'Added a New Attachment','epics',$request->value_id , 'attach_file');
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
        Cmf::save_activity(Auth::id() , 'Delete a Attachment','flags',$attachment->value_id , 'delete');
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
        $item->story_type = $request->story_type;
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
        Cmf::save_activity(Auth::id() , 'Added a New Comment','epics',$request->flag_id , 'comment');
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
        Cmf::save_activity(Auth::id() , 'Update a Comment','epics',$addcomment->flag_id, 'comment');
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
        Cmf::save_activity(Auth::id() , 'Reply a Comment','epics',$request->flag_id, 'reply');
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
        Cmf::save_activity(Auth::id() , 'Delete a Comment','epics',$comment->flag_id, 'delete');
        $data = Epic::find($comment->flag_id);
        $html = view('epics.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function bulkupdate(Request $request)
    {
        foreach ($request->checkbox as $r) {
            $total = 0;
            $epicid = DB::table("epics_stroy")->where("id", $r)->first();
            DB::table("epics_stroy")->where("id", $r)->delete();
            $epicstory = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->get();
            $epicprogress = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->sum("progress");
            $count = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->count();
            if ($count > 0) {
                $total = round($epicprogress / $count, 2);
            }

            DB::table("epics")->where("id", $epicid->epic_id)->update(["epic_progress" => $total,"updated_at" => Carbon::now(),]);

            $backlog = DB::table("epics")->where("id", $epicid->epic_id)->where("trash", null)->first();

            if ($backlog->backlog_id != "" && $backlog->type == "stream") {
                DB::table("backlog")->where("id", $backlog->backlog_id)->update(["progress" => $total]);
            }

            if ($backlog->backlog_id != "" && $backlog->type == "unit") {
                DB::table("backlog_unit")->where("id", $backlog->backlog_id)->update(["progress" => $total]);
            }

            $Quarter = DB::table("epics")->where("id", $epicid->epic_id)->first();

            $currentDate = Carbon::now();
            $currentYear = $currentDate->year;
            $currentMonth = $currentDate->month;
            $yearMonthString = $currentDate->format("Y");
            $yearMonth = $currentDate->format("F");
            $CurrentQuarter = "";
            $QuarterCount = "";
            $CurrentQuarter = DB::table("quarter_month")->where("initiative_id", $Quarter->initiative_id)->where("month", $yearMonth)->where("year", $yearMonthString)->first();

            if ($CurrentQuarter) {
                $QuarterCount = DB::table("epics")->where("quarter_id", $Quarter->quarter_id)->where("trash", null)->count();
                $Quarterprogress = DB::table("epics")->where("quarter_id", $Quarter->quarter_id)->where("epic_progress", "=", 100)->where("trash", null)->count();
            }
            if ($QuarterCount > 0) {
                $Quartertotal = round(($Quarterprogress / $QuarterCount) * 100, 2);
                DB::table("quarter")->where("id", $Quarter->quarter_id)->update(["quarter_progress" => $Quartertotal]);
                DB::table("initiative")->where("id", $Quarter->initiative_id)->update(["q_initiative_prog" => $Quartertotal]);
            }

            $initcount = DB::table("initiative")->where("key_id", $request->key)->sum("initiative_weight");

            if ($initcount == 100) {
                $epic = DB::table("epics")->where("id", $epicid->epic_id)->where("trash", null)->first();
                $epicinitiativecount = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("trash", null)->count();
                $initiativeprogress = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("epic_progress", "=", 100)->where("trash", null)->count();
                $totalinitiative = $initiativeprogress / $epicinitiativecount;
                $finaltotal = round($totalinitiative * 100, 2);
                $intw = DB::table("initiative")->where("id", $epic->initiative_id)->first();
                $resultinit = $intw->initiative_weight / 100;
                $newresultinit = round($resultinit * $finaltotal, 2);
                DB::table("initiative")->where("id", $epic->initiative_id)->update(["initiative_prog" => $newresultinit]);
            } else {
                $epic = DB::table("epics")
                    ->where("id", $epicid->epic_id)
                    ->where("trash", null)
                    ->first();

                $epicinitiativecount = DB::table("epics")
                    ->where("initiative_id", $epic->initiative_id)
                    ->where("trash", null)
                    ->count();
                $initiativeprogress = DB::table("epics")
                    ->where("initiative_id", $epic->initiative_id)
                    ->where("epic_progress", "=", 100)
                    ->where("trash", null)
                    ->count();
                $totalinitiative = $initiativeprogress / $epicinitiativecount;
                $finaltotal = round($totalinitiative * 100, 2);

                DB::table("initiative")
                    ->where("id", $epic->initiative_id)
                    ->update(["initiative_prog" => $finaltotal]);
            }

            $objwcount = DB::table("key_result")
                ->where("obj_id", $request->obj)
                ->sum("weight");

            if ($objwcount == 100) {
                $keycount = DB::table("initiative")
                    ->where("key_id", $request->key)
                    ->count();
                $keyprogress = DB::table("initiative")
                    ->where("key_id", $request->key)
                    ->where("initiative_prog", "=", 100)
                    ->count();
                $totalkey = $keyprogress / $keycount;
                $finaltotalkey = $totalkey * 100;

                $keyw = DB::table("key_result")
                    ->where("id", $request->key)
                    ->first();
                $result = $keyw->weight / 100;
                $newresult = intval($result * $finaltotalkey);

                DB::table("key_result")
                    ->where("id", $request->key)
                    ->update(["key_prog" => $newresult]);
            } else {
                $keycount = DB::table("initiative")->where("key_id", $request->key)->count();
                if($keycount > 0)
                {
                    $keyprogress = DB::table("initiative")->where("key_id", $request->key)->where("initiative_prog", "=", 100)->count();
                    $totalkey = $keyprogress / $keycount;
                    $finaltotalkey = $totalkey * 100;
                    DB::table("key_result")->where("id", $request->key)->update(["key_prog" => $finaltotalkey]);

                    $QuarterprogressKey = DB::table("initiative")->where("key_id", $request->key)->where("q_initiative_prog", "=", 100)->count();
                    $QuartertotalKey = round(($QuarterprogressKey / $keycount) * 100,2);
                    DB::table("key_result")->where("id", $request->key)->update(["q_key_prog" => $QuartertotalKey]);
                }
            }

            $objcount = DB::table("key_result")->where("obj_id", $request->obj)->count();
            if($objcount > 0)
            {
                $objprogress = DB::table("key_result")->where("obj_id", $request->obj)->where("key_prog", "=", 100)->count();
                $totalobj = $objprogress / $objcount;
                $finaltotalobj = $totalobj * 100;
                DB::table("objectives")->where("id", $request->obj)->update(["obj_prog" => $finaltotalobj]);
                $QuarterprogressObj = DB::table("key_result")->where("obj_id", $request->obj)->where("q_key_prog", "=", 100)->count();
                $QuartertotalObj = round(($QuarterprogressObj / $objcount) * 100, 2);
                DB::table("objectives")->where("id", $request->obj)->update(["q_obj_prog" => $QuartertotalObj]);
            }
        }
    }
    public function changeepicstatus(Request $request)
    {




        $previousstatus = DB::table('epics')->where('id' , $request->edit_epic_id)->first()->epic_status;

        if($previousstatus == 'In progress')
        {
            $from_status = '<b style="background-color: #E1DB3F; color: white; border-radius: 10px; padding-left: 5px; padding-right: 5px; ">In Progress</b>';
        }
        if($previousstatus == 'Done')
        {
            $from_status = '<b style="background-color: #3fe1a7; color: white; border-radius: 10px; padding-left: 5px; padding-right: 5px; ">Done</b>';
        }
        if($previousstatus == 'To Do')
        {
            $from_status = '<b style="background-color: #6c757d; color: white; border-radius: 10px; padding-left: 5px; padding-right: 5px; ">To Do</b>';
        }

        if($request->edit_epic_status == 'To Do')
        {
            $tostatus = '<b style="background-color: #6c757d; color: white; border-radius: 10px; padding-left: 5px; padding-right: 5px; ">To Do</b>';
        }
        if($request->edit_epic_status == 'Done')
        {
            $tostatus = '<b style="background-color: #3fe1a7; color: white; border-radius: 10px; padding-left: 5px; padding-right: 5px; ">Done</b>';
        }
        if($request->edit_epic_status == 'In progress')
        {
            $tostatus = '<b style="background-color: #E1DB3F; color: white; border-radius: 10px; padding-left: 5px; padding-right: 5px; ">In Progress</b>';
        }
        $notification = "Status Changed From ".$from_status .' To '.$tostatus;
        Cmf::save_activity(Auth::id() , $notification,'epics',$request->edit_epic_id , 'detector_status');



        $date = DB::table("epics")
            ->where("id", $request->edit_epic_id)
            ->first();
        $monthName = Carbon::parse($request->edit_epic_end_date)->format("F");
        $month = DB::table("quarter_month")
            ->where("initiative_id", $request->edit_ini_epic_id)
            ->where("month", $monthName)
            ->first();
        DB::table("epics")
            ->where("id", $request->edit_epic_id)
            ->update([
                "epic_status" => $request->edit_epic_status,
            ]);
        if ($request->edit_epic_status == "Done") {
            DB::table("epics")
                ->where("id", $request->edit_epic_id)
                ->update([
                    "epic_progress" => 100,
                    "updated_at" => Carbon::now(),
                ]);
        }
        DB::table("epics_stroy")
            ->where("epic_id", $request->edit_epic_id)
            ->update(["progress" => 100]);
        $epicid = DB::table("epics")
            ->where("id", $request->edit_epic_id)
            ->first();
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $yearMonthString = $currentDate->format("Y");
        $yearMonth = $currentDate->format("F");
        $CurrentQuarter = "";
        $QuarterCount = "";
        $CurrentQuarter = DB::table("quarter_month")
            ->where("initiative_id", $request->edit_ini_epic_id)
            ->where("month", $yearMonth)
            ->where("year", $yearMonthString)
            ->first();
        $Quarter = DB::table("epics")
            ->where("id", $request->edit_epic_id)
            ->first();
        if ($CurrentQuarter) {
            $QuarterCount = DB::table("epics")
                ->where("quarter_id", $CurrentQuarter->quarter_id)
                ->where("trash", null)
                ->count();
            $Quarterprogress = DB::table("epics")
                ->where("quarter_id", $CurrentQuarter->quarter_id)
                ->where("epic_progress", "=", 100)
                ->where("trash", null)
                ->count();
        }
        if ($QuarterCount > 0) {
            $Quartertotal = round(($Quarterprogress / $QuarterCount) * 100, 2);
            DB::table("quarter")
                ->where("id", $CurrentQuarter->quarter_id)
                ->update(["quarter_progress" => $Quartertotal]);
            DB::table("initiative")
                ->where("id", $CurrentQuarter->initiative_id)
                ->update(["q_initiative_prog" => $Quartertotal]);
        }
        $initcount = DB::table("initiative")
            ->where("key_id", $request->edit_epic_key)
            ->sum("initiative_weight");
        if ($initcount == 100) {
            $epic = DB::table("epics")
                ->where("id", $epicid->id)
                ->where("trash", null)
                ->first();
            $epicinitiativecount = DB::table("epics")
                ->where("initiative_id", $epic->initiative_id)
                ->where("trash", null)
                ->count();
            $initiativeprogress = DB::table("epics")
                ->where("initiative_id", $epic->initiative_id)
                ->where("epic_progress", "=", 100)
                ->where("trash", null)
                ->count();
            $totalinitiative = $initiativeprogress / $epicinitiativecount;
            $finaltotal = $totalinitiative * 100;
            $intw = DB::table("initiative")
                ->where("id", $epic->initiative_id)
                ->first();
            $resultinit = $intw->initiative_weight / 100;
            $newresultinit = round($resultinit * $finaltotal, 2);
            DB::table("initiative")
                ->where("id", $epic->initiative_id)
                ->update(["initiative_prog" => $newresultinit]);
        } else {
            $epic = DB::table("epics")
                ->where("id", $request->edit_epic_id)
                ->first();
            $epicinitiativecount = DB::table("epics")
                ->where("initiative_id", $epic->initiative_id)
                ->where("trash", null)
                ->count();
            $initiativeprogress = DB::table("epics")
                ->where("initiative_id", $epic->initiative_id)
                ->where("epic_progress", "=", 100)
                ->where("trash", null)
                ->count();
            $totalinitiative = $initiativeprogress / $epicinitiativecount;
            $finaltotal = $totalinitiative * 100;
            DB::table("initiative")
                ->where("id", $epic->initiative_id)
                ->update(["initiative_prog" => $finaltotal]);
        }
        $objwcount = DB::table("key_result")
            ->where("obj_id", $request->edit_epic_obj)
            ->sum("weight");

        if ($objwcount == 100) {
            $keycount = DB::table("initiative")
                ->where("key_id", $request->edit_epic_key)
                ->count();
            $keyprogress = DB::table("initiative")
                ->where("key_id", $request->edit_epic_key)
                ->where("initiative_prog", "=", 100)
                ->count();
            $totalkey = $keyprogress / $keycount;
            $finaltotalkey = $totalkey * 100;

            $keyw = DB::table("key_result")
                ->where("id", $request->edit_epic_key)
                ->first();
            $result = $keyw->weight / 100;
            $newresult = intval($result * $finaltotalkey);

            DB::table("key_result")
                ->where("id", $request->edit_epic_key)
                ->update(["key_prog" => $newresult]);
        } else {
            $keycount = DB::table("initiative")
                ->where("key_id", $request->edit_epic_key)
                ->count();
            $keyprogress = DB::table("initiative")
                ->where("key_id", $request->edit_epic_key)
                ->where("initiative_prog", "=", 100)
                ->count();
            $totalkey = $keyprogress / $keycount;
            $finaltotalkey = $totalkey * 100;
            DB::table("key_result")
                ->where("id", $request->edit_epic_key)
                ->update(["key_prog" => $finaltotalkey]);

            $QuarterprogressKey = DB::table("initiative")
                ->where("key_id", $request->edit_epic_key)
                ->where("q_initiative_prog", "=", 100)
                ->count();
            $QuartertotalKey = round(
                ($QuarterprogressKey / $keycount) * 100,
                2
            );
            DB::table("key_result")
                ->where("id", $request->edit_epic_key)
                ->update(["q_key_prog" => $QuartertotalKey]);
        }

        $objcount = DB::table("key_result")
            ->where("obj_id", $request->edit_epic_obj)
            ->count();
        $objprogress = DB::table("key_result")
            ->where("obj_id", $request->edit_epic_obj)
            ->where("key_prog", "=", 100)
            ->count();
        $totalobj = $objprogress / $objcount;
        $finaltotalobj = $totalobj * 100;

        DB::table("objectives")
            ->where("id", $request->edit_epic_obj)
            ->update(["obj_prog" => $finaltotalobj]);

        $QuarterprogressObj = DB::table("key_result")
            ->where("obj_id", $request->edit_epic_obj)
            ->where("q_key_prog", "=", 100)
            ->count();
        $QuartertotalObj = round(($QuarterprogressObj / $objcount) * 100, 2);
        DB::table("objectives")
            ->where("id", $request->edit_epic_obj)
            ->update(["q_obj_prog" => $QuartertotalObj]);

        $backlog = DB::table("epics")
            ->where("id", $request->edit_epic_id)
            ->first();

        if ($backlog->backlog_id != "" && $backlog->type == "stream") {
            DB::table("backlog")
                ->where("id", $backlog->backlog_id)
                ->update([
                    "epic_status" => $request->edit_epic_status,
                    "epic_title" => $request->edit_epic_name,
                    "epic_start_date" => $request->edit_epic_start_date,
                    "epic_end_date" => $request->edit_epic_end_date,
                ]);
        }

        if ($backlog->backlog_id != "" && $backlog->type == "unit") {
            DB::table("backlog_unit")
                ->where("id", $backlog->backlog_id)
                ->update([
                    "epic_status" => $request->edit_epic_status,
                    "epic_title" => $request->edit_epic_name,
                    "epic_start_date" => $request->edit_epic_start_date,
                    "epic_end_date" => $request->edit_epic_end_date,
                ]);
        }

        if ($backlog->backlog_id != "" && $backlog->type == "unit") {
            $jiraa = DB::table("backlog_unit")
                ->where("id", $backlog->backlog_id)
                ->first();
        }

        if ($backlog->backlog_id != "" && $backlog->type == "stream") {
            $jiraa = DB::table("backlog")
                ->where("id", $backlog->backlog_id)
                ->first();
        }

        if ($backlog->backlog_id != "") {
            if ($backlog->jira_id != "") {
                $Account = DB::table("jira_setting")
                    ->where("user_id", Auth::id())
                    ->first();
                $username = $Account->user_name;
                $apiToken = $Account->token;
                $issueKeyOrId = $backlog->jira_id;
                $apiEndpoint = "{$Account->jira_url}/rest/api/3/issue/{$issueKeyOrId}";

                $auth = base64_encode("$username:$apiToken");

                $updateData = [
                    "fields" => [
                        "description" => [
                            "type" => "doc",
                            "version" => 1,
                            "content" => [
                                [
                                    "type" => "paragraph",
                                    "content" => [
                                        [
                                            "type" => "text",
                                            "text" =>
                                                $request->edit_epic_description,
                                        ],
                                    ],
                                ],
                            ],
                        ],

                        "summary" => $request->edit_epic_name,
                    ],
                ];

                $ch = curl_init($apiEndpoint);

                if ($ch === false) {
                    die("cURL initialization failed");
                }

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($updateData));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Authorization: Basic {$auth}",
                    "Content-Type: application/json",
                ]);

                $response = curl_exec($ch);

                curl_close($ch);
            }
        }
        if ($date->epic_type == "unit") {
            $organization = DB::table("business_units")->where("id", $date->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $date->buisness_unit_id)->where("trash", null)->where("type", "unit")->get();
        }
        if ($date->epic_type == "stream") {
            $organization = DB::table("value_stream")->where("id", $date->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $date->buisness_unit_id)->where("trash", null)->where("type", "stream")->get();
        }
        if ($date->epic_type == "BU") {
            $organization = DB::table("unit_team")->where("id", $date->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $date->buisness_unit_id)->where("trash", null)->where("type", "BU")->get();
        }
        if ($date->epic_type == "VS") {
            $organization = DB::table("value_team")->where("id", $date->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $date->buisness_unit_id)->where("trash", null)->where("type", "VS")->get();
        }
        if ($date->epic_type == "org") {
            $organization = DB::table("organization")->where("id", $date->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $date->buisness_unit_id)->where("trash", null)->where("type", "org")->get();
        }
        if ($date->epic_type == "orgT") {
            $organization = DB::table("org_team")->where("id", $date->buisness_unit_id)->first();
            $objective = DB::table("objectives")->where("unit_id", $date->buisness_unit_id)->where("trash", null)->where("type", "orgT")->get();
        }
        return view("objective.objective-render",compact("organization", "objective"));

    }
    public function updateflagstatus(Request $request)
    {
        $flags = flags::find($request->id);
        $flags->flag_status = $request->status;
        $flags->save();
    }
    public function flagupdate(Request $request)
    {
        $update = flags::find($request->flag_id);
        $update->flag_type = $request->flag_type;
        $update->flag_title = $request->flag_title;
        $update->flag_description = $request->flag_description;
        $update->save();
    }
    public function orderbychilditem(Request $request)
    {
        $orderby = $request->order;
        $epic = Epic::find($request->epic_id);
        $epicstory = DB::table('epics_stroy')->where('epic_id',$epic->epic_id)->orderByRaw(DB::raw("FIELD(story_status, 'To Do', 'In progress', 'Done')"))->get();
        $html = view('epics.tabs.childitems', compact('orderby','epic','epicstory'))->render();
        return $html;   
    }
    public function showheader(Request $request)
    {
        $data = Epic::find($request->id);
        $html = view('epics.modalheader', compact('data'))->render();
        return $html;
    }
    public function changeepicdate(Request $request)
    {   
        $previous = Epic::find($request->epic_id);
        $from_status = Cmf::date_format_new($previous->epic_start_date).' - '.Cmf::date_format_new($previous->epic_end_date); 

        $data = Epic::find($request->epic_id);
        $data->epic_start_date = $request->start;
        $data->epic_end_date = $request->end;
        $data->save();

        $tostatus = Cmf::date_format_new($data->epic_start_date).' - '.Cmf::date_format_new($data->epic_end_date);

        $notification = "Date Changed From ".$from_status .' To '.$tostatus;
        Cmf::save_activity(Auth::id() , $notification,'epics',$request->epic_id , 'detector_status');

    }
    public function sortchilditem(Request $request)
    {
        $flagcount = epics_stroy::where('epic_id' , $request->epic_id)->count();
        $i = 0;
        foreach ($request->order as $key=>$r) {
            $test = $key+1;
            if ($i++ > $flagcount) break;
            $item = epics_stroy::find($r);
            $item->sort_order = $i;
            $item->save();       
        }
    }
    public function sortflags(Request $request)
    {
        $flagcount = flags::where('epic_id' , $request->epic_id)->count();
        $i = 0;
        foreach ($request->order as $key=>$r) {
            $test = $key+1;
            if ($i++ > $flagcount) break;
            $item = flags::find($r);
            $item->flag_order = $i;
            $item->save();        
        }
    }
    public function deletechilditem(Request $request)
    {
        $total = 0;
        $epicid = DB::table("epics_stroy")->where("id", $request->id)->first();
        DB::table("epics_stroy")->where("id", $request->id)->delete();
        $epicstory = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->get();
        $epicprogress = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->sum("progress");
        $count = DB::table("epics_stroy")->where("epic_id", $epicid->epic_id)->count();
        if ($count > 0) {
            $total = round($epicprogress / $count, 2);
        }

        DB::table("epics")->where("id", $epicid->epic_id)->update(["epic_progress" => $total,"updated_at" => Carbon::now(),]);

        $backlog = DB::table("epics")->where("id", $epicid->epic_id)->where("trash", null)->first();

        if ($backlog->backlog_id != "" && $backlog->type == "stream") {
            DB::table("backlog")->where("id", $backlog->backlog_id)->update(["progress" => $total]);
        }

        if ($backlog->backlog_id != "" && $backlog->type == "unit") {
            DB::table("backlog_unit")->where("id", $backlog->backlog_id)->update(["progress" => $total]);
        }

        $Quarter = DB::table("epics")->where("id", $epicid->epic_id)->first();

        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $yearMonthString = $currentDate->format("Y");
        $yearMonth = $currentDate->format("F");
        $CurrentQuarter = "";
        $QuarterCount = "";
        $CurrentQuarter = DB::table("quarter_month")->where("initiative_id", $Quarter->initiative_id)->where("month", $yearMonth)->where("year", $yearMonthString)->first();

        if ($CurrentQuarter) {
            $QuarterCount = DB::table("epics")->where("quarter_id", $Quarter->quarter_id)->where("trash", null)->count();
            $Quarterprogress = DB::table("epics")->where("quarter_id", $Quarter->quarter_id)->where("epic_progress", "=", 100)->where("trash", null)->count();
        }
        if ($QuarterCount > 0) {
            $Quartertotal = round(($Quarterprogress / $QuarterCount) * 100, 2);
            DB::table("quarter")->where("id", $Quarter->quarter_id)->update(["quarter_progress" => $Quartertotal]);
            DB::table("initiative")->where("id", $Quarter->initiative_id)->update(["q_initiative_prog" => $Quartertotal]);
        }

        $initcount = DB::table("initiative")->where("key_id", $request->key)->sum("initiative_weight");

        if ($initcount == 100) {
            $epic = DB::table("epics")->where("id", $epicid->epic_id)->where("trash", null)->first();
            $epicinitiativecount = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("trash", null)->count();
            $initiativeprogress = DB::table("epics")->where("initiative_id", $epic->initiative_id)->where("epic_progress", "=", 100)->where("trash", null)->count();
            $totalinitiative = $initiativeprogress / $epicinitiativecount;
            $finaltotal = round($totalinitiative * 100, 2);
            $intw = DB::table("initiative")->where("id", $epic->initiative_id)->first();
            $resultinit = $intw->initiative_weight / 100;
            $newresultinit = round($resultinit * $finaltotal, 2);
            DB::table("initiative")->where("id", $epic->initiative_id)->update(["initiative_prog" => $newresultinit]);
        } else {
            $epic = DB::table("epics")
                ->where("id", $epicid->epic_id)
                ->where("trash", null)
                ->first();

            $epicinitiativecount = DB::table("epics")
                ->where("initiative_id", $epic->initiative_id)
                ->where("trash", null)
                ->count();
            $initiativeprogress = DB::table("epics")
                ->where("initiative_id", $epic->initiative_id)
                ->where("epic_progress", "=", 100)
                ->where("trash", null)
                ->count();
            $totalinitiative = $initiativeprogress / $epicinitiativecount;
            $finaltotal = round($totalinitiative * 100, 2);

            DB::table("initiative")
                ->where("id", $epic->initiative_id)
                ->update(["initiative_prog" => $finaltotal]);
        }

        $objwcount = DB::table("key_result")
            ->where("obj_id", $request->obj)
            ->sum("weight");

        if ($objwcount == 100) {
            $keycount = DB::table("initiative")
                ->where("key_id", $request->key)
                ->count();
            $keyprogress = DB::table("initiative")
                ->where("key_id", $request->key)
                ->where("initiative_prog", "=", 100)
                ->count();
            $totalkey = $keyprogress / $keycount;
            $finaltotalkey = $totalkey * 100;

            $keyw = DB::table("key_result")
                ->where("id", $request->key)
                ->first();
            $result = $keyw->weight / 100;
            $newresult = intval($result * $finaltotalkey);

            DB::table("key_result")
                ->where("id", $request->key)
                ->update(["key_prog" => $newresult]);
        } else {
            $keycount = DB::table("initiative")->where("key_id", $request->key)->count();
            if($keycount > 0)
            {
                $keyprogress = DB::table("initiative")->where("key_id", $request->key)->where("initiative_prog", "=", 100)->count();
                $totalkey = $keyprogress / $keycount;
                $finaltotalkey = $totalkey * 100;
                DB::table("key_result")->where("id", $request->key)->update(["key_prog" => $finaltotalkey]);

                $QuarterprogressKey = DB::table("initiative")->where("key_id", $request->key)->where("q_initiative_prog", "=", 100)->count();
                $QuartertotalKey = round(($QuarterprogressKey / $keycount) * 100,2);
                DB::table("key_result")->where("id", $request->key)->update(["q_key_prog" => $QuartertotalKey]);
            }
        }

        $objcount = DB::table("key_result")->where("obj_id", $request->obj)->count();
        if($objcount > 0)
        {
            $objprogress = DB::table("key_result")->where("obj_id", $request->obj)->where("key_prog", "=", 100)->count();
            $totalobj = $objprogress / $objcount;
            $finaltotalobj = $totalobj * 100;
            DB::table("objectives")->where("id", $request->obj)->update(["obj_prog" => $finaltotalobj]);
            $QuarterprogressObj = DB::table("key_result")->where("obj_id", $request->obj)->where("q_key_prog", "=", 100)->count();
            $QuartertotalObj = round(($QuarterprogressObj / $objcount) * 100, 2);
            DB::table("objectives")->where("id", $request->obj)->update(["q_obj_prog" => $QuartertotalObj]);
        }
    }


    public function selectteamforepic(Request $request)
    {
        $update = Epic::find($request->epic_id);
        $update->team_id = $request->id;
        $update->save();
        if($update->epic_type == 'unit')
        {
            $teams = DB::table('unit_team')->where('org_id',$update->buisness_unit_id)->where('type' , 'BU')->get();
        }
        if($update->epic_type == 'org')
        {
            $teams = DB::table('org_team')->where('org_id',$update->buisness_unit_id)->where('type' , 'orgT')->get();
        }
        if($update->epic_type == 'stream')
        {
            $teams = DB::table('value_team')->where('org_id',$update->buisness_unit_id)->where('type' , 'VS')->get();
        }
        $update = $update;
        $html = view('epics.teamappend', compact('teams','update'))->render();
        return $html;                 
    }
    public function showorderbyactivity(Request $request)
    {
        $activity = activities::where('value_id' , $request->flag_id)->where('type' , 'epics')->orderby('id' , $request->id)->get();
        $orderby = $request->id;
        $data = Epic::find($request->flag_id);
        $html = view('epics.tabs.activities', compact('activity','data','orderby'))->render();
        return $html;
    }
    public function savenewepic(Request $request)
    {
        $year =  date('Y');
        $month =  $request->month;
        $day =  date('d');
        $date = $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT);
        $createepic = new Epic();
        $createepic->epic_status = 'To Do';
        $createepic->initiative_id = $request->initiative_id;
        $createepic->user_id = Auth::id();
        $createepic->month_id = $request->month_id;
        $createepic->quarter_id = $request->quarter_id;
        $createepic->obj_id = $request->obj_id;
        $createepic->key_id = $request->key_id;
        $createepic->buisness_unit_id = $request->buisness_unit_id;
        $createepic->epic_type = $request->epic_type;
        $createepic->save();
        $update = Epic::find($createepic->id);
        $update->trash = $createepic->created_at;
        $update->epic_start_date = $date;
        $update->epic_end_date = $date;
        $update->save();
        return $createepic->id;
    }
    public function showlatestepicdatainmodal(Request $request)
    {
        $latest = Epic::orderby('id' , 'desc')->limit(1)->first();
        $data = Epic::find($latest->id);
        $html = view('epics.modal', compact('data'))->render();
        return $html;
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
        $flag->board_type = $request->board_type;
        $flag->save();
        $member = new flag_members();
        $member->member_id = $request->flag_assign;
        $member->flag_id = $flag->id;
        $member->save();
    }
    public function showorderby(Request $request)
    {
        if($request->table == 'flag_comments')
        {
            $comments = flag_comments::where('flag_id' , $request->flag_id)->wherenull('comment_id')->where('comment_type' , 'epics')->orderby('id' , $request->id)->get();
            $orderby = $request->id;
            $data = Epic::find($request->flag_id);
            $html = view('epics.tabs.comments', compact('comments','data','orderby'))->render();
            return $html;
        }
    }
}