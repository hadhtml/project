<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{asset('public/assetsindex/assets/css/bootstrap.min.css')}}" rel="stylesheet" />

        <link href="{{asset('public/assetsindex/assets/css/bootstrap-icons.css')}}" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/swiper-bundle.min.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/nice-select.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/jquery.fancybox.min.css')}}" />

        <link href="{{asset('public/assetsindex/assets/css/boxicons.min.css" rel="stylesheet')}}" />
        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/style.css')}}" />

        <title>Contact Us</title>
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
                                <li>
                                    <a href="url('/')">Home</a>
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

        @include('site-components.header')

        <div class="breadcrumb-section" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{asset('public/assetsindex/assets/img/innerpage/breadcrumb-bg3.jpg')}}');">
            <svg class="vector" xmlns="http://www.w3.org/2000/svg" width="300" height="374" viewBox="0 0 300 374" fill="none">
                <path d="M49.999 359.57C49.999 530.694 188.228 669.14 358.399 669.14C528.57 669.14 666.799 530.694 666.799 359.57C666.799 188.445 528.57 50 358.399 50C188.228 50 49.999 188.445 49.999 359.57Z" stroke-width="100" />
            </svg>
            <div class="container">
                <div class="banner-wrapper">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="section-title white">
                                    <h1><span>Contact Us</span></h1>
                                </div>
                            </div>
                            <div class="col-lg-7 d-flex align-items-end">
                                <div class="dash-and-paragraph">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 338 44">
                                        <path
                                            d="M0.333333 3C0.333333 4.47276 1.52724 5.66667 3 5.66667C4.47276 5.66667 5.66667 4.47276 5.66667 3C5.66667 1.52724 4.47276 0.333333 3 0.333333C1.52724 0.333333 0.333333 1.52724 0.333333 3ZM337.001 3L337.163 3.47297C337.394 3.3937 337.534 3.15889 337.494 2.9178C337.454 2.67671 337.245 2.5 337.001 2.5V3ZM324.001 44L324.222 38.2307L319.115 40.924L324.001 44ZM3 3.5H337.001V2.5H3V3.5ZM336.839 2.52703C328.657 5.33201 323.03 10.8388 320.343 17.6231C317.657 24.4031 317.923 32.4183 321.444 40.223L322.356 39.8117C318.933 32.2249 318.697 24.4919 321.272 17.9914C323.846 11.4951 329.241 6.18899 337.163 3.47297L336.839 2.52703Z"
                                        />
                                    </svg>
                                    <div class="btn-and-paragraph">
                                        <p>In order to receive information about your Personal Data, the purposes and the parties the Data is shared with, contact the Owner.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="breadcrumb-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="contact-page pt-130 mb-130">
            <div class="container-lg container-fluid">
                <div class="contact-info-wrap">
                    <div class="row gy-5 justify-content-between">
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-xl-12 col-md-6">
                                    <div class="single-location">
                                        <div class="title">
                                            <h4>OutcomeMet London,UK</h4>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                        <path
                                                            d="M14.2333 11.1504C13.8642 10.7667 13.4191 10.5615 12.9473 10.5615C12.4794 10.5615 12.0304 10.7629 11.6462 11.1466L10.4439 12.3433C10.345 12.2901 10.2461 12.2407 10.151 12.1913C10.014 12.1229 9.88467 12.0583 9.77433 11.9899C8.64819 11.2757 7.62476 10.345 6.64319 9.14067C6.16762 8.54043 5.84804 8.03516 5.61596 7.52229C5.92793 7.23736 6.21708 6.94104 6.49861 6.65611C6.60514 6.54974 6.71167 6.43957 6.8182 6.33319C7.61715 5.5354 7.61715 4.50207 6.8182 3.70427L5.77955 2.66714C5.66161 2.54937 5.53987 2.4278 5.42573 2.30623C5.19746 2.07069 4.95777 1.82755 4.71047 1.59961C4.34143 1.2349 3.9001 1.04115 3.43595 1.04115C2.97179 1.04115 2.52286 1.2349 2.1424 1.59961L2.13479 1.60721L0.841243 2.91027C0.35426 3.39655 0.076528 3.9892 0.0156552 4.67682C-0.0756541 5.78614 0.251537 6.81947 0.502638 7.4957C1.11898 9.15587 2.03968 10.6945 3.41312 12.3433C5.07952 14.3301 7.08452 15.8991 9.37486 17.0047C10.2499 17.4187 11.4179 17.9088 12.7229 17.9924C12.8028 17.9962 12.8865 18 12.9626 18C13.8414 18 14.5795 17.6847 15.1578 17.0578C15.1616 17.0502 15.1692 17.0464 15.173 17.0388C15.3708 16.7995 15.5991 16.583 15.8388 16.3512C16.0024 16.1955 16.1698 16.0321 16.3334 15.8611C16.71 15.4698 16.9079 15.014 16.9079 14.5467C16.9079 14.0756 16.7062 13.6235 16.322 13.2436L14.2333 11.1504ZM15.5953 15.1507C15.5915 15.1545 15.5915 15.1507 15.5953 15.1507C15.4469 15.3103 15.2947 15.4547 15.1311 15.6142C14.8838 15.8498 14.6327 16.0967 14.3969 16.374C14.0126 16.7843 13.5599 16.9781 12.9664 16.9781C12.9093 16.9781 12.8484 16.9781 12.7913 16.9743C11.6614 16.9021 10.6113 16.4614 9.82379 16.0853C7.67042 15.0444 5.77955 13.5665 4.20827 11.6936C2.91092 10.1322 2.04348 8.68859 1.46899 7.13859C1.11517 6.19263 0.985816 5.45562 1.04288 4.7604C1.08093 4.31591 1.25214 3.94741 1.56791 3.63209L2.86527 2.33662C3.05169 2.16187 3.24953 2.06689 3.44356 2.06689C3.68324 2.06689 3.87728 2.21125 3.99902 2.33282L4.01044 2.34422C4.24251 2.56076 4.46318 2.78491 4.69526 3.02424C4.8132 3.14581 4.93494 3.26738 5.05669 3.39275L6.09533 4.42988C6.49861 4.83258 6.49861 5.20488 6.09533 5.60758C5.985 5.71775 5.87847 5.82792 5.76814 5.9343C5.44856 6.26101 5.14419 6.56494 4.8132 6.86126C4.80559 6.86886 4.79798 6.87266 4.79417 6.88025C4.46698 7.20697 4.52786 7.52609 4.59634 7.74263L4.60775 7.77682C4.87787 8.43026 5.25833 9.0457 5.83662 9.77891L5.84043 9.78271C6.89048 11.0744 7.99761 12.0811 9.21887 12.8523C9.37486 12.9511 9.53465 13.0309 9.68683 13.1069C9.82379 13.1752 9.95315 13.2398 10.0635 13.3082C10.0787 13.3158 10.0939 13.3272 10.1091 13.3348C10.2385 13.3994 10.3602 13.4298 10.4858 13.4298C10.8016 13.4298 10.9994 13.2322 11.0641 13.1676L12.3652 11.8684C12.4946 11.7392 12.7 11.5834 12.9397 11.5834C13.1756 11.5834 13.3696 11.7316 13.4876 11.8608L13.4952 11.8684L15.5915 13.9616C15.9834 14.3491 15.9834 14.748 15.5953 15.1507ZM9.72868 4.28172C10.7255 4.44888 11.631 4.91996 12.3538 5.64177C13.0767 6.36359 13.5446 7.26775 13.7159 8.2631C13.7577 8.51383 13.9746 8.68859 14.2219 8.68859C14.2523 8.68859 14.2789 8.68479 14.3094 8.68099C14.5909 8.6354 14.7773 8.36947 14.7317 8.08834C14.5262 6.88405 13.9555 5.78614 13.0843 4.91616C12.2131 4.04618 11.1135 3.47633 9.90749 3.27118C9.62596 3.22559 9.36344 3.41175 9.31398 3.68907C9.26452 3.9664 9.44714 4.23613 9.72868 4.28172ZM17.9922 7.94018C17.6536 5.95709 16.7176 4.15255 15.2795 2.71652C13.8414 1.28049 12.0342 0.345932 10.0483 0.00781895C9.77053 -0.0415684 9.50802 0.148383 9.45856 0.425712C9.4129 0.70684 9.59932 0.968972 9.88086 1.01836C11.6538 1.31848 13.2707 2.15807 14.5567 3.43834C15.8426 4.72241 16.6796 6.33699 16.9802 8.10734C17.022 8.35808 17.2389 8.53283 17.4862 8.53283C17.5166 8.53283 17.5432 8.52903 17.5737 8.52523C17.8514 8.48344 18.0416 8.21751 17.9922 7.94018Z"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <div class="info">
                                                    <a href="tel:+4402080582501">+44 (0)2080582501</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                        <path
                                                            d="M0 4.5C0 3.90326 0.237053 3.33097 0.65901 2.90901C1.08097 2.48705 1.65326 2.25 2.25 2.25H15.75C16.3467 2.25 16.919 2.48705 17.341 2.90901C17.7629 3.33097 18 3.90326 18 4.5V13.5C18 14.0967 17.7629 14.669 17.341 15.091C16.919 15.5129 16.3467 15.75 15.75 15.75H2.25C1.65326 15.75 1.08097 15.5129 0.65901 15.091C0.237053 14.669 0 14.0967 0 13.5V4.5ZM2.25 3.375C1.95163 3.375 1.66548 3.49353 1.4545 3.7045C1.24353 3.91548 1.125 4.20163 1.125 4.5V4.74412L9 9.46912L16.875 4.74412V4.5C16.875 4.20163 16.7565 3.91548 16.5455 3.7045C16.3345 3.49353 16.0484 3.375 15.75 3.375H2.25ZM16.875 6.05587L11.5785 9.234L16.875 12.4931V6.05587ZM16.8368 13.7914L10.4918 9.8865L9 10.7809L7.50825 9.8865L1.16325 13.7903C1.22718 14.0296 1.36836 14.2412 1.56486 14.3922C1.76137 14.5431 2.00221 14.625 2.25 14.625H15.75C15.9976 14.625 16.2384 14.5434 16.4349 14.3926C16.6313 14.2419 16.7726 14.0306 16.8368 13.7914ZM1.125 12.4931L6.4215 9.234L1.125 6.05587V12.4931Z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div class="info">
                                                    <a href="mailto:info@outcomemet.co.uk">
                                                        <span>info@outcomemet.co.uk</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18">
                                                        <path
                                                            d="M11.8603 10.0575C11.249 11.2522 10.4207 12.4425 9.57367 13.5113C8.77018 14.5188 7.91105 15.484 7 16.4025C6.08893 15.484 5.2298 14.5188 4.42633 13.5113C3.57933 12.4425 2.751 11.2522 2.13967 10.0575C1.52133 8.85037 1.16667 7.71975 1.16667 6.75C1.16667 5.25816 1.78125 3.82742 2.87521 2.77252C3.96917 1.71763 5.4529 1.125 7 1.125C8.5471 1.125 10.0308 1.71763 11.1248 2.77252C12.2188 3.82742 12.8333 5.25816 12.8333 6.75C12.8333 7.71975 12.4775 8.85037 11.8603 10.0575ZM7 18C7 18 14 11.6033 14 6.75C14 4.95979 13.2625 3.2429 11.9497 1.97703C10.637 0.711159 8.85652 0 7 0C5.14348 0 3.36301 0.711159 2.05025 1.97703C0.737498 3.2429 2.76642e-08 4.95979 0 6.75C0 11.6033 7 18 7 18Z"
                                                        ></path>
                                                        <path
                                                            d="M7 9C6.38116 9 5.78767 8.76295 5.35008 8.34099C4.9125 7.91903 4.66667 7.34674 4.66667 6.75C4.66667 6.15326 4.9125 5.58097 5.35008 5.15901C5.78767 4.73705 6.38116 4.5 7 4.5C7.61884 4.5 8.21233 4.73705 8.64992 5.15901C9.0875 5.58097 9.33333 6.15326 9.33333 6.75C9.33333 7.34674 9.0875 7.91903 8.64992 8.34099C8.21233 8.76295 7.61884 9 7 9ZM7 10.125C7.92826 10.125 8.8185 9.76942 9.47487 9.13649C10.1313 8.50355 10.5 7.64511 10.5 6.75C10.5 5.85489 10.1313 4.99645 9.47487 4.36351C8.8185 3.73058 7.92826 3.375 7 3.375C6.07174 3.375 5.1815 3.73058 4.52513 4.36351C3.86875 4.99645 3.5 5.85489 3.5 6.75C3.5 7.64511 3.86875 8.50355 4.52513 9.13649C5.1815 9.76942 6.07174 10.125 7 10.125V10.125Z"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <div class="info">
                                                    <a>128 City Road, London, United Kingdom, EC1V 2NX</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            @if (session('success'))
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="alert alert-success mt-1" role="alert">
                                          {{ session('success') }}
                                      </div>
                                  </div>
                              </div>
                              @endif
                            <div class="contact-form-wrap">
                                <form method="POST" action="{{ url('submitcontactusform') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-inner mb-30">
                                                <label>Full Name*</label>
                                                <input value="{{ old('name', request()->cookie('name')) }}" name="name" type="text" placeholder="John Marshall" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-30">
                                                <label>Your Email*</label>
                                                <input value="{{ old('email', request()->cookie('email')) }}" type="email" name="email" placeholder="john@companyName.com." />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-30">
                                                <label>Phone Number <span>(Optional)</span></label>
                                                <input type="text" name="phonenumber" placeholder="+44 078 **** ****" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-30">
                                                <label>Subject</label>
                                                <input type="text" name="subject" placeholder="OutcomeMet Demo" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-inner mb-30">
                                                <label>How can We Help You?</label>
                                                <textarea name="message" placeholder="What’s on your mind"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <div class="form-inner2">
                                                <div class="form-check">
                                                    <input name="remember" {{ request()->cookie('name') ? 'checked' : '' }} class="form-check-input" type="checkbox" value id="contactCheck" />
                                                    <label class="form-check-label" for="contactCheck">
                                                        Please save my name, email address for the next time I message.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inner">
                                        <button class="primary-btn3 btn-hover" type="submit">
                                            Submit Now
                                            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.0035 3.40804L1.41153 12L0 10.5885L8.59097 1.99651H1.01922V0H12V10.9808H10.0035V3.40804Z"></path>
                                            </svg>
                                            <span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to action -->

        @include('site-components.cta')

        <!-- Footer -->

        @include('site-components.footer')

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
            function SaveContact() {
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#number").val();
                var comment = $("#comment").val();

                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    e.preventDefault();
                    return false;
                } else {
                }

                if ($("input[type=checkbox]").is(":checked")) {
                    $(this).prop("checked", true);
                } else {
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ url('save-contact') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        comment: comment,
                    },
                    success: function (res) {
                        $("#name").val("");
                        $("#email").val("");
                        $("#number").val("");
                        $("#comment").val("");
                        $('input[type="checkbox"]').prop("checked", false);
                        grecaptcha.reset();
                        $("#error").html('<div class="alert alert-success" role="alert"> Contact Submitted Successfully</div>');
                        $("#epic-feild-error").html("");
                        setTimeout(function () {
                            $("#error").html("");
                        }, 3000);
                    },
                });
            }

            $("#faq").click(function () {
                $("html, body").animate(
                    {
                        scrollTop: $("#faqs").offset().top,
                    },
                    2000
                );
            });

            $("#contact").click(function () {
                $("html, body").animate(
                    {
                        scrollTop: $("#contactus").offset().top,
                    },
                    2000
                );
            });

            $("#about").click(function () {
                $("html, body").animate(
                    {
                        scrollTop: $(".feature").offset().top,
                    },
                    2000
                );
            });
        </script>
    </body>
</html>