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
                                <div class="stepper-item current" data-kt-stepper-element="nav">
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
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon rounded-3">
                                            <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-2">Organization Structure </h3>
                                            <div class="stepper-desc fw-normal">Check out the orginization structure.</div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon">
                                            <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title fs-2">Setup Workflow</h3>
                                            <div class="stepper-desc fw-normal">Setup your flow work</div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon">
                                            <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">4</span>
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
                            <!--begin::Form-->
                            <form action="{{ route('register') }}"  method="POST" class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">

                                <div class="current" data-kt-stepper-element="content">
                                   <div class="w-100">
                                      <div class=" mb-11">
                                         <h1 class="text-gray-900 fw-bolder mb-3 sign">Sign Up</h1>
                                         <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                                      </div>
                                      <div class="row g-3 mb-9">
                                         <div class="col-md-6">
                                            <a href="{{url('/auth/google')}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100 cs-btn">
                                            <img alt="Logo" src="{{ url('public/assetsvone/media/svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />Continue With Google</a>
                                         </div>
                                         <div class="col-md-6">
                                            <a href="{{url('/auth/facebook')}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100  cs-btn">
                                            <img alt="Logo" src="{{ url('public/assetsvone/media/svg/brand-logos/facebook-2.svg') }}" class="theme-light-show h-15px me-3" />
                                            <img alt="Logo" src="assets/" class="theme-dark-show h-15px me-3" />Continue With Facebook</a>
                                         </div>
                                      </div>
                                      <div class="separator separator-content my-14">
                                         <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                                      </div>
                                      <input type="hidden" name="plan-id" id="plan-id" required>
                                      <input type="hidden" name="max-user" id="max-user">

                                      
                                 


                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="fv-row mb-8">
                                                 <input type="text" placeholder="First Name" name="name" autocomplete="off" class="form-control bg-transparent" />
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="fv-row mb-8">
                                                 <input type="text" placeholder="Last Name" name="last_name" autocomplete="off" class="form-control bg-transparent" />                        
                                              </div>
                                          </div>
                                      </div>
                                      
                                      
                                      <div class="fv-row mb-8">
                                         <input type="text" placeholder="Organization Name" name="org_name" autocomplete="off" class="form-control bg-transparent" />                        
                                      </div>
                                      <div class="fv-row mb-8">
                                         <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                                      </div>
                                      <div class="fv-row mb-8" data-kt-password-meter="true">
                                         <div class="mb-1">
                                            <div class="position-relative mb-3">
                                               <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />
                                               <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                               <i class="ki-outline ki-eye-slash fs-2"></i>
                                               <i class="ki-outline ki-eye fs-2 d-none"></i>
                                               </span>
                                            </div>
                                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                               <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                               <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                               <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                               <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                            </div>
                                         </div>
                                         <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                      </div>
                                   </div>
                                </div>
                                <div class="" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-15">
                                            <h2 class="fw-bold text-gray-900">Organizational Structure</h2>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <input type="text" class="form-control form-control-lg form-control-solid @error('level_one') is-invalid @enderror" placeholder="Level One" name="level_one" value="{{ old('level_one') }}"  id="level_one" required>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <input type="text" class="form-control form-control-lg form-control-solid @error('level_two') is-invalid @enderror" placeholder="Level Two" name="level_two" value="{{ old('level_two') }}"  id="level_two" required>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <input type="text" class="form-control form-control-lg form-control-solid @error('level_three') is-invalid @enderror" placeholder="Level Three" name="level_three" value="{{ old('level_three') }}"  id="level_three" required>
                                        </div>
                                        <p>Continue With Default Settings <a onclick="defaultsettings()" href="javascript:void(0)">Click Here</a> </p>
                                    </div>
                                </div>
                                <div class="" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-12">
                                            <h2 class="fw-bold text-gray-900">Setup Workflow</h2>
                                        </div>
                                        @php
                                        $month = DB::table('settings')->where('user_id',Auth::id())->first();
                                        $monthNumber = 0;
                                        if($month)
                                        {
                                        $monthNumber = $month->month;
                                        }
                                        $carbonDate = \Carbon\Carbon::create(null, $monthNumber + 1, 1);
                                        $monthName = $carbonDate->format('F');
                                        @endphp
                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Select Financial Year</label>
                                             <select name="month" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                                <option @if($month) @if($month->month == 0) selected @endif @endif value='0'>January</option>
                                                <option @if($month) @if($month->month == 1) selected @endif @endif value='1'>February</option>
                                                <option @if($month) @if($month->month == 2) selected @endif @endif value='2'>March</option>
                                                <option @if($month) @if($month->month == 3) selected @endif @endif value='3'>April</option>
                                                <option @if($month) @if($month->month == 4) selected @endif @endif value='4'>May</option>
                                                <option @if($month) @if($month->month == 5) selected @endif @endif value='5'>June</option>
                                                <option @if($month) @if($month->month == 6) selected @endif @endif value='6'>July</option>
                                                <option @if($month) @if($month->month == 7) selected @endif @endif value='7'>August</option>
                                                <option @if($month) @if($month->month == 8) selected @endif @endif value='8'>September</option>
                                                <option @if($month) @if($month->month == 9) selected @endif @endif value='9'>October</option>
                                                <option @if($month) @if($month->month == 10) selected @endif @endif value='10'>November</option>
                                                <option @if($month) @if($month->month == 11) selected @endif @endif value='11'>December</option>
                                            </select>
                                        </div>

                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Connect your Jira account</label>
                                             <select onchange="jirraaccount(this.value)" name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                                <option value="">Select</option>
                                                <option value='yes'>Yes</option>
                                                <option selected value='no'>No</option>
                                            </select>
                                        </div>
                                        <div class="row" id="jiraaccount" style="display: none">
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="fv-row mb-8">
                                                    <label class="form-label required">Jira Connect Name</label>
                                                    <input type="text" name="jira_name" autocomplete="off" class="form-control form-control-lg form-control-solid" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                               <div class="fv-row mb-8">
                                                  <label class="form-label required">Jira Url</label>
                                                  <input type="url" class="form-control form-control-lg form-control-solid" name="jira_url"  id="team-title" >
                                               </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                               <div class="fv-row mb-8">
                                                <label class="form-label required">Jira User Name</label>
                                                  <input type="text" class="form-control form-control-lg form-control-solid" name="user_name"  id="team-title" >
                                               </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                               <div class="fv-row mb-8">
                                                <label class="form-label required">Jira Token</label>
                                                  <input type="text" class="form-control form-control-lg form-control-solid" name="token"  id="team-title" >
                                               </div>
                                            </div>
                                        </div>

                                        @php
                                            $plan = DB::table('plan')->where('status','Active')->get();
                                            @endphp
                                            @foreach($plan as $p)
                                            @php
                                            $dataArray = explode(',', $p->module);
                                            @endphp

                  

                                        <div class="row mb-10">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <div>
                                                                <h1 class="text-gray-900 mb-5 fw-bolder">{{$p->plan_title}}</h1>
                                                                <div class="text-gray-600 fw-semibold mb-5">
                                                                    Optimal for 10+ team size<br> and new startup                                                 
                                                                </div>
                                                                <div class="w-100 mb-10">  
                                                                    <!--begin::Item-->
                                                                    @foreach($dataArray as $arr)                                               
                                                                    <div class="d-flex align-items-center mb-5">
                                                                               
                                                                    <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                        {{$arr}}                                                
                                                                    </span> 
                                                                        <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                                                    </div>
                                                                    @endforeach
                                                                    <!--end::Item--> 
                                                                                                    
                                                                                                        
                                                                        
                                                            </div>
                                                            </div>
                                                            <div>
                                                                <div class="min-w-200px bg-primary text-center card-rounded py-12">                               

                                                                    <div class="fs-5x text-white d-flex justify-content-center align-items-start">
                                                                        <span class="fs-2 mt-3">£</span>
                                                                        
                                                                        <span class="lh-sm fw-semibold" data-kt-plan-price-month="99" data-kt-plan-price-annual="399">
                                                                            {{$p->base_price}}
                                                                        </span>                                    
                                                                    </div>

                                                                    <div class="text-white fw-bold mb-7"> User / {{$p->billing_method}} </div>

                                                                    <button type="button"  onclick="GetPlan({{$p->id}},'{{$p->base_price}}','{{$p->plan_id}}')" class="btn bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white fw-bold mx-auto">Start Free Trial</button>                                 
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="row" id="plan">
                                                        <div class="col-md-6" id="user-{{$p->id}}">
                                                          
                                                        </div>

                                                        <div class="col-md-6" id="price-{{$p->id}}">
                                                          
                                                        </div>
                                                         </div>
                                                       

                                                    </div>

                                                </div>
                                            </div>
                                            
                                        </div>
                                     

                                        @endforeach

                                   
                                    </div>

                                    <!--end::Wrapper-->
                                </div>


                                
                                @csrf
                                <div class="d-flex flex-stack pt-15">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Previous</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit 
                                            <i class="ki-outline ki-arrow-right fs-4 ms-2"></i></span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
                                        <i class="ki-outline ki-arrow-right fs-4 ms-1"></i></button>
                                    </div>
                                </div>
                                <div class="text-gray-500 text-center fw-semibold fs-6">Already Member yet 
                                <a href="{{ url('login') }}" class="link-primary">Sign In</a></div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
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
        <script type="text/javascript">
            function defaultsettings() {
                $('#level_one').val('Business Units');
                $('#level_two').val('Value Streams');
                $('#level_three').val('Teams');
            }
            function jirraaccount(id) {

                if(id == 'yes') {
                  $('#jiraaccount').show();
                }else
                {
                    $('#jiraaccount').hide();
                }
            }
            $('#kt_create_account_form').on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: $(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        if(xhr.status === 403)
                        {
                            location.reload();
                        }
                        if (xhr.status === 422) {
                          var errorMessage = "Error 422: ";
                              if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage += xhr.responseJSON.message + "\n";
                              }
                              if (xhr.responseJSON && xhr.responseJSON.errors) {
                                errorMessage += "Additional Errors: ";
                                for (var key in xhr.responseJSON.errors) {
                                  errorMessage += key + ": " + xhr.responseJSON.errors[key].join(", ") + "; ";
                                }
                              }
                            Swal.fire({
                                text: errorMessage,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then((function() {
                                
                            }))
                        } else {
                          // Handle other error cases if needed
                          console.error("Error: " + status + " - " + error);
                        }
                        
                    }
                });
            }));

            var activeCard = null;

function GetPlan(id, price, plan_id) {
    $('#user-' + id).html('How Many User Do you Have? <input class="form-control w-50" id="input-' + id + '" onkeyup="getprice(this.value, ' + price + ', ' + id + ')" type="number">');
    
    // Remove fields from the previously active card
    if (activeCard !== null && activeCard !== id) {
        $('#user-' + activeCard).empty();
        $('#price-' + activeCard).empty();
        
    }
    
    $('#plan-id').val(plan_id);
    activeCard = id;
}

function getprice(value, price, id) {
    var total = value * price;
    $('#price-' + id).html('<span class="mt-3"> £ ' + total.toFixed(2) + ' </span> <p>You will be charged after 30 days</p>');
    $('#max-user').val(value);
}
        </script>
    </body>
</html>