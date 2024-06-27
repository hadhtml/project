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
            
             @if (session('error'))
            <div class="alert alert-danger mt-1" role="alert">
               {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{url('update-password')}}">
               @csrf
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Current password</span>
                  </label>
                  <input type="password" class="form-control form-control-solid" value="" name="old_password" placeholder="" />
                  @error('old_password')
                  <span class="" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">New password</span>
                  </label>
                  <input type="password" class="form-control form-control-solid" value="" name="password" placeholder="" />
                  @error('password')
                  <span class="custom_error" role="alert">
                  <strong>{{ $message }} 
                    </strong>
                    <br>
                    . must contain at least one lowercase letter,<br>
                    . must contain at least one uppercase letter,<br>
                    . must contain at least one digit,<br>
                    . must contain a special character 
                  </span>
                  @enderror
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Current password</span>
                  </label>
                  <input type="password" class="form-control form-control-solid" value="" name="password_confirmation" placeholder="" />
                  @error('password_confirmation')
                  <span class="custom_error" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
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