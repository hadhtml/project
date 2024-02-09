@php
if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}

if($organization->type == 'stream')
{
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
}

if($organization->type == 'VS')
{
$team  = DB::table('value_stream')->where('id',$organization->org_id)->first();
$Unit  = DB::table('business_units')->where('id',$team->unit_id)->first();    
}

if($organization->type == 'orgT')
{
$team  = DB::table('organization')->where('id',$organization->org_id)->first();  
}

@endphp

                
                <div class="subheader subheader-solid breadcrums" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
                            <!--begin::Page Title-->
                           
                        @if (url()->current() == url('Okr-report/'.$Sid.'/'.$organization->type))
                     
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    OKR Epics
                                </h5>
                            </div>
                        </div>
                        @elseif(url()->current() == url('Okr-report-3/'.$Sid.'/'.$organization->type))
                  
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    OKR Figures
                                </h5>
                            </div>
                        </div>                                          
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-all/'.$Sid.'/'.$organization->type))
                      
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Epics Completed
                                </h5>
                            </div>
                        </div>  
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-NC/'.$Sid.'/'.$organization->type))
                     
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Epics Not Completed
                                </h5>
                            </div>
                        </div> 
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-remove/'.$Sid.'/'.$organization->type))
                     
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Epics Removed
                                </h5>
                            </div>
                        </div> 
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-allepic/'.$Sid.'/'.$organization->type))
                       
                        
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    All Epics
                                </h5>
                            </div>
                        </div>     
                        @else
                        <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Report
                                </h5>
                            </div>
                        </div>
                        @endif
                       
                        <div class="d-flex flex-row page-sub-titles align-items-center">

                            @if($organization->type == 'unit')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    </div>
                                </div>
                               @endif
           
                               @if($organization->type == 'stream')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    </div>
                                </div>
                               @endif
                               @if($organization->type == 'BU')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    </div>
                                </div>
                               @endif
                               @if($organization->type == 'VS')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    </div>
                                </div>
                               @endif
                               @if($organization->type == 'org')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organizations')}}" style="text-decoration: none;" >Dashboard</a>
                                    </div>
                                </div>
                               @endif
                               @if($organization->type == 'orgT')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">home</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    </div>
                                </div>
                               @endif

                           @if($organization->type == 'VS')
                           <div class="mr-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" style="text-decoration: none;" >{{$Unit->business_name}}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
            
                            @if($organization->type == 'VS')
                            <div class="mr-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">layers</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->value_name}}</a>
                                    </div>
                                </div>
                         
                            </div>
                            @endif
                     
                            <div class="mr-2">
                                @if($organization->type == 'stream')
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="mr-2">
                                @if($organization->type == 'BU')
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                                        
                            <div class="mr-2">
                               @if($organization->type == 'stream')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">layers</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                                    </div>
                                </div>
                               @endif
                               
                                @if($organization->type == 'unit')
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                                    </div>
                                </div>
                               @endif

                               @if($organization->type == 'BU')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">groups</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                    </div>
                                </div>
                               @endif
                               @if($organization->type == 'VS')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">groups</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                    </div>
                                </div>
                               @endif
                               @if($organization->type == 'orgT')
                               <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:17px" class="material-symbols-outlined">home</span>
                                    </div>
                                    <div>
                                        <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                    </div>
                                </div>
                               @endif
                               {{-- @if($organization->type == 'org')
                               <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->organization_name}}</a>
                               @endif --}}
                           </div>
                           <div class="mr-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <span style="font-size:17px" class="material-symbols-outlined">Summarize</span>
                                </div>
                                <div>
                                    <p>Reports</p>
                                </div>
                            </div>
                          
                           </div>
                           
                           @if (url()->current() == url('Okr-report/'.$Sid.'/'.$organization->type))
                           <div class="mr-2">
                            <div class="d-flex flex-row">
                                <div>
                                    <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                                </div>
                                <div>
                                    <p>OKR Epics</p>
                                </div>
                            </div>
                        
                        </div>                                         
                        @endif

                        @if (url()->current() == url('dashboard/organization/Okr-report-all/'.$Sid.'/'.$organization->type))
                        <div class="mr-2">
                         <div class="d-flex flex-row">
                            <div>
                                <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                            </div>
                            <div>
                                <p>Epics Completed</p>
                            </div>
                        </div>
                     </div>                                         
                     @endif

                     @if (url()->current() == url('Okr-report-3/'.$Sid.'/'.$organization->type))
                     <div class="mr-2">
                      <div class="d-flex flex-row">
                        <div>
                            <span style="font-size:22px" class="material-symbols-outlined">Summarize</span>
                        </div>
                        <div>
                            <p>OKR Figures</p>
                        </div>
                    </div>
                  </div>                                         
                  @endif

               </div>
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center toolbar">
                {{-- <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#create-objective">Export Report</button>
                </div> --}}
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
