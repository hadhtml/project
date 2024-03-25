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
    public function importuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $org_id = DB::table('organization')->where('user_id' , $to)->first()->id;
        $from_org_id = DB::table('organization')->where('user_id' , $from)->first()->id;
        $objectives = DB::table('objectives')->where('unit_id' , $from_org_id)->where('type' , 'org')->get();
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
                        $createepic->team_id =    $e->team_id;
                        $createepic->key_id = $org_add_key_result->id;
                        $createepic->jira_id  =   $e->jira_id;
                        $createepic->jira_project =   $e->jira_project;
                        $createepic->account_id = $e->account_id;
                        $createepic->epic_type  = $e->epic_type;
                        $createepic->old_date = $e->old_date;
                        $createepic->save();   
                    }
                }
            }
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
                $addbuisnessunit->slug = Str::slug($b->business_name.'-demo-'.rand(10, 99));
                $addbuisnessunit->save();


                $objectives = DB::table('objectives')->where('unit_id' , $b->id)->where('type' , 'unit')->get();
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
                    $createobjective->unit_id = $addbuisnessunit->id;    
                    $createobjective->type = $o->type;       
                    $createobjective->IndexCount = $o->IndexCount;
                    $createobjective->save();
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
                        $org_add_key_result->unit_id     =   $addbuisnessunit->id;
                        $org_add_key_result->target_value =      $k->target_value;
                        $org_add_key_result->key_result_type =       $k->key_result_type;
                        $org_add_key_result->key_unit       =$k->key_unit;
                        $org_add_key_result->init_value     =$k->init_value;
                        $org_add_key_result->target_number   =   $k->target_number;
                        $org_add_key_result->type       = $k->type;
                        $org_add_key_result->IndexCount = $k->IndexCount;
                        $org_add_key_result->save();
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
                                $createepic->buisness_unit_id = $addbuisnessunit->id;
                                $createepic->team_id =    $e->team_id;
                                $createepic->key_id = $org_add_key_result->id;
                                $createepic->jira_id  =   $e->jira_id;
                                $createepic->jira_project =   $e->jira_project;
                                $createepic->account_id = $e->account_id;
                                $createepic->epic_type  = $e->epic_type;
                                $createepic->old_date = $e->old_date;
                                $createepic->save();   
                            }
                        }
                    }
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
                    $addvaluestream->slug = Str::slug($v->value_name.'-demo-'.rand(10, 99));
                    $addvaluestream->user_id = $to;
                    $addvaluestream->save();                    
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
