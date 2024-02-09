@php
if($type == 'unit')
{
$var_objective = 'PageU-'.$type;
}
if($type == 'stream')
{
$var_objective = 'PageV-'.$type;
}
if($type == 'BU')
{
$var_objective = 'PageT-'.$type;
}
if($type == 'VS')
{
$var_objective = 'PageT-'.$type;
}
if($type == 'org')
{
$var_objective = 'PageT-'.$type;
}

if($type == 'orgT')
{
$var_objective = 'PageT-'.$type;
}
@endphp
@extends('components.main-layout')
<style>
   .show-read-more .more-text{
   display: none;
   }
   .kanban-board {
   display: flex;
   gap: 20px;
   }
   .board {
   flex: 1;
   padding: 10px;
   background-color: #f5f5f5;
   border-radius: 5px;
   position: relative;
   }
   .cards {
   min-height: 100px; /* Add a minimum height to enable Dragula */
   }
   .board-flex {
   float: left;
   position: relative;
   width: 300px;
   min-height: 100vh;
   margin: 8px;
   border-right: 1px solid lightgray;
   flex: 1;
   padding: 10px;
   border: 1px solid #ccc;
   background-color: #f5f5f5;
   border-radius: 5px;
   position: relative;
   }
   .board-flex header {
   text-align: center;
   width: 100%;
   padding: 0.5em;
   text-transform: capitalize;
   border-radius: 3px 3px 0 0;
   }
   .board-flex .cards {
   list-style-type: none;
   float: left;
   width: 100%;
   padding: 14px;
   min-height: 100px; /* Add a minimum height to enable Dragula */
   }
   /* Vertical bar representing today's date */
   #today-marker {
   position: absolute;
   width: 2px; /* Adjust the width as needed */
   background-color: red; /* Choose a suitable color */
   top: 0;
   bottom: 0;
   left: 0;
   }
   div[role="progressbar"] {
   --size: 3.5rem;
   --fg: #3FE1A7 ;
   --bg: #eeeeee;
   --pgPercentage: var(--value);
   animation: growProgressBar 3s 1 forwards;
   width: var(--size);
   height: var(--size);
   border-radius: 50%;
   display: grid;
   place-items: center;
   background: 
   radial-gradient(closest-side, white 80%, transparent 0 99.9%, white 0),
   conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0)
   ;
   font-family: Helvetica, Arial, sans-serif;
   font-size: calc(var(--size) / 5);
   color: gray;
   }
   div[role="progressbar"]::before {
   counter-reset: percentage var(--value);
   content: counter(percentage) '%';
   }
   .select2-container {
   min-width: 230px;
   height:46px !important;
   }
   .select2-results__option {
   padding-right: 20px;
   vertical-align: middle;
   }
   .select2-results__option:before {
   content: "";
   display: inline-block;
   position: relative;
   height: 20px;
   width: 20px;
   border: 2px solid #e9e9e9;
   border-radius: 4px;
   background-color: #fff;
   margin-right: 20px;
   vertical-align: middle;
   }
   .select2-container--default .select2-selection--multiple {
   margin-bottom: 10px;
   }
   .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
   border-radius: 4px;
   }
   .select2-container--default.select2-container--focus .select2-selection--multiple {
   border-color: #f77750;
   border-width: 2px;
   }
   .select2-container--default .select2-selection--multiple {
   border-width: 2px;
   }
   .select2-container--open .select2-dropdown--below {
   border-radius: 6px;
   box-shadow: 0 0 10px rgba(0,0,0,0.5);
   }
   .select2-selection .select2-selection--multiple:after {
   content: 'hhghgh';
   }
   /* select with icons badges single*/
   .select-icon .select2-selection__placeholder .badge {
   display: none;
   }
   .select-icon .placeholder {
   /*   display: none; */
   }
   .select-icon .select2-results__option:before,
   .select-icon .select2-results__option[aria-selected=true]:before {
   display: none !important;
   /* content: "" !important; */
   }
   .select-icon  .select2-search--dropdown {
   display: none;
   }
