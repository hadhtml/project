<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <a style="background-color: white;margin-top: 15px;border-radius: 5px;width: 100px;margin: auto;margin-top: 10px;" href="http://localhost/agileprolific/admin/dashboard">
            <img style=" padding: 5px; width: 100%; " alt="Logo" src="{{ url('public/assets/images/icons/icon%20with%20text%20PNG%20color.png') }}">
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{url('admin/dashboard')}}" class="menu-link">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="menu-section">
                    <h4 class="menu-text">MENU</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="material-symbols-outlined">people</span>
                        <span class="menu-text">Manage Users</span><i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">Manage Users</span></span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/users/allusers') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">All Users</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/users/cloneuser') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Clone User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="material-symbols-outlined">subscriptions</span>
                        <span class="menu-text">Subscriptions Plan</span><i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/addplanmodule') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Add Plan</span>
                                </a>
                            </li>

                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/user-plan') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">All User Plan</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <!-- <li class="menu-section">
                    <h4 class="menu-text">COMPANY</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li> -->


                
                <!-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="material-symbols-outlined">settings</span>
                        <span class="menu-text">Settings</span><i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link"><span class="menu-text">Settings</span></span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/website/settings') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Appearance</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/website/emailsettings') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Email Settings</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/website/userpanelsettings') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">User
                                        Panel & Buy Now</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/website/clearcache') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Clear Cache</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ url('admin/website/server-info') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Server</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="menu-section">
                    <h4 class="menu-text">Profile</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ url('admin/profile') }}" class="menu-link menu-toggle">
                        <span class="material-symbols-outlined">person</span>
                        <span class="menu-text">My Profile</span>
                    </a>
                </li>
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        href="{{ route('admin.logout') }}" class="menu-link menu-toggle">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="menu-text">Logout</span>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->