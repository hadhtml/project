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
                            Add  Subscriptions Plan
                            <div class="text-muted pt-2 font-size-sm">Manage Subscriptions Plan</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form  method="POST" action="{{ url('admin/update-plan') }}">
                                @csrf
                              
                             <input type="hidden" name="id" value="{{$data->id}}"> 
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Plan name</label>
                                     <input type="text" name="plan_title" value="{{$data->plan_title}}" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Duration (Insert days)</label>
                                     <input type="text" required onkeypress="return onlyNumberKey(event)" value="{{$data->duration}}" name="duration" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label>Base Price</label>
                                    <select required name="base_price_status" required onchange="getval(this.value)" class="form-control">
                                        <option value="">Select Base Price</option>
                                     
                                        <option @if($data->base_price_status == 'price') selected @endif value="price"> Add price </option>
                                        <option @if($data->base_price_status == 'free') selected @endif value="free">Set this as free </option>
                            
                                      
                                    </select>
                                </div>

                                
                                <div class="col-md-6 price" @if($data->base_price_status == 'price') style="display: block"  @else style="display: none" @endif>
                                    <label>Base Price</label>
                                     <input type="text"  value="{{$data->base_price}}" id="lastvalue" onkeypress="return onlyNumberKey(event)" name="base_price" class="form-control">
                                </div>

                                <div class="col-md-6 price"@if($data->base_price_status == 'price') style="display: block"  @else style="display: none" @endif>
                                    <label>Sale Price</label>
                                     <input type="text"  value="{{$data->sale_price}}"  id="inputField"  onkeypress="return onlyNumberKey(event)" name="sale_price" class="form-control">
                              
                                     <span id="error" class="text-danger"></span>
                                </div>

                               

                                <div class="col-md-6">
                                    <label>Max number of users allowed for this plan</label>
                                     <input type="text"  value="{{$data->max_user}}" onkeypress="return onlyNumberKey(event)" name="max_user" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Price per user</label>
                                     <input type="text"  value="{{$data->per_user_price}}" onkeypress="return onlyNumberKey(event)" name="per_user_price" class="form-control">
                                </div>

                                @php
                                $dataArray = explode(',', $data->module);
                                $feature = DB::table('features')->where('plan_id',$data->id)->get();
                                @endphp

                                <div class="col-md-12">
                                    <label>Choose modules</label>
                                    <select required name="module[]" multiple class="selectfrom form-control">
                                     
                                        <option @foreach($dataArray as $arr) @if($arr == "OKR Planner" ) selected @endif  @endforeach value="OKR Planner">OKR Planner  </option>
                                        <option @foreach($dataArray as $arr) @if($arr == "OKR Mapper" ) selected @endif  @endforeach value="OKR Mapper"> OKR Mapper  </option>
                                        <option @foreach($dataArray as $arr) @if($arr == "Epic Backlog" ) selected @endif  @endforeach value="Epic Backlog"> Epic Backlog </option>
                                        <option @foreach($dataArray as $arr) @if($arr == "Flag" ) selected @endif  @endforeach value="Flag">Flags</option>
                                        <option @foreach($dataArray as $arr) @if($arr == "Map" ) selected @endif  @endforeach value="Map">Map </option>
                                        <option @foreach($dataArray as $arr) @if($arr == "kpi" ) selected @endif  @endforeach value="kpi">kpi  </option>
                                      
                                    </select>
                                </div>

                                  <div class="col-md-6">
                                    <label>Status</label>
                                    <select required name="status" class="form-control">
                                     
                                        <option @if($data->status == 'Active') selected @endif value="Active"> Active </option>
                                        <option @if($data->status == 'Inactive') selected @endif value="Inactive">Inactive </option>
                            
                                      
                                    </select>
                                </div>

                                @if(count($feature) > 0)
                               
                                <div class="col-md-8">
                                    <label>Features</label>
                                    @foreach($feature as $f)
                                    <input type="hidden" name="f_id[]" value="{{$f->id}}">
                                     <input type="text" value="{{$f->feature}}" name="features[]" required class="form-control m-2">
                                     @endforeach
                                    </div>
                             
                                @endif
                                

                                <div class="col-md-12">
                                    <label>Short description</label>
                                     <textarea type="text" cols="5"  name="description" class="form-control"> {{$data->description}} </textarea>
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
            $('.modal-content').html(data);
            $('#datamodal').modal('show');   
            $('.savechangebutton').html('Get Data');
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

  function onlyNumberKey(evt) 
  {
                  
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
    return false;
    return true;
  }
  
  function getval(id)
  {
   if(id == 'price')
   {
    $('.price').show();
   }

   if(id == 'free')
   {
    $('.price').hide();
    $('#error').html('');
    $('.savechangebutton').attr('disabled',false);
    $('#inputField').val('');
    $('#lastvalue').val('');
   }
  }

  
  $(document).ready(function(){
    $('#inputField').on('focusout', function() {
        var inputValue = $(this).val();
        var val = parseInt($('#lastvalue').val());
        if (inputValue >= val) {
           $('#error').html('Sale Price should be less then Base Price');
           $('.savechangebutton').attr('disabled',true);
            // You can perform further actions here if the user enters a plus sign
        }else
        {
            $('#error').html('');
            $('.savechangebutton').attr('disabled',false);
        }
    });
});

</script>
@endsection