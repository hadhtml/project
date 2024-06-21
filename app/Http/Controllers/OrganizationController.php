<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\flag_members;
use App\Models\flag_comments;
use App\Models\key_result;
use App\Models\objectives;

class OrganizationController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth','check.subscription']);

  }

  public function indexHome()
  {
    if(Auth::id())
    {
      $organization  = Organization::where('user_id',Auth::id())->where('trash',NULL)->first();
      return redirect('organization/dashboard');
    }else
    {
      return view('welcome');
      
    }
      

  }
    public function Organization()
    {
        $organization  = Organization::where('user_id',Auth::id())->where('type','org')->where('trash',NULL)->Paginate(10);
        return view('organizations.AllOrg',compact('organization'));

    }

    

    public function OrgTeam($id)
    {
    $organization = DB::table('organization')
    ->where('slug',$id)
        ->where(function($query) {
            $query->where('user_id', Auth::id())
                  ->orWhere('user_id', Auth::user()->invitation_id);
        })
        ->first();

    if($organization)
    {
    $Team = DB::table('org_team')->where('org_id',$organization->id)->get();
    return view('organizations.Team',compact('organization','Team'));
    }else
    {
    
    echo "You're not authorized to access this Link <a href= ".url('organization/dashboard').">Back</a>";   
    }   
        
    }

    public function SaveOrgTeam(Request $request)
    {
      if($request->has('member'))
      {
      $member = implode(',',$request->member);
      }else
      {
       $member = NULL;
      }
        DB::table('org_team')
        ->insert([
            'org_id' => $request->team_unit_id,
            'member' => $member,
            'lead_id' => $request->lead_manager_team,
            'team_title' => $request->team_title,
            'slug' => Str::slug($request->team_title.'-'.rand(10, 99)),
            
            
            ]);
      
       
        return redirect()->back()->with('message', 'Team Added Successfully');

    }

    public function UpdateOrgTeam(Request $request)
    {

     
        DB::table('org_team')
        ->where('id',$request->id)
        ->update([
            'member' => implode(',',$request->member),
            'lead_id' => $request->lead_manager_team,
            'team_title' => $request->team_title,
            'slug' => Str::slug($request->team_title.'-'.rand(10, 99)),
            
            ]);
      
       
        return redirect()->back()->with('message', 'Team Updated Successfully');

    }

    public function DeleteOrgTeam(Request $request)
    {

     
        DB::table('org_team')->where('id',$request->delete_id)->delete();
      
       
        return redirect()->back()->with('message', 'Team Deleted Successfully');

    }
    
    
    // public function getdata()
    // {
    //     $startDate = '2023-10-01';
    //     $endDate = '2023-12-31';   
    //      $objid = array();
    //       $keyid = array();
    //       $initid = array();

    //          $data = DB::table('objectives')->whereBetween('created_at', [$startDate, $endDate])->where('user_id',Auth::id())->where('trash',NULL)->get();
    //          foreach($data as $d)
    //          {
    //           $objid[] = $d->id;  
    //          }
    //         $key = DB::table('key_result')->where('user_id',Auth::id())->whereIn('obj_id',$objid)->get();
            
    //          foreach($key as $kk)
    //          {
    //           $keyid[] = $kk->id;  
    //          }
    //         $init = DB::table('initiative')->where('user_id',Auth::id())->whereIn('key_id',$keyid)->get();

    //         foreach($init as $ii)
    //          {
    //           $initid[] = $ii->id;  
    //          }
    //          $epic = DB::table('epics')->where('user_id',Auth::id())->whereIn('initiative_id',$initid)->get();

    //          foreach($data as $da)
    //          {
    //           echo $da->objective_name.'<br>';     
    //           foreach($key as $k)
    //          {
    //           if($k->obj_id == $da->id)
    //           {
    //               echo $k->key_name.'<br>';
    //           }
    //           foreach($init as $i)
    //           {
    //           if($i->key_id == $k->id)
    //           {
    //             echo $i->initiative_name.'<br>';   
    //           }
               
    //           foreach($epic as $e)
    //           {
    //           if($i->id == $e->initiative_id)
    //           {
    //             echo $e->epic_name.'<br>';   
    //           }      
                  
    //           }
                  
    //           } 
    //          } 
    //          }
    // }
    public function SaveOrganization(Request $request)
    {

        $email = Organization::where('email',$request->email)->where('trash',NULL)->where('user_id',Auth::id())->first();
        $phone = Organization::where('phone_no',$request->phone)->where('trash',NULL)->where('user_id',Auth::id())->first();

        if($email)
        {
        echo 1;
        }else if($phone)
        {
         echo 2;
        }else
        {

            $organization  = new Organization();
            if($request->add_logo)
            {
              $organization->logo = $this->sendimagetodirectory($request->add_logo);
            }
    
            $organization->organization_name = $request->organization_name;
            $organization->email = $request->email;
            $organization->phone_no = $request->phone;
            $organization->detail = $request->small_description;
            $organization->slug = Str::slug($request->organization_name.'-'.rand(10, 99));
            $organization->user_id = Auth::id();
            $organization->code =  '#OR' . rand(1000, 9999);
    
            $organization->save();
        }




    }

    public function UpdateOrganization(Request $request)
    {

            $organization  = Organization::find($request->org_edit_id);

            if($request->has('logo'))
            {
              $organization->logo = $this->sendimagetodirectory($request->logo);
            }else{

                $organization->logo = $request->old_image;
    
            }
           
    
            $organization->organization_name = $request->organization_name;
            $organization->email = $request->email;
            $organization->phone_no = $request->phone_no;
            $organization->detail = $request->detail;
            $organization->slug = Str::slug($request->organization_name.'-'.rand(10, 99));
            $organization->user_id = Auth::id();
            $organization->save();
        

            return redirect()->back()->with('message', 'Organization Updated Successfully');



    }


    public function DeleteOrganization(Request $request)
    {
        $Delete  = Organization::where('user_id',Auth::id())->where('id',$request->org_id)->update(['trash' => 1]);
        DB::table('objectives')->where('org_id',$request->org_id)->update(['trash' => 1]);

        return redirect()->back()->with('message', 'Organization Deleted Successfully');

    }

 

    public static function sendimagetodirectory($imagename)

    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/images'), $filename);

        return $filename;

    }
    
      public function DeleteOrganizationAll(Request $request)
    {
        $Delete  = Organization::where('user_id',Auth::id())->whereIn('id',$request->selectedOptions)->update(['trash' => 1]);

        session()->flash('message', 'Organization Deleted Successfully');

        // return redirect()->back()->with('message', 'Organization Deleted Successfully');

    }
    
     public function saveQuarter(Request $request)
    {

      $counter = 1;
      $data = DB::table('sprint')->orderby('id','DESC')->where('value_unit_id',$request->unit_id)->first();
      if($data)
      {
      $counter = $data->IndexCount + 1; 
      }
        DB::table('sprint')
        ->insert([
          'title' => $request->title,
          'start_data' => $request->startdate,
          'end_date' => $request->enddate,
          'detail' => $request->detail,
          'user_id' => Auth::id(),
          'value_unit_id'  => $request->unit_id,
          'IndexCount' => $counter,
          'type'  => $request->type,
          'quarter_name'  => $request->q_name,
          'quarter_year'  => $request->q_year,

        
        ]);
        
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


        //  return view('objective.objective-render',compact('organization','objective'));  



    }
    
    public function endQuarter(Request $request)
    {

     
     

     $s = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$request->unit_id)->where('type',$request->type)->first();
  
        
     $masterepic = array();
     $tempepic = array();  
     $epic = DB::table('epics')->whereBetween('epic_end_date', [$s->start_data, $s->end_date])
     ->where('user_id',Auth::id())
     ->where('buisness_unit_id',$s->value_unit_id)
     ->where('epic_type',$request->type)
     ->where('trash',NULL)->get();

     $Removedepic = DB::table('epics')->whereBetween('old_date', [$s->start_data, $s->end_date])
     ->where('user_id',Auth::id())
     ->where('buisness_unit_id',$s->value_unit_id)
     ->where('epic_type',$request->type)
     ->where('trash',NULL)->get();

     foreach($Removedepic as $e)
     {

      
       DB::table('sprint_report')
      ->insert([
        'epic_id' => $e->id,
        'epic_init_id' => $e->initiative_id,
        'epic_name' => $e->epic_name,
        'epic_prog' => $e->epic_progress,
        'epic_date' => Carbon::parse($e->epic_end_date)->format('M d,Y'),
        'epic_trash' => $e->created_at,
        'q_id' =>  $s->id,
        'epic_done' => $e->updated_at,
        'epic_status' => $e->epic_status,
        'epic_remove' => 'remove',
 
      ]);
     }

    
    foreach($epic as $ep)
     {
      $masterepic[] = $ep->obj_id;  
     }

     foreach($epic as $e)
     {

      
       DB::table('sprint_report')
      ->insert([
        'epic_id' => $e->id,
        'epic_init_id' => $e->initiative_id,
        'epic_name' => $e->epic_name,
        'epic_prog' => $e->epic_progress,
        'epic_date' => Carbon::parse($e->epic_end_date)->format('M d,Y'),
        'epic_trash' => $e->created_at,
        'q_id' =>  $s->id,
        'epic_done' => $e->updated_at,
        'epic_status' => $e->epic_status,
        'epic_remove' => 'Added',
 
      ]);
     }

      $master = array();
      $temp = array();
      $objid = array();
      $objective = DB::table('objectives')->whereIn('id',$masterepic)->where('user_id',Auth::id())->where('unit_id',$s->value_unit_id)
       ->where('type',$request->type)->where('trash',NULL)->get();
     
             foreach($objective as $obj)
             {
             $objid[] = $obj->id;  
             }
             foreach($objective as $obj)
             {
              $temp['id'] = $obj->id;
              $temp['objective_name'] = $obj->objective_name;
              $temp['objective_date'] = Carbon::parse($obj->start_date)->format('M d,Y').' - '.Carbon::parse($obj->end_date)->format('M d,Y');
              $temp['objective_status'] = $obj->status;
              $temp['objective_prog'] = $obj->obj_prog;
              array_push($master,$temp);     
             }
             
              DB::table('sprint_report')
              ->insert([
                'objective' => json_encode($master),
                'q_id' => $s->id,
                'user_id' => Auth::id(),
         
              ]);
               
             $masterkey = array();
             $tempkey = array(); 
             $keyid = []; 
             $key = DB::table('key_result')->whereIn('obj_id',$objid)->where('key_name','!=',NULL)->get();
             foreach($key as $kk)
             {
             $keyid[] = $kk->id;  
             }

             foreach($key as $k)
             {
                 
            $epicCount = DB::table('epics')->where('key_id',$k->id)->where('trash',NULL)->whereBetween('epic_end_date', [$s->start_data, $s->end_date])->count();
              $epicComp =  DB::table('epics')->where('key_id',$k->id)->where('trash',NULL)->whereBetween('epic_end_date', [$s->start_data, $s->end_date])->where('epic_progress','=',100)->count();
              $epicincomp = DB::table('epics')->where('key_id',$k->id)->where('trash',NULL)->whereBetween('epic_end_date', [$s->start_data, $s->end_date])->where('epic_progress','!=',100)->count();
              
              $tempkey['id'] = $k->id;
              $tempkey['obj_id'] = $k->obj_id;
              $tempkey['key_name'] = $k->key_name;
              $tempkey['key_date'] = Carbon::parse($k->key_start_date)->format('M d,Y').' - '.Carbon::parse($k->key_end_date)->format('M d,Y');
              $tempkey['key_status'] = $k->key_status;
              $tempkey['key_prog'] = $k->key_prog;
              $tempkey['key_epic_count'] = $epicCount;
              $tempkey['key_epic_comp'] = $epicComp;
              $tempkey['key_epic_incopm'] = $epicincomp;
              array_push($masterkey,$tempkey);     
             }
             
             DB::table('sprint_report')
              ->where('q_id', $s->id)
              ->update([
                'key_result' => json_encode($masterkey),
         
               ]);
               
             $masterinit = array();
             $tempinit = array();  
             $init = DB::table('initiative')->whereIn('key_id',$keyid)->where('user_id',Auth::id())->get();

             foreach($init as $i_id)
             {
              $tempinit[] = $i_id->id;  
             }
             foreach($init as $i)
             {
            
               DB::table('sprint_report')
              ->insert([
                'initiative_id' => $i->id,
                'initiative_key_id' => $i->key_id,
                'initiative_name' => $i->initiative_name,
                'q_id' => $s->id,
         
              ]);
             }
             
          
               
            //  $masterepic = array();
            //  $tempepic = array();  
            //  $epic = DB::table('epics')->whereIn('initiative_id',$tempinit)->where('user_id',Auth::id())->get();
            //  foreach($epic as $e)
            //  {
       
              
            //    DB::table('sprint_report')
            //   ->insert([
            //     'epic_id' => $e->id,
            //     'epic_init_id' => $e->initiative_id,
            //     'epic_name' => $e->epic_name,
            //     'epic_prog' => $e->epic_progress,
            //     'epic_date' => Carbon::parse($e->epic_end_date)->format('M d,Y'),
            //     'epic_trash' => $e->trash,
            //     'q_id' =>  $s->id,
            //     'epic_done' => $e->updated_at,
            //     'epic_status' => $e->epic_status,
         
            //   ]);
            //  }
             
          
        
        DB::table('sprint')->where('user_id',Auth::id())->where('value_unit_id',$request->unit_id)->where('status',NULL)->update(['status'=> 1]);
      
        if($request->has('move_epic'))
        {
        if($request->move_epic == 'yes')
        {

  
          
          foreach($request->Ids  as $key => $value)
          {
            
          $monthNumber = \Carbon\Carbon::parse($request->months[$key])->month;
          $firstDayOfNextMonth = \Carbon\Carbon::create(null, $monthNumber + 1, 1, 0, 0, 0);
          $lastDayOfMonth = $firstDayOfNextMonth->subDay();
          $formattedDate = $lastDayOfMonth->toDateString();

         

          
          DB::table('epics')->whereBetween('epic_end_date', [$s->start_data, $s->end_date])
          ->where('initiative_id',$request->initiative[$key])
          ->where('epic_status','!=','Done')
          ->where('trash',NULL)
          ->update(['month_id' => $request->Ids[$key],'epic_end_date' => $formattedDate,'quarter_id' => $request->quarter[$key]]);
         
        }
        }  

        }
      


        if ($request->type == "stream") {
          $organization = DB::table("value_stream")
              ->where("slug", $request->slug)
              ->first();
          $objective = DB::table("objectives")
              ->where("unit_id", $request->unit_id)
              ->where("trash", null)
              ->where("type", "stream")
              ->orderby('IndexCount')
              ->get();
      }

      if ($request->type == "unit") {
        $organization = DB::table("business_units")
            ->where("slug", $request->slug)
            ->first();
        $objective = DB::table("objectives")
         
            ->where("unit_id", $request->unit_id)
            ->where("trash", null)
            ->where("type", "unit")
            ->orderby('IndexCount')
            ->get();
    }



    if ($request->type == "BU") {
        $organization = DB::table("unit_team")
            ->where("slug", $request->slug)
            ->first();
        $objective = DB::table("objectives")
            ->where("org_id", $request->org_id)
            ->where("unit_id", $request->unit_id)
            ->where("trash", null)
            ->where("type", "BU")
            ->orderby('IndexCount')
            ->get();
    }

    if ($request->type == "VS") {
        $organization = DB::table("value_team")
            ->where("slug", $request->slug)
            ->first();
        $objective = DB::table("objectives")
            ->where("org_id", $request->org_id)
            ->where("unit_id", $request->unit_id)
            ->where("trash", null)
            ->where("type", "VS")
            ->orderby('IndexCount')
            ->get();
    }

    if ($request->type == "org") {
        $organization = DB::table("organization")
            ->where("slug", $request->slug)
            ->first();
        $objective = DB::table("objectives")
            ->where("unit_id", $request->unit_id)
            ->where("trash", null)
            ->where("type", "org")
            ->orderby('IndexCount')
            ->get();
    }

    if ($request->type == "orgT") {
        $organization = DB::table("org_team")
            ->where("slug", $request->slug)
            ->first();
        $objective = DB::table("objectives")
            ->where("unit_id", $request->unit_id)
            ->where("trash", null)
            ->where("type", "orgT")
            ->orderby('IndexCount')
            ->get();
    }
   
    
      return view("objective.objective-render",compact("organization", "objective"));

    }
    
      public function AllBUReport($id,$type)
    {
         $Sid = $id;
          if($type == 'unit')
          {
          $organization = DB::table('business_units')->where('slug',$id)->first();        
          $report  =  DB::table('sprint')->where('value_unit_id',$organization->id)->where('type','unit')->get();
          }
          
          if($type == 'stream')
          {
          $organization = DB::table('value_stream')->where('slug',$id)->first();        
          $report  =  DB::table('sprint')->where('value_unit_id',$organization->id)->where('type','stream')->get();
          }

          if($type == 'BU')
          {
          $organization = DB::table('unit_team')->where('slug',$id)->first();        
          $report  =  DB::table('sprint')->where('value_unit_id',$organization->id)->where('type','BU')->get();
          }

          
          if($type == 'VS')
          {
          $organization = DB::table('value_team')->where('slug',$id)->first();        
          $report  =  DB::table('sprint')->where('value_unit_id',$organization->id)->where('type','VS')->get();
          }

          if($type == 'org')
          {
          $organization = DB::table('organization')->where('slug',$id)->first();        
          $report  =  DB::table('sprint')->where('value_unit_id',$organization->id)->where('type','org')->get();
          }

          if($type == 'orgT')
          {
          $organization = DB::table('org_team')->where('slug',$id)->first();        
          $report  =  DB::table('sprint')->where('value_unit_id',$organization->id)->where('type','orgT')->get();
          }
          
          session()->forget('key');
          session()->forget('init');
          return view('Report.Bu-report',compact('report','organization','type','Sid'));

    }

    public function ThirdReport($id,$type)
    {
      
      $obj = array();
      $key  = array();
      $sprint = array();
      $report = DB::table('sprint')->where('user_id',Auth::id())->where('id',$id)->first();
      $Sid =  $report->id;
      if($report)
      {
      $sprint = DB::table('sprint_report')->where('user_id',Auth::id())->where('q_id',$report->id)->first();
      if($type == 'unit')
      {
      $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
      }
      if($type == 'stream')
      {
      $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
      }
      if($type == 'BU')
      {
      $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
      }
      if($type == 'VS')
      {
      $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
      }

      if($type == 'org')
      {
      $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
      }
      if($type == 'orgT')
      {
      $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
      }
      if($sprint)
      {
      $obj =   json_decode($sprint->objective);
      $key =   json_decode($sprint->key_result);
      $count = count($key);   
      }
      }

      session()->forget('key');
      session()->forget('init');
      
    return view('Report.report3',compact('sprint','obj','key','report','organization','type','count','Sid'));

    }
    
     public function AllReport($id,$type)
    {
          $obj = array();
          $key  = array();
          $sprint = array();
          $report = DB::table('sprint')->where('user_id',Auth::id())->where('id',$id)->first();
          $Sid = $report->id;
          if($report)
          {
          $sprint = DB::table('sprint_report')->where('user_id',Auth::id())->where('q_id',$report->id)->first();
          if($type == 'unit')
          {
          $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
          }
          if($type == 'stream')
          {
          $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
          }
          if($type == 'BU')
          {
          $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
          }
          if($type == 'VS')
          {
          $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
          }
          if($type == 'org')
          {
          $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
          }
          if($type == 'orgT')
          {
          $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
          }
          if($sprint)
          {
          $obj =   json_decode($sprint->objective);
          $key =   json_decode($sprint->key_result);   
          }
          }

          session()->forget('key');
          session()->forget('init');
          
        return view('Report.report',compact('sprint','obj','key','report','organization','type','Sid'));

    }
    
    public function SecondReport($id,$sprint,$type)
    {
        $report = DB::table('sprint')->where('id',$sprint)->first();
        $Sid = $report->id;
        if($type == 'unit')
        {
        $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'stream')
        {
        $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'BU')
        {
        $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'VS')
        {
        $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'org')
        {
        $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'orgT')
        {
        $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
        }   
        $SprintInit = DB::table('sprint_report')->where('initiative_key_id',$id)->where('q_id',$sprint)->get();
        $SprintObj = DB::table('sprint_report')->where('q_id',$sprint)->first();
        $obj =   json_decode($SprintObj->objective);
        $key =   json_decode($SprintObj->key_result); 
 
        $type = $organization->type;

        return view('Report.report2',compact('SprintInit','SprintObj','id','obj','key','sprint','organization','type','Sid'));

    }

    public function AllEpicReport($sprint,$type)
    {
        $report = DB::table('sprint')->where('id',$sprint)->first();
        $Sid = $sprint;
        if($type == 'unit')
        {
        $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'stream')
        {
        $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'BU')
        {
        $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'VS')
        {
        $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'org')
        {
        $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
        }

        if($type == 'orgT')
        {
        $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
        }

        // session()->forget('key');
        // session()->forget('init');
        return view('Report.allreportepic',compact('report','sprint','type','organization','Sid'));

    
    }

    public function AllInitReport($init,$sprint,$type)
    {
        $report = DB::table('sprint')->where('id',$sprint)->first();
        $Sid = $sprint;
        session()->put('init',$init);
        if($type == 'unit')
        {
        $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'stream')
        {
        $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'BU')
        {
        $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'VS')
        {
        $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'org')
        {
        $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
        }

        if($type == 'orgT')
        {
        $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
        }

        $InitName = DB::table('sprint_report')->where('initiative_id',$init)->where('q_id',$sprint)->first();        
        $type = $organization->type;
        return view('Report.init-report',compact('report','sprint','type','organization','init','InitName','Sid','init'));

    
    }

    public function NCEpicReport($sprint,$type)
    {
        $report = DB::table('sprint')->where('id',$sprint)->first();
        $Sid = $sprint;
        if($type == 'unit')
        {
        $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'stream')
        {
        $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'BU')
        {
        $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'VS')
        {
        $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'org')
        {
        $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
        }

        if($type == 'orgT')
        {
        $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
        }

        return view('Report.NCreportepic',compact('report','sprint','type','organization','Sid'));

    
    }

    
    public function RemoveEpicReport($sprint,$type)
    {
        $report = DB::table('sprint')->where('id',$sprint)->first();
        $Sid = $sprint;
        if($type == 'unit')
        {
        $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'stream')
        {
        $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
        }
        if($type == 'BU')
        {
        $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'VS')
        {
        $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
        }
        if($type == 'org')
        {
        $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
        }

        if($type == 'orgT')
        {
        $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
        }

        return view('Report.RemoveEpic',compact('report','sprint','type','organization','Sid'));

    
    }
    
    
    
       public function UpdateSprintQuarter(Request $request)
    {
        DB::table('sprint')
        ->where('id',$request->s_id)->update([
          'end_date' => $request->end_date,
        
        ]);
        
        return redirect()->back();
    }

    public function GetKeychart(Request $request)
    {
    $KEYChart = array();
    $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$request->unit_id)->first();
    if($report)
    {
      
    $KEYChart =  DB::table('key_chart')->where('key_id',$request->obj)->where('IndexCount',$report->IndexCount)->first();
    }
   
    $key = DB::table('key_result')->where('id',$request->obj)->first();
    $keyQAll = DB::table('key_chart')->where('key_id',$request->obj)->get();



    return view('objective.key-chart',compact('KEYChart','key','report','keyQAll'));

  
    }

    public function AddnewQvalue(Request $request)
    {
    
        DB::table('key_quarter_value')->insert([
          'key_chart_id' => $request->key_chart_id,
          'key_id' => $request->id,
          'sprint_id' => $request->sprint_id,
          'value' => $request->value,
          'status' => $request->status,
          'summary' => $request->summary,
          'participant' => implode(',',$request->participant),
        
        ]);


        $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;

    // $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$request->unit_id)->first();
    // $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
    // $key = DB::table('key_result')->where('id',$request->id)->first();
    // $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();
    // // $keyqvalue =  DB::table('key_quarter_value')->where('key_chart_id', $KEYChart->id)->get();

    // return view('objective.key-chart',compact('KEYChart','key','report','keyQAll'));

    }

    public function UpdateQvalue(Request $request)
    {
        DB::table('key_quarter_value')->where('id',$request->flag_id)->update([
          'value' => $request->value,
          'status' => $request->status,
          'summary' => $request->summary,
          'participant' => implode(',',$request->participant),
        
        ]);


        $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;

        // $key = DB::table('key_quarter_value')->where('id',$request->id)->first();
        // $keychart = DB::table('key_quarter_value')->where('key_chart_id',$key->key_chart_id)->orderby('id','DESC')->first();

        // return $keychart;

    }

    public function DeleteQvalue(Request $request)
    {
        DB::table('key_quarter_value')->where('id',$request->id)->delete();
     
      
    }

    public function UpdateQkeyVal(Request $request)
    {
        DB::table('key_chart')->where('id',$request->id)->update([
          'quarter_value' => $request->title,
        
        ]);

        $KEYChart = array();

        $key = DB::table('key_chart')->where('id',$request->id)->first();
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$request->unit_id)->first();
      
        if($report)
        {
          
        $KEYChart =  DB::table('key_chart')->where('key_id',$key->key_id)->where('IndexCount',$report->IndexCount)->first();
        
        }

        return $KEYChart;
       


       

    }

      
    public function DeleteSprintQuarter(Request $request)
    {
        DB::table('sprint')->where('id',$request->sprint_id)->delete();
        DB::table('sprint_report')->where('q_id',$request->sprint_id)->delete();
        return redirect()->back();
    }

    public function AddnewKeyQvalue(Request $request)
    {
      $kindex = DB::table('key_chart')->where('key_id',$request->id)->where('buisness_unit_id',$request->unit_id)->orderby('id','DESC')->first();
      $Index =  $kindex->IndexCount + 1;
      DB::table('key_chart')->insert([
          'key_id' => $request->id,
          'quarter_value' => $request->value,
          'buisness_unit_id' => $request->unit_id,
          'IndexCount' =>  $Index,
        
        ]);

    $KEYChart = array();
    $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$request->unit_id)->first();
    if($report)
    {
    $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();

    }
    $key = DB::table('key_result')->where('id',$request->id)->first();
    $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();
   

    return view('objective.key-chart',compact('KEYChart','key','report','keyQAll'));

    }

    public function change_password()
    {
        $user = DB::table('users')->where('id',Auth::id())->first();
        return view('profile.change-password',compact('user'));

    }

    public function update_password(Request $request)
{
    $request->validate([
        'old_password' => 'required|min:8',
        'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        'password_confirmation' => 'required|same:password|min:8',
    ]);
    $data = $request->all();
    $id = auth()->user();

    if(Hash::check($data['old_password'], $id->password) == true)
    {
        $id->password = Hash::make($data['password']);
        $id->save();
        return redirect()->back()->with('message','Password Update Successfully...!!');

    }
    else
    {

     return redirect()->back()->with('message','Old password does not match');
    }
}


