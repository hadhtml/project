@php
$organization = DB::table('organization')->where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->where('trash',NULL)->first();    
$sub = DB::table('subscriptions')->where('user_id',Auth::id())->first();
if($sub)
{
$per = DB::table('plan')->where('plan_id',$sub->stripe_price)->first();
}

@endphp
<div class="flex-shrink-0 p-3 bg-white sub-nav open" id="panel">
    {{-- <button id="closeBtn" class="close-button">
        <img src="https://dev.agileprolific.com/public/assets/images/icons/collaps.svg">
    </button> --}}
    <h6 class="title">Organization</h6>
  


    
    <ul class="list-unstyled ps-0 expanded-navbar-options">
       
 
        <li class="mb-1">
            <a href="{{ route('organization.dashboard') }}" @if (url()->current() == url('organization/dashboard')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                </div>
                <div class="mr-2">
                   Dashboard
                </div>
            </a>
        </li>
        


        <li class="mb-1">
            <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}"  @if (url()->current() == route('organization.level-one', Cmf::getmoduleslug('level_one')))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                </div>
                <div class="mr-2">
                    {{ Cmf::getmodulename("level_one") }}
                </div>
            </a>
        </li>
        {{-- <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">team_dashboard</span>
                </div>
                <div class="mr-2">
                    Performance Dash.
                </div>
            </a>
        </li> --}}
        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'OKR Mapper')
        <li class="mb-1">
            <a href="{{ url('dashboard/mapper') }}/{{ $organization->slug }}/org" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">link</span>
                </div>
                <div class="mr-2">
                    OKR Mapper
                </div>
            </a>
        </li> 
        @endif
        @endforeach
        @endif
        <!-- Portfolio -->

        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'OKR Planner')
        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">folder_supervised</span>
                </div>
                <div class="mr-2">
                    OKR Planner
                </div>
            </a>
        </li>
        @endif
        @endforeach
        @endif

        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'Epic Backlog')
        <li class="mb-1">
            <a href="{{ url('dashboard/epicbacklog/' . $organization->slug . '/org') }}" @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/org')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">key_visualizer</span>
                </div>
                <div class="mr-2">
                    Epic Backlog
                </div>
            </a>
        </li>
        @endif
        @endforeach
        @endif

        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'Reports')
        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else   @endif  class="d-flex flex-row align-items-center" >
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                </div>
                <div class="mr-2">
                    Reports
                </div>
            </a>
        </li>
        @endif
        @endforeach
        @endif

        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'Flag')
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/org')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/org')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">warning_off</span>
                </div>
                <div class="mr-2">
                    Impediments
                </div>
             
            </a>
        </li>
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/org')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/org')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">emergency</span>
                </div>
                <div class="mr-2">
                    Risk
                </div>
             
            </a>
        </li>
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/org')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/org')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">block</span>
                </div>
                <div class="mr-2">
                    Blocker
                </div>
             
            </a>
        </li>
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/action/org')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/org')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">call_to_action</span>
                </div>
                <div class="mr-2">
                    Action
                </div>
             
            </a>
        </li>
        @endif
        @endforeach
        @endif
  
    
     
        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/Org-TEAMS')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/Org-TEAMS')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                </div>
                <div class="mr-2">
                    {{ Cmf::getmodulename('level_three') }}
                </div>
            </a>
        </li>
    


        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'Map')
        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/org')}}" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">sprint</span>
                </div>
                <div class="mr-2">
                    Dependency Map
                </div>
            </a>
        </li>
        @endif
        @endforeach
        @endif
  
   
        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'kpi')
        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/kpi/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">team_dashboard</span>
                </div>
                <div class="mr-2">
                    KPI
                </div>
            </a>
        </li>
        @endif
        @endforeach
        @endif
    

        
    
        <!-- <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">sprint</span>
                </div>
                <div class="mr-2">
                    Leadership Actions
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">dangerous</span>
                </div>
                <div class="mr-2">
                    Blockers
                </div>
                <div>
                    <span class="badge btn-circle-xs badge-warning text-sm">10+</span>
                </div>
            </a>
        </li> -->
    </ul>
</div>