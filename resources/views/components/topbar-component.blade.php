<div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
    <div class="d-flex flex-stack flex-grow-1">
        <div class="app-header-logo d-flex align-items-center ps-lg-12" id="kt_app_header_logo">
            <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-sm btn-icon bg-body btn-color-gray-500 btn-active-color-primary w-30px h-30px ms-n2 me-4 d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                <i class="ki-outline ki-abstract-14 fs-3 mt-1"></i>
            </div>
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-outline ki-abstract-14 fs-2"></i>
            </div>

        @php
        $organization  = DB::table('organization')->where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->first();
        @endphp
            <a href="{{ url('organization/dashboard') }}" class="app-sidebar-logo">

                @if($organization->logo)
                <img src="{{asset('public/assets/images/'.$organization->logo)}}" class="h-25px theme-light-show">
                @else
                <img src="{{asset('public/assets/images/logo-placeholder-removebg-preview.png')}}" class="h-25px theme-light-show">
                @endif
                {{-- <img alt="Logo" src="{{asset('public/assets/images/icons/logo-2.png')}}" class="h-25px theme-light-show" /> --}}
                <img alt="Logo" src="{{asset('public/assets/images/icons/logo-2.png')}}" class="h-25px theme-dark-show" />
                
            </a>
        </div>
        <div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
            <div class="app-navbar-item ms-2 ms-lg-6" id="kt_header_user_menu_toggle">
                <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-lg-45px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                    @if(auth()->user()->image)
                    <img src="{{asset('public/assets/images/'.auth()->user()->image)}}">
                    @else
                    <img src="{{ Avatar::create(auth()->user()->name.' '.auth()->user()->last_name)->toBase64() }}">
                    @endif
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="symbol symbol-50px me-5">
                                @if(auth()->user()->image)
                                <img src="{{asset('public/assets/images/'.auth()->user()->image)}}">
                                @else
                                <img src="{{ Avatar::create(auth()->user()->name.' '.auth()->user()->last_name)->toBase64() }}">
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }} {{ auth()->user()->last_name }}
                                <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"></span></div>
                                <a href="javascript:void(0)" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="separator my-2"></div>
                    <div class="menu-item px-5">
                        <a href="{{ route('settings.myprofile') }}" class="menu-link px-5">My Profile</a>
                    </div>
                    <div class="menu-item px-5">
                        <a href="{{route('settings.security')}}" class="menu-link px-5">Security</a>
                    </div>
                    {{-- <div class="menu-item px-5 my-1">
                        <a href="{{ route('settings.jirasettings') }}" class="menu-link px-5">Account Settings</a>
                    </div> --}}
                    <div class="separator my-2"></div>
                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                        <a href="javascript:void(0)" class="menu-link px-5">
                            <span class="menu-title position-relative">Mode 
                            <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                            </span></span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                            <div class="menu-item px-3 my-0">
                                <a href="javascript:void(0)" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="ki-outline ki-night-day fs-2"></i>
                                    </span>
                                    <span class="menu-title">Light</span>
                                </a>
                            </div>
                            <div class="menu-item px-3 my-0">
                                <a href="javascript:void(0)" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="ki-outline ki-moon fs-2"></i>
                                    </span>
                                    <span class="menu-title">Dark</span>
                                </a>
                            </div>
                            <div class="menu-item px-3 my-0">
                                <a href="javascript:void(0)" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="ki-outline ki-screen fs-2"></i>
                                    </span>
                                    <span class="menu-title">System</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item px-5">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="menu-link px-5">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="app-navbar-item ms-2 ms-lg-6 me-lg-6">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                    <i class="ki-outline ki-exit-right fs-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="app-header-separator"></div>
</div>