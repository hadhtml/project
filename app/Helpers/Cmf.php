<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\orders;
use App\Models\orderdetails;
use App\Models\flags;
use App\Models\escalate_cards;
use Twilio\Rest\Client;
use App\Models\orderstatus;
use App\Models\activities;
use App\Models\team_link_child;
use App\Models\modulenames;
use App\Models\Member_order;
use App\Models\business_units;
use App\Models\value_stream;
use App\Models\objectives;
use Mail;
use Illuminate\Support\Facades\Http;
use OneSignal;
class Cmf
{ 

    public static function getuserdatabytable($table , $user_id)
    {
        return DB::table($table)->where('user_id' , $user_id)->get();
    }
    public static function getmainorganizationslug()
    {
        return DB::table('organization')->where('user_id' , Auth::id())->first();
    }
    public static function keyresultprogress($id)
    {
        $keyresult  = team_link_child::where('bussiness_key_id', $id)->pluck('linked_objective_id');
        $objectiveIds = $keyresult->toArray();
        $objProgSum = objectives::whereIn('id', $objectiveIds)->sum('obj_prog');
        $count = count($objectiveIds);

        if($count > 0)
        {
            if($objProgSum > 0)
            {
                $progress = $objProgSum/$count;
            }else{
                $progress = 0;    
            }
        }else{
            $progress = 0;
        }

        return round($progress,0);
    }
    public static function savemapperheight($id , $type)
    {
        
        if($type == 'unit')
        {
            $business_units = business_units::where('org_id' , $id)->orderby('id' , 'asc')->get();
            foreach ($business_units as $key => $value) {
                $objectives = DB::table('objectives')->wherenull('trash')->where('unit_id' , $value->id)->where('type' , 'unit')->count();
                $keyresults = DB::table('key_result')->wherenull('trash')->where('unit_id' , $value->id)->where('type' , 'unit')->count();
                $total =  ($objectives+$keyresults+1)*50;
                $updatebuisnessunit = business_units::find($value->id);
                $updatebuisnessunit->mapper_height = $total;
                $updatebuisnessunit->mapper_height_test = $total;
                $updatebuisnessunit->save();
            }
            $keyvalue = 1;
            foreach ($business_units as $key => $value) {
                if($keyvalue == 2)
                {
                    $mapperheight = business_units::where('org_id' , $id)->orderBy('id', 'ASC')->limit(1)->first();
                    $updatebuisnessunit = business_units::find($value->id);
                    $updatebuisnessunit->mapper_height = $mapperheight->mapper_height;
                    $updatebuisnessunit->save();
                }

                if($keyvalue == 3)
                {
                    $mapperheight = business_units::selectRaw('SUM(mapper_height_test) as height')
                    ->fromSub(function ($query) {
                        $query->select('mapper_height_test')
                              ->from('business_units')
                              ->limit(2);
                    }, 'subquery')
                    ->first();
                    $updatebuisnessunit = business_units::find($value->id);
                    $updatebuisnessunit->mapper_height = $mapperheight->height+30;
                    $updatebuisnessunit->save();
                }

                if($keyvalue == 4)
                {
                    $mapperheight = business_units::selectRaw('SUM(mapper_height_test) as height')
                    ->fromSub(function ($query) {
                        $query->select('mapper_height_test')
                              ->from('business_units')
                              ->limit(3);
                    }, 'subquery')
                    ->first();
                    $updatebuisnessunit = business_units::find($value->id);
                    $updatebuisnessunit->mapper_height = $mapperheight->height+20+$updatebuisnessunit->mapper_height;
                    $updatebuisnessunit->save();
                }

                if($keyvalue == 5)
                {
                    $mapperheight = business_units::selectRaw('SUM(mapper_height_test) as height')
                    ->fromSub(function ($query) {
                        $query->select('mapper_height_test')
                              ->from('business_units')
                              ->limit(4);
                    }, 'subquery')
                    ->first();
                    $updatebuisnessunit = business_units::find($value->id);
                    $updatebuisnessunit->mapper_height = $mapperheight->height+50+$updatebuisnessunit->mapper_height;
                    $updatebuisnessunit->save();
                }

                $keyvalue++;
            }

        }
        if($type == 'stream')
        {
            $value_stream = value_stream::where('org_id' , $id)->orderby('id' , 'asc')->get();
            foreach ($value_stream as $key => $value) {
                $objectives = DB::table('objectives')->wherenull('trash')->where('unit_id' , $value->id)->where('type' , 'stream')->count();
                $keyresults = DB::table('key_result')->wherenull('trash')->where('unit_id' , $value->id)->where('type' , 'stream')->count();
                $total =  ($objectives+$keyresults+1)*50;
                $updatevalue_stream = value_stream::find($value->id);
                $updatevalue_stream->mapper_height = $total;
                $updatevalue_stream->mapper_height_test = $total;
                $updatevalue_stream->save();
            }



            $keyvalue = 1;
            foreach ($value_stream as $key => $value) {
                if($keyvalue == 2)
                {
                    $mapperheight = value_stream::where('org_id' , $id)->orderBy('id', 'ASC')->limit(1)->first();
                    $updatevalue_stream = value_stream::find($value->id);
                    $updatevalue_stream->mapper_height = $mapperheight->mapper_height;
                    $updatevalue_stream->save();
                }

                if($keyvalue == 3)
                {
                    $mapperheight = value_stream::selectRaw('SUM(mapper_height_test) as height')
                    ->fromSub(function ($query) {
                        $query->select('mapper_height_test')
                              ->from('value_stream')
                              ->limit(2);
                    }, 'subquery')
                    ->first();
                    $updatevalue_stream = value_stream::find($value->id);
                    $updatevalue_stream->mapper_height = $mapperheight->height+30;
                    $updatevalue_stream->save();
                }

                if($keyvalue == 4)
                {
                    $mapperheight = value_stream::selectRaw('SUM(mapper_height_test) as height')
                    ->fromSub(function ($query) {
                        $query->select('mapper_height_test')
                              ->from('value_stream')
                              ->limit(3);
                    }, 'subquery')
                    ->first();
                    $updatevalue_stream = value_stream::find($value->id);
                    $updatevalue_stream->mapper_height = $mapperheight->height+50+$updatevalue_stream->mapper_height;
                    $updatevalue_stream->save();
                }

                if($keyvalue == 5)
                {
                    $mapperheight = value_stream::selectRaw('SUM(mapper_height_test) as height')
                    ->fromSub(function ($query) {
                        $query->select('mapper_height_test')
                              ->from('value_stream')
                              ->limit(4);
                    }, 'subquery')
                    ->first();
                    $updatevalue_stream = value_stream::find($value->id);
                    $updatevalue_stream->mapper_height = $mapperheight->height+50+$updatevalue_stream->mapper_height;
                    $updatevalue_stream->save();
                }

                $keyvalue++;
            }
        }
    }
    public static function getmodulename($level)
    {
        if($level == 'level_one')
        {
            return modulenames::where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first()->level_one;
        }
        if($level == 'level_two')
        {
            return modulenames::where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first()->level_two;
        }
        if($level == 'level_three')
        {
            return modulenames::where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first()->level_three;
        }
    }
    public static function getmoduleslug($level)
    {
        if($level == 'level_one')
        {
            return modulenames::where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first()->slug_one;
        }
        if($level == 'level_two')
        {
            return modulenames::where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first()->slug_two;
        }
        if($level == 'level_three')
        {
            return modulenames::where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first()->slug_three;
        }
    }
    public static function outputscript($id , $type)
    {
        $data = team_link_child::where('bussiness_unit_id' , $id)->where('from' , $type)->get();
        foreach ($data as $r) {
            echo "string";
        }
        exit;
        return '"outputs": { "output_1": { "connections": [{ "node": "101", "output": "input_1" }] },"output_2": { "connections": [{ "node": "101", "output": "input_1" }] }, },';
    }

