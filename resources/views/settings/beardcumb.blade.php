<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            @if(url()->current() == route('settings.jirasettings')) 
            <span class="material-symbols-outlined">manufacturing</span>
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                Jira Settings
                </h1>
            @endif
            @if(url()->current() == route('settings.financial')) 
            <span class="material-symbols-outlined">payments</span>
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                Financial Year Settings
                </h1>
            @endif 
            @if(url()->current() == route('settings.asignmodule')) 
            <span class="material-symbols-outlined">foundation</span>
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                Asign Names
                </h1>
            @endif
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            <li class="breadcrumb-item text-muted">
                <a href="{{url('organization/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">
                @if(url()->current() == route('settings.jirasettings')) 
                Jira Settings
                @endif
                @if(url()->current() == route('settings.financial')) 
                Financial Year Settings
                @endif
                @if(url()->current() == route('settings.asignmodule')) 
                Asign Names
                @endif
            </li>
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        @if(url()->current() == url('settings/jira')) 
        <a href="javascript:void(0)" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-toggle="modal" data-target="#create-jira">Connect Jira</a>
        @endif
    </div>
</div>