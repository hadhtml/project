@php
$var_objective = "Org-Contact";
@endphp
@extends('components.main-layout')
<title>Contacts</title>
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-6">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <td>
                                <label class="form-checkbox">
                                    <input type="checkbox" id="checkAll">
                                    <span class="checkbox-label"></span>
                                </label>
                            </td>
                            <td>Member</td>
                            <td>Email address</td>
                            <td>Phone Number</td>
                            <td>Position</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                          @if (session('message'))
                          <div class="alert alert-success mt-1" role="alert">
                              {{ session('message') }}
                          </div>
                           @endif
                           
                           @foreach($OrgContact as $member)
                        <tr>
                            <td>
                                <label class="form-checkbox">
                                    <input type="checkbox" class="checkbox "  value="{{$member->id}}">
                                    <span class="checkbox-label"></span>
                                </label>
                            </td>
                            <td class="image-cell">
                                @if($member->image != NULL)
                                <img src="{{asset('public/assets/images/'.$member->image)}}" alt="Example Image">
                                @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
                                @endif
                                <div>
                                    <div class="title">{{$member->name}} {{$member->last_name}}</div>
                                </div>
                            </td>
                            <td><a href="mailto:{{$member->email}}" class="nav-link">{{$member->email}}</a></td>
                            <td><a href="tel:+{{$member->phone}}" class="nav-link">{{$member->phone}}</a></td>
                            <td>{{$member->role}}</td>
                         
                            
                            <td>
                                <button class="btn-circle btn-tolbar" data-toggle="modal" data-target="#edit-contact{{$member->id}}">
                                    <img src="{{asset('public/assets/images/icons/edit.svg')}}" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                </button>
                                <button class="btn-circle btn-tolbar" data-toggle="modal" onclick="deletecontact({{$member->id}})" data-target="#delete-contact">
                                    <img src="{{asset('public/assets/images/icons/delete.svg')}}" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                </button>
                            </td>
                        </tr>
                <div class="modal fade" id="edit-contact{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-member" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 526px !important;">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="modal-title" id="create-epic">Edit Organization Contact</h5>
                            </div>
                            <div class="col-md-12">
                                <p>Fill out the form & we'll send them an invite</p>
                            </div>
                  
                            
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="{{url('update-org-contact')}}" method="POST" enctype="multipart/form-data">
                         @csrf    
                            <input type="hidden" name="id" value="{{$member->id}}">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" value="{{$member->name}}" name="name" required>
                                        <label for="objective-name">First Name</label>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" id="objective-name"  value="{{$member->last_name}}" name="last_name" required>
                                        <label for="objective-name">Last Name</label>
                                    </div>
                                </div>
                                                                    <!--<div class="col-md-12 col-lg-12 col-xl-12">-->
                                <!--    <div class="form-group mb-0">-->
                                <!--        <input type="email" class="form-control" value="{{$member->email}}" id="email_edit" readonly>-->
                                <!--        <label for="email">Email</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="text" value="{{$member->phone}}" class="form-control" onkeypress="return onlyNumberKey(event)" name="phone" required>
                                        <label for="phone-number">Phone number</label>
                                    </div>
                                </div>
                                
                          
                                
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" value="{{$member->role}}"  name="role" required>
                                        <label for="role">Role</label>
                                    </div>
                                </div>
                                
                                
                                <input type="hidden" id="old_image" name="old_image" value="{{ $member->image }}">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    @if($member->image != NULL)
                                    <img src="{{asset('public/assets/images/'.$member->image)}}" style="width:100px; height:100px; object-fit:cover" alt="Example Image">
                                    @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" style="width:100px; height:100px; object-fit:cover" alt="Example Image">
                                    @endif    
                                    <div class="form-group mb-0">
                                        <input type="file" class="form-control" name="image" >
                                        <label for="profile">Profile Picture</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                        @endforeach

                     
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Epic -->
<div class="modal fade" id="create-org-contact" tabindex="-1" role="dialog" aria-labelledby="create-org-contact" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Add Organization Contact</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill out the form & we'll send them an invite</p>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="{{url('save-org-contact')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="org_id" value="">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="objective-name" name="name" required>
                                <label for="objective-name">First Name</label>
                            </div>
                        </div>
                        
                         <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="objective-name" name="last_name" required>
                                <label for="objective-name">Last Name</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" id="email" name="email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="phone-number" onkeypress="return onlyNumberKey(event)" name="phone" required>
                                <label for="phone-number">Phone number</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" id="role" name="role" required>
                                <label for="role">Role</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="file" class="form-control" id="profile" name="image">
                                <label for="profile">Profile Picture</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-theme ripple" type="submit">Save Contact</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Organization Contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="success-contact-delete"  role="alert"></div>

        <form method="POST" action="">
         @csrf   
         <input type="hidden" name="" id="contact-id">
       

        <div class="modal-body">
          
        Are you sure you want to delete this Organization Contact?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="DeleteOrgMember();" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>



    // $(document).ready(function() {
    //   // DataTables initialization
    //   var table = $('#example').DataTable({
    //     "pagingType": "full_numbers",
    //     "language": {
    //       "paginate": {
    //         "previous": "&lsaquo;", // Custom previous arrow
    //         "next": "&rsaquo;" // Custom next arrow
    //       }
    //     }
    //   });

    //   // Check All checkbox functionality
 
			
    // });
    
$("#checkAll").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
if(this.checked)
{
 $('#delete-button').show();
   
}else
{
$('#delete-button').hide();
    
}
});

   function onlyNumberKey(evt) {
          
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
      
      
     
        function deletecontact(m_id)
        {
       
         $('#contact-id').val(m_id);
       

        }
        
        function DeleteOrgMember()
        {
       
       var contact = $('#contact-id').val();

         
        $.ajax({
        type: "POST",
        url: "{{ url('delete-org-contact') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        contact:contact,
   

        },
        success: function(res) {
            
       
       $('#success-contact-delete').html('<div class="alert alert-success" role="alert">Organization Contact Deleted successfully</div>');
        setTimeout(function() { 
        location.reload();
        
        }, 2000);
        }
    });

        }
        
        function delete_record()
       {
  
     var selectedOptions = [];
    $('.checkbox:checked').each(function() {
     selectedOptions.push($(this).val());
     
    });

  $.ajax({
            type: "POST",
            url:"{{url('delete-mutiple-organization-contact')}}", 
             data:{selectedOptions:selectedOptions,_token:'{{ csrf_token() }}'},
            success: function(res) {
                
             location.reload();
             
             
            }
        });
     }
                    $(document).ready(function() {
                   setTimeout(function(){$('.alert-success').slideUp();},3000); 
                    });


  </script>
@endsection