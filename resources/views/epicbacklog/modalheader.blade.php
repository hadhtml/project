<div class="row positionrelative">
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header" id="create-epic" style="display: flex;">
            <span style="font-size:22px;margin-top: 4px;" class="material-symbols-outlined">key_visualizer</span>
            <span class="ml-2">@if($data->epic_title) {{ $data->epic_title }} @else Enter Epic Backlog Tittle @endif</span>
        </h5>
    </div>
    <div class="col-md-12 displayflex">
        <div class="epic_id mr-3 mt-1" style="display: flex;">
            <span style="font-size:18px" class="material-symbols-outlined mr-1">key_visualizer</span>
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
                <a style="width: 90px;" onclick="showmemberbox()" href="javascript:void(0)" class="epic-header-buttons epicheaderteambutton" id="showboardbutton">
                    <img src="{{url('public/assets/svg/profile-2user.svg')}}" width="20"> 1
                </a>
            </div>
        </div>
        @else
        <a href="javascript:void(0)" onclick="showmemberbox()" class="epic-header-buttons epicheaderteambutton" id="showboardbutton">
            <img src="{{url('public/assets/svg/btnteamsvg.svg')}}" width="20">Team
        </a>
        @endif
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
                    @if($data->type == 'unit')
                        @php
                            $teammember = DB::table('unit_team')->where('org_id',$data->unit_id)->where('type' , 'BU')->get();
                        @endphp
                        @foreach($teammember as $r)
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
                    @endif
                    @if($data->type == 'org')
                        @php
                            $teammember = DB::table('org_team')->where('org_id',$data->unit_id)->where('type' , 'orgT')->get();
                        @endphp
                        @foreach($teammember as $r)
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
                    @endif
                    @if($data->type == 'stream')
                        @php
                            $teammember = DB::table('value_team')->where('org_id',$data->unit_id)->where('type' , 'VS')->get();
                        @endphp
                        @foreach($teammember as $r)
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
                    @endif

                    @if($data->type == 'VS')
                    @php
                        $teammember = DB::table('value_team')->where('id',$data->unit_id)->where('type' , 'VS')->get();
                    @endphp
                    @foreach($teammember as $r)
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
                @endif

                @if($data->type == 'BU')
                @php
                    $teammember = DB::table('unit_team')->where('id',$data->unit_id)->where('type' , 'BU')->get();
                @endphp
                @foreach($teammember as $r)
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
            @endif
                    
                </div>
            </div>
        </div>
        <div class="epic-header-buttons raise-flag-button">
            <a onclick="rasiseflag({{$data->id}})" href="javascript:void(0)"  id="showboardbutton">
                <img src="{{url('public/assets/svg/btnflagsvg.svg')}}" width="20"> Flag @if(DB::table('flags')->where('epic_type' , 'backlog')->where('epic_id'  ,$data->id)->count() > 0) ({{ DB::table('flags')->where('epic_id'  ,$data->id)->count() }}) @endif
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
                        <form class="needs-validation saveepicflagheader" action="{{ url('dashboard/epicbacklog/saveepicflag') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="flag_epic_id">
                            <input type="hidden" value="{{ $data->unit_id }}" name="business_units">
                            <input type="hidden" value="{{ $data->type }}" name="board_type">
                            <div class="row">        
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="flag_type">Flag Type <small class="text-danger">*</small></label>
                                       <select required class="form-control" name="flag_type" id="flag_type" >
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
                                        <label for="flag_assignee">Assignee <small class="text-danger">*</small></label>
                                        <select required class="form-control" id="flag_assignee" name="flag_assign">
                                            <option value="">Select Assignee</option>
                                            @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                              <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                                 <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Title <small class="text-danger">*</small></label>
                                        <input required type="text" class="form-control"  name="flag_title" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Description</label>
                                        <textarea name="flag_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span onclick="rasiseflag()" class="btn btn-default btn-sm">Cancel</span>
                                    
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="saveepicflagbuttonheader btn btn-primary btn-sm">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="moverightside">
            <h1 class="epic-percentage">@if($data->progress){{ $data->progress }} % Completed @endif</h1>
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
$('.saveepicflagheader').on('submit',(function(e) {
    $('.saveepicflagbuttonheader').html('<i class="fa fa-spin fa-spinner"></i>');
    $(".saveepicflagbuttonheader" ).prop("disabled", true);
    e.preventDefault();
    var formData = new FormData(this);
    var cardid = $('#cardid').val();
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            $('.saveepicflagbuttonheader').html('<i class="fa fa-check"></i> Success');
            $(".saveepicflagbuttonheader" ).prop("disabled", false);
            $('.saveepicflagbuttonheader').css('background-color', 'green');
            showheaderbacklog('{{$data->id}}');
            if($('#modaltab').val() == 'flags')
            {
                showtabwithoutloader('{{$data->id}}' , 'flags');
            }   
        }
    });
}));
function changeepicstatus(status , id) {
$.ajax({
    type: "POST",
    url: "{{ url('dashboard/epicbacklog/changeepicstatus') }}",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        id: id,
        status: status,
    },
    success: function(res) {
        showheaderbacklog(id);
        showdataintable();
    },
    error: function(error) {
        
    }
});
}
function showmemberbox() {
    $('.memberadd-box').slideToggle();
}
function rasiseflag() {
    $('.raiseflag-box').slideToggle();
}
function selectteamforepic(id , epic_id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epicbacklog/selectteamforepic') }}",
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
<script type="text/javascript">
    var elements = document.querySelectorAll('.gixie');
    elements.forEach(function(element) {
        var itemId = element.getAttribute('data-item-id');
        var imageData = new GIXI(300).getImage(); 
        element.setAttribute('src', imageData);
    });
</script>