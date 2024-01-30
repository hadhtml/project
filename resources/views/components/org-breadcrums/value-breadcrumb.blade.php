 
 <div class="subheader subheader-solid breadcrums" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
                            <!--begin::Page Title-->
                        
                            <div class="d-flex flex-row">
                                <div>
                                    <span style="font-size:22px" class="material-symbols-outlined">layers</span>
                                </div>
                                <div>
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                        Value Streams
                                    </h5>
                                </div>
                            </div>
                            <!-- Breadcrum Items -->
                            <div class="d-flex flex-row page-sub-titles">
                                <div class="mr-2">
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="mr-2">
                                    @if($organization->type == 'unit')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="mr-2">
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">layers</span>
                                        </div>
                                        <div>
                                            <p>Value Streams</p>                                       
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <!--End Breadcrum Items -->
                        </div>
                        <!--end::Info-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center toolbar">
                            <div>
                                <button class="button" type="button" data-toggle="modal" data-target="#add-business-value">
                                    Add Value Stream
                                </button>
                            </div>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>