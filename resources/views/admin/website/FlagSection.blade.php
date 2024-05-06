@extends('admin.layouts.main-layout')
@section('title', 'Section')
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
                    <div
                        class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div class="d-flex align-items-center flex-wrap mr-1">
                            <div class="d-flex align-items-baseline flex-wrap mr-5">

                                <ul
                                    class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}" class="text-muted">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="javascript::void(0)" class="text-muted">Manage Section</a>
                                    </li>
                                    <li class="breadcrumb-item ml-40">
                                        <a href="javascript::void(0)" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Add Section
                                        </a>
                                    </li>
                                     <li class="breadcrumb-item ml-40">
                                        <a href="javascript::void(0)" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalNew">
                                            Add Section Header
                                        </a>
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
                                Section
                                <div class="text-muted pt-2 font-size-sm">Manage Section</div>
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-custom table-checkable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data) > 0)
                                @foreach ($data as $r)
                                    <tr>
                                        <td>{{ $r->title }}</td>
                                       
                                        <td>
                                            <a href="javascript::void(0)" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $r->id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Are You Sure You want to Delete This')" href="{{ url('admin/delete-section/' . $r->id) }}" class="btn"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal{{$r->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Faqs</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="{{ url('admin/update-section') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$r->id}}">
                                                        <input type="hidden" name="oldimage" value="{{$r->image}}">

                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label>Title</label>
                                                                <input type="text" value="{{$r->title}}" name="title" class="form-control" required>
                                                            </div>
                                
                                                             @php
                                                             
                                                             $decodedArray = DB::table('header_section')->where('section',$r->id)->get();
                                                            
                                                             @endphp
                                                             
                                                            <div class="col-md-12">
                                                                <label>Feature</label>
                                                            @if(count($decodedArray) > 0)    
                                                             @foreach ($decodedArray as $item)
                                                                <input type="hidden" name="update_features_id[]" value="{{$item->id}}">
                                                                <input type="text" value="{{$item->feature_highlight}}" name="update_features[]" class="form-control" required>
                                                             @endforeach
                                                             @endif
                                                               
                                                            </div>
                                                            
                                                               <div class="col-md-12 mt-2">
                                                                <button class="btn btn-info add_value_edit" type="button">Add Feature</button>
                                                                </div>
                                                                
                                                                <div class="field_wrapper_key_edit"></div>
                                
                                                           
                                
                                                            <div class="col-md-12">
                                                                <img src="{{asset('public/images/'.$r->image)}}" height="30" class="mt-1 mb-1" weight="30">
                                                                <label>Image</label>
                                                                <input type="file" value="{{$r->image}}" name="image" class="form-control">
                                                            </div>

                                                        </div>




                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!-- The Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Highlights</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ url('admin/save-section') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            
                            
                            <div class="col-md-12 mt-2">
                            <button class="btn btn-info add_value" type="button">Add Feature</button>
                            </div>
                            
                            <div class="field_wrapper_key"></div>

                         

                            <div class="col-md-12">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>

                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    @php
    $content = DB::table('header_section')->where('section','highlight-header')->first();
    @endphp
    
        <div class="modal fade" id="exampleModalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Highlights Section Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ url('admin/save-highlights-section-header') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                               
                            <input type="hidden" name="section" @if($content) value="{{$content->section}}" @endif >   

                            <div class="col-md-12">
                                <label>Description </label>
                                <textarea  col="3" name="sub_title_header" class="form-control" required>@if($content) {{$content->sub_title}} @endif</textarea>
                            </div>

                       

                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>

 
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
    
    
     
$(document).ready(function() {
        var maxField = 10;
        var addButton = $('.add_value_edit');
        var wrapper = $('.field_wrapper_key_edit');

        var x = 1;
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                var fieldHTML =
                '<div class="d-flex mb-3 mt-2 ml-3" style="width:150%"><br><br><input type="text" style="width:100%" class="form-control" name="updatefeatures[]"  placeholder="Add Features" required><a href="javascript:void(0);"  class="remove_button btn btn-danger ml-3"><i class="fa fa-minus"></i></a></div>';

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
