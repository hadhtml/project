@php
$var_objective = "Member";
@endphp
@extends('components.main-layout')
<title>All Users</title>
@section('content')
<!--begin::Card-->
<div class="card">
   <!--begin::Card header-->
   <div class="card-header border-0 pt-6">
      <!--begin::Card title-->
      <div class="card-title">
         <!--begin::Search-->
         <div class="d-flex align-items-center position-relative my-1">
            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search User" />
         </div>
         <!--end::Search-->
      </div>
      <!--begin::Card title-->
      <!--begin::Card toolbar-->
      <div class="card-toolbar">
         <!--begin::Toolbar-->
         <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
         <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
            <div class="fw-bold me-5">
            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
         </div>
      </div>
   </div>
   <!--end::Card header-->
   <!--begin::Card body-->
   
 
   <div class="card-body pt-0">
       
   @if (session('message'))
  <div class="row">
      <div class="col-md-12">
          <div class="alert alert-success mt-1" role="alert">
              {{ session('message') }}
          </div>
      </div>
  </div>
  @endif
      <!--begin::Table-->
      <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
         <thead>
            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
               <th class="w-10px pe-2">
                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                     <input class="form-check-input checkAll" type="checkbox"/>
                  </div>
               </th>
               <td class="min-w-125px text-center">Image</td>
               <td class="min-w-125px">Name</td>
               <td class="min-w-125px">Email</td>
               <td class="min-w-125px">Role</td>
               <td class="min-w-125px">Status</td>
               <td class="text-end min-w-70px">Action</td>
            </tr>
         </thead>
         <tbody class="fw-semibold text-gray-600">
            @foreach($Member as $member)
            @php
            $name = $member->name.' '.$member->LastName;
            @endphp
            <tr>
               <td>
                  <div class="form-check form-check-sm form-check-custom form-check-solid">
                     <input value="{{$member->id}}" class="form-check-input checkbox" type="checkbox"/>
                  </div>
               </td>
               <td class="text-gray-600 text-hover-primary mb-1 text-center">
                  @if($member->image != NULL)
                   <img style="width: 50px;" src="{{asset('public/assets/images/'.$member->image)}}" alt="lead">
                   @else
                   <img style="width: 50px;" src="{{ Avatar::create($member->name.' '.$member->LastName)->toBase64() }}" alt="lead">
                   @endif
               </td>
               <td class="text-gray-600 text-hover-primary mb-1">{{$member->name}} {{$member->LastName}}</td>
               <td class="text-gray-600 text-hover-primary mb-1">{{$member->email}}</td>
               <td class="text-gray-600 text-hover-primary mb-1">{{$member->u_role}}</td>
               <td>
                  @if($member->u_status == 1)
                  <span class="badge badge-pill badge-success">Active</span>
                  @else
                  <span class="badge badge-pill badge-danger">Blocked</span>
                  @endif
                  <!--<span class="badge badge-pill badge-warning">Pending Invite</span>-->
               </td>
               <td class="text-end">
                  <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                  <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                  <!--begin::Menu-->
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                     <!--begin::Menu item-->
                     <div class="menu-item px-3">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit-member{{$member->ID}}" class="menu-link px-3">View</a>
                     </div>
                     <!--end::Menu item-->
                     <!--begin::Menu item-->
                     <div class="menu-item px-3">
                        <a href="javascript:void(0)" data-toggle="modal" onclick="deletemember({{$member->ID}},'{{$member->u_id}}')" data-target="#delete-member" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                     </div>
                     <!--end::Menu item-->
                  </div>
                  <!--end::Menu-->
               </td>
            </tr>
            <div class="modal fade" id="edit-member{{$member->ID}}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
                <div class="modal-dialog mw-650px" role="document">
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                                <i class="ki-outline ki-cross fs-1"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <form class="needs-validation" action="{{url('edit-member')}}" method="POST" enctype="multipart/form-data">
                           @csrf    
                           <input type="hidden"  name="member_id" value="{{$member->ID}}">
                           <input type="hidden" id="member" name="user_id" value="{{$member->u_id}}">
                           <div class="text-center mb-13">
                              <h1 class="mb-3">Update User</h1>
                           </div>
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">First Name</span>
                              </label>
                              <input type="text" class="form-control form-control-solid" value="{{$member->Name}}" name="name" >
                           </div>
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">Last Name</span>
                              </label>
                              <input type="text" class="form-control form-control-solid" value="{{$member->LastName}}" id="member_name" name="last_member_name" required>
                           </div>
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">Email</span>
                              </label>
                              <input type="email" class="form-control form-control-solid" name="email" onfocusout="checkemailedit(this.value)" value="{{$member->email}}" id="email_edit">
                           </div>
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">Phone Number</span>
                              </label>
                              <input type="text" value="{{$member->phone}}" class="form-control form-control-solid" onkeypress="return onlyNumberKey(event)" name="phone" >
                           </div>
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">Role</span>
                              </label>
                              <input type="text" class="form-control form-control-solid" value="{{$member->u_role}}"  name="role" >
                           </div>
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">Status</span>
                              </label>
                              <select class="form-control form-control-solid"  name="status">
                                 <option @if($member->status == 1) selected @endif value="1">Active</option>
                                 <option @if($member->status == 0) selected @endif value="0">Blocked</option>
                              </select>
                           </div>
                           @if($member->image != NULL)
                           <div class="symbol symbol-80px symbol-lg-150px mb-4">
                              <img src="{{asset('public/assets/images/'.$member->image)}}" style="width:100px; height:100px; object-fit:cover" alt="Example Image">
                           </div>
                           
                           @endif
                           <div class="d-flex flex-column mb-7 fv-row">
                              <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                  <span class="required">Profile Picture</span>
                              </label>
                              <input type="file" class="form-control form-control-solid" id="add_image" name="image">
                           </div>
                           <div class="text-center pt-15">
                                 <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                     <span class="indicator-label">Submit</span>
                                     <span class="indicator-progress">Please wait... 
                                     <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                 </button>
                             </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </tbody>
      </table>
      <!--end::Table-->
   </div>
   <!--end::Card body-->
