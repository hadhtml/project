
 <div class="subheader subheader-solid breadcrums" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
                            <!--begin::Page Title-->
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                Value Stream
                            </h5>
                            <div class="d-flex flex-row page-sub-titles">
                                <div class="mr-2">
                                    @if($organization->type == 'stream')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    @endif
                               
                                </div>
                                
                         
                                <div class="mr-2">
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                                </div>
                                <div class="mr-2">
                                    @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS'))
                                    <p>
                                        Teams

                                    </p>
                                    @else
                                    <p>
                                        Value Stream

                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end::Info-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center toolbar">
                            <div class="mr-3">
                                <!--<a href="#" class="btn btn-default">-->
                                <!--    OKRs</a>-->
                            </div>
                            <div>
                                @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS'))
                                <button class="button" type="button" data-toggle="modal" data-target="#add-team-stream">
                                    Add New
                                </button>
                                @endif
                            </div>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>
