@extends('admin.layouts.main-layout')
@section('title','All Agents')
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
                            <h5 class="text-dark font-weight-bold my-1 mr-5">Clone User</h5>
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/dashboard') }}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript::void(0)" class="text-muted">Manage Users</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/users/cloneuser') }}" class="text-muted">Clone User</a>
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
                            Clone User
                            <div class="text-muted pt-2 font-size-sm">Manage Clone User</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="getuserdata" method="POST" action="{{ url('admin/users/getuserdata') }}">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Select User From</label>
                                    <select required name="from" class="selectfrom form-control">
                                        <option value="">Select User</option>
                                        @foreach($data as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }} ({{$r->organization_name}})  </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label>Select User To</label>
                                    <select required name="to" class="selectto form-control">
                                        <option value="">Select User To</option>
                                        @foreach($data as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }} ({{$r->organization_name}}) </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="savechangebutton btn btn-primary">Get Data</button>
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
<div class="modal fade" id="datamodal">
<div class="modal-dialog modal-dialog-scrollable modal-lg">
  <div class="modal-content">
        <div class="modal-body">
            <h3 class="text-center">All Data is Clonned Successfully</h3>
        </div>
  </div>
</div>
</div>
@endsection

@section('script')

<script>
$('.getuserdata').on('submit',(function(e) {
    $('.savechangebutton').html('<i class="fa fa-spin fa-spinner"></i>');
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            $('#datamodal').modal('show');   
            setTimeout(function() { 
                location.reload();
            }, 2000);
        }
    });
}));
$(document).ready(function() {
  $(".selectfrom").select2({
    closeOnSelect : true,
    placeholder : "Select From User",
    // allowHtml: true,
    allowClear: true,
    tags: true // создает новые опции на лету
});
  $(".selectto").select2({
    closeOnSelect : true,
    placeholder : "Select To User",
    // allowHtml: true,
    allowClear: true,
    tags: true // создает новые опции на лету
});
  });
</script>
@endsection