public function profile()
{
    $user = DB::table('users')->where('id',Auth::id())->first();
    return view('profile.profile-setting',compact('user'));

}
 
public function UpdateProfile(Request $request)
{

        $user  = User::find($request->id);

        if($request->has('image'))
        {
          $user->image = $this->sendimagetodirectory($request->image);
        }else{

          $user->image = $request->old_image;

        }
       

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->save();

        $logo = '';

        if($request->has('logo'))
        {
          $logo = $this->sendimagetodirectory($request->logo);
        }else{

          $logo = $request->old_logo;

        }

        $organization  = Organization::where('user_id',Auth::id())->update(['organization_name' => $request->org_name,'logo' => $logo]);

    

        return redirect()->back()->with('message', 'Profile Updated Successfully');



}
    
public function AllsprintEpicReport($sprint,$type)
{
    $report = DB::table('sprint')->where('id',$sprint)->first();
    $Sid = $sprint;
    if($type == 'unit')
    {
    $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
    }
    if($type == 'stream')
    {
    $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
    }
    if($type == 'BU')
    {
    $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
    }
    if($type == 'VS')
    {
    $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
    }
    if($type == 'org')
    {
    $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
    }

    if($type == 'orgT')
    {
    $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
    }

    return view('Report.allepicsprint',compact('report','sprint','type','organization','Sid'));


}

