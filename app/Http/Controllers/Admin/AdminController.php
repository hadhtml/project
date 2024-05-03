<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Cmf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\business_units;
use App\Models\value_stream;
use App\Models\initiative;
use App\Models\objectives;
use App\Models\key_result;
use App\Models\Quarter;
use App\Models\flags;
use App\Models\team_link_child;
use App\Models\activities;
use App\Models\team_backlog;
use App\Models\org_team;
use App\Models\unit_team;
use App\Models\value_team;
use App\Models\epics_stroy;
use App\Models\flag_comments;
use App\Models\flag_members;
use App\Models\attachments;
use App\Models\modulenames;
use App\Models\jira_setting;
use App\Models\clonefromandtos;
use App\Models\quarter_month;
use App\Models\Epic;
use Illuminate\Support\Str;
use DB;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard/index');
    }
    public function allusers()
    {
        $data = Organization::select(
                "users.id",
                "users.name",
                "users.email",
                "users.created_at",
                "organization.organization_name")
                ->wherenull('users.type')
                ->leftJoin('users', 'organization.user_id', '=', 'users.id')
                ->paginate(10);
        return view('admin.users.all')->with(array('data' => $data));
    }
    public function clonefromandtos($from , $to , $clone_from , $clone_to , $type)
    {
        $add = new clonefromandtos();
        $add->from = $from;
        $add->to = $to;
        $add->clone_from = $clone_from;
        $add->clone_to = $clone_to;
        $add->type = $type;
        $add->save();
    }
    public function cloneuser()
    {
        $data = Organization::select(
                "users.id",
                "users.name",
                "users.last_name",
                "users.created_at",
                "organization.organization_name")
                ->wherenull('users.type')
                ->leftJoin('users', 'organization.user_id', '=', 'users.id')
                ->get();
        return view('admin.users.cloneuser')->with(array('data' => $data));
    }
    public function getuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $html = view('admin.users.userdata', compact('from' , 'to'))->render();
        return $html;
    }
    public function gettabledata($tablename , $user_id)
    {
        return DB::table($tablename)->where('user_id' , $user_id)->get();
    }

    public function cloneflags($flags , $business_units , $to , $epic_id)
    {
        foreach($flags as $f) {
            $flag = new flags();
            $flag->epic_id = $epic_id;
            $flag->business_units = $business_units;
            $flag->flag_type = $f->flag_type;
            $flag->flag_title = $f->flag_title;
            $flag->flag_description = $f->flag_description;
            $flag->flag_status = $f->flag_status;
            $flag->flag_order = $f->flag_order;
            $flag->archived = $f->archived;
            $flag->board_type = $f->board_type;
            $flag->board_order = $f->board_order;
            $flag->flag_assign = $f->flag_assign;
            $flag->epic_type = $f->epic_type;
            $flag->save();
            // Flag Members Start
            $flag_members = flag_members::where('flag_id' , $f->id)->get();
            foreach ($flag_members as $f_m) {
                $member = new flag_members();
                $member->member_id = $f_m->member_id;
                $member->flag_id = $flag->id;
                $member->save(); 
            }
            // Flag Comments
            $flagcomments  = flag_comments::where('flag_id' , $f->id)->get();
            foreach ($flagcomments as $f_c) {
                $addcomment = new flag_comments();
                $addcomment->flag_id = $flag->id;
                $addcomment->user_id = $to;
                $addcomment->comment = $f_c->comment;
                $addcomment->type = $f_c->type;
                $addcomment->save();
                if($f_c->type == 'reply')
                {
                    $updateaddcomment = flag_comments::find($addcomment->id);
                    $updateaddcomment->comment_id = $addcomment->id;
                    $updateaddcomment->save();
                }
            }
            // Flag Activites
            $activity = activities::where('value_id' , $f->id)->where('type' , 'flags')->get();

            foreach ($activity as $f_a) {
                $act = new activities();
                $act->user_id = $to;
                $act->activity = $f_a->activity;
                $act->is_read = $f_a->is_read;
                $act->type = $f_a->type;
                $act->value_id = $flag->id;
                $act->icon = $f_a->icon;
                $act->save();
            }
            // Flag Attactments
            $attachments = attachments::where('value_id' , $f->id)->where('type' , 'flags')->get();
            foreach ($attachments as $f_at) {
                $add = new attachments();
                $add->user_id = $to;
                $add->attachment = $f_at->attachment;
                $add->file_name = $f_at->file_name;
                $add->extension = $f_at->extension;
                $add->type = $f_at->type;
                $add->value_id = $flag->id;
                $add->save();
            }

        }
    }
    public function cloneepic($backlogs , $business_units , $to)
    {
        foreach ($backlogs as $b) {
            $add = new team_backlog();
            $add->epic_status = $b->epic_status;
            $add->epic_title = $b->epic_title;
            $add->epic_detail = $b->epic_detail;
            $add->epic_start_date = $b->epic_start_date;
            $add->epic_end_date = $b->epic_end_date;
            $add->unit_id = $business_units;
            $add->assign_status = $b->assign_status;
            $add->jira_id = $b->jira_id;
            $add->quarter = $b->quarter;
            $add->jira_project = $b->jira_project;
            $add->team_id = $b->team_id;
            $add->position = $b->position;
            $add->account_id = $b->account_id;
            $add->type = $b->type;
            $add->user_id = $to;
            $add->backlog_id = $b->backlog_id;
            $add->progress = $b->progress;;
            $add->save();

            $this->clonefromandtos($from = Null, $to , $b->id , $add->id , 'epic_backlog');

            foreach (epics_stroy::where('epic_id' , $b->id)->where('epic_type' , 'epicbacklog')->get() as $r) {
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
                $item->user_id =  $to;
                $item->save();
                if($r->story_status == 'Done')
                {
                    $item = epics_stroy::find($item->id);
                    $item->progress =  100;
                    $item->save();
                }
            }
            foreach(activities::where('value_id' , $b->id)->get() as $r) {
                $activity = new activities();
                $activity->user_id = $to;
                $activity->activity = $r->activity;
                $activity->is_read = $r->is_read;
                $activity->value_id = $add->id;
                $activity->type = $r->type;
                $activity->icon = $r->icon;
                $activity->save();
            }
            foreach(flag_comments::where('flag_id' , $b->id)->get() as $r) {
                $comment = new flag_comments();
                $comment->flag_id = $add->id;
                $comment->user_id = $to;
                $comment->comment = $r->comment;
                $comment->type = $r->type;
                $comment->comment_id = $r->comment_id;
                $comment->comment_type = $r->comment_type;
                $comment->save();
                $commentReply = flag_comments::where('flag_id',$comment->flag_id)->where('type','comment')->first();
                flag_comments::where('flag_id',$comment->flag_id)->where('type','reply')->update(['comment_id' => $commentReply->id ]);

            }
            foreach(attachments::where('value_id' , $b->id)->get() as $r) {
                $attachment = new attachments();
                $attachment->user_id = $to;
                $attachment->attachment = $r->attachment;
                $attachment->file_name = $r->file_name;
                $attachment->extension = $r->extension;
                $attachment->type = $r->type;
                $attachment->value_id = $add->id;
                $attachment->save();
            }
            foreach(flags::where('epic_id' , $b->id)->where('epic_type' , 'backlog')->get() as $r) {
                $flag = new flags();
                $flag->epic_id = $add->id;
                $flag->business_units = $business_units;
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
                $flag->save();
            }
        }        
    }
    public function cloneokrmapper($objectives , $org_id , $to)
    {
        foreach ($objectives as $o) {
            $createobjective = new objectives();
            $createobjective->user_id = $to;
            $createobjective->org_id = $org_id;
            $createobjective->objective_name = $o->objective_name;
            $createobjective->start_date = $o->start_date;
            $createobjective->end_date = $o->end_date;
            $createobjective->detail = $o->detail;
            $createobjective->status = $o->status;
            $createobjective->obj_prog = $o->obj_prog;       
            $createobjective->q_obj_prog = $o->q_obj_prog;     
            $createobjective->unit_id = $org_id;    
            $createobjective->type = $o->type;       
            $createobjective->IndexCount = $o->IndexCount;
            $createobjective->save();
            $this->clonefromandtos($from = Null , $to , $o->id , $createobjective->id , 'objectives');
            $org_keyresult = DB::table('key_result')->where('obj_id' , $o->id)->get();
            foreach ($org_keyresult as $k) {
                $org_add_key_result = new key_result();
                $org_add_key_result->user_id = $to;     
                $org_add_key_result->obj_id = $createobjective->id; 
                $org_add_key_result->key_name  =     $k->key_name;
                $org_add_key_result->key_start_date =     $k->key_start_date;
                $org_add_key_result->key_end_date =      $k->key_end_date;
                $org_add_key_result->key_detail =$k->key_detail;
                $org_add_key_result->key_status  =   $k->key_status;
                $org_add_key_result->key_prog   =$k->key_prog;
                $org_add_key_result->weight =$k->weight;
                $org_add_key_result->q_key_prog =    $k->q_key_prog;
                $org_add_key_result->unit_id     =   $org_id;
                $org_add_key_result->target_value =      $k->target_value;
                $org_add_key_result->key_result_type =       $k->key_result_type;
                $org_add_key_result->key_unit       =$k->key_unit;
                $org_add_key_result->init_value     =$k->init_value;
                $org_add_key_result->target_number   =   $k->target_number;
                $org_add_key_result->type       = $k->type;
                $org_add_key_result->IndexCount = $k->IndexCount;
                $org_add_key_result->save();
                $this->clonefromandtos($from = Null , $to , $k->id , $org_add_key_result->id , 'keyresult');


                


                

                
                $initiative = DB::table('initiative')->where('key_id' , $k->id)->get();
                foreach ($initiative as $i) {
                    $org_initiative = new initiative;
                    $org_initiative->initiative_name = $i->initiative_name;
                    $org_initiative->obj_id = $createobjective->id;
                    $org_initiative->key_id = $org_add_key_result->id;
                    $org_initiative->initiative_start_date = $i->initiative_start_date;
                    $org_initiative->initiative_end_date = $i->initiative_end_date;
                    $org_initiative->initiative_detail = $i->initiative_detail;
                    $org_initiative->user_id = $to;
                    $org_initiative->initiative_weight = $i->initiative_weight;
                    $org_initiative->initiative_status = $i->initiative_status;
                    $org_initiative->IndexCount = $i->IndexCount;
                    $org_initiative->save();
                    $quarter = DB::table('quarter')->where('initiative_id' , $i->id)->get();
                    foreach ($quarter as $q) {
                        $addquarter = new Quarter();
                        $addquarter->quarter_name = $q->quarter_name;
                        $addquarter->initiative_id = $org_initiative->id;
                        $addquarter->user_id = $to;
                        $addquarter->quarter_progress = $q->quarter_progress;
                        $addquarter->year = $q->year;
                        $addquarter->loop_index = $q->loop_index;
                        $addquarter->save();
                        $quarter_month = quarter_month::where('quarter_id' , $q->id)->get();
                        foreach ($quarter_month as $q_m) {
                            $addquartermonth = new quarter_month();
                            $addquartermonth->quarter_id = $addquarter->id;
                            $addquartermonth->month = $q_m->month;
                            $addquartermonth->user_id = $to;
                            $addquartermonth->initiative_id = $org_initiative->id;
                            $addquartermonth->quarter_name = $q_m->quarter_name;
                            $addquartermonth->year = $q_m->year;
                            $addquartermonth->org_id = $org_id;
                            $addquartermonth->save();
                        }
                    }
                    $epics = DB::table('epics')->where('initiative_id' , $i->id)->get();
                    foreach ($epics as $e) {
                        $createepic = new Epic();
                        $monthid = $e->month_id;
                        $quarter_month = DB::table('quarter_month')->where('id' , $monthid)->first();
                        $newquartermonth  = DB::table('quarter_month')->where('month' , $quarter_month->month)->where('quarter_name' , $quarter_month->quarter_name)->where('year' , $quarter_month->year)->where('initiative_id' , $org_initiative->id)->first();
                        $createepic->month_id = $newquartermonth->id;
                        $createepic->epic_status = $e->epic_status;    
                        $createepic->epic_name  = $e->epic_name;
                        $createepic->epic_detail  = $e->epic_detail;  
                        $createepic->epic_start_date = $e->epic_start_date;
                        $createepic->epic_end_date  = $e->epic_end_date;
                        $createepic->epic_progress  = $e->epic_progress;
                        $createepic->user_id = $to;
                        $createepic->initiative_id = $org_initiative->id;  
                        $createepic->quarter_id = $newquartermonth->quarter_id;
                        $createepic->backlog_id = $e->backlog_id;
                        $createepic->type   = $e->type;
                        $createepic->flag_type = $e->flag_type;
                        $createepic->flag_assign = $e->flag_assign;
                        $createepic->flag_title = $e->flag_title;
                        $createepic->flag_description = $e->flag_description;
                        $createepic->flag_status =    $e->flag_status;
                        $createepic->flag_order = $e->flag_order;
                        $createepic->obj_id = $createobjective->id;
                        $createepic->buisness_unit_id = $org_id;                
                        $createepic->key_id = $org_add_key_result->id;
                        $createepic->jira_id  =   $e->jira_id;
                        $createepic->jira_project =   $e->jira_project;
                        $createepic->account_id = $e->account_id;
                        $createepic->epic_type  = $e->epic_type;
                        $createepic->old_date = $e->old_date;
                        $createepic->save();
        
                        $this->clonefromandtos($from = Null, $to , $e->id , $createepic->id , 'epics');


                        $flags = flags::where('epic_id' , $e->id)->get();
                        $this->cloneflags($flags ,$org_id , $to , $createepic->id);

                        foreach (epics_stroy::where('epic_id' , $e->id)->where('epic_type' , 'orignal')->get() as $r) {
                            $item = new epics_stroy();
                            $item->epic_id = $createepic->id;
                            $item->epic_story_name = $r->epic_story_name;
                            $item->story_assign = $r->story_assign;
                            $item->story_type = $r->story_type;
                            $item->description = $r->description;
                            $item->story_status = $r->story_status;
                            $item->StoryID = $r->StoryID;
                            $item->epic_type = $r->epic_type;
                            $item->R_id = $r->R_id;
                            $item->user_id =  $to;
                            $item->save();
                            if($r->story_status == 'Done')
                            {
                                $item = epics_stroy::find($item->id);
                                $item->progress =  100;
                                $item->save();
                            }
                        }
                        foreach(activities::where('value_id' , $e->id)->where('type' , 'epics')->get() as $r) {
                            $activity = new activities();
                            $activity->user_id = $to;
                            $activity->activity = $r->activity;
                            $activity->is_read = $r->is_read;
                            $activity->value_id = $createepic->id;
                            $activity->type = $r->type;
                            $activity->icon = $r->icon;
                            $activity->save();
                        }
                        foreach(flag_comments::where('flag_id' , $e->id)->get() as $r) {
                            $comment = new flag_comments();
                            $comment->flag_id = $createepic->id;
                            $comment->user_id = $to;
                            $comment->comment = $r->comment;
                            $comment->type = $r->type;
                            $comment->comment_id = $r->comment_id;
                            $comment->comment_type = $r->comment_type;
                            $comment->save();
                            $commentReply = flag_comments::where('flag_id',$comment->flag_id)->where('type','comment')->first();
                            flag_comments::where('flag_id',$comment->flag_id)->where('type','reply')->update(['comment_id' => $commentReply->id ]);

                        }
                        foreach(attachments::where('value_id' , $e->id)->get() as $r) {
                            $attachment = new attachments();
                            $attachment->user_id = $to;
                            $attachment->attachment = $r->attachment;
                            $attachment->file_name = $r->file_name;
                            $attachment->extension = $r->extension;
                            $attachment->type = $r->type;
                            $attachment->value_id = $createepic->id;
                            $attachment->save();
                        }




                    }
                }
            }
        }
    }
    public function importuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $frommodulenames = DB::table('modulenames')->where('user_id' , $from)->first();
        $tomodulenames = DB::table('modulenames')->where('user_id' , $to)->first();

        $updatemodulename  = modulenames::find($tomodulenames->id);
        $updatemodulename->level_one = $frommodulenames->level_one;
        $updatemodulename->slug_one = $frommodulenames->slug_one;
        $updatemodulename->level_two = $frommodulenames->level_two;
        $updatemodulename->slug_two = $frommodulenames->slug_two;
        $updatemodulename->level_three = $frommodulenames->level_three;
        $updatemodulename->slug_three = $frommodulenames->slug_three;
        $updatemodulename->save();

        $fromjira_setting = jira_setting::where('user_id' , $from)->first();
        if($fromjira_setting)
        {
            $addtojira_setting = new jira_setting();
            $addtojira_setting->user_name = $fromjira_setting->user_name;
            $addtojira_setting->token = $fromjira_setting->token;
            $addtojira_setting->user_id = $to;
            $addtojira_setting->sync = $fromjira_setting->sync;
            $addtojira_setting->jira_url = $fromjira_setting->jira_url;
            $addtojira_setting->jira_name = $fromjira_setting->jira_name;
            $addtojira_setting->save();
        }
        

        $setting = DB::table('settings')->where('user_id',$from)->first();
        if($setting)
        {
            $selectmonth = DB::table('settings')->where('user_id',$to)->first();
            if($selectmonth)
            {
                DB::table('settings')->where('user_id',$to)->update(['month' => $setting->month,]); 
            }else
            {
                DB::table('settings')->insert(['month' => $setting->month,'user_id' => $to,]);
            }
        }

        clonefromandtos::where('to' , $to)->delete();

        $org_id = DB::table('organization')->where('user_id' , $to)->first()->id;
        $from_org_id = DB::table('organization')->where('user_id' , $from)->first()->id;

        $this->clonefromandtos($from, $to , $from_org_id , $org_id , 'organization');

        $flags = flags::where('board_type' , 'org')->wherenull('epic_id')->where('business_units' , $from_org_id)->get();
        $epic_id = NULL;

        $backlogs = team_backlog::where('type' , 'org')->where('unit_id' , $from_org_id)->get();
        $objectives = DB::table('objectives')->where('unit_id' , $from_org_id)->where('type' , 'org')->get();
        $this->cloneflags($flags ,$org_id , $to , $epic_id);
        $this->cloneepic($backlogs , $org_id , $to);
        $this->cloneokrmapper($objectives , $org_id , $to);
        $orgteams  = DB::Table('org_team')->where('org_id' , $from_org_id)->get();
        foreach ($orgteams as $orgteam) {
            $addorgteam = new org_team();
            $addorgteam->org_id = $org_id;
            $addorgteam->member = $orgteam->member;
            $addorgteam->team_title = $orgteam->team_title;
            $addorgteam->lead_id = $orgteam->lead_id;
            $addorgteam->slug = Str::slug($orgteam->team_title.'-'.rand(10, 99));
            $addorgteam->type = $orgteam->type;
            $addorgteam->save();

            $this->clonefromandtos($from, $to , $orgteam->id , $addorgteam->id , 'orgteam');

            $flags = flags::where('board_type' , 'orgT')->wherenull('epic_id')->where('business_units' , $orgteam->id)->get();
            $epic_id = NULL;
            $backlogs = team_backlog::where('type' , 'orgT')->where('unit_id' , $orgteam->id)->get();
            $objectives = DB::table('objectives')->where('unit_id' , $orgteam->id)->where('type' , 'orgT')->get();
            $this->cloneflags($flags ,$addorgteam->id , $to , $epic_id);
            $this->cloneepic($backlogs , $addorgteam->id , $to);
            $this->cloneokrmapper($objectives , $addorgteam->id , $to);
        }
        $b_u = Cmf::getuserdatabytable('business_units' , $from);
        if($b_u)
        {
            foreach($b_u as $b) {
                // Add Buisness Unit Start
                $addbuisnessunit = new business_units();
                $addbuisnessunit->business_name = $b->business_name;
                $addbuisnessunit->lead_id = $b->lead_id;
                $addbuisnessunit->org_id = $org_id;
                $addbuisnessunit->detail = $b->detail;
                $addbuisnessunit->user_id = $to;
                $addbuisnessunit->slug = Str::slug($b->business_name.'-'.rand(10, 99));
                $addbuisnessunit->save();

                $this->clonefromandtos($from, $to , $b->id , $addbuisnessunit->id , 'business_units');

                $flags = flags::where('board_type' , 'unit')->wherenull('epic_id')->where('business_units' , $b->id)->get();
                $epic_id = NULL;
                $backlogs = team_backlog::where('type' , 'unit')->where('unit_id' , $b->id)->get();
                $objectives = DB::table('objectives')->where('unit_id' , $b->id)->where('type' , 'unit')->get();
                $this->cloneflags($flags ,$addbuisnessunit->id , $to , $epic_id);
                $this->cloneepic($backlogs , $addbuisnessunit->id , $to);
                $this->cloneokrmapper($objectives , $addbuisnessunit->id , $to);
                
                
                $unitteams  = DB::Table('unit_team')->where('org_id' , $b->id)->get();
                foreach ($unitteams as $unitteam) {
                    $addunitteam = new unit_team();
                    $addunitteam->org_id = $addbuisnessunit->id;
                    $addunitteam->member = $unitteam->member;
                    $addunitteam->team_title = $unitteam->team_title;
                    $addunitteam->lead_id = $unitteam->lead_id;
                    $addunitteam->slug = Str::slug($unitteam->team_title.'-'.rand(10, 99));
                    $addunitteam->type = $unitteam->type;
                    $addunitteam->save();

                    $this->clonefromandtos($from, $to , $unitteam->id , $addunitteam->id , 'business_unit_team');

                    $flags = flags::where('board_type' , 'BU')->wherenull('epic_id')->where('business_units' , $unitteam->id)->get();
                    $epic_id = NULL;
                    $backlogs = team_backlog::where('type' , 'BU')->where('unit_id' , $unitteam->id)->get();
                    $objectives = DB::table('objectives')->where('unit_id' , $unitteam->id)->where('type' , 'BU')->get();
                    $this->cloneflags($flags ,$addunitteam->id , $to , $epic_id);
                    $this->cloneepic($backlogs , $addunitteam->id , $to);
                    $this->cloneokrmapper($objectives , $addunitteam->id , $to);
                }                


                // Add Buisness Unit End
                $valuestream  = value_stream::where('unit_id' , $b->id)->get();
                foreach ($valuestream as $v) {
                    $addvaluestream = new value_stream;
                    $addvaluestream->org_id = $org_id;
                    $addvaluestream->unit_id = $addbuisnessunit->id;
                    $addvaluestream->lead_id = $v->lead_id;
                    $addvaluestream->detail = $v->detail;
                    $addvaluestream->value_name = $v->value_name;
                    $addvaluestream->slug = Str::slug($v->value_name.'-'.rand(10, 99));
                    $addvaluestream->user_id = $to;
                    $addvaluestream->save();

                    $this->clonefromandtos($from, $to , $v->id , $addvaluestream->id , 'value_stream');

                    $flags = flags::where('board_type' , 'stream')->wherenull('epic_id')->where('business_units' , $v->id)->get();
                    $epic_id = NULL;
                    $backlogs = team_backlog::where('type' , 'stream')->where('unit_id' , $v->id)->get();
                    $objectives = DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'stream')->get();
                    $this->cloneflags($flags ,$addvaluestream->id , $to , $epic_id);
                    $this->cloneepic($backlogs , $addvaluestream->id , $to);
                    $this->cloneokrmapper($objectives , $addvaluestream->id , $to);

                    $valueteams  = DB::Table('value_team')->where('org_id' , $v->id)->get();
                    foreach ($valueteams as $valueteam) {
                        $addvalueteam = new value_team();
                        $addvalueteam->org_id = $addvaluestream->id;
                        $addvalueteam->member = $valueteam->member;
                        $addvalueteam->team_title = $valueteam->team_title;
                        $addvalueteam->lead_id = $valueteam->lead_id;
                        $addvalueteam->slug = Str::slug($valueteam->team_title.'-'.rand(10, 99));
                        $addvalueteam->type = $valueteam->type;
                        $addvalueteam->save();

                        $this->clonefromandtos($from, $to , $valueteam->id , $addvalueteam->id , 'value_team');

                        $flags = flags::where('board_type' , 'VS')->wherenull('epic_id')->where('business_units' , $valueteam->id)->get();
                        $epic_id = NULL;
                        $backlogs = team_backlog::where('type' , 'VS')->where('unit_id' , $valueteam->id)->get();
                        $objectives = DB::table('objectives')->where('unit_id' , $valueteam->id)->where('type' , 'VS')->get();
                        $this->cloneflags($flags ,$addvalueteam->id , $to , $epic_id);
                        $this->cloneepic($backlogs , $addvalueteam->id , $to);
                        $this->cloneokrmapper($objectives , $addvalueteam->id , $to);
                    }
                }
            }
        }

        $team_link_child = team_link_child::where('user_id' , $from)->get();


        foreach ($team_link_child as $link) {

            $clonefromandtos_objectives = clonefromandtos::where('to' , $to)->where('type' , 'objectives')->where('clone_from' , $link->linked_objective_id)->first();
            $clonefromandtos_keyresult = clonefromandtos::where('to' ,  $to)->where('type' , 'keyresult')->where('clone_from' , $link->bussiness_key_id)->first();

            if($link->from == 'org')
            {
              $bussiness_unit_id = $org_id; 
            }

            if($link->from == 'unit')
            {
              $clonefromandtos_unit = clonefromandtos::where('to' ,  $to)->where('type' , 'business_units')->where('clone_from' , $link->bussiness_unit_id)->first();
              $bussiness_unit_id = $clonefromandtos_unit->clone_to; 
            }

            if($link->from == 'stream')
            {
              $clonefromandtos_stream = clonefromandtos::where('to' ,  $to)->where('type' , 'value_stream')->where('clone_from' , $link->bussiness_unit_id)->first();
              $bussiness_unit_id = $clonefromandtos_stream->clone_to; 
            }
            $clonefromandtos_bussiness_obj_id = clonefromandtos::where('to' ,  $to)->where('type' , 'objectives')->where('clone_from' , $link->bussiness_obj_id)->first();
            $addlink = new team_link_child();
            $addlink->linked_objective_id = $clonefromandtos_objectives->clone_to;
            $addlink->bussiness_unit_id = $bussiness_unit_id;
            $addlink->bussiness_obj_id = $clonefromandtos_bussiness_obj_id->clone_to;
            $addlink->bussiness_key_id = $clonefromandtos_keyresult->clone_to;
            $addlink->from = $link->from;
            $addlink->to = $link->to;
            $addlink->user_id = $to;
            $addlink->save();
        }

        $clonnedepics = clonefromandtos::where('to' ,  $to)->where('type' , 'epics')->get();
        foreach ($clonnedepics as $c_d_e) {
            $epic = Epic::find($c_d_e->clone_from);
            if($epic->team_id)
            {
                if($epic->type == 'org')
                {
                    $clonefromandtos_team_id = clonefromandtos::where('to' , $to)->where('type' , 'orgteam')->where('clone_from' , $e->team_id)->first();
                    $createepic = Epic::find($c_d_e->clone_to);
                    $createepic->team_id =    $clonefromandtos_team_id->clone_to;
                    $createepic->save();
                }
                if($epic->type == 'unit')
                {
                    $clonefromandtos_team_id = clonefromandtos::where('to' , $to)->where('type' , 'business_unit_team')->where('clone_from' , $e->team_id)->first();
                    $createepic = Epic::find($c_d_e->clone_to);
                    $createepic->team_id =    $clonefromandtos_team_id->clone_to;
                    $createepic->save();
                }
                if($epic->type == 'stream')
                {
                    $clonefromandtos_team_id = clonefromandtos::where('to' , $to)->where('type' , 'value_team')->where('clone_from' , $e->team_id)->first();
                    $createepic = Epic::find($c_d_e->clone_to);
                    $createepic->team_id =    $clonefromandtos_team_id->clone_to;
                    $createepic->save();
                }
            }
        }

        

    }
    public function addPlanModule()
    {
     
        return view('admin.subscriptions.add-plan');
    }

    public function SavePlan(Request $request)
    {

      if($request->base_price_status == 'price')
      {
        $base_price = $request->base_price;
        $sale_price = $request->sale_price;
      }else
      {
        $base_price = NULL;
        $sale_price = NULL;
      }
    
        DB::table('plan')->insert([
          'plan_title' => $request->plan_title,
          'duration' => $request->duration,
          'base_price_status' => $request->base_price_status,
          'base_price' => $base_price,
          'sale_price' => $sale_price,
          'max_user' => $request->max_user,
          'per_user_price' => $request->per_user_price,
          'status' => $request->status,
          'description' => $request->description,
          'module' => $request->module,
           'slug' =>  Str::slug($request->plan_title),
        
        ]);


        
        return back();

  

    }

    public function AllUserPlan()
    {
        $data = DB::table('user_plan')->select(
            "user_plan.*",
            "users.*",
            "plan.*",
            "user_plan.created_at as created")
            ->leftJoin('users', 'user_plan.user_id', '=', 'users.id')
            ->leftJoin('plan', 'user_plan.plan_id', '=', 'plan.id')
            ->get();
        return view('admin.subscriptions.user-plan',compact('data'));
    }
}
