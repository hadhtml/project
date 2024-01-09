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
use App\Models\epics_stroy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Avatar;
use Carbon\Carbon;

class EpicBacklogController extends Controller
{
    public function getepicmodal(Request $request)
    {
        $data = DB::table($request->table)->where('id' , $request->id)->first();
        $html = view('epicbacklog.modal', compact('data'))->render();
        return $html;
    }
    public function showheader(Request $request)
    {
        $data = Epic::find($request->id);
        $html = view('epicbacklog.modalheader', compact('data'))->render();
        return $html;
    }
}