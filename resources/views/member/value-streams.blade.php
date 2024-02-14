 @php
$var_objective = "V-Stream";
@endphp
@extends('components.main-layout')
<title>Value Stream</title>
@section('content')
@if(count($Stream) > 0)
<div class="row">
@foreach($Stream as $stream)
   @php
    $TeamCount = DB::table('value_team')->where('org_id',$stream->id)->count();
   @endphp
    <div class="col-md-3">
        <div class="card business-card">
                <div class="card-body pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h3>
                                <a class="d-flex flex-row align-items-center" href="{{url('dashboard/organization/'.$stream->slug.'/dashboard/'.$stream->type)}}">
                                    <div>
                                        <span class="module-icon material-symbols-outlined mr-2">layers</span>
                                    </div>
                                    <div>
                                        <span>{{ \Illuminate\Support\Str::limit($stream->value_name,25, $end='...') }}</span>
                                    </div>
                                </a>
                            </h3>
                        </div>
                    </div>
                    <div class="content-section">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="mr-1">
                                        <span style="font-size:22px" class="material-symbols-outlined">folder_supervised</span>
                                    </div>
                                    <a href="{{ url('dashboard/organization') }}/{{ $stream->slug }}/portfolio/stream">
                                        <small>Objectives ({{DB::table('objectives')->wherenull('trash')->where('unit_id' , $stream->id)->where('type' , 'stream')->count()}})</small>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="mr-1">
                                        <ion-icon style="font-size: 18px;" name="people-outline"></ion-icon>
                                    </div>
                                    <a href="{{ url('dashboard/organization') }}/{{ $stream->slug }}/VS-TEAMS">
                                        <small>Teams ({{DB::table('value_team')->where('org_id' , $stream->id)->count()}})</small>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                         <div class="d-flex flex-row align-items-center leader-section">

                                @if($stream->Lead_id)
                                @foreach(DB::table('members')->get() as $r)
                                @if($r->id == $stream->Lead_id)
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
                                <td>N/A</td>
                                @endif
                            </div>                                                                                            

                        <div>
                            <div class="dropdown d-flex">
                                <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"  data-toggle="modal" data-target="#edit{{$stream->ID}}">Edit</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete{{$stream->ID}}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="delete{{$stream->ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                      
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Value Stream</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                    
                            <form method="POST">
                             @csrf   
                             <input type="hidden" name="delete_id" value="{{$stream->ID}}">
                           

                            <div class="modal-body">
                           
                                <div class="modal-body-error">
                                </div>
                              
                            Are you sure you want to delete this Value Stream?
                            <input type="text" name="value_name"  id="noPasteField" class="form-control noPasteField{{$stream->ID}}" placeholder="Type  Value Stream" required>
                    
                            </div>
                        

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" onclick="DeleteValue({{$stream->ID}})" class="btn btn-danger">Confirm</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
               <div class="modal fade" id="edit{{$stream->ID}}" tabindex="-1" role="dialog" aria-labelledby="add-business-unit" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 526px !important;">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="modal-title" id="create-epic">Update Value Stream</h5>
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
                            <form class="needs-validation" action="{{url('update-value-stream')}}" method="POST">
                                @csrf
                                <input type="hidden" name="value_id" value="{{$stream->ID}}">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" name="value_name" value="{{$stream->value_name}}" required>
                                            <label for="{{ Cmf::getmodulename("level_one") }}">Value Stream</label>
                                        </div>
                                    </div>
                                      <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <select class="form-control" name="unit_id" required>
                                                <?php foreach(DB::table('business_units')->where('user_id',Auth::id())->get() as $r){ ?>
                                                  <option @if($r->id == $stream->unit_id) selected @endif value="{{ $r->id }}">{{ $r->business_name }}</option>
                                                <?php }  ?>
                                            </select>
                                            <label for="lead-manager">{{ Cmf::getmodulename("level_one") }}</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <select class="form-control" name="lead_manager" required>
                                             
                                                <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                                  <option @if($r->id == $stream->Lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{$r->last_name}}</option>
                                                <?php }  ?>
                                            </select>
                                            <label for="lead-manager">Lead</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" value="{{$stream->DETAIL}}" name="detail">
                                            <label for="small-description">Small Description</label>
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
<!-- Create Business Unit -->

