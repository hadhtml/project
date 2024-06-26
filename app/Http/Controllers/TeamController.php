<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\team_link_child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use DB;
use Carbon\Carbon;
use Mail;
use App\Models\OrganizationContacts;
use App\Helpers\Jira;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','check.subscription']);

    }
    
    public function TeamBacklog($id,$type)
    {
        if($type == 'BU')
        {
            $organization = DB::table('unit_team')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('type' , 'org')->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        if($type == 'orgT')
        {
            $organization = DB::table('org_team')->where('slug',$id)->first();        
            $Backlog  =  DB::table('team_backlog')->where('trash' , Null)->where('unit_id',$organization->id)->orderby('position')->where('assign_status',NULL)->get();
        }
        return view('epicbacklog.index',compact('Backlog','organization','type'));  
        
    }

    

    public function AssignTeamBacklogEpic(Request $request)
    {
        $backlogIds = explode(',', $request->input('backlog_id'));
        foreach($backlogIds  as $key => $value)
        {  
            $log = DB::table('team_backlog')->where('id',$value)->first();
            foreach($request->end_date  as $key => $value)
            {
                $monthName = Carbon::parse($request->end_date[$key])->format('F');
                $Year = Carbon::parse($request->end_date[$key])->format('Y');
                $month = DB::table('quarter_month')->where('initiative_id',$request->locinit)->where('month',$monthName)->where('year',$Year)->first();
                if(!$month)
                {
                    return redirect()->back()->with('message', 'initiative Quarter Month Not Found');
                }
                $EpicId = DB::table('epics')->insertGetId([
                    'epic_status' => $log->epic_status,
                    'epic_name' => $log->epic_title,
                    'epic_detail' => $log->epic_detail,
                    'epic_start_date' => $request->start_date[$key],
                    'epic_end_date' => $request->end_date[$key],
                    'initiative_id' => $request->locinit,
                    'user_id' => Auth::id(),
                    'month_id' => $month->id,
                    'quarter_id' => $month->quarter_id, 
                    'backlog_id' => $log->id,
                    'type' => $request->team_type,
                    'key_id' => $request->lockey,
                    'jira_id' =>  $log->jira_id,
                    'account_id' => $log->account_id,
                    'jira_project' =>  $log->jira_project,
                    'epic_progress' =>  $log->progress,
                    'epic_type' =>  $request->team_type,
                    'buisness_unit_id' =>  $log->unit_id,
                    'obj_id' =>  $request->locstate,
                    'key_id' =>  $request->lockey,

                ]);
            }
            foreach($request->end_date  as $k => $value)
            {
               DB::table('team_backlog')->where('id', $value)->update(['epic_start_date' => $request->start_date[$k],'epic_end_date' => $request->end_date[$k]]);
            }
        }  
        $backlogstatus = DB::table('team_backlog')->whereIn('id', $backlogIds)->update(['assign_status'=> 1,'quarter'=> $month->quarter_name.' '.$month->year,'epic_start_date' => $request->start_date,'epic_end_date' => $request->end_date]);
        $Quartertotal = 0;
        $totalinitiative = 0;
        $finaltotal  = 0;
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;
        $yearMonthString = $currentDate->format('Y');
        $yearMonth = $currentDate->format('F');
        $CurrentQuarter = '';
        $QuarterCount = '';
        $CurrentQuarter = DB::table('quarter_month')->where('initiative_id',$request->locinit)->where('month',$yearMonth)->where('year',$yearMonthString)->first();
    
    $Quarter = DB::table('epics')->where('id',$EpicId)->first();
    if($CurrentQuarter)
    {
    $QuarterCount = DB::table('epics')->where('quarter_id',$CurrentQuarter->quarter_id)->where('trash',NULL)->count();
    $Quarterprogress  = DB::table('epics')->where('quarter_id',$CurrentQuarter->quarter_id)->where('epic_progress','=',100)->where('trash',NULL)->count();
    }
    if($QuarterCount > 0)
    {
    $Quartertotal = round(($Quarterprogress / $QuarterCount * 100),2);
    DB::table('quarter')->where('id',$CurrentQuarter->quarter_id)->update(['quarter_progress' => $Quartertotal]);
    DB::table('initiative')->where('id',$CurrentQuarter->initiative_id)->update(['q_initiative_prog' => $Quartertotal]);

    
    }

     
    $initcount = DB::table('initiative')->where('key_id',$request->lockey)->sum('initiative_weight');

    if($initcount == 100)
    {
    $epic = DB::table('epics')->where('id',$EpicId)->first();

    $epicinitiativecount = DB::table('epics')->where('initiative_id',$epic->initiative_id)->where('trash',NULL)->count();
    $initiativeprogress  = DB::table('epics')->where('initiative_id',$epic->initiative_id)->where('epic_progress','=',100)->where('trash',NULL)->count();
    $totalinitiative =  ($initiativeprogress/$epicinitiativecount); 
    $finaltotal =  ($totalinitiative * 100); 
    
     $intw = DB::table('initiative')->where('id',$epic->initiative_id)->first();
     $resultinit = ($intw->initiative_weight / 100);
     $newresultinit = round(($resultinit * $finaltotal),2);
     DB::table('initiative')->where('id',$epic->initiative_id)->update(['initiative_prog' => $newresultinit]);

    }else
    {
        
    $epic = DB::table('epics')->where('id',$EpicId)->first();
    $epicinitiativecount = DB::table('epics')->where('initiative_id',$epic->initiative_id)->where('trash',NULL)->count();
    $initiativeprogress  = DB::table('epics')->where('initiative_id',$epic->initiative_id)->where('trash',NULL)->where('epic_progress','=',100)->count();
    if($epicinitiativecount > 0)
    {
    $totalinitiative =  ($initiativeprogress/$epicinitiativecount); 
    $finaltotal =  ($totalinitiative * 100);
    }
    
    DB::table('initiative')->where('id',$epic->initiative_id)->update(['initiative_prog' => $finaltotal]);
    


        
    }

      
  
    
      $objwcount = DB::table('key_result')->where('obj_id',$request->locstate)->sum('weight');
  
     
     if($objwcount == 100)
     {
   
     
     $keycount = DB::table('initiative')->where('key_id',$request->lockey)->count();
     $keyprogress  = DB::table('initiative')->where('key_id',$request->lockey)->where('initiative_prog','=',100)->count();
     $totalkey =  ($keyprogress / $keycount); 
     $finaltotalkey =  ($totalkey * 100);      
    
     $keyw = DB::table('key_result')->where('id',$request->lockey)->first();
     $result = ($keyw->weight / 100);
     $newresult = intval($result * $finaltotalkey);
      
     DB::table('key_result')->where('id',$request->lockey)->update(['key_prog' => $newresult]);

    
     }else{
     
     
         
     $keycount = DB::table('initiative')->where('key_id',$request->lockey)->count();
     $keyprogress  = DB::table('initiative')->where('key_id',$request->lockey)->where('initiative_prog','=',100)->count();
     $totalkey =  ($keyprogress / $keycount); 
     $finaltotalkey =  ($totalkey * 100);      
     DB::table('key_result')->where('id',$request->lockey)->update(['key_prog' => $finaltotalkey]);
     
    $QuarterprogressKey  = DB::table('initiative')->where('key_id',$request->lockey)->where('q_initiative_prog','=',100)->count();
    $QuartertotalKey = round(($QuarterprogressKey / $keycount * 100),2);
     DB::table('key_result')->where('id',$request->lockey)->update(['q_key_prog' => $QuartertotalKey]);
     }
     
     $objcount = DB::table('key_result')->where('obj_id',$request->locstate)->count();
     $objprogress  = DB::table('key_result')->where('obj_id',$request->locstate)->where('key_prog','=',100)->count();
     $totalobj =  ($objprogress / $objcount); 
     $finaltotalobj =  ($totalobj * 100); 
     
     DB::table('objectives')->where('id',$request->locstate)->update(['obj_prog' => $finaltotalobj]);
     
      $QuarterprogressObj  = DB::table('key_result')->where('obj_id',$request->locstate)->where('q_key_prog','=',100)->count();
    $QuartertotalObj = round(($QuarterprogressObj / $objcount * 100),2);
    DB::table('objectives')->where('id',$request->locstate)->update(['q_obj_prog' => $QuartertotalObj]);


    return redirect()->back()->with('message', 'Backlog Assign Successfully');

    }


    public function UpdateTeamBacklogEpic(Request $request)
    {

     
        DB::table('team_backlog')
        ->where('id',$request->backlog_id)
        ->update([
            'epic_title' => $request->epic_name,
            'epic_start_date' => $request->epic_start_date,
            'epic_end_date' => $request->epic_end_date,
            'epic_status' => $request->epic_status,
            'epic_detail' => $request->epic_description,
            'team_id' => $request->team,
            
            ]);
      
         $jira = DB::table('team_backlog')->where('id',$request->backlog_id)->first();
         if($jira->jira_id != '')
         {
         $backlog = DB::table('epics')->where('jira_id',$jira->jira_id)->first();
         if($backlog)
         {
           DB::table('epics')
           ->where('jira_id',$jira->jira_id)
           ->update(['epic_name' => $request->epic_name]);
           
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
 
       
        return redirect()->back()->with('message', 'Backlog Epic Updated Successfully');

    }

    public function DeleteTeamBacklogEpic(Request $request)
    {

     
        DB::table('team_backlog')->where('id',$request->delete_id)->delete();
      
       
        return redirect()->back()->with('message', 'Backlog Epic Deleted Successfully');

    }

    public function GetTeam(Request $request)
    {

    if($request->type == 'unit')
    {
    $Team = DB::table('value_stream')->where('unit_id',$request->unit_id)->get();
    }
    if($request->type == 'stream')
    { 
    $Team = DB::table('value_team')->where('org_id',$request->unit_id)->get();
    }
     
    return $Team;
    }

    public function GetTeamObj(Request $request)
    {
    
     if($request->type == 'unit')
     {
      $Obj = DB::table('objectives')->where('unit_id',$request->id)->where('id','!=',$request->obj_id)->where('trash',NULL)->where('type','stream')->get();
     }

    

     if($request->type == 'stream')
     {
      $Obj = DB::table('objectives')->where('unit_id',$request->id)->where('id','!=',$request->obj_id)->where('trash',NULL)->where('type','VS')->get();
     }
      return $Obj;
    }
    
    public function GetBUObj(Request $request)
    {
    if($request->type == 'BU' || $request->type == 'stream')
    {   
    $objective = DB::table('objectives')->where('unit_id',$request->id)->where('type','unit')->where('trash',NULL)->get();
    }
    if($request->type == 'VS')
    {   
    $objective = DB::table('objectives')->where('unit_id',$request->id)->where('type','stream')->where('trash',NULL)->get();
    }
      
    
    return $objective;
    }

    public function GetBUKey(Request $request)
    {
        $objective = DB::table('key_result')->where('obj_id',$request->id)->get();
        return $objective;
    }

    public function AppendTeam(Request $request)
    {
    $index = $request->x;
    $type = $request->type;
    if($request->type == 'unit')
    {
    $Team = DB::table('value_stream')->where('unit_id',$request->unit_id)->get();
    }
    if($request->type == 'stream')
    { 
    $Team = DB::table('value_team')->where('org_id',$request->unit_id)->get();
    }
     
    return view('Team.Apeend-Team',compact('Team','index','type'));  
    }

    public function AppendBU(Request $request)
    {
    $index = $request->y;
    $type = $request->type;    
    if($request->type == 'BU')
    {
        $Team = DB::table('business_units')->where('id',$request->org_id)->get();
    }
    if($request->type == 'orgT')
    {
        $Team = DB::table('organization')->where('id',$request->org_id)->get();
    }
    if($request->type == 'VS')
    { 
        $Team = DB::table('value_stream')->where('id',$request->org_id)->get();
    }
     
    return view('Team.Append-Bu',compact('Team','index','type'));  
    }


    public function GetTeamLink(Request $request)
    {
    $type = $request->type;
    if($request->type == 'unit')
    {    
    $KeyLink = DB::table('team_link_parent')
    ->join('value_stream','value_stream.id','=','team_link_parent.link_team_id')
    ->join('objectives','objectives.id','=','team_link_parent.link_obj_id')
    ->select('value_stream.*','team_link_parent.id AS ID','objectives.objective_name AS obj_name')
    ->where('team_link_parent.key_id','=',$request->id)
    ->where('team_link_parent.type',$request->type)->get();
    }

    if($request->type == 'stream')
    {    
    $KeyLink = DB::table('team_link_parent')
    ->join('value_team','value_team.id','=','team_link_parent.link_team_id')
    ->join('objectives','objectives.id','=','team_link_parent.link_obj_id')
    ->select('value_team.*','team_link_parent.id AS ID','objectives.objective_name AS obj_name')
    ->where('team_link_parent.key_id','=',$request->id)
    ->where('team_link_parent.type',$request->type)->get();
    }

  
    return view('Team.Get-Link',compact('KeyLink','type'));  
    }

    public function DeleteTeamLink(Request $request)
    {
    $KeyLink = DB::table('team_link_parent')->where('id',$request->id)->delete();
     
    }

    public function GetValueLink(Request $request)
    {
        $linking = team_link_child::where('team_obj_id' , $request->id)->get();
        $type = $request->type;
        if ($type == "unit") {
            $organization = DB::table("business_units")->where("id", $request->unit_id)->first();
        }
        if ($type == "stream") {
            $organization = DB::table("value_stream")->where("id", $request->unit_id)->first();
        }
        if ($type == "BU") {
            $organization = DB::table("unit_team")->where("id", $request->unit_id)->first();
        }
        if ($type == "VS") {
            $organization = DB::table("value_team")->where("id", $request->unit_id)->first();
            
        }
        if ($type == "org") {
            $organization = DB::table("organization")->where("id", $request->unit_id)->first();
        }
        if ($type == "orgT") {
            $organization = DB::table("org_team")->where("id", $request->unit_id)->first();
        }
        $objective = DB::table('objectives')->where('id' , $request->id)->first();
        $html = view('Team.Get-Obj-link', compact('linking','type','organization','objective'))->render();
        return $html;  
    }

    public function DeleteTeamLinkObj(Request $request)
    {
    $KeyLink = DB::table('team_link_child')->where('id',$request->id)->delete();
     
    }

    function EpicTeamSearch(Request $request)
    {
        $FladId = $request->input("chartId");
      
      
          if ($FladId[0] == "All") {
            if ($request->type == "unit") {
                $organization = DB::table("business_units")
                    ->where("slug", $request->slug)
                    ->first();
                $objective = DB::table("objectives")
                    ->where("org_id", $request->org_id)
                    ->where("unit_id", $request->unit_id)
                    ->where("trash", null)
                    ->where("type", "unit")
                    ->get();
                return view(
                    "objective.objective-render",
                    compact("organization", "objective")
                );
            }

            if ($request->type == "stream") {
                $organization = DB::table("value_stream")
                    ->where("slug", $request->slug)
                    ->first();
                $objective = DB::table("objectives")
                    ->where("org_id", $request->org_id)
                    ->where("unit_id", $request->unit_id)
                    ->where("trash", null)
                    ->where("type", "stream")
                    ->get();
                return view(
                    "objective.objective-render",
                    compact("organization", "objective")
                );
            }

            if ($request->type == "org") {
                $organization = DB::table("organization")
                    ->where("slug", $request->slug)
                    ->first();
                $objective = DB::table("objectives")
                    ->where("unit_id", $request->unit_id)
                    ->where("trash", null)
                    ->where("type", "org")
                    ->get();
                return view(
                    "objective.objective-render",
                    compact("organization", "objective")
                );
            }
        }

        if ($request->type == "unit") {
            $organization = DB::table("business_units")
                ->where("slug", $request->slug)
                ->first();
            $objective = DB::table("objectives")
                ->where("org_id", $request->org_id)
                ->where("unit_id", $request->unit_id)
                ->where("trash", null)
                ->where("type", "unit")
                ->get();
            return view(
                "objective.epicTeamsearch",
                compact("organization", "objective", "FladId")
            );
        }

        if ($request->type == "stream") {
            $organization = DB::table("value_stream")
                ->where("slug", $request->slug)
                ->first();
            $objective = DB::table("objectives")
                ->where("org_id", $request->org_id)
                ->where("unit_id", $request->unit_id)
                ->where("trash", null)
                ->where("type", "stream")
                ->get();
            return view(
                "objective.epicTeamsearch",
                compact("organization", "objective", "FladId")
            );
        }

        if ($request->type == "org") {
            $organization = DB::table("organization")
                ->where("slug", $request->slug)
                ->first();
            $objective = DB::table("objectives")
                ->where("unit_id", $request->unit_id)
                ->where("trash", null)
                ->where("type", "org")
                ->get();
            return view(
                "objective.epicTeamsearch",
                compact("organization", "objective",'FladId')
            );
        }

      
    }

    public function BUTeamDashboard($slug)
    {
    $organization = DB::table('business_units')->where('slug',$slug)->first();
    $BUTeam = DB::table('unit_team')->where('org_id',$organization->id)->get();   
   
    return view('Business-units.team-dashboard',compact('organization','BUTeam'));  
        
    }

    public function AssignEpicAll(Request $request)
    {
    

    if($request->type == 'org')
    {
    $organization = DB::table('organization')->where('id',$request->id)->first();
    if($request->val == 1)
    {

      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','org')->where('assign_status',1)->get();  
    }
    if($request->val == 0)
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','org')->where('assign_status',NULL)->get();  
    }
      if($request->val == 'all')
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','org')->get();  
    }

    }

    if($request->type == 'BU')
    {
    $organization = DB::table('unit_team')->where('id',$request->id)->first();
    if($request->val == 1)
    {
        
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','BU')->where('assign_status',1)->get();  
    }
    if($request->val == 0)
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','BU')->where('assign_status',NULL)->get();  
    }
      if($request->val == 'all')
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','BU')->get();  
    }

    }

    if($request->type == 'VS')
    {
    $organization = DB::table('value_team')->where('id',$request->id)->first();
    if($request->val == 1)
    {
        
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','VS')->where('assign_status',1)->get();  
    }
    if($request->val == 0)
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','VS')->where('assign_status',NULL)->get();  
    }
      if($request->val == 'all')
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','VS')->get();  
    }

    }

    if($request->type == 'orgT')
    {
    $organization = DB::table('org_team')->where('id',$request->id)->first();
    if($request->val == 1)
    {
        
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','orgT')->where('assign_status',1)->get();  
    }
    if($request->val == 0)
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','orgT')->where('assign_status',NULL)->get();  
    }
      if($request->val == 'all')
    {
      $Backlog  =  DB::table('team_backlog')->where('unit_id',$organization->id)->where('type','orgT')->get();  
    }

    }

    return view('Team.assign-backlog-all',compact('Backlog','organization'));  

    }
  

    
}
