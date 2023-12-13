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
    public function changeepicstatus(Request $request)
    {
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

       
        $data = Epic::find($request->edit_epic_id);
        $html = view('epics.modalheader', compact('data'))->render();
        return $html;
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
}