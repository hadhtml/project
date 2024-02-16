@php
$var_objective = "Jira";
@endphp
@extends('components.main-layout')
<title>Assign Names To Levels</title>
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body p-10">
            <form class="needs-validation pt-2" method="POST" action="{{ route('settings.updatemodulenames') }}">
                 @csrf
                 <div class="row">
                     <div class="col-md-12 col-lg-12 col-xl-12">
                         <div class="form-group mb-0">
                             <input type="text" class="form-control @error('level_one') is-invalid @enderror" name="level_one" value="{{ Cmf::getmodulename('level_one') }}"  id="level_one" required>
                             <label for="level_one">Level One</label>
                         </div>
                     </div>
                      <div class="col-md-12 col-lg-12 col-xl-12">
                         <div class="form-group mb-0">
                             <input type="text" class="form-control @error('level_two') is-invalid @enderror" name="level_two" value="{{ Cmf::getmodulename('level_two') }}"  id="level_two" required>
                             <label for="level_two">Level Two</label>
                         </div>
                     </div>
                      <div class="col-md-12 col-lg-12 col-xl-12">
                         <div class="form-group mb-0">
                             <input type="text" class="form-control @error('level_three') is-invalid @enderror" name="level_three" value="{{ Cmf::getmodulename('level_three') }}"  id="level_three" required>
                             <label for="level_three">Level Three</label>
                         </div>
                     </div>                                
                     <div class="col-md-12 py-2">
                         <button id="createmodulenamesbutton" class="btn btn-primary btn-lg btn-theme ripple">Update Names</button>
                     </div>
                 </div>
             </form>   
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
   $(document).ready(function() {
   setTimeout(function(){$('.alert-success').slideUp();},3000); 
   }); 
</script>                    
@endsection