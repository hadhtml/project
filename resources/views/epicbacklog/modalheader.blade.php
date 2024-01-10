<div class="row positionrelative">
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
            <img src="{{ url('public/assets/svg/epicheaderheader.svg') }}">@if($data->epic_title) {{ $data->epic_title }} @else Enter Epic Backlog Tittle @endif
        </h5>
    </div>
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
                url: "{{ url('dashboard/epicbacklog/changeepicdate') }}",
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
                        editbacklogepic('{{ $data->id }}','{{ $table }}');
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
                    @if($data->type == 'unit')
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
                    @if($data->type == 'org')
                        @foreach(DB::table('org_team')->where('org_id',$data->unit_id)->where('type' , 'orgT')->get() as $r)
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
                    @if($data->type == 'stream')
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
        <div class="moverightside">
            <h1 class="epic-percentage">@if($data->progress){{ $data->progress }} % Completed @endif</h1>
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
function changeepicstatus(status , id) {
var table = '{{ $table }}';
$.ajax({
    type: "POST",
    url: "{{ url('dashboard/epicbacklog/changeepicstatus') }}",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        table:table,
        id: id,
        status: status,
    },
    success: function(res) {
        showheaderbacklog(id , table);
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
function maximizemodal() {
    $('#modaldialog').toggleClass('modalfullscreen')
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