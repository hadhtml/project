<?php

namespace App\Http\Controllers;
use App\Helpers\Cmf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\business_units;
use DB;
use Carbon\Carbon;
use Mail;
use App\Models\OrganizationContacts;
use App\Helpers\Jira;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Storage;
use Exception;
use App\Models\flag_comments;
use App\Models\flag_members;
use App\Models\flags;
use App\Helpers\Quarters;

class KpiController extends Controller
{
    
     public function __construct()
    {
    $this->middleware('auth');
    }
    

    public function ValueChartKpi($id,$type)
    {
     if($type == 'unit')
     {
     $organization = DB::table('business_units')->where('slug',$id)->first();   
     $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$organization->id)->where('type','unit')->get();  
     }
     if($type == 'stream')
     {
     $organization = DB::table('value_stream')->where('slug',$id)->first();   
     $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$organization->id)->where('type','stream')->get();  
     }

     if($type == 'BU')
     {
     $organization  = DB::table('unit_team')->where('slug',$id)->first();
     $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$organization->id)->where('type','BU')->get();  

            
     }

     if($type == 'VS')
     {
     $organization  = DB::table('value_team')->where('slug',$id)->first();
     $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$organization->id)->where('type','VS')->get();  

            
     }

     if($type == 'org')
     {
     $organization  = DB::table('organization')->where('slug',$id)->first();
     $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$organization->id)->where('type','org')->get();  

            
     }

     if($type == 'orgT')
     {
     $organization  = DB::table('org_team')->where('slug',$id)->first();
     $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$organization->id)->where('type','orgT')->get();  

            
     }
     
     return view('KPI.kpi-index',compact('data','organization','type'));
    }
    


    public function SaveKpiData(Request $request)
    {
   

      
         
      $KPI =   DB::table('kpi')->insertGetId([

         
            'target_date' => $request->t_date,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'stream_id' => $request->unit_id,
            'type' => $request->type,
            'target_value' => $request->t_value,
            'symbol' => $request->symbol,
            'lead_id' => $request->lead_manager,
            'summary' => $request->summary,
        ]);
        
   
  

        
        return back();
        
        
    }

    public function getkpimodal(Request $request)
    {
        $data = DB::table('kpi')->where('id',$request->id)->first();
        $html = view('KPI.edit-modal', compact('data'))->render();
        return $html;
    }

    public function AddnewcheckIn(Request $request)
    {

      if($request->savenewvalue != '')
      {
        $value = $request->savenewvalue;
      }else
      {
        $value = $request->value;
      }
    
        DB::table('kpi_check_in')->insert([
          'kpi_id' => $request->kpi_id,
          'value' => $value,
          'status' => $request->status,
          'summary' => $request->summary,
          'participant' => implode(',',$request->participant),
          'check_date' => $request->date,
        
        ]);


        $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
        $html = view('KPI.edit-modal', compact('data'))->render();
        return $html;

  

    }


    public function DeleteheckInValue(Request $request)
    {
    
        DB::table('kpi_check_in')->where('id',$request->id)->delete();

        $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
        $html = view('KPI.edit-modal', compact('data'))->render();
        return $html;

  

    }


    public function UpdateheckInValue(Request $request)
    {
        
         DB::table('kpi_check_in')
          ->where('id',$request->id)
          ->update([
          'value' => $request->value,
          'status' => $request->status,
          'summary' => $request->summary,
          'participant' => implode(',',$request->participant),
          'check_date' => $request->date,
          'created_at' => Carbon::now(),
        
        ]);


        $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
        $html = view('KPI.edit-modal', compact('data'))->render();
        return $html;

  

    }

    public function UpdateKpiData(Request $request)
    {
   
         
      $KPI =   DB::table('kpi')
           ->where('id',$request->id)
            ->update([
            'target_date' => $request->t_date,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'target_value' => $request->t_value,
            'symbol' => $request->symbol,
            'lead_id' => $request->lead_manager,
            'summary' => $request->summary,
        ]);
        
   
  

        
        return back();
        
        
    }

    public function AddnewKpiflag(Request $request)
    {
    
        // DB::table('kpi_flag')->insert([
        //   'kpi_id' => $request->flag_kpi_id,
        //   'flag_type' => $request->flag_type,
        //   'flag_title' => $request->flag_title,
        //   'flag_description' => $request->flag_description,
        //   'flag_status' => 'Todo',
        //   'flag_assign' => $request->flag_assign,
        
        // ]);

        $flag = new flags();
        $flag->business_units = $request->buisness_unit_id;
        $flag->epic_id = $request->flag_kpi_id;
        $flag->flag_type = $request->flag_type;
        $flag->flag_title = $request->flag_title;
        $flag->flag_description = $request->flag_description;
        $flag->archived = 2;
        $flag->flag_status = 'todoflag';
        $flag->board_type = $request->board_type;
        $flag->epic_type = 'kpi';
        $flag->save();
        $member = new flag_members();
        $member->member_id = $request->flag_assign;
        $member->flag_id = $flag->id;
        $member->save();


        $data = DB::table('kpi')->where('id',$request->flag_kpi_id)->first();
        $html = view('KPI.flag-render', compact('data'))->render();
        return $html;

  

    }

    public function UpdateKpiflag(Request $request)
    {
    
        // DB::table('kpi_flag')->where('id',$request->flag_id)->update([
        //   'flag_type' => $request->flag_type,
        //   'flag_title' => $request->flag_title,
        //   'flag_description' => $request->flag_description,
        //   'flag_status' => 'Todo',
        //   'flag_assign' => $request->flag_assign,
        
        // ]);

        $update = flags::find($request->flag_id);
        $update->flag_type = $request->flag_type;
        $update->flag_title = $request->flag_title;
        $update->flag_description = $request->flag_description;
        $update->save();


        $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
        $html = view('KPI.flag-render', compact('data'))->render();
        return $html;


  

    }

    
    public function DeleteKpiflag(Request $request)
    {
    
        // DB::table('kpi_flag')->where('id',$request->flag_id)->delete();

        flag_members::where('flag_id' , $request->flag_id)->delete();
        flag_comments::where('flag_id' , $request->flag_id)->delete();
        flags::where('id' , $request->flag_id)->delete();

        // $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
        // $html = view('KPI.edit-modal', compact('data'))->render();
        // return $html;

  

    }


    public function savecommentkpi(Request $request)
{
    $addcomment = new flag_comments();
    $addcomment->flag_id = $request->flag_id;
    $addcomment->user_id = $request->user_id;
    $addcomment->comment = $request->comment;
    $addcomment->type = 'comment';
    $addcomment->comment_type = 'kpi';
    $addcomment->save();

     $data = DB::table('kpi')->where('id',$request->id)->first();
     $html = view('KPI.edit-modal', compact('data'))->render();
     return $html;

  
}


