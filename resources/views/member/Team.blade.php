@php
$var_objective = "Team";
@endphp
@extends('components.main-layout')
<title>{{ Cmf::getmodulename('level_three') }} - {{$organization->organization_name}}</title>
@section('content')
<style>

</style>

 <div class="row">
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-3 p-0">
        @include('member.sidebar')
        </div>
        <div class="col-md-9 pr-0">
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
                            <td>Team Name</td>
                            <td>Members</td>
                            <td>Team Leader</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                       @if(count($Team) > 0)
                       @foreach($Team as $team)
                       
                        @php
                        $dataArray = explode(",", $team->member);
                        $dataCount = count($dataArray);
                        @endphp
                    
                        <tr>
                            <td>
                                <label class="form-checkbox">
                                    <input type="checkbox">
                                    <span class="checkbox-label"></span>
                                </label>
                            </td>
                            <td>{{$team->team_title}}</td>
                            
                            <td>{{$dataCount}}</td>
                            @foreach(DB::table('members')->get() as $r)
                            @if($r->id == $team->lead_id)
                            <td class="image-cell">
                                @if($r->image != NULL)
                                <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
                                @endif
                                <div>
                                    <div class="title">{{$r->name}}</div>
                                </div>
                            </td>
                            @endif
                            @endforeach
                            
                            <td>
                                  <button class="btn-circle btn-tolbar">
                                    <span class="material-symbols-outlined" data-toggle="tooltip"
                            data-placement="top" data-original-title="Edit">edit</span>
                                </button>
                                <button class="btn-circle btn-tolbar">
                                    <span class="material-symbols-outlined" data-toggle="tooltip"
                            data-placement="top" data-original-title="Delete">delete</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


  <!-- Create Business Unit -->
<div class="modal fade" id="add-business-glob" tabindex="-1" role="dialog" aria-labelledby="add-team-glob" aria-hidden="true">
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
                <form class="needs-validation" action="{{url('add-team-global')}}" method="POST">
                    @csrf
                    <input type="hidden" name="org_id" value="{{$organization->id}}">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" name="team_title" id="team-title" required>
                                <label for="team-title">Team Tital</label>
                            </div>
                        </div>
                      <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <select class="form-control" name="lead_manager_team">
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                      <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    <?php }  ?>
                                </select>
                                <label for="lead-manager">Lead Manager</label>
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
                                        <p>{{$r->name}}</p>
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

    
$("#checkAll").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});

 $(document).ready(function() {
                   setTimeout(function(){$('.alert-success').slideUp();},3000); 
                    });
  </script>


@endsection