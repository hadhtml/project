@php
$Stream = DB::table('value_stream')->where('user_id',Auth::id())->orWhere('user_id', Auth::user()->invitation_id)
->get();
$Unit = DB::table('business_units')
->where('id',$organization->unit_id)
    ->where(function($query) {
        $query->where('user_id', Auth::id())
              ->orWhere('user_id', Auth::user()->invitation_id);
    })
    ->first();

$subscription = DB::table('subscriptions')->where('user_id',Auth::id())->orderby('id','DESC')->first();
if($subscription)
{
    $per = DB::table('subscriptions')->where('user_id',Auth::id())
       ->leftJoin('plan', 'subscriptions.stripe_price', '=', 'plan.plan_id')->where('subscriptions.stripe_status','active')->select('plan.*')->first();
}else
{
    $per = DB::table('user_plan')->where('user_id',Auth::id())
       ->leftJoin('plan', 'user_plan.plan_id', '=', 'plan.plan_id')->where('user_plan.status','active')->select('plan.*')->first();
}
@endphp  
<h6 class="mt-3 mb-3">{{ Cmf::getmodulename("level_two") }}</h6>
<div class="menu-item">
    <a href="{{url('dashboard/organization/'.$Unit->slug.'/Value-Streams')}}" class="menu-link @if (url()->current() == url('organization/dashboard')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">arrow_back</span>
        </span>
        <span class="menu-title">{{ Cmf::getmodulename("level_two") }}</span>
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
@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'OKR Planner')
<div class="menu-item">
    <a href="{{ url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type) }}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)) active  @endif">
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
@if($info == ' OKR Mapper')
<div class="menu-item">
    <a href="{{ url('dashboard/mapper/'.$organization->slug.'/stream') }}" class="menu-link @if (url()->current() == url('dashboard/mapper/'.$organization->slug.'/stream')) active  @endif">
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
@if($info == 'Epic Backlog')
<div class="menu-item">
    <a href="{{ url('dashboard/epicbacklog/'.$organization->slug.'/VS') }}" class="menu-link @if (url()->current() == url('dashboard/epicbacklog/'.$organization->slug.'/VS')) active  @endif">
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
    <a href="{{ url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type) }}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)) active  @endif">
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
    <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/stream')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/stream')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">warning_off</span>
        </span>
        <span class="menu-title">Impediments</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/stream')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/stream')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">emergency</span>
        </span>
        <span class="menu-title">Risk</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/stream')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/stream')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">block</span>
        </span>
        <span class="menu-title">Blocker</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{url('dashboard/flags/'.$organization->slug.'/action/stream')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/stream')) active  @endif">
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
    <a href="{{ url('dashboard/organization/'.$organization->slug.'/VS-TEAMS') }}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">group</span>
        </span>
        <span class="menu-title">{{ Cmf::getmodulename('level_three') }}</span>
    </a>
</div>
@if($per)
@foreach(explode(',',$per->module) as $info) 
@if($info == 'Map')
<div class="menu-item">
    <a href="{{ url('dashboard/organization/'.$organization->slug.'/leaderline/stream') }}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/leaderline/stream')) active  @endif">
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