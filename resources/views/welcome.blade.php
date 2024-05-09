

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
                    <a class="logo-dark" href="index.html"><img alt="image" class="img-fluid" src="{{asset('public/assetsindex/assets/img/black-logo.svg')}}" /></a>
                    <a class="logo-light" href="index.html"><img alt="image" class="img-fluid" src="{{asset('public/assetsindex/assets/img/white-logo.svg')}}" /></a>
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
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="sidebar-contact">
                            <div class="getin-touch-area mb-60">
                                <h4>
                                    Get in Touch
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                    </svg>
                                </h4>
                                <ul>
                                    <li class="single-contact">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                <path
                                                    d="M14.2333 11.1504C13.8642 10.7667 13.4191 10.5615 12.9473 10.5615C12.4794 10.5615 12.0304 10.7629 11.6462 11.1466L10.4439 12.3433C10.345 12.2901 10.2461 12.2407 10.151 12.1913C10.014 12.1229 9.88467 12.0583 9.77433 11.9899C8.64819 11.2757 7.62476 10.345 6.64319 9.14067C6.16762 8.54043 5.84804 8.03516 5.61596 7.52229C5.92793 7.23736 6.21708 6.94104 6.49861 6.65611C6.60514 6.54974 6.71167 6.43957 6.8182 6.33319C7.61715 5.5354 7.61715 4.50207 6.8182 3.70427L5.77955 2.66714C5.66161 2.54937 5.53987 2.4278 5.42573 2.30623C5.19746 2.07069 4.95777 1.82755 4.71047 1.59961C4.34143 1.2349 3.9001 1.04115 3.43595 1.04115C2.97179 1.04115 2.52286 1.2349 2.1424 1.59961L2.13479 1.60721L0.841243 2.91027C0.35426 3.39655 0.076528 3.9892 0.0156552 4.67682C-0.0756541 5.78614 0.251537 6.81947 0.502638 7.4957C1.11898 9.15587 2.03968 10.6945 3.41312 12.3433C5.07952 14.3301 7.08452 15.8991 9.37486 17.0047C10.2499 17.4187 11.4179 17.9088 12.7229 17.9924C12.8028 17.9962 12.8865 18 12.9626 18C13.8414 18 14.5795 17.6847 15.1578 17.0578C15.1616 17.0502 15.1692 17.0464 15.173 17.0388C15.3708 16.7995 15.5991 16.583 15.8388 16.3512C16.0024 16.1955 16.1698 16.0321 16.3334 15.8611C16.71 15.4698 16.9079 15.014 16.9079 14.5467C16.9079 14.0756 16.7062 13.6235 16.322 13.2436L14.2333 11.1504ZM15.5953 15.1507C15.5915 15.1545 15.5915 15.1507 15.5953 15.1507C15.4469 15.3103 15.2947 15.4547 15.1311 15.6142C14.8838 15.8498 14.6327 16.0967 14.3969 16.374C14.0126 16.7843 13.5599 16.9781 12.9664 16.9781C12.9093 16.9781 12.8484 16.9781 12.7913 16.9743C11.6614 16.9021 10.6113 16.4614 9.82379 16.0853C7.67042 15.0444 5.77955 13.5665 4.20827 11.6936C2.91092 10.1322 2.04348 8.68859 1.46899 7.13859C1.11517 6.19263 0.985816 5.45562 1.04288 4.7604C1.08093 4.31591 1.25214 3.94741 1.56791 3.63209L2.86527 2.33662C3.05169 2.16187 3.24953 2.06689 3.44356 2.06689C3.68324 2.06689 3.87728 2.21125 3.99902 2.33282L4.01044 2.34422C4.24251 2.56076 4.46318 2.78491 4.69526 3.02424C4.8132 3.14581 4.93494 3.26738 5.05669 3.39275L6.09533 4.42988C6.49861 4.83258 6.49861 5.20488 6.09533 5.60758C5.985 5.71775 5.87847 5.82792 5.76814 5.9343C5.44856 6.26101 5.14419 6.56494 4.8132 6.86126C4.80559 6.86886 4.79798 6.87266 4.79417 6.88025C4.46698 7.20697 4.52786 7.52609 4.59634 7.74263L4.60775 7.77682C4.87787 8.43026 5.25833 9.0457 5.83662 9.77891L5.84043 9.78271C6.89048 11.0744 7.99761 12.0811 9.21887 12.8523C9.37486 12.9511 9.53465 13.0309 9.68683 13.1069C9.82379 13.1752 9.95315 13.2398 10.0635 13.3082C10.0787 13.3158 10.0939 13.3272 10.1091 13.3348C10.2385 13.3994 10.3602 13.4298 10.4858 13.4298C10.8016 13.4298 10.9994 13.2322 11.0641 13.1676L12.3652 11.8684C12.4946 11.7392 12.7 11.5834 12.9397 11.5834C13.1756 11.5834 13.3696 11.7316 13.4876 11.8608L13.4952 11.8684L15.5915 13.9616C15.9834 14.3491 15.9834 14.748 15.5953 15.1507ZM9.72868 4.28172C10.7255 4.44888 11.631 4.91996 12.3538 5.64177C13.0767 6.36359 13.5446 7.26775 13.7159 8.2631C13.7577 8.51383 13.9746 8.68859 14.2219 8.68859C14.2523 8.68859 14.2789 8.68479 14.3094 8.68099C14.5909 8.6354 14.7773 8.36947 14.7317 8.08834C14.5262 6.88405 13.9555 5.78614 13.0843 4.91616C12.2131 4.04618 11.1135 3.47633 9.90749 3.27118C9.62596 3.22559 9.36344 3.41175 9.31398 3.68907C9.26452 3.9664 9.44714 4.23613 9.72868 4.28172ZM17.9922 7.94018C17.6536 5.95709 16.7176 4.15255 15.2795 2.71652C13.8414 1.28049 12.0342 0.345932 10.0483 0.00781895C9.77053 -0.0415684 9.50802 0.148383 9.45856 0.425712C9.4129 0.70684 9.59932 0.968972 9.88086 1.01836C11.6538 1.31848 13.2707 2.15807 14.5567 3.43834C15.8426 4.72241 16.6796 6.33699 16.9802 8.10734C17.022 8.35808 17.2389 8.53283 17.4862 8.53283C17.5166 8.53283 17.5432 8.52903 17.5737 8.52523C17.8514 8.48344 18.0416 8.21751 17.9922 7.94018Z"
                                                />
                                            </svg>
                                        </div>
                                        <div class="contact">
                                            <span>Phone</span>
                                            <h6><a href="tel:+991-7636844563">+991 - 763 684 4563</a></h6>
                                        </div>
                                    </li>
                                    <li class="single-contact">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                <path
                                                    d="M0 4.5C0 3.90326 0.237053 3.33097 0.65901 2.90901C1.08097 2.48705 1.65326 2.25 2.25 2.25H15.75C16.3467 2.25 16.919 2.48705 17.341 2.90901C17.7629 3.33097 18 3.90326 18 4.5V13.5C18 14.0967 17.7629 14.669 17.341 15.091C16.919 15.5129 16.3467 15.75 15.75 15.75H2.25C1.65326 15.75 1.08097 15.5129 0.65901 15.091C0.237053 14.669 0 14.0967 0 13.5V4.5ZM2.25 3.375C1.95163 3.375 1.66548 3.49353 1.4545 3.7045C1.24353 3.91548 1.125 4.20163 1.125 4.5V4.74413L9 9.46912L16.875 4.74413V4.5C16.875 4.20163 16.7565 3.91548 16.5455 3.7045C16.3345 3.49353 16.0484 3.375 15.75 3.375H2.25ZM16.875 6.05587L11.5785 9.234L16.875 12.4931V6.05587ZM16.8367 13.7914L10.4918 9.8865L9 10.7809L7.50825 9.8865L1.16325 13.7903C1.22718 14.0296 1.36836 14.2412 1.56486 14.3922C1.76137 14.5431 2.00221 14.625 2.25 14.625H15.75C15.9976 14.625 16.2384 14.5434 16.4349 14.3926C16.6313 14.2419 16.7726 14.0306 16.8367 13.7914ZM1.125 12.4931L6.4215 9.234L1.125 6.05587V12.4931Z"
                                                />
                                            </svg>
                                        </div>
                                        <div class="contact">
                                            <span>Email Now</span>
                                            <h6>
                                                <a href="https://demo-egenslab.b-cdn.net/cdn-cgi/l/email-protection#6f060109002f0a170e021f030a08020e0603410c0002">
                                                    <span class="__cf_email__" data-cfemail="751c1b131a35100d14180519101218141c195b161a18">[email&#160;protected]</span>
                                                </a>
                                            </h6>
                                        </div>
                                    </li>
                                    <li class="single-contact">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18">
                                                <path
                                                    d="M11.8603 10.0575C11.249 11.2522 10.4207 12.4425 9.57367 13.5113C8.77018 14.5188 7.91105 15.484 7 16.4025C6.08893 15.484 5.2298 14.5188 4.42633 13.5113C3.57933 12.4425 2.751 11.2522 2.13967 10.0575C1.52133 8.85037 1.16667 7.71975 1.16667 6.75C1.16667 5.25816 1.78125 3.82742 2.87521 2.77252C3.96917 1.71763 5.4529 1.125 7 1.125C8.5471 1.125 10.0308 1.71763 11.1248 2.77252C12.2188 3.82742 12.8333 5.25816 12.8333 6.75C12.8333 7.71975 12.4775 8.85037 11.8603 10.0575ZM7 18C7 18 14 11.6033 14 6.75C14 4.95979 13.2625 3.2429 11.9497 1.97703C10.637 0.711159 8.85652 0 7 0C5.14348 0 3.36301 0.711159 2.05025 1.97703C0.737498 3.2429 2.76642e-08 4.95979 0 6.75C0 11.6033 7 18 7 18Z"
                                                />
                                                <path
                                                    d="M7 9C6.38116 9 5.78767 8.76295 5.35008 8.34099C4.9125 7.91903 4.66667 7.34674 4.66667 6.75C4.66667 6.15326 4.9125 5.58097 5.35008 5.15901C5.78767 4.73705 6.38116 4.5 7 4.5C7.61884 4.5 8.21233 4.73705 8.64992 5.15901C9.0875 5.58097 9.33333 6.15326 9.33333 6.75C9.33333 7.34674 9.0875 7.91903 8.64992 8.34099C8.21233 8.76295 7.61884 9 7 9ZM7 10.125C7.92826 10.125 8.8185 9.76942 9.47487 9.13649C10.1313 8.50355 10.5 7.64511 10.5 6.75C10.5 5.85489 10.1313 4.99645 9.47487 4.36351C8.8185 3.73058 7.92826 3.375 7 3.375C6.07174 3.375 5.1815 3.73058 4.52513 4.36351C3.86875 4.99645 3.5 5.85489 3.5 6.75C3.5 7.64511 3.86875 8.50355 4.52513 9.13649C5.1815 9.76942 6.07174 10.125 7 10.125V10.125Z"
                                                />
                                            </svg>
                                        </div>
                                        <div class="contact">
                                            <span>Canada Office</span>
                                            <h6><a href="https://www.google.com/maps">Canada City, Office-02, Road-11, House-3B/B, Section-H</a></h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="social-link-area">
                                <h6>
                                    Social Link
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z" />
                                    </svg>
                                </h6>
                                <ul class="social-area">
                                    <li>
                                        <a href="https://dribbble.com/"><i class="bi bi-dribbble"></i> Dribbble</a>
                                    </li>
                                    <li>
                                        <a href="https://www.behance.net/"><i class="bi bi-behance"></i> Behance</a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/"><i class="bi bi-pinterest"></i> Pinterest</a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i> Facebook</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="sidebar-menu-wrap">
                            <ul class="main-menu">
                                <li class="active">
                                    <a href="#">Home</a>
                                    
                                    <ul class="submenu-list active">
                                        <li class="active">
                                            <a href="index.html">Light Version</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="index.html">Digital Agency</a></li>
                                                <li><a href="software-agency.html">Software Agency</a></li>
                                                <li><a href="marketing-agency.html">Marketing Agency</a></li>
                                                <li><a href="design-studio.html">Design Studio</a></li>
                                                <li><a href="personal-portfolio.html">Personal Portfolio</a></li>
                                                <li class="active"><a href="saas-product.html">SaaS Product</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="digital-agency-dark.html">Dark Version</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="digital-agency-dark.html">Digital Agency</a></li>
                                                <li><a href="software-agency-dark.html">Software Agency</a></li>
                                                <li><a href="marketing-agency-dark.html">Marketing Agency</a></li>
                                                <li><a href="design-studio-dark.html">Design Studio</a></li>
                                                <li><a href="personal-portfolio-dark.html">Personal Portfolio</a></li>
                                                <li><a href="saas-product-dark.html">SaaS Product</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                    <span class="dropdown-icon2"><i class="bi bi-plus"></i></span>
                                    <ul class="submenu-list">
                                        <li>
                                            <a href="services1.html">
                                                Service Style 01
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="service2.html">
                                                Service Style 02
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="service3.html">
                                                Service Style 03
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="service4.html">
                                                Service Style 04
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="service-details.html">
                                                Service Details
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                    <span class="dropdown-icon2"><i class="bi bi-plus"></i></span>
                                    <ul class="submenu-list">
                                        <li>
                                            <a href="about.html">
                                                About Us
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="about-me.html">
                                                About Me
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="case-study1.html">Case Study</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="case-study1.html">Case Study Style 01</a></li>
                                                <li><a href="case-study2.html">Case Study Style 02</a></li>
                                                <li><a href="case-study-details.html">Case Study Details</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="our-team1.html">Our Team</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="our-team1.html">Team Style 01</a></li>
                                                <li><a href="our-team2.html">Team Style 02</a></li>
                                                <li><a href="our-team3.html">Team Style 03</a></li>
                                                <li><a href="our-team4.html">Team Style 04</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog-standard.html">Blog</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-grid2.html">Blog Sidebar</a></li>
                                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                                <li><a href="blog-details.html">Blog Details </a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="career-list.html">Career</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="career-list.html">Career List</a></li>
                                                <li><a href="career-details.html">Career Details </a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop.html">Shop</a>
                                            <span class="dropdown-icon2 two"><i class="bi bi-plus"></i></span>
                                            <ul class="submenu-list">
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="office-gallery.html">
                                                Office Gallery
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pricing.html">
                                                Pricing
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faq.html">
                                                FAQs
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="error.html">
                                                Error 404
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="terms-conditions.html">
                                                Terms & Conditions
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Portfolio </a>
                                    <span class="dropdown-icon2"><i class="bi bi-plus"></i></span>
                                    <ul class="submenu-list">
                                        <li>
                                            <a href="portfolio-manonery.html">
                                                Portfolio Masonery
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-vertical-grid.html">
                                                Portfolio Vertical Grid
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-showcase.html">
                                                Portfolio Showcase
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-showcase-slider.html">
                                                Portfolio Showcase Slider
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-showcase-carosuel.html">
                                                Portfolio Showcase Carosuel
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-showcase-horizental.html">
                                                Portfolio Horizental Showcase
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-interactive-banner.html">
                                                Interactive Banner
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-interactive-link.html">
                                                Interactive links
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="portfolio-details.html">
                                                Portfolio Details
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                                    <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
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
                                <a class="primary-btn4 btn-hover" href="{{url('/register')}}">Get’s Started <span></span></a>
                                <a class="primary-btn4 btn-hover two" href="https://www.youtube.com/watch?v=u31qwQUeGuM" data-fancybox="gallery">
                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8ZM6.79 5.093C6.71524 5.03977 6.62726 5.00814 6.53572 5.00159C6.44418 4.99503 6.35259 5.01379 6.27101 5.05583C6.18942 5.09786 6.12098 5.16154 6.07317 5.23988C6.02537 5.31823 6.00006 5.40822 6 5.5V10.5C6.00006 10.5918 6.02537 10.6818 6.07317 10.7601C6.12098 10.8385 6.18942 10.9021 6.27101 10.9442C6.35259 10.9862 6.44418 11.005 6.53572 10.9984C6.62726 10.9919 6.71524 10.9602 6.79 10.907L10.29 8.407C10.3548 8.36075 10.4076 8.29968 10.4441 8.22889C10.4805 8.1581 10.4996 8.07963 10.4996 8C10.4996 7.92037 10.4805 7.8419 10.4441 7.77111C10.4076 7.70031 10.3548 7.63925 10.29 7.593L6.79 5.093Z"
                                        />
                                    </svg>
                                    Watch Video <span></span>
                                </a>
                            </div>
                            <span>*14 days free trail, no credit card required.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-img-section notActiv mb-130">
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

        <div class="home6-feature-section mb-130" id="feature-section">
            <div class="container-lg container-fluid">
                <div class="row mb-70">
                    <div class="col-lg-6">
                        <div class="section-title3 text-animation">
                            <h2>@if($businessheader) {{$businessheader->title}}  @endif </h2>
                            <p>@if($businessheader) {{$businessheader->sub_title}}  @endif</p>
                        </div>
                        
                    </div>
                    <div class="performance-slider-wrap">
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="swiper home6-performance-slider">
                                    <div class="swiper-wrapper">
                                        @if(count($business) > 0)
                                        @foreach($business as $b)
                                        <div class="swiper-slide">
                                            <div class="performance-card">
                                                <div class="performance-img mt-3">
                                                    @if($b->image)
                                                    <img src="{{asset('public/images/'.$b->image)}}" alt="">
                                                    @else
                                                    <img src="{{asset('public/assetsindex/assets/img/mz img/image 6.png')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="performance-content">
                                                    <h4>{{$b->title}}</h4>
                                                    <p class="a-mzz">{{$b->sub_title}}</p>
                                                    <a href="{{$b->btn_link}}" class="d-flex mt-3">
                                                        <span class="material-symbols-outlined north-mz">
                                                            north_east
                                                            </span>
                                                            <p class=" a-mz">{{$b->btn_text}}</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        <!--<div class="swiper-slide">-->
                                        <!--    <div class="performance-card">-->
                                        <!--        <div class="performance-img mt-3">-->
                                        <!--            <img src="{{asset('public/assetsindex/assets/img/mz img/image 6.png')}}" alt="">-->
                                        <!--        </div>-->
                                        <!--        <div class="performance-content">-->
                                        <!--            <h4>Business Type</h4>-->
                                        <!--            <p class="a-mzz">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>-->
                                        <!--            <a href="" class="d-flex mt-3">-->
                                        <!--                <span class="material-symbols-outlined north-mz">-->
                                        <!--                    north_east-->
                                        <!--                    </span>-->
                                        <!--                    <p class=" a-mz">Read More</p>-->
                                        <!--            </a>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="swiper-slide">-->
                                        <!--    <div class="performance-card">-->
                                        <!--        <div class="performance-img mt-3">-->
                                        <!--            <img src="{{asset('public/assetsindex/assets/img/mz img/image 6.png')}}" alt="">-->
                                        <!--        </div>-->
                                        <!--        <div class="performance-content">-->
                                        <!--            <h4>Business Type</h4>-->
                                        <!--            <p class="a-mzz">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>-->
                                        <!--            <a href="" class="d-flex mt-3">-->
                                        <!--                <span class="material-symbols-outlined north-mz">-->
                                        <!--                    north_east-->
                                        <!--                    </span>-->
                                        <!--                    <p class=" a-mz">Read More</p>-->
                                        <!--            </a>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="swiper-slide">-->
                                        <!--    <div class="performance-card">-->
                                        <!--        <div class="performance-img mt-3">-->
                                        <!--            <img src="{{asset('public/assetsindex/assets/img/mz img/image 6.png')}}" alt="">-->
                                        <!--        </div>-->
                                        <!--        <div class="performance-content">-->
                                        <!--            <h4>Business Type</h4>-->
                                        <!--            <p class="a-mzz">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>-->
                                        <!--            <a href="" class="d-flex mt-3">-->
                                        <!--                <span class="material-symbols-outlined north-mz">-->
                                        <!--                    north_east-->
                                        <!--                    </span>-->
                                        <!--                    <p class=" a-mz">Read More</p>-->
                                        <!--            </a>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div class="slider-btn-group two">
                                    <div class="slider-btn prev-2">
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
                                    <div class="slider-btn next-2">
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
                            <div class="col-lg-12">
                                <div class="pagination-wrap d-none">
                                    <div class="pagination pagination1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
        $highlightheader = DB::table('header_section')->where('section','highlight-header')->first();
        $flags = DB::table('header_section')->where('section','flag')->get();
        @endphp

        <div class="home6-project-management-section mb-130" id="solution-section">
             <svg class="scroll-svg" viewBox="0 0 1578 1063" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    id="route-2"
                    d="M10.5 10C99.5 153 388.2 168.8 787 172C1185.8 175.2 1426.17 281.667 1496.5 334.5C1611.5 420.886 1574.58 547.5 684.5 547.5C-208 547.5 -60.5 999 486.5 900C958.47 814.579 1497 872 1567.5 1053"
                    stroke-width="20"
                    stroke-linecap="round"
                />
            </svg>
            <div class="container-lg container-fluid">
                <div class="row mb-70 justify-content-center">
                    <div class="col-lg-8 justify-content-center">
                        <div class="section-title3 text-animation justify-content-center">
                            <h5 class="text-center">@if($highlightheader) {{$highlightheader->sub_title}} @endif</h5>
                            <a href="{{url('/register')}}" class="gs-mz">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="row gy-5 position-relative">
                    @if(count($flags) > 0)
                    @foreach($flags as $flag)
                    
                    @php
                    $features = DB::table('header_section')->where('section',$flag->id)->get();
                    @endphp
                    <div class="col-lg-6">
                        <div class="single-project @if($flag->title == 'Flagging') flag-mz @endif @if($flag->title == 'Teams Onboarding') dteam-mz @endif @if($flag->title == 'Epics') epics @endif @if($flag->title == 'Risk Managment') risk-mz @endif magnetic-item">
                            <div class="content">
                                <h3>{{$flag->title}}</h3>
                                <ul>
                                    @if(count($features) > 0)
                                    @foreach($features as $feature)
                                    <li>
                                        <span class="material-symbols-outlined dot">
                                            fiber_manual_record
                                            </span>
                                        
                                        {{$feature->feature_highlight}}
                                    </li>
                                    @endforeach
                                    @endif
                                 
                                </ul>
                                
                            </div>
                            <div class="single-project-img">
                            @if($flag->image)
                            <img src="{{asset('public/images/'.$flag->image)}}" alt="">
                            @else
                            <img src="{{asset('public/assetsindex/assets/img/mz img/risk.png')}}" alt />
                            @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="single-project magnetic-item flag-mz">-->
                    <!--        <div class="content">-->
                    <!--            <h3>Flagging</h3>-->
                    <!--            <ul>-->
                    <!--                <li>-->
                    <!--                    <span class="material-symbols-outlined dot">-->
                    <!--                        fiber_manual_record-->
                    <!--                        </span>-->
                    <!--                    Lorem Ipsum is simply dummy text of the printing typesetting-->
                    <!--                </li>-->
                    <!--                <li>-->
                    <!--                    <span class="material-symbols-outlined dot">-->
                    <!--                        fiber_manual_record-->
                    <!--                        </span>s-->
                    <!--                    industry. Lorem Ipsum has been the industry's standard.-->
                    <!--                </li>-->
                    <!--            </ul>-->
                                
                    <!--        </div>-->
                    <!--        <div class="single-project-img">-->
                    <!--            <img src="{{asset('public/assetsindex/assets/img/mz img/flag.png')}}" alt />-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="single-project magnetic-item dteam-mz">-->
                    <!--        <div class="content">-->
                    <!--            <h3>Teams Onboarding</h3>-->
                    <!--            <ul>-->
                    <!--                <li>-->
                    <!--                    <span class="material-symbols-outlined dot">-->
                    <!--                        fiber_manual_record-->
                    <!--                        </span>-->
                    <!--                    Lorem Ipsum is simply dummy text of the printing typesetting -->
                    <!--                </li>-->
                    <!--                <li>-->
                    <!--                    <span class="material-symbols-outlined dot">-->
                    <!--                        fiber_manual_record-->
                    <!--                        </span>s-->
                    <!--                    industry. Lorem Ipsum has been the industry's standard.-->
                    <!--                </li>-->
                    <!--            </ul>-->
                                
                    <!--        </div>-->
                    <!--        <div class="single-project-img">-->
                    <!--            <img src="{{asset('public/assetsindex/assets/img/mz img/dteam.png')}}" alt />-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="single-project magnetic-item epics">-->
                    <!--        <div class="content">-->
                    <!--            <h3>Epics</h3>-->
                    <!--            <ul>-->
                    <!--                <li>-->
                    <!--                    <span class="material-symbols-outlined dot">-->
                    <!--                        fiber_manual_record-->
                    <!--                        </span>-->
                    <!--                    Lorem Ipsum is simply dummy text of the printing typesetting -->
                                        
                    <!--                </li>-->
                    <!--                <li>-->
                    <!--                    <span class="material-symbols-outlined dot">-->
                    <!--                        fiber_manual_record-->
                    <!--                        </span>s-->
                    <!--                    industry. Lorem Ipsum has been the industry's standard..-->
                    <!--                </li>-->
                    <!--            </ul>-->
                                
                    <!--        </div>-->
                    <!--        <div class="single-project-img">-->
                    <!--            <img src="{{asset('public/assetsindex/assets/img/mz img/epics.png')}}" alt />-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        
        @php
        $keyfeatures = DB::table('header_section')->where('section','feature')->get();
        @endphp

        <div class="home6-feature-section mb-130 feature" id="feature-section">
            <div class="container-lg container-fluid">
                <div class="row justify-content-center mb-70">
                    <div class="col-lg-6">
                        <div class="section-title3 text-center text-animation">
                            <h2>Key Features</h2>
                            <p>These features collectively contribute to a well-rounded Project Management System that helps teams efficiently plan, execute.</p>
                           
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
                    <!--<div class="col-xl-3 col-lg-4 col-sm-6">-->
                    <!--    <div class="feature-card magnetic-item">-->
                    <!--        <div class="icon">-->
                    <!--            <span class="material-symbols-outlined">-->
                    <!--                link-->
                    <!--                </span>-->
                    <!--        </div>-->
                    <!--        <div class="content">-->
                    <!--            <h5>OKR Mapper</h5>-->
                    <!--             <p>-->
                    <!--                It’s a tool project management refers to a tool or process used to visualize and align Objectives and Key Results in specific obejective-->
                    <!--             </p>-->
                    <!--             <a href="#" class="read-mz">-->
                    <!--                <span class="material-symbols-outlined arrow-mz">-->
                    <!--                    north_east-->
                    <!--                    </span>-->
                    <!--                    Read More-->
                    <!--             </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xl-3 col-lg-4 col-sm-6">-->
                    <!--    <div class="feature-card magnetic-item">-->
                    <!--        <div class="icon">-->
                    <!--            <span class="material-symbols-outlined">-->
                    <!--                folder_supervised-->
                    <!--                </span>-->
                    <!--        </div>-->
                    <!--        <div class="content">-->
                    <!--            <h5>OKR Planner</h5>-->
                    <!--            <p>Project management is a tool designed to assist teams in setting and tracking Objectives and Key Results for specific goals.</p>-->
                    <!--            <a href="#" class="read-mz">-->
                    <!--                <span class="material-symbols-outlined arrow-mz">-->
                    <!--                    north_east-->
                    <!--                    </span>-->
                    <!--                    Read More-->
                    <!--             </a>   -->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xl-3 col-lg-4 col-sm-6">-->
                    <!--    <div class="feature-card magnetic-item">-->
                    <!--        <div class="icon">-->
                    <!--            <span class="material-symbols-outlined">-->
                    <!--                key_visualizer-->
                    <!--                </span>-->
                    <!--        </div>-->
                    <!--        <div class="content">-->
                    <!--            <h5>Epic Backlog</h5>-->
                    <!--             <p>-->
                    <!--                An Epic Backlog is a collection of large, high-level user stories or initiatives that represent significant features-->
                    <!--             </p>-->
                    <!--             <a href="#" class="read-mz">-->
                    <!--                <span class="material-symbols-outlined arrow-mz">-->
                    <!--                    north_east-->
                    <!--                    </span>-->
                    <!--                    Read More-->
                    <!--             </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xl-3 col-lg-4 col-sm-6">-->
                    <!--    <div class="feature-card magnetic-item">-->
                    <!--        <div class="icon">-->
                    <!--            <span class="material-symbols-outlined">-->
                    <!--                summarize-->
                    <!--                </span>-->
                    <!--        </div>-->
                    <!--        <div class="content">-->
                    <!--            <h5>Reporting</h5>-->
                    <!--             <p>Involves the generation and analysis of data to provide insights into project progress, performance, and key metrics.</p>     -->
                    <!--             <a href="#" class="read-mz">-->
                    <!--                <span class="material-symbols-outlined arrow-mz">-->
                    <!--                    north_east-->
                    <!--                    </span>-->
                    <!--                    Read More-->
                    <!--             </a>-->
                    <!--            </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xl-3 col-lg-4 col-sm-6">-->
                    <!--    <div class="feature-card magnetic-item">-->
                    <!--        <div class="icon">-->
                    <!--            <span class="material-symbols-outlined">-->
                    <!--                block-->
                    <!--                </span>-->
                    <!--        </div>-->
                    <!--        <div class="content">-->
                    <!--            <h5>Risk Management</h5>-->
                    <!--              <p>-->
                    <!--                Project management involves identifying, prioritizing, and mitigating potential threats to project success.-->
                    <!--              </p>-->
                    <!--              <a href="#" class="read-mz">-->
                    <!--                <span class="material-symbols-outlined arrow-mz">-->
                    <!--                    north_east-->
                    <!--                    </span>-->
                    <!--                    Read More-->
                    <!--             </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-xl-3 col-lg-4 col-sm-6">-->
                    <!--    <div class="feature-card magnetic-item">-->
                    <!--        <div class="icon">-->
                    <!--            <span class="material-symbols-outlined">-->
                    <!--                call_to_action-->
                    <!--                </span>-->
                    <!--        </div>-->
                    <!--        <div class="content">-->
                    <!--            <h5>Action</h5>-->
                    <!--            <p>In project management, actions refer to specific tasks or steps taken to achieve milestones -->
                    <!--            </p></p>-->
                    <!--            <a href="#" class="read-mz">-->
                    <!--                <span class="material-symbols-outlined arrow-mz">-->
                    <!--                    north_east-->
                    <!--                    </span>-->
                    <!--                    Read More-->
                    <!--             </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="feature-card magnetic-item find-mz">
                            <div class="icon">
                                
                            </div>
                            <div class="content">
                                <h5>Find More</h5>
                                <p>Creating a higher spacing and how people move through </p>
                                <a href="">
                                    <span class="material-symbols-outlined arrowtwo-mz">
                                        north_east
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

        @php
        $software = DB::table('header_section')->where('section','software')->limit(5)->get();
        @endphp

<section class="software">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 text-center business">
                <h2>
                    Software designed for your business
                </h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br> Lorem Ipsum has been the industry's standard.
                </p>
            </div>
        </div>

        
        <div class="row mt-5">
            <div class="col-sm-5">

                <ul class="nav flex-column nav nav-tabs" id="myTab" role="tablist">
                    @if(count($software) > 0)
                    @foreach($software as $key => $item)
                    <li class="nav-item" style="border-style: none;!important;">
                      <a  style="border-style: none;!important;" class="bussines-links nav-link{{ $key === 0 ? ' active' : '' }}"  id="{{ $item->id }}-tab" data-bs-toggle="tab" data-bs-target="#home{{ $item->id }}" type="button" role="tab" aria-controls="home" aria-selected="true"><div class="d-flex">
                        @if($item->title === 'OKR Mapper')
                        <span class="material-symbols-outlined por-icons">
                            link
                            </span>
                        @endif
                        @if($item->title === 'OKR Planner')
                        <span class="material-symbols-outlined por-icons">
                            folder_supervised
                            </span>
                        @endif  
                        @if($item->title === 'Jira Integration')
                        <span class="material-symbols-outlined por-icons">
                            call_to_action
                            </span>
                        @endif  
                        @if($item->title === 'Portfolio Managment')
                        <span class="material-symbols-outlined por-icons">
                            description
                            </span>
                        @endif
                        @if($item->title === 'Team')
                        <span class="material-symbols-outlined por-icons">
                            groups
                            </span>
                        @endif       
                            <div> <h5>
                               {{$item->title}}
                         </h5>
                         <p>
                            {{$item->sub_title}}
                         </p></div>
                           
                    </div>
                </a>
                    </li>
                    @endforeach
                    @endif

                  </ul>
                
                
            </div>
            <div class="col-sm-7">
                <div class="tab-content">
                    @if(count($software) > 0)
                    @foreach($software as $key => $item)
                    <div class="tab-pane{{ $key === 0 ? ' active' : '' }}" id="home{{ $item->id }}" role="tabpanel" aria-labelledby="#{{ $item->id }}-tab"><img src="{{asset('public/images/'.$item->image)}}" alt=""></div>
                    @endforeach
                    @endif
                  </div>
            </div>
        </div>
    
    </div>
</section>


  
  <!-- Tab panes -->
 

        <div class="home6-faq-section mb-130">
            <div class="container-lg container-fluid">
                @php
                $message = DB::table('header_section')->where('section','message')->first();
                @endphp
                     
            <div class="row hadilton">
                <div class="col-lg-8">
                   <h3>
                    "<br>
                 @if($message) {{$message->message}} @endif
                    <br>
                    "
                   </h3>
                   <h6>
                    Hadilton Barbosa
                   </h6> 
                   <p>
                    Co-Founder of Company
                   </p>
                </div>
                <div class="col-lg-4">
                     <img src="{{asset('public/assetsindex/assets/img/barbosa.png')}}" alt="">
                </div>
            </div>

             @php
             $faqs = DB::table('faqs')->get();
            @endphp
                <div class="row justify-content-center mb-60">

                    
                    <div class="col-xl-8 col-lg-10" id="faqs">
                        
                        <div class="section-title3 text-center text-animation">
                            <h2>Got Questions? We've Got Answers! Explore Our FAQ </h2>
                            <p>Here's a list of frequently asked questions (FAQs) for a project management</p>
                        </div>
                    </div>
                </div>
                <div class="faq-wrappper" >
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="faq-content">
                                <div class="accordion" id="accordionGeneral">
                                    @if(count($faqs) > 0)
                                    @foreach($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faqheadingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseOne{{$faq->id}}" aria-expanded="true" aria-controls="faqcollapseOne">
                                                {{$faq->question}}
                                            </button>
                                        </h2>
                                        <div id="faqcollapseOne{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="faqheadingOne" data-bs-parent="#accordionGeneral">
                                            <div class="accordion-body">
                                               {{$faq->answer}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="faqheadingTwo">-->
                                    <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseTwo" aria-expanded="false" aria-controls="faqcollapseTwo">-->
                                    <!--            How does Project Management SaaS benefit my team?-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="faqcollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqheadingTwo" data-bs-parent="#accordionGeneral">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            Project Management Software as a Service (SaaS) offers several benefits to your team by providing a centralized and collaborative platform. It enhances interaction, and facilitates efficient-->
                                    <!--            task management, enabling teams to meet deadlines and milestones.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="faqheadingThree">-->
                                    <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseThree" aria-expanded="false" aria-controls="faqcollapseThree">-->
                                    <!--            What features does a typical Project Management SaaS offer?-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="faqcollapseThree" class="accordion-collapse collapse" aria-labelledby="faqheadingThree" data-bs-parent="#accordionGeneral">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            A typical Project Management Software as a Service (SaaS) offers a range of features to streamline project workflows. These include task management for organizing and assigning work,-->
                                    <!--            collaboration features to facilitate team communication.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="faqheadingFour">-->
                                    <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseFour" aria-expanded="false" aria-controls="faqcollapseFour">-->
                                    <!--            Is my data secure in a Project Management SaaS?-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="faqcollapseFour" class="accordion-collapse collapse" aria-labelledby="faqheadingFour" data-bs-parent="#accordionGeneral">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            Data security in Project Management Software as a Service (SaaS) is a priority for providers. Reputable platforms implement robust security measures, including encryption protocols, access-->
                                    <!--            controls, and regular security audits to safeguard user data.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="faqheadingFive">-->
                                    <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseFive" aria-expanded="false" aria-controls="faqcollapseFive">-->
                                    <!--            Can I access the Project Management SaaS from any device?-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="faqcollapseFive" class="accordion-collapse collapse" aria-labelledby="faqheadingFive" data-bs-parent="#accordionGeneral">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            Yes, Project Management Software as a Service (SaaS) is typically designed to be accessible from any device with an internet connection. Most modern project management SaaS platforms offer-->
                                    <!--            responsive web interfaces that adapt to various screen sizes, enabling users to access the system from desktops, laptops, tablets, and smartphones.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="faqheadingSix">-->
                                    <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseSix" aria-expanded="false" aria-controls="faqcollapseSix">-->
                                    <!--            How scalable is a Project Management SaaS solution?-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="faqcollapseSix" class="accordion-collapse collapse" aria-labelledby="faqheadingSix" data-bs-parent="#accordionGeneral">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            A Project Management SaaS (Software as a Service) solution is typically highly scalable, offering the flexibility to adapt to the needs of various projects and team sizes. These platforms are-->
                                    <!--            designed to handle both small-scale projects with minimal complexity.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="faqheadingSeven">-->
                                    <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqcollapseSeven" aria-expanded="false" aria-controls="faqcollapseSeven">-->
                                    <!--            How does collaboration work in Project Management SaaS?-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="faqcollapseSeven" class="accordion-collapse collapse" aria-labelledby="faqheadingSeven" data-bs-parent="#accordionGeneral">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            In Project Management Software as a Service (SaaS), collaboration is streamlined through centralized platforms that enable real-time communication. Team members can collaborate on tasks, share-->
                                    <!--            documents, and engage in discussions within the software.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         
        @php
        $plan = DB::table('plan')->where('status','Active')->where('billing_method','month')->orderby('id','DESC')->get();
        @endphp

        <div class="pricing-page pt-130 mb-130">
            <div class="container-lg container-fluid">
                <div class="section-title-and-tab-btn mb-70">
                    <h1>Choose Your Favourite Pricing Package</h1>
                    <div class="arrow-and-tab-btn">
                        <svg viewBox="0 0 987 58" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 29H985M985 29C976.333 32.1667 959 41.4 959 57M985 29C976.333 25.8333 959 15.8 959 1" stroke-linecap="round"></path>
                        </svg>
                        <div class="tab-btn-area">
                            <div class="discount d-lg-flex d-none">
                                
                                {{-- <svg width="70" height="66" viewBox="0 0 70 66" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.97538 2.48012L0.882007 0.299733L1.11799 6.06841L6.01626 3.47928L5.97538 2.48012ZM44.5932 37.7329L44.0936 37.7115L44.5932 37.7329ZM28.1429 33.0216L28.6424 32.9989L28.1429 33.0216ZM56.9309 37.7329L56.5856 38.0945L56.9309 37.7329ZM66.801 66L69.9059 61.1325L64.1381 60.8773L66.801 66ZM5.49693 3.50008C13.3443 3.51314 23.3093 5.19973 31.1467 10.3139C38.9497 15.4056 44.6834 23.9166 44.0936 37.7115L45.0927 37.7542C45.6979 23.5993 39.7857 14.7571 31.6932 9.47641C23.6351 4.21822 13.4549 2.51332 5.49859 2.50008L5.49693 3.50008ZM44.0936 37.7115C43.9548 40.9578 42.938 43.3351 41.5341 44.822C40.1345 46.3042 38.3337 46.9241 36.5364 46.6544C32.9506 46.1163 29.0488 41.923 28.6424 32.9989L27.6434 33.0444C28.0587 42.1628 32.0967 46.9993 36.388 47.6433C38.5292 47.9646 40.6512 47.2136 42.2611 45.5086C43.8667 43.8082 44.9461 41.182 45.0927 37.7542L44.0936 37.7115ZM28.6424 32.9989C28.4388 28.5296 29.4257 26.1165 30.9779 25.0136C32.5381 23.9049 34.8818 23.9658 37.7801 24.9887C43.5478 27.0244 50.8867 32.6542 56.5856 38.0945L57.2761 37.3712C51.5565 31.9111 44.0902 26.1554 38.1129 24.0457C35.1387 22.996 32.375 22.7941 30.3987 24.1984C28.4144 25.6084 27.4357 28.4838 27.6434 33.0444L28.6424 32.9989ZM56.5856 38.0945C61.6707 42.9489 66.4777 49.5101 66.4999 61.5049L67.4999 61.503C67.477 49.1656 62.5013 42.3593 57.2761 37.3712L56.5856 38.0945Z"
                                    ></path>
                                </svg> --}}
                            </div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Monthly</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" tabindex="-1">
                                        Yearly
                                        <span class="d-lg-none d-block">-20 save</span>
                                    </button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="row g-xl-3 gy-4 align-items-center justify-content-center">
                            @foreach($plan as $p)

                            @php
                            $dataArray = explode(',', $p->module);
                            @endphp
                            <div class="col-xl-4 col-md-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="pricing-card">
                                    <div class="pricing-top">
                                        <span>{{$p->plan_title}}</span>
                                        <h2>${{$p->base_price}}<sub>/per {{$p->billing_method}}</sub></h2>
                                    </div>
                                    <div class="pricing-content">
                                        <ul>
                                            @foreach($dataArray as $arr)
                                            <li>
                                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M9.0603 5.37756C9.10105 5.4182 9.13337 5.46647 9.15543 5.51963C9.17748 5.57278 9.18883 5.62976 9.18883 5.68731C9.18883 5.74485 9.17748 5.80183 9.15543 5.85498C9.13337 5.90814 9.10105 5.95642 9.0603 5.99706L6.4353 8.62206C6.39466 8.6628 6.34638 8.69512 6.29323 8.71718C6.24008 8.73923 6.1831 8.75059 6.12555 8.75059C6.06801 8.75059 6.01103 8.73923 5.95787 8.71718C5.90472 8.69512 5.85644 8.6628 5.8158 8.62206L4.5033 7.30956C4.46263 7.26888 4.43036 7.22059 4.40834 7.16744C4.38633 7.11429 4.375 7.05733 4.375 6.99981C4.375 6.94228 4.38633 6.88532 4.40834 6.83217C4.43036 6.77902 4.46263 6.73073 4.5033 6.69006C4.54398 6.64938 4.59227 6.61711 4.64542 6.5951C4.69856 6.57308 4.75553 6.56175 4.81305 6.56175C4.87058 6.56175 4.92754 6.57308 4.98069 6.5951C5.03384 6.61711 5.08213 6.64938 5.1228 6.69006L6.12555 7.69368L8.4408 5.37756C8.48144 5.33681 8.52972 5.30449 8.58287 5.28243C8.63603 5.26038 8.69301 5.24902 8.75055 5.24902C8.8081 5.24902 8.86508 5.26038 8.91823 5.28243C8.97138 5.30449 9.01966 5.33681 9.0603 5.37756Z"
                                                        ></path>
                                                        <path
                                                            d="M8.98817 2.19915L8.1823 1.37315L8.80792 0.762397L9.35217 1.31977L10.1309 1.31015C10.468 1.30616 10.8025 1.36961 11.1147 1.49677C11.4269 1.62394 11.7106 1.81225 11.9489 2.05062C12.1873 2.289 12.3756 2.57264 12.5028 2.88485C12.63 3.19707 12.6934 3.53155 12.6894 3.86865L12.6807 4.6474L13.2372 5.19165C13.4782 5.42717 13.6697 5.7085 13.8005 6.01909C13.9312 6.32968 13.9986 6.66328 13.9986 7.00027C13.9986 7.33727 13.9312 7.67086 13.8005 7.98146C13.6697 8.29205 13.4782 8.57337 13.2372 8.8089L12.6798 9.35315L12.6894 10.1319C12.6934 10.469 12.63 10.8035 12.5028 11.1157C12.3756 11.4279 12.1873 11.7115 11.9489 11.9499C11.7106 12.1883 11.4269 12.3766 11.1147 12.5038C10.8025 12.6309 10.468 12.6944 10.1309 12.6904L9.35217 12.6816L8.80792 13.2381C8.5724 13.4792 8.29107 13.6707 7.98048 13.8015C7.66989 13.9322 7.33629 13.9996 6.9993 13.9996C6.6623 13.9996 6.32871 13.9322 6.01811 13.8015C5.70752 13.6707 5.42619 13.4792 5.19067 13.2381L4.64642 12.6808L3.86767 12.6904C3.53058 12.6944 3.19609 12.6309 2.88387 12.5038C2.57166 12.3766 2.28803 12.1883 2.04965 11.9499C1.81127 11.7115 1.62296 11.4279 1.4958 11.1157C1.36863 10.8035 1.30518 10.469 1.30917 10.1319L1.31792 9.35315L0.761421 8.8089C0.520394 8.57337 0.328874 8.29205 0.198116 7.98146C0.0673581 7.67086 0 7.33727 0 7.00027C0 6.66328 0.0673581 6.32968 0.198116 6.01909C0.328874 5.7085 0.520394 5.42717 0.761421 5.19165L1.3188 4.6474L1.30917 3.86865C1.30518 3.53155 1.36863 3.19707 1.4958 2.88485C1.62296 2.57264 1.81127 2.289 2.04965 2.05062C2.28803 1.81225 2.57166 1.62394 2.88387 1.49677C3.19609 1.36961 3.53058 1.30616 3.86767 1.31015L4.64642 1.3189L5.19067 0.762397C5.42619 0.52137 5.70752 0.32985 6.01811 0.199093C6.32871 0.0683346 6.6623 0.000976562 6.9993 0.000976562C7.33629 0.000976562 7.66989 0.0683346 7.98048 0.199093C8.29107 0.32985 8.5724 0.52137 8.80792 0.762397L8.1823 1.37315C8.02826 1.21546 7.84426 1.09016 7.6411 1.00461C7.43794 0.919062 7.21973 0.874992 6.9993 0.874992C6.77886 0.874992 6.56065 0.919062 6.35749 1.00461C6.15433 1.09016 5.97033 1.21546 5.8163 1.37315L5.0113 2.19915L3.8563 2.18515C3.63595 2.18268 3.41734 2.22428 3.2133 2.3075C3.00925 2.39071 2.8239 2.51386 2.66812 2.66972C2.51235 2.82558 2.38929 3.011 2.30618 3.21508C2.22308 3.41917 2.18159 3.6378 2.18417 3.85815L2.19817 5.0114L1.37217 5.81727C1.21448 5.97131 1.08918 6.15531 1.00363 6.35847C0.918086 6.56163 0.874016 6.77984 0.874016 7.00027C0.874016 7.22071 0.918086 7.43892 1.00363 7.64208C1.08918 7.84523 1.21448 8.02924 1.37217 8.18327L2.19817 8.98827L2.18417 10.1433C2.18171 10.3636 2.2233 10.5822 2.30652 10.7863C2.38973 10.9903 2.51289 11.1757 2.66875 11.3314C2.8246 11.4872 3.01002 11.6103 3.21411 11.6934C3.41819 11.7765 3.63683 11.818 3.85717 11.8154L5.01042 11.8014L5.8163 12.6274C5.97033 12.7851 6.15433 12.9104 6.35749 12.9959C6.56065 13.0815 6.77886 13.1256 6.9993 13.1256C7.21973 13.1256 7.43794 13.0815 7.6411 12.9959C7.84426 12.9104 8.02826 12.7851 8.1823 12.6274L8.9873 11.8014L10.1423 11.8154C10.3626 11.8179 10.5813 11.7763 10.7853 11.693C10.9893 11.6098 11.1747 11.4867 11.3305 11.3308C11.4862 11.175 11.6093 10.9895 11.6924 10.7855C11.7755 10.5814 11.817 10.3627 11.8144 10.1424L11.8004 8.98915L12.6264 8.18327C12.7841 8.02924 12.9094 7.84523 12.995 7.64208C13.0805 7.43892 13.1246 7.22071 13.1246 7.00027C13.1246 6.77984 13.0805 6.56163 12.995 6.35847C12.9094 6.15531 12.7841 5.97131 12.6264 5.81727L11.8004 5.01227L11.8144 3.85727C11.8169 3.63693 11.7753 3.41831 11.6921 3.21427C11.6089 3.01023 11.4857 2.82488 11.3298 2.6691C11.174 2.51332 10.9886 2.39027 10.7845 2.30716C10.5804 2.22405 10.3618 2.18257 10.1414 2.18515L8.98817 2.19915Z"
                                                        ></path>
                                                    </g>
                                                </svg>
                                                {{$arr}}
                                            </li>
                                            @endforeach
                                         
                                          
                                     
                                       
                                      
                                        </ul>
                                        <a href="#" class="primary-btn5 black btn-hover">
                                            Buy Package
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z"></path>
                                            </svg>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                    @php
                    $Yearplan = DB::table('plan')->where('status','Active')->where('billing_method','year')->orderby('id','DESC')->get();
                    @endphp
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <div class="row g-xl-3 gy-4 align-items-center justify-content-center">
                            @foreach($Yearplan as $yp)

                            @php
                            $dataArrayyear = explode(',', $yp->module);
                            @endphp

                            <div class="col-xl-4 col-md-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="pricing-card">
                                    <div class="pricing-top">
                                        <span>{{$yp->plan_title}}</span>
                                        <h2>${{$yp->base_price}}<sub>/per {{$yp->billing_method}}</sub></h2>
                                    </div>
                                    <div class="pricing-content">
                                        <ul>
                                            @foreach($dataArrayyear as $plan_feature)
                                            <li>
                                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M9.0603 5.37756C9.10105 5.4182 9.13337 5.46647 9.15543 5.51963C9.17748 5.57278 9.18883 5.62976 9.18883 5.68731C9.18883 5.74485 9.17748 5.80183 9.15543 5.85498C9.13337 5.90814 9.10105 5.95642 9.0603 5.99706L6.4353 8.62206C6.39466 8.6628 6.34638 8.69512 6.29323 8.71718C6.24008 8.73923 6.1831 8.75059 6.12555 8.75059C6.06801 8.75059 6.01103 8.73923 5.95787 8.71718C5.90472 8.69512 5.85644 8.6628 5.8158 8.62206L4.5033 7.30956C4.46263 7.26888 4.43036 7.22059 4.40834 7.16744C4.38633 7.11429 4.375 7.05733 4.375 6.99981C4.375 6.94228 4.38633 6.88532 4.40834 6.83217C4.43036 6.77902 4.46263 6.73073 4.5033 6.69006C4.54398 6.64938 4.59227 6.61711 4.64542 6.5951C4.69856 6.57308 4.75553 6.56175 4.81305 6.56175C4.87058 6.56175 4.92754 6.57308 4.98069 6.5951C5.03384 6.61711 5.08213 6.64938 5.1228 6.69006L6.12555 7.69368L8.4408 5.37756C8.48144 5.33681 8.52972 5.30449 8.58287 5.28243C8.63603 5.26038 8.69301 5.24902 8.75055 5.24902C8.8081 5.24902 8.86508 5.26038 8.91823 5.28243C8.97138 5.30449 9.01966 5.33681 9.0603 5.37756Z"
                                                        ></path>
                                                        <path
                                                            d="M8.98817 2.19915L8.1823 1.37315L8.80792 0.762397L9.35217 1.31977L10.1309 1.31015C10.468 1.30616 10.8025 1.36961 11.1147 1.49677C11.4269 1.62394 11.7106 1.81225 11.9489 2.05062C12.1873 2.289 12.3756 2.57264 12.5028 2.88485C12.63 3.19707 12.6934 3.53155 12.6894 3.86865L12.6807 4.6474L13.2372 5.19165C13.4782 5.42717 13.6697 5.7085 13.8005 6.01909C13.9312 6.32968 13.9986 6.66328 13.9986 7.00027C13.9986 7.33727 13.9312 7.67086 13.8005 7.98146C13.6697 8.29205 13.4782 8.57337 13.2372 8.8089L12.6798 9.35315L12.6894 10.1319C12.6934 10.469 12.63 10.8035 12.5028 11.1157C12.3756 11.4279 12.1873 11.7115 11.9489 11.9499C11.7106 12.1883 11.4269 12.3766 11.1147 12.5038C10.8025 12.6309 10.468 12.6944 10.1309 12.6904L9.35217 12.6816L8.80792 13.2381C8.5724 13.4792 8.29107 13.6707 7.98048 13.8015C7.66989 13.9322 7.33629 13.9996 6.9993 13.9996C6.6623 13.9996 6.32871 13.9322 6.01811 13.8015C5.70752 13.6707 5.42619 13.4792 5.19067 13.2381L4.64642 12.6808L3.86767 12.6904C3.53058 12.6944 3.19609 12.6309 2.88387 12.5038C2.57166 12.3766 2.28803 12.1883 2.04965 11.9499C1.81127 11.7115 1.62296 11.4279 1.4958 11.1157C1.36863 10.8035 1.30518 10.469 1.30917 10.1319L1.31792 9.35315L0.761421 8.8089C0.520394 8.57337 0.328874 8.29205 0.198116 7.98146C0.0673581 7.67086 0 7.33727 0 7.00027C0 6.66328 0.0673581 6.32968 0.198116 6.01909C0.328874 5.7085 0.520394 5.42717 0.761421 5.19165L1.3188 4.6474L1.30917 3.86865C1.30518 3.53155 1.36863 3.19707 1.4958 2.88485C1.62296 2.57264 1.81127 2.289 2.04965 2.05062C2.28803 1.81225 2.57166 1.62394 2.88387 1.49677C3.19609 1.36961 3.53058 1.30616 3.86767 1.31015L4.64642 1.3189L5.19067 0.762397C5.42619 0.52137 5.70752 0.32985 6.01811 0.199093C6.32871 0.0683346 6.6623 0.000976562 6.9993 0.000976562C7.33629 0.000976562 7.66989 0.0683346 7.98048 0.199093C8.29107 0.32985 8.5724 0.52137 8.80792 0.762397L8.1823 1.37315C8.02826 1.21546 7.84426 1.09016 7.6411 1.00461C7.43794 0.919062 7.21973 0.874992 6.9993 0.874992C6.77886 0.874992 6.56065 0.919062 6.35749 1.00461C6.15433 1.09016 5.97033 1.21546 5.8163 1.37315L5.0113 2.19915L3.8563 2.18515C3.63595 2.18268 3.41734 2.22428 3.2133 2.3075C3.00925 2.39071 2.8239 2.51386 2.66812 2.66972C2.51235 2.82558 2.38929 3.011 2.30618 3.21508C2.22308 3.41917 2.18159 3.6378 2.18417 3.85815L2.19817 5.0114L1.37217 5.81727C1.21448 5.97131 1.08918 6.15531 1.00363 6.35847C0.918086 6.56163 0.874016 6.77984 0.874016 7.00027C0.874016 7.22071 0.918086 7.43892 1.00363 7.64208C1.08918 7.84523 1.21448 8.02924 1.37217 8.18327L2.19817 8.98827L2.18417 10.1433C2.18171 10.3636 2.2233 10.5822 2.30652 10.7863C2.38973 10.9903 2.51289 11.1757 2.66875 11.3314C2.8246 11.4872 3.01002 11.6103 3.21411 11.6934C3.41819 11.7765 3.63683 11.818 3.85717 11.8154L5.01042 11.8014L5.8163 12.6274C5.97033 12.7851 6.15433 12.9104 6.35749 12.9959C6.56065 13.0815 6.77886 13.1256 6.9993 13.1256C7.21973 13.1256 7.43794 13.0815 7.6411 12.9959C7.84426 12.9104 8.02826 12.7851 8.1823 12.6274L8.9873 11.8014L10.1423 11.8154C10.3626 11.8179 10.5813 11.7763 10.7853 11.693C10.9893 11.6098 11.1747 11.4867 11.3305 11.3308C11.4862 11.175 11.6093 10.9895 11.6924 10.7855C11.7755 10.5814 11.817 10.3627 11.8144 10.1424L11.8004 8.98915L12.6264 8.18327C12.7841 8.02924 12.9094 7.84523 12.995 7.64208C13.0805 7.43892 13.1246 7.22071 13.1246 7.00027C13.1246 6.77984 13.0805 6.56163 12.995 6.35847C12.9094 6.15531 12.7841 5.97131 12.6264 5.81727L11.8004 5.01227L11.8144 3.85727C11.8169 3.63693 11.7753 3.41831 11.6921 3.21427C11.6089 3.01023 11.4857 2.82488 11.3298 2.6691C11.174 2.51332 10.9886 2.39027 10.7845 2.30716C10.5804 2.22405 10.3618 2.18257 10.1414 2.18515L8.98817 2.19915Z"
                                                        ></path>
                                                    </g>
                                                </svg>
                                                {{$plan_feature}}
                                            </li>
                                            @endforeach
                                      
                                      
                                         
                                            
                                         
                                        </ul>
                                        <a href="#" class="primary-btn5 black btn-hover">
                                            Buy Package
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z"></path>
                                            </svg>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>


          @php
          $contact = DB::table('header_section')->where('section','contact')->first();
          @endphp
          
        <section class="footer" id="contactus">
            <div class="container">
              <div class="row bgg">
                <div class="col-sm-5 animation">
                  <h2 class="show-animation" data-aos="flip-up">
                    @if($contact) {{$contact->title}}  @endif
                  </h2>
                  <p>@if($contact) {{$contact->sub_title}}  @endif</p>
                </div>
               
                <div class="col-sm-5 forrm">
                    <div id="error"></div>
                  <form action="/action_page.php" method="POST">
                    <div class="mb-3 mt-3">
                      
                      <input type="name" class="form-control okk" id="name" placeholder="Shahzad Mughal" name="name">
                    </div>
                    <div class="mb-3">
                     
                      <input type="email" class="form-control okk" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                     
                      <input type="number" class="form-control okk" id="number" placeholder="Phone Number" name="pswd">
                    </div>
                    <div class="mb-3">
                      <textarea class="form-control" rows="5" id="comment" name="text"> Write anything</textarea>
                    </div>
                    <div class="form-check mb-3">
                      <label class="form-check-label">
                        <input class="form-check-input" id="check" type="checkbox" name="remember"> I agree to the terms and conditions
                      </label>
                    </div>
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    <button type="button" onclick="SaveContact();" class="btn btn-primary">Submit Form</button>
                  </form>
                </div>
              </div>



              @php
              $footer = DB::table('header_section')->where('section','footer')->first();
              @endphp
              
              <div class="row last mt-3 ">
                <div class="col-sm-3 logos d-none d-sm-block">
                 
               
                  <img src="{{asset('public/assetsindex/assets/img/logo.png')}}" alt="">
              
                </div>
                <div class="col-sm-6 text-center para  d-none d-sm-block">
                  <p>
                    © 2024 company name. All rights reserved. 
                  </p>
                </div>
                <div class="col-sm-3 iconss  d-none d-sm-block">
                 <a href="@if($footer) {{$footer->facebook}} @endif" target="_blank" class="okkk">
                    <img src="{{asset('public/assetsindex/assets/img/mz img/facebook.png')}}" alt="">
                 </a>
                 <a href="@if($footer) {{$footer->twitter}} @endif" target="_blank">
                    <img src="{{asset('public/assetsindex/assets/img/mz img/instagram (1).png')}}" alt="">
                 </a>
                 <a href="@if($footer) {{$footer->instagram}} @endif" target="_blank">
                    <img src="{{asset('public/assetsindex/assets/img/mz img/twitter.png')}}" alt="">
                 </a>
                </div>
              </div>
              <div class="row mt-3 d-md-none">
                <div class="col-12 d-md-none d-flex  justify-content-between">
                    <img src="assets/img/logo.png" alt="">
                  <div class=" iconss ">
                    <a href="#" class="okkk">
                    <img src="{{asset('public/assetsindex/assets/img/mz img/facebook.png')}}" alt="">
                    </a>
                    <a href="#">
                     <img src="{{asset('public/assetsindex/assets/img/mz img/instagram (1).png')}}" alt="">
                    </a>
                    <a href="#">
                     <img src="{{asset('public/assetsindex/assets/img/mz img/twitter.png')}}" alt="">
                    </a>
                   </div>
                </div>
                <div class="col-12 d-md-none text-center  mt-2 para">
                    <p class="">
                        © 2024 company name. All rights reserved. 
                      </p>
                </div>
              </div>
            </div>
        </section>


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
