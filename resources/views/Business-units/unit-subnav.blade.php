@php
$per = DB::table('user_plan')->where('user_id',Auth::id())
       ->leftJoin('plan', 'user_plan.plan_id', '=', 'plan.id')->where('user_plan.package_status',1)->select('plan.*')->first();

@endphp
<div class="flex-shrink-0 p-3 bg-white sub-nav open" id="panel">
   
        <h6 class="title">{{ Cmf::getmodulename("level_one") }}</h6>
        <ul class="list-unstyled ps-0 expanded-navbar mb-0">
            
            <li class="mb-1">
                <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}" class="btn  align-items-center rounded"  aria-expanded="true">
                    <div class="d-flex flex-row align-items-center">
                        <div class="mr-2">
                            <span class="material-symbols-outlined"> arrow_back </span>
                        </div>
                        <div>
                            {{ Cmf::getmodulename("level_one") }}
                        </div>
                    </div>
                </a>

           
            </li>
        </ul>

        <ul class="list-unstyled ps-0 expanded-navbar-options">
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

            
       

          
            <li class="mb-1">
                <a href="{{url('dashboard/organization/'.$organization->slug.'/Value-Streams')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/Value-Streams')) class="d-flex flex-row align-items-center nav-active" @else   @endif  class="d-flex flex-row align-items-center">
                    <div class="mr-2">
                        <span style="font-size:22px" class="material-symbols-outlined">layers</span>
                    </div>
                    <div class="mr-2">
                        {{ Cmf::getmodulename("level_two") }}
                    </div>
                </a>
            </li>

            @if($per)
            @foreach(explode(',',$per->module) as $info) 
            @if($info == 'OKR Mapper')
            <li class="mb-1">
                <a href="{{url('dashboard/mapper/'.$organization->slug.'/unit')}}" @if (url()->current() == url('dashboard/mapper/'.$organization->slug.'/unit')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
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
                <a href="{{ url('dashboard/epicbacklog/' . $organization->slug . '/unit') }}" @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/unit')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
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
            @if($info == 'Reports')
          
            <li class="mb-1">
                <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif   >
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
                <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/unit')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/unit')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                    <div class="mr-2">
                        <span style="font-size:22px" class="material-symbols-outlined">warning_off</span>
                    </div>
                    <div class="mr-2">
                        Impediments
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/unit')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/unit')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                    <div class="mr-2">
                        <span style="font-size:22px" class="material-symbols-outlined">emergency</span>
                    </div>
                    <div class="mr-2">
                        Risk
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/unit')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/unit')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                    <div class="mr-2">
                        <span style="font-size:22px" class="material-symbols-outlined">block</span>
                    </div>
                    <div class="mr-2">
                        Blocker
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{url('dashboard/flags/'.$organization->slug.'/action/unit')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/unit')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
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
                <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-TEAMS')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-TEAMS')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
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
                <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/unit')}}" class="d-flex flex-row align-items-center">
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
                </a>
            </li> -->
        </ul>
    </div>