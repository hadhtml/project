                <div class="subheader subheader-solid breadcrums" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
                            <!--begin::Page Title-->
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                Reports
                            </h5>
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
                                                   @if($organization->type == 'org')
                                                   <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->organization_name}}</a>
                                                   @endif
                                               </div>
                                               <div class="mr-2">
                                                   <p>Reports</p>
                                               </div>

                                               {{-- <div class="mr-2">
                                                <p>OKR Epics</p>
                                            </div> --}}
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
