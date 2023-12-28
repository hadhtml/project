   <div class="subheader subheader-solid breadcrums" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
                            <!--begin::Page Title-->
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                Settings
                            </h5>
                            <!-- Breadcrum Items -->
                           <div class="d-flex flex-row page-sub-titles">
                                <div class="mr-2">
                                    <p>Dashboard</p>
                                </div>
                               
                                
                               
                                <div class="mr-2">
                                    <p>Jira</p>
                                </div>
                            </div>
                            <!--End Breadcrum Items -->
                        </div>
                        <!--end::Info-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center toolbar">
                            <div>
                        
                                <a href="{{url('dashboard/organization/users')}}"  class="button mr-2" style="text-decoration: none;"    data-toggle="tooltip" data-placement="right" data-original-title="Users">
                                Users
                                </a>
                          

                                <button class="button" type="button" data-toggle="modal" data-target="#create-jira">
                                    Connect Jira
                                </button>
                                <button class="button" type="button" data-toggle="modal" data-target="#create-financial">
                                    Financial Year Setting
                                </button>
                            </div>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>