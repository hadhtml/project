@php
$var_objective = "Org-Unit";
@endphp
@extends('components.main-layout')
<title>Business Units</title>
@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h3>
                            Retail Customers in Asia to protect the sales
                        </h3>
                    </div>
                    <div>
                        <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                20
                            </div>
                            <div>
                                Objectives
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <td>Business Unit</td>
                            <td>Lead</td>
                            <td>Value Streams</td>
                            <td>Teams</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                  @if (session('message'))
                  <div class="alert alert-success mt-1" role="alert">
                      {{ session('message') }}
                  </div>
                   @endif
                   
                       @if(count($Unit) > 0)
                       @foreach($Unit as $unit)
                       @php
                       $ValueCount = DB::table('value_stream')->where('unit_id',$unit->id)->count();
                       $TeamCount = DB::table('unit_team')->where('org_id',$unit->id)->count();
                       $member = DB::table('members')->where('org_user',Auth::id())->count();
                       @endphp
                        <tr>
                            <td>
                                <label class="form-checkbox">
                                    <input type="checkbox">
                                    <span class="checkbox-label"></span>
                                </label>
                            </td>
                            <td><a class="nav-link" href="{{url('dashboard/organization/'.$unit->slug.'/portfolio/'.$unit->type)}}">{{$unit->business_name}}</a></td>
                            @if($member > 0)
                            @if($unit->lead_id)
                            @foreach(DB::table('members')->get() as $r)
                            @if($r->id == $unit->lead_id)
                            <td class="image-cell">
                                @if($r->image != NULL)
                                <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
                                @endif
                                <div>
                                    <div class="title">{{$r->name}} {{ $r->last_name }}</div>
                                </div>
                            </td>

                            @endif
                            @endforeach
                            @else
                            <td>N/A</td>
                            @endif
                            @else
                              <td class="image-cell">
                                    
                                <a class="nav-link" href="{{url('dashboard/organization/users')}}"><button class="btn btn-primary">Assign</button></a>
                            </td>
                            @endif
                            <td>{{$ValueCount}}</td>
                            <td>{{$TeamCount}}</td>
                         
                            <td>
                                <button class="btn-circle btn-tolbar" data-toggle="modal" data-target="#edit{{$unit->id}}">
                                    <img src="{{asset('public/assets/images/icons/edit.svg')}}" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                </button>
                                <button class="btn-circle btn-tolbar" data-toggle="modal" data-target="#delete{{$unit->id}}">
                                    <img src="{{asset('public/assets/images/icons/delete.svg')}}" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                </button>
                            </td>
                        </tr>
                        
                        
                      <div class="modal fade" id="delete{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Business Units</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            
                            <div id="show-error"></div>
                    
                            <form method="POST" method="POST" action="{{url('delete-business-unit')}}">
                             @csrf   
                             <input type="hidden" name="delete_id" id="delete_id" value="{{$unit->id}}">
                           
                    
                            <div class="modal-body">
                              
                            Are you sure you want to delete this Business Units?
                            <input type="text" name="val"  id="noPasteField" class="form-control" placeholder="Write business unit name and hit confirm" required>
                    
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit"  onclick="DeleteUnit();" class="btn btn-danger">Confirm</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                                    
                        
                        
                <div class="modal fade" id="edit{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="add-business-unit" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 526px !important;">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="modal-title" id="create-epic">Update Business Unit</h5>
                                </div>
                                <div class="col-md-12">
                                    <p>Lorem ipsum dummy text for printing</p>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" action="{{url('update-business-unit')}}" method="POST">
                                @csrf
                                <input type="hidden" name="unit_id" value="{{$unit->id}}">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" name="unit_name" value="{{$unit->business_name}}" required>
                                            <label for="Business Unit">Business Unit</label>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <select class="form-control" name="lead_manager">
                                                <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                                  <option @if($r->id == $unit->lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                                <?php }  ?>
                                            </select>
                                            <label for="lead-manager">Lead</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <input type="text"  class="form-control" value="{{$unit->detail}}" name="detail">
                                            <label for="small-description">Description</label>
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
          @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Business Unit -->
<div class="modal fade" id="add-business-unit" tabindex="-1" role="dialog" aria-labelledby="add-business-unit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create Business Unit</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Lorem ipsum dummy text for printing</p>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="{{url('add-business-unit')}}"  method="POST">
                    @csrf
                    <input type="hidden" name="org_unit_id" value="">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="unit_name" id="Business Unit" required>
                                <label for="Business Unit">Business Unit</label>
                            </div>
                        </div>
                        @php
                        $memberCount = DB::table('members')->where('org_user',Auth::id())->count();
                        @endphp
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" name="lead_manager" required>
                                    <option value="NULL">Select Lead </option>
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                      <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    <?php }  ?>
                                </select>
                                <label for="lead-manager">Lead</label>
                            </div>
                        </div>
                        @if($memberCount == 0)
                        <div class="alert alert-danger mt-1 ml-3" role="alert">
                        Add users before assigning <a href="{{url('dashboard/organization/users')}}" class="alert-link">Click here</a>.
                        </div>
                        @endif
                        <div class="col-md-12 col-lg-12 col-xl-12 mb-5">
                            <div class="form-group mb-0">
                                <small>Short Description</small>
                                <textarea rows="3" class="form-control mt-2" name="unit_detail"></textarea>
                            </div>
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Submit</button>
                </div>
            </div>
                </form>
        </div>
    </div>
</div>
<!-- Create Business Unit -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script>
     $(document).ready(function() {
    setTimeout(function(){$('.alert-success').slideUp();},3000); 
    });
    
    document.getElementById("noPasteField").addEventListener("paste", function (e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData("text/plain");
});

        function DeleteUnit()
        {
 
         var delete_id = $('#delete_id').val();
    
        if($('#PasteField').val() == '')
        {
          $('#show-error').html('<div class="alert alert-danger" role="alert"> Please Enter  Business Units Name</div>');    
            return  false;
        }
        $.ajax({
        type: "POST",
        url: "{{ url('delete-business-unit') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        delete_id:delete_id,
        val:val
        },
        success: function(res) {
          
         if(res == 1)
         {
         $('#show-error').html('<div class="alert alert-danger" role="alert"> Please Enter Correct Business Units Name</div>');    
             
         }else
         {
         $('#show-error').html('<div class="alert alert-success" role="alert"> Business Units Deleted Successfully</div>');
         location.reload();
         } 


        }
        });

        }


</script>  
@endsection
