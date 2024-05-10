<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="{{ url('public/assetsvone/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('public/assetsvone/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />    
    </head>
    <body id="kt_body" class="app-blank">
        <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <div class="w-lg-500px p-10">
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('login') }}">
                                <div class="mb-11">
                                    <h1 class="text-gray-900 fw-bolder mb-3 sign">Sign In</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                                </div>
                                <div class="row g-3 mb-9">
                                    <!--begin::Col-->
                                    <div class="col-md-6">
                                        <a href="{{url('/auth/google')}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100 cs-btn">
                                        <img alt="Logo" src="{{ url('public/assetsvone/media/svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />Google</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{url('/auth/facebook')}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100  cs-btn">
                                        <img alt="Logo" src="{{ url('public/assetsvone/media/svg/brand-logos/facebook-2.svg') }}" class="theme-light-show h-15px me-3" />
                                        <img alt="Logo" src="assets/" class="theme-dark-show h-15px me-3" />Facebook</a>
                                    </div>
                                </div>
                                <div class="separator separator-content my-14">
                                    <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                                </div>
                                <div class="fv-row mb-8">
                                    <input type="email" placeholder="Enter Your Email" class="form-control bg-transparent @error('email') is-invalid @enderror" class="form-control " name="email" value="{{ old('email') }}"  id="email" required>
                                    @error('email')
                                    <span class="invalid-feedback mb-3 ml-5 mt-0" style="display:block !important" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="fv-row mb-3">
                                    <input type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" class="form-control" placeholder="Password" name="password" id="Password" required>
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <a href="{{ route('password.request') }}" class="link-primary">Forgot Password ?</a>
                                </div>
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary cs-btn">
                                        <span class="indicator-label">Sign In</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? 
                                <a href="{{ url('register') }}" class="link-primary">Sign up</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url('{{ url("") }}/public/assetsvone/media/misc/auth-bg.png')">
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                        <a href="{{ url('') }}" class="mb-0 mb-lg-12">
                            <img alt="Logo" src="{{ url('public/assetsindex/assets/img/logo.png') }}" class="h-60px h-lg-75px" />
                        </a>
                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder mb-7">Empower your organization to accomplish desired outcomes</h1>
                        <div class="d-none d-lg-block text-white fs-base"> 
                        <a href="{{ url('') }}" class="opacity-75-hover text-warning fw-bold me-1"></a>
                        <br />
                        <a href="{{ url('') }}" class="opacity-75-hover text-warning fw-bold me-1"></a>
                        <br />Attain clarity and transparency in quarterly and annual planning across all organizational levels by implementing robust processes for planning, tracking progress, and reporting, leveraging Objectives and Key Results (OKRs), Key Performance Indicators (KPIs), and other essential tools."</div>
                        <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ url('public/assetsvone/media/misc/auth-screens.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <script>var hostUrl = "assets/";</script>
        <script src="{{ url('public/assetsvone/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/scripts.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/authentication/sign-in/general.js') }}"></script>
    </body>
</html>