<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
     <link rel="icon" type="image/x-icon" href="{{asset('public/assets/images/icons/icon.ico')}}">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Signup</title>
    <style type="text/css">
    </style>
</head>

<body style="background: #f3f3f3;">
<style type="text/css">

.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

    .form-group>label {
        bottom: 72px !important;
    }
</style>
    <div class="d-flex flex-column flex-root">
        <div class="container p-5" >
            <div class="card" style="height: 60vh !important;">
                <div class="card-body p-0">
                    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white">
                        <!--begin::Aside-->
                        <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                            <!--begin: Aside Container-->
                            <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-10 px-lg-10">
                                <div class="d-flex flex-column-fluid flex-column flex-center">
                                    <!-- <div class="login-nav-links pt-md-1 pb-md-3 pt-sm-5 px-lg-0 pt-5 px-7">
                                        <div class="d-flex flex-row">
                                            <div>
                                                <a href="{{url('/login')}}" >Sign in</a>
                                            </div>
                                            <div>
                                                <a href="{{url('/register')}}" class="active">Create account</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row auth-form">
                                        <div class="col-md-12">
                                            <h3>Create new account</h3>
                                            <p>Fil-in the form and register to an awesome journey</p>
                                        </div>
                                    </div>

                                    <div class="row social-buttons mb-2">
                                        <div class="col-xl-6 col-lg-6 col-md-6 p-2">
                                            <button class="btn btn-white btn-block">
                                                <img src="{{asset('public/assets/images/icons/google.svg')}}">
                                               <a href="{{url('/auth/google')}}" class="btn">Google</a>
                                            </button>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 p-2">
                                            <a href="{{url('/auth/facebook')}}">
                                            <button class="btn btn-white btn-block">
                                                <img src="{{asset('public/assets/images/icons/facebook.svg')}}">
                                                Facebook
                                            </button>
                                            </a>
                                        </div>
                                        {{-- <div class="col-xl-6 col-lg-6 col-md-6 p-2">
                                            <button class="btn btn-white btn-block">
                                                <img src="{{asset('public/assets/images/icons/apple.svg')}}">
                                                Apple
                                            </button>
                                        </div> --}}
                                    </div>

                                    <div class="input-fields-area py-lg-0">
                                            <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                                        <p><small>Signup</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                        <p><small>Organizational structure</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                        <p><small>Setup workflow</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                                        <p><small>Step 4</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <form role="form" class="needs-validation pt-2" method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="panel panel-primary setup-content" id="step-1">
                                                    <div class="panel-heading">
                                                         <h3 class="panel-title">Signup</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="FirstName" required>
                                                            <label for="FirstName">First Name</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="last_name" id="LastName" required>
                                                            <label for="LastName">Last Name</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="org_name" id="LastName" required>
                                                            <label for="LastName">Organization Name</label>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" required>
                                                            <label for="email">Email</label>
                                                          
                                                        </div>
                                                        @error('email')
                                                        <span class="invalid-feedback" style="display:block !important" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                         @enderror
                                                         <div class="form-group mb-0 position-relative">
                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" onkeyup="passwordValidation();" name="password" id="Password" required>
                                                            <label for="Password">Password</label>
                                                        
                                                            <span class="toggle-password" style="top:20px !important" onclick="togglePasswordVisibility('Password')"><i class="fas fa-eye"></i></span>
                                                        </div>
                                                        {{-- <div class="form-group mb-0 position-relative">
                                                            <input type="password" class="form-control" id="ConfirmPassword"  name="password_confirmation" required>
                                                            <label for="ConfirmPassword">Confirm Password</label>
                                                            <span class="toggle-password" style="top:20px !important" onclick="togglePasswordVisibility('ConfirmPassword')"><i class="fas fa-eye"></i></span>
                                                        </div> --}}

                                                        @error('password')
                                                        <span class="invalid-feedback" style="display:block !important" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                       </span>
                                                         @enderror
                                                    <span class="" id="pswmessage" role="alert"></span>

                                                    <div class="col-md-12">
                                                        <div id="popover-password" style="display:none;">
                                                            <ul class="list-unstyled" style="font-size:12px; margin-bottom: 0px;">
                                                                <li class="">
                                                                    <span class="low-upper-case">
                                                                        <i class="fas fa-check" aria-hidden="true"></i>
                                                                        &nbsp;Lowercase &amp; Uppercase
                                                                    </span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="one-number">
                                                                        <i class="fas fa-check" aria-hidden="true"></i>
                                                                        &nbsp;Number (0-9)
                                                                    </span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="one-special-char">
                                                                       <i class="fas fa-check" aria-hidden="true"></i>
                                                                        &nbsp;Special Character (!@#$%^&*)
                                                                    </span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="eight-character">
                                                                        <i class="fas fa-check" aria-hidden="true"></i>
                                                                        &nbsp;Atleast 8 Character
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                        <button class="btn btn-primary nextBtn pull-right" id="password-button" type="button">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-primary setup-content" id="step-2">
                                                    <div class="panel-heading">
                                                         <h3 class="panel-title">Organizational Structure</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control @error('level_one') is-invalid @enderror" name="level_one" value="{{ old('level_one') }}"  id="level_one" required>
                                                                    <label for="level_one">Level One</label>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control @error('level_two') is-invalid @enderror" name="level_two" value="{{ old('level_two') }}"  id="level_two" required>
                                                                    <label for="level_two">Level Two</label>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control @error('level_three') is-invalid @enderror" name="level_three" value="{{ old('level_three') }}"  id="level_three" required>
                                                                    <label for="level_three">Level Three</label>
                                                                </div>
                                                            </div>                                
                                                            <div class="col-md-12 py-2">
                                                                <button id="createmodulenamesbutton" class="btn btn-primary btn-lg btn-theme btn-block ripple">Asign</button>
                                                            </div>
                                                            <div class="col-md-12 py-2">
                                                                <div class="row py-3">
                                                                    <div class="col-md-12 text-center">
                                                                        <p>Continue With Default Settings <a onclick="defaultsettings()" href="javascript:void(0)">Click Here</a> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-primary setup-content" id="step-3">
                                                    <div class="panel-heading">
                                                         <h3 class="panel-title">Setup workflow</h3>
                                                    </div>

                                                    <h6 class="ml-5">Financial Year Setting</h6>

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
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            
                                                           
                                                            <select class="form-control" name="month">
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

                                                                <label for="lead-manager" style="margin-top: 25px">Select Month</label>  
                                                                   
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-check">
                                                              <input class="form-check-input" name="check" type="checkbox" id="gridCheck">
                                                              <label class="form-check-label" for="gridCheck">
                                                                Connect your Jira account
                                                              </label>
                                                            </div>
                                                          </div>
                                                      
                                                           
                                                              <div class="row" id="jiraaccount" style="display: none">
                                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                                   <div class="form-group mb-0">
                                                                      <input type="text" class="form-control" name="jira_name"  id="team-title">
                                                                      <label for="team-title">Jira Connect Name</label>
                                                                   </div>
                                                                </div>
                                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                                   <div class="form-group mb-0">
                                                                      <input type="url" class="form-control" name="jira_url"  id="team-title" >
                                                                      <label for="team-title">Jira Url</label>
                                                                   </div>
                                                                </div>
                                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                                   <div class="form-group mb-0">
                                                                      <input type="text" class="form-control" name="user_name"  id="team-title" >
                                                                      <label for="team-title">Jira User Name</label>
                                                                   </div>
                                                                </div>
                                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                                   <div class="form-group mb-0">
                                                                      <input type="text" class="form-control" name="token"  id="team-title" >
                                                                      <label for="team-title">Jira Token</label>
                                                                   </div>
                                                                </div>
                                                               
                                                             </div>
                                                              
                                                   
                                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-primary setup-content" id="step-4">
                                                    <div class="panel-heading">
                                                         <h3 class="panel-title">Step 4</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{-- <div class="form-group">
                                                            <label class="control-label">Company Name</label>
                                                            <input maxlength="200" type="text" class="form-control" placeholder="Enter Company Name" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Company Address</label>
                                                            <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Address" />
                                                        </div> --}}
                                                        <button class="btn btn-success pull-right" type="submit">Finish!</button>
                                                    </div>
                                                </div>
                                            </form>
                                      
                                        <div class="row py-3">
                                            <div class="col-md-12 text-center">
                                                <p>already have an account? <a href="{{url('/login')}}">Sign in</a> </p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Aside-->
                        <!--begin::Content-->
                     @include('components.authsidebar')
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</body>
<!-- MDB -->
<script type="text/javascript">

