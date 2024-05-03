<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SiteController extends Controller
{

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
        
         if($request->has('updatefeatures'))
        {
            
        foreach($request->features  as $k => $value)
        {
             DB::table('header_section')
             ->insert([
                'feature_highlight' => $request->updatefeatures[$k],
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



    public static function sendimagetodirectory($imagename)

    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images'), $filename);

        return $filename;

    }
}