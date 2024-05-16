

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('public/assetsindex/assets/css/bootstrap.min.css')}}" rel="stylesheet" />

        <link href="{{asset('public/assetsindex/assets/css/bootstrap-icons.css')}}" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/swiper-bundle.min.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/nice-select.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/jquery.fancybox.min.css')}}" />

        <link href="{{asset('public/assetsindex/assets/css/boxicons.min.css" rel="stylesheet')}}" />
        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/style.css')}}" />

        <title>OutcomeMet</title>
        <link rel="icon" href="{{asset('public/assetsindex/assets/img/logo2.png')}}" type="image/gif" sizes="20x20" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <style>
        .nav-tabs {
          border-width: 0; /* Removes the border width */
        }
      </style>
    <body id="body" class="tt-smooth-scroll tt-magic-cursor">
        <div id="magic-cursor">
            <div id="ball"></div>
        </div>

        <div class="circle-container three">
            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.03516 0.416666L7.03516 15H8.28516L8.28516 0.416666H7.03516Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.28516 1.04115C8.28516 3.98115 5.70016 6.38281 2.94349 6.38281H2.31849V5.13281H2.94349C5.03599 5.13281 7.03516 3.26448 7.03516 1.04115V0.416979H8.28516V1.04115Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.03333 1.04115C7.03333 3.98115 9.61833 6.38281 12.375 6.38281H13V5.13281H12.375C10.2817 5.13281 8.28333 3.26448 8.28333 1.04115V0.416979H7.03333V1.04115Z" />
                </g>
            </svg>
        </div>

        <div class="sidebar-area">
            <div class="sidebar-menu-top-area two">
                <div class="sidebar-menu-logo">
                    <a class="logo-light" href="index.html"><img alt="image" class="img-fluid" src="{{asset('public/assetsindex/assets/img/logo.png')}}" /></a>
                </div>
                <div class="nav-right d-flex jsutify-content-end align-items-center">
                    <div class="sidebar-menu-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0L11.1686 8.99601L18 18L9.0041 11.1605L0 18L6.83156 8.99601L0 0L9.0041 6.83156L18 0Z"></path>
                        </svg>
                    </div>
                    <a href="#" class="header-btn btn-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path
                                d="M1.82326 6.42493C4.49302 5.27479 6.44651 2.87535 6.98915 0C7.53178 2.87535 9.48527 5.27479 12.1767 6.42493C12.6977 6.64306 14 7 14 7C14 7 12.6977 7.35694 12.1767 7.57507C9.50698 8.74504 7.55349 11.1246 6.98915 14C6.44651 11.1445 4.49302 8.74504 1.82326 7.5949C1.30233 7.35694 0 7.01983 0 7.01983C0 7.01983 1.30233 6.66289 1.82326 6.42493Z"
                            />
                        </svg>
                        Get in Touch
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="sidebar-menu-wrap">
                            <ul class="main-menu">
                                <li class="active">
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">FAQ's</a>
                                </li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header class="header-area style-6">
            <div class="container-lg container-fluid d-flex flex-nowrap align-items-center justify-content-between">
                <div class="header-logo">
                    <a href="{{url('/')}}"><img alt="image" class="img-fluid" src="{{asset('public/assetsindex/assets/img/logo.png')}}" /></a>
                </div>
                <div class="main-menu">
                    <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                        <div class="mobile-logo-wrap">
                            <a href="#"><img alt="image" src="{{asset('public/assetsindex/assets/img/software-logo.svg')}}" /></a>
                        </div>
                    </div>
                    <ul class="menu-list">
                        <li class="active"><a href="#feature-section">Home</a></li>
                        <li><a href="#solution-section" id="faq">FAQ’s</a></li>
                        <li><a href="#solution-section" id="about" >About Us</a></li>
                        <li><a href="#solution-section" id="contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="nav-right d-flex jsutify-content-end align-items-center">
                    <div class="sidebar-btn">
                        <svg class="open" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M9.28585 11.4286C9.28585 11.2391 9.2106 11.0574 9.07664 10.9235C8.94269 10.7895 8.76101 10.7143 8.57157 10.7143H5.35585C4.31437 10.7145 3.31559 11.1283 2.57915 11.8647C1.84271 12.6012 1.4289 13.5999 1.42871 14.6414V14.6443C1.4289 15.6858 1.84271 16.6845 2.57915 17.421C3.31559 18.1574 4.31437 18.5712 5.35585 18.5714H5.35871C6.4002 18.5712 7.39897 18.1574 8.13541 17.421C8.87185 16.6845 9.28567 15.6858 9.28585 14.6443V11.4286ZM18.5716 5.3557C18.5714 4.31422 18.1576 3.31544 17.4211 2.579C16.6847 1.84256 15.6859 1.42875 14.6444 1.42856H14.6416C13.6001 1.42875 12.6013 1.84256 11.8649 2.579C11.1284 3.31544 10.7146 4.31422 10.7144 5.3557V8.57142C10.7144 8.76086 10.7897 8.94254 10.9236 9.07649C11.0576 9.21045 11.2393 9.2857 11.4287 9.2857H14.643C15.6849 9.2857 16.6842 8.8718 17.4209 8.13505C18.1577 7.3983 18.5716 6.39905 18.5716 5.35713V5.3557ZM18.5716 14.6414C18.5714 13.5999 18.1576 12.6012 17.4211 11.8647C16.6847 11.1283 15.6859 10.7145 14.6444 10.7143H11.4287C11.2393 10.7143 11.0576 10.7895 10.9236 10.9235C10.7897 11.0574 10.7144 11.2391 10.7144 11.4286V14.6443C10.7146 15.6858 11.1284 16.6845 11.8649 17.421C12.6013 18.1574 13.6001 18.5712 14.6416 18.5714H14.6444C15.6859 18.5712 16.6847 18.1574 17.4211 17.421C18.1576 16.6845 18.5714 15.6858 18.5716 14.6443V14.6414ZM9.28585 5.3557C9.28567 4.31422 8.87185 3.31544 8.13541 2.579C7.39897 1.84256 6.4002 1.42875 5.35871 1.42856H5.35585C4.31437 1.42875 3.31559 1.84256 2.57915 2.579C1.84271 3.31544 1.4289 4.31422 1.42871 5.3557V5.35713C1.42871 6.39905 1.84261 7.3983 2.57936 8.13505C3.31611 8.8718 4.31536 9.2857 5.35728 9.2857H8.57157C8.76101 9.2857 8.94269 9.21045 9.07664 9.07649C9.2106 8.94254 9.28585 8.76086 9.28585 8.57142V5.3557Z"
                            />
                        </svg>
                        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0L11.1686 8.99601L18 18L9.0041 11.1605L0 18L6.83156 8.99601L0 0L9.0041 6.83156L18 0Z" />
                        </svg>
                    </div>
                    @if (Auth::check())
                      <a href="{{url('organization/dashboard')}}" class="primary-btn3 btn-hover d-md-flex d-none">
                        Dashboard
                        <span></span>
                    </a>
                    @else
                    <a href="{{url('/login')}}" class="login-area d-sm-flex d-none">
                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.364 11.636C14.3837 10.6558 13.217 9.93013 11.9439 9.49085C13.3074 8.55179 14.2031 6.9802 14.2031 5.20312C14.2031 2.33413 11.869 0 9 0C6.131 0 3.79688 2.33413 3.79688 5.20312C3.79688 6.9802 4.69262 8.55179 6.05609 9.49085C4.78308 9.93013 3.61631 10.6558 2.63605 11.636C0.936176 13.3359 0 15.596 0 18H1.40625C1.40625 13.8128 4.81279 10.4062 9 10.4062C13.1872 10.4062 16.5938 13.8128 16.5938 18H18C18 15.596 17.0638 13.3359 15.364 11.636ZM9 9C6.90641 9 5.20312 7.29675 5.20312 5.20312C5.20312 3.1095 6.90641 1.40625 9 1.40625C11.0936 1.40625 12.7969 3.1095 12.7969 5.20312C12.7969 7.29675 11.0936 9 9 9Z"
                            />
                        </svg>
                        <span class="d-xl-block d-none">Login</span>
                    </a>
                    @endif
                    <a href="{{url('/register')}}" class="primary-btn3 btn-hover d-md-flex d-none">
                        Get Started
                        <span></span>
                    </a>
                </div>
            </div>
        </header>
       

        <div class="home6-banner-area">
            <div class="animate-vector">
                <svg width="636" height="205" viewBox="0 0 636 205" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="path-square" id="theMotionPath" d="M0 6H280C291.046 6 300 14.9543 300 26V106.94C300 118.009 308.991 126.973 320.06 126.94L468 126.5L636 126" stroke="url(#paint0_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="4s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="4s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath"></mpath>
                        </animateMotion>
                    </circle>
                    <path class="path-square" id="theMotionPath2" d="M0 30H280C291.046 30 300 38.9543 300 50V130.94C300 142.009 308.991 150.973 320.06 150.94L636 150" stroke="url(#paint1_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="3s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath2"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="3s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath2"></mpath>
                        </animateMotion>
                    </circle>
                    <path class="path-square" id="theMotionPath3" d="M0 54H280C291.046 54 300 62.9543 300 74V154.94C300 166.009 308.991 174.973 320.06 174.94L636 174" stroke="url(#paint2_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="4.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath3"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="4.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath3"></mpath>
                        </animateMotion>
                    </circle>
                    <path class="path-square" id="theMotionPath4" d="M0 78H280C291.046 78 300 86.9543 300 98V178.94C300 190.009 308.991 198.973 320.06 198.94L636 198" stroke="url(#paint3_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="3.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath4"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="3.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotionPath4"></mpath>
                        </animateMotion>
                    </circle>
                    <defs>
                        <linearGradient id="paint0_linear_2866_2312" x1="318" y1="6.00004" x2="659" y2="115.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_2866_2312" x1="318" y1="30" x2="659" y2="139.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_2866_2312" x1="318" y1="54" x2="659" y2="163.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint3_linear_2866_2312" x1="318" y1="78" x2="659" y2="187.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="animate-vector2">
                <svg style="transform: scaleX(-1);" width="636" height="205" viewBox="0 0 636 205" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="path-square" id="theMotion1Path" d="M0 6H280C291.046 6 300 14.9543 300 26V106.94C300 118.009 308.991 126.973 320.06 126.94L468 126.5L636 126" stroke="url(#paint01_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="4s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="4s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path"></mpath>
                        </animateMotion>
                    </circle>
                    <path class="path-square" id="theMotion1Path2" d="M0 30H280C291.046 30 300 38.9543 300 50V130.94C300 142.009 308.991 150.973 320.06 150.94L636 150" stroke="url(#paint11_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="3s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path2"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="3s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path2"></mpath>
                        </animateMotion>
                    </circle>
                    <path class="path-square" id="theMotion1Path3" d="M0 54H280C291.046 54 300 62.9543 300 74V154.94C300 166.009 308.991 174.973 320.06 174.94L636 174" stroke="url(#paint21_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="4.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path3"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="4.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path3"></mpath>
                        </animateMotion>
                    </circle>
                    <path class="path-square" id="theMotion1Path4" d="M0 78H280C291.046 78 300 86.9543 300 98V178.94C300 190.009 308.991 198.973 320.06 198.94L636 198" stroke="url(#paint31_linear_2866_2312)" stroke-width="2" />
                    <circle cx="0" cy="0" r="5" class="sm-circle">
                        <animateMotion dur="3.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path4"></mpath>
                        </animateMotion>
                    </circle>
                    <circle cx="0" cy="0" r="2.5" class="sm-circle2">
                        <animateMotion dur="3.5s" begin="0s" fill="freeze" repeatCount="indefinite" rotate>
                            <mpath xlink:href="#theMotion1Path4"></mpath>
                        </animateMotion>
                    </circle>
                    <defs>
                        <linearGradient id="paint01_linear_2866_2312" x1="318" y1="6.00004" x2="659" y2="115.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint11_linear_2866_2312" x1="318" y1="30" x2="659" y2="139.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint21_linear_2866_2312" x1="318" y1="54" x2="659" y2="163.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint31_linear_2866_2312" x1="318" y1="78" x2="659" y2="187.5" gradientUnits="userSpaceOnUse">
                            <stop offset="0" />
                            <stop offset="1" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            
            @php
            $header = DB::table('header_section')->where('section','header')->first();
            @endphp
            <div class="container-lg container-fluid">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-12">
                        <div class="banner-content-wrapper text-center text-animation">
                            <span class="sub-title">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M9.8448 0.059505C9.93044 0.109151 9.99671 0.186371 10.0328 0.27855C10.0689 0.37073 10.0726 0.472419 10.0434 0.567005L8.46755 5.6875H11.3752C11.4606 5.68747 11.5442 5.71246 11.6156 5.75939C11.687 5.80631 11.7431 5.87313 11.777 5.95157C11.8109 6.03002 11.821 6.11667 11.8062 6.20083C11.7914 6.28498 11.7523 6.36296 11.6937 6.42513L4.69367 13.8626C4.62594 13.9347 4.53581 13.9816 4.43798 13.9959C4.34014 14.0101 4.24036 13.9908 4.15491 13.941C4.06946 13.8913 4.00337 13.8141 3.96742 13.722C3.93146 13.6299 3.92776 13.5283 3.95692 13.4339L5.5328 8.3125H2.62517C2.53973 8.31254 2.45614 8.28755 2.38473 8.24062C2.31332 8.1937 2.25722 8.12688 2.22334 8.04844C2.18947 7.96999 2.17931 7.88334 2.19412 7.79918C2.20893 7.71503 2.24806 7.63705 2.30667 7.57488L9.30667 0.13738C9.37432 0.0654543 9.46431 0.0185276 9.56201 0.00423003C9.65971 -0.0100675 9.75938 0.00910494 9.8448 0.05863V0.059505Z"
                                        />
                                    </g>
                                </svg>
                                @if($header) {{$header->sub_heading}}  @endif
                            </span>
                            <h1>@if($header) {{$header->title}}  @endif</h1>
                            <p>@if($header) {{$header->sub_title}}  @endif</p>
                            <div class="banner-btn-group">
                                <a class="primary-btn4 btn-hover" href="#">Get’s Started <span></span></a>
                                <a class="primary-btn4 btn-hover two" href="https://www.youtube.com/watch?v=u31qwQUeGuM" data-fancybox="gallery">
                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8ZM6.79 5.093C6.71524 5.03977 6.62726 5.00814 6.53572 5.00159C6.44418 4.99503 6.35259 5.01379 6.27101 5.05583C6.18942 5.09786 6.12098 5.16154 6.07317 5.23988C6.02537 5.31823 6.00006 5.40822 6 5.5V10.5C6.00006 10.5918 6.02537 10.6818 6.07317 10.7601C6.12098 10.8385 6.18942 10.9021 6.27101 10.9442C6.35259 10.9862 6.44418 11.005 6.53572 10.9984C6.62726 10.9919 6.71524 10.9602 6.79 10.907L10.29 8.407C10.3548 8.36075 10.4076 8.29968 10.4441 8.22889C10.4805 8.1581 10.4996 8.07963 10.4996 8C10.4996 7.92037 10.4805 7.8419 10.4441 7.77111C10.4076 7.70031 10.3548 7.63925 10.29 7.593L6.79 5.093Z"
                                        />
                                    </svg>
                                    Watch Video <span></span>
                                </a>
                            </div>
                            <span>*30 days free trail, no credit card required.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-img-section notActiv mb-70">
            <div class="container-lg container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-img-wrap">
                            <div class="dashboard-img">
                                @if($header)
                                @if($header->image)
                                <img src="{{asset('public/images/'.$header->image)}}" alt class="light" />
                                @else
                                <img src="{{asset('public/assetsindex/assets/img/home6/dashboard.png')}}" alt class="light" />
                                @endif
                                @endif
                                
                                <img src="{{asset('public/assetsindex/assets/img/home6/dashboard-dark.png')}}" alt class="dark" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        @php
        $businessheader = DB::table('header_section')->where('section','business-header')->first();
        $business = DB::table('header_section')->where('section','business')->get();
        @endphp

        <div class="home5-service-section mb-130">
            <div class="container-lg container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <div class="section-title text-animation mb-15">
                            <h2>@if($businessheader) {{$businessheader->title}}  @endif</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mb-60">
                    <div class="col-xl-8 col-lg-10">
                        <div class="paragraph-and-btn-area">
                            <div class="text-center">
                                <p>@if($businessheader) {{$businessheader->sub_title}}  @endif</p>
                            </div>
                            <div class="vector">
                                <svg class="star" width="98" height="98" viewBox="0 0 98 98" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M87.7075 38.9709C85.1725 38.9709 82.8325 39.9446 81.0775 41.4052C80.8825 41.5999 80.6875 41.6973 80.59 41.892C78.64 43.5473 64.6 48.6104 49.0975 48.9999L49 48.9025C62.455 36.0499 77.08 31.6683 77.08 31.6683C79.42 31.4736 81.6625 30.4999 83.515 28.7473C87.415 24.8525 87.415 18.4262 83.515 14.5315C79.615 10.6367 73.18 10.6367 69.28 14.5315C67.525 16.2841 66.55 18.6209 66.355 20.9578C66.355 21.1525 66.355 21.4446 66.355 21.6394C66.16 24.1709 59.8225 37.6078 49.0975 48.9025C49.585 30.4025 56.7025 17.063 56.7025 17.063C58.2625 15.3104 59.14 12.9736 59.14 10.442C59.14 4.79462 54.5575 0.315674 49 0.315674C43.4425 0.315674 38.9575 4.79462 38.9575 10.3446C38.9575 12.8762 39.9325 15.213 41.395 16.9657C41.59 17.1604 41.6875 17.3551 41.8825 17.4525C43.54 19.3025 48.61 33.3236 48.9025 48.8051L48.805 48.9025C36.0325 35.563 31.645 20.9578 31.645 20.9578C31.45 18.6209 30.475 16.3815 28.72 14.5315C24.82 10.6367 18.385 10.6367 14.485 14.5315C10.585 18.4262 10.585 24.8525 14.485 28.7473C16.24 30.4999 18.58 31.4736 20.92 31.6683C21.115 31.6683 21.4075 31.6683 21.6025 31.6683C24.1375 31.863 37.5925 38.192 48.9025 48.9025C30.3775 48.4157 17.02 41.3078 17.02 41.3078C15.265 39.7499 12.925 38.8736 10.39 38.8736C4.735 38.9709 0.25 43.4499 0.25 48.9999C0.25 54.5499 4.735 59.0288 10.2925 59.0288C12.8275 59.0288 15.1675 58.0551 16.9225 56.5946C17.1175 56.3999 17.3125 56.3025 17.41 56.1078C19.2625 54.4525 33.3025 49.3894 48.805 49.0973C35.4475 61.7551 20.92 66.1367 20.92 66.1367C18.58 66.3315 16.3375 67.3051 14.485 69.0578C10.585 72.9525 10.585 79.3788 14.485 83.2736C18.385 87.1683 24.82 87.1683 28.72 83.2736C30.475 81.5209 31.45 79.1841 31.645 76.8473C31.645 76.6525 31.645 76.3604 31.645 76.1657C31.9375 73.6341 38.275 60.2946 48.9025 48.9999H49C49 48.9999 49 48.9999 49.0975 48.9999C48.7075 67.5973 41.4925 81.0341 41.4925 81.0341C39.9325 82.7867 39.055 85.1236 39.055 87.6552C39.055 93.2051 43.54 97.6841 49.0975 97.6841C54.655 97.6841 59.14 93.2051 59.14 87.6552C59.14 85.1236 58.165 82.7867 56.7025 81.0341C56.5075 80.8394 56.41 80.6446 56.215 80.5473C54.5575 78.5999 49.4875 64.6762 49.195 49.0973C61.9675 62.5341 66.355 77.042 66.355 77.042C66.55 79.3788 67.525 81.6183 69.28 83.4683C73.18 87.363 79.615 87.363 83.515 83.4683C87.415 79.5736 87.415 73.1473 83.515 69.2525C81.76 67.4999 79.42 66.5262 77.08 66.3315C76.885 66.3315 76.5925 66.3315 76.3975 66.3315C73.765 66.0394 60.4075 59.7104 49.195 48.9999C67.72 49.4867 81.0775 56.5946 81.0775 56.5946C82.8325 58.1525 85.1725 59.0288 87.7075 59.0288C93.265 59.0288 97.75 54.5499 97.75 48.9999C97.75 43.4499 93.265 38.9709 87.7075 38.9709ZM49.0975 48.9999C49 48.9999 49 48.9999 49.0975 48.9999V48.9999Z"
                                    />
                                </svg>
                                <svg class="star-bg" width="312" height="296" viewBox="0 0 312 296" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M156 71.9034L108.883 3.35692L111.202 86.5183L32.7166 58.6381L83.494 124.503L3.54644 148L83.494 171.497L32.7166 237.362L111.202 209.482L108.883 292.643L156 224.097L203.117 292.643L200.798 209.482L279.403 237.362L228.504 171.497L308.454 148L228.504 124.503L279.403 58.6381L200.798 86.5175L203.117 3.35692L156 71.9034ZM204.211 0L201.838 85.0875L282.274 56.5589L230.191 123.956L312 148L230.191 172.044L282.274 239.441L201.838 210.912L204.211 296L156 225.862L107.789 296L110.162 210.912L29.8511 239.441L81.8094 172.044L0 148L81.8094 123.956L29.8511 56.5589L110.162 85.0875L107.789 0L156 70.138L204.211 0Z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">

                    @if(count($business) > 0)
                    @foreach($business as $b)
                        <div class="col-xl-6 col-md-6">
                            <div class="service-card2 magnetic-item">
                                @if($b->image)
                                <img src="{{asset('public/images/'.$b->image)}}" alt="">
                                @else
                                <img src="{{asset('public/assetsindex/assets/img/mz img/image 6.png')}}" alt="">
                                @endif
                                <svg width="107" height="101" viewBox="0 0 107 101" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M174.992 42.4856L172.992 42.4526C172.997 42.1357 173 41.8182 173 41.5C173 41.1818 172.997 40.8643 172.992 40.5474L174.992 40.5144C174.997 40.8423 175 41.1708 175 41.5C175 41.8292 174.997 42.1577 174.992 42.4856ZM174.927 38.5548L172.93 38.6539C172.898 38.0191 172.856 37.387 172.804 36.7579L174.797 36.5925C174.851 37.2437 174.895 37.8979 174.927 38.5548ZM174.602 34.6395L172.616 34.8714C172.542 34.242 172.458 33.6158 172.364 32.9929L174.342 32.6946C174.439 33.3396 174.526 33.9879 174.602 34.6395ZM174.016 30.7563L172.05 31.1209C171.934 30.4982 171.809 29.8789 171.673 29.2633L173.626 28.8327C173.767 29.4702 173.897 30.1114 174.016 30.7563ZM173.171 26.9233L171.234 27.4195C171.077 26.8055 170.909 26.1955 170.732 25.5895L172.652 25.0284C172.835 25.6558 173.008 26.2875 173.171 26.9233ZM172.069 23.1538L170.17 23.7793C169.972 23.1781 169.764 22.5812 169.547 21.9888L171.424 21.2998C171.649 21.9132 171.864 22.5312 172.069 23.1538ZM170.717 19.4672L168.863 20.2188C168.625 19.6324 168.378 19.0507 168.121 18.4738L169.948 17.6605C170.214 18.2577 170.47 18.86 170.717 19.4672ZM169.12 15.8807L167.321 16.7546C167.044 16.1852 166.759 15.6208 166.464 15.0619L168.232 14.1284C168.538 14.707 168.834 15.2911 169.12 15.8807ZM167.287 12.4074L165.55 13.3992C165.237 12.8498 164.914 12.3059 164.583 11.7678L166.286 10.719C166.629 11.2759 166.962 11.8388 167.287 12.4074ZM165.228 9.06389L163.561 10.1684C163.211 9.64088 162.853 9.11931 162.487 8.6039L164.117 7.44504C164.496 7.97832 164.866 8.51801 165.228 9.06389ZM162.953 5.8637L161.362 7.07552C160.979 6.57208 160.587 6.07501 160.187 5.58449L161.738 4.32117C162.151 4.82861 162.556 5.34285 162.953 5.8637ZM160.473 2.81941C160.043 2.32576 159.605 1.83912 159.159 1.35968L157.694 2.72155C158.125 3.18507 158.549 3.65554 158.964 4.13276L160.473 2.81941ZM157.799 -0.0563736L156.379 1.35247C155.934 0.903402 155.48 0.46147 155.02 0.0268593L156.393 -1.42738C156.869 -0.977898 157.338 -0.52083 157.799 -0.0563736ZM154.944 -2.75223L153.618 -1.25419C153.145 -1.67333 152.664 -2.08498 152.176 -2.48894L153.452 -4.02915C153.956 -3.61141 154.453 -3.1857 154.944 -2.75223ZM151.92 -5.25697L150.694 -3.67624C150.194 -4.06384 149.688 -4.44359 149.175 -4.81531L150.348 -6.43488C150.879 -6.05049 151.403 -5.65779 151.92 -5.25697ZM148.74 -7.56112L147.619 -5.90443C147.095 -6.25866 146.566 -6.60472 146.03 -6.94242L147.096 -8.63449C147.65 -8.28528 148.198 -7.92742 148.74 -7.56112ZM145.418 -9.65456L144.407 -7.92888C143.861 -8.24854 143.31 -8.55971 142.753 -8.86221L143.707 -10.6197C144.283 -10.3069 144.853 -9.9851 145.418 -9.65456ZM141.967 -11.5286L141.07 -9.74115C140.505 -10.0248 139.935 -10.2997 139.359 -10.5657L140.198 -12.3812C140.793 -12.1062 141.383 -11.8219 141.967 -11.5286ZM138.402 -13.1761L137.622 -11.3344C137.041 -11.5807 136.454 -11.8179 135.863 -12.046L136.583 -13.912C137.194 -13.6761 137.801 -13.4308 138.402 -13.1761ZM134.739 -14.5892L134.08 -12.7009C133.483 -12.9091 132.882 -13.1081 132.277 -13.2977L132.874 -15.2063C133.5 -15.0103 134.122 -14.8045 134.739 -14.5892ZM130.993 -15.7624L130.457 -13.8355C129.848 -14.0047 129.235 -14.1646 128.618 -14.3148L129.092 -16.258C129.729 -16.1027 130.363 -15.9374 130.993 -15.7624ZM127.176 -16.6919L126.766 -14.7344C126.148 -14.8639 125.527 -14.9838 124.902 -15.094L125.25 -17.0636C125.895 -16.9497 126.538 -16.8257 127.176 -16.6919ZM123.309 -17.3738L123.025 -15.3941C122.4 -15.4837 121.772 -15.5637 121.141 -15.6337L121.362 -17.6215C122.014 -17.5491 122.663 -17.4665 123.309 -17.3738ZM119.408 -17.807L119.251 -15.8132C118.62 -15.863 117.987 -15.903 117.351 -15.9329L117.446 -17.9307C118.103 -17.8997 118.757 -17.8585 119.408 -17.807ZM115.486 -17.9923L115.454 -15.9925C115.137 -15.9975 114.819 -16 114.5 -16C114.181 -16 113.863 -15.9975 113.546 -15.9925L113.514 -17.9923C113.842 -17.9974 114.171 -18 114.5 -18C114.829 -18 115.158 -17.9974 115.486 -17.9923ZM111.554 -17.9307L111.649 -15.9329C111.013 -15.903 110.38 -15.863 109.749 -15.8132L109.592 -17.807C110.243 -17.8585 110.897 -17.8997 111.554 -17.9307ZM107.638 -17.6215L107.859 -15.6337C107.228 -15.5637 106.6 -15.4837 105.975 -15.3941L105.691 -17.3738C106.337 -17.4665 106.986 -17.5491 107.638 -17.6215ZM103.75 -17.0636L104.098 -15.094C103.473 -14.9838 102.852 -14.8639 102.234 -14.7344L101.824 -16.6919C102.462 -16.8257 103.105 -16.9497 103.75 -17.0636ZM99.9085 -16.258L100.382 -14.3148C99.765 -14.1646 99.1521 -14.0047 98.5432 -13.8355L98.0075 -15.7624C98.6371 -15.9374 99.2708 -16.1027 99.9085 -16.258ZM96.1256 -15.2063L96.7233 -13.2977C96.1179 -13.1081 95.5168 -12.9091 94.9201 -12.7009L94.2611 -14.5892C94.878 -14.8045 95.4996 -15.0103 96.1256 -15.2063ZM92.4173 -13.912L93.1371 -12.046C92.5458 -11.8179 91.9593 -11.5807 91.3776 -11.3344L90.5978 -13.1761C91.1993 -13.4308 91.8059 -13.6761 92.4173 -13.912ZM88.8019 -12.3812L89.6409 -10.5657C89.0653 -10.2997 88.4949 -10.0248 87.9298 -9.74115L87.0325 -11.5286C87.6169 -11.8219 88.2067 -12.1062 88.8019 -12.3812ZM85.2927 -10.6197L86.2473 -8.86221C85.6904 -8.5597 85.139 -8.24853 84.5934 -7.92888L83.5824 -9.65455C84.1467 -9.9851 84.7168 -10.3069 85.2927 -10.6197ZM81.9041 -8.63448L82.9704 -6.94242C82.4345 -6.60472 81.9045 -6.25865 81.3808 -5.90442L80.2603 -7.56111C80.8019 -7.92742 81.3499 -8.28527 81.9041 -8.63448ZM78.6518 -6.43487L79.8252 -4.8153C79.3122 -4.44359 78.8056 -4.06384 78.3055 -3.67624L77.0802 -5.25697C77.5973 -5.65779 78.1212 -6.05049 78.6518 -6.43487ZM75.5481 -4.02915L76.824 -2.48893C76.3363 -2.08497 75.8554 -1.67333 75.3816 -1.25418L74.0565 -2.75223C74.5465 -3.18569 75.0438 -3.6114 75.5481 -4.02915ZM72.6068 -1.42737L73.9798 0.0268631C73.5195 0.461473 73.0664 0.903408 72.6208 1.35247L71.2012 -0.056366C71.6621 -0.520823 72.1308 -0.97789 72.6068 -1.42737ZM69.8409 1.35968L71.3056 2.72155C70.8746 3.18507 70.4512 3.65554 70.0357 4.13277L68.5274 2.81942C68.9572 2.32577 69.3951 1.83912 69.8409 1.35968ZM67.2623 4.32118L68.8128 5.5845C68.4131 6.07502 68.0215 6.57209 67.638 7.07552L66.047 5.86371C66.4437 5.34286 66.8489 4.82862 67.2623 4.32118ZM64.8831 7.44504L66.5132 8.60391C66.1467 9.11932 65.7887 9.64088 65.4392 10.1684L63.7719 9.0639C64.1335 8.51802 64.504 7.97833 64.8831 7.44504ZM62.7144 10.719L64.4174 11.7678C64.086 12.3059 63.7633 12.8498 63.4496 13.3992L61.7128 12.4074C62.0375 11.8388 62.3715 11.2759 62.7144 10.719ZM60.7676 14.1284L62.5364 15.0619C62.2414 15.6208 61.9555 16.1852 61.6789 16.7546L59.8799 15.8807C60.1663 15.2911 60.4623 14.707 60.7676 14.1284ZM59.0517 17.6605L60.8788 18.4738C60.6221 19.0507 60.3747 19.6324 60.1368 20.2188L58.2835 19.4672C58.5297 18.86 58.7859 18.2577 59.0517 17.6605ZM57.5758 21.2998L59.4534 21.9888C59.236 22.5812 59.0282 23.1781 58.8303 23.7793L56.9306 23.1538C57.1356 22.5312 57.3507 21.9132 57.5758 21.2998ZM56.3482 25.0284L58.2679 25.5895C58.0907 26.1955 57.9235 26.8055 57.7663 27.4195L55.8288 26.9233C55.9916 26.2876 56.1648 25.6558 56.3482 25.0284ZM55.374 28.8328L57.3271 29.2634C57.1914 29.8789 57.0657 30.4982 56.9502 31.1209L54.9837 30.7563C55.1033 30.1114 55.2334 29.4702 55.374 28.8328ZM54.6579 32.6946L56.6356 32.9929C56.5416 33.6158 56.4578 34.242 56.3843 34.8714L54.3978 34.6395C54.4739 33.9879 54.5606 33.3396 54.6579 32.6946ZM54.2028 36.5925L56.196 36.7579C56.1438 37.387 56.1018 38.0191 56.0704 38.6539L54.0728 38.5549C54.1054 37.8979 54.1488 37.2437 54.2028 36.5925ZM54.0081 40.5144C54.0027 40.8423 54 41.1708 54 41.5C54 41.8292 54.0027 42.1577 54.0081 42.4856L56.0079 42.4526C56.0026 42.1357 56 41.8182 56 41.5C56 41.1818 56.0026 40.8643 56.0079 40.5474L54.0081 40.5144ZM54.0728 44.4452L56.0704 44.3461C56.1018 44.9809 56.1438 45.613 56.196 46.2421L54.2028 46.4075C54.1488 45.7563 54.1054 45.1021 54.0728 44.4452ZM54.3978 48.3605L56.3843 48.1286C56.4578 48.758 56.5416 49.3842 56.6356 50.0071L54.6579 50.3054C54.5606 49.6604 54.4739 49.0121 54.3978 48.3605ZM54.9837 52.2437L56.9502 51.8791C57.0657 52.5018 57.1914 53.1211 57.3271 53.7367L55.374 54.1673C55.2334 53.5298 55.1033 52.8886 54.9837 52.2437ZM55.8288 56.0767L57.7663 55.5805C57.9235 56.1945 58.0907 56.8045 58.2679 57.4105L56.3482 57.9716C56.1648 57.3442 55.9916 56.7125 55.8288 56.0767ZM56.9306 59.8462L58.8303 59.2207C59.0282 59.8219 59.236 60.4188 59.4534 61.0112L57.5758 61.7002C57.3507 61.0868 57.1356 60.4688 56.9306 59.8462ZM58.2835 63.5328L60.1368 62.7812C60.3747 63.3676 60.6221 63.9493 60.8788 64.5262L59.0517 65.3395C58.7859 64.7423 58.5297 64.14 58.2835 63.5328ZM59.8799 67.1193L61.6789 66.2454C61.9555 66.8148 62.2414 67.3792 62.5364 67.9381L60.7676 68.8716C60.4623 68.293 60.1663 67.7088 59.8799 67.1193ZM61.7128 70.5926L63.4496 69.6008C63.7633 70.1502 64.086 70.6941 64.4174 71.2322L62.7144 72.281C62.3715 71.7241 62.0375 71.1612 61.7128 70.5926ZM63.7719 73.9361L65.4392 72.8316C65.7887 73.3591 66.1467 73.8807 66.5132 74.3961L64.8831 75.555C64.504 75.0217 64.1335 74.482 63.7719 73.9361ZM66.047 77.1363L67.6381 75.9245C68.0215 76.4279 68.4131 76.925 68.8128 77.4155L67.2623 78.6788C66.8489 78.1714 66.4437 77.6572 66.047 77.1363ZM68.5274 80.1806L70.0357 78.8672C70.4513 79.3445 70.8746 79.8149 71.3056 80.2785L69.8409 81.6403C69.3951 81.1609 68.9572 80.6742 68.5274 80.1806ZM71.2012 83.0564L72.6208 81.6475C73.0664 82.0966 73.5195 82.5385 73.9799 82.9731L72.6068 84.4274C72.1308 83.9779 71.6622 83.5208 71.2012 83.0564ZM74.0565 85.7522L75.3816 84.2542C75.8554 84.6733 76.3363 85.085 76.824 85.4889L75.5481 87.0292C75.0438 86.6114 74.5465 86.1857 74.0565 85.7522ZM77.0803 88.257L78.3055 86.6762C78.8056 87.0638 79.3122 87.4436 79.8252 87.8153L78.6518 89.4349C78.1213 89.0505 77.5973 88.6578 77.0803 88.257ZM80.2603 90.5611L81.3808 88.9044C81.9045 89.2587 82.4345 89.6047 82.9704 89.9424L81.9041 91.6345C81.3499 91.2853 80.802 90.9274 80.2603 90.5611ZM83.5824 92.6546L84.5934 90.9289C85.1391 91.2485 85.6904 91.5597 86.2473 91.8622L85.2927 93.6197C84.7168 93.3069 84.1467 92.9851 83.5824 92.6546ZM87.0325 94.5286L87.9298 92.7411C88.4949 93.0248 89.0653 93.2997 89.6409 93.5657L88.8019 95.3812C88.2067 95.1062 87.6169 94.8219 87.0325 94.5286ZM90.5978 96.1761L91.3776 94.3344C91.9593 94.5807 92.5458 94.8179 93.1371 95.046L92.4173 96.912C91.8059 96.6761 91.1993 96.4308 90.5978 96.1761ZM94.261 97.5892L94.9201 95.7009C95.5168 95.9091 96.1179 96.1081 96.7233 96.2977L96.1256 98.2063C95.4996 98.0103 94.878 97.8045 94.261 97.5892ZM98.0075 98.7624L98.5432 96.8355C99.1521 97.0047 99.765 97.1646 100.382 97.3148L99.9085 99.258C99.2708 99.1027 98.6371 98.9374 98.0075 98.7624ZM101.824 99.6919L102.234 97.7344C102.852 97.8639 103.473 97.9838 104.098 98.094L103.75 100.064C103.105 99.9497 102.462 99.8257 101.824 99.6919ZM105.691 100.374L105.975 98.3941C106.6 98.4837 107.228 98.5637 107.859 98.6337L107.638 100.622C106.986 100.549 106.337 100.466 105.691 100.374ZM109.592 100.807L109.749 98.8132C110.38 98.863 111.013 98.903 111.649 98.9329L111.554 100.931C110.897 100.9 110.243 100.858 109.592 100.807ZM113.514 100.992L113.546 98.9925C113.863 98.9975 114.181 99 114.5 99C114.819 99 115.137 98.9975 115.454 98.9925L115.486 100.992C115.158 100.997 114.829 101 114.5 101C114.171 101 113.842 100.997 113.514 100.992ZM117.446 100.931C118.103 100.9 118.757 100.858 119.408 100.807L119.251 98.8132C118.62 98.863 117.987 98.903 117.351 98.9329L117.446 100.931ZM121.362 100.622L121.141 98.6337C121.772 98.5637 122.4 98.4837 123.025 98.3941L123.309 100.374C122.663 100.466 122.014 100.549 121.362 100.622ZM125.25 100.064L124.902 98.094C125.527 97.9838 126.148 97.8639 126.766 97.7344L127.176 99.6919C126.538 99.8257 125.895 99.9497 125.25 100.064ZM129.092 99.258L128.618 97.3148C129.235 97.1646 129.848 97.0047 130.457 96.8355L130.993 98.7624C130.363 98.9374 129.729 99.1027 129.092 99.258ZM132.874 98.2063L132.277 96.2977C132.882 96.1081 133.483 95.9091 134.08 95.7009L134.739 97.5892C134.122 97.8045 133.5 98.0103 132.874 98.2063ZM136.583 96.912L135.863 95.046C136.454 94.8179 137.041 94.5807 137.622 94.3344L138.402 96.1761C137.801 96.4308 137.194 96.6761 136.583 96.912ZM140.198 95.3812L139.359 93.5657C139.935 93.2997 140.505 93.0248 141.07 92.7411L141.967 94.5286C141.383 94.8219 140.793 95.1062 140.198 95.3812ZM143.707 93.6197L142.753 91.8622C143.31 91.5597 143.861 91.2485 144.407 90.9289L145.418 92.6545C144.853 92.9851 144.283 93.3069 143.707 93.6197ZM147.096 91.6345C147.65 91.2853 148.198 90.9274 148.74 90.5611L147.619 88.9044C147.095 89.2587 146.566 89.6047 146.03 89.9424L147.096 91.6345ZM150.348 89.4349L149.175 87.8153C149.688 87.4436 150.194 87.0638 150.694 86.6762L151.92 88.257C151.403 88.6578 150.879 89.0505 150.348 89.4349ZM153.452 87.0291L152.176 85.4889C152.664 85.085 153.145 84.6733 153.618 84.2542L154.944 85.7522C154.453 86.1857 153.956 86.6114 153.452 87.0291ZM156.393 84.4274L155.02 82.9731C155.48 82.5385 155.934 82.0966 156.379 81.6475L157.799 83.0564C157.338 83.5208 156.869 83.9779 156.393 84.4274ZM159.159 81.6403L157.694 80.2785C158.125 79.8149 158.549 79.3445 158.964 78.8672L160.473 80.1806C160.043 80.6742 159.605 81.1609 159.159 81.6403ZM161.738 78.6788L160.187 77.4155C160.587 76.925 160.979 76.4279 161.362 75.9245L162.953 77.1363C162.556 77.6571 162.151 78.1714 161.738 78.6788ZM164.117 75.555L162.487 74.3961C162.853 73.8807 163.211 73.3591 163.561 72.8316L165.228 73.9361C164.866 74.482 164.496 75.0217 164.117 75.555ZM166.286 72.281L164.583 71.2322C164.914 70.6941 165.237 70.1502 165.55 69.6008L167.287 70.5926C166.962 71.1612 166.629 71.7241 166.286 72.281ZM168.232 68.8716L166.464 67.9381C166.759 67.3792 167.044 66.8148 167.321 66.2454L169.12 67.1193C168.834 67.7088 168.538 68.293 168.232 68.8716ZM169.948 65.3395L168.121 64.5262C168.378 63.9493 168.625 63.3676 168.863 62.7812L170.717 63.5328C170.47 64.14 170.214 64.7423 169.948 65.3395ZM171.424 61.7002L169.547 61.0112C169.764 60.4188 169.972 59.8219 170.17 59.2207L172.069 59.8462C171.864 60.4688 171.649 61.0868 171.424 61.7002ZM172.652 57.9716L170.732 57.4105C170.909 56.8045 171.077 56.1945 171.234 55.5805L173.171 56.0767C173.008 56.7124 172.835 57.3442 172.652 57.9716ZM173.626 54.1672L171.673 53.7366C171.809 53.1211 171.934 52.5018 172.05 51.8791L174.016 52.2437C173.897 52.8886 173.767 53.5298 173.626 54.1672ZM174.342 50.3054L172.364 50.0071C172.458 49.3842 172.542 48.758 172.616 48.1286L174.602 48.3605C174.526 49.0121 174.439 49.6604 174.342 50.3054ZM174.797 46.4075L172.804 46.2421C172.856 45.613 172.898 44.9809 172.93 44.3461L174.927 44.4451C174.895 45.1021 174.851 45.7563 174.797 46.4075Z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M114.991 -4.97427L112.991 -5.00986C112.997 -5.33919 113 -5.66924 113 -6C113 -6.33077 112.997 -6.66084 112.991 -6.99017L114.991 -7.02577C114.997 -6.68457 115 -6.34264 115 -6C115 -5.65738 114.997 -5.31546 114.991 -4.97427ZM114.918 -9.06539L112.921 -8.95863C112.886 -9.61825 112.839 -10.2747 112.78 -10.9279L114.772 -11.1063C114.833 -10.4293 114.882 -9.74895 114.918 -9.06539ZM114.553 -13.139L112.569 -12.8889C112.487 -13.5425 112.393 -14.1925 112.287 -14.8388L114.261 -15.1604C114.371 -14.4905 114.468 -13.8166 114.553 -13.139ZM113.896 -17.1711L111.935 -16.778C111.806 -17.4244 111.665 -18.0666 111.512 -18.7046L113.458 -19.1687C113.616 -18.5072 113.762 -17.8413 113.896 -17.1711ZM112.948 -21.1476L111.02 -20.613C110.844 -21.2471 110.657 -21.8766 110.459 -22.5013L112.366 -23.1056C112.571 -22.4578 112.765 -21.8051 112.948 -21.1476ZM111.713 -25.0432L109.829 -24.37C109.608 -24.9899 109.375 -25.6047 109.132 -26.2142L110.99 -26.9554C111.242 -26.3235 111.483 -25.686 111.713 -25.0432ZM110.198 -28.8394L108.369 -28.0313C108.103 -28.633 107.827 -29.2291 107.54 -29.8194L109.339 -30.6931C109.636 -30.0811 109.923 -29.4632 110.198 -28.8394ZM108.413 -32.5159C108.093 -33.1183 107.762 -33.7142 107.422 -34.3036L105.69 -33.3025C106.019 -32.7339 106.338 -32.1589 106.646 -31.5778L108.413 -32.5159ZM106.367 -36.0541L104.673 -34.9914C104.323 -35.5487 103.964 -36.0993 103.595 -36.643L105.25 -37.7657C105.633 -37.2022 106.005 -36.6316 106.367 -36.0541ZM104.073 -39.4367L102.459 -38.2555C102.07 -38.7863 101.672 -39.3099 101.266 -39.8262L102.836 -41.0642C103.258 -40.5293 103.67 -39.9867 104.073 -39.4367ZM101.543 -42.6466L100.017 -41.3534C99.5918 -41.8551 99.1577 -42.3492 98.7149 -42.8354L100.194 -44.1821C100.652 -43.6783 101.102 -43.1664 101.543 -42.6466ZM98.7908 -45.6686L97.3608 -44.2703C96.9011 -44.7404 96.433 -45.2025 95.9567 -45.6562L97.3362 -47.1043C97.8296 -46.6343 98.3146 -46.1556 98.7908 -45.6686ZM95.8314 -48.4877L94.5042 -46.9916C94.0123 -47.428 93.5126 -47.8557 93.0051 -48.2747L94.2786 -49.8169C94.8042 -49.3829 95.3219 -48.9397 95.8314 -48.4877ZM92.6799 -51.09L91.4619 -49.5037C90.9406 -49.904 90.4119 -50.2953 89.876 -50.6774L91.037 -52.3058C91.5922 -51.9101 92.1399 -51.5047 92.6799 -51.09ZM89.3518 -53.4629L88.2492 -51.7943C87.7009 -52.1566 87.1458 -52.5094 86.584 -52.8526L87.6267 -54.5593C88.2087 -54.2038 88.7838 -53.8382 89.3518 -53.4629ZM85.8644 -55.5936L84.8829 -53.851C84.3105 -54.1734 83.7318 -54.4859 83.147 -54.7885L84.066 -56.5648C84.6719 -56.2514 85.2714 -55.9276 85.8644 -55.5936ZM82.2335 -57.4719L81.3783 -55.664C80.7848 -55.9447 80.1855 -56.2153 79.5806 -56.4756L80.371 -58.3128C80.9977 -58.0431 81.6187 -57.7628 82.2335 -57.4719ZM78.4801 -59.0867L77.7555 -57.2226C77.1436 -57.4604 76.5264 -57.6878 75.9042 -57.9044L76.5618 -59.7932C77.2066 -59.5687 77.8461 -59.3331 78.4801 -59.0867ZM74.6185 -60.4313L74.0285 -58.5203C73.402 -58.7137 72.7708 -58.8964 72.135 -59.0682L72.6567 -60.9989C73.3154 -60.821 73.9694 -60.6317 74.6185 -60.4313ZM70.6749 -61.4968L70.2222 -59.5487C69.5829 -59.6972 68.9394 -59.8348 68.2917 -59.9613L68.675 -61.9242C69.3459 -61.7932 70.0126 -61.6507 70.6749 -61.4968ZM66.6622 -62.2803L66.3487 -60.3051C65.7016 -60.4078 65.0507 -60.4994 64.3962 -60.5798L64.64 -62.5649C65.3178 -62.4816 65.992 -62.3867 66.6622 -62.2803ZM62.6067 -62.7783L62.4329 -60.7858C61.779 -60.8429 61.1217 -60.8887 60.4613 -60.9231L60.5653 -62.9204C61.249 -62.8848 61.9296 -62.8374 62.6067 -62.7783ZM58.5258 -62.9911L58.4911 -60.9914C58.1614 -60.9971 57.8311 -61 57.5 -61C57.1689 -61 56.8385 -60.9971 56.5089 -60.9914L56.4742 -62.9911C56.8154 -62.997 57.1574 -63 57.5 -63C57.8426 -63 58.1846 -62.997 58.5258 -62.9911ZM54.4347 -62.9204L54.5387 -60.9231C53.8783 -60.8887 53.221 -60.8429 52.5671 -60.7858L52.3932 -62.7783C53.0704 -62.8373 53.751 -62.8848 54.4347 -62.9204ZM50.36 -62.5649L50.6037 -60.5798C49.9493 -60.4994 49.2984 -60.4078 48.6513 -60.3051L48.3377 -62.2803C49.008 -62.3867 49.6822 -62.4816 50.36 -62.5649ZM46.325 -61.9242L46.7082 -59.9613C46.0606 -59.8348 45.4171 -59.6972 44.7778 -59.5487L44.3251 -61.4967C44.9874 -61.6507 45.6541 -61.7932 46.325 -61.9242ZM42.3433 -60.9989L42.8649 -59.0682C42.2292 -58.8964 41.5979 -58.7137 40.9715 -58.5203L40.3815 -60.4313C41.0306 -60.6317 41.6846 -60.821 42.3433 -60.9989ZM38.4381 -59.7932L39.0958 -57.9044C38.4736 -57.6878 37.8564 -57.4604 37.2445 -57.2226L36.5199 -59.0867C37.1539 -59.3331 37.7934 -59.5687 38.4381 -59.7932ZM34.629 -58.3128L35.4194 -56.4756C34.8145 -56.2153 34.2152 -55.9447 33.6217 -55.664L32.7665 -57.4719C33.3813 -57.7628 34.0023 -58.0431 34.629 -58.3128ZM30.934 -56.5648L31.853 -54.7885C31.2682 -54.4859 30.6895 -54.1734 30.1171 -53.851L29.1356 -55.5936C29.7286 -55.9276 30.3281 -56.2514 30.934 -56.5648ZM27.3733 -54.5593C26.7913 -54.2038 26.2162 -53.8382 25.6483 -53.4629L26.7508 -51.7943C27.2991 -52.1566 27.8542 -52.5094 28.416 -52.8526L27.3733 -54.5593ZM23.963 -52.3058L25.124 -50.6774C24.5881 -50.2953 24.0594 -49.904 23.5381 -49.5037L22.3201 -51.09C22.8601 -51.5047 23.4078 -51.9101 23.963 -52.3058ZM20.7214 -49.8169L21.9949 -48.2747C21.4874 -47.8557 20.9877 -47.428 20.4958 -46.9916L19.1686 -48.4877C19.6781 -48.9397 20.1958 -49.3829 20.7214 -49.8169ZM17.6638 -47.1043L19.0433 -45.6562C18.567 -45.2025 18.0989 -44.7404 17.6392 -44.2703L16.2092 -45.6686C16.6854 -46.1556 17.1704 -46.6343 17.6638 -47.1043ZM14.8064 -44.1821L16.2851 -42.8354C15.8423 -42.3492 15.4082 -41.8551 14.9829 -41.3534L13.4572 -42.6466C13.8978 -43.1664 14.3476 -43.6783 14.8064 -44.1821ZM12.1637 -41.0642L13.7344 -39.8262C13.3275 -39.3099 12.9297 -38.7863 12.5413 -38.2555L10.9273 -39.4367C11.3299 -39.9867 11.7421 -40.5293 12.1637 -41.0642ZM9.7497 -37.7657L11.4049 -36.643C11.036 -36.0993 10.6768 -35.5487 10.3273 -34.9914L8.63295 -36.0541C8.99516 -36.6316 9.36749 -37.2022 9.7497 -37.7657ZM7.57838 -34.3036L9.3098 -33.3025C8.98103 -32.7339 8.66224 -32.1589 8.35364 -31.5778L6.58728 -32.5159C6.90717 -33.1183 7.23762 -33.7142 7.57838 -34.3036ZM5.66099 -30.693L7.46007 -29.8194C7.17343 -29.2291 6.89712 -28.633 6.63137 -28.0313L4.80186 -28.8393C5.07738 -29.4632 5.36383 -30.0811 5.66099 -30.693ZM4.01028 -26.9554L5.86787 -26.2142C5.62468 -25.6047 5.39217 -24.9899 5.17057 -24.37L3.28728 -25.0432C3.51706 -25.686 3.75813 -26.3235 4.01028 -26.9554ZM2.63413 -23.1056L4.54065 -22.5013C4.34265 -21.8766 4.1556 -21.2471 3.97972 -20.613L2.05248 -21.1476C2.23486 -21.8051 2.42882 -22.4578 2.63413 -23.1056ZM1.54217 -19.1687L3.48758 -18.7046C3.33537 -18.0666 3.19438 -17.4244 3.06481 -16.778L1.10382 -17.1711C1.23816 -17.8412 1.38435 -18.5072 1.54217 -19.1687ZM0.738614 -15.1604L2.71257 -14.8387C2.60726 -14.1925 2.51331 -13.5425 2.43092 -12.8889L0.446619 -13.139C0.532026 -13.8166 0.62943 -14.4904 0.738614 -15.1604ZM0.227586 -11.1062L2.21961 -10.9278C2.16112 -10.2747 2.11414 -9.61822 2.07888 -8.9586L0.0817291 -9.06536C0.11827 -9.74891 0.166959 -10.4293 0.227586 -11.1062ZM0.00912311 -7.02573C0.00304952 -6.68454 0 -6.34262 0 -6C0 -5.65736 0.00304974 -5.31543 0.00912379 -4.97423L2.00881 -5.00983C2.00294 -5.33916 2 -5.66923 2 -6C2 -6.33076 2.00294 -6.66081 2.00881 -6.99014L0.00912311 -7.02573ZM0.081731 -2.93461L2.07888 -3.04137C2.11414 -2.38175 2.16112 -1.72527 2.21962 -1.07214L0.227589 -0.893734C0.166961 -1.57069 0.118272 -2.25106 0.081731 -2.93461ZM0.446623 1.13898L2.43092 0.888878C2.51331 1.54251 2.60727 2.19254 2.71258 2.83876L0.738618 3.16045C0.629434 2.49046 0.532029 1.81657 0.446623 1.13898ZM1.10383 5.17107L3.06482 4.778C3.19438 5.42437 3.33538 6.06665 3.48758 6.70461L1.54218 7.16874C1.38436 6.50723 1.23817 5.84127 1.10383 5.17107ZM2.05249 9.14758L3.97972 8.613C4.15561 9.24709 4.34266 9.87659 4.54066 10.5013L2.63413 11.1056C2.42882 10.4578 2.23486 9.80508 2.05249 9.14758ZM3.28729 13.0432L5.17058 12.37C5.39218 12.9899 5.62469 13.6047 5.86788 14.2142L4.01028 14.9554C3.75814 14.3235 3.51706 13.686 3.28729 13.0432ZM4.80186 16.8394L6.63137 16.0313C6.89712 16.633 7.17343 17.2291 7.46007 17.8194L5.66099 18.6931C5.36383 18.0811 5.07738 17.4632 4.80186 16.8394ZM6.58728 20.5159C6.90717 21.1183 7.23762 21.7142 7.57838 22.3036L9.3098 21.3025C8.98103 20.7339 8.66223 20.1589 8.35363 19.5778L6.58728 20.5159ZM8.63295 24.0541L10.3273 22.9914C10.6768 23.5487 11.036 24.0993 11.4049 24.643L9.7497 25.7657C9.36749 25.2022 8.99515 24.6316 8.63295 24.0541ZM10.9273 27.4367L12.5413 26.2555C12.9297 26.7863 13.3275 27.3099 13.7344 27.8262L12.1637 29.0642C11.7421 28.5293 11.3298 27.9867 10.9273 27.4367ZM13.4572 30.6466C13.8978 31.1664 14.3476 31.6783 14.8064 32.1821L16.2851 30.8354C15.8423 30.3492 15.4082 29.8551 14.9829 29.3534L13.4572 30.6466ZM16.2092 33.6686L17.6391 32.2703C18.0989 32.7404 18.567 33.2025 19.0433 33.6562L17.6638 35.1043C17.1704 34.6343 16.6854 34.1556 16.2092 33.6686ZM19.1686 36.4877L20.4958 34.9916C20.9877 35.4279 21.4874 35.8557 21.9948 36.2747L20.7214 37.8169C20.1958 37.3829 19.6781 36.9397 19.1686 36.4877ZM22.3201 39.09L23.5381 37.5037C24.0594 37.904 24.5881 38.2953 25.124 38.6774L23.963 40.3058C23.4078 39.9101 22.8601 39.5047 22.3201 39.09ZM25.6482 41.4629L26.7508 39.7943C27.2991 40.1566 27.8542 40.5094 28.416 40.8526L27.3733 42.5593C26.7913 42.2038 26.2162 41.8382 25.6482 41.4629ZM29.1356 43.5936L30.1171 41.851C30.6895 42.1734 31.2682 42.4859 31.853 42.7885L30.934 44.5648C30.3281 44.2514 29.7286 43.9276 29.1356 43.5936ZM32.7665 45.4719L33.6217 43.664C34.2152 43.9447 34.8145 44.2153 35.4194 44.4756L34.629 46.3128C34.0023 46.0431 33.3813 45.7628 32.7665 45.4719ZM36.5199 47.0867L37.2445 45.2226C37.8564 45.4604 38.4736 45.6878 39.0958 45.9044L38.4382 47.7932C37.7934 47.5687 37.1539 47.3331 36.5199 47.0867ZM40.3815 48.4313L40.9715 46.5203C41.598 46.7137 42.2292 46.8964 42.865 47.0682L42.3433 48.9989C41.6846 48.821 41.0306 48.6317 40.3815 48.4313ZM44.3251 49.4968L44.7778 47.5487C45.4171 47.6972 46.0606 47.8348 46.7083 47.9613L46.325 49.9242C45.6541 49.7932 44.9874 49.6507 44.3251 49.4968ZM48.3378 50.2803L48.6513 48.3051C49.2984 48.4078 49.9493 48.4994 50.6038 48.5798L50.36 50.5649C49.6822 50.4816 49.0081 50.3867 48.3378 50.2803ZM52.3933 50.7783L52.5671 48.7858C53.221 48.8429 53.8783 48.8887 54.5387 48.9231L54.4347 50.9204C53.751 50.8848 53.0704 50.8373 52.3933 50.7783ZM56.4742 50.9911L56.5089 48.9914C56.8386 48.9971 57.1689 49 57.5 49C57.8311 49 58.1615 48.9971 58.4911 48.9914L58.5258 50.9911C58.1846 50.997 57.8426 51 57.5 51C57.1574 51 56.8154 50.997 56.4742 50.9911ZM60.5653 50.9204L60.4613 48.9231C61.1217 48.8887 61.779 48.8429 62.4329 48.7858L62.6068 50.7783C61.9296 50.8373 61.249 50.8848 60.5653 50.9204ZM64.64 50.5649L64.3963 48.5798C65.0507 48.4994 65.7016 48.4078 66.3487 48.3051L66.6623 50.2803C65.992 50.3867 65.3178 50.4816 64.64 50.5649ZM68.675 49.9242L68.2918 47.9613C68.9394 47.8348 69.5829 47.6972 70.2222 47.5487L70.6749 49.4967C70.0126 49.6507 69.3459 49.7932 68.675 49.9242ZM72.6567 48.9989C73.3154 48.821 73.9694 48.6317 74.6185 48.4313L74.0285 46.5203C73.4021 46.7137 72.7708 46.8964 72.1351 47.0682L72.6567 48.9989ZM76.5619 47.7932L75.9042 45.9044C76.5264 45.6878 77.1436 45.4604 77.7555 45.2226L78.4801 47.0867C77.8461 47.3331 77.2066 47.5687 76.5619 47.7932ZM80.371 46.3128L79.5807 44.4756C80.1855 44.2153 80.7848 43.9447 81.3783 43.664L82.2335 45.4719C81.6187 45.7628 80.9977 46.0431 80.371 46.3128ZM84.066 44.5648L83.147 42.7885C83.7318 42.4859 84.3105 42.1734 84.8829 41.851L85.8644 43.5936C85.2714 43.9276 84.6719 44.2514 84.066 44.5648ZM87.6267 42.5593L86.584 40.8526C87.1458 40.5094 87.7009 40.1566 88.2492 39.7943L89.3518 41.4629C88.7838 41.8382 88.2087 42.2038 87.6267 42.5593ZM91.037 40.3058L89.876 38.6774C90.4119 38.2953 90.9406 37.904 91.4619 37.5037L92.6799 39.09C92.1399 39.5047 91.5922 39.9101 91.037 40.3058ZM94.2786 37.8169L93.0051 36.2747C93.5126 35.8557 94.0123 35.428 94.5042 34.9916L95.8314 36.4877C95.3219 36.9397 94.8042 37.3829 94.2786 37.8169ZM97.3362 35.1043L95.9567 33.6562C96.433 33.2025 96.9011 32.7404 97.3608 32.2703L98.7908 33.6686C98.3146 34.1556 97.8296 34.6343 97.3362 35.1043ZM100.194 32.1821L98.7149 30.8354C99.1577 30.3492 99.5918 29.8551 100.017 29.3534L101.543 30.6466C101.102 31.1664 100.652 31.6783 100.194 32.1821ZM102.836 29.0642L101.266 27.8262C101.672 27.3099 102.07 26.7863 102.459 26.2555L104.073 27.4367C103.67 27.9867 103.258 28.5293 102.836 29.0642ZM105.25 25.7657L103.595 24.643C103.964 24.0993 104.323 23.5487 104.673 22.9914L106.367 24.0541C106.005 24.6316 105.633 25.2022 105.25 25.7657ZM107.422 22.3036L105.69 21.3025C106.019 20.7339 106.338 20.1589 106.646 19.5778L108.413 20.5159C108.093 21.1183 107.762 21.7142 107.422 22.3036ZM109.339 18.693L107.54 17.8194C107.827 17.2291 108.103 16.633 108.369 16.0313L110.198 16.8393C109.923 17.4632 109.636 18.0811 109.339 18.693ZM110.99 14.9554L109.132 14.2142C109.375 13.6047 109.608 12.9899 109.829 12.37L111.713 13.0432C111.483 13.686 111.242 14.3235 110.99 14.9554ZM112.366 11.1056L110.459 10.5013C110.657 9.87658 110.844 9.24707 111.02 8.61298L112.948 9.14755C112.765 9.80505 112.571 10.4578 112.366 11.1056ZM113.458 7.16872L111.512 6.70459C111.665 6.06663 111.806 5.42435 111.935 4.77798L113.896 5.17106C113.762 5.84126 113.616 6.50721 113.458 7.16872ZM114.261 3.16042L112.287 2.83873C112.393 2.19251 112.487 1.54248 112.569 0.888851L114.553 1.13896C114.468 1.81655 114.371 2.49044 114.261 3.16042ZM114.772 -0.893768L112.78 -1.07217C112.839 -1.7253 112.886 -2.38178 112.921 -3.0414L114.918 -2.93464C114.882 -2.25109 114.833 -1.57073 114.772 -0.893768Z"
                                        />
                                    </g>
                                </svg>
                                <div class="service-content mt-3">
                                    <h4>{{$b->title}}</h4>
                                    <p>{{$b->sub_title}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Screenshots -->

        <div class="home4-work-section" style="background: #f8f8f8;">
            <div class="container-lg container-fluid">
                <div class="row mb-60">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Our <span>Project</span></h2>
                            <div class="dash-and-paragraph three">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 877 64" fill="none">
                                    <path
                                        d="M0.333333 3C0.333333 4.47276 1.52724 5.66667 3 5.66667C4.47276 5.66667 5.66667 4.47276 5.66667 3C5.66667 1.52724 4.47276 0.333333 3 0.333333C1.52724 0.333333 0.333333 1.52724 0.333333 3ZM875 3L875.271 3.42013L876.697 2.5H875V3ZM842.084 64L845.265 59.1819L839.502 58.836L842.084 64ZM3 3.5H875V2.5H3V3.5ZM874.729 2.57987C861.302 11.2438 844.485 27.4669 841.856 59.4675L842.852 59.5494C845.45 27.938 862.03 11.9643 875.271 3.42013L874.729 2.57987Z"
                                        fill="#2F2F2F"
                                    />
                                </svg>
                                <div class="btn-and-paragraph">
                                    <p>Creating a concise and effective design studio brief is crucial for outlining your business, its services.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-50 pb-50 border-bottom-1px-showcase">
                    <div class="col-lg-12">
                        <div class="single-work-flow">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 d-flex align-items-center">
                                    <div class="work-content">
                                        <div class="icon-and-content">
                                            <h3>Showcase - <span class="color-primary"> OKRs Map </span></h3>
                                        </div>
                                        <b>
                                            Visualise in one place your organisation and teams Objectives and Key Results with OKR Mapper.
                                        </b>
                                        <p class="text-target">
                                            Want to see how your teams are contributing to your objectives? Use the OKR Mapper to helps teams align and measure progress.
                                        </p>
                                        <p class="text-target">
                                            Easily link goals and key results across your teams and organisation. Get help to identify areas of focus.
                                        </p>
                                        
                                        <div class="include-features">
                                        <ul class="list-style-none">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                    />
                                                    <path
                                                        d="M8.22727 3.72747C8.22192 3.73264 8.21691 3.73816 8.21227 3.74397L5.60752 7.06272L4.03777 5.49222C3.93113 5.39286 3.7901 5.33876 3.64437 5.34134C3.49865 5.34391 3.35961 5.40294 3.25655 5.506C3.15349 5.60906 3.09446 5.7481 3.09188 5.89382C3.08931 6.03955 3.14341 6.18059 3.24277 6.28722L5.22727 8.27247C5.28073 8.32583 5.34439 8.36788 5.41445 8.39611C5.48452 8.42433 5.55955 8.43816 5.63508 8.43676C5.7106 8.43536 5.78507 8.41876 5.85404 8.38796C5.92301 8.35716 5.98507 8.31278 6.03652 8.25747L9.03052 4.51497C9.13246 4.40796 9.1882 4.26514 9.18568 4.11737C9.18317 3.9696 9.12259 3.82875 9.01706 3.72529C8.91152 3.62182 8.76951 3.56405 8.62171 3.56446C8.47392 3.56486 8.33223 3.62342 8.22727 3.72747Z"
                                                    />
                                                </svg>
                                                Choose from Top down to left to right view. 
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                    />
                                                    <path
                                                        d="M8.22727 3.72747C8.22192 3.73264 8.21691 3.73816 8.21227 3.74397L5.60752 7.06272L4.03777 5.49222C3.93113 5.39286 3.7901 5.33876 3.64437 5.34134C3.49865 5.34391 3.35961 5.40294 3.25655 5.506C3.15349 5.60906 3.09446 5.7481 3.09188 5.89382C3.08931 6.03955 3.14341 6.18059 3.24277 6.28722L5.22727 8.27247C5.28073 8.32583 5.34439 8.36788 5.41445 8.39611C5.48452 8.42433 5.55955 8.43816 5.63508 8.43676C5.7106 8.43536 5.78507 8.41876 5.85404 8.38796C5.92301 8.35716 5.98507 8.31278 6.03652 8.25747L9.03052 4.51497C9.13246 4.40796 9.1882 4.26514 9.18568 4.11737C9.18317 3.9696 9.12259 3.82875 9.01706 3.72529C8.91152 3.62182 8.76951 3.56405 8.62171 3.56446C8.47392 3.56486 8.33223 3.62342 8.22727 3.72747Z"
                                                    />
                                                </svg>
                                                Zoom in and out for a holistic or detail view of your organisation 
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="work-flow-img animet-images">
                                        <img src="https://cdn.dribbble.com/userupload/3492927/file/original-efe82fbec6af758ee835fcd6aa776080.jpg?resize=1200x900" alt />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-50 pb-50 border-bottom-1px-showcase">
                    <div class="col-lg-12">
                        <div class="single-work-flow">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="work-flow-img animet-images">
                                        <img src="https://cdn.dribbble.com/userupload/6653224/file/original-31397510ea0b5ce8b72cdc55c8e84fce.png?resize=1200x900" alt />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 d-flex align-items-center">
                                    <div class="work-content">
                                        <div class="icon-and-content">
                                            <h3>Showcase - <span class="color-primary">Portfolio Management</span></h3>
                                        </div>
                                        <b>
                                            Deliver strategic objectives with greater alignment, engagement and transparency. 
                                        </b>
                                        <p class="text-target">
                                           What to know how much impact your teams make towards your company’s goals?
                                        </p>
                                        <p class="text-target">
                                            Shape and track quarterly and annual planning for teams and portfolios.
                                        </p>

                                        <p class="text-target">
                                            Prioritise Objectives, Key Results and Initiatives and focus on what it matters.
                                        </p>

                                        <p class="text-target">
                                            View and address dependencies, impediments and risks preventing your success.
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-50">
                    <div class="col-lg-12">
                        <div class="single-work-flow">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 d-flex align-items-center">
                                    <div class="work-content">
                                        <div class="icon-and-content">
                                            <h3>Showcase - <span class="color-primary"> Reporting </span></h3>
                                        </div>
                                        <b>
                                            Tired of creating progress updates decks and presentations?
                                        </b>
                                        <b>
                                            Promptly share live progress of your goals with all your stakeholders.
                                        </b>
                                        
                                        <div class="include-features">
                                        <ul class="list-style-none">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                    />
                                                    <path
                                                        d="M8.22727 3.72747C8.22192 3.73264 8.21691 3.73816 8.21227 3.74397L5.60752 7.06272L4.03777 5.49222C3.93113 5.39286 3.7901 5.33876 3.64437 5.34134C3.49865 5.34391 3.35961 5.40294 3.25655 5.506C3.15349 5.60906 3.09446 5.7481 3.09188 5.89382C3.08931 6.03955 3.14341 6.18059 3.24277 6.28722L5.22727 8.27247C5.28073 8.32583 5.34439 8.36788 5.41445 8.39611C5.48452 8.42433 5.55955 8.43816 5.63508 8.43676C5.7106 8.43536 5.78507 8.41876 5.85404 8.38796C5.92301 8.35716 5.98507 8.31278 6.03652 8.25747L9.03052 4.51497C9.13246 4.40796 9.1882 4.26514 9.18568 4.11737C9.18317 3.9696 9.12259 3.82875 9.01706 3.72529C8.91152 3.62182 8.76951 3.56405 8.62171 3.56446C8.47392 3.56486 8.33223 3.62342 8.22727 3.72747Z"
                                                    />
                                                </svg>
                                                Keep everyone up to date with automated reporting of your OKRs on weekly, monthly, quarterly, etc.
                                            </li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                    />
                                                    <path
                                                        d="M8.22727 3.72747C8.22192 3.73264 8.21691 3.73816 8.21227 3.74397L5.60752 7.06272L4.03777 5.49222C3.93113 5.39286 3.7901 5.33876 3.64437 5.34134C3.49865 5.34391 3.35961 5.40294 3.25655 5.506C3.15349 5.60906 3.09446 5.7481 3.09188 5.89382C3.08931 6.03955 3.14341 6.18059 3.24277 6.28722L5.22727 8.27247C5.28073 8.32583 5.34439 8.36788 5.41445 8.39611C5.48452 8.42433 5.55955 8.43816 5.63508 8.43676C5.7106 8.43536 5.78507 8.41876 5.85404 8.38796C5.92301 8.35716 5.98507 8.31278 6.03652 8.25747L9.03052 4.51497C9.13246 4.40796 9.1882 4.26514 9.18568 4.11737C9.18317 3.9696 9.12259 3.82875 9.01706 3.72529C8.91152 3.62182 8.76951 3.56405 8.62171 3.56446C8.47392 3.56486 8.33223 3.62342 8.22727 3.72747Z"
                                                    />
                                                </svg>
                                                Present in a team meeting or share with your stakeholders without needing to create presentations
                                            </li>

                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                    />
                                                    <path
                                                        d="M8.22727 3.72747C8.22192 3.73264 8.21691 3.73816 8.21227 3.74397L5.60752 7.06272L4.03777 5.49222C3.93113 5.39286 3.7901 5.33876 3.64437 5.34134C3.49865 5.34391 3.35961 5.40294 3.25655 5.506C3.15349 5.60906 3.09446 5.7481 3.09188 5.89382C3.08931 6.03955 3.14341 6.18059 3.24277 6.28722L5.22727 8.27247C5.28073 8.32583 5.34439 8.36788 5.41445 8.39611C5.48452 8.42433 5.55955 8.43816 5.63508 8.43676C5.7106 8.43536 5.78507 8.41876 5.85404 8.38796C5.92301 8.35716 5.98507 8.31278 6.03652 8.25747L9.03052 4.51497C9.13246 4.40796 9.1882 4.26514 9.18568 4.11737C9.18317 3.9696 9.12259 3.82875 9.01706 3.72529C8.91152 3.62182 8.76951 3.56405 8.62171 3.56446C8.47392 3.56486 8.33223 3.62342 8.22727 3.72747Z"
                                                    />
                                                </svg>
                                                Send offline reports sent to the teams and relevant stakeholders
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="work-flow-img animet-images">
                                        <img src="https://cdn.dribbble.com/userupload/9802484/file/original-527295f6874765979023be60cb26f70b.jpg?resize=1200x900" alt />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        @php
        $keyfeatures = DB::table('header_section')->where('section','feature')->get();
        @endphp

        <div class="home6-feature-section feature" style="padding-top: 80px; padding-bottom: 80px; background: #fff;" id="feature-section">
            <div class="container-lg container-fluid">
                <div class="row justify-content-center mb-70">
                    <div class="col-lg-5">
                        <div class="section-title3 text-center text-animation">
                            <h2 class="text-animation">Key Features</h2>
                            <p class="text-animation">These features collectively contribute to a well-rounded Project Management System that helps teams efficiently plan, execute.</p>
                           
                        </div>
                    </div>
                    
                </div>
                <div class="row g-4 mb-50">
                    @if(count($keyfeatures) > 0)
                    @foreach($keyfeatures as $keyfeature)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="feature-card magnetic-item">
                            <div class="icon">
                                        <span class="material-symbols-outlined">
                                        @if($keyfeature->title == 'Business Units')
                                        folder_supervised
                                        @endif
                                        @if($keyfeature->title == 'OKR Mapper')
                                        link
                                        @endif
                                        @if($keyfeature->title == 'OKR Planner')
                                        folder_supervised
                                        @endif
                                        @if($keyfeature->title == 'Epic Backlog')
                                        key_visualizer
                                        @endif
                                        @if($keyfeature->title == 'Reporting')
                                        summarize
                                        @endif
                                        @if($keyfeature->title == 'Risk Management')
                                        block
                                        @endif
                                        @if($keyfeature->title == 'Action')
                                        call_to_action
                                        @endif
                                        </span>
                            </div>
                            <div class="content">
                                <h5>{{$keyfeature->title}}</h5>
                                <p> {{$keyfeature->sub_title}}</p>
                                <a href="{{$keyfeature->btn_link}}" class="read-mz">
                                    
                                    <span class="material-symbols-outlined arrow-mz">
                                        north_east
                                        </span>
                                        {{$keyfeature->btn_text}}
                                 </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
                <div class="contact-area">
                    <p>Have an questions? </p>
                    <a href="#">
                    Contact Now
                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    </a>
                </div>
            </div>
        </div>
 

        <!-- Price & Plans -->

        <div class="home3-pricing-plan-section">
            <div class="container-lg container-fluid">
                <div class="row mb-60">
                    <div class="col-lg-4">
                        <div class="sub-title2 dark text-animation">
                            <h6>Pricing Plan</h6>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="section-title text-animation white text-animation">
                            <h2>Flexible Pricing Plan</h2>
                            <div class="dash-and-paragraph">
                                <div class="dash"></div>
                                <p>The specific goals of a marketing agency can vary depending on the client's needs, industry.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="pricing-contact-wrap">
                            <svg class="vectors" xmlns="http://www.w3.org/2000/svg" width="172" height="208" viewBox="0 0 172 208" fill="none">
                                <path
                                    d="M167.91 109.077L217.631 158.625L189.625 186.631L140.077 136.91L139.223 136.053V137.263V207.5H99.7769V137.263V136.056L98.9234 136.909L49.2018 186.631L21.3675 158.626L71.0899 109.077L71.9471 108.223H70.737H0.5V68.7769H70.737H71.9441L71.0906 67.9234L21.3679 18.2007L49.2007 -9.63209L98.9234 40.0906L99.7769 40.9441V39.737V-30.5H139.223V39.737V40.9471L140.077 40.0899L189.626 -9.63255L217.631 18.2018L167.909 67.9234L167.056 68.7769H168.263H238.5V108.223H168.263H167.053L167.91 109.077Z"
                                />
                            </svg>
                            <div class="pricing-contact-top">
                                <div class="icon">
                                    <img src="assets/img/home3/icon/contact-icon.svg" alt />
                                </div>
                                <div class="pricing-contact-title">
                                    <h3>Have any question?</h3>
                                </div>
                            </div>
                            <div class="pricing-contact-btn">
                                <a class="btn-hover" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                        <path
                                            d="M12.25 0.875C12.4821 0.875 12.7046 0.967187 12.8687 1.13128C13.0328 1.29538 13.125 1.51794 13.125 1.75V8.75C13.125 8.98206 13.0328 9.20462 12.8687 9.36872C12.7046 9.53281 12.4821 9.625 12.25 9.625H3.86225C3.39816 9.6251 2.95311 9.80954 2.625 10.1378L0.875 11.8878V1.75C0.875 1.51794 0.967187 1.29538 1.13128 1.13128C1.29538 0.967187 1.51794 0.875 1.75 0.875H12.25ZM1.75 0C1.28587 0 0.840752 0.184374 0.512563 0.512563C0.184374 0.840752 0 1.28587 0 1.75L0 12.9439C1.8388e-05 13.0304 0.0257185 13.1151 0.0738476 13.187C0.121977 13.259 0.190371 13.315 0.270374 13.3481C0.350378 13.3812 0.438393 13.3898 0.523282 13.3728C0.60817 13.3558 0.686114 13.314 0.74725 13.2528L3.24362 10.7564C3.40768 10.5923 3.6302 10.5 3.86225 10.5H12.25C12.7141 10.5 13.1592 10.3156 13.4874 9.98744C13.8156 9.65925 14 9.21413 14 8.75V1.75C14 1.28587 13.8156 0.840752 13.4874 0.512563C13.1592 0.184374 12.7141 0 12.25 0L1.75 0Z"
                                        />
                                        <path
                                            d="M2.625 3.0625C2.625 2.94647 2.67109 2.83519 2.75314 2.75314C2.83519 2.67109 2.94647 2.625 3.0625 2.625H10.9375C11.0535 2.625 11.1648 2.67109 11.2469 2.75314C11.3289 2.83519 11.375 2.94647 11.375 3.0625C11.375 3.17853 11.3289 3.28981 11.2469 3.37186C11.1648 3.45391 11.0535 3.5 10.9375 3.5H3.0625C2.94647 3.5 2.83519 3.45391 2.75314 3.37186C2.67109 3.28981 2.625 3.17853 2.625 3.0625ZM2.625 5.25C2.625 5.13397 2.67109 5.02269 2.75314 4.94064C2.83519 4.85859 2.94647 4.8125 3.0625 4.8125H10.9375C11.0535 4.8125 11.1648 4.85859 11.2469 4.94064C11.3289 5.02269 11.375 5.13397 11.375 5.25C11.375 5.36603 11.3289 5.47731 11.2469 5.55936C11.1648 5.64141 11.0535 5.6875 10.9375 5.6875H3.0625C2.94647 5.6875 2.83519 5.64141 2.75314 5.55936C2.67109 5.47731 2.625 5.36603 2.625 5.25ZM2.625 7.4375C2.625 7.32147 2.67109 7.21019 2.75314 7.12814C2.83519 7.04609 2.94647 7 3.0625 7H7.4375C7.55353 7 7.66481 7.04609 7.74686 7.12814C7.82891 7.21019 7.875 7.32147 7.875 7.4375C7.875 7.55353 7.82891 7.66481 7.74686 7.74686C7.66481 7.82891 7.55353 7.875 7.4375 7.875H3.0625C2.94647 7.875 2.83519 7.82891 2.75314 7.74686C2.67109 7.66481 2.625 7.55353 2.625 7.4375Z"
                                        />
                                    </svg>
                                    Let’s Talk <span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    @php
                        $plan = DB::table('plan')->where('status','Active')->where('billing_method','month')->orderby('id','DESC')->get();
                    @endphp

                    @foreach($plan as $p)
                    @php
                        $dataArray = explode(',', $p->module);
                    @endphp

                    <div class="col-lg-8">
                        <div class="pricing-wrapper">
                            <div class="pricing-title-and-subscription-duration">
                                <h3>{{$p->plan_title}}</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-5 order-md-1 order-2">
                                    <div class="include-features">
                                        <h6>What’s Included :</h6>
                                        <ul>
                                            @foreach($dataArray as $arr)
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                        <path
                                                            d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                        />
                                                        <path
                                                            d="M8.22727 3.72747C8.22192 3.73264 8.21691 3.73816 8.21227 3.74397L5.60752 7.06272L4.03777 5.49222C3.93113 5.39286 3.7901 5.33876 3.64437 5.34134C3.49865 5.34391 3.35961 5.40294 3.25655 5.506C3.15349 5.60906 3.09446 5.7481 3.09188 5.89382C3.08931 6.03955 3.14341 6.18059 3.24277 6.28722L5.22727 8.27247C5.28073 8.32583 5.34439 8.36788 5.41445 8.39611C5.48452 8.42433 5.55955 8.43816 5.63508 8.43676C5.7106 8.43536 5.78507 8.41876 5.85404 8.38796C5.92301 8.35716 5.98507 8.31278 6.03652 8.25747L9.03052 4.51497C9.13246 4.40796 9.1882 4.26514 9.18568 4.11737C9.18317 3.9696 9.12259 3.82875 9.01706 3.72529C8.91152 3.62182 8.76951 3.56405 8.62171 3.56446C8.47392 3.56486 8.33223 3.62342 8.22727 3.72747Z"
                                                        />
                                                    </svg>
                                                    {{$arr}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-7 order-md-2 order-1">
                                    <div class="pricing-right">
                                        <div class="custom-duration">
                                            <label>How Many User Do you Have?</label>
                                            <select>
                                                <option value="1">1-10 Users</option>
                                                <option value="2">10-50 Users</option>
                                                <option value="3">50-100 Users</option>
                                                <option value="4">More than 100</option>
                                            </select>
                                        </div>
                                        <div class="price">
                                            <h2>£{{$p->base_price}}<span> / per {{$p->billing_method}}</span></h2> <br>
                                            <small class="text-white">No Credit Card Required</small>
                                        </div>
                                        <a href="#" class="primary-btn3 btn-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                                <path
                                                    d="M1.82326 6.42493C4.49302 5.27479 6.44651 2.87535 6.98915 0C7.53178 2.87535 9.48527 5.27479 12.1767 6.42493C12.6977 6.64306 14 7 14 7C14 7 12.6977 7.35694 12.1767 7.57507C9.50698 8.74504 7.55349 11.1246 6.98915 14C6.44651 11.1445 4.49302 8.74504 1.82326 7.5949C1.30233 7.35694 0 7.01983 0 7.01983C0 7.01983 1.30233 6.66289 1.82326 6.42493Z"
                                                ></path>
                                            </svg>
                                            Start For Free
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <div class="slider-btn-area d-flex justify-content-end align-items-start">
                            <div class="slider-btn-group w-100">
                                <div class="slider-btn prev-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.416666 5.9668H15V4.7168H0.416666V5.9668Z"></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M1.04115 4.7168C3.98115 4.7168 6.38281 7.3018 6.38281 10.0585V10.6835H5.13281V10.0585C5.13281 7.96596 3.26448 5.9668 1.04115 5.9668H0.416979V4.7168H1.04115Z"
                                        ></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M1.04115 5.96667C3.98115 5.96667 6.38281 3.38167 6.38281 0.625V0H5.13281V0.625C5.13281 2.71833 3.26448 4.71667 1.04115 4.71667H0.416979V5.96667H1.04115Z"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="slider-btn next-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5833 5.9668H0V4.7168H14.5833V5.9668Z"></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M13.9589 4.7168C11.0189 4.7168 8.61719 7.3018 8.61719 10.0585V10.6835H9.86719V10.0585C9.86719 7.96596 11.7355 5.9668 13.9589 5.9668H14.583V4.7168H13.9589Z"
                                        ></path>
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M13.9589 5.96667C11.0189 5.96667 8.61719 3.38167 8.61719 0.625V0H9.86719V0.625C9.86719 2.71833 11.7355 4.71667 13.9589 4.71667H14.583V5.96667H13.9589Z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Section -->

        <div class="home2-blog-section mt-100 mb-130">
            <div class="container-lg container-fluid">
                <div class="row mb-60">
                    <div class="col-lg-12">
                        <div class="section-title four text-animation">
                            <h2>
                                Our Latest <br />
                                <span>ARTICLE</span>
                            </h2>
                            <div class="dash-and-paragraph three">
                                <div class="btn-and-paragraph">
                                    <a href="#">
                                        Explore More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z"></path>
                                        </svg>
                                    </a>
                                    <p>Services to help businesses establish and enhance their online presence.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card2 magnetic-item">
                            <a href="#" class="blog-img">
                                <img src="https://images.pexels.com/photos/1957478/pexels-photo-1957478.jpeg?auto=compress&cs=tinysrgb&w=600" alt />
                            </a>
                            <div class="blog-content">
                                <ul class="tags">
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path
                                                    d="M7.58455 3.09152C7.58455 3.4429 7.72414 3.7799 7.9726 4.02837C8.22107 4.27684 8.55807 4.41643 8.90946 4.41643C9.26085 4.41643 9.59785 4.27684 9.84632 4.02837C10.0948 3.7799 10.2344 3.4429 10.2344 3.09152C10.2344 2.74013 10.0948 2.40313 9.84632 2.15466C9.59785 1.90619 9.26085 1.7666 8.90946 1.7666C8.55807 1.7666 8.22107 1.90619 7.9726 2.15466C7.72414 2.40313 7.58455 2.74013 7.58455 3.09152ZM8.46782 3.09152C8.46782 2.97439 8.51435 2.86205 8.59718 2.77923C8.68 2.69641 8.79233 2.64988 8.90946 2.64988C9.02659 2.64988 9.13892 2.69641 9.22175 2.77923C9.30457 2.86205 9.3511 2.97439 9.3511 3.09152C9.3511 3.20865 9.30457 3.32098 9.22175 3.4038C9.13892 3.48662 9.02659 3.53315 8.90946 3.53315C8.79233 3.53315 8.68 3.48662 8.59718 3.4038C8.51435 3.32098 8.46782 3.20865 8.46782 3.09152Z"
                                                ></path>
                                                <path
                                                    d="M11.1167 0H7.06602C6.83178 5.00265e-05 6.60715 0.093142 6.44154 0.2588L0.258612 6.44173C0.0930223 6.60737 0 6.832 0 7.06621C0 7.30042 0.0930223 7.52505 0.258612 7.69068L4.30932 11.7414C4.47495 11.907 4.69958 12 4.93379 12C5.168 12 5.39263 11.907 5.55827 11.7414L11.7412 5.55846C11.9069 5.39285 11.9999 5.16822 12 4.93398V0.883276C12 0.649017 11.9069 0.424352 11.7413 0.258706C11.5756 0.0930591 11.351 0 11.1167 0ZM11.1167 4.93398L4.93379 11.1169L0.883087 7.06621L7.06602 0.883276H11.1167V4.93398Z"
                                                ></path>
                                            </svg>
                                            Application
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <g>
                                                    <path
                                                        d="M6 5.25C6.09946 5.25 6.19484 5.28951 6.26517 5.35984C6.33549 5.43016 6.375 5.52554 6.375 5.625V6.75H7.5C7.59946 6.75 7.69484 6.78951 7.76517 6.85983C7.83549 6.93016 7.875 7.02554 7.875 7.125C7.875 7.22446 7.83549 7.31984 7.76517 7.39017C7.69484 7.46049 7.59946 7.5 7.5 7.5H6.375V8.625C6.375 8.72446 6.33549 8.81984 6.26517 8.89017C6.19484 8.96049 6.09946 9 6 9C5.90054 9 5.80516 8.96049 5.73484 8.89017C5.66451 8.81984 5.625 8.72446 5.625 8.625V7.5H4.5C4.40054 7.5 4.30516 7.46049 4.23484 7.39017C4.16451 7.31984 4.125 7.22446 4.125 7.125C4.125 7.02554 4.16451 6.93016 4.23484 6.85983C4.30516 6.78951 4.40054 6.75 4.5 6.75H5.625V5.625C5.625 5.52554 5.66451 5.43016 5.73484 5.35984C5.80516 5.28951 5.90054 5.25 6 5.25Z"
                                                    ></path>
                                                    <path
                                                        d="M2.625 0C2.72446 0 2.81984 0.0395088 2.89016 0.109835C2.96049 0.180161 3 0.275544 3 0.375V0.75H9V0.375C9 0.275544 9.03951 0.180161 9.10983 0.109835C9.18016 0.0395088 9.27554 0 9.375 0C9.47446 0 9.56984 0.0395088 9.64017 0.109835C9.71049 0.180161 9.75 0.275544 9.75 0.375V0.75H10.5C10.8978 0.75 11.2794 0.908035 11.5607 1.18934C11.842 1.47064 12 1.85218 12 2.25V10.5C12 10.8978 11.842 11.2794 11.5607 11.5607C11.2794 11.842 10.8978 12 10.5 12H1.5C1.10218 12 0.720644 11.842 0.43934 11.5607C0.158035 11.2794 0 10.8978 0 10.5V2.25C0 1.85218 0.158035 1.47064 0.43934 1.18934C0.720644 0.908035 1.10218 0.75 1.5 0.75H2.25V0.375C2.25 0.275544 2.28951 0.180161 2.35984 0.109835C2.43016 0.0395088 2.52554 0 2.625 0ZM0.75 3V10.5C0.75 10.6989 0.829018 10.8897 0.96967 11.0303C1.11032 11.171 1.30109 11.25 1.5 11.25H10.5C10.6989 11.25 10.8897 11.171 11.0303 11.0303C11.171 10.8897 11.25 10.6989 11.25 10.5V3H0.75Z"
                                                    ></path>
                                                </g>
                                            </svg>
                                            03 April, 2023
                                        </a>
                                    </li>
                                </ul>
                                <h4><a href="#">Consulting evolves amid business changes.</a></h4>
                                <a class="explore-btn" href="#">
                                    Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card2 magnetic-item">
                            <a href="#" class="blog-img">
                                <img src="https://images.pexels.com/photos/926390/pexels-photo-926390.jpeg?auto=compress&cs=tinysrgb&w=600" alt />
                            </a>
                            <div class="blog-content">
                                <ul class="tags">
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path
                                                    d="M7.58455 3.09152C7.58455 3.4429 7.72414 3.7799 7.9726 4.02837C8.22107 4.27684 8.55807 4.41643 8.90946 4.41643C9.26085 4.41643 9.59785 4.27684 9.84632 4.02837C10.0948 3.7799 10.2344 3.4429 10.2344 3.09152C10.2344 2.74013 10.0948 2.40313 9.84632 2.15466C9.59785 1.90619 9.26085 1.7666 8.90946 1.7666C8.55807 1.7666 8.22107 1.90619 7.9726 2.15466C7.72414 2.40313 7.58455 2.74013 7.58455 3.09152ZM8.46782 3.09152C8.46782 2.97439 8.51435 2.86205 8.59718 2.77923C8.68 2.69641 8.79233 2.64988 8.90946 2.64988C9.02659 2.64988 9.13892 2.69641 9.22175 2.77923C9.30457 2.86205 9.3511 2.97439 9.3511 3.09152C9.3511 3.20865 9.30457 3.32098 9.22175 3.4038C9.13892 3.48662 9.02659 3.53315 8.90946 3.53315C8.79233 3.53315 8.68 3.48662 8.59718 3.4038C8.51435 3.32098 8.46782 3.20865 8.46782 3.09152Z"
                                                ></path>
                                                <path
                                                    d="M11.1167 0H7.06602C6.83178 5.00265e-05 6.60715 0.093142 6.44154 0.2588L0.258612 6.44173C0.0930223 6.60737 0 6.832 0 7.06621C0 7.30042 0.0930223 7.52505 0.258612 7.69068L4.30932 11.7414C4.47495 11.907 4.69958 12 4.93379 12C5.168 12 5.39263 11.907 5.55827 11.7414L11.7412 5.55846C11.9069 5.39285 11.9999 5.16822 12 4.93398V0.883276C12 0.649017 11.9069 0.424352 11.7413 0.258706C11.5756 0.0930591 11.351 0 11.1167 0ZM11.1167 4.93398L4.93379 11.1169L0.883087 7.06621L7.06602 0.883276H11.1167V4.93398Z"
                                                ></path>
                                            </svg>
                                            IT Consulting
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <g>
                                                    <path
                                                        d="M6 5.25C6.09946 5.25 6.19484 5.28951 6.26517 5.35984C6.33549 5.43016 6.375 5.52554 6.375 5.625V6.75H7.5C7.59946 6.75 7.69484 6.78951 7.76517 6.85983C7.83549 6.93016 7.875 7.02554 7.875 7.125C7.875 7.22446 7.83549 7.31984 7.76517 7.39017C7.69484 7.46049 7.59946 7.5 7.5 7.5H6.375V8.625C6.375 8.72446 6.33549 8.81984 6.26517 8.89017C6.19484 8.96049 6.09946 9 6 9C5.90054 9 5.80516 8.96049 5.73484 8.89017C5.66451 8.81984 5.625 8.72446 5.625 8.625V7.5H4.5C4.40054 7.5 4.30516 7.46049 4.23484 7.39017C4.16451 7.31984 4.125 7.22446 4.125 7.125C4.125 7.02554 4.16451 6.93016 4.23484 6.85983C4.30516 6.78951 4.40054 6.75 4.5 6.75H5.625V5.625C5.625 5.52554 5.66451 5.43016 5.73484 5.35984C5.80516 5.28951 5.90054 5.25 6 5.25Z"
                                                    ></path>
                                                    <path
                                                        d="M2.625 0C2.72446 0 2.81984 0.0395088 2.89016 0.109835C2.96049 0.180161 3 0.275544 3 0.375V0.75H9V0.375C9 0.275544 9.03951 0.180161 9.10983 0.109835C9.18016 0.0395088 9.27554 0 9.375 0C9.47446 0 9.56984 0.0395088 9.64017 0.109835C9.71049 0.180161 9.75 0.275544 9.75 0.375V0.75H10.5C10.8978 0.75 11.2794 0.908035 11.5607 1.18934C11.842 1.47064 12 1.85218 12 2.25V10.5C12 10.8978 11.842 11.2794 11.5607 11.5607C11.2794 11.842 10.8978 12 10.5 12H1.5C1.10218 12 0.720644 11.842 0.43934 11.5607C0.158035 11.2794 0 10.8978 0 10.5V2.25C0 1.85218 0.158035 1.47064 0.43934 1.18934C0.720644 0.908035 1.10218 0.75 1.5 0.75H2.25V0.375C2.25 0.275544 2.28951 0.180161 2.35984 0.109835C2.43016 0.0395088 2.52554 0 2.625 0ZM0.75 3V10.5C0.75 10.6989 0.829018 10.8897 0.96967 11.0303C1.11032 11.171 1.30109 11.25 1.5 11.25H10.5C10.6989 11.25 10.8897 11.171 11.0303 11.0303C11.171 10.8897 11.25 10.6989 11.25 10.5V3H0.75Z"
                                                    ></path>
                                                </g>
                                            </svg>
                                            03 April, 2023
                                        </a>
                                    </li>
                                </ul>
                                <h4><a href="#">FutureForge Tech: Forging the Future of Innovation.</a></h4>
                                <a class="explore-btn" href="#">
                                    Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card2 magnetic-item">
                            <a href="#" class="blog-img">
                                <img src="https://images.pexels.com/photos/261679/pexels-photo-261679.jpeg?auto=compress&cs=tinysrgb&w=600" alt />
                            </a>
                            <div class="blog-content">
                                <ul class="tags">
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path
                                                    d="M7.58455 3.09152C7.58455 3.4429 7.72414 3.7799 7.9726 4.02837C8.22107 4.27684 8.55807 4.41643 8.90946 4.41643C9.26085 4.41643 9.59785 4.27684 9.84632 4.02837C10.0948 3.7799 10.2344 3.4429 10.2344 3.09152C10.2344 2.74013 10.0948 2.40313 9.84632 2.15466C9.59785 1.90619 9.26085 1.7666 8.90946 1.7666C8.55807 1.7666 8.22107 1.90619 7.9726 2.15466C7.72414 2.40313 7.58455 2.74013 7.58455 3.09152ZM8.46782 3.09152C8.46782 2.97439 8.51435 2.86205 8.59718 2.77923C8.68 2.69641 8.79233 2.64988 8.90946 2.64988C9.02659 2.64988 9.13892 2.69641 9.22175 2.77923C9.30457 2.86205 9.3511 2.97439 9.3511 3.09152C9.3511 3.20865 9.30457 3.32098 9.22175 3.4038C9.13892 3.48662 9.02659 3.53315 8.90946 3.53315C8.79233 3.53315 8.68 3.48662 8.59718 3.4038C8.51435 3.32098 8.46782 3.20865 8.46782 3.09152Z"
                                                ></path>
                                                <path
                                                    d="M11.1167 0H7.06602C6.83178 5.00265e-05 6.60715 0.093142 6.44154 0.2588L0.258612 6.44173C0.0930223 6.60737 0 6.832 0 7.06621C0 7.30042 0.0930223 7.52505 0.258612 7.69068L4.30932 11.7414C4.47495 11.907 4.69958 12 4.93379 12C5.168 12 5.39263 11.907 5.55827 11.7414L11.7412 5.55846C11.9069 5.39285 11.9999 5.16822 12 4.93398V0.883276C12 0.649017 11.9069 0.424352 11.7413 0.258706C11.5756 0.0930591 11.351 0 11.1167 0ZM11.1167 4.93398L4.93379 11.1169L0.883087 7.06621L7.06602 0.883276H11.1167V4.93398Z"
                                                ></path>
                                            </svg>
                                            WordPress
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <g>
                                                    <path
                                                        d="M6 5.25C6.09946 5.25 6.19484 5.28951 6.26517 5.35984C6.33549 5.43016 6.375 5.52554 6.375 5.625V6.75H7.5C7.59946 6.75 7.69484 6.78951 7.76517 6.85983C7.83549 6.93016 7.875 7.02554 7.875 7.125C7.875 7.22446 7.83549 7.31984 7.76517 7.39017C7.69484 7.46049 7.59946 7.5 7.5 7.5H6.375V8.625C6.375 8.72446 6.33549 8.81984 6.26517 8.89017C6.19484 8.96049 6.09946 9 6 9C5.90054 9 5.80516 8.96049 5.73484 8.89017C5.66451 8.81984 5.625 8.72446 5.625 8.625V7.5H4.5C4.40054 7.5 4.30516 7.46049 4.23484 7.39017C4.16451 7.31984 4.125 7.22446 4.125 7.125C4.125 7.02554 4.16451 6.93016 4.23484 6.85983C4.30516 6.78951 4.40054 6.75 4.5 6.75H5.625V5.625C5.625 5.52554 5.66451 5.43016 5.73484 5.35984C5.80516 5.28951 5.90054 5.25 6 5.25Z"
                                                    ></path>
                                                    <path
                                                        d="M2.625 0C2.72446 0 2.81984 0.0395088 2.89016 0.109835C2.96049 0.180161 3 0.275544 3 0.375V0.75H9V0.375C9 0.275544 9.03951 0.180161 9.10983 0.109835C9.18016 0.0395088 9.27554 0 9.375 0C9.47446 0 9.56984 0.0395088 9.64017 0.109835C9.71049 0.180161 9.75 0.275544 9.75 0.375V0.75H10.5C10.8978 0.75 11.2794 0.908035 11.5607 1.18934C11.842 1.47064 12 1.85218 12 2.25V10.5C12 10.8978 11.842 11.2794 11.5607 11.5607C11.2794 11.842 10.8978 12 10.5 12H1.5C1.10218 12 0.720644 11.842 0.43934 11.5607C0.158035 11.2794 0 10.8978 0 10.5V2.25C0 1.85218 0.158035 1.47064 0.43934 1.18934C0.720644 0.908035 1.10218 0.75 1.5 0.75H2.25V0.375C2.25 0.275544 2.28951 0.180161 2.35984 0.109835C2.43016 0.0395088 2.52554 0 2.625 0ZM0.75 3V10.5C0.75 10.6989 0.829018 10.8897 0.96967 11.0303C1.11032 11.171 1.30109 11.25 1.5 11.25H10.5C10.6989 11.25 10.8897 11.171 11.0303 11.0303C11.171 10.8897 11.25 10.6989 11.25 10.5V3H0.75Z"
                                                    ></path>
                                                </g>
                                            </svg>
                                            03 April, 2023
                                        </a>
                                    </li>
                                </ul>
                                <h4><a href="#">CodeMosaic Showcase: Weaving Digital Brilliance</a></h4>
                                <a class="explore-btn" href="#">
                                    Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to action -->

        <div class="contact-section two">
            <div class="container-lg container-fluid">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-8">
                        <div class="section-title text-animation">
                            <h2>Ready to <span>ELEVATE?</span></h2>
                            <div class="dash-and-paragraph">
                                <div class="dash"></div>
                                <div class="content-and-social">
                                    <p>Start your journey towards success now by trying OutcomeMet today. Empower your team, delight your customers, and stay ahead of the competition. Don't delay, start optimising your product delivery right now!</p>
                                    <div class="social-area">
                                        <h6>Connect Us</h6>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="6" viewBox="0 0 50 6">
                                            <path d="M50 3L45 0.113249V5.88675L50 3ZM0 3.5H45.5V2.5H0V3.5Z" />
                                        </svg>
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/"><i class="bi bi-twitter-x"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/"><i class="bx bxl-instagram-alt"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-lg-flex justify-content-end align-items-center">
                        <div class="btn_wrapper">
                            <a class="circle-btn btn-hover two" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                    <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z"></path>
                                </svg>
                                Try for  <strong>Free</strong>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
    
        @php
          $contact = DB::table('header_section')->where('section','contact')->first();
        @endphp

        <footer class="home6-footer">
            <div class="container-lg container-fluid">
                <div class="row justify-content-center mb-70">
                    <div class="col-lg-7">
                        <div class="footer-top">
                            <h4>30 Days Free Trial</h4>
                            <p>Enables businesses to build and strengthen relationships with customers.</p>
                            <div class="contact-area">
                                <form>
                                    <div class="form-inner">
                                        <input type="text" placeholder="Enter Email" />
                                        <button type="submit" class="primary-btn3 btn-hover">
                                            Get Started
                                            <svg width="11" height="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M10.9532 0.0585938L10.7354 1.14748C10.5495 2.07672 10.2769 3.53489 10.1862 5.1213C10.0949 6.71893 10.193 8.37925 10.7022 9.73705C10.8476 10.1249 10.6511 10.5572 10.2633 10.7026C9.87545 10.8481 9.44314 10.6516 9.2977 10.2637C8.68188 8.62153 8.59246 6.71935 8.68867 5.03573C8.72547 4.39179 8.79012 3.76993 8.86653 3.19447L1.53028 10.5307C1.23739 10.8236 0.762511 10.8236 0.469618 10.5307C0.176725 10.2378 0.176725 9.76295 0.469618 9.47006L7.82522 2.11446C7.18266 2.19925 6.4871 2.27186 5.77631 2.31171C4.07609 2.40705 2.1819 2.32292 0.704509 1.68975C0.323786 1.52658 0.147423 1.08567 0.310589 0.704951C0.473756 0.324229 0.914665 0.147865 1.29539 0.311032C2.44299 0.802862 4.0488 0.906228 5.69233 0.814067C7.31342 0.723165 8.86773 0.449612 9.86173 0.263237L10.9532 0.0585938Z"
                                                />
                                            </svg>
                                            <span></span>
                                        </button>
                                    </div>
                                </form>
                                <ul>
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14 7C14 8.85652 13.2625 10.637 11.9497 11.9497C10.637 13.2625 8.85652 14 7 14C5.14348 14 3.36301 13.2625 2.05025 11.9497C0.737498 10.637 0 8.85652 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7ZM10.5262 4.34875C10.4637 4.28647 10.3893 4.23743 10.3074 4.20456C10.2256 4.1717 10.1379 4.15569 10.0497 4.15749C9.96144 4.15928 9.87449 4.17885 9.79401 4.21502C9.71352 4.25119 9.64116 4.30322 9.58125 4.368L6.54238 8.23987L4.711 6.40763C4.5866 6.29171 4.42206 6.2286 4.25204 6.2316C4.08203 6.2346 3.91982 6.30347 3.79958 6.42371C3.67934 6.54394 3.61047 6.70615 3.60747 6.87617C3.60447 7.04618 3.66758 7.21072 3.7835 7.33513L6.09875 9.65125C6.16112 9.71351 6.23539 9.76257 6.31714 9.7955C6.39888 9.82843 6.48642 9.84456 6.57453 9.84293C6.66264 9.84129 6.74952 9.82193 6.82998 9.78599C6.91045 9.75005 6.98285 9.69828 7.04287 9.63375L10.5359 5.2675C10.655 5.14369 10.7207 4.97812 10.7191 4.80634C10.7175 4.63456 10.6485 4.47027 10.5271 4.34875H10.5262Z"
                                            />
                                        </svg>
                                        No Credit Card Required.
                                    </li>
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14 7C14 8.85652 13.2625 10.637 11.9497 11.9497C10.637 13.2625 8.85652 14 7 14C5.14348 14 3.36301 13.2625 2.05025 11.9497C0.737498 10.637 0 8.85652 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7ZM10.5262 4.34875C10.4637 4.28647 10.3893 4.23743 10.3074 4.20456C10.2256 4.1717 10.1379 4.15569 10.0497 4.15749C9.96144 4.15928 9.87449 4.17885 9.79401 4.21502C9.71352 4.25119 9.64116 4.30322 9.58125 4.368L6.54238 8.23987L4.711 6.40763C4.5866 6.29171 4.42206 6.2286 4.25204 6.2316C4.08203 6.2346 3.91982 6.30347 3.79958 6.42371C3.67934 6.54394 3.61047 6.70615 3.60747 6.87617C3.60447 7.04618 3.66758 7.21072 3.7835 7.33513L6.09875 9.65125C6.16112 9.71351 6.23539 9.76257 6.31714 9.7955C6.39888 9.82843 6.48642 9.84456 6.57453 9.84293C6.66264 9.84129 6.74952 9.82193 6.82998 9.78599C6.91045 9.75005 6.98285 9.69828 7.04287 9.63375L10.5359 5.2675C10.655 5.14369 10.7207 4.97812 10.7191 4.80634C10.7175 4.63456 10.6485 4.47027 10.5271 4.34875H10.5262Z"
                                            />
                                        </svg>
                                        14 days free trial.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-menu-wrap">
                            <div class="row g-lg-4 gy-5">
                                <div class="col-lg-6 col-md-8 d-flex justify-content-lg-start">
                                    <div class="footer-widget">
                                        <div class="footer-logo">
                                            <a href="saas-product.html">
                                                <img src="{{asset('public/assetsindex/assets/img/logo.png')}}" alt />
                                            </a>
                                        </div>
                                        <div class="footer-content">
                                            <p>@if($contact) {{$contact->sub_title}}  @endif</p>
                                        </div>
                                        @php
                                          $footer = DB::table('header_section')->where('section','footer')->first();
                                          @endphp
                                        <ul class="social-area">
                                            <li>
                                                <a href="@if($footer) {{$footer->facebook}} @endif" target="_blank">
                                                    <i class="bx bxl-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="@if($footer) {{$footer->twitter}} @endif" target="_blank"><i class="bx bx-twitter-x"></i></a>
                                            </li>
                                            <li>
                                                <a href="@if($footer) {{$footer->instagram}} @endif" target="_blank"><i class="bx bxl-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex justify-content-lg-center justify-content-md-start">
                                    <div class="footer-widget">
                                        <div class="widget-title">
                                            <h4>Company</h4>
                                        </div>
                                        <div class="menu-container">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        About Us
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Contact Us
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Careers
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                
                                                <li>
                                                    <a href="#">
                                                        Blog & News
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 d-flex justify-content-md-end">
                                    <div class="footer-widget">
                                        <div class="widget-title">
                                            <h4>Solutions</h4>
                                        </div>
                                        <div class="menu-container">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        Sitemap
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Link
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Link
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Link
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                            <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-btm">
                    <div class="copyright-area">
                        <p>Copyright 2024 By Outcomemet</p>
                    </div>
                    <div class="terms-condition">
                        <p>
                            Our Business <a href="#">Policy, Terms & Condition</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>


         <script src="https://www.google.com/recaptcha/api.js"  async defer></script>
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{asset('public/assetsindex/assets/js/jquery-3.7.1.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/slick.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/waypoints.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.counterup.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.nice-select.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.fancybox.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/imagesloaded.pkgd.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/gsap.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/ScrollTrigger.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/SmoothScroll.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/simpleParallax.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/TweenMax.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/SplitText.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/DrawSVGPlugin3.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.marquee.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/main.js')}}"></script>

        <script>


        function SaveContact()
        {

        
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#number').val();
        var comment = $('#comment').val();
        
        var response = grecaptcha.getResponse();
          if(response.length == 0) {
            e.preventDefault();
            return false;
           }
           else {
               
           }

        if($('input[type=checkbox]').is(':checked')) {
         $(this).prop('checked',true);
        } else {
  
        return false;
        }
        $.ajax({
            type: "POST",
            url: "{{ url('save-contact') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name:name,
                email:email,
                phone:phone,
                comment:comment,

            },
            success: function(res) {
             
                $('#name').val('');
                $('#email').val('');
                $('#number').val('');
                $('#comment').val('');
                $('input[type="checkbox"]').prop('checked' , false);
                grecaptcha.reset(); 
                $('#error').html(
                        '<div class="alert alert-success" role="alert"> Contact Submitted Successfully</div>'
                    );
                    $('#epic-feild-error').html('');
                    setTimeout(function() {
                        $('#error').html('');
                    }, 3000);

            }
        });
    }
    

     $("#faq").click(function() {
    $('html, body').animate({
        scrollTop: $("#faqs").offset().top
    }, 2000);
});

     $("#contact").click(function() {
    $('html, body').animate({
        scrollTop: $("#contactus").offset().top
    }, 2000);
});

  $("#about").click(function() {
    $('html, body').animate({
        scrollTop: $(".feature").offset().top
    }, 2000);
});

    </script>
    </body>
</html>
