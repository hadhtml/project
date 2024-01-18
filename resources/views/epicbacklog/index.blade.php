@php
if ($type == 'BU') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'VS') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'org') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'orgT') {
$var_objective = 'TBaclog-' . $type;
}
@endphp
@extends('components.main-layout')
@if ($type == 'BU' || $type == 'VS' || $type == 'orgT')
<title>Epic Backlog-{{ $organization->team_title }}</title>
@endif
@if ($type == 'org')
<title>Org-Epic Backlog</title>
@endif
@section('content')
<style>
</style>
@if (count($Backlog) > 0)
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body p-6">
            @if (session('message'))
            <div class="alert alert-success mt-1" role="alert">
               {{ session('message') }}
            </div>
            @endif
            <table class="table data-table" id="olddata">
               <thead>
                  <tr>
                     <td>
                        <label class="form-checkbox">
                        <input type="checkbox" id="checkAll">
                        <span class="checkbox-label"></span>
                        </label>
                     </td>
                     <td>Title</td>
                     <td>Quarter</td>
                     <td>Start/End Date</td>
                     <td>Status</td>
                     <td>Progress</td>
                     <td>Action</td>
                  </tr>
               </thead>
               <tbody class="boards" id="backlog-board">
                  @foreach ($Backlog as $backlog)
                  <tr id="backlog-{{ $backlog->id }}">
                     <td>
                        <label class="form-checkbox">
                        <input type="checkbox" class="checkbox check" value="{{ $backlog->id }}">
                        <span class="checkbox-label"></span>
                        </label>
                     </td>
                     <td class="draggable">
                        <img src="{{ url('public/assets/svg/impedimentbacklog.svg') }}">
                        {{ $backlog->epic_title }}
                     </td>
                     <td>
                        @if ($backlog->assign_status == null)
                        Assign
                        <img src="{{ url('public/assets/svg/asignteam.svg') }}" data-toggle="modal"  data-target="#assign-unitbacklog-epic{{ $backlog->id }}">
                        @endif
                     </td>
                     <div class="modal fade" id="assign-unitbacklog-epic{{ $backlog->id }}"
                        tabindex="-1" role="dialog" aria-labelledby="create-epic" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content" style="width: 526px !important;">
                              <div class="modal-header">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h5 class="modal-title" id="create-epic">Assign Backlog Epic
                                       </h5>
                                    </div>
                                    <div class="col-md-12">
                                       <p>Fill out the form, submit and hit the save button.</p>
                                    </div>
                                    <div id="" role="alert"></div>
                                    <span id="" class="ml-3 text-danger"></span>
                                 </div>
                                 <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                 <img src="{{ asset('public/assets/images/icons/minus.svg') }}">
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form class="needs-validation"
                                    action="{{ url('assign-teambacklog-epic') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="backlog_id"
                                       value="{{ $backlog->id }}">
                                    <input type="hidden" name="team_type"
                                       value="{{ $organization->type }}">
                                    <div class="row">
                                       @if ($organization->type == 'BU')
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select class="form-control category"
                                                id="" name="stream_obj" required>
                                                <option value="">Select Business Team
                                                </option>
                                                <?php foreach(DB::table('unit_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                                                <option value="{{ $r->id }}">
                                                   {{ $r->team_title }}
                                                </option>
                                                <?php }  ?>
                                             </select>
                                             <label for="small-description">Choose
                                             Team</label>
                                          </div>
                                       </div>
                                       @endif
                                       @if ($organization->type == 'VS')
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select class="form-control category"
                                                id="" name="stream_obj" required>
                                                <option value="">Select Value Team
                                                </option>
                                                <?php foreach(DB::table('value_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                                                <option value="{{ $r->id }}">
                                                   {{ $r->team_title }}
                                                </option>
                                                <?php }  ?>
                                             </select>
                                             <label for="small-description">Choose
                                             Team</label>
                                          </div>
                                       </div>
                                       @endif
                                       @if ($organization->type == 'org')
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select class="form-control category"
                                                id="" name="stream_obj" required>
                                                <option value="">Select Organization
                                                </option>
                                                <?php foreach(DB::table('organization')->where('id',$organization->id)->get() as $r){ ?>
                                                <option value="{{ $r->id }}">
                                                   {{ $r->organization_name }}
                                                </option>
                                                <?php }  ?>
                                             </select>
                                             <label for="small-description">Choose
                                             Organization</label>
                                          </div>
                                       </div>
                                       @endif
                                       @if ($organization->type == 'orgT')
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select class="form-control category"
                                                id="" name="stream_obj" required>
                                                <option value="">Select Organization
                                                   Team
                                                </option>
                                                <?php foreach(DB::table('org_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                                                <option value="{{ $r->id }}">
                                                   {{ $r->team_title }}
                                                </option>
                                                <?php }  ?>
                                             </select>
                                             <label for="small-description">Choose
                                             Team</label>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select name="locstate" id=""
                                                onchange="getvaluekey(this.value)"
                                                class="form-control obj" value=""
                                                required>
                                             </select>
                                             <label for="small-description">Choose
                                             Objective</label>
                                          </div>
                                       </div>
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select name="lockey" id=""
                                                onchange="getvalueintit(this.value)"
                                                class="form-control key" value=""
                                                required>
                                             </select>
                                             <label for="small-description">Choose Key
                                             Result</label>
                                          </div>
                                       </div>
                                       <div class="col-md-12 col-lg-12 col-xl-12">
                                          <div class="form-group mb-0">
                                             <select name="locinit" id=""
                                                class="form-control init" required>
                                             </select>
                                             <label for="small-description"
                                                style="bottom:72px;">Choose initiative</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-xl-6">
                                          <div class="form-group mb-0">
                                             <input type="date" class="form-control"
                                             name="start_date[]"
                                             @if ($backlog->epic_start_date) value="{{ $backlog->epic_start_date }}" @else value="{{ date('Y-m-d') }}" @endif
                                             required>
                                             <label for="start-date">Start Date</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-xl-6">
                                          <div class="form-group mb-0">
                                             <input type="date" class="form-control"
                                             name="end_date[]"
                                             @if ($backlog->epic_end_date) value="{{ $backlog->epic_end_date }}" @else value="{{ date('Y-m-d') }}" @endif
                                             required>
                                             <label for="start-date">End Date</label>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <button
                                             class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3"
                                             type="submit">Assign Epics</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <td>
                        @if ($backlog->epic_end_date != '')
                        {{ \Carbon\Carbon::parse($backlog->epic_start_date)->format('M d') }}
                        - {{ \Carbon\Carbon::parse($backlog->epic_end_date)->format('M d') }}
                        @else
                        Epic Date Not Selected
                        @endif
                     </td>
                     <td>
                        <div class="text-center">
                           @if ($backlog->epic_status != NULL)
                           @if ($backlog->epic_status == 'In progress')
                           <span
                              class="badge-cs warning w-100">{{ $backlog->epic_status }}</span>
                           @endif
                           @if ($backlog->epic_status == 'Done')
                           <span class="badge-cs success">Done</span>
                           @endif
                           @if ($backlog->epic_status == 'To Do')
                           <span class="badge-cs bg-primary">To Do</span>
                           @endif
                           @else
                           N/A
                           @endif
                        </div>
                     </td>
                     <td>
                        <div class="d-flex flex-column">
                           <div class="ml-auto">
                              {{ round($backlog->progress, 2) }}%
                           </div>
                           <div>
                              <div class="progress">
                                 <div class="progress-bar" role="progressbar"
                                    style="width: {{ $backlog->progress }}%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                           </div>
                        </div>
                     </td>
                     <td>
                        <button class="btn-circle btn-tolbar" onclick="editbacklogepic({{ $backlog->id }} , 'team_backlog')">
                           <img src="{{ asset('public/assets/images/icons/edit.svg') }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                        </button>
                        <button class="btn-circle btn-tolbar" data-toggle="modal" data-target="#delete{{ $backlog->id }}">
                           <img src="{{ asset('public/assets/images/icons/delete.svg') }}" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                        </button>
                        @if ($backlog->backlog_id == NULL)
                        <a class="btn-circle btn-tolbar" href="{{url('epic-clone/'.$backlog->id.'/'.$organization->type)}}">
                           <img src="{{asset('public/assets/images/icons/info-circle.svg')}}" data-toggle="tooltip" data-placement="top" data-original-title="Clone">
                           </a>
                        @endif   
                     </td>
                  </tr>
                  <div class="modal fade" id="delete{{ $backlog->id }}" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Backlog</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form method="POST" action="{{ url('delete-team-backlog') }}">
                              @csrf
                              <input type="hidden" name="delete_id" value="{{ $backlog->id }}">
                              <div class="modal-body">
                                 Are you sure you want to delete this Backlog?
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-danger">Confirm</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="create{{$backlog->id}}" tabindex="-1" role="dialog" aria-labelledby="create-epic" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width: 526px !important;">
                           <div class="modal-header">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h5 class="modal-title" id="create-epic">Update Backlog Epic</h5>
                                 </div>
                                 <div class="col-md-12">
                                    <p>Fill out the form, submit and hit the save button.</p>
                                 </div>
                                 <div id=""  role="alert"></div>
                                 <span id="" class="ml-3 text-danger"></span>
                              </div>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <img src="{{asset('public/assets/images/icons/minus.svg')}}">
                              </button>
                           </div>
                           <div class="modal-body">
                              <form class="needs-validation" action="{{url('update-backlog-epic')}}" method="POST" >
                                 @csrf
                                 <input type="hidden" name="backlog_id" value="{{$backlog->id}}">
                                 <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="form-group mb-0">
                                          <input type="text" class="form-control" value="{{$backlog->epic_title}}" name="epic_name" id="" required>
                                          <label for="objective-name">Epic Title</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <input type="date" class="form-control"  name="epic_start_date" value="{{$backlog->epic_start_date}}">
                                          <label for="start-date">Start Date</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <input type="date" class="form-control"  name="epic_end_date" value="{{$backlog->epic_end_date}}">
                                          <label for="end-date">End Date</label>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="form-group mb-0">
                                          <select class="form-control" name="epic_status">
                                             <option value="To Do">To Do</option>
                                             <option value="In progress">In Progress</option>
                                             <option value="Done">Done</option>
                                          </select>
                                          <label for="small-description">Status</label>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="form-group mb-0">
                                          <input type="text" class="form-control" value="{{$backlog->epic_detail}}"  name="epic_description">
                                          <label for="small-description">Small Description</label>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="form-group mb-0">
                                          <select class="form-control" name ="team"  class="">
                                             <option value="">Assign Team</option>
                                             @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
                                             <option value="{{$r->id}}">{{$r->team_title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <button class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3"  type="submit">Update</button>
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
@else
<div style="position:absolute;right:30%;top:40%;" class="text-center">
   <img src="{{ asset('public/epic-backlog.svg') }}" width="120" height="120">
   <div>
      <h6 class="text-center">No Records Found</h6>
   </div>
   <div>
      <p class="text-center">You may create your first Epic by clicking the bellow button</p>
   </div>
   <button class="btn btn-primary btn-lg btn-theme btn-block ripple ml-25" style="width:50%"
      data-toggle="modal" data-target="#create-backlog-team">
   Add an Epic
   </button>
</div>
@endif 
<div class="modal fade" id="create-backlog-team" tabindex="-1" role="dialog" aria-labelledby="create-epic"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content newmodalcontent">
         <div class="modal-header">
            <div class="row positionrelative">
                <div class="col-md-12 mb-5">
                    <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
                        <img src="{{ url('public/assets/svg/epicheaderheader.svg') }}">Create Epic Backlog  
                    </h5>
                </div>
                <div class="col-md-12 displayflex">
                    <div class="btn-group epicheaderborderleft">
                        <button type="button" class="statuschangebutton btn btn-default todo-button-color" id="showboardbutton">
                             To Do                            
                        </button>
                        <button type="button" class="todo-button-color statuschangebuttonarrow btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">         
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0)">In Progress</a>
                              <a class="dropdown-item" href="javascript:void(0)">Done</a>
                        </div>
                    </div>
                    <div class="moverightside">
                        <h1 class="epic-percentage"></h1>
                    </div>
                </div>
            </div>
            <div class="rightside" >
                <span onclick="maximizemodal()">
                    <img  src="{{url('public/assets/svg/maximize.svg')}}">
                </span>
                <img data-dismiss="modal" class="closeimage" aria-label="Close" src="{{url('public/assets/svg/cross.svg')}}">
            </div>
         </div>
         <div class="modal-body" id="showformforedit">
            <div class="row"><div class="col-md-12"><div class="border-top"></div></div></div>
            <div class="row mt-3">
                 <div class="col-md-3">
                     <div class="menuettitle">
                         <h4>Menu</h4>
                         <input type="hidden" id="modaltab" value="general">
                         <ul>
                             <li id="general" class="tabsclass active">
                                 <span class="material-symbols-outlined"> edit_square </span> General
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-md-9 secondportion">
                     <div class="row">
                         <div class="col-md-12 col-lg-12 col-xl-12">
                             <div class="d-flex flex-row align-items-center justify-content-between block-header">
                                 <div class="d-flex flex-row align-items-center">
                                     <div class="mr-2">
                                         <span class="material-symbols-outlined">edit_square</span>
                                     </div>
                                     <div>
                                         <h4>General</h4>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <form class="needs-validation" action="{{ url('add-teambacklog-epic') }}" method="POST">
                        @csrf
                        <input type="hidden" name="unit_id" value="{{ $organization->id }}">
                        <input type="hidden" name="type" value="{{ $organization->type }}">
                        <input type="hidden"  name="epic_status" value="To Do">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <label for="epic_name">Epic Title</label>
                                    <input type="text" class="form-control" name="epic_name" id="" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <label for="epic_start_date">Start Date</label>
                                    <input type="date" class="form-control" name="epic_start_date" id="">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <label for="epic_end_date">End Date</label>
                                    <input type="date" class="form-control" name="epic_end_date" id="">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <div class="textareaformcontrol">
                                        <textarea name="epic_description" id="editorbacklog"></textarea> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margintopfourtypixel">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton">Save Epic</button>
                            </div>
                        </div>
                     </form>
                 </div>
             </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="assign-Teambacklog-epic" tabindex="-1" role="dialog" aria-labelledby="create-epic"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 526px !important;">
         <div class="modal-header">
            <div class="row">
               <div class="col-md-12">
                  <h5 class="modal-title" id="create-epic">Assign Backlog Epic</h5>
               </div>
               <div class="col-md-12">
                  <p>Fill out the form, submit and hit the save button.</p>
               </div>
               <div id="" role="alert"></div>
               <span id="" class="ml-3 text-danger"></span>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="{{ asset('public/assets/images/icons/minus.svg') }}">
            </button>
         </div>
         <div class="modal-body">
            <form class="needs-validation" action="{{ url('assign-teambacklog-epic') }}" method="POST">
               @csrf
               <input type="hidden" name="backlog_id" id="backlog-id">
               <input type="hidden" name="team_type" value="{{ $organization->type }}">
               <div class="row">
                  @if ($organization->type == 'BU')
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select class="form-control category" id="" name="stream_obj" required>
                           <option value="">Select Business Team</option>
                           <?php foreach(DB::table('unit_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                           <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                           <?php }  ?>
                        </select>
                        <label for="small-description">Choose Team</label>
                     </div>
                  </div>
                  @endif
                  @if ($organization->type == 'VS')
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select class="form-control category" id="" name="stream_obj" required>
                           <option value="">Select Value Team</option>
                           <?php foreach(DB::table('value_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                           <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                           <?php }  ?>
                        </select>
                        <label for="small-description">Choose Team</label>
                     </div>
                  </div>
                  @endif
                  @if ($organization->type == 'org')
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select class="form-control category" id="" name="stream_obj" required>
                           <option value="">Select Organization</option>
                           <?php foreach(DB::table('organization')->where('id',$organization->id)->get() as $r){ ?>
                           <option value="{{ $r->id }}">{{ $r->organization_name }}</option>
                           <?php }  ?>
                        </select>
                        <label for="small-description">Choose Organization</label>
                     </div>
                  </div>
                  @endif
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select name="locstate" id="" onchange="getvaluekey(this.value)"
                           class="form-control obj" value="" required>
                        </select>
                        <label for="small-description">Choose Objective</label>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select name="lockey" id="" onchange="getvalueintit(this.value)"
                           class="form-control key" value="" required>
                        </select>
                        <label for="small-description">Choose Key Result</label>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select name="locinit" id="" class="form-control init" value=""
                           required>
                        </select>
                        <label for="small-description">Choose initiative</label>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="form-group mb-0">
                        <input type="date" class="form-control" name="start_date[]"
                           value="{{ date('Y-m-d') }}" required>
                        <label for="start-date">Start Date</label>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="form-group mb-0">
                        <input type="date" class="form-control" name="end_date[]" required>
                        <label for="start-date">End Date</label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <button class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3"
                        type="submit">Assign Epics</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="create-jira-epic" tabindex="-1" role="dialog" aria-labelledby="create-epic"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 526px !important;">
         <div class="modal-header">
            <div class="row">
               <div class="col-md-12">
                  <h5 class="modal-title" id="create-epic">Download Epics from Jira</h5>
               </div>
               <div class="col-md-12">
                  <p>Fill out the form, submit and hit the save button.</p>
               </div>
               <div id="" role="alert"></div>
               <span id="" class="ml-3 text-danger"></span>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="{{ asset('public/assets/images/icons/minus.svg') }}">
            </button>
         </div>
         @php
         $jira = DB::table('jira_setting')->where('user_id',Auth::id())->count();
         @endphp
         <div class="modal-body">
            <form class="needs-validation" action="{{ url('assign-jira-epic') }}" method="POST">
               @csrf
               <input type="hidden" name="backlog_id" value="{{ $organization->id }}">
               <input type="hidden" name="type" value="{{ $organization->type }}">
               @if($jira > 0)
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group mb-0">
                     <select class="form-control" onchange="get_jira_project(this.value)" id="JIRA"
                        name="jira_name" required>
                        <option value="">Select Jira Connect</option>
                        <?php foreach(DB::table('jira_setting')->where('user_id',Auth::id())->get() as $r){ ?>
                        <option value="{{ $r->id }}">{{ $r->jira_name }}</option>
                        -->
                        <?php }  ?>
                     </select>
                     <label for="small-description">Choose Jira Connect</label>
                  </div>
               </div>
               @else
               <div class="alert alert-danger mt-1 ml-3" role="alert">
                  Connect your Jira account in the settings. <a href="{{url('dashboard/organization/setting')}}" class="alert-link">Click here</a>.
               </div>
               @endif
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group mb-0">
                     <select class="form-control" onchange="c_jira(this.value)" id="jira-project"
                        name="jira_project" required>
                     </select>
                     <label for="small-description" style="bottom:72px;">Choose Jira Project</label>
                  </div>
               </div>
               <div class="row" id="jita-data">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal" id="edit-backlog-epic-modal-new" tabindex="-1" role="dialog" aria-labelledby="edit-epic" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modaldialog" role="document">
        <div class="modal-content newmodalcontent" id="epic-backlog-modal-content">
            
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   function editbacklogepic(id , table) {
      var new_url="{{ url()->current() }}?epicbacklog="+id;
      window.history.pushState("data","Title",new_url);
      $.ajax({
         type: "POST",
         url: "{{ url('dashboard/epicbacklog/getepic') }}",
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: {
             id: id,
             table: table,
         },
         success: function(res) {
             $('#epic-backlog-modal-content').html(res);
             $('#edit-backlog-epic-modal-new').modal('show');
             // showtab(id , 'general');
             showheaderbacklog(id, table);
         }
      });
   }
   function showheaderbacklog(id, table) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epicbacklog/showheader') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
               id:id,
               table:table,
            },
            success: function(res) {
                $('.modalheaderforapend').html(res);
            },
            error: function(error) {
                
            }
        });
    }
   $(document).ready(function() {
      $('#editorbacklog').summernote({
        height: 180,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['view', ['fullscreen', 'codeview']],
        ],
    });
       var table = $('.example').DataTable({
           "pagingType": "full_numbers",
           "language": {
               "paginate": {
                   "previous": "&lsaquo;", // Custom previous arrow
                   "next": "&rsaquo;" // Custom next arrow
               }
           },
           "columnDefs": [{
                   "orderable": false,
                   "targets": [0, 6]
               } // Disable ordering for the first and third columns
           ]
       });
   
       // Check All checkbox functionality
       $('#checkAll').change(function() {
           $(':checkbox', 'tbody').prop('checked', this.checked);
   
           if(this.checked)
           {
               $("#backlog-assign").show();
   
           }else
           {
               $("#backlog-assign").hide();
   
           }
   
   
           
   
       });
   
       $('.check').on('click', function(){
       isChecked = $(this).is(':checked')
       
       if(isChecked){ 
           $("#backlog-assign").show();
       }
    
       })
   
   });
   
   
   
   
   function get_epic() {
   
       var selectedOption = [];
       $('.checkbox:checked').each(function() {
           selectedOption.push($(this).val());
   
   
       });
   
       var selectedOptionsString = selectedOption.join(',');
   
       $('#backlog-id').val(selectedOptionsString);
   
       if (selectedOption.length > 0) {
           $('#assign-Teambacklog-epic').modal('show');
           $('.category').val('');
       }
   
   
   
   }
   

   
   function c_jira(id) {
   
       var y = $('#JIRA').val();
       var unit_id = "{{ $organization->id }}";
   
       $('#jita-data').html('');
   
       if (y != '') {
           $.ajax({
               type: "GET",
               url: "{{ url('get-jira-epic') }}",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data: {
                   id: id,
                   y: y,
                   unit_id: unit_id
               },
               success: function(res) {
   
                   if (res == 1) {
                       $('#jita-data').html('<span class="ml-7 text-danger">Backlog of Project ' + id +
                           ' Already Assinged</span>');
                   } else {
                       $('#jita-data').html(res);
   
                   }
   
   
               }
           });
       }
   
   }
   
   function get_jira_project(id) {
   
       if (id != '') {
           $('#JIRA').val(id);
           $.ajax({
               type: "GET",
               url: "{{ url('get-jira-project') }}",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data: {
                   id: id,
               },
               success: function(res) {
   
                   if (res) {
                       $('#jira-project').empty();
                       $('#jira-project').append('<option hidden value="">Choose Jira Project</option>');
                       $.each(res, function(key, course) {
                           $('select[name="jira_project"]').append('<option value="' + course
                               .project_name + '">' + course.project_name + '</option>');
                       });
                   } else {
                       $('#jira-project').empty();
                   }
   
               }
           });
   
       }
   
   
   }

   function assign_epic(val)
        {
            
        var slug = "{{$organization->slug}}";   
        var id = "{{$organization->id}}"; 
        var type = "{{$organization->type}}"; 

        $.ajax({
        type: "GET",
        url: "{{ url('get-assign-epic-all') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        id:id,
        slug:slug,
        val:val,
        type:type
        },
        success: function(res) {
          
        $('#olddata').html(res);
        
        }
        });

        }
   
   
   
   $(document).ready(function() {
       setTimeout(function() {
           $('.alert-success').slideUp();
       }, 3000);
   });
</script>
@endsection