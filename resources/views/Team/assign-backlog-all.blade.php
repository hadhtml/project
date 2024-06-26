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
    </tbody>
 </table>

<script type="text/javascript">
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
</script>