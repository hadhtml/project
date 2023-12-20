            <!-- @php
            $organization = DB::table('organization')->where('user_id',Auth::id())->where('trash',NULL)->limit(2)->get();    
            @endphp  
            <div class="flex-shrink-0 p-3 bg-white sub-nav" id="panel" style="width: 280px; margin-top: 5%;">
                <button id="closeBtn" class="close-button">
                    <img src="{{asset('public/assets/images/icons/collaps.svg')}}">
                </button>
                <h6 class="title">Menu</h6>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <a href="{{url('/dashboard/organizations')}}" style="text-decoration: none;" class="" >
                        <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                         All Organizations   
                        </button>
                        </a>
                        <div class="collapse show" id="home-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-3 py-2 nav-root-item">
                                @if(count($organization) > 0)
                                @foreach($organization as $org_nav)
                                <li class="py-2"><a href="#" class="link-dark rounded">{{$org_nav->organization_name}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
            </div> -->


            <div class="flex-shrink-0 p-3 bg-white sub-nav open" id="panel">
                <button id="closeBtn" class="close-button">
                    <img src="https://dev.agileprolific.com/public/assets/images/icons/collaps.svg">
                </button>
                <h6 class="title">Organization</h6>
                @if (url()->current() == url('dashboard/organization/all-organization'))
                <ul class="list-unstyled ps-0 expanded-navbar mb-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#home-collapse1" aria-expanded="true">
                            <div class="d-flex flex-row align-items-center">
                                <div class="mr-2">
                                    <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                                </div>
                                <div>
                                    Organization
                                </div>
                            </div>
                        </button>

                        @php
                        $Stream = DB::table('organization')->where('user_id',Auth::id())->get();
                        @endphp  

                        <div class="collapse" id="home-collapse1" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-1 py-2 nav-root-item">
                                @if(count($Stream) > 0)
                                @foreach($Stream as $value)
                                    <li><a href="{{url('dashboard/organization/'.$value->slug.'/portfolio/'.$value->type)}}" class="link-dark rounded">{{$value->organization_name}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
                @endif

                @if (url()->current() == url('dashboard/organization/Business-Units'))
                <ul class="list-unstyled ps-0 expanded-navbar mb-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#home-collapse" aria-expanded="true">
                            <div class="d-flex flex-row align-items-center">
                                <div class="mr-2">
                                    <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                                </div>
                                <div>
                                    Business Units
                                </div>
                            </div>
                        </button>

                        @php
                        $Stream = DB::table('business_units')->where('user_id',Auth::id())->get();
                        @endphp  

                        <div class="collapse" id="home-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-1 py-2 nav-root-item">
                                @if(count($Stream) > 0)
                                @foreach($Stream as $value)
                                    <li><a href="{{url('dashboard/organization/'.$value->slug.'/portfolio/'.$value->type)}}" class="link-dark rounded">{{$value->business_name}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
                @endif

                <ul class="list-unstyled ps-0 expanded-navbar-options">
                    @if (url()->current() == url('dashboard/organization/Business-Units'))
                    <li class="mb-1">
                        <a href="{{url('dashboard/organization/Bu/dashboard')}}" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                            </div>
                            <div class="mr-2">
                               Dashboard
                            </div>
                        </a>
                    </li>
                    @endif
                    <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                <span style="font-size:22px" class="material-symbols-outlined">team_dashboard</span>
                            </div>
                            <div class="mr-2">
                                Performance Dash.
                            </div>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">map</span>
                            </div>
                            <div class="mr-2">
                                OKR Mapper
                            </div>
                        </a>
                    </li>
                    <!-- Portfolio -->
                    <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">folder_supervised</span>
                            </div>
                            <div class="mr-2">
                                OKR Planner
                            </div>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">key_visualizer</span>
                            </div>
                            <div class="mr-2">
                                Epic Backlog
                            </div>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                <span style="font-size:22px" class="material-symbols-outlined">warning_off</span>
                            </div>
                            <div class="mr-2">
                                Impediments
                            </div>
                            <!-- <div>
                                <span class="badge btn-circle-xs badge-warning text-sm">2</span>
                            </div> -->
                        </a>
                    </li>

                    <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                            </div>
                            <div class="mr-2">
                                Teams
                            </div>
                        </a>
                    </li>

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