    public static function gerescalatedmainid($id)
    {
        $data = flags::find($id);
        if($data->escalate)
        {
            $escalated = escalate_cards::where('id' , $data->escalate)->first();
            $data =  $escalated->orignal_flag_id;
        }else{
            $data =  $id;
        }
        return $data;
    }
    public static function get_file_extension($file_name) {
        return substr(strrchr($file_name,'.'),1);
    }
    public static function save_activity($user_id , $activity,$type,$value_id,$icon)
    {
        $act = new activities();
        $act->user_id = $user_id;
        $act->activity = $activity;
        $act->is_read = 1;
        $act->type = $type;
        $act->value_id = $value_id;
        $act->icon = $icon;
        $act->save();
    }
    public static function create_time_ago($time)
    {
        $year = date('Y', strtotime($time));
        $month = date('m', strtotime($time));
        $day = date('d', strtotime($time));
        $datetime = Carbon::parse($time);
        return $datetime->diffForHumans();
    }
    public static function date_format($data)
    {
        return date('d M Y, h:s a ', strtotime($data));
    }
    public static function date_format_time($data)
    {
        return date('h:s a ', strtotime($data));
    }
    public static function date_format_new($data)
    {
        return date('d M Y', strtotime($data));
    }
    public static function currenturl()
    {
       return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    }
    public static function sendimagetodirectory($imagename)
    {
        $file = $imagename;
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        return $filename;
    }
    public static function shorten_url($text)
    {
        $words = explode('-', $text);
        $five_words = array_slice($words,0,12);
        $String_of_five_words = implode('-',$five_words)."\n";

        $String_of_five_words = preg_replace('~[^\pL\d]+~u', '-', $String_of_five_words);
        $String_of_five_words = iconv('utf-8', 'us-ascii//TRANSLIT', $String_of_five_words);
        $String_of_five_words = preg_replace('~[^-\w]+~', '', $String_of_five_words);
        $String_of_five_words = trim($String_of_five_words, '-');
        $String_of_five_words = preg_replace('~-+~', '-', $String_of_five_words);
        $String_of_five_words = strtolower($String_of_five_words);
        if (empty($String_of_five_words)) {
          return 'n-a';
        }
        return $String_of_five_words;
    }
}
