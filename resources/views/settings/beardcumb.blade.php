<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <div class="d-flex flex-row align-items-center">
                <div>
                    @if(url()->current() == route('settings.jirasettings')) 
                    <span style="font-size:22px" class="material-symbols-outlined">manufacturing</span>
                    @endif
                    @if(url()->current() == route('settings.financial')) 
                    <span style="font-size:22px" class="material-symbols-outlined">payments</span>
                    @endif 
                    @if(url()->current() == route('settings.asignmodule')) 
                    <span style="font-size:22px" class="material-symbols-outlined">foundation</span>
                    @endif                    
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold ml-2">
                        @if(url()->current() == route('settings.financial')) 
                        Financial Year Settings
                        @endif
                        @if(url()->current() == route('settings.jirasettings')) 
                        Jira Settings
                        @endif
                        @if(url()->current() == route('settings.asignmodule')) 
                        Asign Names
                        @endif
                    </h5>
                </div>
            </div>
            <!-- Breadcrum Items -->
           <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <a href="{{ route('organization.dashboard') }}">Dashboard</a>
                </div>
                <div class="mr-2">
                    <p>
                        @if(url()->current() == route('settings.jirasettings')) 
                        Jira Settings
                        @endif
                        @if(url()->current() == route('settings.financial')) 
                        Financial Year Settings
                        @endif
                        @if(url()->current() == route('settings.asignmodule')) 
                        Asign Names
                        @endif
                    </p>
                </div>
            </div>
            <!--End Breadcrum Items -->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center toolbar">
            <div>
                @if(url()->current() == url('dashboard/organization/setting')) 
                <button class="button" type="button" data-toggle="modal" data-target="#create-jira">
                    Connect Jira
                </button>
                 @endif
            </div>
        </div>
        <!--end::Toolbar-->
    </div>
</div>