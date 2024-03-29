@php
$var_objective = "mapper-org";
@endphp
@extends('components.main-layout')
<title>ORG-OKR Mapper</title>
@section('content')
<style type="text/css">
   body{
      overflow: auto !important;
   }
   .subheader-solid{
      width: 100%;
      position: fixed;
      top: -3%;
      left: 300px;
      z-index: 999999;
   }
   .body-inner-content{
      overflow: auto;
      min-height: 1600px;
      min-width: 2500px;
      padding-left: 25px !important;
   }
   .rotatex{

   }
</style>
<div class="row rotatex">
   <div class="col-md-12">
      <div style="width: 100%; height: 5000px; padding: 50px;margin-top: 150px;">
         <!-- Node 1 -->
         <div id="node_1" class="node" style="transform: translate(-60px, -60px);">
            <div class="node-name slot-active drag-impo-grab">
               <a target="_blank" href="{{ url('organization/dashboard') }}" class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span> {{ $data->organization_name }}</a>
            </div>
            @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $data->id)->where('type' , 'org')->get() as $o)
               <a target="_blank" href="{{ url('dashboard/organization') }}/{{ $data->slug }}/portfolio/org?objective={{ $o->id }}" class="slot-inactive drag-impo-grab blanklink">
                  <span class="material-symbols-outlined f-18">location_searching</span>
                  <div class="slot-label drag-impo-grab"><span class="label-text">{{ $o->objective_name }}</span></div>
                  @if($o->status == 'Done')
                  <div class="badge-done">{{round($o->obj_prog,0)}}%</div>
                  @endif
                  @if($o->status == 'To Do')
                  <div class="badge-todo">{{round($o->obj_prog,0)}}%</div>
                  @endif
                  @if($o->status == 'In progress')
                  <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
                  @endif
               </a>
            @foreach(DB::table('key_result')->wherenull('trash')->where('obj_id' , $o->id)->get() as $k)
               <a href="{{ url('dashboard/organization') }}/{{ $data->slug }}/portfolio/org?keyresult={{ $k->id }}" target="_blank" class="slot-active blanklink">
                  <span class="material-symbols-outlined f-18 ml-2">key</span>
                  <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
                  @if($k->key_status == 'Done')
                  <div class="badge-done mr-2">{{round($k->key_prog,0)}}%</div>
                  @endif
                  @if($k->key_status == 'To Do')
                  <div class="badge-todo mr-2">{{round($k->key_prog,0)}}%</div>
                  @endif
                  @if($k->key_status == 'In progress')
                  <div class="badge-inprogress mr-2">{{round($k->key_prog,0)}}%</div>
                  @endif
                  <div id="buisness_unit_key_result_{{ $k->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
               </a>
            @endforeach
            @endforeach
         </div>

         @include('mapper.org.orgteam')

         @include('mapper.org.buisnessunits')
         
         @include('mapper.org.valuestream')
      </div>
   </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/leader-line@1.0.5/leader-line.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/plain-draggable@2.5.12/plain-draggable.min.js"></script>
<script type="text/javascript">

   window.addEventListener("load", function() {
   "use strict";
   
   @foreach(DB::table('team_link_child')->groupby('bussiness_key_id')->where('user_id' , Auth::id())->get() as $t_l_c)
   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
   @endforeach
   
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
   @endforeach
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $linedeclarekeyforslot =>  $line_t_l_c)
   var line{{ $linedeclarekeyforslot+1 }};
   @endforeach
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $linekeyforslot =>  $line_t_l_c)
   line{{$linekeyforslot+1}} = new LeaderLine(connectedobjective{{ $line_t_l_c->linked_objective_id }}, slout_out_buisness_unit_key_result_{{ $line_t_l_c->bussiness_key_id }}, {
   startPlug: "behind",
   endPlug: "behind",
   size: 4,
   startPlugSize: 1,
   endPlugSize: 1,
   startSocket: "left",
   endSocket: "right",
   color: "#fb8c00"
   // path: 'grid',
   // dropShadow: {color: '#111', dx: 0, dy: 2, blur: 0.2}
   });
   @endforeach
   

   
   new PlainDraggable(node_1, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
      @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   

   @foreach(DB::table('org_team')->where('org_id'  , $data->id)->get() as $o_t)

   new PlainDraggable(orgteam{{ $o_t->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });

   @endforeach

   
   @foreach($business_units as $key_calue_stream => $b)
   
   @foreach(DB::table('unit_team')->where('org_id'  , $b->id)->get() as $b_t)
   new PlainDraggable(buisnessunitteam{{ $b_t->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   @endforeach
   new PlainDraggable(buisnessunit{{ $b->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   @foreach($valuestream as $v)
   new PlainDraggable(valuestream{{ $v->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   
   @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)
   
    new PlainDraggable(valuestreamteam{{ $v_t->id }}, {
       onMove: function() {
         @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.position();
         @endforeach
       },
       // onMoveStart: function() { line.dash = {animation: true}; },
       onDragEnd: function() {
         @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
       },
       autoScroll:true,
     });
   
   @endforeach
   @endforeach
   @endforeach
   });
</script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
   let cumulativeHeight = -60;
   const boxes = document.querySelectorAll('.buisnessunits');
   boxes.forEach(function(box) {
     box.style.transform = `translate(300px , ${cumulativeHeight}px)`;
     cumulativeHeight += box.offsetHeight + 10;
   });


   let valuestreamcumulativeHeight = -60;
   const valuestreamboxes = document.querySelectorAll('.valuestreambox');
   valuestreamboxes.forEach(function(boxvaluestream) {
     boxvaluestream.style.transform = `translate(700px , ${valuestreamcumulativeHeight}px)`;
     valuestreamcumulativeHeight += boxvaluestream.offsetHeight + 10;
   });


   let valuestreamteamcumulativeHeight = -60;
   const valuestreamteamboxes = document.querySelectorAll('.valuestreamteambox');
   valuestreamteamboxes.forEach(function(boxvaluestreamteam) {
     boxvaluestreamteam.style.transform = `translate(1100px , ${valuestreamteamcumulativeHeight}px)`;
     valuestreamteamcumulativeHeight += boxvaluestreamteam.offsetHeight + 10;
   });


   let buisnessunitsteamcumulativeHeight = -60;
   const buisnessunitsteamboxes = document.querySelectorAll('.buisnessunitsteam');
   buisnessunitsteamboxes.forEach(function(boxbuisnessunitsteam) {
     boxbuisnessunitsteam.style.transform = `translate(1450px , ${buisnessunitsteamcumulativeHeight}px)`;
     buisnessunitsteamcumulativeHeight += boxbuisnessunitsteam.offsetHeight + 10;
   });

   let orgteamboxcumulativeHeight = -60;
   const orgteamboxboxes = document.querySelectorAll('.orgteambox');
   orgteamboxboxes.forEach(function(boxorgteambox) {
     boxorgteambox.style.transform = `translate(1850px , ${orgteamboxcumulativeHeight}px)`;
     orgteamboxcumulativeHeight += boxorgteambox.offsetHeight + 10;
   });



   

   
 });
</script>
@endsection
