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
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            <span class="material-symbols-outlined">key_visualizer</span>
             <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
             Epic Backlog
             </h1>
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">


            @if($organization->type == 'org')
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Epic Backlog</li>
            @endif
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">auto_stories</span>
                 <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
             <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">domain</span>
                 <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">{{ $organization->business_name }}</a>
            </li>            
             <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Epic Backlog</li>
            @endif

            @if($organization->type == 'stream')
            @php
               $businesunit = DB::table('business_units')->where('id' , $organization->unit_id)->first();
            @endphp
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">auto_stories</span>
                 <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">domain</span>
                 <a href="{{url('dashboard/organization/'.$businesunit->slug.'/dashboard/'.$businesunit->type)}}" class="text-muted text-hover-primary">{{ $businesunit->business_name }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">layers</span>
                 <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">{{ $organization->value_name }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Epic Backlog</li>
            @endif
            @if($organization->type == 'orgT')
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">auto_stories</span>
                 <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">groups</span>
                 <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">{{ $organization->team_title }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Epic Backlog</li>
            @endif

            @if($organization->type == 'BU')
            @php
               $businesunit = DB::table('business_units')->where('id' , $organization->org_id)->first();
             
            @endphp
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">auto_stories</span>
                 <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">domain</span>
                 <a href="{{url('dashboard/organization/'.$businesunit->slug.'/dashboard/'.$businesunit->type)}}" class="text-muted text-hover-primary">{{ $businesunit->business_name }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">groups</span>
                 <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">{{ $organization->team_title }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Epic Backlog</li>
            @endif


            @if($organization->type == 'VS')
            @php
               $valuestream = DB::table('value_stream')->where('id' , $organization->org_id)->first();
               $businesunit = DB::table('business_units')->where('id' , $valuestream->unit_id)->first();
            @endphp
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">auto_stories</span>
                 <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">domain</span>
                 <a href="{{url('dashboard/organization/'.$businesunit->slug.'/dashboard/'.$businesunit->type)}}" class="text-muted text-hover-primary">{{ $businesunit->business_name }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">layers</span>
                 <a href="{{url('dashboard/organization/'.$valuestream->slug.'/dashboard/'.$valuestream->type)}}" class="text-muted text-hover-primary">{{ $valuestream->value_name }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                 <span class="material-symbols-outlined">groups</span>
                 <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">{{ $organization->team_title }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Epic Backlog</li>
            @endif
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-toggle="modal"  data-target="#create-jira-epic">Connect Jira</a>

        <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" id="backlog-assign" onclick="get_epic();" style="display:none" data-toggle="modal"  data-target="#">Assign Backlog</a>

        <a href="javascript:void(0)" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" onclick="addnewbacklogepic()">Add New</a>

         <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Filter 
         <i class="ki-outline ki-down fs-2 me-0"></i></a>
         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
            <div class="menu-item px-5">
               <a class="menu-link px-5" href="javascript:void(0)" onclick="assign_epic(1);">Assign Epics</a>
            </div>
            <div class="menu-item px-5">
               <a class="menu-link px-5" href="javascript:void(0)" onclick="assign_epic(0);">Un Assign Epics</a>
            </div>
            <div class="menu-item px-5">
               <a class="menu-link px-5" href="javascript:void(0)" onclick="assign_epic('all');">All</a>
            </div>
         </div>
    </div>
</div>
