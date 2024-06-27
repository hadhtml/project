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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('public/assets/images/icons/icon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Asign Names To Modules</title>
    <style type="text/css">



.main-container 
{
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.main-container h2 
{
  margin: 0 0 80px 0;
  color: #555;
  font-size: 30px;
  font-weight: 300;
}

.radio-buttons 
{
  width: 100%;
  margin: 0 auto;
  text-align: center;
}

.custom-radio input 
{
  display: none;
}

.radio-btn 
{
  margin: 10px;
  width: 220px;
  height: 240px;
  border: 3px solid transparent;
  display: inline-block;
  border-radius: 10px;
  position: relative;
  text-align: center;
  box-shadow: 0 0 20px #c3c3c367;
  cursor: pointer;
}

.radio-btn > i {
  color: #ffffff;
  background-color: #FFDAE9;
  font-size: 20px;
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%) scale(2);
  border-radius: 50px;
  padding: 3px;
  transition: 0.5s;
  pointer-events: none;
  opacity: 0;
}

.radio-btn .hobbies-icon 
{
  width: 150px;
  height: 150px;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.radio-btn .hobbies-icon img
{
  display:block;
  width:100%;
  margin-bottom:20px;
  
}
.radio-btn .hobbies-icon i 
{
  color: #FFDAE9;
  line-height: 80px;
  font-size: 60px;
}

.radio-btn .hobbies-icon h3 
{
  color: #555;
  font-size: 18px;
  font-weight: 300;
  text-transform: uppercase;
  letter-spacing:1px;
}

.custom-radio input:checked + .radio-btn 
{
  border: 2px solid #FFDAE9;
}

.custom-radio input:checked + .radio-btn > i 
{
  opacity: 1;
  transform: translateX(-50%) scale(1);
}

    </style>
</head>

<body>

   
    <div class="d-flex flex-column flex-root">
                <div class="text-center mt-5">
                <img alt="Logo" class="" src="{{ url('public/assets/images/icons/icon.ico') }}" height="100" width="100" />
                </div>
                    <h4 class="text-center">Hi {{auth::user()->name}}, Welcome to OutcomeMet!</h4>
                    <h5 class="text-success text-center">You have successfully verified account.</h5>
      
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white">
            <!--begin::Aside-->
            
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-12 px-7 py-lg-10 px-lg-30" >
                    <div class="d-flex flex-column-fluid flex-column flex-center" id="asigloading">
                        
                        <div class="input-fields-area py-lg-0">
                          
                                <div class="row">

                                    
                               
                            
                            <div class="">
                                  @php
                                      $Org = DB::table('org_structrue')->get();
                                  @endphp
                                <form class="createmodulenames needs-validation pt-2" method="POST" action="">
                                    @csrf
                                    <div class="row">
                                   
                                            <div class="radio-buttons row">
                                              @foreach($Org as $data)
                                               <div class="col-md-6"> 
                                              <label class="custom-radio ">
                                                <input type="radio" name="radio" onclick="checkedcheck(this.value,'{{$data->level_1}}','{{$data->level_2}}','{{$data->level_3}}')" checked value="{{$data->id}}">
                                                <span class="radio-btn"><i class="las la-check"></i>
                                                  <div class="hobbies-icon">
                                                    <p>{{$data->org_name}}</p>
                                                    <h6 class="">{{$data->level_1}},</h3>
                                                    <h6 class="">{{$data->level_2}}</h3>
                                                    <h6 class="">and {{$data->level_3}}.</h3>
                                                  </div>
                                                </span>
                                              </label>
                                               </div>
                                              @endforeach
                                            
                                              <div class="col-md-6" > 
                                                <label class="custom-radio" >
                                                  <input type="radio" name="radio" onclick="checkedcheck(this.value,'1','2','3')"  value="custom">
                                                  <span class="radio-btn"><i class="las la-check"></i>
                                                    <div class="hobbies-icon">
                                                      <p>Custom</p>
                                                      <h6 class="">Customise it to your,</h3>
                                                      <h6 class="">organisation structure</h3>
                                                   
                                                    </div>
                                                  </span>
                                                </label>
                                                 </div>
                                            </div>
                                            
                                       
                                                                      
                                        <div class="col-md-12 py-2">
                                            <button id="createmodulenamesbutton" type="button" style="float: right" onclick="createmodulenames();" class="btn btn-primary btn-lg btn-theme  ripple">Continue</button>
                                        </div>
                                     
                                    </div>
                                                  
                            </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                      
                                    </div>
                                     <div class="col-md-12 col-lg-12 col-xl-12">
                                       
                                    </div>
                                     <div class="col-md-12 col-lg-12 col-xl-12">
                                        
                                    </div>                                
                                    <div class="col-md-12 py-2">
                                    </div>
                                 
                                </div>
                            </form>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 order-lg-2 d-flex flex-column w-100 pb-0 login-right-cont" style="margin-top:5%">
                <!--begin::Title-->
                <div class="d-flex flex-column pt-lg-5 pt-md-4 pt-sm-5 px-lg-0 pt-5 px-7" >
                    <div class="checked" style="display:none">
                    <div class="form-group mb-0"  >
                        <input type="text" class="form-control @error('level_one') is-invalid @enderror" name="level_one" value="{{ old('level_one') }}"  id="level_one" required>
                        <label for="level_one" style="margin-bottom:62px !important">Level One</label>
                    </div>
                    <div class="form-group mb-0">
                        <input type="text" class="form-control @error('level_two') is-invalid @enderror" name="level_two" value="{{ old('level_two') }}"  id="level_two" required>
                        <label for="level_two" style="margin-bottom:62px !important">Level Two</label>
                    </div>

                    <div class="form-group mb-0">
                        <input type="text" class="form-control @error('level_three') is-invalid @enderror" name="level_three" value="{{ old('level_three') }}"  id="level_three" required>
                        <label for="level_three" style="margin-bottom:62px !important">Level Three</label>
                    </div>
                </div>
                </div>
                <!--end::Title-->
                <!--begin::Image-->
                <!-- <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url('{{asset('public/assets/images/info-graphics/login-aside.png')}}');"></div> -->
                <!--end::Image-->
            </div>
        </div>
    </div>
</body>
<!-- MDB -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script type="text/javascript">
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
function defaultsettings() {
    $('#level_one').val('Business Units');
    $('#level_two').val('Value Streams');
    $('#level_three').val('Teams');
    $('.createmodulenames').submit();
}

function checkedcheck(val,level_1,level_2,level_3) {
    if(val == 'custom')
    {
    $('.checked').show();
    $('#level_one').val('');
    $('#level_two').val('');
    $('#level_three').val('');
    }else
    {
    $('#level_one').val(level_1);
    $('#level_two').val(level_2);
    $('#level_three').val(level_3);
    $('.checked').show();
    }

}
function createmodulenames() {

    $('#createmodulenamesbutton').html('<i class="fa fa-spin fa-spinner"></i>');
    $("#createmodulenamesbutton" ).prop("disabled", true);
   var level_one =  $('#level_one').val();
   var level_two =  $('#level_two').val();
   var level_three = $('#level_three').val();
        $.ajax({
            type: "POST",
            url: "{{ route('createmodulenames') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                level_one: level_one,
                level_two: level_two,
                level_three: level_three,
            },
            success: function(data) {
               
        
                var url = '{{ route("organization.dashboard") }}';
                window.location.replace(url);
            },
            error: function(error) {
                console.log('Error updating card position:', error);
            }
        });
    }

$('.createmodulenames').on('submit',(function(e) {
    // $('#createmodulenamesbutton').html('<i class="fa fa-spin fa-spinner"></i>');
    $("#createmodulenamesbutton" ).prop("disabled", true);
    e.preventDefault();
  
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(res){
            $('#asigloading').html('<div class="row auth-form"> <div class="col-md-12"> <h3>Asign Names To Modules</h3> </div> </div> <div class="text-center mt-3 mb-3"> <img src="{{ url("public/images/Processing.gif") }}"> </div>');
            setTimeout(function() { 
                var url = '{{ route("organization.dashboard") }}';
                window.location.replace(url);
            }, 2000);
        }
    });
}));
</script>

</html>