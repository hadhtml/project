@php
$var_objective = "security";
@endphp
@extends('components.main-layout')
<title>My Profile</title>
@section('content')
@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first();
@endphp

<div class="row">
   <div class="col-md-12">
      @if (session('message'))
      <div class="alert alert-success mt-1" role="alert">
         {{ session('message') }}
      </div>
      @endif
      <div class="card">
         <div class="card-body p-10">
            
            <form method="POST" action="{{url('update-profile')}}" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" value="{{$user->id}}">
               
               <div class="row">
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">First Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid"  value="{{$user->name}}" name="name" placeholder="" />
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Last Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid"  value="{{$user->last_name}}" name="last_name" placeholder="" />
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Email</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" readonly value="{{$user->email}}" name="email" placeholder="" />
                     </div>
                  </div>
                  @if(Auth::user()->invitation_id == '')
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Organization Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid"  value="{{$organization->organization_name}}" name="org_name" placeholder="" />
                     </div>
                  </div>
                  @endif
                  <input type="hidden" id="old_image" name="old_image" value="{{ $user->image }}">
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Profile Picture</span>
                        </label>
                        <input type="file" class="form-control form-control-solid" name="image" accept=".png, .jpg, .jpeg" >
                     </div>
                  </div>
                  <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                     @if($user->image != NULL)
                     <img src="{{asset('public/assets/images/'.$user->image)}}" style="width:100px; height:100px; object-fit:cover" alt="Example Image">
                     @else
                     @php
                          $avatarname = substr($user->name, 0, 1).' '.substr($user->last_name, 0, 1);
                     @endphp
                     <img src="{{ Avatar::create($avatarname)->toBase64() }}" style="width:100px; height:100px; object-fit:cover">
                     @endif
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
@endsection