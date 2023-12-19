@php
$var_objective = 'Org';
@endphp
@extends('components.main-layout')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            background: none;
            color: #333;
            border: none;
            font-size: 18px;
            padding: 0;
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.previous span,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next span {
            display: inline-block;
            width: 16px;
            height: 16px;
            background: url('custom-arrow.png') no-repeat center center;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.previous span {
            transform: rotate(180deg);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            pointer-events: none;
        }

        .dataTables_wrapper .dataTables_filter input {
            height: 40px;

        }

        .dataTables_wrapper .dataTables_length select {
            height: 30px;

        }

        .table {
            border: none;

        }

        .table tbody tr {
            border-bottom: 1px solid #EFEFEF;

        }

        .table thead td {
            border-bottom: none;
            color: var(--black, #000);
            font-size: 13px !important;
            font-style: normal;
            font-weight: 400;
            border-top: 0px;
            text-transform: uppercase;
            border-bottom: 1px solid #EFEFEF;
            padding-top: 20px !important;
            ;
        }

        .table tbody td {
            color: #717171;
            / Small / font-size: 13px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            vertical-align: middle;
            border-top: 0px;
            border-bottom: 1px solid #EFEFEF;
        }

        .table .form-check {
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px !important;

            height: 25px !important;

            background-color: #F3F3F3;

        }

        .table .form-check input[type="checkbox"] {
            width: 25px;

            height: 25px;

        }

        .table td.image-cell {
            display: flex;
            align-items: center;

        }

        .table td.image-cell img {
            width: 40px;

            height: 40px;

            margin-right: 10px;

            background-size: cover;
        }

        .table td.image-cell .title {
            color: var(--black-color, #000);
            font-size: 15px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-bottom: 2px;
        }

        .table td.image-cell .small-tag {
            color: #717171;

            / X - Small / font-family: BR Candor;
            font-size: 12px;
            font-style: normal;
            font-weight: 300;
            line-height: normal;
        }


        .form-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .form-checkbox .checkbox-label {
            position: relative;
            display: inline-block;
            width: 20px;

            height: 20px;

            border: 1px solid #999;

            margin-bottom: 0px;
        }

        .form-checkbox .checkbox-label::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            border-radius: 2px;
            transition: background-color 0.3s ease;
        }

        .form-checkbox input[type="checkbox"]:checked+.checkbox-label::before {
            background-color: #555;

        }

        .btn-circle.btn-small {
            width: 32px;
            height: 32px;
            padding: 4px 6px;
            border-radius: 35px;
            font-size: 15px;
            line-height: 1.33;
        }

        .text-decoration-none {
            text-decoration: none;
            color: black;
        }

        .dataTables_wrapper .pagination .page-item .page-link {
            width: 38px;
            height: 38px;
            padding: 10px 6px;
            border-radius: 315px;
            font-size: 15px;
            margin-right: 7px;
            text-align: center;
        }

        .dataTables_wrapper .pagination .page-item:first-child .page-link {
            width: 80px;
            height: 38px;
            text-align: center;
            padding: 9px;
        }

        .dataTables_wrapper .pagination .page-item:last-child .page-link {
            width: 80px;
            height: 38px;
            text-align: center;
            padding: 9px;
        }

        .dataTables_info {
            color: #717171;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .table thead .sorting::before,
        .table thead .sorting_desc::before,
        .table thead .sorting_asc::before {

            top: 20px;

        }

        .table thead .sorting::after,
        .table thead .sorting_desc::after,
        .table thead .sorting_asc::after {

            top: 20px;

        }

        .dataTables_wrapper .dataTables_filter label {
            font-size: 14px;

        }

        .dataTables_wrapper .dataTables_length label {
            font-size: 14px;

        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 30px;

        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-10">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <button class="btn btn-dark" onclick="delete_record();" type="button">Delete All</button>

                                <td>

                                    <label class="form-checkbox">
                                        <input type="checkbox" id="checkAll">
                                        <span class="checkbox-label"></span>
                                    </label>
                                </td>
                                <td>Organization</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @if (session('message'))
                                <div class="alert alert-success mt-1" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @if (count($organization) > 0)
                                @foreach ($organization as $org)
                                    @php
                                        $objectivecount = DB::table('objectives')
                                            ->where('org_id', $org->id)
                                            ->where('trash', null)
                                            ->count();
                                    @endphp
                                    <tr>
                                        <td>
                                            <label class="form-checkbox">
                                                <input type="checkbox" class="checkbox" value="{{ $org->id }}">
                                                <span class="checkbox-label"></span>
                                            </label>
                                        </td>
                                        <td class="image-cell">
                                            @if ($org->logo)
                                                <img src="{{ asset('public/assets/images/' . $org->logo) }}" alt="Example Image">
                                            @else
                                                <img src="{{ asset('public/assets/images/icons/logo.svg') }}" alt="Example Image">
                                            @endif
                                            <div>
                                                <a href="{{ url('dashboard/organization/' . $org->slug) }}" style="text-decoration: none;">
                                                    <div class="title">{{ $org->organization_name }}</div>
                                                </a>
                                                <div class="small-tag">#OR1234</div>
                                            </div>
                                        </td>
                                        <td>{{ $org->email }}</td>
                                        <td>{{ $org->phone_no }}</td>

                                        <td>
                                            <button class="btn-circle btn-tolbar" data-toggle="modal"
                                                data-target="#edit-org{{ $org->id }}">
                                                <img src="{{ asset('public/assets/images/icons/edit.svg') }}">
                                            </button>
                                            <button class="btn-circle btn-tolbar org-delete" data-id="{{ $org->id }}"
                                                data-toggle="modal" data-target="#delete-org">
                                                <img src="{{ asset('public/assets/images/icons/delete.svg') }}">
                                            </button>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="edit-org{{ $org->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="edit-org" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="width: 526px !important;">
                                                <div class="modal-header">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5 class="modal-title" id="create-epic">Update Organization
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p>Fill out the form, submit and hit the save button.</p>
                                                        </div>
                                                        <div id="edit_message"></div>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <img src="{{ asset('assets/images/icons/minus.svg') }}">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" enctype="multipart/form-data"
                                                        method="POST" action="{{ url('update-organization') }}"
                                                        id="">
                                                        @csrf
                                                        <input type="hidden" value="{{ $org->id }}" id="org_edit_id"
                                                            name="org_edit_id">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $org->organization_name }}"
                                                                        name="organization_name" required
                                                                        id="objective_name" required>
                                                                    <label for="objective-name">organization Name</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $org->email }}" required name="email"
                                                                        id="" required>
                                                                    <label for="start-date">Email</label>
                                                                </div>
                                                            </div>

                                                            <small id="" class="mb-2 ml-5"></small>


                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="number" class="form-control"
                                                                        value="{{ $org->phone_no }}" required
                                                                        name="phone_no" id="" required>
                                                                    <label for="end-date">Phone number</label>
                                                                </div>
                                                            </div>
                                                            <small id="" class="mb-2 ml-5"></small>
                                                            <input type="hidden" id="old_image" name="old_image"
                                                                value="{{ $org->logo }}">
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <img src="{{ asset('public/assets/images/' . $org->logo) }}"
                                                                    style="width:200px; height:130px; object-fit:cover"
                                                                    alt="Example Image">
                                                                <div class="form-group mb-0">
                                                                    <input type="file" class="form-control"
                                                                        value="" name="logo" id="">
                                                                    <label for="logo">Logo
                                                                    </label>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $org->detail }}" name="detail"
                                                                        id="small_description" required>
                                                                    <label for="small-description">Small
                                                                        Description</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-lg btn-theme btn-block ripple">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <!-- Add more rows as needed -->
                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing
                                {{ $organization->count() }} to {{ $organization->total() }} of
                                {{ $organization->total() }} entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_full_numbers" id="example_paginate">
                                <ul class="pagination">
                                    {{-- <li class="paginate_button page-item first disabled" id="example_first"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">First</a></li>
                                <li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">‹</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item next disabled" id="example_next"><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">›</a></li>
                                <li class="paginate_button page-item last disabled" id="example_last"><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">Last</a></li> --}}
                                    {{ $organization->links('pagination::bootstrap-4') }}

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Organization --}}


  <!-- Create Epic -->
  <div class="modal fade" id="create-org" tabindex="-1" role="dialog" aria-labelledby="create-org" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="">Create new Organization</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                    <div id="success"  role="alert"></div>
                    <span id="org-feild-error" class="ml-3 text-danger"></span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="#"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="organization_name" required id="organization_name">
                                <label for="objective-name">organization Name</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" required name="email" id="email" required>
                                <label for="start-date">Email</label>
                            </div>
                        </div>

                        <small id="email-error" class="mb-2 ml-5"></small>

                          
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="number" class="form-control" required name="phone_no" id="phone">
                                <label for="end-date">Phone number</label>
                            </div>
                        </div>
                        <small id="phone-error" class="mb-2 ml-5"></small>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                             <div class="form-group mb-0">
                                <input type="file" class="form-control" required name="logo"  id="add_logo" >
                                <label for="logo">Logo</label>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="detail" id="small_description" required>
                                <label for="small-description">Small Description</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button  type="button" onclick="saveOrganization();" class="btn btn-primary btn-lg btn-theme btn-block ripple">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-org" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Organization</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('delete-org')}}">
         @csrf   
         <input type="hidden" name="org_id" id="org-id">
        <div class="modal-body">
          
        Are you sure you want to delete this Organization?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="create-epic" tabindex="-1" role="dialog" aria-labelledby="create-epic" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create Epic</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form, submit and hit the save button.</p>
                    </div>
                      <div id="success-epic"  role="alert"></div>
                    <span id="epic-feild-error" class="ml-3 text-danger"></span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="#" method="POST" novalidate>
                @csrf
                <input type="hidden" id="ini_epic_id">
                <input type="hidden" id="epic_obj">
                <input type="hidden" id="epic_key">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="epic_name" required>
                                <label for="objective-name">Epic Title</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" id="epic_start_date"  required>
                                <label for="start-date">Start Date</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <input type="date" class="form-control" min="{{ date('Y-m-d') }}" id="epic_end_date" required>
                                <label for="end-date">End Date</label>
                            </div>
                        </div>
                          <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                               <select class="form-control" id="epic_status">
                                    <option value="To Do">To Do</option>
                                  <option value="In progress">In Progress</option>
                                   <option value="Done">Done</option>

                               </select>
                                <label for="small-description">Status</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="story[]" id="epic_description" required>
                                <label for="small-description">Small Description</label>
                            </div>
                        </div>
                        
                        <!--<h5 class="ml-3">Stories</h5>-->
                        
                        <!--  <div class="col-md-12 col-lg-12 col-xl-12">-->
                        <!--    <div class="form-group mb-0">-->
                        <!--        <input type="text" class="form-control epic-input" id="epic_story" required>-->
                        <!--        <label for="small-description">Add Story</label>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <div class="col-md-12 field_wrapper w-100"></div>
                        
                        
                        <!-- <div class="col-md-12">-->
                        <!--    <button class="btn btn-primary  w-50 mt-2 add_button" type="button">Add on item</button>-->
                        <!--</div>-->
                        
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3" onclick="saveEpic();"  type="button">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // Select the form element

        function saveOrganization() {

            var file_data = $('#add_logo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('add_logo', file_data);
            form_data.append('organization_name', $('#organization_name').val());
            form_data.append('phone', $('#phone').val());
            form_data.append('email', $('#email').val());
            form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));
            form_data.append('small_description', $('#small_description').val());

            if (file_data) {
                form_data.append('add_logo', file_data);
            } else {
                form_data.append('add_logo', '');
            }


            if ($('#organization_name').val() != '' || $('#phone').val() != '' || $('#email').val() != '') {
                $.ajax({
                    type: "POST",
                    url: "{{ url('save-organization') }}",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res == 1) {

                            $('#email-error').html('<strong class="text-danger">Email Already Taken</strong>');

                        } else if (res == 2) {
                            $('#phone-error').html(
                                '<strong class="text-danger">Phone Number Already Taken</strong>');
                            $('#email-error').html('');
                        } else {
                            $('#email-error').html('');
                            $('#phone-error').html('');
                            $('#objective_name').val('');
                            $('#email').val('');
                            $('#phone').val('');
                            $('#small_description').val('');
                            $('#success').html(
                                '<div class="alert alert-success" role="alert"> Organization Created successfully</div>'
                                );
                            $('#org-feild-error').html('');
                            setTimeout(function() {
                                $('#create-org').modal('hide');

                                location.reload();
                            }, 3000);
                        }

                    }
                });
            } else {

                $('#org-feild-error').html('Please fill out all required fields.');

            }
        }

        $('.org-delete').click(function() {

            var org_id = $(this).attr('data-id');

            $('#org-id').val(org_id);

        });

        // function UpdateOrganization(){
        //     var file_data = $('#logo').prop('files')[0];
        //     var form_data = new FormData();
        //     if (file_data) {
        //         form_data.append('logo', file_data);
        //         } else {
        //     var oldImageFilePath = $('#old_image').val();
        //     form_data.append('old_image', oldImageFilePath);
        //         }

        //     form_data.append('objective_name', $('#objective_name').val());
        //     form_data.append('phone', $('#phone').val());
        //     form_data.append('email', $('#email').val());
        //     form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        //     form_data.append('small_description',$('#small_description').val());
        //     form_data.append('org_edit_id', $('#org_edit_id').val());



        //     if($('#objective_name').val()!='' || file_data!=undefined || $('#phone').val()!='' || $('#email').val()!=''){
        //         $.ajax({
        //             type: "POST",
        //             url:"{{ url('update-organization') }}", 
        //             data: form_data,
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             success: function(res) {

        //               $('#edit_message').html('<div class="alert alert-success" role="alert"> Organization Updated successfully</div>');


        //               setTimeout(function() { 
        //                 $('#edit-org').modal('hide');
        //                 location.reload();
        //             }, 2000);


        //             }
        //         });
        //     }
        // }

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        function delete_record() {

            var selectedOptions = [];
            $('.checkbox:checked').each(function() {
                selectedOptions.push($(this).val());

            });

            $.ajax({
                type: "POST",
                url: "{{ url('delete-mutiple-organization') }}",
                data: {
                    selectedOptions: selectedOptions,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {

                    location.reload();
                }
            });

        }
    </script>


@endsection
