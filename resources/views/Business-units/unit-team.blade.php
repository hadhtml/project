@php
$var_objective = "Org-Unit-team";
@endphp
@extends('components.main-layout')
<title>Teams-{{$organization->business_name}}</title>
@section('content')


@if (session('message'))
  <div class="row">
      <div class="col-md-12">
          <div class="alert alert-success mt-1" role="alert">
              {{ session('message') }}
          </div>
      </div>
  </div>



<div class="row">
    @endif
   @if(count($Team) > 0)
   @foreach($Team as $team)

    @php
    $dataArray = explode(",", $team->member);
    $dataCount = count($dataArray);
    @endphp
<div class="col-md-3">
    <div class="card business-card">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-row">
                    <div class="mr-2">
                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/e2b28077-02b5-4e0f-8303-37e2672ea874/d5a1hdb-d15d5151-5a7b-4407-9eaa-99aa77863802.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2UyYjI4MDc3LTAyYjUtNGUwZi04MzAzLTM3ZTI2NzJlYTg3NFwvZDVhMWhkYi1kMTVkNTE1MS01YTdiLTQ0MDctOWVhYS05OWFhNzc4NjM4MDIucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.ITLY1myWdL4iAy1wu4qYRLCGPOEbVs4rxrlXt5uR3zg" style="width: 40px; object-fit: cover; border-radius: 10px; height: 40x;">
                    </div>
                    <div>
                        <h3 class="mb-0">
                            <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/BU')}}">{{$team->team_title}}</a>
                        </h3>
                        <small>
                            30 total members
                        </small>
                    </div>
                </div>
                <div>
                    <div class="dropdown d-flex">
                        <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  data-toggle="modal" data-target="#edit{{$team->id}}">Edit</a>
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
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
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
                                <b>40</b>
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
                                <b>40</b>
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
          
    
            <form method="POST" action="{{url('delete-unit-team')}}">
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
        
        <div class="modal fade" id="edit{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 526px !important;">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="modal-title" id="create-epic">Update Team</h5>
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
                        <form class="needs-validation" action="{{url('update-team-unit')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$team->id}}">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" value="{{$team->team_title}}" name="team_title" id="team-title" required>
                                        <label for="team-title">Name</label>
                                    </div>
                                </div>
                              <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <select class="form-control" name="lead_manager_team">
                                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                              <option @if($r->id == $team->lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                            <?php }  ?>
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
                                                <p>{{$r->name}} {{ $r->last_name }}</p>
                                                <small>{{$r->email}}</small>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="checkbox" @foreach(explode(',',$team->member) as $t) @if($r->id == $t) checked @endif @endforeach value="{{$r->id}}" name="member[]">
                                        </div>
                                    </div>
                                    @endforeach
                               
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
</div>




<!-- Create Business Unit -->
<!-- Create Business Unit -->
<div class="modal fade" id="add-team" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create Team</h5>
                    </div>
                    <div class="col-md-12">
                        <p>Fill-in the details bellow</p>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="{{url('add-team-unit')}}" method="POST">
                    @csrf
                    <input type="hidden" name="team_unit_id" value="{{$organization->id}}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="team_title" id="team-title" required>
                                <label for="team-title">Name</label>
                            </div>
                        </div>
                        @php
                        $memberCount = DB::table('members')->where('org_user',Auth::id())->count();
                        @endphp
                        
                      <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" name="lead_manager_team" required>
                                    <option value="NULL">Select Lead</option>
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
                        
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                                <div>
                                    Add Users
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
</script>                    
    
@endsection