function LoadNCEpic(Request $request)
    {
      
    
     
      $report = DB::table('sprint')->where('id',$request->sprint)->first();
        $Sid = $request->sprint;
        $sprint = $request->sprint;
        $type = $request->type;
        $page = $request->page;
    if($request->page == 'NC-Epic' || $request->page == 'All-Epic')
    {
    $SprintEpic = DB::table('sprint_report')
    ->where('id','>', $request->id)
    ->where('epic_prog','!=',100)
    ->where('epic_remove','=','Added')
    ->where('epic_id','!=',NULL)
    ->where('q_id',$request->sprint)->get();

    }

    if( $request->page == 'C-Epic')
    {
    $SprintEpic = DB::table('sprint_report')
    ->where('id','>', $request->id)
    ->where('epic_prog','=',100)
    ->where('epic_remove','=','Added')
    ->where('epic_id','!=',NULL)
    ->where('q_id',$request->sprint)->get();

    }
    
    $more = 'load-more';

    return view('Report.load-more',compact('report','sprint','Sid','SprintEpic','type','more','page'));


    }

    function LoadLessNCEpic(Request $request)
    {
     
      $report = DB::table('sprint')->where('id',$request->sprint)->first();
        $Sid = $request->sprint;
        $sprint = $request->sprint;
        $type = $request->type;
        if($request->page == 'NC-Epic' || $request->page == 'All-Epic')
        {
        $SprintEpic = DB::table('sprint_report')
        ->where('epic_prog','!=',100)
        ->where('epic_remove','=','Added')
        ->where('epic_id','!=',NULL)
        ->where('q_id',$request->sprint)->get();
    
        }
    
        if( $request->page == 'C-Epic')
        {
        $SprintEpic = DB::table('sprint_report')
        ->where('epic_prog','=',100)
        ->where('epic_remove','=','Added')
        ->where('epic_id','!=',NULL)
        ->where('q_id',$request->sprint)->get();
    
        }

    if($type == 'unit')
    {
    $organization = DB::table('business_units')->where('id',$request->org)->first();
    }
    if($type == 'stream')
    {
    $organization = DB::table('value_stream')->where('id',$request->org)->first();
    }
    if($type == 'BU')
    {
    $organization = DB::table('unit_team')->where('id',$request->org)->first();        
    }
    if($type == 'VS')
    {
    $organization = DB::table('value_team')->where('id',$request->org)->first();        
    }
    if($type == 'org')
    {
    $organization = DB::table('organization')->where('id',$request->org)->first();        
    }

    if($type == 'orgT')
    {
    $organization = DB::table('org_team')->where('id',$request->org)->first();        
    }

    $more = 'load-less';
    return view('Report.load-more',compact('report','sprint','Sid','SprintEpic','type','more'));


    }


    public function AllsprintInitReport($sprint,$type)
{
    $report = DB::table('sprint')->where('id',$sprint)->first();
    $Sid = $sprint;
    if($type == 'unit')
    {
    $organization = DB::table('business_units')->where('id',$report->value_unit_id)->first();
    }
    if($type == 'stream')
    {
    $organization = DB::table('value_stream')->where('id',$report->value_unit_id)->first();
    }
    if($type == 'BU')
    {
    $organization = DB::table('unit_team')->where('id',$report->value_unit_id)->first();        
    }
    if($type == 'VS')
    {
    $organization = DB::table('value_team')->where('id',$report->value_unit_id)->first();        
    }
    if($type == 'org')
    {
    $organization = DB::table('organization')->where('id',$report->value_unit_id)->first();        
    }

    if($type == 'orgT')
    {
    $organization = DB::table('org_team')->where('id',$report->value_unit_id)->first();        
    }

          session()->forget('init');

    return view('Report.All-Init',compact('report','sprint','type','organization','Sid'));


}
    
