@php
if($organization->type == 'stream')
{
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
}
if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}
if($organization->type == 'VS')
{
$team  = DB::table('value_stream')->where('id',$organization->org_id)->first();
$Unit  = DB::table('business_units')->where('id',$team->unit_id)->first();  
}
if($organization->type == 'orgT')
{
$team  = DB::table('organization')->where('id',$organization->org_id)->first();  
}
@endphp
<div class="subheader subheader-solid breadcrums" id="kt_subheader">
   <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-start flex-column flex-wrap mr-2">
         <!--begin::Page Title-->
       
      <div class="d-flex flex-row">
         <div>
             <span style="font-size:22px" class="material-symbols-outlined">key_visualizer</span>
         </div>
         <div>
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
               Epic Backlog
            </h5>
         </div>
     </div>
         <div class="d-flex flex-row page-sub-titles">
            <div class="mr-2 d-flex align-items-center">
               @if($organization->type == 'org')
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                  <a href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">key_visualizer</span>
                  <a  href="javascript::void(0)" style="text-decoration: none;cursor: auto;" >Epic Backlog</a>
               </div>
               @endif

               @if($organization->type == 'unit')
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                  <a href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
               </div>
               
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                  <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >{{ $organization->business_name }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">key_visualizer</span>
                  <a  href="javascript::void(0)" style="text-decoration: none;cursor: auto;" >Epic Backlog</a>
               </div>
               @endif

               @if($organization->type == 'stream')
               @php
                  $businesunit = DB::table('business_units')->where('id' , $organization->unit_id)->first();
               @endphp
               
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                  <a href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                  <a  href="{{url('dashboard/organization/'.$businesunit->slug.'/dashboard/'.$businesunit->type)}}" style="text-decoration: none;" >{{ $businesunit->business_name }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">layers</span>
                  <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >{{ $organization->value_name }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">key_visualizer</span>
                  <a  href="javascript::void(0)" style="text-decoration: none;cursor: auto;" >Epic Backlog</a>
               </div>

               @endif
               @if($organization->type == 'orgT')
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                  <a href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">home</span>
                  <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >{{ $organization->team_title }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">key_visualizer</span>
                  <a  href="javascript::void(0)" style="text-decoration: none;cursor: auto;" >Epic Backlog</a>
               </div>
               @endif
               @if($organization->type == 'BU')
               @php
                  $businesunit = DB::table('business_units')->where('id' , $organization->org_id)->first();
                
               @endphp
                 <div class="d-flex align-items-center mr-2">
                    <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                     <a href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
                 </div>
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                  <a  href="{{url('dashboard/organization/'.$businesunit->slug.'/dashboard/'.$businesunit->type)}}" style="text-decoration: none;" >{{ $businesunit->business_name }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">groups</span>
                  <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >{{ $organization->team_title }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">key_visualizer</span>
                  <a  href="javascript::void(0)" style="text-decoration: none;cursor: auto;" >Epic Backlog</a>
               </div>

               @endif
               @if($organization->type == 'VS')
               @php
                  $valuestream = DB::table('value_stream')->where('id' , $organization->org_id)->first();
                  $businesunit = DB::table('business_units')->where('id' , $valuestream->unit_id)->first();
               @endphp
                <div class="d-flex align-items-center mr-2">
                   <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                  <a href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
                </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                  <a  href="{{url('dashboard/organization/'.$businesunit->slug.'/dashboard/'.$businesunit->type)}}" style="text-decoration: none;" >{{ $businesunit->business_name }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">layers</span>
                  <a  href="{{url('dashboard/organization/'.$valuestream->slug.'/dashboard/'.$valuestream->type)}}" style="text-decoration: none;" >{{ $valuestream->value_name }}</a>
               </div>

               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">groups</span>
                  <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >{{ $organization->team_title }}</a>
               </div>
               <div class="d-flex align-items-center mr-2">
                  <span style="font-size:19px" class="material-symbols-outlined">key_visualizer</span>
                  <a  href="javascript::void(0)" style="text-decoration: none;cursor: auto;" >Epic Backlog</a>
               </div>
               @endif
            </div>
         </div>
      </div>
      <!--end::Info-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center toolbar">
         <div class="dropdown dropleft mr-2">
            <button class="button dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="javascript:void(0)" onclick="assign_epic(1);">Assign Epics</a>
               <a class="dropdown-item" href="javascript:void(0)" onclick="assign_epic(0);">Un Assign Epics</a>
               <a class="dropdown-item" href="javascript:void(0)" onclick="assign_epic('all');">All</a>
            </div>
         </div>
         <div class="d-flex align-items-center">
            <button class="button" id="backlog-assign" data-toggle="modal" style="display:none" onclick="get_epic();" data-target="#">Assign</button>
            <button class="button" onclick="addnewbacklogepic()">Add New</button>
            <button class="button" data-toggle="modal"  data-target="#create-jira-epic">Connect Jira</button>
         </div>
      </div>
      <!--end::Toolbar-->
   </div>
</div>