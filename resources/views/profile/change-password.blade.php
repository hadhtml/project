@php
$var_objective = "security";
@endphp
@extends('components.main-layout')
<title>Change password</title>
@section('content')




           
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="card">
                            <div class="card-body p-6">

                              
                                @if (session('msg'))
                                <div class="alert alert-success mt-1" role="alert">
                                    {{ session('msg') }}
                                </div>
                                 @endif

                        <form method="POST" action="{{url('update-password')}}">
                          @csrf  
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="password" class="form-control form-control-lg form-control-solid mb-2" value="" name="old_password" placeholder="" />
                                      
                                        <label for="objective-name">Current password</label>
                                    </div>
                                    @error('old_password')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                           
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="password" class="form-control form-control-lg form-control-solid" value="" name="password" placeholder="" />
                                     
                                        <label for="objective-name">New password</label>
                                    </div>
                                    @error('password')
                                    <span class="custom_error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                           
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="password" class="form-control form-control-lg form-control-solid" value="" name="password_confirmation" placeholder="" />
                                          
                                        <label for="objective-name">Verify password</label>
                                    </div>
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