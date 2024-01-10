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
use App\Models\team_backlog;
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
        $table = $request->table;
        $html = view('epicbacklog.modalheader', compact('data','table'))->render();
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
    public function changeepicdate(Request $request)
    {
        $data = team_backlog::find($request->epic_id);
        $data->epic_start_date = $request->start;
        $data->epic_end_date = $request->end;
        $data->save();
    }
    public function changeepicstatus(Request $request)
    {
        DB::table($request->table)->where('id' , $request->id)->update(array('epic_status' =>$request->status));
    }
    public function updategeneral(Request $request)
    {
        $data = team_backlog::find($request->epic_id);
        $data->epic_title = $request->epic_name;
        $data->epic_start_date = $request->epic_start_date;
        $data->epic_end_date = $request->epic_end_date;
        $data->epic_detail = $request->epic_detail;
        $data->save();

         $jira = DB::table('backlog')->where('id',$data->id)->first();
         if($jira)
         {
            $backlog = DB::table('epics')->where('jira_id',$jira->jira_id)->first();
             if($backlog)
             {
               DB::table('epics')->where('jira_id',$jira->jira_id)->update(['epic_name' => $request->epic_name]);
             }
         
            if($jira->jira_id != '')
            {
                $Account = DB::table('jira_setting')->where('user_id',Auth::id())->first();
                $username = $Account->user_name;
                $apiToken = $Account->token;
                $issueKeyOrId = $jira->jira_id;
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
                                                "text" => $request->epic_description
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            
                           "summary" => $request->epic_name, 
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
}