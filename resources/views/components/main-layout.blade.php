<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <link rel="icon" type="image/x-icon" href="{{asset('public/assets/images/icons/icon.ico')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="{{ url('public/assetsvone/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('public/assetsvone/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('public/assetsvone/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

        <!-- External Links -->
        <input type="hidden" value="{{ url('') }}" id="mainurl">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/kanban.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/font/MaterialIcons-Regular.ttf">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="{{url('public/assets/Random-Pixel/dist/gixi-min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/styletwo.css') }}">
        <script src="//code.tidio.co/iuyaftwehxdry2ttyq7ozimm6gykitnw.js" async></script>
    </head>
    <body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true" class="app-default">
        <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                @include('components.topbar-component')
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">


                    @if ($var_objective == 'Backlog')
                    @include('member.navbar')
                    @endif
                    
                    @if ($var_objective == 'PageU-unit')
                    @include('Business-units.unit-sidebar')
                    
                    @endif
                    
                    @if ($var_objective == 'PageV-stream')
                    @include('member.navbar')
                    @endif

                    @if ($var_objective == 'PageT-BU')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'PageT-VS')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'PageT-org')
                    @include('components.sidebar-component')
                    @endif

                    @if ($var_objective == 'PageT-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif
                    
                    
                    
                    @if ($var_objective == 'Org')
                         
                    @include('components.sidebar-component')

                    @endif
                          
                    @if ($var_objective == 'Page-stream')
                         
                    @include('member.navbar')
                    
                    @endif

                    @if ($var_objective == 'Page-org')
                         
                    @include('components.sidebar-component')

                

                    @endif
                          
                    @if ($var_objective == 'Member')
                         
                    @include('profile.sidebar')
                    

                    @endif
                         
                    @if ($var_objective == 'Org-Contact')
                         
                    @include('components.sidebar-component')

                    @endif
                          
                    @if ($var_objective == 'Org-Unit')
                         
                    @include('components.sidebar-component')

                    @endif
                         
                    @if ($var_objective == 'V-Stream')
                
                    @include('Business-units.unit-sidebar')
                    
                    @endif
                         
                    @if ($var_objective == 'Team')
                         
                    @include('components.sidebar-component')

                    @endif
                    
                    @if ($var_objective == 'Stream-team')
                        @include('member.navbar')
                    @endif
                    
                    @if ($var_objective == 'Org-Unit-team')
                        @include('Business-units.unit-sidebar')
                    @endif

                    @if ($var_objective == 'flag-impediments-unit')
                        @include('Business-units.unit-sidebar')
                    @endif

                    @if ($var_objective == 'flag-impediments-BU')
                        @include('Business-units.Team-sidebar')
                    @endif
                    @if ($var_objective == 'flag-impediments-VS')
                        @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'flag-impediments-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif
                    
                    @if ($var_objective == 'flag-impediments-stream')
                        @include('member.navbar')
                    @endif

                    
                    @if ($var_objective == 'flag-impediments-org')
                    @include('components.sidebar-component')

                    @endif

                    
                    
                    @if ($var_objective == 'Backlog-Unit')
                    @include('Business-units.unit-sidebar')

                    @endif
                    
                    @if ($var_objective == 'Page-unit')
                    @include('Business-units.unit-sidebar')
                    @endif
                    
                    @if ($var_objective == 'Jira')
                         
                        @include('profile.sidebar')

                    @endif
                    
                    @if ($var_objective == 'Report-unit')
                         
                    @include('Business-units.unit-sidebar')

                    @endif
                    
                    @if ($var_objective == 'Report-stream')
                         
                    @include('member.navbar')

                    @endif

                    @if ($var_objective == 'TBaclog-BU')
                    @include('Business-units.Team-sidebar')
                    @endif
                    @if ($var_objective == 'TBaclog-unit')
                    @include('Business-units.unit-sidebar')
                    @endif
                    @if ($var_objective == 'TBaclog-VS')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Page-BU')
                    @include('Business-units.Team-sidebar')

                    @endif

                    @if ($var_objective == 'Page-VS')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Page-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif

                

                    @if ($var_objective == 'Report-BU')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Report-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Report-VS')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Org-team')
                    @include('components.sidebar-component')
                    @endif

                    @if ($var_objective == 'Report-org')
                    @include('components.sidebar-component')
                    @endif

                    @if ($var_objective == 'TBaclog-org')
                    @include('components.sidebar-component')
                  
                    @endif

                    @if ($var_objective == 'TBaclog-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'TBaclog-stream')
                    @include('member.navbar')
                    @endif

                    @if ($var_objective == 'Org-Unit-dashboard')
                        @include('Business-units.unit-sidebar')
                    @endif

                    @if ($var_objective == 'mapper-unit')
                        @include('Business-units.unit-sidebar')
                    @endif

                    @if ($var_objective == 'mapper-stream')
                        @include('member.navbar')
                    @endif

                    @if ($var_objective == 'mapper-org')
                        @include('components.sidebar-component')
                    @endif

                    


                    @if ($var_objective == 'V-Stream-dashboard')
                    @include('member.navbar')
                    @endif

                    @if ($var_objective == 'Unit-team-dashboard')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'security')
                  
                    @include('profile.sidebar')
                  
                    @endif

                    @if ($var_objective == 'checkout')
                  
                    @include('profile.sidebar')
                  
                    @endif

                    

                    @if ($var_objective == 'linking')     
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'linking')     
                    @include('member.navbar')
                    @endif

                    

                    @if ($var_objective == 'leaderline-unit')
                         
                    @include('Business-units.unit-sidebar')

                    @endif
                    
                    @if ($var_objective == 'leaderline-stream')
                         
                    @include('member.navbar')

                    @endif

                    @if ($var_objective == 'leaderline-BU')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'leaderline-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'leaderline-VS')
                    @include('Business-units.Team-sidebar')
                    @endif


                    @if ($var_objective == 'leaderline-org')
                    @include('components.sidebar-component')
                    @endif

                    @if ($var_objective == 'Pagekpi-unit')
                         
                    @include('Business-units.unit-sidebar')

                    @endif
                    
                    @if ($var_objective == 'Pagekpi-stream')
                         
                    @include('member.navbar')

                    @endif

                    @if ($var_objective == 'Pagekpi-BU')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Pagekpi-orgT')
                    @include('Business-units.Team-sidebar')
                    @endif

                    @if ($var_objective == 'Pagekpi-VS')
                    @include('Business-units.Team-sidebar')
                    @endif


                    @if ($var_objective == 'Pagekpi-org')
                    @include('components.sidebar-component')
                    @endif
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                                @if ($var_objective == 'Org')
                 
                                @include('components.org-breadcrum')

                                @endif
                                  
                                 @if ($var_objective == 'Page-unit')
                                 
                                 @include('components.chart-breadcrumb')
                                 @include('components.modal')

                       
                                 @endif
                                 
                                 @if ($var_objective == 'Page-stream')
                                 
                                 @include('components.chart-breadcrumb')
                                 @include('components.modal')

                       
                                 @endif

                                 @if ($var_objective == 'Page-org')
                                 
                                 @include('components.chart-breadcrumb')
                                 @include('components.modal')

                       
                                 @endif

                                 @if ($var_objective == 'Page-orgT')
                                 
                                 @include('components.chart-breadcrumb')
                                 @include('components.modal')

                       
                                 @endif
                                  
                                 @if ($var_objective == 'Member')
                                 
                                 @include('components.member-breadcrum')

                                 @endif
                                 
                                 @if ($var_objective == 'Org-Contact')
                                 
                                 @include('components.org-breadcrums.contact-breadcrum')

                                 @endif
                                  
                                 @if ($var_objective == 'Org-Unit')
                                 
                                 @include('components.org-breadcrums.unit-breadcrum')

                                 @endif

                                 @if ($var_objective == 'Org-Unit-dashboard')
                                 
                                 @include('components.org-breadcrums.unit-breadcrum')
                     
                                 @endif

                                 @if ($var_objective == 'mapper-unit')
                                    @include('components.org-breadcrums.unit-breadcrum')
                                 @endif

                                 @if ($var_objective == 'mapper-stream')
                                    @include('mapper.stream.beardcumb')
                                 @endif

                                 @if ($var_objective == 'mapper-org')
                                    @include('mapper.org.beardcumb')
                                 @endif

                                 
                                 @if ($var_objective == 'V-Stream')
                                 
                                 @include('components.org-breadcrums.value-breadcrumb')

                                 @endif
                                 
                                 @if ($var_objective == 'Team')
                                 
                                 @include('components.org-breadcrums.Team-breadcrumb')

                                 @endif
                                 
                                 @if ($var_objective == 'Backlog')
                                 
                                 @include('components.backlog-breadcrum')

                                 @endif
                                 
                                 @if ($var_objective == 'Stream-team')
                                 @include('member.stream-breadcrum')

                                 @endif
                                 
                                 @if ($var_objective == 'Org-Unit-team')
                                    @include('Business-units.unit-team-breadcrum')
                                 @endif
                                 
                                 @if ($var_objective == 'flag-impediments-unit')
                                    @include('flags.breadcrum')
                                 @endif

                                 @if ($var_objective == 'flag-impediments-VS')
                                    @include('flags.breadcrum')
                                 @endif
                                 @if ($var_objective == 'flag-impediments-BU')
                                    @include('flags.breadcrum')
                                 @endif
                                 
                                 @if ($var_objective == 'flag-impediments-stream')
                                    @include('flags.breadcrum')
                                 @endif

                                 @if ($var_objective == 'flag-impediments-orgT')
                                 @include('flags.breadcrum')
                              @endif

                                 @if ($var_objective == 'flag-impediments-org')
                                 @include('flags.breadcrum')
                                 @endif

                                 @if ($var_objective == 'Backlog-Unit')
                                 @include('Business-units.unit-backlog-breadcrum')
                                 @endif
                                 
                                @if ($var_objective == 'Jira')
                                    @include('settings.beardcumb')
                                 @endif
                                 
                                 @if ($var_objective == 'Report-unit')
                                 @include('Report.report-breadcrum')

                                 @endif
                                 
                                 @if ($var_objective == 'Report-stream')
                                 @include('Report.report-breadcrum')

                                 @endif

                                 @if ($var_objective == 'Report-BU')
                                 @include('Report.report-breadcrum')
                                 @endif

                                 @if ($var_objective == 'Report-VS')
                                 @include('Report.report-breadcrum')
                                 @endif

                                 @if ($var_objective == 'Report-orgT')
                                 @include('Report.report-breadcrum')
                                 @endif

                                 @if ($var_objective == 'Report-org')
                                 @include('Report.report-breadcrum')
                                 @endif
                                 
                                @if ($var_objective == 'PageV-stream')
                                @include('components.objective-script')
                                @include('components.breadcrumb-component')
                                @include('components.modal')
                                @endif
                                
                                @if ($var_objective == 'PageU-unit')
                                @include('components.breadcrumb-component')
                                @include('components.objective-script')
                                @include('components.modal')
                                @endif

                                @if ($var_objective == 'PageT-BU')
                                @include('components.breadcrumb-component')
                                @include('components.objective-script')
                                @include('components.modal')
                                @endif

                                @if ($var_objective == 'PageT-VS')
                                @include('components.breadcrumb-component')
                                @include('components.objective-script')
                                @include('components.modal')
                                @endif

                                @if ($var_objective == 'PageT-org')
                                @include('components.breadcrumb-component')
                                @include('components.objective-script')
                                @include('components.modal')
                                @endif

                                @if ($var_objective == 'PageT-orgT')
                                @include('components.breadcrumb-component')
                                @include('components.objective-script')
                                @include('components.modal')
                                @endif

                                @if ($var_objective == 'TBaclog-BU')
                                    @include('epicbacklog.beardcumb')
                                @endif

                                @if ($var_objective == 'TBaclog-VS')
                                    @include('epicbacklog.beardcumb')
                                @endif

                                @if ($var_objective == 'TBaclog-org')
                                    @include('epicbacklog.beardcumb')
                                @endif

                                @if ($var_objective == 'TBaclog-orgT')
                                    @include('epicbacklog.beardcumb')
                                @endif
                                @if ($var_objective == 'TBaclog-unit')
                                    @include('epicbacklog.beardcumb')
                                @endif
                                @if ($var_objective == 'TBaclog-stream')
                                    @include('epicbacklog.beardcumb')
                                @endif

                                @if ($var_objective == 'Page-BU')
                                @include('components.chart-breadcrumb')
                                @include('components.modal')    
                                @endif

                                @if ($var_objective == 'Page-VS')
                                @include('components.chart-breadcrumb')
                                @include('components.modal')    
                                @endif

                           

                                @if ($var_objective == 'Org-team')
                                @include('organizations.org-team-breadcrumb')
                                @endif

                                @if ($var_objective == 'V-Stream-dashboard')                
                                @include('member.stream-breadcrum')

                                @endif

                                @if ($var_objective == 'Unit-team-dashboard')
                                @include('Business-units.unit-team-breadcrum')

                                @endif

                                @if ($var_objective == 'security')
                                @include('profile.breadcrum')
                              
                                @endif

                                @if ($var_objective == 'checkout')
                                @include('profile.checkoutbreadcrum')
                              
                                @endif
                                

                                
                                @if ($var_objective == 'leaderline-unit')
                                 
                                @include('epics.leadeline-breadcrumb')
                    
                                @endif
                                
                                @if ($var_objective == 'leaderline-stream')
                                     
                                @include('epics.leadeline-breadcrumb')
                    
                                @endif
                    
                                @if ($var_objective == 'leaderline-BU')
                                @include('epics.leadeline-breadcrumb')
                                @endif
                    
                                @if ($var_objective == 'leaderline-orgT')
                                @include('epics.leadeline-breadcrumb')
                                @endif
                    
                                @if ($var_objective == 'leaderline-VS')
                                @include('epics.leadeline-breadcrumb')
                                @endif
                    
                    
                                @if ($var_objective == 'leaderline-org')
                                @include('epics.leadeline-breadcrumb')
                                @endif

                                @if ($var_objective == 'Pagekpi-BU')
                                @include('KPI.kpi-breadcrumb')
                                @include('KPI.modal')    
                                @endif

                                @if ($var_objective == 'Pagekpi-VS')
                                @include('KPI.kpi-breadcrumb')
                                @include('KPI.modal')  
                                @endif

                                @if ($var_objective == 'Pagekpi-orgT')
                                @include('KPI.kpi-breadcrumb')
                                @include('KPI.modal')    
                                @endif

                                @if ($var_objective == 'Pagekpi-unit')
                                @include('KPI.kpi-breadcrumb')
                                @include('KPI.modal')  
                                @endif
                                
                                @if ($var_objective == 'Pagekpi-stream')
                                @include('KPI.kpi-breadcrumb')
                                @include('KPI.modal')    
                                @endif

                                @if ($var_objective == 'Pagekpi-org')
                                @include('KPI.kpi-breadcrumb')
                                @include('KPI.modal')  
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-column-fluid">
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <div id="kt_app_content_container" class="app-container container-fluid">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                        <div id="kt_app_footer" class="app-footer">
                            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                                <div class="text-gray-900 order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                                    <a href="{{ url('') }}" target="_blank" class="text-gray-800 text-hover-primary">Out Comemet</a>
                                </div>
                                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                    <li class="menu-item">
                                        <a href="{{ url('') }}" target="_blank" class="menu-link px-2">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('') }}" target="_blank" class="menu-link px-2">Support</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>
        <script>var hostUrl = "assets/";</script>
        <script src="{{ url('public/assetsvone/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/scripts.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
        <script src="{{ url('public/assetsvone/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/widgets.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/widgets.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/users-search.js') }}"></script>


        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/create-account.js') }}"></script>

        
        <!-- <script src="{{ url('public/assetsvone/js/custom/apps/customers/list/export.js') }}"></script> -->
        <script src="{{ url('public/assetsvone/js/custom/apps/customers/list/list.js') }}"></script>
        <!-- <script src="{{ url('public/assetsvone/js/custom/apps/customers/add.js') }}"></script> -->
        <script src="{{ url('public/assetsvone/js/widgets.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/widgets.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/create-campaign.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/users-search.js') }}"></script>

        @include('components.script')

        @yield('scripts')
    </body>
</html>