@extends('admin.layouts.main-layout')
@section('title','Footer Section')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
                <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <div class="d-flex align-items-center flex-wrap mr-1">
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                     
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/dashboard') }}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript::void(0)" class="text-muted">Manage Footer Section</a>
                                </li>
                           
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Card-->
            @include('admin.alerts.index')
            <div class="card card-custom mt-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Add  Footer Section
                            <div class="text-muted pt-2 font-size-sm">Manage Footer Section</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form  method="POST" action="{{ url('admin/save-footer') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="section" value="footer">
                                <input type="hidden"  name="oldimage" value="{{$data->image}}">
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Facebook</label>
                                     <input type="url" name="facebook" value="{{$data->facebook}}" class="form-control" required>
                                </div>


                                <div class="col-md-6">
                                    <label>Twitter</label>
                                     <input type="url"  value="{{$data->twitter}}"  name="twitter" class="form-control" required>
                                </div>

                                
                                <div class="col-md-6" >
                                    <label>instagram</label>
                                     <input type="url"  value="{{$data->instagram}}" name="instagram" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <img src="{{asset('public/images/'.$data->image)}}" height="50" width="50" class="mt-1 mb-1 bg-dark">
                                    <label>Logo</label>
                                     <input type="file" value="{{$data->image}}"  name="image" class="form-control">
                                </div>

                            

                               
                            
                                <div class="col-md-12 mt-3">
                                    <button class="savechangebutton btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
 <!-- The Modal -->

@endsection

@section('script')

<script>


</script>
@endsection