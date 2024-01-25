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
                         <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            OKR Epics
                        </h5>
                        @elseif(url()->current() == url('Okr-report-3/'.$Sid.'/'.$organization->type))
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            OKR Figures
                        </h5>                                          
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-all/'.$Sid.'/'.$organization->type))
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            Epics Completed
                        </h5>
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-NC/'.$Sid.'/'.$organization->type))
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            Epics Not Completed
                        </h5>
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-remove/'.$Sid.'/'.$organization->type))
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            Epics Removed
                        </h5>
                        @elseif(url()->current() == url('dashboard/organization/Okr-report-allepic/'.$Sid.'/'.$organization->type))
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            All Epics
                        </h5>    
                        @else
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            Report
                        </h5> 
                        @endif
                       
                                                                   

                        
                                                                
                    
                            <div class="d-flex flex-row page-sub-titles">
                                <div class="mr-2">
                                   @if($organization->type == 'unit')
                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                   @endif
               
                                   @if($organization->type == 'stream')
                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                   @endif
                                   @if($organization->type == 'BU')
                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                   @endif
                                   @if($organization->type == 'VS')
                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                   @endif
                                   @if($organization->type == 'org')
                                   <a  href="{{url('dashboard/organizations')}}" style="text-decoration: none;" >Dashboard</a>
                                   @endif
                                   @if($organization->type == 'orgT')
                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                   @endif
                                  
                                   </div>

                                   @if($organization->type == 'VS')
                                   <div class="mr-2">
                                    
                                    <a  href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" style="text-decoration: none;" >{{$Unit->business_name}}</a>
                                 
                                </div>
                                @endif
                
                                @if($organization->type == 'VS')
                                <div class="mr-2">
                                
                                    <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->value_name}}</a>
                             
                                </div>
                                @endif
                         
                    <div class="mr-2">
                        @if($organization->type == 'stream')
                        <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                        @endif
                    </div>

                    <div class="mr-2">
                        @if($organization->type == 'BU')
                        <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                        @endif
                    </div>
             
                                              
                                            
                                               <div class="mr-2">
                                                   @if($organization->type == 'stream')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                                                   @endif
                                                   
                                                    @if($organization->type == 'unit')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                                                   @endif
               
                                                   @if($organization->type == 'BU')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                                   @endif
                                                   @if($organization->type == 'VS')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                                   @endif
                                                   @if($organization->type == 'orgT')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                                   @endif
                                                   {{-- @if($organization->type == 'org')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->organization_name}}</a>
                                                   @endif --}}
                                               </div>
                                               <div class="mr-2">
                                                   <p>Reports</p>
                                               </div>
                                               
                                               @if (url()->current() == url('Okr-report/'.$Sid.'/'.$organization->type))
                                               <div class="mr-2">
                                                <p>OKR Epics</p>
                                            </div>                                         
                                            @endif

                                            @if (url()->current() == url('dashboard/organization/Okr-report-all/'.$Sid.'/'.$organization->type))
                                            <div class="mr-2">
                                             <p>Epics Completed</p>
                                         </div>                                         
                                         @endif

                                         @if (url()->current() == url('Okr-report-3/'.$Sid.'/'.$organization->type))
                                         <div class="mr-2">
                                          <p>OKR Figures</p>
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
