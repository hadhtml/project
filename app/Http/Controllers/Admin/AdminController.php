<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Cmf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\business_units;
use App\Models\value_stream;
use App\Models\initiative;

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
    public function addobjective()
    {
        $createobjective = new objectives();
        $createobjective->status = $o->status;
        $createobjective->user_id = $to;
        $createobjective->obj_prog = $o->obj_prog;
        $createobjective->q_obj_prog = $o->q_obj_prog;
        $createobjective->unit_id = $org_id;
        $createobjective->start_date = $o->start_date;
        $createobjective->end_date = $o->end_date;
        $createobjective->type = $o->type;
        $createobjective->IndexCount = $o->IndexCount;
        $createobjective->save();
        return $createobjective->id;
    }
    public function importuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $org_id = DB::table('organization')->where('user_id' , $to)->first()->id;
        $from_org_id = DB::table('organization')->where('user_id' , $from)->first()->id;
        $objectives = DB::table('objectives')->where('user_id' , $from)->where('type' , 'org')->get();
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
                $initiative = DB::table('key_result')->where('key_id' , $k->id)->get();
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
                }
            }


        }


        exit;

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
                // Add Buisness Unit End


                // Add Value Stream Start
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

                    // Add Value Team Start
                    $valueteam  = DB::table('value_team')->where('org_id' , $v->id)->get();
                    foreach ($valueteam as $v_t) {
                        DB::table('value_team')->insert([
                            'org_id' => $addvaluestream->id,
                            'member' => $v_t->member,
                            'lead_id' => $v_t->lead_id,
                            'team_title' => $v_t->team_title,
                            'slug' => Str::slug($v_t->team_title.'-demo-'.rand(10, 99)),
                        ]);
                    }
                    // Add Value Team End
                }
                // Add Value Stream End
            }
        }
    }
}
