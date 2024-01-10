            @php
            $Stream = DB::table('value_stream')->where('user_id',Auth::id())->get();
            $Unit = DB::table('business_units')->where('user_id',Auth::id())->where('id',$organization->unit_id)->first();

            @endphp  
            

            <div class="flex-shrink-0 p-3 bg-white sub-nav open" id="panel">
                {{-- <button id="closeBtn" class="close-button">
                    <img src="https://dev.agileprolific.com/public/assets/images/icons/collaps.svg">
                </button> --}}
                <h6 class="title">Value Streams</h6>
                <ul class="list-unstyled ps-0 expanded-navbar mb-0">
            
                    <li class="mb-1">
                        <a href="{{url('dashboard/organization/'.$Unit->slug.'/Value-Streams')}}" class="btn  align-items-center rounded"  aria-expanded="true">
                            <div class="d-flex flex-row align-items-center">
                                <div class="mr-2">
                                    <span class="material-symbols-outlined"> arrow_back </span>                                </div>
                                <div>
                                    Value Stream
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
                                    Value Streams
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

                    <li class="mb-1">
                        <a href="{{url('dashboard/organization/'.$organization->slug.'/VS-Backlog')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-Backlog')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">key_visualizer</span>
                            </div>
                            <div class="mr-2">
                                Epic Backlog
                            </div>
                        </a>
                    </li>

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
                        <a href="{{url('dashboard/flags/'.$organization->slug.'/impediments/stream')}}" @if (url()->current() == url('dashboard/flags/'.$organization->slug.'/impediments/stream')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
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
                        <a href="{{url('dashboard/organization/'.$organization->slug.'/VS-TEAMS')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif >
                            <div class="mr-2">
                                 <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                            </div>
                            <div class="mr-2">
                                Teams
                            </div>
                        </a>
                    </li>

                </ul>
            </div>