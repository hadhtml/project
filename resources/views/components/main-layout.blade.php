<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- MDB -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/styletwo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/kanban.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dragula@3.7.3/dist/dragula.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    
    <!-- Summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">

    <!-- Icon family -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/font/MaterialIcons-Regular.ttf">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="{{url('public/assets/Random-Pixel/dist/gixi-min.js')}}"></script> 

    <input type="hidden" value="{{ url('') }}" id="mainurl">
    <title>Dashboard</title>
    <style type="text/css">
    </style>
</head>

<body class="bg-light-gray">

    <div class="pre-loader" id="preLoader">
        <div class="loader"></div>
    </div>
    <div class="d-flex flex-column flex-root">
        <!-- begin topbar -->
          @include('components.topbar-component')
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid body-cont">
            <!-- begin Sidebar -->

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

            @if ($var_objective == 'linking')     
            @include('Business-units.Team-sidebar')
            @endif

            @if ($var_objective == 'linking')     
            @include('member.navbar')
            @endif
            
            
            
            
            <!-- end Sidebar -->
            <div class="content d-flex flex-column flex-column-fluid">
                <!-- end breadcrums -->
                <!-- begin page Content -->
                <div class="container-fluid body-content">

                    <!-- begin breadcrums -->
                
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
                

                <div class="body-inner-content">
                    @yield('content')
                </div>
                </div>
                <!-- end page content -->
            </div>
        </div>
    </div>

    

        <!-- Preloader -->
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                // Your website content is now loaded, hide the pre-loader
                document.getElementById("preLoader").style.display = "none";
            });
        </script>
       @include('components.script')
</body>
<!-- MDB -->



<!-- Create Objective -->
<!-- Create Initiative -->

@yield('scripts')
</html>