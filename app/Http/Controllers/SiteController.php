<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cookie;
use Mail;
use App\Models\team_link_child;

class SiteController extends Controller
{

    public function mapperapi($userId)
    {

        // $user = Auth::user();
        // if ($user->id != $userId) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        
       // Select only the 'organization_name', 'slug' and 'id' columns
        $organization = DB::table('organization')
            ->select('id', 'organization_name', 'slug')
            ->where('user_id', $userId)
            ->first();

        if (!$organization) {
            return response()->json(['message' => 'Organization not found'], 404);
        }

        // Fetch objectives related to the organization
        $objectives = DB::table('objectives')
            ->select('objective_name', 'obj_prog', 'id as obj_id' , 'type as objective_level')
            ->whereNull('trash')
            ->where('unit_id', $organization->id)
            ->where('type', 'org')
            ->get();

        // Fetch key results for each objective
        foreach ($objectives as $objective) {
            $keyResults = DB::table('key_result')
                ->select('key_name', 'key_prog', 'obj_id', 'id as key_id')
                ->whereNull('trash')
                ->where('obj_id', $objective->obj_id)
                ->get();

            $objective->key_results = $keyResults;
        }

        // Add objectives to the organization data
        $organization->objectives = $objectives;

        // Fetch business units related to the organization
        $businessUnits = DB::table('business_units')
            ->select('id as bu_id', 'business_name', 'slug')
            ->where('org_id', $organization->id)
            ->orderBy('id', 'asc')
            ->get();

        // Fetch objectives and key results for each business unit
        foreach ($businessUnits as $businessUnit) {
            $unitObjectives = DB::table('objectives')
                ->select('objective_name', 'obj_prog', 'id as obj_id' , 'type as objective_level')
                ->whereNull('trash')
                ->where('unit_id', $businessUnit->bu_id)
                ->where('type', 'unit')
                ->get();

            foreach ($unitObjectives as $objective) {
                $keyResults = DB::table('key_result')
                    ->select('key_name', 'key_prog', 'obj_id', 'id as key_id')
                    ->whereNull('trash')
                    ->where('obj_id', $objective->obj_id)
                    ->get();

                $objective->key_results = $keyResults;
            }

            $businessUnit->objectives = $unitObjectives;

            // Fetch business unit teams
            $businessUnitTeams = DB::table('unit_team')
                ->select('id as bu_team_id', 'team_title', 'slug')
                ->where('org_id', $businessUnit->bu_id)
                ->get();

            // Fetch objectives for each business unit team
            foreach ($businessUnitTeams as $businessUnitTeam) {
                $teamObjectives = DB::table('objectives')
                    ->select('objective_name', 'obj_prog', 'id as obj_id' , 'type as objective_level')
                    ->whereNull('trash')
                    ->where('unit_id', $businessUnitTeam->bu_team_id)
                    ->where('type', 'BU')
                    ->get();

                foreach ($teamObjectives as $objective) {
                    $keyResults = DB::table('key_result')
                        ->select('key_name', 'key_prog', 'obj_id', 'id as key_id')
                        ->whereNull('trash')
                        ->where('obj_id', $objective->obj_id)
                        ->get();

                    $objective->key_results = $keyResults;
                }

                $businessUnitTeam->objectives = $teamObjectives;
            }

            // Add business unit teams to the business unit data
            $businessUnit->unit_teams = $businessUnitTeams;
        }

        // Add business units to the organization data
        $organization->business_units = $businessUnits;

        // Fetch org teams related to the organization
        $orgTeams = DB::table('org_team')
            ->select('id as team_id', 'team_title', 'slug')
            ->where('org_id', $organization->id)
            ->get();

        // Fetch objectives for each org team
        foreach ($orgTeams as $orgTeam) {
            $teamObjectives = DB::table('objectives')
                ->select('objective_name', 'obj_prog', 'id as obj_id' , 'type as objective_level')
                ->whereNull('trash')
                ->where('unit_id', $orgTeam->team_id)
                ->where('type', 'orgT')
                ->get();

            foreach ($teamObjectives as $objective) {
                $keyResults = DB::table('key_result')
                    ->select('key_name', 'key_prog', 'obj_id', 'id as key_id')
                    ->whereNull('trash')
                    ->where('obj_id', $objective->obj_id)
                    ->get();

                $objective->key_results = $keyResults;
            }

            $orgTeam->objectives = $teamObjectives;
        }

        // Add org teams to the organization data
        $organization->org_teams = $orgTeams;

        // Fetch value streams related to the organization
        $valueStreams = DB::table('value_stream')
            ->select('value_name', 'id as value_stream_id')
            ->where('org_id', $organization->id)
            ->orderBy('id', 'asc')
            ->get();

        // Fetch objectives and key results for each value stream
        foreach ($valueStreams as $valueStream) {
            $streamObjectives = DB::table('objectives')
                ->select('objective_name', 'obj_prog', 'id as obj_id' , 'type as objective_level')a  
                ->whereNull('trash')
                ->where('unit_id', $valueStream->value_stream_id)
                ->where('type', 'stream') // Adjusted to filter by type 'stream'
                ->get();

            foreach ($streamObjectives as $objective) {
                $keyResults = DB::table('key_result')
                    ->select('key_name', 'key_prog', 'obj_id', 'id as key_id')
                    ->whereNull('trash')
                    ->where('obj_id', $objective->obj_id)
                    ->get();

                $objective->key_results = $keyResults;
            }

            $valueStream->objectives = $streamObjectives;

            // Fetch value stream teams
            $valueStreamTeams = DB::table('value_team')
                ->select('id as vs_team_id', 'team_title', 'slug')
                ->where('org_id', $valueStream->value_stream_id)
                ->get();

            // Fetch objectives for each value stream team
            foreach ($valueStreamTeams as $valueStreamTeam) {
                $teamObjectives = DB::table('objectives')
                    ->select('objective_name', 'obj_prog', 'id as obj_id' , 'type as objective_level')
                    ->whereNull('trash')
                    ->where('unit_id', $valueStreamTeam->vs_team_id)
                    ->where('type', 'VS')
                    ->get();

                foreach ($teamObjectives as $objective) {
                    $keyResults = DB::table('key_result')
                        ->select('key_name', 'key_prog', 'obj_id', 'id as key_id')
                        ->whereNull('trash')
                    ->where('obj_id', $objective->obj_id)
                    ->get();

                    $objective->key_results = $keyResults;
                }

                $valueStreamTeam->objectives = $teamObjectives;
            }

            // Add value stream teams to the value stream data
            $valueStream->value_stream_teams = $valueStreamTeams;
        }

        // Add value streams to the organization data
        $organization->value_streams = $valueStreams;

        return response()->json($organization, 200);
    }
    public function Indexpage()
    {
        return view('indexpage');
    }
    public function AllFaq()
    {
     
        $Faq = DB::table('faqs')->get();
        return view('admin.website.faq',compact('Faq'));
    }

