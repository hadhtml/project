<div class="row positionrelative">
    <div class="col-md-12 mb-2">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
            <img src="{{ url('public/assets/svg/epicheaderheader.svg') }}">@if($data->epic_name) {{ $data->epic_name }} @else Enter Epic Tittle @endif
        </h5>
    </div>
    <div class="col-md-12 displayflex">
        <div class="epic_id mr-3 mt-1">
            OE-{{ $data->id }}
        </div>
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
        @if($data->team_id)
        <div class="members-list">
            <div id="members">
                <a style="width: 58px;" onclick="showmemberbox()" href="javascript:void(0)" class="epic-header-buttons epicheaderteambutton" id="showboardbutton">
                    <img src="{{url('public/assets/svg/profile-2user.svg')}}" width="20"> 1
                </a>
            </div>
        </div>
        @else
        <a href="javascript:void(0)" onclick="showmemberbox()" class="epic-header-buttons epicheaderteambutton" id="showboardbutton">
            <img src="{{url('public/assets/svg/btnteamsvg.svg')}}" width="20"> {{ Cmf::getmodulename('level_three') }}
        </a>
        @endif
        @if($data->epic_type == 'unit' || $data->epic_type == 'stream' || $data->epic_type == 'org')
        <div class="memberlistposition">
            <div class="memberadd-box team-select-box hidepopupall">
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
                        @if(DB::table('unit_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'BU')->count() > 0)
                            @foreach(DB::table('unit_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'BU')->get() as $r)
                                <div class="col-md-12 memberprofile memberprofilecontroleight" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="memberprofileimage">
                                                <img class="gixie" data-item-id="{{ $r->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="membername">{{ $r->team_title }}</div>
                                            <div class="memberdetail">Lead: {{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                        </div>
                                        <div class="col-md-2 text-center mt-3">
                                            @if($data->team_id == $r->id)
                                            <span class="material-symbols-outlined">cancel</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="position: absolute; left: 25%; top: 50%; ">No team Available</div>
                        @endif
                    @endif
                    @if($data->epic_type == 'org')
                        @if(DB::table('org_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'orgT')->count() > 0)
                            @foreach(DB::table('org_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'orgT')->get() as $r)
                                <div class="col-md-12 memberprofile memberprofilecontroleight" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="memberprofileimage">
                                                <img class="gixie" data-item-id="{{ $r->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="membername">{{ $r->team_title }}</div>
                                            <div class="memberdetail">Lead: {{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                        </div>
                                        <div class="col-md-2 text-center mt-3">
                                            @if($data->team_id == $r->id)
                                            <span class="material-symbols-outlined">cancel</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="position: absolute; left: 25%; top: 50%; ">No team Available</div>
                        @endif
                    @endif
                    @if($data->epic_type == 'stream')
                        @if(DB::table('value_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'VS')->count() > 0)
                            @foreach(DB::table('value_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'VS')->get() as $r)
                                <div class="col-md-12 memberprofile memberprofilecontroleight" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="memberprofileimage">
                                                {{-- <img src="{{ Avatar::create($r->team_title)->toBase64() }}"> --}}
                                                <img class="gixie" data-item-id="{{ $r->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="membername">{{ $r->team_title }}</div>
                                            <div class="memberdetail">Lead: {{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                        </div>
                                        <div class="col-md-2 text-center mt-3">
                                            @if($data->team_id == $r->id)
                                                <span class="material-symbols-outlined">cancel</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="position: absolute; left: 25%; top: 50%; ">No team Available</div>
                        @endif
                    @endif
                    @if($data->epic_type == 'stream')
                        @foreach(DB::table('value_team')->where('org_id',$data->buisness_unit_id)->where('type' , 'VS')->get() as $r)
                            {{-- <div class="col-md-12 memberprofile memberprofilecontroleight" onclick="selectteamforepic({{$r->id}} , {{$data->id}})">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="memberprofileimage">
                                            <img src="{{ Avatar::create($r->team_title)->toBase64() }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="membername">{{ $r->team_title }}</div>
                                        <div class="memberdetail">{{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
                                    </div>
                                    <div class="col-md-2 text-center mt-3">
                                        @if($data->team_id == $r->id)
                                        <img class="tickimage" src="{{ url('public/assets/svg/smalltick.svg') }}">
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-between">
            <div class="epic-header-buttons raise-flag-button">
            <a onclick="rasiseflag({{$data->id}})" href="javascript:void(0)"  id="showboardbutton">
                <img src="{{url('public/assets/svg/btnflagsvg.svg')}}" width="20"> Flag @if(DB::table('flags')->where('epic_id'  ,$data->id)->count() > 0) ({{ DB::table('flags')->where('epic_id'  ,$data->id)->count() }}) @endif
            </a>
            <div class="raiseflag-box hidepopupall">
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
</div>
<div class="rightside" >
    <span onclick="maximizemodal()" id="open_in_full">
        <span class="material-symbols-outlined">open_in_full</span>
    </span>
    <span onclick="maximizemodal()" class="d-none" id="close_fullscreen">
        <span class="material-symbols-outlined">close_fullscreen</span>
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
            showepicincard();
        },
        error: function(error) {
            
        }
    });
}
function showepicincard() {
    var epic_id = '{{ $data->id }}';
    var org_id = '{{ $data->buisness_unit_id }}';
    var org_type = '{{ $data->epic_type }}';
    var key_id = '{{ $data->key_id }}';
    var objective_id = '{{ $data->obj_id }}';
    var initiative_id = '{{ $data->initiative_id }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epics/showepicincard') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            epic_id:epic_id,
        },
        success: function(res) {
            $('#epic-'+epic_id+'-'+org_type+'-'+org_id+'-'+objective_id+'-'+key_id+'-'+initiative_id+'').html(res)
        },
        error: function(error) {
            
        }
    });
}
</script>
<script type="text/javascript">
    var elements = document.querySelectorAll('.gixie');
    elements.forEach(function(element) {
        var itemId = element.getAttribute('data-item-id');
        var imageData = new GIXI(300).getImage(); 
        element.setAttribute('src', imageData);
    });
</script>