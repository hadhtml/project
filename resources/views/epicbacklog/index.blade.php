@php
if ($type == 'BU') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'VS') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'stream') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'org') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'orgT') {
$var_objective = 'TBaclog-' . $type;
}
if ($type == 'unit') {
$var_objective = 'TBaclog-' . $type;
}
@endphp
@extends('components.main-layout')
@if ($type == 'BU' || $type == 'VS' || $type == 'orgT')
<title>Epic Backlog-{{ $organization->team_title }}</title>
@endif
@if ($type == 'unit')
<title>Epic Backlog-{{ $organization->business_name }}</title>
@endif

@if ($type == 'stream')
<title>Epic Backlog-{{ $organization->value_name }}</title>
@endif

@if ($type == 'org')
<title>Org-Epic Backlog</title>
@else
<title>Epic Backlog</title>
@endif

@section('content')
<div id="mainindexbacklog">
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
            <table class="table data-table example" id="olddata">
               <thead>
                  <tr>
                     <td class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                           <input class="form-check-input" type="checkbox" id="checkAll" />
                        </div>
                     </td>
                     <td class="min-w-125px">ID</td>
                     <td class="min-w-125px">Title</td>
                     <td class="min-w-125px">Start/End Date</td>
                     <td class="min-w-125px">Status</td>
                     <td class="min-w-125px">Progress</td>
                     <td class="text-end min-w-70px">Action</td>
                  </tr>
               </thead>
               <tbody class="boards" id="backlog-board">
                  @foreach ($Backlog as $backlog)
                  <tr id="backlog-{{ $backlog->id }}" class="draggable">
                     <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                           <input type="checkbox" class="form-check-input checkbox check" value="{{ $backlog->id }}">
                        </div>
                     </td>
                     <td class="">
                        <div class="epic_id mr-3 mt-1" style="display: flex;">
                           <span style="font-size:18px" class="material-symbols-outlined mr-1">key_visualizer</span>
                           OE-{{ $backlog->id }}
                        </div>
                     </td>
                     <td>
                        {{ $backlog->epic_title }}
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
                                             <input type="date" class="form-control" min="{{ date('Y-m-d') }}"
                                             name="start_date[]"
                                             @if ($backlog->epic_start_date) value="{{ $backlog->epic_start_date }}" @else value="{{ date('Y-m-d') }}" @endif
                                             required>
                                             <label for="start-date">Start Date</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-xl-6">
                                          <div class="form-group mb-0">
                                             <input type="date" class="form-control" min="{{ date('Y-m-d') }}"
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
                        {{  Cmf::date_format_new($backlog->epic_start_date) }}
                        - {{ Cmf::date_format_new($backlog->epic_end_date) }}
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
                     <td class="text-end">

                        <div class="action ml-0">
                           @if ($backlog->backlog_id == NULL)
                           <a href="{{url('dashboard/epicbacklog/clone/'.$backlog->id.'/'.$organization->type)}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                               <i class="ki-outline ki-copy fs-1 text-gray-500 me-n1"></i>
                           </a>
                           @else
                           <a href="{{url('dashboard/epicbacklog/clone/'.$backlog->backlog_id.'/'.$organization->type)}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                               <i class="ki-outline ki-copy fs-1 text-gray-500 me-n1"></i>
                           </a>
                           @endif
                           <button onclick="editbacklogepic({{ $backlog->id }} , 'team_backlog')" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                               <i class="ki-outline ki-pencil fs-1 text-gray-500 me-n1"></i>
                           </button>
                           <button data-toggle="modal" data-target="#delete{{ $backlog->id }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                               <i class="ki-outline ki-trash fs-1 text-gray-500 me-n1"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
                  <div class="modal fade" id="delete{{ $backlog->id }}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
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
                                 <div id="success-obj-delete"  role="alert"></div>
                                 <form method="POST" action="{{ url('delete-team-backlog') }}">
                                    @csrf
                                    <input type="hidden" name="delete_id" value="{{ $backlog->id }}">
                                      <div class="modal-body">
                                          <div class="text-center mb-13">
                                            <h1 class="mb-3" id="end-quartr">Delete Backlog</h1>
                                            <p>Are you sure you want to delete this Backlog?</p>
                                          </div>
                                      </div>
                                      <div class="text-center">
                                          <button type="submit" id="deleteobjectivebutton" class="btn btn-primary">Confirm</button>
                                      </div>
                                  </form>
                             </div>
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
<div class="card">
    <div class="card-body">
       <div class="text-center">
          <img src="{{ asset('public/epic-backlog.svg') }}" alt="" width="120" height="120" class="mw-100">
       </div>
       <div class="card-px text-center  pt-15 pb-15">
          <h2 class="fs-2x fw-bold mb-0">No Records Found</h2>
          <p class="text-gray-500 fs-4 fw-semibold py-7">Create your first Epic message by clicking the below button</p>
          <a  onclick="addnewbacklogepic()" href="javascript:void(0)" class="btn btn-primary er fs-6 px-8 py-4">Add an Epic Backlog</a>
       </div>
    </div>
 </div>