public function RestartSprint(Request $request)
{


DB::table('sprint')->where('id',$request->id)->update(['status' => NULL]);
DB::table('sprint_report')->where('q_id',$request->id)->delete();
$data = DB::table('sprint')->where('id',$request->id)->first();
return $data;
 
}

public function MoveQuarter(Request $request)
{
  $currentDate = Carbon::now();
  $currentYear = $currentDate->year;
  $currentMonth = $currentDate->month;
  $yearMonthString = $currentDate->format('Y');
  $yearMonth = $currentDate->format('F');
  $CurrentQuarter = '';
  $Quarters = '';
  $nextQuarter = '';
  $CurrentQuarter = DB::table('quarter_month')
                    ->where('org_id',$request->unit_id)
                    ->where('month',$yearMonth)
                    ->where('year',$yearMonthString)->get();
    
  $initid = array();
  $quarter_id = array();
  $index = array();
  $init_qid = array();
  $monthQ = array();

  if(count($CurrentQuarter) > 0)
  {
    foreach($CurrentQuarter as $Q)
    {
      $initid[] = $Q->initiative_id;
      $quarter_id[] = $Q->quarter_id;
    }

    $Quarter = DB::table('quarter')
      ->whereIn('id',$quarter_id)
      ->whereIn('initiative_id',$initid)
       ->get();
      
     
      if(count($Quarter) > 0)
      {
      foreach($Quarter as $q_id)
      {
        $init_qid[] = $q_id->initiative_id;
        $index[] = $q_id->loop_index + 1; 
      }  
      
       $Quarters = DB::table('quarter')
       ->whereIn('loop_index',$index)
       ->get();

      
       if(count($Quarters) > 0)
       {
        foreach($Quarters as $month)
        {
        $monthQ[] = $month->id;
        }
        $nextQuarter = DB::table('quarter_month')
        ->whereIn('quarter_id',$monthQ)
        ->orderby('id','asc')
        ->get();

        return view("Report.move-epic",compact("nextQuarter"));

       } 

   
   
      }               
     
      
  
  } 

 
}

