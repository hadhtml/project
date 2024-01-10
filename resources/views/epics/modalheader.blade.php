<div class="row positionrelative">
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
            <img src="{{ url('public/assets/svg/epicheaderheader.svg') }}">@if($data->epic_name) {{ $data->epic_name }} @else Enter Epic Tittle @endif
        </h5>
    </div>
    <!-- <div class="col-md-12 marginleftthirty newmodalsubtittle">
        <p>{{ DB::table('objectives')->where('id' , $data->obj_id)->first()->objective_name }}/{{ DB::table('key_result')->where('id' , $data->key_id)->first()->key_name }}/{{ DB::table('initiative')->where('id' , $data->initiative_id)->first()->initiative_name }}</p>    
    </div> -->
    <div class="col-md-12 displayflex">
        <div class="btn-group epicheaderborderleft">
            <button type="button" class="btn btn-default statuschangebutton @if($data->epic_status == 'To Do') todo-button-color @endif @if($data->epic_status == 'In progress') inprogress-button-color @endif @if($data->epic_status == 'Done') done-button-color @endif" id="showboardbutton">
                @if($data->epic_status == 'To Do')
                    To Do
                @endif
                @if($data->epic_status == 'In progress')
                    In Progress
                @endif
                @if($data->epic_status == 'Done')
                    Done
                @endif
            </button>
            <button type="button" class="@if($data->epic_status == 'To Do') todo-button-color @endif @if($data->epic_status == 'In progress') inprogress-button-color @endif @if($data->epic_status == 'Done') done-button-color @endif statuschangebuttonarrow btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">         
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                @if($data->epic_status == 'To Do')
                    <a class="dropdown-item" onclick="changeepicstatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                    <a class="dropdown-item" onclick="changeepicstatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->epic_status == 'In progress')
                    <a class="dropdown-item" onclick="changeepicstatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changeepicstatus('Done',{{$data->id}})" href="javascript:void(0)">Done</a>
                @endif
                @if($data->epic_status == 'Done')
                    <a class="dropdown-item" onclick="changeepicstatus('To Do',{{$data->id}})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="changeepicstatus('In progress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                @endif
            </div>
        </div>
        @if($data->epic_start_date)
        <a href="javascript:void(0)" class="epic-datepicker" id="showboardbutton">
            <img src="{{url('public/assets/svg/note-text.svg')}}" width="20">
            <input readonly type="text" name="daterange" value="{{ date('m/d/Y', strtotime($data->epic_start_date)) }} - {{ date('m/d/Y', strtotime($data->epic_end_date)) }}" />
        </a>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'right'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $.ajax({
                type: "POST",
                url: "{{ url('dashboard/epics/changeepicdate') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    epic_id:'{{ $data->id }}',
                    start:start.format('YYYY-MM-DD'),
                    end:end.format('YYYY-MM-DD'),
                },
                success: function(res) {
                    var modaltab = $('#modaltab').val();
                    if(modaltab == 'general')
                    {
                        editepic('{{ $data->id }}');
                    }
                },
                error: function(error) {
                    
                }
            });
          });
        });
        </script>
        @endif
        @if($data->team_id)
        <div class="members-list">
            <div id="members">
                <a onclick="showmemberbox()" href="javascript:void(0)" class="epic-header-buttons" id="showboardbutton">
                    <img src="{{url('public/assets/svg/profile-2user.svg')}}" width="20"> 1
                </a>
            </div>
        </div>
        @else
        <a href="javascript:void(0)" onclick="showmemberbox()" class="epic-header-buttons" id="showboardbutton">
            <img src="{{url('public/assets/svg/btnteamsvg.svg')}}" width="20">Team
        </a>
        @endif
        <div class="memberlistposition">
            <div class="memberadd-box team-select-box">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h4>Select Team</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <img onclick="showmemberbox()" class="memberclose" src="{{url('public/assets/svg/memberclose.svg')}}">
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2 positionrelative">
                            <input onkeyup="searchteam(this.value)" type="text" placeholder="Search Team" class="form-control" name="flag_title" id="objective-name" required>
                            <div class="membersearchiconforinput">
                                <img src="{{ url('public/assets/images/searchiconsvg.svg') }}">
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row" id="memberstoshow">
                    @if($data->epic_type == 'unit')
                        @foreach(DB::table('unit_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'BU')->get() as $r)
                            <div class="col-md-12 memberprofile" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="memberprofileimage">
                                            <img src="{{ Avatar::create($r->team_title)->toBase64() }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="membername">{{ $r->team_title }}</div>
                                        <div class="memberdetail">Team Leader: {{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                    </div>
                                    <div class="col-md-2 text-center mt-3">
                                        @if($data->team_id == $r->id)
                                        <img class="tickimage" src="{{ url('public/assets/svg/smalltick.svg') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if($data->epic_type == 'org')
                        @foreach(DB::table('org_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'orgT')->get() as $r)
                            <div class="col-md-12 memberprofile" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="memberprofileimage">
                                            <img src="{{ Avatar::create($r->team_title)->toBase64() }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="membername">{{ $r->team_title }}</div>
                                        <div class="memberdetail">Team Leader: {{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                    </div>
                                    <div class="col-md-2 text-center mt-3">
                                        @if($data->team_id == $r->id)
                                        <img class="tickimage" src="{{ url('public/assets/svg/smalltick.svg') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if($data->epic_type == 'stream')
                        @foreach(DB::table('value_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'VS')->get() as $r)
                            <div class="col-md-12 memberprofile" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="memberprofileimage">
                                            <img src="{{ Avatar::create($r->team_title)->toBase64() }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="membername">{{ $r->team_title }}</div>
                                        <div class="memberdetail">Team Leader: {{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                    </div>
                                    <div class="col-md-2 text-center mt-3">
                                        @if($data->team_id == $r->id)
                                        <img class="tickimage" src="{{ url('public/assets/svg/smalltick.svg') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="epic-header-buttons raise-flag-button">

            <a onclick="rasiseflag({{$data->id}})" href="javascript:void(0)"  id="showboardbutton">
                <img src="{{url('public/assets/svg/btnflagsvg.svg')}}" width="20"> Flag @if(DB::table('flags')->where('epic_id'  ,$data->id)->count() > 0) ({{ DB::table('flags')->where('epic_id'  ,$data->id)->count() }}) @endif
            </a>
            <div class="raiseflag-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Flag</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <img onclick="rasiseflag()" class="memberclose" src="{{url('public/assets/svg/memberclose.svg')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="needs-validation" action="#" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" id="flag_epic_id">
                            <input type="hidden" value="{{ $data->initiative_id }}" id="flag_ini_epic_id">
                            <input type="hidden" value="{{ $data->obj_id }}" id="flag_epic_obj">
                            <input type="hidden" value="{{ $data->key_id }}" id="flag_epic_key">
                            <input type="hidden" value="{{ $data->buisness_unit_id }}" id="buisness_unit_id">
                            <input type="hidden" value="{{ $data->epic_type }}" id="board_type">
                            <input type="hidden" value="{{ $data->epic_status }}" id="epic_status">
                            <div class="row">        
                                  <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Flag Type <small class="text-danger">*</small></label>
                                       <select class="form-control" id="flag_type" >
                                           <option value="">Select Type</option>
                                           <option value="Risk">Risk</option>
                                           <option value="Impediment">Impediment</option>
                                           <option value="Blocker">Blocker</option>
                                           <option value="Action">Action</option>
                                       </select>
                                        
                                    </div>
                                </div>
                                 <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="lead-manager">Assignee <small class="text-danger">*</small></label>
                                        <select class="form-control" id="flag_assign">
                                            <option value="">Select Assignee </option>
                                            @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                              <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                                 <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Title <small class="text-danger">*</small></label>
                                        <input required type="text" class="form-control"  id="flag_title" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Description</label>
                                        <textarea id="flag_description" class="form-control"></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button id="updateflagmodalbuton" class="btn btn-primary btn-lg btn-theme btn-block ripple mt-3" onclick="updateepicflag();"  type="button">Add Flag</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       

        <div class="moverightside">
            <h1 class="epic-percentage">{{ $data->epic_progress }} % Completed</h1>
        </div>
    </div>
</div>
<div class="rightside" >
    <span onclick="maximizemodal()">
        <img  src="{{url('public/assets/svg/maximize.svg')}}">
    </span>
    <img data-dismiss="modal" class="closeimage" aria-label="Close" src="{{url('public/assets/svg/cross.svg')}}">
</div>
<script type="text/javascript">
function showmemberbox() {
    $('.memberadd-box').slideToggle();
}
function rasiseflag() {
    $('.raiseflag-box').slideToggle();
}
function maximizemodal() {
    $('#modaldialogepic').toggleClass('modalfullscreen')
    $('#edit-epic-modal-new').css('padding-right' , '0px')
}
function selectteamforepic(id , epic_id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epics/selectteamforepic') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            epic_id:epic_id,
        },
        success: function(res) {
            $('#memberstoshow').html(res);
            if($('#modaltab').val() == 'teams')
            {
                showtabwithoutloader(epic_id , 'teams');    
            }
        },
        error: function(error) {
            
        }
    });
}
</script>