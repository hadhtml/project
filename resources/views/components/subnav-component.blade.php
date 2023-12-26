         

            @php
            $organization = DB::table('organization')->where('user_id',Auth::id())->where('trash',NULL)->first();    
            @endphp
            <div class="flex-shrink-0 p-3 bg-white sub-nav open" id="panel">
                {{-- <button id="closeBtn" class="close-button">
                    <img src="https://dev.agileprolific.com/public/assets/images/icons/collaps.svg">
                </button> --}}
                <h6 class="title">Organization</h6>
              

            
                
                <ul class="list-unstyled ps-0 expanded-navbar-options">
                   
             
                    <li class="mb-1">
                        <a href="{{url('dashboard/organizations')}}" @if (url()->current() == url('dashboard/organizations')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
                            <div class="mr-2">
                                <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                            </div>
                            <div class="mr-2">
                               Dashboard
                            </div>
                        </a>
                    </li>
                    


                    <li class="mb-1">
                        <a href="{{url('dashboard/organization/Business-Units')}}"  @if (url()->current() == url('dashboard/organization/Business-Units'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif >
                            <div class="mr-2">
                                <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                            </div>
                            <div class="mr-2">
                                Business Units
                            </div>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                            <div class="mr-2">
                                <span style="font-size:22px" class="material-symbols-outlined">team_dashboard</span>
                            </div>
                            <div class="mr-2">
                                Performance Dash.
                            </div>
                        </a>
                    </li>
                    {{-- <li class="mb-1">
                        <a href="#" class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">map</span>
                            </div>
                            <div class="mr-2">
                                OKR Mapper
                            </div>
                        </a>
                    </li> --}}
                    <!-- Portfolio -->
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
                    <li class="mb-1">
                        <a href="{{url('dashboard/organization/'.$organization->slug.'/BT-Backlog/org')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BT-Backlog/org')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">key_visualizer</span>
                            </div>
                            <div class="mr-2">
                                Epic Backlog
                            </div>
                        </a>
                    </li>
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
                        <a href="{{url('dashboard/organization/'.$organization->slug.'/Org-TEAMS')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/Org-TEAMS')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
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