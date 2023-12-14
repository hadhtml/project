@php
$var_objective = "Stream-team";
@endphp
@extends('components.main-layout')
<title>Teams-{{$organization->value_name}}</title>
@section('content')


<div class="row">

    @if(count($Team) > 0)
    @foreach($Team as $team)
 
     @php
 
    $dataArray = explode(",", $team->member);
    $dataCount = count($dataArray);
                               
     $ObjResultcount  = DB::table('objectives')->where('unit_id',$team->id)->where('type','VS')->where('trash',NULL)->count();
     $EpicResultcount  = DB::table('epics')->where('buisness_unit_id',$team->id)->where('trash',NULL)->count();
 
     @endphp
 <div class="col-md-3">
     <div class="card business-card">
         <div class="card-body">
             <div class="d-flex flex-row justify-content-between">
                 <div class="d-flex flex-row">
                     <div class="mr-2">
                         <img  class="gixie" data-item-id="{{ $team->id }}" style="width: 40px; object-fit: cover; border-radius: 10px; height: 40x;">
                     </div>
                     <div>
                         <h3 class="mb-0">
                             <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/VS')}}">{{$team->team_title}}</a>
                         </h3>
                         <small>
                             {{$dataCount}} total members
                         </small>
                     </div>
                 </div>
                 <div>
                     <div class="dropdown d-flex">
                         <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                         </button>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                             <a class="dropdown-item"  data-toggle="modal" data-target="#add-team-stream-edit{{$team->id}}">Edit</a>
                             <a class="dropdown-item" data-toggle="modal" data-target="#delete{{$team->id}}">Delete</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="d-flex justify-content-between align-items-center leader-section mt-4">
                 <div>
                     @if($team->lead_id)
                         @foreach(DB::table('members')->get() as $r)
                         @if($r->id == $team->lead_id)
 
                                 <div class="d-flex flex-row align-items-center">
                                     <div class="mr-2">
                                         @if($r->image != NULL)
                                         <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                         @else
                                         <img src="{{ Avatar::create($r->name)->toBase64() }}" alt="Example Image">
                                         @endif
                                     </div>
 
                                     <div class="d-flex flex-column">
                                         <div>
                                             <span class="text-primary">Team Lead</span>
                                         </div>
                                         <div>
                                             <span>{{$r->name}} {{ $r->last_name }}</span>
                                         </div>
                                     </div>
                                 </div>
                             @endif
                         @endforeach
                     @endif
                 </div>
                 <div>
                     <div class="d-flex align-items-center flex-lg-fill my-1">
                         <div class="symbol-group symbol-hover">
                             <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Mark Stone">
                                 <img alt="Pic" src="https://img.freepik.com/premium-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg">
                             </div>
                             <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Charlie Stone">
                                 <img alt="Pic" src="https://img.freepik.com/premium-photo/young-man-smiling-cheerfully-feeling-happy-pointing-side-upwards-showing-object-copy-space_1194-211017.jpg">
                             </div>
                             <div style="width:42px; height:42px; padding: 10px; font-size: 12px;" class="symbol symbol-30  symbol-circle symbol-light" data-toggle="tooltip" title="" data-original-title="More users">
                                 <span class="symbol-label">5+</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
 
             <div class="row counter-section">
                 <div class="col-md-6 pr-2">
                     <div class="counter-card d-flex flex-row align-items-center">
                         <div class="mr-1">
                             <span class="material-symbols-outlined text-secondary">bolt</span>
                         </div>
                         <div class="d-flex flex-column">
                             <div>
                                 <b>{{$EpicResultcount}}</b>
                             </div>
                             <div>
                                 <small class="text-secondary">Epics</small>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 pl-2">
                     <div class="counter-card d-flex flex-row align-items-center">
                         <div class="mr-1">
                             <span class="material-symbols-outlined text-secondary">adjust</span>
                         </div>
                         <div class="d-flex flex-column">
                             <div>
                                 <b>{{$ObjResultcount}}</b>
                             </div>
                             <div>
                                 <small class="text-secondary">Objectives</small>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
 
         </div>
     </div>
 </div>
 

 <div class="modal fade" id="delete{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Team</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      

        <form method="POST" action="{{url('delete-value-team')}}">
         @csrf   
         <input type="hidden" name="delete_id" value="{{$team->id}}">
       

        <div class="modal-body">
          
        Are you sure you want to delete this Team?

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
         
  <div class="modal fade" id="add-team-stream-edit{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 526px !important;">
        <div class="modal-header">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="modal-title" id="create-epic">Create Team</h5>
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
            <form class="needs-validation" action="{{url('update-stream-team')}}"  method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$team->id}}">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" name="team_title_edit" value="{{$team->team_title}}" id="team-title" required>
                            <label for="team-title">Name</label>
                        </div>
                    </div>
                     <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group mb-0">
                            <select class="form-control" name="edit_lead_manager_team">
                                @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                  <option  @if($r->id == $team->lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                 @endforeach
                            </select>
                            <label for="lead-manager">Lead</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                            <div>
                                Organization Member
                            </div>
                            <div>
                                <input type="text" class="form-control input-sm" placeholder="Search..." name="">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 member-area">
                      
                        @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                        <div class="d-flex flex-row align-items-center justify-content-between single-member">
                            <div class="d-flex flex-row align-items-center ">
                                <div>
                                     @if($r->image != NULL)
                                    <img width="45px" height="45px" src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                    @else
                                    <img width="45px" height="45px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
                                    @endif
                                    
                                </div>
                                <div class="d-flex flex-column ml-3">
                                    <p>{{$r->name}} {{$r->last_name}}</p>
                                    <small>{{$r->email}}</small>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" @foreach(explode(',',$team->member) as $t) @if($r->id == $t) checked @endif @endforeach value="{{$r->id}}" name="edit_member[]">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
         @endforeach
         @endif
     
 </div>
    <!-- Create Business Unit -->
<!-- Create Business Unit -->
<div class="modal fade" id="add-team-stream" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create Team</h5>
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
                <form class="needs-validation" action="{{url('add-stream-team')}}"  method="POST">
                    @csrf
                    <input type="hidden" name="org_stream_id" value="{{$organization->id}}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="team_title" id="team-title" required>
                                <label for="team-title">Name</label>
                            </div>
                        </div>
                         <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" name="lead_manager_team">
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                      <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    <?php }  ?>
                                </select>
                                <label for="lead-manager">Lead</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                                <div>
                                    Add User
                                </div>
                                <div>
                                    <input type="text" class="form-control input-sm" onkeyup="search_member(this.value);" placeholder="Search..." name="">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 member-area" id="member">
                          
                            @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                            <div class="d-flex flex-row align-items-center justify-content-between single-member">
                                <div class="d-flex flex-row align-items-center ">
                                    <div>
                                         @if($r->image != NULL)
                                        <img width="45px" height="45px" src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                        @else
                                        <img width="45px" height="45px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
                                        @endif
                                        
                                    </div>
                                    <div class="d-flex flex-column ml-3">
                                        <p>{{$r->name}} {{ $r->last_name }}</p>
                                        <small>{{$r->email}}</small>
                                    </div>
                                </div>
                                <div>
                                    <input type="checkbox" value="{{$r->id}}" name="member[]">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Create Team</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script>
function search_member(val)
{
           
           $.ajax({
            type: "GET",
            url:"{{url('get-user')}}", 
            data:{val:val},
            success: function(res) {
                
            $('#member').html(res);    

            }
        });
    
}
 $(document).ready(function() {
 setTimeout(function(){$('.alert-success').slideUp();},3000); 
});

var elements = document.querySelectorAll('.gixie');

elements.forEach(function(element) {
    var itemId = element.getAttribute('data-item-id');
    var imageData = new GIXI(300).getImage(); 

    element.setAttribute('src', imageData);
});
</script>  
@endsection