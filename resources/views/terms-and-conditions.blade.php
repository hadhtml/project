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
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="#solution-section" id="faq">FAQ’s</a></li>
                        <li><a href="#solution-section" id="about">About Us</a></li>
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
                                    <h1><span>Terms & Conditions</span></h1>
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
                                        <p>Find your questions about our Terms & Conditions below</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="breadcrumb-list">
                        <li><a href="https://demo-egenslab.b-cdn.net/">Home</a></li>
                        <li>Terms & Conditions</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="terms-and-conditions-page pt-130 mb-130">
            <div class="container-lg container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb-40">
                        <div class="terms-and-conditions">
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>General Terms</h4>
                                    <p>
                                        By accessing and placing an order with OutcomeMet, you confirm that you are in agreement with and bound by the terms of service contained in the Terms & Conditions outlined below. These terms apply to
                                        the entire website and any email or other type of communication between you and OutcomeMet.
                                    </p>
                                    <p>
                                        Under no circumstances shall OutcomeMet team be liable for any direct, indirect, special, incidental or consequential damages, including, but not limited to, loss of data or profit, arising out of the
                                        use, or the inability to use, the materials on this site, even if OutcomeMet team or an authorized representative has been advised of the possibility of such damages. If your use of materials from
                                        this site results in the need for servicing, repair or correction of equipment or data, you assume any costs thereof.
                                    </p>
                                    <p>
                                        OutcomeMet will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to change prices and revise the resources usage policy in any
                                        moment.
                                    </p>

                                    <h4>License</h4>
                                    <p>
                                        OutcomeMet grants you a revocable, non-exclusive, non-transferable, limited license to download, install and use the app strictly in accordance with the terms of this Agreement.
                                    </p>
                                    <p>
                                        These Terms & Conditions are a contract between you and OutcomeMet (referred to in these Terms & Conditions as "OutcomeMet", "us", "we" or "our"), the provider of the OutcomeMet website and the
                                        services accessible from the OutcomeMet website (which are collectively referred to in these Terms & Conditions as the "OutcomeMet Service").
                                    </p>
                                    <p>
                                        You are agreeing to be bound by these Terms & Conditions. If you do not agree to these Terms & Conditions, please do not use the OutcomeMet Service. In these Terms & Conditions, "you" refers both to
                                        you as an individual and to the entity you represent. If you violate any of these Terms & Conditions, we reserve the right to cancel your account or block access to your account without notice.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Definitions and key terms</h4>
                                    <p>
                                        To help explain things as clearly as possible in this Terms & Conditions, every time any of these terms are referenced, are strictly defined as:
                                    </p>

                                    <ul>
                                        <li>
                                            <strong>Cookie:</strong> small amount of data generated by a website and saved by your web browser. It is used to identify your browser, provide analytics, remember information about you such as
                                            your language preference or login information.
                                        </li>
                                        <li>
                                            <strong>Company:</strong> when this terms mention “Company,” “we,” “us,” or “our,” it refers to OutcomeMet Limited, (128 City Road London EC1V 2NX), that is responsible for your information under
                                            this Terms & Conditions.
                                        </li>
                                        <li><strong>Country:</strong> where OutcomeMet or the owners/founders of OutcomeMet are based, in this case is United Kingdom</li>
                                        <li><strong>Device:</strong> any internet connected device such as a phone, tablet, computer or any other device that can be used to visit OutcomeMet and use the services.</li>
                                        <li><strong>Service:</strong> refers to the service provided by OutcomeMet as described in the relative terms (if available) and on this platform.</li>
                                        <li>
                                            <strong>Third-party service:</strong>refers to advertisers, contest sponsors, promotional and marketing partners, and others who provide our content or whose products or services we think may
                                            interest you.
                                        </li>
                                        <li><strong>App/Application:</strong>OutcomeMet app, refers to the SOFTWARE PRODUCT identified above.</li>
                                        <li><strong>You:</strong> a person or entity that is registered with OutcomeMet to use the Services.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Definitions and key terms</h4>
                                    <p>
                                        To help explain things as clearly as possible in this Terms & Conditions, every time any of these terms are referenced, are strictly defined as:
                                    </p>

                                    <ul>
                                        <li>
                                            License, sell, rent, lease, assign, distribute, transmit, host, outsource, disclose or otherwise commercially exploit the app or make the platform available to any third party.
                                        </li>
                                        <li>
                                            Modify, make derivative works of, disassemble, decrypt, reverse compile or reverse engineer any part of the app
                                        </li>
                                        <li>
                                            Remove, alter or obscure any proprietary notice (including any notice of copyright or trademark) of OutcomeMet or its affiliates, partners, suppliers or the licensors of the app.
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Your Suggestions</h4>
                                    <p>
                                        Any feedback, comments, ideas, improvements or suggestions (collectively, "Suggestions") provided by you to OutcomeMet with respect to the app shall remain the sole and exclusive property of
                                        OutcomeMet.
                                    </p>
                                    <p>
                                        OutcomeMet shall be free to use, copy, modify, publish, or redistribute the Suggestions for any purpose and in any way without any credit or any compensation to you.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Your Consent</h4>
                                    <p>
                                        We've updated our Terms & Conditions to provide you with complete transparency into what is being set when you visit our site and how it's being used. By using our app, registering an account, or
                                        making a purchase, you hereby consent to our Terms & Conditions.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Links to Other Websites</h4>
                                    <p>
                                        This Terms & Conditions applies only to the Services. The Services may contain links to other websites not operated or controlled by OutcomeMet. We are not responsible for the content, accuracy or
                                        opinions expressed in such websites, and such websites are not investigated, monitored or checked for accuracy or completeness by us. Please remember that when you use a link to go from the Services
                                        to another website, our Terms & Conditions are no longer in effect. Your browsing and interaction on any other website, including those that have a link on our platform, is subject to that website’s
                                        own rules and policies. Such third parties may use their own cookies or other methods to collect information about you.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Cookies</h4>
                                    <p>
                                        OutcomeMet uses "Cookies" to identify the areas of our app that you have visited. A Cookie is a small piece of data stored on your computer or mobile device by your web browser. We use Cookies to
                                        enhance the performance and functionality of our app but are non-essential to their use. However, without these cookies, certain functionality like videos may become unavailable or you would be
                                        required to enter your login details every time you visit the app as we would not be able to remember that you had logged in previously. Most web browsers can be set to disable the use of Cookies.
                                        However, if you disable Cookies, you may not be able to access functionality on our app correctly or at all. We never place Personally Identifiable Information in Cookies.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Changes To Our Terms & Conditions</h4>
                                    <p>
                                        You acknowledge and agree that OutcomeMet may stop (permanently or temporarily) providing the Service (or any features within the Service) to you or to users generally at OutcomeMet’s sole discretion,
                                        without prior notice to you. You may stop using the Service at any time. You do not need to specifically inform OutcomeMet when you stop using the Service. You acknowledge and agree that if OutcomeMet
                                        disables access to your account, you may be prevented from accessing the Service, your account details or any files or other materials which is contained in your account.
                                    </p>
                                    <p>
                                        If we decide to change our Terms & Conditions, we will post those changes on this page, and/or update the Terms & Conditions modification date below.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Modifications to Our app</h4>
                                    <p>
                                        OutcomeMet reserves the right to modify, suspend or discontinue, temporarily or permanently, the app or any service to which it connects, with or without notice and without liability to you.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Updates to Our app</h4>
                                    <p>
                                        OutcomeMet may from time to time provide enhancements or improvements to the features/ functionality of page 4/9 the app, which may include patches, bug fixes, updates, upgrades and other
                                        modifications ("Updates").
                                    </p>
                                    <p>
                                        You further agree that all Updates will be (i) deemed to constitute an integral part of the app, and (ii) subject to the terms and conditions of this Agreement.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Third-Party Services</h4>
                                    <p>
                                        We may display, include or make available third-party content (including data, information, applications and other products services) or provide links to third-party websites or services ("Third-
                                        Party Services").
                                    </p>
                                    <p>
                                        You acknowledge and agree that OutcomeMet shall not be responsible for any Third-Party Services, including their accuracy, completeness, timeliness, validity, copyright compliance, legality, decency,
                                        quality or any other aspect thereof. OutcomeMet does not assume and shall not have any liability or responsibility to you or any other person or entity for any Third-Party Services.
                                    </p>
                                    <p>
                                        Third-Party Services and links thereto are provided solely as a convenience to you and you access and use them entirely at your own risk and subject to such third parties' terms and conditions.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Term and Termination</h4>
                                    <p>This Agreement shall remain in effect until terminated by you or OutcomeMet.</p>
                                    <p>OutcomeMet may, in its sole discretion, at any time and for any or no reason, suspend or terminate this Agreement with or without prior notice.</p>
                                    <p>
                                        This Agreement will terminate immediately, without prior notice from OutcomeMet, in the event that you fail to comply with any provision of this Agreement. You may also terminate this Agreement by
                                        deleting the app and all copies thereof from your computer.
                                    </p>
                                    <p>Upon termination of this Agreement, you shall cease all use of the app and delete all copies of the app from your computer.</p>
                                    <p>
                                        Termination of this Agreement will not limit any of OutcomeMet's rights or remedies at law or in equity in case of breach by you (during the term of this Agreement) of any of your obligations under
                                        the present Agreement.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Copyright Infringement Notice</h4>
                                    <p>
                                        If you are a copyright owner or such owner’s agent and believe any material on our app constitutes an infringement on your copyright, please contact us setting forth the following information: (a) a
                                        physical or electronic signature of the copyright owner or a person authorized to act on his behalf; (b) identification of the material that is claimed to be infringing; (c) your contact information,
                                        including your address, telephone number, and an email; (d) a statement by you that you have a good faith belief that use of the material is not page 5/9 authorized by the copyright owners; and (e)
                                        the a statement that the information in the notification is accurate, and, under penalty of perjury you are authorized to act on behalf of the owner.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Indemnification</h4>
                                    <p>
                                        You agree to indemnify and hold OutcomeMet and its parents, subsidiaries, affiliates, officers, employees, agents, partners and licensors (if any) harmless from any claim or demand, including
                                        reasonable attorneys' fees, due to or arising out of your: (a) use of the app; (b) violation of this Agreement or any law or regulation; or (c) violation of any right of a third party.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>No Warranties</h4>
                                    <p>
                                        The app is provided to you "AS IS" and "AS AVAILABLE" and with all faults and defects without warranty of any kind. To the maximum extent permitted under applicable law, OutcomeMet, on its own behalf
                                        and on behalf of its affiliates and its and their respective licensors and service providers, expressly disclaims all warranties, whether express, implied, statutory or otherwise, with respect to the
                                        app, including all implied warranties of merchantability, fitness for a particular purpose, title and non-infringement, and warranties that may arise out of course of dealing, course of performance,
                                        usage or trade practice. Without limitation to the foregoing, OutcomeMet provides no warranty or undertaking, and makes no representation of any kind that the app will meet your requirements, achieve
                                        any intended results, be compatible or work with any other software, apps, systems or services, operate without interruption, meet any performance or reliability standards or be error free or that any
                                        errors or defects can or will be corrected.
                                    </p>
                                    <p>
                                        Without limiting the foregoing, neither OutcomeMet nor any OutcomeMet's provider makes any representation or warranty of any kind, express or implied: (i) as to the operation or availability of the
                                        app, or the information, content, and materials or products included thereon; (ii) that the app will be uninterrupted or error-free; (iii) as to the accuracy, reliability, or currency of any
                                        information or content provided through the app; or (iv) that the app, its servers, the content, or e-mails sent from or on behalf of OutcomeMet are free of viruses, scripts, trojan horses, worms,
                                        malware, timebombs or other harmful components.
                                    </p>
                                    <p>
                                        Some jurisdictions do not allow the exclusion of or limitations on implied warranties or the limitations on the applicable statutory rights of a consumer, so some or all of the above exclusions and
                                        limitations may not apply to you.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Limitation of Liability</h4>
                                    <p>
                                        Notwithstanding any damages that you might incur, the entire liability of OutcomeMet and any of its suppliers under any provision of this Agreement and your exclusive remedy for all of the foregoing
                                        shall be limited to the amount actually paid by you for the app
                                    </p>
                                    <p>
                                        To the maximum extent permitted by applicable law, in no event shall OutcomeMet or its suppliers be liable for any special, incidental, indirect, or consequential damages whatsoever (including, but
                                        not limited to, damages for loss of profits, for loss of data or other information, for business interruption, for personal injury, for loss of privacy arising out of or in any way related to the use
                                        of or inability to use the app, third-party software and/or third-party hardware used with the app, or otherwise in connection with any provision of this Agreement), even if OutcomeMet or any supplier
                                        has been advised of the possibility of such damages and even if the remedy fails of its essential purpose.
                                    </p>
                                    <p>Some states/jurisdictions do not allow the exclusion or limitation of incidental or consequential damages, so the above limitation or exclusion may not apply to you.</p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Severability</h4>
                                    <p>
                                        If any provision of this Agreement is held to be unenforceable or invalid, such provision will be changed and interpreted to accomplish the objectives of such provision to the greatest extent possible
                                        under applicable law and the remaining provisions will continue in full force and effect.
                                    </p>
                                    <p>
                                        This Agreement, together with the Privacy Policy and any other legal notices published by OutcomeMet on the Services, shall constitute the entire agreement between you and OutcomeMet concerning the
                                        Services. If any provision of this Agreement is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of this
                                        Agreement, which shall remain in full force and effect. No waiver of any term of this Agreement shall be deemed a further or continuing waiver of such term or any other term, and OutcomeMet’s failure
                                        to assert any right or provision under this Agreement shall not constitute a waiver of such right or provision. YOU AND OutcomeMet AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE
                                        SERVICES MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES. OTHERWISE, SUCH CAUSE OF ACTION IS PERMANENTLY BARRED.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Waiver</h4>
                                    <p>
                                        Except as provided herein, the failure to exercise a right or to require performance of an obligation under this Agreement shall not effect a party's ability to exercise such right or require such
                                        performance at any time thereafter nor shall be the waiver of a breach constitute waiver of any subsequent breach.
                                    </p>
                                    <p>
                                        No failure to exercise, and no delay in exercising, on the part of either party, any right or any power under this Agreement shall operate as a waiver of that right or power. Nor shall any single or
                                        partial exercise of any right or power under this Agreement preclude further exercise of that or any other right granted herein. In the event of a conflict between this Agreement and any applicable
                                        purchase or other terms, the terms of this Agreement shall govern.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Amendments to this Agreement</h4>
                                    <p>
                                        OutcomeMet reserves the right, at its sole discretion, to modify or replace this Agreement at any time. If a revision is material we will provide at least 30 days' notice prior to any new terms taking
                                        effect. What constitutes a material change will be determined at our sole discretion.
                                    </p>
                                    <p>
                                        By continuing to access or use our app after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use
                                        OutcomeMet.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Entire Agreement</h4>
                                    <p>
                                        The Agreement constitutes the entire agreement between you and OutcomeMet regarding your use of the app and supersedes all prior and contemporaneous written or oral agreements between you and
                                        OutcomeMet.
                                    </p>
                                    <p>You may be subject to additional terms and conditions that apply when you use or purchase other OutcomeMet's services, which OutcomeMet will provide to you at the time of such use or purchase.</p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Updates to Our Terms</h4>
                                    <p>
                                        We may change our Service and policies, and we may need to make changes to these Terms so that they accurately reflect our Service and policies. Unless otherwise required by law, we will notify you
                                        (for example, through our Service) before we make changes to these Terms and give you an opportunity to review them before they go into effect. Then, if you continue to use the Service, you will be
                                        bound by the updated Terms. If you do not want to agree to these or any updated Terms, you can delete your account.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Intellectual Property</h4>
                                    <p>
                                        The app and its entire contents, features and functionality (including but not limited to all information, software, text, displays, images, video and audio, and the design, selection and arrangement
                                        thereof), are owned by OutcomeMet, its licensors or other providers of such material and are protected by United Kingdom and international copyright, trademark, patent, trade secret and other
                                        intellectual property or proprietary rights laws. The material may not be copied, modified, reproduced, downloaded or distributed in any way, in whole or in part, without the express prior written
                                        permission of OutcomeMet, unless and except as is expressly provided in these Terms & Conditions. Any unauthorized use of the material is prohibited.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Agreement to Arbitrate</h4>
                                    <p>
                                        This section applies to any dispute EXCEPT IT DOESN’T INCLUDE A DISPUTE RELATING TO CLAIMS FOR INJUNCTIVE OR EQUITABLE RELIEF REGARDING THE ENFORCEMENT OR VALIDITY OF YOUR OR OutcomeMet’s INTELLECTUAL
                                        PROPERTY RIGHTS. The term “dispute” means any dispute, action, or other controversy between you and OutcomeMet concerning the Services or this agreement, whether in contract, warranty, tort, statute,
                                        regulation, ordinance, or any other legal or equitable basis. “Dispute” will be given the broadest possible meaning allowable under law.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Notice of Dispute</h4>
                                    <p>
                                        In the event of a dispute, you or OutcomeMet must give the other a Notice of Dispute, which is a written statement that sets forth the name, address, and contact information of the party giving it,
                                        the facts giving rise to the dispute, and the relief requested. You must send any Notice of Dispute via email to: support@outcomemet.co.uk. OutcomeMet will send any Notice of Dispute to you by mail to
                                        your address if we have it, or otherwise to your email address. You and OutcomeMet will attempt to resolve any dispute through informal negotiation within sixty (60) days from the date the Notice of
                                        Dispute is sent. After sixty (60) days, you or OutcomeMet may commence arbitration.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Binding Arbitration</h4>
                                    <p>
                                        If you and OutcomeMet don’t resolve any dispute by informal negotiation, any other effort to resolve the dispute will be conducted exclusively by binding arbitration as described in this section. You
                                        are giving up the right to litigate (or participate in as a party or class member) all disputes in court before a judge or jury. The dispute shall be settled by binding arbitration in accordance with
                                        the commercial arbitration rules of the American Arbitration Association. Either party may seek any interim or preliminary injunctive relief from any court of competent jurisdiction, as necessary to
                                        protect the party’s rights or property pending the completion page 8/9 of arbitration. Any and all legal, accounting, and other costs, fees, and expenses incurred by the prevailing party shall be
                                        borne by the non-prevailing party.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Submissions and Privacy</h4>
                                    <p>
                                        In the event that you submit or post any ideas, creative suggestions, designs, photographs, information, advertisements, data or proposals, including ideas for new or improved products, services,
                                        features, technologies or promotions, you expressly agree that such submissions will automatically be treated as non-confidential and non-proprietary and will become the sole property of OutcomeMet
                                        without any compensation or credit to you whatsoever. OutcomeMet and its affiliates shall have no obligations with respect to such submissions or posts and may use the ideas contained in such
                                        submissions or posts for any purposes in any medium in perpetuity, including, but not limited to, developing, manufacturing, and marketing products and services using such ideas.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Promotions</h4>
                                    <p>
                                        OutcomeMet may, from time to time, include contests, promotions, sweepstakes, or other activities (“Promotions”) that require you to submit material or information concerning yourself. Please note
                                        that all Promotions may be governed by separate rules that may contain certain eligibility requirements, such as restrictions as to age and geographic location. You are responsible to read all
                                        Promotions rules to determine whether or not you are eligible to participate. If you enter any Promotion, you agree to abide by and to comply with all Promotions Rules.
                                    </p>
                                    <p>Additional terms and conditions may apply to purchases of goods or services on or through the Services, which terms and conditions are made a part of this Agreement by this reference.</p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Typographical Errors</h4>
                                    <p>
                                        In the event a product and/or service is listed at an incorrect price or with incorrect information due to typographical error, we shall have the right to refuse or cancel any orders placed for the
                                        product and/or service listed at the incorrect price. We shall have the right to refuse or cancel any such order whether or not the order has been confirmed and your credit card charged. If your
                                        credit card has already been charged for the purchase and your order is canceled, we shall immediately issue a credit to your credit card account or other payment account in the amount of the charge.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Miscellaneous</h4>
                                    <p>
                                        If for any reason a court of competent jurisdiction finds any provision or portion of these Terms & Conditions to be unenforceable, the remainder of these Terms & Conditions will continue in full
                                        force and effect. Any waiver of any provision of these Terms & Conditions will be effective only if in writing and signed by an authorized representative of OutcomeMet. OutcomeMet will be entitled to
                                        injunctive or other equitable relief (without the obligations of posting any bond or surety) in the event of any breach or anticipatory breach by you. OutcomeMet operates and controls the OutcomeMet
                                        Service from its offices in United Kingdom. The Service is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be
                                        contrary to law or regulation. Accordingly, those persons who choose to access the OutcomeMet Service from other locations do so on their own initiative and are solely responsible for compliance with
                                        local laws, if and to the extent local laws are applicable. These Terms & Conditions (which include and incorporate the OutcomeMet Privacy Policy) contains the entire understanding, and supersedes all
                                        prior understandings, between you and OutcomeMet concerning its subject matter, and page 9/9 cannot be changed or modified by you. The section headings used in this Agreement are for convenience only
                                        and will not be given any legal import
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Disclaimer</h4>
                                    <p>OutcomeMet is not responsible for any content, code or any other imprecision.</p>
                                    <p>OutcomeMet does not provide warranties or guarantees.</p>
                                    <p>
                                        In no event shall OutcomeMet be liable for any special, direct, indirect, consequential, or incidental damages or any damages whatsoever, whether in an action of contract, negligence or other tort,
                                        arising out of or in connection with the use of the Service or the contents of the Service. The Company reserves the right to make additions, deletions, or modifications to the contents on the Service
                                        at any time without prior notice.
                                    </p>
                                    <p>
                                        The OutcomeMet Service and its contents are provided "as is" and "as available" without any warranty or representations of any kind, whether express or implied. OutcomeMet is a distributor and not a
                                        publisher of the content supplied by third parties; as such, OutcomeMet exercises no editorial control over such content and makes no warranty or representation as to the accuracy, reliability or
                                        currency of any information, content, service or merchandise provided through or accessible via the OutcomeMet Service. Without limiting the foregoing, OutcomeMet specifically disclaims all warranties
                                        and representations in any content transmitted on or in connection with the OutcomeMet Service or on sites that may appear as links on the OutcomeMet Service, or in the products provided as a part of,
                                        or otherwise in connection with, the OutcomeMet Service, including without limitation any warranties of merchantability, fitness for a particular purpose or non-infringement of third party rights. No
                                        oral advice or written information given by OutcomeMet or any of its affiliates, employees, officers, directors, agents, or the like will create a warranty. Price and availability information is
                                        subject to change without notice. Without limiting the foregoing, OutcomeMet does not warrant that the OutcomeMet Service will be uninterrupted, uncorrupted, timely, or error-free.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Contact Us</h4>
                                    <p>Don't hesitate to contact us if you have any questions.</p>
                                    <p><strong>Via Email:</strong> support@outcomemet.co.uk</p>
                                    <p><strong>Via Phone Number:</strong>02080582501</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-section two">
            <div class="container-lg container-fluid">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-8">
                        <div class="section-title text-animation">
                            <h2>Ready to <span>ELEVATE?</span></h2>
                            <div class="dash-and-paragraph">
                                <div class="dash"></div>
                                <div class="content-and-social">
                                    <p>
                                        Start your journey towards success now by trying OutcomeMet today. Empower your team, delight your customers, and stay ahead of the competition. Don't delay, start optimising your product delivery
                                        right now!
                                    </p>
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
                                Try for <strong>Free</strong>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        @php $contact = DB::table('header_section')->where('section','contact')->first(); @endphp

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
                                            <p>@if($contact) {{$contact->sub_title}} @endif</p>
                                        </div>
                                        @php $footer = DB::table('header_section')->where('section','footer')->first(); @endphp
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
                        <p>Our Business <a href="{{url('terms-and-conditions')}}">Policy, Terms & Condition</a></p>
                    </div>
                </div>
            </div>
        </footer>

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
