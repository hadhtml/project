@php
$var_objective = "security";
@endphp
@extends('components.main-layout')
<title>Change password</title>
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
            <form method="POST" action="{{url('update-password')}}">
               @csrf  
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group mb-0">
                     <input type="password" class="form-control form-control-lg form-control-solid mb-2" value="" name="old_password" placeholder="" />
                     <label for="objective-name">Current password @error('old_password')
                     <span style=" font-size: 8px; font-weight: 400 !important; color: red; " role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror</label>
                  </div>
                  
               </div>
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group mb-0">
                     <input type="password" class="form-control form-control-lg form-control-solid" value="" name="password" placeholder="" />
                     <label for="objective-name">New password @error('password')
                  <span style=" font-size: 8px; font-weight: 400 !important; color: red; " class="custom_error" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror</label>
                  </div>
                  
               </div>
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group mb-0">
                     <input type="password" class="form-control form-control-lg form-control-solid" value="" name="password_confirmation" placeholder="" />
                     <label for="objective-name">Verify password @error('password_confirmation')
                  <span style=" font-size: 8px; font-weight: 400 !important; color: red; " class="custom_error" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror</label>
                  </div>
                  
               </div>
               <div class="col-md-12">
                  <button type="submit"  class="btn btn-primary btn-lg btn-theme  ripple">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
<!-- end page content -->
@endsection