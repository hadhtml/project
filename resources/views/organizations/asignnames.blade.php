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
    <title>Asign Names To Modules</title>
    <style type="text/css">
    </style>
</head>

<body>

   
    <div class="d-flex flex-column flex-root">

        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-10 px-lg-30">
                    <div class="d-flex flex-column-fluid flex-column flex-center" id="asigloading">
                        <div class="row auth-form">
                            <div class="col-md-12">
                                <h3>Asign Names To Modules</h3>
                            </div>
                        </div>
                        <div class="input-fields-area py-lg-0">
                            <form class="createmodulenames needs-validation pt-2" method="POST" action="{{ route('createmodulenames') }}">
                                @csrf
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
                            </form>                        
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Aside-->
            @include('components.authsidebar')
            <!--begin::Content-->
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
$('.createmodulenames').on('submit',(function(e) {
    $('#createmodulenamesbutton').html('<i class="fa fa-spin fa-spinner"></i>');
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