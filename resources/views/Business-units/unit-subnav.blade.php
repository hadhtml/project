@php
$sub = DB::table('subscriptions')->where('user_id',Auth::id())->first();
if($sub)
{
$per = DB::table('plan')->where('plan_id',$sub->stripe_price)->first();
}

@endphp
<h6 class="mt-3 mb-3">{{ Cmf::getmodulename("level_one") }}</h6>
<div class="menu-item">
    <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}" class="menu-link">
        <span class="menu-icon">
            <span class="material-symbols-outlined">arrow_back</span>
        </span>
        <span class="menu-title">{{ Cmf::getmodulename("level_one") }}</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">auto_stories</span>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$organization->slug.'/Value-Streams')}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/Value-Streams')) active  @endif ">
        <span class="menu-icon">
            <span class="material-symbols-outlined">auto_stories</span>
        </span>
        <span class="menu-title">{{ Cmf::getmodulename("level_two") }}</span>
    </a>
</div>
@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'OKR Mapper')
<div class="menu-item">
    <a href="{{url('dashboard/mapper/'.$organization->slug.'/unit')}}"   class="menu-link @if (url()->current() == url('dashboard/mapper/'.$organization->slug.'/unit')) active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">link</span>
        </span>
        <span class="menu-title">OKR Mapper</span>
    </a>
</div>
@endif
@endforeach
@endif            
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
    <a href="{{ url('dashboard/epicbacklog/' . $organization->slug . '/unit') }}" class="menu-link @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/unit')) active  @endif">
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
    <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/unit')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/unit')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">warning_off</span>
        </span>
        <span class="menu-title">Impediments</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/unit')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/unit')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">emergency</span>
        </span>
        <span class="menu-title">Risk</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/unit')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/unit')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">block</span>
        </span>
        <span class="menu-title">Blocker</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/action/unit')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/unit')) active  @endif">
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
    <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-TEAMS')}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-TEAMS')) active @endif">
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
    <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/unit')}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/leaderline/unit')) active @endif">
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
    <a href="{{url('dashboard/organization/'.$organization->slug.'/kpi/'.$organization->type)}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/kpi/'.$organization->type)) active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">team_dashboard</span>
        </span>
        <span class="menu-title">KPI</span>
    </a>
</div>
@endif
@endforeach
@endif