</style>
@if($type == 'unit')
<title>BU-OKR Planner</title>
@endif
@if($type == 'stream')
<title>VS-OKR Planner</title>
@endif
@if($type == 'VS')
<title>OKR Planner-{{$organization->team_title}}</title>
@endif
@if($type == 'BU')
<title>OKR Planner-{{$organization->team_title}}</title>
@endif
@if($type == 'orgT')
<title>OKR Planner-{{$organization->team_title}}</title>
@endif
@if($type == 'org')
<title>Org-OKR Planner</title>
@endif
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <div id="parentCollapsible">
               <!-- Parent Collapsible -->
               @if(count($objective) > 0)
               @foreach($objective as $obj)
               @php
               $keyResultcount  = DB::table('key_result')->wherenull('trash')->where('obj_id',$obj->id)->count();
               $keyweightcounte = DB::table('key_result')->wherenull('trash')->where('obj_id',$obj->id)->sum('weight');
               @endphp
               {{-- Objective Div --}}
               <div class="card bg-transparent shadow-none boardI" >
                  <div class="card-header objective-header active-header bg-white border-bottom"  id="obj-{{$obj->id}}-{{$organization->type}}-{{$organization->id}}">
                     <div class="d-flex flex-row header-objective align-items-center" 
                        data-toggle="collapse" data-target="#nestedCollapsible{{$obj->id}}">
                        <div class="title">
                           <h5 data-toggle="tooltip" data-placement="top" data-original-title="Objective">
                              <div class="d-flex flex-row align-items-center">
                                 <div>
                                    <img src="{{ url('public/assets/svg/objectives/one.svg') }}">
                                 </div>
                                 <div class="ml-2">
                                    {{$obj->objective_name}} <br>
                                    @if($keyweightcounte > 0)
                                       @if($keyweightcounte > 100)
                                          <div class=" text-danger w-25" role="">
                                             <small>Adjust Key Weight to 100 ({{$keyweightcounte}})</small>
                                          </div>
                                          @else
                                          <div class=" text-danger" role="">
                                             <small>Adjust Key Weight to 100  ({{$keyweightcounte}})</small>
                                          </div>
                                       @endif
                                       {{-- @if($keyweightcounte <= 100)
                                          <div class=" text-danger" role="">
                                             <small>Adjust Key Weight to 100  ({{$keyweightcounte}})</small>
                                          </div>
                                       @endif --}}
                                    @endif
                                 </div>
                              </div>
                           </h5>
                        </div>
                        <div class="d-flex flex-row content align-items-center">
                           <div class="content-item">
                              <p>{{$keyResultcount}} Key Results</p>
                           </div>
                           <div class="content-item">
                              <p>{{ \Carbon\Carbon::parse($obj->start_date)->format('M d')}} - {{ \Carbon\Carbon::parse($obj->end_date)->format('M d')}}</p>
                           </div>
                           <div class="content-item">
                              @if($obj->status == 'In progress')
                              <span class="badge-cs warning" style="width:100%">In progress</span>
                              @endif
                              @if($obj->status == 'Done')
                              <span class="badge-cs success">Done</span>
                              @endif
                              @if($obj->status == 'To Do')
                              <span class="badge-cs bg-secondary">To Do</span>
                              @endif
                           </div>
                           <div class="content-item" style="width:10%">
                              <div class="d-flex flex-row progress-section">
                                 @if($obj->q_obj_prog > 0)
                                 <div role="progressbar" id="obj_comp_q{{$obj->id}}" aria-valuenow="{{$obj->q_obj_prog}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{round($obj->q_obj_prog,0)}}"></div>
                                 @else
                                 <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0"></div>
                                 @endif
                              </div>
                           </div>
                           <div class="content-item" style="width:10%">
                              @if($obj->obj_prog > 0)
                              <div role="progressbar" id="obj_prog{{$obj->id}}" aria-valuenow="{{$obj->obj_prog}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{round($obj->obj_prog,0)}}"></div>
                              @else
                              <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0"></div>
                              @endif
                           </div>
                        </div>
                        @php
                        $objedit = preg_replace('/[^\p{L}\p{N}\s]/u', '',$obj->detail);
                        $trimmedStringobj = trim($objedit);
                        @endphp
                        <div class="action ml-0">
                           <button class="btn btn-icon btn-circle btn-tolbar ml-auto " onclick="editobjective(event , {{$obj->id}} , '{{$organization->slug}}')">
                           <span class="material-symbols-outlined">edit</span>
                           </button>
                           <button class="btn btn-icon btn-circle btn-tolbar delete-obj mr-2" onclick="deleteobj(event ,{{$obj->id}})">
                           <span class="material-symbols-outlined">delete</span>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div id="nestedCollapsible{{$obj->id}}" class="collapse">
                     <div class="card-body p-0">
                        <!-- begin Key Results -->
                        <div>
                           <!-- begin Item -->
                           @php
                           $keyResult  = DB::table('key_result')->wherenull('trash')->where('obj_id',$obj->id)->orderby('IndexCount')->get();
                           @endphp
                           <div class="row">
                              <div class="col-md-12">
                                 @if(count($keyResult) > 0)
                                 @foreach($keyResult as $key)
                                 @php
                                 $initiativeResultCount  = DB::table('initiative')->where('key_id',$key->id)->count();
                                 $initiativeweightcount = DB::table('initiative')->where('key_id',$key->id)->sum('initiative_weight');
                                 @endphp
                                 {{-- key Result Div --}}
                                 <div class="card bg-transparent shadow-none boardI" >
                                    <div class="card-header keyresult-header bg-light-gray" id="key-{{$key->id}}-{{$organization->type}}-{{$organization->id}}-{{$obj->id}}">
                                       <div class="d-flex flex-row justify-content-between header-objective align-items-center"
                                          data-toggle="collapse" data-target="#key-result{{$key->id}}">
                                          <div class="title ">
                                             <h5 data-toggle="tooltip" data-placement="top" data-original-title="Key Result">
                                                <div class="d-flex flex-row align-items-center">
                                                   <div>
                                                      <img src="{{ url('public/assets/svg/objectives/two.svg') }}">
                                                   </div>
                                                   <div class="ml-2">
                                                      {{$key->key_name}}
                                                   </div>
                                                </div>
                                             </h5>
                                          </div>
                                          <div
                                             class="d-flex flex-row content align-items-center">
                                             <div class="content-item">
                                                <p style="margin-left:-9px">{{$initiativeResultCount}} Initiatives</p>
                                             </div>
                                             <div class="content-item">
                                                <p>{{ \Carbon\Carbon::parse($key->key_start_date)->format('M d')}} - {{ \Carbon\Carbon::parse($key->key_end_date)->format('M d')}}</p>
                                             </div>
                                             <div class="content-item">                                                               
                                                @if($key->key_status == 'In progress')
                                                <span class="badge-cs warning " style="width:100%">In progress</span>
                                                @endif
                                                @if($key->key_status == 'Done')
                                                <span class="badge-cs success">Done</span>
                                                @endif
                                                @if($key->key_status == 'To Do')
                                                <span class="badge-cs bg-secondary">To Do</span>
                                                @endif
                                             </div>
                                             <div class="content-item" style="width:10%">
                                                @if($key->q_key_prog > 0)
                                                <div role="progressbar" id="qkeycomp{{$key->id}}" aria-valuenow="{{$key->q_key_prog}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{round($key->q_key_prog,0)}}"></div>
                                                @else
                                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0"></div>
                                                @endif            
                                             </div>
                                             <div class="content-item" style="width:10%">
                                                @if($key->key_prog > 0)
                                                <div role="progressbar" id="keyprog{{$key->id}}" aria-valuenow="{{$key->key_prog}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{round($key->key_prog,0)}}"></div>
                                                @else
                                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0"></div>
                                                @endif 
                                             </div>
                                          </div>
                                          @if($initiativeweightcount > 0)
                                          @if($initiativeweightcount > 100)
                                          <div class=" text-danger w-25" role="">
                                             <small>Adjust Key Weight to 100 ({{$initiativeweightcount}})</small>
                                          </div>
                                          @endif
                                          @if($initiativeweightcount < 100)
                                          <div class=" text-danger" role="">
                                             <small>Adjust Key Weight to 100  ({{$initiativeweightcount}})</small>
                                          </div>
                                          @endif
                                          @endif
                                          @php
                                          $keyedit = preg_replace('/[^\p{L}\p{N}\s]/u', '',$key->key_detail);
                                          $trimmedStringkey = trim($keyedit);
                                          @endphp
                                          <div class="action ml-0">
                                             <button class="btn btn-icon btn-circle bg-white btn-tolbar ml-auto" onclick="editobjectivekey(event,{{$key->id}})">
                                             <span class="material-symbols-outlined">edit</span>
                                             </button>
                                             <button class="btn btn-icon btn-circle bg-white btn-tolbar"  onclick="deleteobjkey(event,{{$key->id}},'{{$obj->id}}')" data-toggle="modal" data-target="#delete-objective-key">
                                             <span class="material-symbols-outlined">delete</span>
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                    @php
                                    $initiativeResult  = DB::table('initiative')->where('key_id',$key->id)->orderby('IndexCount')->get();
                                    @endphp
                                    <div id="key-result{{$key->id}}" class="collapse">
                                       <div class="card-body p-0">
                                          <!-- begin Initiative -->
                                          <div>
                                             <!-- begin Item -->
                                             <div class="row">
                                                <div class="col-md-12">
                                                   @if(count($initiativeResult) > 0)
                                                   @foreach($initiativeResult as $initiative)
                                                   @php
                                                   $InitiativeProgress = 0;
                                                   $EpicCount;
                                                   $EpicCount = DB::table('epics')->where('initiative_id',$initiative->id)->where('trash',NULL)->count();
                                                   $monthIds = DB::table('epics')->where('initiative_id',$initiative->id)->pluck('id');
                                                   $epicData = [];
                                                   foreach ($monthIds as $monthId) {
                                                   $epicData[] = $monthId;
                                                   }
                                                   $EpicStory  = DB::table('epics_stroy')->whereIn('epic_id',$epicData)->sum('progress');
                                                   if($EpicCount > 0)
                                                   {
                                                   $InitiativeProgress = round($EpicStory/$EpicCount,2);
                                                   }else
                                                   {
                                                   $InitiativeProgress = 0;
                                                   }
                                                   @endphp
                                                   {{-- initiative Div --}}
                                                   <div class="card bg-transparent shadow-none boardI">
                                                      <div class="card-header initiative-header"
                                                         style="background: #f9   f9f9 !important;" id="backlog-{{$initiative->id}}-{{$organization->type}}-{{$organization->id}}-{{$obj->id}}-{{$key->id}}">
                                                         <div class="d-flex flex-row justify-content-between header-objective align-items-center"
                                                            data-toggle="collapse"
                                                            data-target="#initiative{{$initiative->id}}" onclick="handleDivClick({{$initiative->id}})" >
                                                            <div class="title" >
                                                               <h5 data-toggle="tooltip" data-placement="top" data-original-title="initiative">
                                                                  <div class="d-flex flex-row align-items-center">
                                                                     <div>
                                                                        <img src="{{ url('public/assets/svg/objectives/three.svg') }}">
                                                                     </div>
                                                                     <div class="ml-2">
                                                                        {{$initiative->initiative_name}}
                                                                     </div>
                                                                  </div>
                                                               </h5>
                                                            </div>
                                                            <div
                                                               class="d-flex flex-row content align-items-center" >
                                                               <div class="content-item">
                                                                  <p style="margin-left:-38px">{{$EpicCount}} Epics</p>
                                                               </div>
                                                               <div class="content-item">
                                                                  <p>{{ \Carbon\Carbon::parse($initiative->initiative_start_date)->format('M d')}} - {{ \Carbon\Carbon::parse($initiative->initiative_end_date)->format('M d')}}</p>
                                                               </div>
                                                               <div class="content-item">                                                                                        
                                                                  @if($initiative->initiative_status == 'In progress')
                                                                  <span class="badge-cs warning" style="width:100%">In progress</span>
                                                                  @endif
                                                                  @if($initiative->initiative_status == 'Done')
                                                                  <span class="badge-cs success">Done</span>
                                                                  @endif
                                                                  @if($initiative->initiative_status == 'To Do')
                                                                  <span class="badge-cs bg-secondary">To Do</span>
                                                                  @endif
                                                               </div>
                                                               <div class="content-item" style="width:10%">
                                                                  {{-- @if($initiative->q_initiative_prog > 0) --}}
                                                                  <div role="progressbar" id="qcomp{{$initiative->id}}" aria-valuenow="{{$initiative->q_initiative_prog}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{round($initiative->q_initiative_prog,0)}}"></div>
                                                                  {{-- @else
                                                                  <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0"></div>
                                                                  @endif   --}}
                                                               </div>
                                                               <div class="content-item" style="width:10%">
                                                                  @if($initiative->initiative_prog > 0)
                                                                  <div role="progressbar" id="proginit{{$initiative->id}}" aria-valuenow="{{$initiative->initiative_prog}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{round($initiative->initiative_prog,0)}}"></div>
                                                                  @else
                                                                  <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0"></div>
                                                                  @endif 
                                                               </div>
                                                            </div>
                                                            @php
                                                            $initedit = preg_replace('/[^\p{L}\p{N}\s]/u', '',$initiative->initiative_detail);
                                                            $trimmedStringinit = trim($initedit);
                                                            @endphp
                                                            <div class="action ml-0">
                                                               <button
                                                                  class="btn btn-icon btn-circle bg-white btn-tolbar ml-auto" onclick="editinitiative({{$initiative->id}},'{{$initiative->initiative_name}}','{{$initiative->initiative_start_date}}','{{$initiative->initiative_end_date}}','{{$trimmedStringinit}}','{{$initiative->initiative_weight}}','{{$key->id}}','{{$obj->id}}','{{$key->key_end_date}}')" data-toggle="modal" data-target="#edit-initiative">
                                                               <span class="material-symbols-outlined">edit</span>
                                                               </button>
                                                               <button
                                                                  class="btn btn-icon btn-circle bg-white btn-tolbar" onclick="deletekeyinitiative({{$initiative->id}},'{{$key->id}}','{{$obj->id}}')" data-toggle="modal" data-target="#delete-initiative-key">
                                                               <span class="material-symbols-outlined">delete</span>
                                                               </button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      @php
                                                      $quarter = DB::table('quarter')->where('initiative_id',$initiative->id)->get();
                                                      @endphp
                                                      <div id="initiative{{$initiative->id}}" class="collapse" >
                                                         <div class="container-fluid">
                                                            <div class="row">
                                                               <div class="col-md-12 p-0">
                                                                  <div class="card">
                                                                     <div class="card-body" style="overflow-x:auto">
                                                                        <div class="board-kanban">
                                                                           <div class="container-scroll" id="container-scroll-{{$initiative->id}}">
                                                                              @if(count($quarter) > 0)    
                                                                              @foreach($quarter as $q)
                                                                              @php
                                                                              $quarterMonth  = DB::table('quarter_month')->where('quarter_id',$q->id)->get();
                                                                              $quarterMonthCount  = DB::table('quarter_month')->where('quarter_id',$q->id)->count();
                                                                              @endphp
                                                                              @if($quarterMonthCount > 0) 
                                                                              <div id="section-{{$initiative->id}}" class="section-scroll">
                                                                                 <div
                                                                                    class="card bg-transparent shadow-none">
                                                                                    <div class="row">
                                                                                       <div
                                                                                          class="col-md-12">
                                                                                          <div
                                                                                             class="card-header bg-white align-items-center">
                                                                                             <div
                                                                                                class="d-flex justify-content-between">
                                                                                                <div>
                                                                                                   <button
                                                                                                      onclick="shiftLeft({{$initiative->id}})"
                                                                                                      class="btn-circle btn-tolbar"><img
                                                                                                      src="{{asset('public/assets/images/icons/angle-left.svg')}}"></button>
                                                                                                </div>
                                                                                                <div>
                                                                                                   <h3
                                                                                                      class="title" >
                                                                                                      {{$q->quarter_name}}  {{$q->year}}
                                                                                                   </h3>
                                                                                                </div>
                                                                                                <div>
                                                                                                   <button
                                                                                                      onclick="shiftRight({{$initiative->id}})"
                                                                                                      class="btn-circle btn-tolbar"><img
                                                                                                      src="{{asset('public/assets/images/icons/angle-right.svg')}}"></button>
                                                                                                </div>
                                                                                             </div>
                                                                                          </div>
                                                                                       </div>
                                                                                    </div>
                                                                                    @php
                                                                                    $currentDate = \Carbon\Carbon::now();
                                                                                    $currentYear = $currentDate->year;
                                                                                    $currentMonth = $currentDate->month;
                                                                                    $yearMonthString = $currentDate->format('Y');
                                                                                    $yearMonth = $currentDate->format('F');
                                                                                    $CurrentQuarter = '';
                                                                                    $CurrentQuarter = DB::table('quarter_month')->where('initiative_id',$initiative->id)->where('month',$yearMonth)->where('year',$yearMonthString)->first();
                                                                                    @endphp
                                                                                    <div
                                                                                       class="card-body p-0">
                                                                                       <div class="board-body"
                                                                                          style="height:80vh">
                                                                                          <div
                                                                                             class="board-cards{{$q->id}} p-2" id="">
                                                                                             <div
                                                                                                id="scroller">
                                                                                                @if(count($quarterMonth) > 0)    
                                                                                                @foreach($quarterMonth as $month)
                                                                                                @php
                                                                                                $epic  = DB::table('epics')->where('month_id',$month->id)->where('trash',NULL)->get();
                                                                                                @endphp
                                                                                                <div  @if($CurrentQuarter) @if($q->id < $CurrentQuarter->quarter_id) class="board" @endif @endif class="board boardI"  style="width:33%"
                                                                                                id="{{$month->id}}">
                                                                                                {{-- Month name --}}
                                                                                                <header class="noselect" id="month-{{$month->id}}-{{$organization->type}}-{{$organization->id}}-{{$obj->id}}-{{$key->id}}-{{$initiative->id}}">
                                                                                                   {{$month->month}}
                                                                                                </header>
                                                                                                {{-- end month name --}}
                                                                                                @if(count($epic) > 0)
                                                                                                @foreach($epic as $e)
                                                                                                    @include('epics.index')
                                                                                                @endforeach
                                                                                             @endif
                                                                                             {{-- button div --}}
                                                                                             <button
                                                                                             class="btn  btn-primary border-1 ml-3 no-drag" @if($CurrentQuarter) @if($q->id < $CurrentQuarter->quarter_id) disabled @endif  @endif onclick="addepicmonth({{$month->id}},'{{$month->month}}','{{$q->id}}','{{$initiative->id}}','{{$key->id}}','{{$obj->id}}')" id="month-{{$month->id}}-{{$organization->type}}-{{$organization->id}}-{{$obj->id}}-{{$key->id}}-{{$initiative->id}}" data-toggle="modal" data-target="#create-epic-month" draggable="false">
                                                                                             Add Epics
                                                                                             </button>
                                                                                             
                                                                                          </div>
                                                                                          @endforeach
                                                                                          @endif
                                                                                       </div>
                                                                                    </div>
                                                                                    <div
                                                                                       class="d-flex flex-row-reverse zoom-btn-section">
                                                                                       <div>
                                                                                          <button
                                                                                             class="btn-circle btn-zoom-buttons zoom" onclick="zoom_in({{$q->id}})" >
                                                                                          <img width="20px"
                                                                                             height="20px"
                                                                                             src="{{asset('public/assets/images/icons/search-zoom-in.svg')}}"
                                                                                             alt="zoom-In">
                                                                                          </button>
                                                                                       </div>
                                                                                       <div
                                                                                          class="mr-2">
                                                                                          <button
                                                                                             class="btn-circle btn-zoom-buttons zoom-out" onclick="zoom_out({{$q->id}})">
                                                                                          <img width="20px"
                                                                                             height="20px"
                                                                                             src="{{asset('public/assets/images/icons/search-zoom-out.svg')}}"
                                                                                             alt="zoom-Out">
                                                                                          </button>
                                                                                       </div>
                                                                                       <div
                                                                                          class="mr-2">
                                                                                          <button
                                                                                             class="btn-circle btn-zoom-buttons zoom-init" onclick="zoom_init({{$q->id}})">
                                                                                          <img width="20px"
                                                                                             height="20px"
                                                                                             src="{{asset('public/assets/images/icons/maximize.svg')}}"
                                                                                             alt="zoom-Out">
                                                                                          </button>
                                                                                       </div>
                                                                                    </div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @endforeach
                                                                        @endif
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             @endforeach
                                             @endif
                                          </div>
                                       </div>
                                       @php
                                       $initiativeweightcounte = DB::table('initiative')->where('key_id',$key->id)->sum('initiative_weight');
                                       $monthnumber = DB::table('settings')->where('user_id',Auth::id())->first();
                                       $number = 0;
                                       if($monthnumber)
                                       {
                                       $number = $monthnumber->month;
                                       }else
                                       {
                                       $number = 0;
                                       }
                                       @endphp
                                       <!-- end Item -->
                                       <!-- begin Add New -->
                                       <div class="row py-2">
                                          <div class="col-md-12">
                                             <a href="" data-toggle="modal" onclick="initiative({{$key->id}},'{{$obj->id}}','{{$initiativeweightcounte}}','{{$key->key_start_date}}','{{$key->key_end_date}}')"
                                                data-target="#create-initiative"
                                                class="col-action"><img
                                                src="{{ asset('public/assets/images/icons/add-circle.svg') }}"
                                                class="mr-1"> Add Initiative</a>
                                          </div>
                                       </div>
                                       <!-- end Add New -->
                                    </div>
                                    <!-- end Initiative -->
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <!-- end Item -->
                     <!-- begin Add New -->
                     @php
                        $keyweightcount = DB::table('key_result')->where('obj_id',$obj->id)->sum('weight');
                     @endphp
                     <div class="row py-2">
                        <div class="col-md-12">
                           <a href="javascript:void(0)" onclick="objective({{$obj->id}})"
                              class="col-action key_obj"><img
                              src="{{ asset('public/assets/images/icons/add-circle.svg') }}"
                              class="mr-1"> Add Key Result</a>
                        </div>
                     </div>
                     <!-- end Add New -->
                  </div>
                  <!-- end Key Results -->
               </div>
            </div>
         </div>
         @endforeach
         @else
         No objective found.
         @endif
      </div>
   </div>
