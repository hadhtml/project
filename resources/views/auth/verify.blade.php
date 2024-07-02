
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="{{ url('public/assetsvone/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('public/assetsvone/css/style.bundle.css') }}" rel="stylesheet" type="text/css" /> 
    </head>
    <body id="kt_body" class="app-blank">
        <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep" id="kt_create_account_stepper">
                <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
                    <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center" style="background-image: url('{{ url("") }}/public/assetsvone/media/misc/auth-bg.png')">
                        <div class="d-flex flex-center py-10 py-lg-20 mt-lg-20">
                            <a href="{{ url('') }}">
                                <img alt="Logo" src="{{ url('public/assetsindex/assets/img/logo.png') }}" class="h-70px" />
                            </a>
                        </div>
                        <div class="d-flex flex-row-fluid justify-content-center p-10">
                            <div class="stepper-nav">
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon rounded-3">
                                            <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-2">sign-up</h3>
                                            <div class="stepper-desc fw-normal">Do sign-up</div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                           
                           
                                <div class="stepper-item current">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon">
                                            <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-2">Verification</h3>
                                            <div class="stepper-desc fw-normal">Verify your Email</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-center flex-wrap px-5 py-10">
                            <div class="d-flex fw-normal">
                                <a href="{{ url('') }}" class="text-success px-5" target="_blank">Terms</a>
                                <a href="{{ url('') }}" class="text-success px-5" target="_blank">Plans</a>
                                <a href="{{ url('') }}" class="text-success px-5" target="_blank">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid py-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-column-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                            <div class="w-100">
                                  <div class=" mb-11">
                                     <h1 class="text-gray-900 fw-bolder mb-3 sign">Verification</h1>
                                     <div class="text-gray-500 fw-semibold fs-6">We've sent you an email to verify your address. </div>
                                     <div class="text-gray-500 fw-semibold fs-6">Please check your inbox at  @if(session()->has('user')) <u style="color:blue">{{session()->get('user')}}</u>  @endif to complete your registration.</div>
                                  </div>
                                  <div class="input-fields-area py-lg-10">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf

                                        <button type="submit" class="btn btn-lg btn-primary">
                                            <span class="indicator-label">Click here to request another 
                                            <i class="ki-outline ki-arrow-right fs-4 ms-2"></i></span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Multi-steps-->
        </div>
        <script>var hostUrl = "assets/";</script>
        <script src="{{ url('public/assetsvone/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/scripts.bundle.js') }}"></script>
        <script src="{{ url('public/assetsvone/js/custom/utilities/modals/create-account.js') }}"></script>
    </body>

</html>