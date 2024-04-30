@php
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
@endphp
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            <span class="material-symbols-outlined">layers</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">{{ Cmf::getmodulename("level_two") }}
            </h1>
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}"  class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}"  class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}"  class="text-muted text-hover-primary">{{$organization->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS'))
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                {{ Cmf::getmodulename('level_three') }}
            </li>
            @else
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                Dashboard
            </li>
            @endif
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS'))
        <button class="btn btn-flex btn-primary h-40px fs-7 fw-bold" type="button" data-toggle="modal" data-target="#add-team-stream">
            Add {{ Cmf::getmodulename('level_three') }}
        </button>
        @endif
    </div>
</div>