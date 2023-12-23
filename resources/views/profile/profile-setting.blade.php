@php
$var_objective = "security";
@endphp
@extends('components.main-layout')
<title>Profile</title>
@section('content')

@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->first();
@endphp
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="card">
                            <div class="card-body p-6">

                              
                                @if (session('message'))
                                <div class="alert alert-success mt-1" role="alert">
                                    {{ session('message') }}
                                </div>
                                 @endif

                        <form method="POST" action="{{url('update-profile')}}" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="id" value="{{$user->id}}">  
                          <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control"  value="{{$user->name}}" name="name" placeholder="" />
                                      
                                        <label for="objective-name">First Name</label>
                                    </div>
                                 
                                </div>
                           
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control"  value="{{$user->last_name}}" name="last_name" placeholder="" />
                                     
                                        <label for="objective-name">Last Name</label>
                                    </div>
                                
                                </div>
                           
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="email" class="form-control " readonly value="{{$user->email}}" name="email" placeholder="" />
                                          
                                        <label for="objective-name" style="bottom: 72px">Email</label>
                                    </div>
                              
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control "  value="{{$organization->organization_name}}" name="org_name" placeholder="" />
                                          
                                        <label for="objective-name" style="bottom: 72px">Organization Name</label>
                                    </div>
                              
                                </div>

                                <input type="hidden" id="old_image" name="old_image" value="{{ $user->image }}">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                  @if($user->image != NULL)
                                  <img src="{{asset('public/assets/images/'.$user->image)}}" style="width:100px; height:100px; object-fit:cover" alt="Example Image">
                                  @else
                                  <img src="{{ Avatar::create($user->name)->toBase64() }}" style="width:100px; height:100px; object-fit:cover">
                                  @endif
                                      <div class="form-group mb-0">
                                          <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg" >
                                          <label for="profile">Profile Picture</label>
                                      </div>
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