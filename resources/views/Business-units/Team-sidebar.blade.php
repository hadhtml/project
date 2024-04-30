@php
if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}

if($organization->type == 'VS')
{
$team  = DB::table('value_stream')->where('id',$organization->org_id)->first();  
}

if($organization->type == 'orgT')
{
$team  = DB::table('organization')->where('id',$organization->org_id)->first();  
}

$sub = DB::table('subscriptions')->where('user_id',Auth::id())->first();
if($sub)
{
$per = DB::table('plan')->where('plan_id',$sub->stripe_price)->first();
}
@endphp
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-wrapper">
        <div id="kt_app_sidebar_wrapper" class="hover-scroll-y my-5 my-lg-2 mx-4" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_wrapper" data-kt-scroll-offset="5px">
            <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-3 mb-5">
                <div class="menu-item">
                    <a href="{{ route('organization.dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">home</span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                <h6 class="mt-3 mb-3">{{ Cmf::getmodulename('level_three') }}</h6>
                @if($organization->type == 'BU')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$team->slug.'/BU-TEAMS')}}" class="menu-link">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </span>
                        <span class="menu-title">{{ Cmf::getmodulename("level_one") }} {{ Cmf::getmodulename('level_three') }}</span>
                    </a>
                </div>
                @endif
                @if($organization->type == 'orgT')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$team->slug.'/Org-TEAMS')}}" class="menu-link">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </span>
                        <span class="menu-title">Organization {{ Cmf::getmodulename('level_three') }}</span>
                    </a>
                </div>
                @endif
                @if($organization->type == 'VS')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$team->slug.'/VS-TEAMS')}}" class="menu-link">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </span>
                        <span class="menu-title">{{ Cmf::getmodulename("level_two") }} {{ Cmf::getmodulename('level_three') }}</span>
                    </a>
                </div>
                @endif

                @if($organization->type == 'BU')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/BU')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/dashboard/BU')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">group</span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'OKR Planner')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/BU')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/BU')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">folder_supervised</span>
                        </span>
                        <span class="menu-title">OKR Planner</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endif
                @if($organization->type == 'org')

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'OKR Planner')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/org')}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/org')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">folder_supervised</span>
                        </span>
                        <span class="menu-title">OKR Planner</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endif
                @if($organization->type == 'VS')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/VS')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/dashboard/VS')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">group</span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'OKR Planner')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/VS')}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/VS')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">folder_supervised</span>
                        </span>
                        <span class="menu-title">OKR Planner</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endif

                @if($organization->type == 'orgT')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/orgT')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/dashboard/orgT')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">group</span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'OKR Planner')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/orgT')}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/portfolio/orgT')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">folder_supervised</span>
                        </span>
                        <span class="menu-title">OKR Planner</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif


                @endif


                @if($organization->type == 'BU')

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Epic Backlog')
                <div class="menu-item">
                    <a href="{{ url('dashboard/epicbacklog/' . $organization->slug . '/BU') }}"   class="menu-link @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/BU')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">key_visualizer</span>
                        </span>
                        <span class="menu-title">Epic Backlog</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif
                @endif
                @if($organization->type == 'VS')
                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Epic Backlog')
                <div class="menu-item">
                    <a href="{{ url('dashboard/epicbacklog/' . $organization->slug . '/VS') }}" class="menu-link @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/VS')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">key_visualizer</span>
                        </span>
                        <span class="menu-title">Epic Backlog</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif
                @endif
                @if($organization->type == 'orgT')
                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Epic Backlog')
                <div class="menu-item">
                    <a href="{{url('dashboard/epicbacklog/' . $organization->slug . '/orgT')}}"  class="menu-link @if (url()->current() == url('dashboard/epicbacklog/' . $organization->slug . '/orgT')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">key_visualizer</span>
                        </span>
                        <span class="menu-title">Epic Backlog</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif
                @endif
                @if($organization->type == 'BU')
                {{-- <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">team_dashboard</span>
                        </span>
                        <span class="menu-title">Performance Dash.</span>
                    </a>
                </div> --}}
                @endif
                @if($organization->type == 'VS')
                {{-- <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">team_dashboard</span>
                        </span>
                        <span class="menu-title">Performance Dash.</span>
                    </a>
                </div> --}}
                @endif
                @if($organization->type == 'orgT')
                {{-- <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">team_dashboard</span>
                        </span>
                        <span class="menu-title">Performance Dash.</span>
                    </a>
                </div> --}}
                @endif
                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Reports')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)}}"  class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-Report/'.$organization->type)) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">summarize</span>
                        </span>
                        <span class="menu-title">Reports</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @if($organization->type == 'VS')

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Flag')
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/VS')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/VS')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">warning_off</span>
                        </span>
                        <span class="menu-title">Impediments</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/VS')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/VS')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">emergency</span>
                        </span>
                        <span class="menu-title">Risk</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/VS')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/VS')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">block</span>
                        </span>
                        <span class="menu-title">Blocker</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/action/VS')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/VS')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">call_to_action</span>
                        </span>
                        <span class="menu-title">Action</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Map')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/VS')}}" class="menu-link">
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
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/kpi/VS')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">team_dashboard</span>
                        </span>
                        <span class="menu-title">KPI</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endif
                @if($organization->type == 'BU')

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Flag')
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/BU')}}"  class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/BU')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">warning_off</span>
                        </span>
                        <span class="menu-title">Impediments</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/BU')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/BU')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">emergency</span>
                        </span>
                        <span class="menu-title">Risk</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/BU')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/BU')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">block</span>
                        </span>
                        <span class="menu-title">Blocker</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/action/BU')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/BU')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">call_to_action</span>
                        </span>
                        <span class="menu-title">Action</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Map')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/BU')}}" class="menu-link">
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
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/kpi/BU')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active  @endif ">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">team_dashboard</span>
                        </span>
                        <span class="menu-title">KPI</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endif

                @if($organization->type == 'orgT')

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Flag')
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/orgT')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/orgT')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">warning_off</span>
                        </span>
                        <span class="menu-title">Impediments</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/risk/orgT')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/risk/orgT')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">emergency</span>
                        </span>
                        <span class="menu-title">Risk</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/blocker/orgT')}}"  class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/blocker/orgT')) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">block</span>
                        </span>
                        <span class="menu-title">Blocker</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="{{url('dashboard/flags/'.$organization->slug.'/action/orgT')}}" class="menu-link @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/action/orgT')) active  @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">call_to_action</span>
                        </span>
                        <span class="menu-title">Action</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @if($per)
                @foreach(explode(',',$per->module) as $info) 
                @if($info == 'Map')
                <div class="menu-item">
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/leaderline/orgT')}}" class="menu-link">
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
                    <a href="{{url('dashboard/organization/'.$organization->slug.'/kpi/orgT')}}" class="menu-link @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) active @endif">
                        <span class="menu-icon">
                            <span class="material-symbols-outlined">team_dashboard</span>
                        </span>
                        <span class="menu-title">KPI</span>
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endif
            </div>
        </div>
    </div>
</div>