</div>
<!--end::Card-->
<div class="modal fade" id="create-member" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog mw-650px" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
            <form class="needs-validation" action="{{url('save-member')}}" autocomplete="off" enctype="multipart/form-data" method="POST">
               @csrf
               <div class="text-center mb-13">
                  <h1 class="mb-3">Add User</h1>
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">First Name</span>
                  </label>
                  <input autocomplete="off" type="text" class="form-control form-control-solid" id="member_name" name="member_name" required>
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Last Name</span>
                  </label>
                  <input autocomplete="off" type="text" class="form-control form-control-solid" id="member_name" name="last_member_name" required>
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Email</span>
                  </label>
                  <input autocomplete="off" type="email" class="form-control form-control-solid" autocomplete="" id="email" name="email" onfocusout="checkemail(this.value)" required>
                  <div id="email-error-member"></div>
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Phone Number</span>
                  </label>
                  <input autocomplete="off" type="text" class="form-control form-control-solid" name="phone" onkeypress="return onlyNumberKey(event)" id="phone_number" required>
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Role</span>
                  </label>
                  <input autocomplete="off" type="text" class="form-control form-control-solid" id="role" name="role" required>
               </div>
               <div class="d-flex flex-column mb-7 fv-row">
                  <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                      <span class="required">Profile Picture</span>
                  </label>
                  <input type="file" class="form-control form-control-solid" id="add_image" name="add_image">
               </div>
               <div class="text-center pt-15">
                     <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary button-error">
                         <span class="indicator-label">Submit</span>
                         <span class="indicator-progress">Please wait... 
                         <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                     </button>
                 </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="delete-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div id="success-member-delete"  role="alert"></div>
         <form method="POST" action="">
            @csrf   
            <input type="hidden" name="" id="member-id">
            <input type="hidden" name="" id="user-id">
            <div class="modal-body">
               Are you sure you want to delete this Member?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" onclick="DeleteMember();" class="btn btn-danger">Confirm</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   //   function SaveMember(){
   
   //     var file_data = $('#add_image').prop('files')[0];
   //     var form_data = new FormData();
   //     form_data.append('add_image', file_data);
   //     form_data.append('member_name', $('#member_name').val());
   //     form_data.append('phone', $('#phone_number').val());
   //     form_data.append('email', $('#email').val());
   //     form_data.append('role', $('#role').val());
   //     form_data.append('org_id', $('#org_id').val());
   //     form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));
    
       
   //     if (file_data) 
   //     {
   //     form_data.append('add_image',file_data);
   //     }else 
   //     {
   //     form_data.append('add_image', '');
   //     }
   
   
   //     if($('#member_name').val() =='' || $('#phone_number').val() == '' || $('#email').val() =='')
   //     {
              
   //       $('#email-error-member').html('Please fill out all required fields.');  
   //       return false;
   //     }else{
              
   //         $('#email-error-member').html('');
   
   //     }    
           
   //         $.ajax({
   //             type: "POST",
   //             url:"{{url('save-member')}}", 
   //             data: form_data,
   //             cache: false,
   //             contentType: false,
   //             processData: false,
   //             success: function(res) {
   //               if(res == 1)
   //               {
   
   //               $('#email-error-member').html('<strong class="text-danger">Email Already Taken</strong>');
   
                 
   //               }else
   //               {
   //               $('#email-error-member').html(''); 
   //               $('#member_name').val('');
   //               $('#email').val('');
   //               $('#role').val('');
   //               $('#phone_number').val('');
   //               $('#add_image').val('');
   //               $('#success-member').html('<div class="alert alert-success" role="alert">Member Created successfully</div>');
   //               setTimeout(function() { 
   //               $('#create-member').modal('hide');
   //               location.reload();
   
                  
   //             }, 1000);
   //               }
               
   //             }
   //         });
      
   // }
   
   
       
   
       $(document).ready(function() {
         var table = $('.exmaple').DataTable({
            'order':[],
            'columnDefs': [{
                "targets": [0,6],
                "orderable": false
            }]
         
      });

   
       
       });
       
      $(".checkAll").click(function () {
          $('input:checkbox').not(this).prop('checked', this.checked);
          var selectedOptions = [];
          $('input.checkbox:checked').each(function() {
              selectedOptions.push($(this).val());
          });
          if (selectedOptions.length > 0) {
              if (this.checked) {
                  $('#delete-button-user').show();  
              } else {
                  $('#delete-button-user').hide();  
              }
          }
      });



      // $(".checkAll").click(function () {
      //     var selectedOptions = $('input.checkbox:checked');
      //     if (selectedOptions.length > 0) {
      //         $('#delete-button-user').show();  
      //     } else {
      //         $('#delete-button-user').hide();  
      //     }
      // });

   
      function onlyNumberKey(evt) {
             
             var ASCIICode = (evt.which) ? evt.which : evt.keyCode
             if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                 return false;
             return true;
         }
         
          function checkemail(email)
           {
          
           $.ajax({
           type: "GET",
           url: "{{ url('check-email') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
           email:email,
      
   
           },
           success: function(res) {
            
           if(res == 1)
           {
           $('.button-error').attr('disabled',true); 
           $('#email-error-member').html('<strong class="text-danger">Email Already Taken</strong>');
           }
           if(res == 2)
           {
           $('.button-error').attr('disabled',false);
           $('#email-error-member').html('');
           }    
             
   
   
           }
       });
   
           }
           
           function deletemember(m_id,u_id)
           {
          
            $('#member-id').val(m_id);
            $('#user-id').val(u_id);
   
           }
           
           function DeleteMember()
           {
          
          var member_id = $('#member-id').val();
          var user_id =  $('#user-id').val();
            
           $.ajax({
           type: "POST",
           url: "{{ url('delete-member') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
           user_id:user_id,
           member_id:member_id
      
   
           },
           success: function(res) {
               
          
          $('#success-member-delete').html('<div class="alert alert-success" role="alert">Member Deleted successfully</div>');
           setTimeout(function() { 
           location.reload();
           
           }, 2000);
   
           }
       });
   
           }
           
   function delete_record_user()
    {
     
        var selectedOptions = [];
       $('.checkbox:checked').each(function() {
        selectedOptions.push($(this).val());
        
   });
   
     if(selectedOptions.length > 0){
     $.ajax({
               type: "POST",
               url:"{{url('delete-mutiple-user')}}", 
                data:{selectedOptions:selectedOptions,_token:'{{ csrf_token() }}'},
               success: function(res) {
                   
                location.reload();
               }
           });
     }
        
   }
   
        function checkemailedit(email)
       {
          
          var member = $('#member').val();
          
           $.ajax({
           type: "GET",
           url: "{{ url('check-email-edit') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
           email:email,
           member:member,
      
   
           },
           success: function(res) {
         
           if(res == 1)
           {
         
           $('#edit-memeber').attr('disabled',false);
           $('.email-error-member').html('');
           }else if(res == 2)
           {
         
            $('#edit-memeber').attr('disabled',false); 
         //   $('.email-error-member').html('<strong class="text-danger">Email Already Taken</strong>');
           }else
           {
           $('#edit-memeber').attr('disabled',true); 
           $('.email-error-member').html('<strong class="text-danger">Email Already Taken</strong>');
           }
             
             
   
   
           }
       });
   
           }
           
            $(document).ready(function() {
             setTimeout(function(){$('.alert-success').slideUp();},3000); 
           });
   
     
</script>
@endsection