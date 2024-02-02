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
                     <td>
                        <label class="form-checkbox">
                        <input type="checkbox" id="checkAll">
                        <span class="checkbox-label"></span>
                        </label>
                     </td>
                     <td>ID</td>
                     <td>Title</td>
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
                        <div class="epic_id mr-3 mt-1" style="display: flex;">
                           <span style="font-size:18px" class="material-symbols-outlined mr-1">key_visualizer</span>
                           EB-{{ $backlog->id }}
                        </div>
                     </td>
                     <td class="draggable">
                        {{ $backlog->epic_title }}
                     </td>
                     <!-- <td>
                        @if ($backlog->assign_status == null)
                        Assign
                        <img src="{{ url('public/assets/svg/asignteam.svg') }}" data-toggle="modal"  data-target="#assign-unitbacklog-epic{{ $backlog->id }}">
                        @endif
                     </td> -->
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
                                             @if ($backlog->epic_start_date) value="{{ $backlog->epic_start_date }}" @else value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" @endif
                                             required>
                                             <label for="start-date">Start Date</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-xl-6">
                                          <div class="form-group mb-0">
                                             <input type="date" class="form-control"
                                             name="end_date[]"
                                             @if ($backlog->epic_end_date) value="{{ $backlog->epic_end_date }}" @else value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" @endif
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
                     <td>
                        <button class="btn-circle btn-tolbar" onclick="editbacklogepic({{ $backlog->id }} , 'team_backlog')">
                           <span class="material-symbols-outlined" data-toggle="tooltip" data-placement="top" data-original-title="Edit" style="font-size: 18px;"> edit </span>
                        </button>
                        <button class="btn-circle btn-tolbar" data-toggle="modal" data-target="#delete{{ $backlog->id }}">
                           <span class="material-symbols-outlined" data-toggle="tooltip" data-placement="top" data-original-title="Delete" style="font-size: 18px;"> delete </span>
                        </button>
                        @if ($backlog->backlog_id == NULL)
                        <button class="btn-circle btn-tolbar">
                           <a href="{{url('dashboard/epicbacklog/clone/'.$backlog->id.'/'.$organization->type)}}" class="material-symbols-outlined" data-toggle="tooltip" data-placement="top" data-original-title="Clone" style="font-size: 18px;text-decoration: none;color: #3e413e;"> cyclone </a>
                        </button>
                        @else
                        <button class="btn-circle btn-tolbar">
                           <a href="{{url('dashboard/epicbacklog/clone/'.$backlog->backlog_id.'/'.$organization->type)}}" class="material-symbols-outlined" data-toggle="tooltip" data-placement="top" data-original-title="Clone" style="font-size: 18px;text-decoration: none;color: #3e413e;"> cyclone </a>
                        </button>
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
                                          <input type="date" class="form-control"  name="epic_start_date" value="{{$backlog->epic_start_date}}" min="{{ date('Y-m-d') }}">
                                          <label for="start-date">Start Date</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <input type="date" class="form-control"  name="epic_end_date" value="{{$backlog->epic_end_date}}" min="{{ date('Y-m-d') }}">
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
   <button class="btn btn-primary btn-lg btn-theme btn-block ripple ml-25" onclick="addnewbacklogepic()" style="width:50%">
   Add an Epic
   </button>
</div>
@endif
<script type="text/javascript">
   $(document).ready(function() {
      var table = $('.example').DataTable({
         'order':[],
           "columnDefs": [{
                   "orderable": false,
                   "targets": [0,6],
               } // Disable ordering for the first and third columns
           ]
       });
    });
       
</script>