<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Cmf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\business_units;
use App\Models\value_stream;
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
    }
    public function importuserdata(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $org_id = DB::table('organization')->where('user_id' , $to)->first()->id;
        $from_org_id = DB::table('organization')->where('user_id' , $from)->first()->id;
        $org_objectives = DB::table('objectives')->where('type' , 'org')->where('unit_id' , $from_org_id)->get();
        foreach ($org_objectives as $o) {
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


            foreach ($variable as $key => $value) {
                $org_add_key_result->user_id        
                $org_add_key_result->obj_id     
                $org_add_key_result->key_name       
                $org_add_key_result->key_start_date     
                $org_add_key_result->key_end_date       
                $org_add_key_result->key_detail 
                $org_add_key_result->key_status     
                $org_add_key_result->created_at     
                $org_add_key_result->updated_at     
                $org_add_key_result->trash      
                $org_add_key_result->key_prog   
                $org_add_key_result->weight 
                $org_add_key_result->q_key_prog     
                $org_add_key_result->unit_id        
                $org_add_key_result->target_value       
                $org_add_key_result->key_result_type        
                $org_add_key_result->key_unit       
                $org_add_key_result->init_value     
                $org_add_key_result->target_number      
                $org_add_key_result->type       
                $org_add_key_result->IndexCount
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