$(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-success').addClass('btn-default');
        $item.addClass('btn-success');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='password']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
        if (!curInputs[i].validity.valid) {
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-success').trigger('click');
});
function togglePasswordVisibility(fieldId) {
    const passwordField = document.querySelector(`#${fieldId}`);
    const icon = document.querySelector(`[onclick="togglePasswordVisibility('${fieldId}')"] i`);

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}


function passwordValidation()
{
 regexPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
 inputTextVal = document.getElementById("Password");
if(inputTextVal.value.match(regexPattern))
 {
// document.getElementById("pswmessage").innerHTML ='';
$('#password-button').attr('disabled',false);

 }
else
 {
// document.getElementById("pswmessage").innerHTML = '<ul class="mt-1 mb-0" style="font-size:14px" id="message" class="error-message-register"><li id="letter" class="invalid one-number"><i class="icofont-tick-mark"></i> Lowercase Letter</li><li id="capital" class="invalid"><i class="icofont-tick-mark"></i> One Capital Letter</li><li id="number" class="invalid"><i class="icofont-tick-mark"></i> One Numeric Digit</li><li id="length" class="invalid"><i class="icofont-tick-mark"></i> Minimum 8 characters</li></ul>';
$('#password-button').attr('disabled',true);

 }
 if(inputTextVal.value == '')
 {
// document.getElementById("pswmessage").innerHTML ='';
document.getElementById("popover-password").style.display = "none"; 
 }
}
</script>
<script>

