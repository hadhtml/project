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
   .body-inner-content{
      overflow: auto;
      min-height: 1600px;
      min-width: 2100px;
      padding-left: 25px !important;
   }
   .rotatex{

   }
</style>
<div class="row rotatex">
   <div class="col-md-12">
      <div style="width: 100%; height: 1000px; padding: 50px;">
         <!-- Node 1 -->
         <div id="node_1" class="node" style="transform: translate(-60px, -60px);;">
            <div class="node-name slot-active drag-impo-grab">
               <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span> {{ $data->organization_name }}</div>
            </div>
            @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $data->id)->where('type' , 'org')->get() as $o)
               <div class="slot-inactive drag-impo-grab">
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
               </div>
            @foreach(DB::table('key_result')->wherenull('trash')->where('obj_id' , $o->id)->get() as $k)
               <div class="slot-active">
                  <span class="material-symbols-outlined f-18 ml-2">key</span>
                  <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
                  @if($k->key_status == 'Done')
                  <div class="badge-done mr-2"">{{round($k->key_prog,0)}}%</div>
                  @endif
                  @if($k->key_status == 'To Do')
                  <div class="badge-todo mr-2"">{{round($k->key_prog,0)}}%</div>
                  @endif
                  @if($k->key_status == 'In progress')
                  <div class="badge-inprogress mr-2"">{{round($k->key_prog,0)}}%</div>
                  @endif
                  <div id="buisness_unit_key_result_{{ $k->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
               </div>
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
   
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
   @endforeach
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $linedeclarekeyforslot =>  $line_t_l_c)
   var line{{ $linedeclarekeyforslot+1 }};
   @endforeach
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $linekeyforslot =>  $line_t_l_c)
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
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
      @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   

   @foreach(DB::table('org_team')->where('org_id'  , $data->id)->get() as $o_t)

   new PlainDraggable(orgteam{{ $o_t->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
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
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   @endforeach
   new PlainDraggable(buisnessunit{{ $b->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   @foreach($valuestream as $v)
   new PlainDraggable(valuestream{{ $v->id }}, {
   onMove: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
   line{{ $draglinekey+1 }}.position();
   @endforeach
   },
   // onMoveStart: function() { line.dash = {animation: true}; },
   onDragEnd: function() {
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.dash = false;
         @endforeach
   },
   autoScroll:true,
   });
   
   @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)
   
    new PlainDraggable(valuestreamteam{{ $v_t->id }}, {
       onMove: function() {
         @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
         line{{ $draglinekey+1 }}.position();
         @endforeach
       },
       // onMoveStart: function() { line.dash = {animation: true}; },
       onDragEnd: function() {
         @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->get() as $draglinekey =>  $drag)
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
@endsection