public function updatecommentkpi(Request $request)
    {
        $addcomment = flag_comments::find($request->comment_id);
        $addcomment->comment = $request->comment;
        $addcomment->save();

        $data = DB::table('kpi')->where('id',$request->id)->first();
        $html = view('KPI.edit-modal', compact('data'))->render();
        return $html;
    }

    public function Deletecommentkpi(Request $request)
  {
    
    flag_comments::where('id',$request->id)->delete();
    flag_comments::where('comment_id',$request->id)->delete();

    $data = DB::table('kpi')->where('id',$request->flag)->first();
    $html = view('KPI.edit-modal', compact('data'))->render();
    return $html;

    
  }

  public function savereplykpi(Request $request)
  {
      $addcomment = new flag_comments();
      $addcomment->flag_id = $request->flag_id;
      $addcomment->user_id = $request->user_id;
      $addcomment->comment = $request->comment;
      $addcomment->type = 'reply';
      $addcomment->comment_type = 'kpi';
      $addcomment->comment_id = $request->comment_id;
      $addcomment->save();

      $data = DB::table('kpi')->where('id',$request->id)->first();
      $html = view('KPI.edit-modal', compact('data'))->render();
      return $html;
     
  }


  public function ValueChartKpiRender(Request $request)
  {
   $type = $request->type;
   $data = DB::table('kpi')->where('user_id',Auth::id())->where('stream_id',$request->stream_id)->where('type',$type)->get();  
   return view('KPI.kpi-render',compact('data','type'));
  }

  
  public function DeleteKpiData(Request $request)
  {
 
       
    DB::table('kpi')->where('id',$request->delete_id)->delete();
    DB::table('kpi_check_in')->where('kpi_id',$request->delete_id)->delete();
    DB::table('flags')->where('epic_id',$request->delete_id)->delete();


      
      return back();
      
      
  }


  public function Searchkpiflag(Request $request)
  {
    
 
  
         $id = $request->id;

         $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
         $html = view('KPI.flag-search', compact('data','id'))->render();
         return $html;
  }


  public function orderbykpistatus(Request $request)
  {
      $orderby = $request->order;
      $type = $request->type;
   
    
      $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
      $html = view('KPI.check-in-render', compact('data','orderby','type'))->render();
      return $html;  
  }

  public function kpicheckinsearch(Request $request)
  {
      $orderby = $request->id;
      $type = $request->type;
   
    
      $data = DB::table('kpi')->where('id',$request->kpi_id)->first();
      $html = view('KPI.check-in-render', compact('data','orderby','type'))->render();
      return $html;  
  }

}