    public function SaveFaq(Request $request)
    {
        $id =  DB::table('faqs')->insertGetId([
            'question' => $request->question,
            'answer' => $request->answer,
          
          ]);

       return back();   
    }

    public function UpdateFaq(Request $request)
    {
        $id =  DB::table('faqs')->where('id',$request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
          
          ]);

       return back();   
    }

    public function DeleteFaq($id)
    {
        $id =  DB::table('faqs')->where('id',$id)->delete();

       return back();   
    }

    public function HeaderSection()
    {
        $data = DB::table('header_section')->where('section','header')->first();
        return view('admin.website.Header',compact('data'));
    }

    public function SaveHeader(Request $request)
    {

        $data = DB::table('header_section')->where('section',$request->section)->first();

        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }else
        {
            $filename = $request->oldimage;  
        }

        if($data)
        {
        
            DB::table('header_section')->where('section',$request->section)->update([
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                 'sub_heading' => $request->sub_heading,
                'image' => $filename,
              
              ]);
        
        }else
        {
            $id =  DB::table('header_section')->insertGetId([
                'section' => 'header',
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'sub_heading' => $request->sub_heading,
                'image' => $filename,
              
              ]);
        }

     

       return back();   
    }

    public function FlagSection()
    {
        $data = DB::table('header_section')->where('section','flag')->get();
        return view('admin.website.FlagSection',compact('data'));
    }


    public function SaveSection(Request $request)
    {

        
        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }

        $id =  DB::table('header_section')->insertGetId([
                'section' => 'flag',
              
                'title' => $request->title,
                'image' => $filename,
             
          
          ]);
          
        if($request->has('features'))
        {
            
        foreach($request->features  as $k => $value)
        {
             DB::table('header_section')
             ->insert([
                'feature_highlight' => $request->features[$k],
                'section' => $id
            ]);
        }

            
        }
        
      
       return back();   
    }


    public function UpdateSection(Request $request)
    {

        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }else
        {
            $filename = $request->oldimage;
        }

         DB::table('header_section')->where('id',$request->id)->update([
                'title' => $request->title,
                'image' => $filename,
         
 
          ]);
          

        if($request->has('update_features_id'))
        {
         
        foreach($request->update_features  as $k => $value)
        {
            
        DB::table('header_section')->where('id',$request->update_features_id[$k])->update([
        
           'feature_highlight' => $request->update_features[$k],

          ]);
        }  
            
        }

    
        
         if($request->has('newupdatefeatures'))
        {
            
        foreach($request->newupdatefeatures  as $k => $value)
        {
             DB::table('header_section')
             ->insert([
                'feature_highlight' => $request->newupdatefeatures[$k],
                'section' => $request->id,
            ]);
        }

            
        }
        
    

       return back();   
    }

    public function BusinessSection()
    {
        $data = DB::table('header_section')->where('section','business')->get();
        return view('admin.website.BusinessSection',compact('data'));
    }

    public function SaveBusinessSection(Request $request)
    {


        
        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }
     
        $id =  DB::table('header_section')->insert([
                'section' => 'business',
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'btn_text' => $request->btn_text,
                'btn_link' => $request->btn_link,
                'image' => $filename,
          
          ]);

       return back();   
    }

    public function UpdateBusinessSection(Request $request)
    {

        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }else
        {
            $filename = $request->oldimage;
        }

        $id =  DB::table('header_section')->where('id',$request->id)->update([
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
            'image' => $filename,
          
          ]);

       return back();   
    }

    public function FooterSection()
    {
        $data = DB::table('header_section')->where('section','footer')->first();
        return view('admin.website.FooterSection',compact('data'));
    }


    public function SaveFooterSection(Request $request)
    {

    $data = DB::table('header_section')->where('section',$request->section)->first();
        
        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }else
        {
            $filename = $request->oldimage;  
        }

        if($data)
        {
        DB::table('header_section')->where('section','footer')->update([
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'image' => $filename,
          
          ]);

        }else
        {
            $id =  DB::table('header_section')->insert([
                'section' => 'footer',
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'image' => $filename,
          
          ]);

        }
     
      

       return back();   
    }

    public function AllContact()
    {
        $data = DB::table('contact')->get();
        return view('admin.website.contact',compact('data'));
    }

    public function SaveContact(Request $request)
    {

        

        $id =  DB::table('contact')->insert([
        
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'comment' => $request->comment,
          
          ]);

    }

    public function FeatureSection()
    {
        $data = DB::table('header_section')->where('section','feature')->get();
        return view('admin.website.key-feature',compact('data'));
    }

    public function SaveFeatureSection(Request $request)
    {

     
        $id =  DB::table('header_section')->insert([
                'section' => 'feature',
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'btn_text' => $request->btn_text,
                'btn_link' => $request->btn_link,
          
          ]);

       return back();   
    }

    public function UpdateFeatureSection(Request $request)
    {

        $id =  DB::table('header_section')->where('id',$request->id)->update([
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
          
          ]);

       return back();   
    }
    
       public function SaveBusinessSectionHeader(Request $request)
    {


     
      $data = DB::table('header_section')->where('section',$request->section)->first();
       if($data)
       {
              DB::table('header_section')->where('section',$request->section)->update([
                'sub_title' => $request->sub_title_header,
                'title' => $request->title_header,

          ]);
           
       }else
       {
            DB::table('header_section')->insert([
                'section' => 'business-header',
                'sub_title' => $request->sub_title_header,
                'title' => $request->title_header,

          ]);  
       }
    

       return back();   
    }
    
        public function ContactSection()
    {
        $data = DB::table('header_section')->where('section','contact')->first();
        return view('admin.website.contact-section',compact('data'));
    }
    
        public function SaveContactSection(Request $request)
    {


     
      $data = DB::table('header_section')->where('section',$request->section)->first();
       if($data)
       {
              DB::table('header_section')->where('section',$request->section)->update([
                'sub_title' => $request->sub_title,
                'title' => $request->title,

          ]);
           
       }else
       {
            DB::table('header_section')->insert([
                'section' => 'contact',
                'sub_title' => $request->sub_title,
                'title' => $request->title,

          ]);  
       }
    

       return back();   
    }
    
       public function CeoMessage()
    {
        $data = DB::table('header_section')->where('section','message')->first();
        return view('admin.website.ceo-message',compact('data'));
    }
    
           public function SaveCeoMessage(Request $request)
    {


     
      $data = DB::table('header_section')->where('section',$request->section)->first();
       if($data)
       {
              DB::table('header_section')->where('section',$request->section)->update([
                'message' => $request->message,
          ]);
           
       }else
       {
            DB::table('header_section')->insert([
                'section' => 'message',
                'message' => $request->message,
          

          ]);  
       }
    

       return back();   
    }
    
          public function SaveHighlightSectionHeader(Request $request)
    {


     
      $data = DB::table('header_section')->where('section',$request->section)->first();
       if($data)
       {
              DB::table('header_section')->where('section',$request->section)->update([
                'sub_title' => $request->sub_title_header,
         

          ]);
           
       }else
       {
            DB::table('header_section')->insert([
                'section' => 'highlight-header',
                'sub_title' => $request->sub_title_header,

          ]);  
       }
    

       return back();   
    }
    
    public function DeleteBusinessSection($id)
    {
        $id =  DB::table('header_section')->where('id',$id)->delete();

       return back();   
    }

    public function SoftwareSection()
    {
        $data = DB::table('header_section')->where('section','software')->get();
        return view('admin.website.software-section',compact('data'));
    }

    public function SaveSoftwareSection(Request $request)
    {


        
        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }
     
        $id =  DB::table('header_section')->insert([
                'section' => 'software',
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'image' => $filename,
          
          ]);

       return back();   
    }
    

    public function UpdateSoftwareSection(Request $request)
    {

        if($request->has('image'))
        {
            $filename = $this->sendimagetodirectory($request->image);
        }else
        {
            $filename = $request->oldimage;
        }

        $id =  DB::table('header_section')->where('id',$request->id)->update([
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'image' => $filename,
          
          ]);

       return back();   
    }

    public function DeleteHighlightSection($id)
    {
        $id =  DB::table('header_section')->where('id',$id)->delete();

       return back();   
    }



    public static function sendimagetodirectory($imagename)

    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images'), $filename);

        return $filename;

    }

    public function submitcontactusform(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        if ($request->has('remember')) {
            Cookie::queue('name', $request->name, 60 * 24 * 30); // 30 days
            Cookie::queue('email', $request->email, 60 * 24 * 30); // 30 days
        } else {
            Cookie::queue(Cookie::forget('name'));
            Cookie::queue(Cookie::forget('email'));
        }

        $subject = $request->subject;
        Mail::send('email.contactus', array('request'=>$request), function($message) use ($request,$subject) {
           $message->to('info@outcomemet.co.uk')->subject($subject);
           $message->from('noreply@outcomemet.co.uk','OUTCOMEMET');
        });
        return back()->with('success', 'Your message has been sent.');
    }
}