let state = false;
let password = document.getElementById("Password");

let lowUpperCase = document.querySelector(".low-upper-case");
let number = document.querySelector(".one-number");
let specialChar = document.querySelector(".one-special-char");
let eightChar = document.querySelector(".eight-character");

password.addEventListener("keyup", function() {
    let pass = document.getElementById("Password").value;
  
    document.getElementById("popover-password").style.display = "block"; 
    checkStrength(pass);
});

function checkStrength(password) {
    let strength = 0;

    //If password contains both lower and uppercase characters
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
        // lowUpperCase.classList.remove('fa-circle');
        lowUpperCase.style.color  = "#10c25a";
    } else {
        // lowUpperCase.classList.add('fa-circle');
          lowUpperCase.style.color  = "black";
    }
    //If it has numbers and characters
    if (password.match(/([0-9])/)) {
        strength += 1;
        number.style.color  = "#10c25a";
        // number.classList.add('fa-check');
    } else {
        // number.classList.add('fa-circle');
        number.style.color  = "black";
    }
    //If it has one special character
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
        // specialChar.classList.remove('fa-circle');
        specialChar.style.color  = "#10c25a";
    } else {
        // specialChar.classList.add('fa-circle');
        specialChar.style.color  = "black";
    }
    //If password is greater than 7
    if (password.length > 7) {
        strength += 1;
        // eightChar.classList.remove('fa-circle');
        eightChar.style.color  = "#10c25a";
    } else {
        // eightChar.classList.add('fa-circle');
        eightChar.style.color  = "black";
    }


}

function defaultsettings() {
    $('#level_one').val('Business Units');
    $('#level_two').val('Value Streams');
    $('#level_three').val('Teams');
    // $('.createmodulenames').submit();
}

$(document).ready(function() {

    $('#gridCheck').change(function() {
        if($(this).is(":checked")) {
        
          $('#jiraaccount').show();
        }else
        {
            $('#jiraaccount').hide();
            // $('#jiraaccount').html('');  
        }
    });
});


</script>

</html>