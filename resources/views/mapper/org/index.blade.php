@php
$var_objective = "mapper-org";
@endphp
@extends('components.main-layout')
<title>ORG-OKR Mapper</title>
@section('content')
<style type="text/css">
   .app-content{
      background-color: transparent !important;
   }
   #newzooomid {
    transform-origin: top left; /* Ensure scaling origin is correct */
    overflow: visible; /* Ensure child elements are not clipped */
}

.node, .slot-label, .badge-done, .badge-todo, .badge-inprogress {
    transform-origin: top left; /* Adjust origin if necessary */
}

</style>
<div class="d-flex flex-row-reverse zoom-btn-section">
   <div>
      <button
         class="btn-circle btn-zoom-buttons zoom" onclick="zoomIn()" >
      <img width="20px"
         height="20px"
         src="{{asset('public/assets/images/icons/search-zoom-in.svg')}}"
         alt="zoom-In">
      </button>
   </div>
   <div
      class="mr-2">
      <button
         class="btn-circle btn-zoom-buttons zoom-out" onclick="zoomOut()">
      <img width="20px"
         height="20px"
         src="{{asset('public/assets/images/icons/search-zoom-out.svg')}}"
         alt="zoom-Out">
      </button>
   </div>
   <div
      class="mr-2">
      <button
         class="btn-circle btn-zoom-buttons zoom-init" onclick="resetZoom()">
      <img width="20px"
         height="20px"
         src="{{asset('public/assets/images/icons/maximize.svg')}}"
         alt="zoom-Out">
      </button>
   </div>
</div>
<div class="rotatex">
   <div class="row">

   <div class="col-md-12">
      <div id="newzooomid" style="width: 5000px; height: 5000px; padding: 50px;">
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
                  <div class="badge-done mr-2">{{ Cmf::keyresultprogress($k->id) }}%</div>
                  @endif
                  @if($k->key_status == 'To Do')
                  <div class="badge-todo mr-2">{{ Cmf::keyresultprogress($k->id) }}%</div>
                  @endif
                  @if($k->key_status == 'In progress')
                  <div class="badge-inprogress mr-2">{{ Cmf::keyresultprogress($k->id) }}%</div>
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
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{ url('public/assets/js/leader-line.min.js') }}"></script>
<script type="text/javascript" src="{{ url('public/assets/js/plain-draggable.min.js') }}"></script>
<script type="text/javascript">
   
   $( document ).ready(function() {
   
      createlines()

    });
   let zoomLevel = 1;
   const container = document.getElementById('newzooomid');
   const lines = [];

   @foreach(DB::table('team_link_child')->groupby('bussiness_key_id')->where('user_id' , Auth::id())->get() as $t_l_c)

   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
   @endforeach
   
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
   @endforeach
   
   @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->get() as $linedeclarekeyforslot =>  $line_t_l_c)
   var line{{ $linedeclarekeyforslot+1 }};
   @endforeach
   
   function createlines() {
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
      });
      lines.push(line{{$linekeyforslot+1}});
      @endforeach
   }

   function updateLines() {
    lines.forEach(line => line.position());
}

function zoomIn() {
    zoomLevel += 0.1;
    container.style.transform = `scale(${zoomLevel})`;
    updateLines();
}

function zoomOut() {
    if (zoomLevel > 0.1) {
        zoomLevel -= 0.1;
        container.style.transform = `scale(${zoomLevel})`;
        updateLines();
    }
}

function resetZoom() {
    zoomLevel = 1;
    container.style.transform = `scale(${zoomLevel})`;
    updateLines();
}
   

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