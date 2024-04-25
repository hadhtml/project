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
    <h6 class="title">{{ Cmf::getmodulename("level_two") }}</h6>
    <ul class="list-unstyled ps-0 expanded-navbar mb-0">

        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$Unit->slug.'/Value-Streams')}}" class="btn  align-items-center rounded"  aria-expanded="true">
                <div class="d-flex flex-row align-items-center">
                    <div class="mr-2">
                        <span class="material-symbols-outlined"> arrow_back </span>                                </div>
                    <div>
                        {{ Cmf::getmodulename("level_two") }}
                    </div>
                </div>
            </a>

       
        </li>
    </ul>
    <ul class="list-unstyled ps-0 expanded-navbar mb-0">

        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else   @endif class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                </div>
                <div class="mr-2">
                    Dashboard
                </div>
            </a>
        </li>
   
        {{-- <li class="mb-1">
            <button class="btn  align-items-center rounded" data-toggle="collapse" data-target="#home-collapse" aria-expanded="true">
                <div class="d-flex flex-row align-items-center">
                    <div class="mr-2">
                        <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                    </div>
                    <div>
                        {{ Cmf::getmodulename("level_two") }}
                    </div>
                </div>
            </button>

          
        </li> --}}
    </ul>

    <ul class="list-unstyled ps-0 expanded-navbar-options">
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
        @if($info == 'OKR Planner')
        <li class="mb-1">
            <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
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
        @if($info == ' OKR Mapper')
        <li class="mb-1">
            <a href="{{url('dashboard/mapper/'.$organization->slug.'/stream')}}" @if (url()->current() == url('dashboard/mapper/'.$organization->slug.'/stream')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
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

        @if($per)
        @foreach(explode(',',$per->module) as $info) 
        @if($info == 'Epic Backlog')
       
        <li class="mb-1">
            <a href="{{url('dashboard/epicbacklog/'.$organization->slug.'/stream')}}" @if (url()->current() == url('dashboard/epicbacklog/'.$organization->slug.'/VS')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
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
    

        
 

        {{-- <li class="mb-1">
            <a href="{{url('dashboard/linking/'.$organization->slug.'/'.$organization->type)}}" @if (url()->current() == url('dashboard/linking/'.$organization->slug.'/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                     <span style="font-size:22px" class="material-symbols-outlined">map</span>
                </div>
                <div class="mr-2">
                    OKR Mapper
                </div>
            </a>
        </li> --}}

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
            <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/stream')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/stream')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">warning_off</span>
                </div>
                <div class="mr-2">
                    Impediments
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/stream')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/stream')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">emergency</span>
                </div>
                <div class="mr-2">
                    Risk
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/stream')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/stream')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                <div class="mr-2">
                    <span style="font-size:22px" class="material-symbols-outlined">block</span>
                </div>
                <div class="mr-2">
                    Blocker
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{url('dashboard/flags/'.$organization->slug.'/action/stream')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/stream')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
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
            <a href="{{url('dashboard/organization/'.$organization->slug.'/VS-TEAMS')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
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
            <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/stream')}}" class="d-flex flex-row align-items-center">
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

    


    </ul>
</div>