</div>
</div>
</div>


@php
$currentDate = \Carbon\Carbon::now();
$currentYear = $currentDate->year;
$currentMonth = $currentDate->month;
$yearMonthString = $currentDate->format('Y');
$yearMonth = $currentDate->format('F');
$CurrentQuarter = '';

$CurrentQuarter = DB::table('quarter_month')
                  ->where('org_id',$organization->id)
                  ->where('month',$yearMonth)
                  ->where('year',$yearMonthString)->first();
if($CurrentQuarter)
{
    $Quarter = DB::table('quarter_month')
                  ->where('quarter_id',$CurrentQuarter->quarter_id)
                  ->orderby('id','DESC')
                   ->first();
$monthNumber = \Carbon\Carbon::parse($Quarter->month)->month;
$firstDayOfNextMonth = \Carbon\Carbon::create(null, $monthNumber + 1, 1, 0, 0, 0);
$lastDayOfMonth = $firstDayOfNextMonth->subDay();
$formattedDate = $lastDayOfMonth->toDateString();
}

@endphp
  <div class="modal fade" id="create-report" tabindex="-1" role="dialog" aria-labelledby="create-report" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create Quarter/Sprint</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                      
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="success-sprint"  role="alert"></div>
                        <span id="sprint-error" class="text-danger"></span>
                    </div>
                </div>
                <form class="needs-validation" action="#" method="POST" novalidate>
                @csrf
            
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="q_title" required>
                                <label for="objective-name">Quarter Title</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" value="{{date('Y-m-d')}}" id="q_start_date"  required>
                                <label for="start-date" style="bottom:72px;">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" @if($CurrentQuarter) value="{{$formattedDate}}" @endif id="q_end_date" required>
                                <label for="end-date">End Date</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control"  id="q_description" >
                                <label for="small-description">Description</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button id="savequarterbutton" class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3" onclick="saveQuarter();"  type="button">Start</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Change text on the story button when it's toggled and when not -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
     var toggleButton = document.getElementById('ButtonCollaps');
     var collapseElement = document.getElementById('AddStory');
   
     collapseElement.addEventListener('show.bs.collapse', function () {
       toggleButton.innerText = 'Cancel';
     });
   
     collapseElement.addEventListener('hide.bs.collapse', function () {
       toggleButton.innerText = 'Add Story';
     });
   });

   
</script>
@endsection