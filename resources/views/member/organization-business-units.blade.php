@php
$var_objective = "Org-Unit";
@endphp
@extends('components.main-layout')
<title>Org-Business Units</title>
@section('content')

@if (session('message'))
  <div class="row">
      <div class="col-md-12">
          <div class="alert alert-success mt-1" role="alert">
              {{ session('message') }}
          </div>
      </div>
  </div>
@endif
@if(count($Unit) > 0)
<div class="row">

   
       @foreach($Unit as $unit)
       @php
       $ValueCount = DB::table('value_stream')->where('unit_id',$unit->id)->count();
       $TeamCount = DB::table('unit_team')->where('org_id',$unit->id)->count();
       $member = DB::table('members')->where('org_user',Auth::id())->count();
       @endphp

        <div class="col-md-3">
            <div class="card business-card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h3>
                                <a class="d-flex" href="{{url('dashboard/organization/'.$unit->slug.'/dashboard/'.$unit->type)}}"><span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span> <span>{{ \Illuminate\Support\Str::limit($unit->business_name,25, $end='...') }}</span></a>
                            </h3>
                        </div>
                        <div>
                            <div class="dropdown d-flex">
                                <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"  data-toggle="modal" data-target="#edit{{$unit->id}}">Edit</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete{{$unit->id}}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-section">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="mr-1">
                                        <ion-icon style="font-size: 18px;" name="layers-outline"></ion-icon>
                                    </div>
                                    <a href="{{ url('dashboard/organization') }}/{{ $unit->slug }}/Value-Streams">
                                        <small>Value Streams ({{$ValueCount}})</small>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="mr-1">
                                        <ion-icon style="font-size: 18px;" name="people-outline"></ion-icon>
                                    </div>
                                    <a href="{{ url('dashboard/organization') }}/{{ $unit->slug }}/BU-TEAMS">
                                        <small>Teams ({{$TeamCount}})</small>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <!-- <div>
                            <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </small>
                        </div> -->

                        <div class="d-flex flex-row align-items-center leader-section">

                            @if($member > 0)
                            @if($unit->lead_id)
                            @foreach(DB::table('members')->get() as $r)
                            @if($r->id == $unit->lead_id)

                            <div class="mr-2">
                                @if($r->image != NULL)
                                <img src="{{asset('public/assets/images/'.$r->image)}}" alt="lead">
                                @else
                                <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="lead">
                                @endif
                            </div>

                            <div class="d-flex flex-column">
                                <div>
                                    <span class="text-primary">Lead</span>
                                </div>
                                <div>
                                    <span>{{$r->name}} {{ $r->last_name }}</span>
                                </div>
                            </div>

                            @endif
                            @endforeach
                            @else
                            <!-- <td>N/A</td> -->
                            @endif
                            @else
                              <div>
                                    
                                <a class="nav-link" href="{{url('dashboard/organization/users')}}"><button class="btn btn-primary">Assign</button></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Models -->

       


        <div class="modal fade" id="delete{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding: 6px !important;">
                <div class="modal-header">
                    <div class="d-flex flex-column">
                        <div>
                            <h5 class="modal-title mb-0" id="exampleModalLabel">Delete Business Unit</h5>
                        </div>
                        <div>
                            <small>Are you sure you want to delete this Business Unit?</small>
                        </div>
                    </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                  </button>
                </div>
                

                <form method="POST">
                 @csrf   
                 <input type="hidden" name="delete_id" id="delete_id" value="{{$unit->id}}">
               
                 <div id="show-error"></div>
                <div class="modal-body">
                  
                
                <input type="text" name="bu_name"  id="bu_name{{$unit->id}}" class="form-control" placeholder="Write business unit name and hit confirm" required>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button"  onclick="DeleteUnit({{$unit->id}});" class="btn btn-danger">Confirm</button>
                </div>
                </form>
              </div>
            </div>
          </div>


  <div class="modal fade" id="edit{{$unit->id}}" tabindex="-1" role="dialog" aria-labelledby="add-business-unit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 526px !important; padding: 6px !important;">
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
   
</div>

@else
<div style="position:absolute;right:27%;top:40%;" class="text-center">
<img src="{{asset('public/business-unit.svg')}}"  width="120" height="120">
<div><h6 class="text-center">No Records Found</h6></div>
<div><p class="text-center">You may create a business unit by clicking the button below.</p></div>
<button class="btn btn-primary btn-lg btn-theme btn-block ripple ml-32" style="width:40%" type="button" data-toggle="modal" data-target="#add-business-unit">
    Add Business Unit
</button>
</div>
@endif


<!-- Create Business Unit -->
<div class="modal fade" id="add-business-unit" tabindex="-1" role="dialog" aria-labelledby="add-business-unit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important; padding: 6px !important;">
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

        function DeleteUnit(delete_id)
        {
 
        //  var delete_id = $('#delete_id').val();
         var val = $('#bu_name'+delete_id).val();

      
        if(val == '')
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
