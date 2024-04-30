@php
$organization = DB::table('organization')->where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->where('trash',NULL)->first();    
$sub = DB::table('subscriptions')->where('user_id',Auth::id())->first();
if($sub)
{
$per = DB::table('plan')->where('plan_id',$sub->stripe_price)->first();
}

@endphp
<h6 class="mt-3 mb-3">Organization</h6>

<div class="menu-item">
    <a href="{{ route('organization.dashboard') }}" class="menu-link @if (url()->current() == url('organization/dashboard')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">auto_stories</span>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>

<div class="menu-item">
    <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}" class="menu-link @if (url()->current() == route('organization.level-one', Cmf::getmoduleslug('level_one'))) active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">domain</span>
        </span>
        <span class="menu-title">{{ Cmf::getmodulename("level_one") }}</span>
    </a>
</div>

{{-- <div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">team_dashboard</span>
        </span>
        <span class="menu-title">Performance Dash</span>
    </a>
</div> --}}


@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'OKR Mapper')
<div class="menu-item">
    <a href="{{ url('dashboard/mapper') }}/{{ $organization->slug }}/org" class="menu-link">
        <span class="menu-icon">
            <span class="material-symbols-outlined">link</span>
        </span>
        <span class="menu-title">OKR Mapper</span>
    </a>
</div>
@endif
@endforeach
@endif
<!-- Portfolio -->

@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'OKR Planner')
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">folder_supervised</span>
        </span>
        <span class="menu-title">OKR Planner</span>
    </a>
</div>
@endif
@endforeach
@endif

@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'Epic Backlog')
<div class="menu-item">
    <a href="{{ url('dashboard/epicbacklog/' . $organization->slug . '/org') }}" class="menu-link @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/org')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">key_visualizer</span>
        </span>
        <span class="menu-title">Epic Backlog</span>
    </a>
</div>
@endif
@endforeach
@endif

@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'Reports')
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">Summarize</span>
        </span>
        <span class="menu-title">Reports</span>
    </a>
</div>
@endif
@endforeach
@endif

@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'Flag')
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/org')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/org')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">warning_off</span>
        </span>
        <span class="menu-title">Impediments</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/org')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/org')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">emergency</span>
        </span>
        <span class="menu-title">Risk</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/org')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/org')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">block</span>
        </span>
        <span class="menu-title">Blocker</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/action/org')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/org')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">call_to_action</span>
        </span>
        <span class="menu-title">Action</span>
    </a>
</div>
@endif
@endforeach
@endif
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/Org-TEAMS')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/Org-TEAMS')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">groups</span>
        </span>
        <span class="menu-title">{{ Cmf::getmodulename('level_three') }}</span>
    </a>
</div>
@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'Map')
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/org')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/leaderline/org')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">sprint</span>
        </span>
        <span class="menu-title">Dependency Map</span>
    </a>
</div>
@endif
@endforeach
@endif
@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'kpi')
<div class="menu-item">
    <a href="{{ url('dashboard/organization/'.$organization->slug.'/kpi/'.$organization->type) }}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/kpi/'.$organization->type)) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">team_dashboard</span>
        </span>
        <span class="menu-title">KPI</span>
    </a>
</div>
@endif
@endforeach
@endif