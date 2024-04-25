@extends('admin.layouts.main-layout')
@section('title','Header Section')
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
                                    <a href="javascript::void(0)" class="text-muted">Header Section</a>
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
                            
                            <div class="text-muted pt-2 font-size-sm">Header Section</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form  method="POST" action="{{ url('admin/save-header') }}" enctype="multipart/form-data">
                                @csrf
                             
                            <input type="hidden" name="oldimage" value="{{$data->image}}">
                            <input type="hidden" name="section" value="{{$data->section}}">      
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Title</label>
                                     <input type="text" value="{{$data->title}}" name="title" class="form-control" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Subtitle</label>
                                     <input type="text"  name="sub_title" value="{{$data->sub_title}}" class="form-control" required>
                                </div>

                                <img src="{{asset('public/images/'.$data->image)}}" height="100" weight="100">

                                <div class="col-md-12">
                                    <label>Image</label>
                                     <input type="file" value="{{$data->image}}"  name="image" class="form-control" >
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

$(document).ready(function() {
        var maxField = 10;
        var addButton = $('.add_value');
        var wrapper = $('.field_wrapper_key');

        var x = 1;
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                var fieldHTML =
                '<div class="d-flex mb-3 mt-2 ml-3" style="width:150%"><br><br><input type="text" style="width:100%" class="form-control" name="features[]"  placeholder="Add Features" required><a href="javascript:void(0);"  class="remove_button btn btn-danger ml-3"><i class="fa fa-minus"></i></a></div>';

                $(wrapper).append(fieldHTML); //Add field html
            }else{
                
            }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); 
        x--;
    });
    });

</script>
@endsection