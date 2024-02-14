<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                @if(url()->current() == url('dashboard/organization/setting')) 
                Jira Settings
                @endif
                @if(url()->current() == url('dashboard/organization/financialsetting')) 
                Financial Year Settings
                @endif
            </h5>
            <!-- Breadcrum Items -->
           <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <a href="{{ route('organization.dashboard') }}">Dashboard</a>
                </div>
                <div class="mr-2">
                    <p>@if(url()->current() == url('dashboard/organization/setting')) 
                Jira Settings
                @endif
                @if(url()->current() == url('dashboard/organization/financialsetting')) 
                Financial Year Settings
                @endif</p>
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