@endif
</div>
<div class="modal fade" id="assign-Teambacklog-epic" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
               
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
               <div class="text-center mb-13">
                 <h1 class="mb-3" id="end-quartr">Assign Backlog Epic</h1>
               </div>
            <form class="needs-validation" action="{{ url('assign-teambacklog-epic') }}" method="POST">
               @csrf
               <input type="hidden" name="backlog_id" id="backlog-id">
               <input type="hidden" name="team_type" value="{{ $organization->type }}">
               <div class="row">
                  @if ($organization->type == 'BU')
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Team</span>
                     </label>
                     <select class="form-control category form-control-solid" id="" name="stream_obj" required>
                        <option value="">Select Business Team</option>
                        <?php foreach(DB::table('unit_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                        <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                        <?php }  ?>
                     </select>
                  </div>
                  @endif
                  @if ($organization->type == 'VS')
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Team</span>
                     </label>
                     <select class="form-control category form-control-solid" id="" name="stream_obj" required>
                        <option value="">Select Value Team</option>
                        <?php foreach(DB::table('value_team')->where('org_id',$organization->org_id)->get() as $r){ ?>
                        <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                        <?php }  ?>
                     </select>
                  </div>
                  @endif
                  @if ($organization->type == 'org')
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Organization</span>
                     </label>
                     <select class="form-control category form-control-solid" id="" name="stream_obj" required>
                        <option value="">Select Organization</option>
                        <?php foreach(DB::table('organization')->where('id',$organization->id)->get() as $r){ ?>
                        <option value="{{ $r->id }}">{{ $r->organization_name }}</option>
                        <?php }  ?>
                     </select>
                  </div>
                  @endif
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Objective</span>
                     </label>
                     <select name="locstate" id="" onchange="getvaluekey(this.value)"
                           class="form-control obj form-control-solid" value="" required>
                     </select>
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Key Result</span>
                     </label>
                     <select name="lockey" id="" onchange="getvalueintit(this.value)"
                           class="form-control key form-control-solid" value="" required>
                     </select>
                  </div>
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose initiative</span>
                     </label>
                     <select name="locinit" id="" class="form-control init form-control-solid" value=""
                           required>
                     </select>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Start Date</span>
                        </label>
                        <input type="date" class="form-control form-control-solid"  name="start_date[]"
                           value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Start Date</span>
                        </label>
                        <input type="date" class="form-control form-control-solid" min="{{ date('Y-m-d') }}" name="end_date[]" required>
                     </div>
                  </div>
                  <div class="text-center pt-15">
                     <button type="submit" class="btn btn-primary">Assign Epics</button>
                 </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="create-jira-epic" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered mw-650px">
      <div class="modal-content rounded">
         <div class="modal-header pb-0 border-0 justify-content-end">
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal">
               <i class="ki-outline ki-cross fs-1"></i>
            </div>
         </div>
         <div class="modal-body py-10 px-lg-17">
            <div class="mb-13 text-center">
               <h1 class="mb-3">Download Epics from Jira</h1>
            </div>
            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
               @php
               $jira = DB::table('jira_setting')->where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->count();
               @endphp
               <form class="needs-validation" action="{{ url('assign-jira-epic') }}" method="POST">
                  @csrf
                  <input type="hidden" name="backlog_id" value="{{ $organization->id }}">
                  <input type="hidden" name="type" value="{{ $organization->type }}">
                  @if($jira > 0)
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Jira Connect</span>
                     </label>
                     <select class="form-control form-control-solid" onchange="get_jira_project(this.value)" id="JIRA"
                           name="jira_name" required>
                        <option value="">Select Jira Connect</option>
                        <?php foreach(DB::table('jira_setting')->where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->get() as $r){ ?>
                        <option value="{{ $r->id }}">{{ $r->jira_name }}</option>
                   
                        <?php }  ?>
                     </select>
                  </div>
                  @else
                  <div class="alert alert-danger mt-1 ml-3" role="alert">
                     Connect your Jira account in the settings. <a href="{{ route('settings.jirasettings') }}" class="alert-link">Click here</a>.
                  </div>
                  @endif
                  <div class="d-flex flex-column mb-7 fv-row">
                     <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                         <span class="required">Choose Jira Project</span>
                     </label>
                     <select class="form-control form-control-solid" onchange="c_jira(this.value)" id="jira-project"
                           name="jira_project" required>
                           <option value="">Select</option>
                     </select>
                  </div>
                  <div class="row" id="jita-data">
                  </div>
               </form>
            </div>
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
   function showdataintable() {
      var slug = '{{ $organization->slug }}';
      var type = '{{ $type }}';
      $.ajax({
         type: "POST",
         url: "{{ url('dashboard/epicbacklog/showdataintable') }}",
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: {
             id: slug,
             type: type,
         },
         success: function(res) {
             $('#mainindexbacklog').html(res)
         }
      });
   }
   function addnewbacklogepic() {
      var unit_id = "{{ $organization->id }}";
      var type = "{{$organization->type}}"; 
      $.ajax({
         type: "POST",
         url: "{{ url('dashboard/epicbacklog/addnewbacklogepic') }}",
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: {
             unit_id: unit_id,
             type: type,
         },
         success: function(res) {
             editbacklogepic(res)
         }
      });
   }
   function editbacklogepic(id) {
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
         },
         success: function(res) {
             $('#epic-backlog-modal-content').html(res);
             $('#edit-backlog-epic-modal-new').modal('show');
         }
      });
   }
   function showheaderbacklog(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epicbacklog/showheader') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
               id:id,
            },
            success: function(res) {
                $('.modalheaderforapend').html(res);
            },
            error: function(error) {
                
            }
        });
    }
    $(document).ready(function() {
        @if(isset($_GET['epicbacklog']))
            editbacklogepic("{{ $_GET['epicbacklog'] }}");
        @endif
        $("#edit-backlog-epic-modal-new").on('hidden.bs.modal', function(){
            deletenullobject('team_backlog');
           var new_url="{{ url()->current() }}";
           window.history.pushState("data","Title",new_url);
        });
    });
    function deletenullobject(type) {
    $.ajax({
        type: "POST",
        url: "{{ url('deletenullobject') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            type: type,
        },
        success: function(res) {
            
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
         'order':[],
           "columnDefs": [{
                   "orderable": false,
                   "targets": [0,6],
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

   $('.category').on('change', function() {
       var id = $(this).val();
       var type = "{{ $organization->type }}";
       if (id) {
           $.ajax({
               type: "GET",
               url: "{{ url('get-value-obj') }}",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data: {
                   id: id,
                   type: type,
               },
               success: function(res) {
   
                   if (res) {
                       $('.obj').empty();
                       $('.obj').append('<option hidden>Choose Objective</option>');
                       $.each(res, function(key, course) {
                           $('select[name="locstate"]').append('<option value="' + course
                               .id + '">' + course.objective_name + '</option>');
                       });
                   } else {
                       $('.obj').empty();
   
                   }
   
               }
           });
       } else {
           $('.init').empty();
           $('.key').empty();
           $('.obj').empty();
       }
   
   });
   
   
   
   function getvaluekey(id) {
   
       $.ajax({
           type: "GET",
           url: "{{ url('get-value-key') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               id: id,
           },
           success: function(res) {
   
               if (res) {
                   $('.key').empty();
                   $('.key').append('<option hidden>Choose Key Result</option>');
                   $.each(res, function(key, course) {
                       $('select[name="lockey"]').append('<option value="' + course.id + '">' +
                           course.key_name + '</option>');
                   });
               } else {
                   $('.key').empty();
               }
   
           }
       });
   
   }
   
   function getvalueintit(id) {
   
       $.ajax({
           type: "GET",
           url: "{{ url('get-value-init') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               id: id,
           },
           success: function(res) {
   
               if (res) {
                   $('.init').empty();
                   $('.init').append('<option hidden value="">Choose initiative</option>');
                   $.each(res, function(key, course) {
                       $('select[name="locinit"]').append('<option value="' + course.id + '">' +
                           course.initiative_name + '</option>');
                   });
               } else {
                   $('.init').empty();
               }
   
           }
       });
   
   }
   
   function assign_epic_unit(val) {
   
       var id = "{{ $organization->id }}";
   
       $.ajax({
           type: "GET",
           url: "{{ url('get-assign-epic-unit') }}",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               id: id,
               slug: slug,
               val: val
           },
           success: function(res) {
   
               $('#olddata').html(res);
   
   
           }
       });
   
   }
</script>
@endsection