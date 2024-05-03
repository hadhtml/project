@php
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
            @if($organization->type == 'unit' || $organization->type == 'stream' || $organization->type == 'orgT')
            <span  class="material-symbols-outlined">group</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ Cmf::getmodulename('level_three') }}
            </h1>
            @endif
            @if($organization->type == 'BU' || $organization->type == 'VS' )
            <span  class="material-symbols-outlined">folder_supervised</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Dashboard
            </h1>
            @endif
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'orgT')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'org')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')  
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'orgT')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                {{ Cmf::getmodulename('level_three') }}
            </li>
            @else
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </li>
            @endif
        </ul>
    </div>   
    @if($organization->type == 'unit')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <button class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" type="button" data-toggle="modal" data-target="#add-team">
            Create {{ Cmf::getmodulename('level_three') }}
        </button>
    </div>
    @endif
</div>