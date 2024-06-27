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
             
             @if (session('message'))
            <div class="alert alert-success mt-1" role="alert">
               {{ session('message') }}
            </div>
            @endif
            <form class="needs-validation pt-2" method="POST" action="{{ route('settings.updatemodulenames') }}">
                 @csrf
                <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Level One</span>
                  </label>
                  <input type="text" class="form-control form-control-solid" name="level_one" value="{{ Cmf::getmodulename('level_one') }}"  id="level_one" required>
                </div>
                <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Level Two</span>
                  </label>
                  <input type="text" class="form-control form-control-solid" name="level_two" value="{{ Cmf::getmodulename('level_two') }}"  id="level_two" required>
                </div>
                <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Level Three</span>
                  </label>
                  <input type="text" class="form-control form-control-solid" name="level_three" value="{{ Cmf::getmodulename('level_three') }}"  id="level_three" required>
                </div>
                 <div class="row">                          
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