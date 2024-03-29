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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class FlagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function flags($organizationid , $flagtype , $type)
    {
        if($flagtype == 'risk')
        {
            $flagtype = 'Risk';
        }
        if($flagtype == 'action')
        {
            $flagtype = 'Action';
        }
        if($flagtype == 'blocker')
        {
            $flagtype = 'Blocker';
        }
        if($flagtype == 'impediments')
        {
            $flagtype = 'Impediment';
        }
        if($type == 'stream')
        {
            $organization = DB::table('value_stream')->where('slug',$organizationid)->first();
        }
        if($type == 'unit')
        {
            $organization = DB::table('business_units')->where('slug',$organizationid)->first();
        }
        if($type == 'BU')
        {
            $organization = DB::table('unit_team')->where('slug',$organizationid)->first();
        }
        if($type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$organizationid)->first();
        }

        if($type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$organizationid)->first();
        }
        if($type == 'orgT')
        {
            $organization = DB::table('org_team')->where('slug',$organizationid)->first();
        }
        $doneflag = flags::where('business_units' , $organization->id)->where('flag_type' , $flagtype)->where('board_type' , $organization->type)->where('archived' , 2)->where('flag_status' , 'doneflag')->orderby('board_order' , 'asc')->get();
        $inprogress = flags::where('business_units' , $organization->id)->where('flag_type' , $flagtype)->where('board_type' , $organization->type)->where('archived' , 2)->where('flag_status' , 'inprogress')->orderby('board_order' , 'asc')->get();
        $todoflag = flags::where('business_units' , $organization->id)->where('flag_type' , $flagtype)->where('board_type' , $organization->type)->where('archived' , 2)->where('flag_status' , 'todoflag')->orderby('board_order' , 'asc')->get();
        $epics = DB::table('epics')->where('buisness_unit_id' , $organization->id)->where('trash' , Null)->get();
    	return view('flags.index',compact('organization','doneflag','inprogress','todoflag','type','epics','flagtype')); 
    }
    public function viewboards(Request $request)
    {
        if($request->type == 'stream')
        {
            $organization = DB::table('value_stream')->where('slug',$request->slug)->first();
        }
        if($request->type == 'unit')
        {
            $organization = DB::table('business_units')->where('slug',$request->slug)->first();
        }
        if($request->type == 'BU')
        {
            $organization = DB::table('unit_team')->where('slug',$request->slug)->first();
        }
        if($request->type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$request->slug)->first();
        }
        if($request->type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$request->slug)->first();
        }
        if($request->type == 'orgT')
        {
            $organization = DB::table("org_team")->where("slug", $request->slug)->first();
        }
        if($request->id == 'all')
        {
            $doneflag = flags::where('business_units' , $organization->id)->where('flag_type' , $request->flagtype)->where('board_type' , $organization->type)->where('archived',2)->where('flag_status' , 'doneflag')->orderby('board_order' , 'asc')->get();
            $inprogress = flags::where('business_units' , $organization->id)->where('flag_type' , $request->flagtype)->where('board_type' , $organization->type)->where('archived',2)->where('flag_status' , 'inprogress')->orderby('board_order' , 'asc')->get();
            $todoflag = flags::where('business_units' , $organization->id)->where('flag_type' , $request->flagtype)->where('board_type' , $organization->type)->where('archived',2)->where('flag_status' , 'todoflag')->orderby('board_order' , 'asc')->get();
        }
        if($request->id == 'archived')
        {
            $doneflag = flags::where('business_units' , $organization->id)->where('flag_type' , $request->flagtype)->where('board_type' , $organization->type)->where('archived' , 1)->where('flag_status' , 'doneflag')->orderby('board_order' , 'asc')->get();
            $inprogress = flags::where('business_units' , $organization->id)->where('flag_type' , $request->flagtype)->where('board_type' , $organization->type)->where('archived' , 1)->where('flag_status' , 'inprogress')->orderby('board_order' , 'asc')->get();
            $todoflag = flags::where('business_units' , $organization->id)->where('flag_type' , $request->flagtype)->where('board_type' , $organization->type)->where('archived' , 1)->where('flag_status' , 'todoflag')->orderby('board_order' , 'asc')->get();
        }
        $epics = DB::table('epics')->where('buisness_unit_id' , $organization->id)->where('trash' , Null)->get();
        $type = $request->type;
        $html = view('flags.viewboards',compact('organization','doneflag','inprogress','todoflag','type','epics'));
        return $html;
    }
    public function searchflag(Request $request)
    {
        $organization = DB::table('business_units')->where('id',$request->organization_id)->first();
        $flag = flags::where('business_units' , $organization->id)->where('flag_status' , $request->id)->where('flag_title', 'LIKE', "%$request->value%")->orderby('flag_order' , 'asc')->get();
        $html = view('flags.searchcard', compact('flag'))->render();
        return $html;
    }
    public function changestatus(Request $request)
    {
        $previousstatus = DB::table('flags')->where('id' , $request->droppedElId)->first()->flag_status;

        if($previousstatus == 'inprogress')
        {
            $from_status = '<b style="background-color: #E1DB3F; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 ">In Progress</b>';
        }
        if($previousstatus == 'doneflag')
        {
            $from_status = '<b style="background-color: #3fe1a7; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 ">Done</b>';
        }
        if($previousstatus == 'todoflag')
        {
            $from_status = '<b style="background-color: #6c757d; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 ">To Do</b>';
        }

        if($request->parentElId == 'todoflag')
        {
            $tostatus = '<b style="background-color: #6c757d; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 ">To Do</b>';
        }
        if($request->parentElId == 'doneflag')
        {
            $tostatus = '<b style="background-color: #3fe1a7; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 ">Done</b>';
        }
        if($request->parentElId == 'inprogress')
        {
            $tostatus = '<b style="background-color: #E1DB3F; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 ">In Progress</b>';
        }
        $notification = "Status Changed From ".$from_status .' To '.$tostatus;
        Cmf::save_activity(Auth::id() , $notification,'flags',$request->droppedElId , 'detector_status');

        DB::table('flags')->where('id',$request->droppedElId)->update(['flag_status' => $request->parentElId]);
        $data = flags::find($request->droppedElId);


        $html = view('flags.modalheader', compact('data'))->render();
        return $html;
    }
    public function modalheader(Request $request)
    {
        $data = flags::find($request->id);
        $html = view('flags.modalheader', compact('data'))->render();
        return $html;
    }
    public function removefromflag(Request $request)
    {
        $notification = DB::table('members')->where('id' , $request->id)->first()->name.' '.DB::table('members')->where('id' , $request->id)->first()->last_name.' Removed From Flag';
        Cmf::save_activity(Auth::id() , $notification,'flags',$request->flag_id , 'person_remove');
        flag_members::where('flag_id' , $request->flag_id)->where('member_id' , $request->id)->delete();
        $data = flags::find($request->flag_id);
        $html = view('flags.modalheader', compact('data'))->render();
        return $html;
    }
    public function savemember(Request $request)
    {
        $check = flag_members::where('flag_id' , $request->dataid)->where('member_id' , $request->id)->count();
        if($check > 0)
        {
            $notification = DB::table('members')->where('id' , $request->id)->first()->name.' '.DB::table('members')->where('id' , $request->id)->first()->last_name.' Removed From Flag';
            Cmf::save_activity(Auth::id() , $notification,'flags',$request->dataid, 'person_remove');
            flag_members::where('flag_id' , $request->dataid)->where('member_id' , $request->id)->delete();
        }
        else
        {
            $member = new flag_members();
            $member->member_id = $request->id;
            $member->flag_id = $request->dataid;
            $member->save();
            $notification = DB::table('members')->where('id' , $request->id)->first()->name.' '.DB::table('members')->where('id' , $request->id)->first()->last_name.' Added In Flag';
            Cmf::save_activity(Auth::id() , $notification,'flags',$request->dataid, 'person_add');
        }
        $data = flags::find($request->dataid);
        $html = view('flags.modalheader', compact('data'))->render();
        return $html;
    }
    public function getflagmodal(Request $request)
    {
        $data = flags::find($request->id);
        $comments = flag_comments::where('flag_id' , $request->id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $html = view('flags.editmodal', compact('data','comments'))->render();
        return $html;
    }
    public function updateflag(Request $request)
    {
        $update = flags::find($request->id);
        if($update->flag_title != $request->flag_title)
        {
            if($update->flag_title)
            {
                $rand = rand(123456789 , 987654321);
                $activity = 'has updated Title Field <a href="javascript:void(0)" onclick="showdetailsofactivity('.$rand.')">See Details</a> <div class="activitydetalbox deletecomment" id="activitydetalbox'.$rand.'"><div class="row"> <div class="col-md-10"> <h4>Title Update</h4> </div> <div class="col-md-2"> <img onclick="showdetailsofactivity('.$rand.')" src="'.url("public/assets/svg/crossdelete.svg").'"> </div> </div><p style="margin-bottom:0px;">'.$update->flag_title.'</p><div class="text-center mt-2 mb-2"><span class="material-symbols-outlined"> arrow_downward </span></div><p>'.$request->flag_title.'</p></div>';
                Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'edit');
            }else{
                $activity = 'Added a Tittle';
                Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'edit');
            }
        }
        if($update->flag_description != $request->flag_description)
        {
            if($update->flag_description)
            {
                $rand = rand(123456781239 , 987651234321);
                $activity = 'has updated Description Field <a href="javascript:void(0)" onclick="showdetailsofactivity('.$rand.')">See Details</a> <div class="activitydetalbox deletecomment" id="activitydetalbox'.$rand.'"><div class="row"> <div class="col-md-10"> <h4>Description Update</h4> </div> <div class="col-md-2"> <img onclick="showdetailsofactivity('.$rand.')" src="'.url("public/assets/svg/crossdelete.svg").'"> </div> </div><p style="margin-bottom:0px;">'.$update->flag_description.'</p><div class="text-center mt-2 mb-2"><span class="material-symbols-outlined"> arrow_downward </span></div><p>'.$request->flag_description.'</p></div>';
                Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'edit');
            }else{
                $activity = 'Added a Description';
                Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'edit');
            }
        }
        $update->flag_title = $request->flag_title;
        $update->flag_description = $request->flag_description;
        $update->save();
        $r = $update;
        if($update->escalate)
        {
            $escalte_id = escalate_cards::find($update->escalate);
            $update_escalated_flag = flags::find($escalte_id->flag_id);
            $update_escalated_flag->flag_title = $request->flag_title;
            $update_escalated_flag->flag_description = $request->flag_description;
            $update_escalated_flag->flag_type = $request->flag_type;
            $update_escalated_flag->save();
        }
        $html = view('flags.simplecard', compact('r'))->render();
        return $html;
    }
    public function deleteflag(Request $request)
    {
        $flag = flags::find($request->delete_id);
        if($flag->escalate)
        {

            $escalate = escalate_cards::find($flag->escalate);
            $activity = 'Deleted Escalation of this Flag';
            Cmf::save_activity(Auth::id() , $activity,'flags',$escalate->flag_id, 'delete');
            escalate_cards::where('id' , $flag->escalate)->delete();
        }
        $checkescalate = escalate_cards::where('flag_id' , $request->delete_id)->first();
        if($checkescalate)
        {
            escalate_cards::where('flag_id' , $request->delete_id)->delete();
            flags::where('escalate' , $checkescalate->id)->delete();
        }
        activities::where('type' , 'flags')->where('value_id' , $request->delete_id)->delete();
        flag_members::where('flag_id' , $request->delete_id)->delete();
        flag_comments::where('flag_id' , $request->delete_id)->delete();
        flags::where('id' , $request->delete_id)->delete();
    }
    public function createimpediment(Request $request)
    {
        $flag = new flags();
        $flag->business_units = $request->id;
        $flag->flag_type = $request->flag_type;
        $flag->archived = 2;
        $flag->flag_status = 'todoflag';
        $flag->board_type = $request->type;
        $flag->save();

        if($flag->board_type == 'VS')
        {
            $organizationlevel = 'Value Stream Team';
        }
        if($flag->board_type == 'BU')
        {
            $organizationlevel = 'Business Unit Team';
        }
        if($flag->board_type == 'org')
        {
            $organizationlevel = 'Organization';
        }
        if($flag->board_type == 'orgT')
        {
            $organizationlevel = 'Organization Team';
        }
        if($flag->board_type == 'unit')
        {
            $organizationlevel = 'Business Unit';
        }
        if($flag->board_type == 'stream')
        {
            $organizationlevel = 'Value Stream';
        }
        if($flag->board_type == 'stream')
        {
            $organizationlevel = 'Value Stream';
        }

        $activity = 'Created the '.$request->flag_type.' Flag at the '.$organizationlevel.' on '.Cmf::date_format_new($flag->created_at).' at '.Cmf::date_format_time($flag->created_at);
        Cmf::save_activity(Auth::id() , $activity,'flags',$flag->id , 'image');


        return $flag->id;
    }
    public function getepicflag(Request $request)
    {
        $epic = Epic::where('id' , $request->id)->first();
        $html = view('objective.includes.flagmodal', compact('epic'))->render();
        return $html;
    }
    public function updateepicflag(Request $request)
    {
        $flag = new flags();
        $flag->business_units = $request->buisness_unit_id;
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
        $activity = 'Created the '.$request->flag_type.' Flag on '.Cmf::date_format_new($flag->created_at).' at '.Cmf::date_format_time($flag->created_at);
        Cmf::save_activity(Auth::id() , $activity,'flags',$flag->id , 'image');
        DB::table('epics')->where('id',$request->flag_epic_id)->update(['flag_assign' => $request->flag_type]);
        DB::table('flags')->where('epic_id',$request->flag_epic_id)->where('flag_title',NULL)->delete();

        if($request->type == 'unit')
        {
            $organization  = DB::table('business_units')->where('slug',$request->slug)->first();
            $objective =     DB::table('objectives')->where('org_id',$request->org_id)->where('unit_id',$request->unit_id)->where('trash',NULL)->where('type','unit')->get();   
        }
        if($request->type == 'stream')
        {
            $organization  = DB::table('value_stream')->where('slug',$request->slug)->first();
            $objective =     DB::table('objectives')->where('org_id',$request->org_id)->where('unit_id',$request->unit_id)->where('trash',NULL)->where('type','stream')->get();
        }
        if($request->type == 'BU')
        {
            $organization  = DB::table('unit_team')->where('slug',$request->slug)->first();
            $objective =     DB::table('objectives')->where('unit_id',$organization->id)->where('trash',NULL)->where('type','BU')->get();   
        }
        if($request->type == 'VS')
        {
            $organization  = DB::table('value_team')->where('slug',$request->slug)->first();
            $objective =     DB::table('objectives')->where('unit_id',$organization->id)->where('trash',NULL)->where('type','VS')->get();
        }
        if($request->type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$request->slug)->first();
            $objective =     DB::table('objectives')->where('unit_id',$organization->id)->where('trash',NULL)->where('type','org')->get();
        }
        if($request->type == 'orgT')
        {
            $organization = DB::table("org_team")->where("slug", $request->slug)->first();
            $objective = DB::table("objectives")->where("unit_id", $organization->id)->where("trash", null)->where("type", "orgT")->get();
        }
        return view('objective.objective-render',compact('organization','objective')); 
    }
    public function archiveflag(Request $request)
    {
        flags::where('id' , $request->id)->update(array('archived' =>1));
    }
    public function unarchiveflag(Request $request)
    {
        flags::where('id' , $request->id)->update(array('archived' =>2));
    }
    public function showepicdetail(Request $request)
    {
        $data  = Epic::where('id' , $request->id)->first();
        $buisness_unit_id = DB::table('business_units')->where('id' , $data->buisness_unit_id)->first()->business_name;
        $obj_id = DB::table('objectives')->where('id' , $data->obj_id)->first()->objective_name;
        $key_id = DB::table('key_result')->where('id' , $data->key_id)->first()->key_name;
        $initiative_id = DB::table('initiative')->where('id' , $data->initiative_id)->first()->initiative_name;
        $string = $buisness_unit_id.' / '.$obj_id.' / '.$key_id.' / '.$initiative_id;
        return response()->json(array('message' => $string, 'error' => 1));
    }
    public function escalateflag(Request $request)
    {
        $flag = flags::find($request->id);
        if($flag->escalate)
        {
            $escalated = escalate_cards::where('id' , $flag->escalate)->first();
            $orignal_flag_id = $escalated->orignal_flag_id;
        }else{
            $orignal_flag_id = $request->id;
        }
        if($flag->board_type == 'orgT')
        {
            $getteam = DB::table('org_team')->where('id' , $flag->business_units)->first();
            $unit    = DB::table('organization')->where('id' , $getteam->org_id)->first();
            $add = new escalate_cards();
            $add->flag_id = $request->id;
            $add->from = 'org_team';
            $add->to = 'organization';
            $add->from_id = $getteam->id;
            $add->orignal_flag_id = $orignal_flag_id;
            $add->to_id = $unit->id;
            $add->save();
            // Save Flag to Escalate
            $addescalateflag = new flags();
            $addescalateflag->business_units = $add->to_id;
            $addescalateflag->epic_id = $flag->epic_id;
            $addescalateflag->flag_type = $flag->flag_type;
            $addescalateflag->flag_assign = $flag->flag_assign;
            $addescalateflag->flag_title = $flag->flag_title;
            $addescalateflag->flag_description = $flag->flag_description;
            $addescalateflag->archived = 2;
            $addescalateflag->flag_status = 'todoflag';
            $addescalateflag->board_type = 'unit';
            $addescalateflag->escalate = $add->id;
            $addescalateflag->save();
            $activity = 'Escalated '.$flag->flag_type.' To Organization Level';
            Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'escalator');
        }
        if($flag->board_type == 'BU')
        {
            $getteam = DB::table('unit_team')->where('id' , $flag->business_units)->first();
            $unit    = DB::table('business_units')->where('id' , $getteam->org_id)->first();
            $add = new escalate_cards();
            $add->flag_id = $request->id;
            $add->from = 'unit_team';
            $add->to = 'business_units';
            $add->from_id = $getteam->id;
            $add->orignal_flag_id = $orignal_flag_id;
            $add->to_id = $unit->id;
            $add->save();
            // Save Flag to Escalate
            $addescalateflag = new flags();
            $addescalateflag->business_units = $add->to_id;
            $addescalateflag->epic_id = $flag->epic_id;
            $addescalateflag->flag_type = $flag->flag_type;
            $addescalateflag->flag_assign = $flag->flag_assign;
            $addescalateflag->flag_title = $flag->flag_title;
            $addescalateflag->flag_description = $flag->flag_description;
            $addescalateflag->archived = 2;
            $addescalateflag->flag_status = 'todoflag';
            $addescalateflag->board_type = 'unit';
            $addescalateflag->escalate = $add->id;
            $addescalateflag->save();
            $activity = 'Escalated '.$flag->flag_type.' To Business unit Level';
            Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'escalator');
        }
        if($flag->board_type == 'VS')
        {
            $getstream = DB::table('value_team')->where('id' , $flag->business_units)->first();
            $unit    = DB::table('value_stream')->where('id' , $getstream->org_id)->first();
            $add = new escalate_cards();
            $add->flag_id = $request->id;
            $add->from = 'value_team';
            $add->to = 'value_stream';
            $add->from_id = $getstream->id;
            $add->orignal_flag_id = $orignal_flag_id;
            $add->to_id = $unit->id;
            $add->save();
            // Save Flag to Escalate
            $addescalateflag = new flags();
            $addescalateflag->business_units = $add->to_id;
            $addescalateflag->epic_id = $flag->epic_id;
            $addescalateflag->flag_type = $flag->flag_type;
            $addescalateflag->flag_assign = $flag->flag_assign;
            $addescalateflag->flag_title = $flag->flag_title;
            $addescalateflag->flag_description = $flag->flag_description;
            $addescalateflag->archived = 2;
            $addescalateflag->flag_status = 'todoflag';
            $addescalateflag->board_type = 'stream';
            $addescalateflag->escalate = $add->id;
            $addescalateflag->save();
            $activity = 'Escalated '.$flag->flag_type.' To Value Stream Level';
            Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'escalator');
        }
        if($flag->board_type == 'stream')
        {
            $getstream = DB::table('value_stream')->where('id' , $flag->business_units)->first();
            $unit    = DB::table('business_units')->where('id' , $getstream->unit_id)->first();
            $add = new escalate_cards();
            $add->flag_id = $request->id;
            $add->from = 'value_stream';
            $add->to = 'business_units';
            $add->from_id = $getstream->id;
            $add->orignal_flag_id = $orignal_flag_id;
            $add->to_id = $unit->id;
            $add->save();
            // Save Flag to Escalate
            $addescalateflag = new flags();
            $addescalateflag->business_units = $add->to_id;
            $addescalateflag->epic_id = $flag->epic_id;
            $addescalateflag->flag_type = $flag->flag_type;
            $addescalateflag->flag_assign = $flag->flag_assign;
            $addescalateflag->flag_title = $flag->flag_title;
            $addescalateflag->flag_description = $flag->flag_description;
            $addescalateflag->archived = 2;
            $addescalateflag->flag_status = 'todoflag';
            $addescalateflag->board_type = 'unit';
            $addescalateflag->escalate = $add->id;
            $addescalateflag->save();
            $activity = 'Escalated '.$flag->flag_type.' To Business unit Level';
            Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'escalator');
        }
        if($flag->board_type == 'unit')
        {
            $business_units = DB::table('business_units')->where('id' , $flag->business_units)->first();
            $organization    = DB::table('organization')->where('user_id' , Auth::id())->first();
            $add = new escalate_cards();
            $add->flag_id = $request->id;
            $add->from = 'business_units';
            $add->to = 'organization';
            $add->from_id = $business_units->id;
            $add->orignal_flag_id = $orignal_flag_id;
            $add->to_id = $organization->id;
            $add->save();
            // Save Flag to Escalate
            $addescalateflag = new flags();
            $addescalateflag->business_units = $add->to_id;
            $addescalateflag->epic_id = $flag->epic_id;
            $addescalateflag->flag_type = $flag->flag_type;
            $addescalateflag->flag_assign = $flag->flag_assign;
            $addescalateflag->flag_title = $flag->flag_title;
            $addescalateflag->flag_description = $flag->flag_description;
            $addescalateflag->archived = 2;
            $addescalateflag->flag_status = 'todoflag';
            $addescalateflag->board_type = 'org';
            $addescalateflag->escalate = $add->id;
            $addescalateflag->save();
            $activity = 'Escalated '.$flag->flag_type.' To Organization Level';
            Cmf::save_activity(Auth::id() , $activity,'flags',$request->id, 'escalator');
        }
    }
    public function savecomment(Request $request)
    {
        $addcomment = new flag_comments();
        $addcomment->flag_id = $request->flag_id;
        $addcomment->user_id = $request->user_id;
        $addcomment->comment = $request->comment;
        $addcomment->type = 'comment';
        $addcomment->save();
        Cmf::save_activity(Auth::id() , 'Added a New Comment','flags',$request->flag_id, 'comment');
        $comments = flag_comments::where('flag_id' , $request->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = flags::find($request->flag_id);
        $html = view('flags.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function updatecomment(Request $request)
    {
        $addcomment = flag_comments::find($request->comment_id);
        $addcomment->comment = $request->comment;
        $addcomment->save();

        Cmf::save_activity(Auth::id() , 'Update a Comment','flags',$addcomment->flag_id, 'comment');


        $comments = flag_comments::where('flag_id' , $addcomment->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = flags::find($addcomment->flag_id);
        $html = view('flags.tabs.comments', compact('comments','data'))->render();
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
        Cmf::save_activity(Auth::id() , 'Reply a Comment','flags',$request->flag_id, 'reply');
        $comments = flag_comments::where('flag_id' , $request->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        $data = flags::find($request->flag_id);
        $html = view('flags.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function deletecomment(Request $request)
    {
        $comment = flag_comments::find($request->id);
        flag_comments::where('id' , $request->id)->delete();
        flag_comments::where('comment_id' , $request->id)->delete();
        $comments = flag_comments::where('flag_id' , $comment->flag_id)->wherenull('comment_id')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Comment','flags',$comment->flag_id, 'comment');
        $data = flags::find($comment->flag_id);
        $html = view('flags.tabs.comments', compact('comments','data'))->render();
        return $html;
    }
    public function showtab(Request $request)
    {
        if($request->tab == 'general')
        {
            $data = flags::find(Cmf::gerescalatedmainid($request->id));
            $html = view('flags.tabs.general', compact('data'))->render();
            return $html;
        }
        if($request->tab == 'comment')
        {
            $comments = flag_comments::where('flag_id' , Cmf::gerescalatedmainid($request->id))->wherenull('comment_id')->orderby('id' , 'desc')->get();
            $data = flags::find($request->id);
            $html = view('flags.tabs.comments', compact('comments','data'))->render();
            return $html;
        }
        if($request->tab == 'activites')
        {
            $activity = activities::where('value_id' , Cmf::gerescalatedmainid($request->id))->where('type' , 'flags')->orderby('id' , 'desc')->get();
            $data = flags::find(Cmf::gerescalatedmainid($request->id));
            $html = view('flags.tabs.activities', compact('activity','data'))->render();
            return $html;
        }
        if($request->tab == 'attachment')
        {
            $extensions = attachments::where('value_id' , Cmf::gerescalatedmainid($request->id))->groupBy('extension')->where('type' , 'flags')->orderby('id' , 'desc')->get();
            $attachments = attachments::where('value_id' , Cmf::gerescalatedmainid($request->id))->where('type' , 'flags')->orderby('id' , 'desc')->get();
            $data = flags::find(Cmf::gerescalatedmainid($request->id));
            $html = view('flags.tabs.attachments', compact('attachments','data','extensions'))->render();
            return $html;
        }
    }
    public function filterbyextension(Request $request)
    {
        $extensions = attachments::where('value_id' , $request->id)->groupBy('extension')->where('type' , 'flags')->orderby('id' , 'desc')->get();
        if($request->extention == 'All')
        {
            $attachments = attachments::where('value_id' , $request->id)->where('type' , 'flags')->orderby('id' , 'desc')->get();
        }else{
            $attachments = attachments::where('value_id' , $request->id)->where('extension' , $request->extention)->where('type' , 'flags')->orderby('id' , 'desc')->get();
        }
        
        $data = flags::find($request->id);
        $extension = $request->extention;
        $html = view('flags.tabs.attachments', compact('attachments','data','extensions','extension'))->render();
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
        $add->type = 'flags';
        $add->value_id = $request->value_id;
        $add->save();
        Cmf::save_activity(Auth::id() , 'Added a New Attachment','flags',$request->value_id, 'attach_file');
        $extensions = attachments::where('value_id' , $request->value_id)->groupBy('extension')->where('type' , 'flags')->orderby('id' , 'desc')->get();
        $attachments = attachments::where('value_id' , $request->value_id)->where('type' , 'flags')->orderby('id' , 'desc')->get();
        $data = flags::find($request->value_id);
        $html = view('flags.tabs.attachments', compact('attachments','data','extensions'))->render();
        return $html;
    }
    public function deleteattachment(Request $request)
    {
        $attachment = attachments::find($request->id);
        attachments::where('id',$request->id)->delete();
        $attachments = attachments::where('value_id' , $attachment->value_id)->where('type' , 'flags')->orderby('id' , 'desc')->get();
        Cmf::save_activity(Auth::id() , 'Delete a Attachment','flags',$attachment->value_id, 'delete');
        $data = flags::find($attachment->value_id);
        $html = view('flags.tabs.attachments', compact('attachments','data'))->render();
        return $html;
    }
    public function showorderby(Request $request)
    {
        if($request->table == 'flag_comments')
        {
            $comments = flag_comments::where('flag_id' , $request->flag_id)->wherenull('comment_id')->orderby('id' , $request->id)->get();
            $orderby = $request->id;
            $data = flags::find($request->flag_id);
            $html = view('flags.tabs.comments', compact('comments','data','orderby'))->render();
            return $html;
        }
        if($request->table == 'activities')
        {
            $activity = activities::where('value_id' , $request->flag_id)->where('type' , 'flags')->orderby('id' , $request->id)->get();
            $orderby = $request->id;
            $data = flags::find($request->flag_id);
            $html = view('flags.tabs.activities', compact('activity','data','orderby'))->render();
            return $html;
        }
        if($request->table == 'attachments')
        {
            $attachments = attachments::where('value_id' , $request->flag_id)->where('type' , 'flags')->orderby('id' , $request->id)->get();
            $data = flags::find($request->flag_id);
            $orderby = $request->id;
            $html = view('flags.tabs.attachments', compact('attachments','data','orderby'))->render();
            return $html;
        }
    }
    public function searchmember(Request $request)
    {
        $member = DB::table('members')->where('name', 'LIKE', "%$request->id%")->where('org_user' , Auth::id())->limit(2)->get();
        $data = flags::find($request->dataid);
        $html = view('flags.tabs.searchmember', compact('member','data'))->render();
            return $html;
    }
    public function removeepic(Request $request)
    {

        $update = flags::find($request->id);
        $update->epic_id = null;
        $update->save();

        Cmf::save_activity(Auth::id() , 'Remove Epic  From Flag','flags',$request->id, 'delete');

        $data = flags::find($request->id);
        $html = view('flags.tabs.epicinputtoshow', compact('data'))->render();
        return $html;
    }
    public function selectepic(Request $request)
    {
        $update = flags::find($request->flagid);
        $update->epic_id = $request->id;
        $epic = Epic::find($request->id);
        $update->save();
        $notification = 'Epic <b style="background-color: #6c757d; color: white; border-radius: 10px; padding:10px 7px; font-weight:400 "> '.$epic->epic_name. ' </b> Added in Flag';
        Cmf::save_activity(Auth::id() , $notification,'flags',$request->flagid, 'add');
        $data = flags::find($request->flagid);
        $html = view('flags.tabs.epicinputtoshow', compact('data'))->render();
        return $html;
    }
    public function searchepic(Request $request)
    {
        if($request->type == 'stream')
        {
            $organization = DB::table('value_stream')->where('slug',$request->organizationid)->first();
        }
        if($request->type == 'unit')
        {
            $organization = DB::table('business_units')->where('slug',$request->organizationid)->first();
        }
        if($request->type == 'BU')
        {
            $organization = DB::table('unit_team')->where('slug',$request->organizationid)->first();
        }
        if($request->type == 'VS')
        {
            $organization = DB::table('value_team')->where('slug',$request->organizationid)->first();
        }

        if($request->type == 'org')
        {
            $organization = DB::table('organization')->where('slug',$request->organizationid)->first();
        }
        if($request->type == 'orgT')
        {
            $organization = DB::table('org_team')->where('slug',$request->organizationid)->first();
        }
        $epics = DB::table('epics')->where('epic_name', 'LIKE', "%$request->id%")->where('buisness_unit_id' , $organization->id)->where('epic_type' , $request->type)->where('trash' , Null)->get();

        if($epics->count() > 0)
        {
            foreach ($epics as $r) {
                $data  = Epic::where('id' , $r->id)->first();
                $buisness_unit_id = DB::table('business_units')->where('id' , $data->buisness_unit_id)->first()->business_name;
                $obj_id = DB::table('objectives')->where('id' , $data->obj_id)->first()->objective_name;
                $key_id = DB::table('key_result')->where('id' , $data->key_id)->first()->key_name;
                $initiative_id = DB::table('initiative')->where('id' , $data->initiative_id)->first()->initiative_name;
                $string = $buisness_unit_id.' / '.$obj_id.' / '.$key_id.' / '.$initiative_id;
                echo '<div onclick="selectepic('.$r->id.')" class="epic">
                        <div class="epic-tittle">'.$r->epic_name.'</div>
                        <div class="epic-detail">'.$string.'</div>
                    </div>';
            }
        }else{
            echo '<div class="nodatafound">
                <h4>No Epics Found Try Again</h4>    
            </div>';
        }
        
    }
    public function moveflag(Request $request)
    {
        $flag = flags::find($request->flag_id);
        $flag->flag_status = $request->board;
        $flag->save();
    }
    public function updateflagstatus(Request $request)
    {
        $flag = flags::find($request->flag_id);
        $flag->flag_status = $request->board;
        $flag->save();
    }

    public function sortflags(Request $request)
    {
        if($request->ordertodo)
        {
            foreach ($request->ordertodo as $key=> $r) {
                $test = $key+1;
                $item = flags::find($r);
                $item->board_order = $test;
                $item->save();        
            }
        }
        if($request->orderinprogress)
        {
            foreach ($request->orderinprogress as $key=> $r) {
                $test = $key+1;
                $item = flags::find($r);
                $item->board_order = $test;
                $item->save();        
            }
        }
        if($request->orderdone)
        {
            foreach ($request->orderdone as $key=> $r) {
                $test = $key+1;
                $item = flags::find($r);
                $item->board_order = $test;
                $item->save();        
            }
        }
    }
}
