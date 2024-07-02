<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset Password</title>
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
                            <form method="POST" class="needs-validation pt-7" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3 sign">Reset Password</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Reset Your Password</div>
                            </div>
                            <div class="fv-row mb-8">
                                <input id="email" type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback mb-3 ml-5 mt-0" style="display:block !important" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary cs-btn">
                                    <span class="indicator-label">Send Password Reset Link</span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div> 
                            <div class="text-gray-500 text-center fw-semibold fs-6">Password Remembered? <a href="{{ url('login') }}" class="link-primary">Sign In</a></div>          
                         
                        </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url('{{ url("") }}/public/assetsvone/media/misc/auth-bg.png')">
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                        <a href="{{ url('') }}" class="mb-0 mb-lg-12">
                            <img alt="Logo" src="{{ url('public/assetsindex/assets/img/logo.png') }}" class="h-60px h-lg-75px" />
                        </a>
                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder mb-7">Fast, Efficient and Productive</h1>
                        <div class="d-none d-lg-block text-white fs-base">In this kind of post, 
                        <a href="{{ url('') }}" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed 
                        <br />and provides some background information about 
                        <a href="{{ url('') }}" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their 
                        <br />work following this is a transcript of the interview.</div>
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