<!-- Create Business Unit -->
@else
<div style="position:absolute;right:27%;top:40%;" class="text-center">
<img src="{{asset('public/business-unit.svg')}}"  width="120" height="120">
<div><h6 class="text-center">No Records Found</h6></div>
<div><p class="text-center">You may create a {{ Cmf::getmodulename("level_one") }} by clicking the button below.</p></div>
<button class="btn btn-primary btn-lg btn-theme btn-block ripple ml-32" style="width:40%" type="button" data-toggle="modal" data-target="#add-business-value">
    Add {{ Cmf::getmodulename("level_one") }}
</button>
</div>
@endif
<div class="modal fade" id="add-business-value" tabindex="-1" role="dialog" aria-labelledby="add-business-unit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create Value Stream</h5>
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
                <form class="needs-validation" action="{{url('add-value-stream')}}" method="POST">
                    @csrf
                    <input type="hidden" name="org_value_id" value="{{$organization->id}}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="value_name" id="{{ Cmf::getmodulename('level_one') }}" required>
                                <label for="{{ Cmf::getmodulename('level_one') }}">Value Stream</label>
                            </div>
                        </div>
                        @php
                        $BCount = DB::table('business_units')->where('user_id',Auth::id())->count();
                        @endphp
                        <!--  <div class="col-md-12 col-lg-12 col-xl-12">-->
                        <!--    <div class="form-group mb-0">-->
                        <!--        <select class="form-control" name="unit_id" required>-->
                        <!--               <option value="">Select {{ Cmf::getmodulename("level_one") }}</option>-->
                        <!--            <?php foreach(DB::table('business_units')->where('user_id',Auth::id())->get() as $r){ ?>-->
                        <!--              <option value="{{ $r->id }}">{{ $r->business_name }}</option>-->
                        <!--            <?php }  ?>-->
                        <!--        </select>-->
                        <!--        <label for="lead-manager">{{ Cmf::getmodulename("level_one") }}</label>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- @if($BCount == 0)-->
                        <!--<div class="alert alert-danger mt-1 ml-3" role="alert">-->
                        <!--Add {{ Cmf::getmodulename("level_one") }} before assigning <a href="{{url('dashboard/organization/Business-Units')}}" class="alert-link">Click here</a>.-->
                        <!--</div>-->
                        <!--@endif-->
                        
                        @php
                        $memberCount = DB::table('members')->where('org_user',Auth::id())->count();
                        @endphp
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" name="lead_manager" required>
                                    <option value="NULL" selected>Select Lead</option>
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                      <option value="{{ $r->id }}">{{ $r->name }} {{$r->last_name}}</option>
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
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text"  class="form-control" name="detail">
                                <label for="small-description">Small Description</label>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   $(document).ready(function() {
    var table = $('.data-table').DataTable({
            'order':[],
            'columnDefs': [{
                "targets": [0,5],
                "orderable": false
            }]
         
      });

       });


     $(document).ready(function() {
    setTimeout(function(){$('.alert-success').slideUp();},3000); 
    });
    
        document.getElementById("noPasteField").addEventListener("paste", function (e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData("text/plain");
});


function DeleteValue(delete_id)
        {
 
        //  var delete_id = $('#delete_id').val();
         var value_name = $('.noPasteField'+delete_id).val();

    
        if(value_name == '')
        {
          $('#show-error').html('<div class="alert alert-danger" role="alert"> Please Enter Correct Value Stream Name</div>');    
            return  false;
        }
       
        $.ajax({
        type: "POST",
        url: "{{ url('delete-value-stream') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        delete_id:delete_id,
        value_name:value_name
        },
        success: function(res) {
      
         if(res == 1)
         {
         $('.modal-body-error').html('<div class="alert alert-danger" role="alert"> Please Enter Correct Value Stream Name</div>');    
             
         }else
         {
         $('.modal-body-error').html('<div class="alert alert-success" role="alert"> Value Stream Deleted Successfully</div>');
         location.reload();
         } 


        }
        });

        }
</script>
@endsection