public function savecommentkey(Request $request)
{
    $addcomment = new flag_comments();
    $addcomment->flag_id = $request->flag_id;
    $addcomment->user_id = $request->user_id;
    $addcomment->comment = $request->comment;
    $addcomment->type = 'comment';
    $addcomment->comment_type = 'key';
    $addcomment->save();

    $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;
  
}

public function Deletecommentkey(Request $request)
{
  
  flag_comments::where('id',$request->id)->delete();
  $data = key_result::find($request->key);
  $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
  $KEYChart =  DB::table('key_chart')->where('key_id',$request->key)->where('IndexCount',$report->IndexCount)->first();
  $key = key_result::find($request->key);
  $keyQAll = DB::table('key_chart')->where('key_id',$request->key)->get();    
  $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
  return $html;

  
  
}


public function updatecommentkey(Request $request)
    {
        $addcomment = flag_comments::find($request->comment_id);
        $addcomment->comment = $request->comment;
        $addcomment->save();

        $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;
    }


    public function savereplykey(Request $request)
    {
        $addcomment = new flag_comments();
        $addcomment->flag_id = $request->flag_id;
        $addcomment->user_id = $request->user_id;
        $addcomment->comment = $request->comment;
        $addcomment->type = 'reply';
        $addcomment->comment_type = 'key';
        $addcomment->comment_id = $request->comment_id;
        $addcomment->save();

        $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;
       
    }

    public function frequencyupdate(Request $request)
    {

      if($request->custrepeat == 'Custom')
      {
     
      $daysInput = implode(',', $request->daysInput);
      $days = $request->days;
      $repeatdays = $request->repeat;  

      }else
      {
        $daysInput = $request->cust_day;
        $days = $request->cust_date;
        $repeatdays = $request->custrepeat;  
      }
        DB::table('key_chart')->where('id',$request->key_chart_id)->update([
          'days' => $days,
          'repeatdays' => $repeatdays,
          'daysInput' =>  $daysInput,
          'cust_type' => $request->custrepeat,
     
        
        ]);


        $data = key_result::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('key_chart')->where('key_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = key_result::find($request->id);
        $keyQAll = DB::table('key_chart')->where('key_id',$request->id)->get();    
        $html = view('keyresult.tabs.values',compact('data','KEYChart','key','report','keyQAll'));
        return $html;

    

    }

    public function subscription()
    {
    
        $data = DB::table('user_plan')->where('user_id',Auth::id())->first();
        return view('settings.subscription',compact('data'));

    }
    
    public function AddnewQvalueObj(Request $request)
    {
    
        DB::table('obj_quarter_value')->insert([
          'obj_chart_id' => $request->key_chart_id,
          'obj_id' => $request->id,
          'sprint_id' => $request->sprint_id,
          'value' => $request->value,
          'status' => $request->status,
          'summary' => $request->summary,
          'participant' => implode(',',$request->participant),
        
        ]);


        $data = objectives::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('obj_chart')->where('obj_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = objectives::find($request->id);
        $keyQAll = DB::table('obj_chart')->where('obj_id',$request->id)->get();    
        $html = view('objective.modal.tabs.value',compact('data','KEYChart','key','report','keyQAll'));
        return $html;


    }
    
     public function UpdateQvalueObj(Request $request)
    {
        DB::table('obj_quarter_value')->where('id',$request->flag_id)->update([
          'value' => $request->value,
          'status' => $request->status,
          'summary' => $request->summary,
          'participant' => implode(',',$request->participant),
        
        ]);


        $data = objectives::find($request->id);
        $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
        $KEYChart =  DB::table('obj_chart')->where('obj_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
        $key = objectives::find($request->id);
        $keyQAll = DB::table('obj_chart')->where('obj_id',$request->id)->get();    
        $html = view('objective.modal.tabs.value',compact('data','KEYChart','key','report','keyQAll'));
        return $html;

        // $key = DB::table('key_quarter_value')->where('id',$request->id)->first();
        // $keychart = DB::table('key_quarter_value')->where('key_chart_id',$key->key_chart_id)->orderby('id','DESC')->first();

        // return $keychart;

    }
    
        public function savecommentobj(Request $request)
    {
        $addcomment = new flag_comments();
        $addcomment->flag_id = $request->flag_id;
        $addcomment->user_id = $request->user_id;
        $addcomment->comment = $request->comment;
        $addcomment->type = 'comment';
        $addcomment->comment_type = 'obj';
        $addcomment->save();
    
        $data = objectives::find($request->id);
            $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
            $KEYChart =  DB::table('obj_chart')->where('obj_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
            $key = objectives::find($request->id);
            $keyQAll = DB::table('obj_chart')->where('obj_id',$request->id)->get();    
                    $html = view('objective.modal.tabs.value',compact('data','KEYChart','key','report','keyQAll'));
    
            return $html;
      
    }

            public function updatecommentobj(Request $request)
                {
                    $addcomment = flag_comments::find($request->comment_id);
                    $addcomment->comment = $request->comment;
                    $addcomment->save();
            
                    $data = objectives::find($request->id);
                    $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
                    $KEYChart =  DB::table('obj_chart')->where('obj_id',$request->id)->where('IndexCount',$report->IndexCount)->first();
                    $key = objectives::find($request->id);
                    $keyQAll = DB::table('obj_chart')->where('obj_id',$request->id)->get();    
                    $html = view('objective.modal.tabs.value',compact('data','KEYChart','key','report','keyQAll'));
                    return $html;
                }

        public function Deletecommentobj(Request $request)
        {
          
          flag_comments::where('id',$request->id)->delete();
          $data = objectives::find($request->key);
          $report = DB::table('sprint')->where('user_id',Auth::id())->where('status',NULL)->where('value_unit_id',$data->unit_id)->where('type',$data->type)->first();
          $KEYChart =  DB::table('obj_chart')->where('obj_id',$request->key)->where('IndexCount',$report->IndexCount)->first();
          $key = objectives::find($request->key);
          $keyQAll = DB::table('obj_chart')->where('obj_id',$request->key)->get();    
          $html = view('objective.modal.tabs.value',compact('data','KEYChart','key','report','keyQAll'));
          return $html;
        
          
          
        }


}
