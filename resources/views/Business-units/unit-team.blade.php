@php
$var_objective = "Org-Unit-team";
@endphp
@extends('components.main-layout')
<title>{{ Cmf::getmodulename('level_two') }}-{{ Cmf::getmodulename('level_three') }}</title>
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

  @if(count($Team) > 0)
<div class="row">

  
   @foreach($Team as $team)

    @php
    $dataArray = explode(',', $team->member);
                    $dataCount = count($dataArray);
                    $firstTwoIds = array_slice($dataArray, 0, 2);
                    $remainingIds = array_slice($dataArray, 2);
                    $remainingCount = count($remainingIds);

    $ObjResultcount  = DB::table('objectives')->where('unit_id',$team->id)->where('type','BU')->where('trash',NULL)->count();
    $EpicResultcount  = DB::table('team_backlog')->where('epic_title','!=',NULL)->where('unit_id',$team->id)->where('type','BU')->count();

    @endphp
<div class="col-md-4">
    <div class="card business-card">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-row">
                    <div class="mr-2">
                        <img  class="gixie" data-item-id="{{ $team->id }}" style="width: 40px; object-fit: cover; border-radius: 10px; height: 40px;">
                    </div>
                    <div>
                        <h3 class="mb-0">
                            <a href="{{url('dashboard/organization/'.$team->slug.'/dashboard/BU')}}">{{$team->team_title}}</a>
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
                                        <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
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
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="d-flex align-items-center flex-lg-fill my-1">
                        <div class="symbol-group symbol-hover">
                            @foreach($firstTwoIds as $member)
                            @foreach(DB::table('members')->get() as $r)
                            @if($r->id == $member)
                            @php
                            $name = $r->name.' '.$r->last_name;
                            @endphp
 
                             <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="{{$name}}">
                                 @if($r->image != NULL)
                                         <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                         @else
                                         <img src="{{ Avatar::create($name)->toBase64() }}" alt="Example Image">
                                         @endif
                             </div>
                             
                             @endif
                             @endforeach
                             @endforeach
                             @if($dataCount > 3)
                             <div style="width:42px; height:42px; padding: 10px; font-size: 12px;" class="symbol symbol-30  symbol-circle symbol-light" data-toggle="tooltip" title="" data-original-title="More users">
                                 <span class="symbol-label">{{$remainingCount}}+</span>
                             </div>
                             @endif
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
              <h5 class="modal-title" id="exampleModalLabel">Delete {{ Cmf::getmodulename('level_three') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          
    
            <form method="POST" action="{{url('delete-unit-team')}}">
             @csrf   
             <input type="hidden" name="delete_id" value="{{$team->id}}">
           
    
            <div class="modal-body">
              
            Are you sure you want to delete this {{ Cmf::getmodulename('level_three') }}?
    
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
                                <h5 class="modal-title" id="create-epic">Update {{ Cmf::getmodulename('level_three') }}</h5>
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
                                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r){ ?>
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
                                    @foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r)
                                    <div class="d-flex flex-row align-items-center justify-content-between single-member">
                                        <div class="d-flex flex-row align-items-center ">
                                            <div>
                                                 @if($r->image != NULL)
                                                <img width="45px" height="45px" src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                                @else
                                                <img width="45px" height="45px" src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
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
                                <div class="col-md-12 mt-7">
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
<img src="{{asset('public/team.svg')}}"  width="120" height="120">
<div><h6 class="text-center">No Records Found</h6></div>
<div><p class="text-center">You may create your first {{ Cmf::getmodulename('level_three') }} by clicking the bellow button.</p></div>
<button class="btn btn-flex btn-primary h-40px fs-7 fw-bold"  type="button" data-toggle="modal" data-target="#add-team">
    Add a {{ Cmf::getmodulename('level_three') }}
</button>
</div>
@endif




<!-- Create Business Unit -->
<!-- Create Business Unit -->
<div class="modal fade" id="add-team" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 526px !important;">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="create-epic">Create {{ Cmf::getmodulename('level_three') }}</h5>
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
                <form class="needs-validation simpleform" action="{{url('add-team-unit')}}" method="POST" >
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
                        $memberCount = DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->count();
                        @endphp
                        
                      <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" name="lead_manager_team" required>
                                    <option value="">Select Lead</option>
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r){ ?>
                                      <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    <?php }  ?>
                                </select>
                                <label for="lead-manager" style="bottom:72px">Lead</label>
                            </div>
                        </div>
                        
                        @if($memberCount == 0)
                        <div class="alert alert-danger mt-1 ml-3" role="alert">
                        Add users before assigning <a href="{{route('settings.users')}}" class="alert-link">Click here</a>.
                        </div>
                        @endif
                        
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                                <div>
                                    Add Users
                                </div>
                                <div>
                                    <input id="myInput" type="search" class="form-control input-sm"  placeholder="Search..." name="">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 member-area" id="member-old">
                            <div class="d-flex flex-row align-items-center justify-content-between single-member">
                                <div class="d-flex flex-row align-items-center ">
                                    <table class="table">
                                        {{-- <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                          </tr>
                                        </thead> --}}
                                        <tbody id="myTable">
                                            @foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r)
                                            <tr>
                                            <div>
                                            <th scope="row"> 
                                                @if ($r->image != null)
                                                <img width="45px" height="45px"
                                                    src="{{ asset('public/assets/images/' . $r->image) }}"
                                                    alt="Example Image">
                                            @else
                                            <img width="45px" height="45px" src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
                                            @endif</th>
                                            <td><p>{{ $r->name }} {{ $r->last_name }}</p></td>
                                            <td><small>{{ $r->email }}</small></td>
                                            <td>
                                              <input type="checkbox"  value="{{$r->id}}" name="member[]">
                                            </td>
                                          </tr>
                                          @endforeach
                                     
                                        </tbody>
                                      </table>
                                    {{-- <div>
                                         @if($r->image != NULL)
                                        <img width="45px" height="45px" src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                        @else
                                        <img width="45px" height="45px" src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
                                        @endif
                                        
                                    </div>
                                    <div class="d-flex flex-column ml-3">
                                        <p>{{$r->name}} {{ $r->last_name }}</p>
                                        <small>{{$r->email}}</small>
                                    </div> --}}
                                </div>
                                {{-- <div class="checkbox-group required">
                                    <input type="checkbox"  value="{{$r->id}}" name="member[]">
                                </div> --}}
                            </div>
                      
                       
                        </div>
                        {{-- <div class="col-md-12 col-lg-12 col-xl-12 member-area" style="display:none" id="member">
                        </div> --}}
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Create {{ Cmf::getmodulename('level_three') }}</button>
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
    if(val != '')
          {
           $.ajax({
            type: "GET",
            url:"{{url('get-user')}}", 
            data:{val:val},
            success: function(res) {
            
            $('#member').show();
            $('#member').html(res);
            $('#member-old').hide();
    

            }
        });

    }else
        {
            
            $('#member-old').show();
            $('#member').hide();

        }
    
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

// $('.simpleform').on('submit', function(e) {

// if($('div.checkbox-group.required :checkbox:checked').length > 0)
// {
// this.submit(); 
// }else{
//  return false;  
// }
// });

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>                    
    
@endsection