<div class="row positionrelative">
    <div class="col-md-10">
        @if($data->archived == 1)
            @php
                $flagtittle = DB::table('flags')->where('id'  , Cmf::gerescalatedmainid($data->id))->first();
            @endphp
            <h5 class="modal-title newmodaltittle epic-tittle-header pb-5 d-flex" id="create-epic">
                @if($flagtittle->flag_type == 'Impediment')
                <span style="font-size:22px;" class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtittle->flag_type == 'Risk')
                <span style="font-size:22px;" class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtittle->flag_type == 'Blocker')
                <span style="font-size:22px;" class="material-symbols-outlined">block</span>
                @endif
                @if($flagtittle->flag_type == 'Action')
                <span style="font-size:22px;" class="material-symbols-outlined">call_to_action</span>
                @endif
                @if($flagtittle->flag_title) {{ $flagtittle->flag_title }} @else Enter Tittle @endif
            </h5>
            <p class="text-danger">This card has been archived, to un archive <a onclick="unarchiveflag({{$data->id}})" href="javascript:void(0)">Click here</a>.</p>
        @else
            @php
                $flagtittle = DB::table('flags')->where('id'  , Cmf::gerescalatedmainid($data->id))->first();
            @endphp
            <h5 class="modal-title newmodaltittle epic-tittle-header pb-5 d-flex" id="create-epic">
                @if($flagtittle->flag_type == 'Impediment')
                <span style="font-size:22px;" class="material-symbols-outlined">warning_off</span>
                @endif
                @if($flagtittle->flag_type == 'Risk')
                <span style="font-size:22px;" class="material-symbols-outlined">emergency</span>
                @endif
                @if($flagtittle->flag_type == 'Blocker')
                <span style="font-size:22px;" class="material-symbols-outlined">block</span>
                @endif
                @if($flagtittle->flag_type == 'Action')
                <span style="font-size:22px;" class="material-symbols-outlined">call_to_action</span>
                @endif
                @if($flagtittle->flag_title) {{ $flagtittle->flag_title }} @else Enter Tittle @endif
            </h5>
        @endif
        <div class="d-flex">
            <div class="btn-group">
                <button type="button" class="btn btn-default statuschangebutton @if($data->flag_status == 'todoflag') todo-button-color @endif @if($data->flag_status == 'inprogress') inprogress-button-color @endif @if($data->flag_status == 'doneflag') done-button-color @endif" id="showboardbutton">
                    @if($data->flag_status == 'todoflag')
                        To Do
                    @endif
                    @if($data->flag_status == 'inprogress')
                        In Progress
                    @endif
                    @if($data->flag_status == 'doneflag')
                        Done
                    @endif
                </button>
                <button type="button" class="@if($data->flag_status == 'todoflag') todo-button-color @endif @if($data->flag_status == 'inprogress') inprogress-button-color @endif @if($data->flag_status == 'doneflag') done-button-color @endif statuschangebuttonarrow btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    @if($data->flag_status == 'todoflag')
                        <a class="dropdown-item" onclick="changeflagstatus('inprogress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                        <a class="dropdown-item" onclick="changeflagstatus('doneflag',{{$data->id}})" href="javascript:void(0)">Done</a>
                    @endif
                    @if($data->flag_status == 'inprogress')
                        <a class="dropdown-item" onclick="changeflagstatus('todoflag',{{$data->id}})" href="javascript:void(0)">To Do</a>
                        <a class="dropdown-item" onclick="changeflagstatus('doneflag',{{$data->id}})" href="javascript:void(0)">Done</a>
                    @endif
                    @if($data->flag_status == 'doneflag')
                        <a class="dropdown-item" onclick="changeflagstatus('todoflag',{{$data->id}})" href="javascript:void(0)">To Do</a>
                        <a class="dropdown-item" onclick="changeflagstatus('inprogress',{{$data->id}})" href="javascript:void(0)">In Progress</a>
                    @endif
                </div>
            </div>
            <div class="members-list">
                <div id="members">
                    @php
                        $totalmember = DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($data->id))->count();
                    @endphp
                    @foreach(DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($data->id))->orderby('id' , 'desc')->limit(3)->get() as $r)
                    @php
                        $member = DB::table('members')->where('id' , $r->member_id)->first();
                    @endphp
                    <div class="member-list-image membermargenles">
                        @if($member->image)
                        <div class="positionrelative">
                            <img onclick="showmemberprofile({{ $member->id }})" data-toggle="tooltip" title="" data-original-title="{{ $member->name }} {{ $member->last_name }}" src="{{ url('public/assets/images') }}/{{ $member->image }}">
                            <div class="profilepopup hidepopupall" id="profilepopup{{ $member->id }}">
                                <div class="profilepopupheader">
                                    <div class="profilepopupbackground">
                                        <p>{{ $member->name }} {{ $member->last_name }}</p>
                                    </div>
                                    <div class="profilepopupimage">
                                        <img src="{{ Avatar::create($member->name.' '.$member->last_name)->toBase64() }}" alt="{{ $member->name }}">
                                    </div>
                                </div>
                                <div class="profilepopuplinks">
                                    <div class="removelink">
                                        <a onclick="removefromflag({{ $member->id }})" href="javascript:void(0)">Remove From Flag</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="positionrelative">
                            <img onclick="showmemberprofile({{ $member->id }})" data-toggle="tooltip" title="" data-original-title="{{ $member->name }} {{ $member->last_name }}"  src="{{ Avatar::create($member->name.' '.$member->last_name)->toBase64() }}" alt="{{ $member->name }}" title="{{ $member->name }} {{ $member->last_name }}">
                            <div class="profilepopup hidepopupall" id="profilepopup{{ $member->id }}">
                                <div class="profilepopupheader">
                                    <div class="profilepopupbackground">
                                        <p>{{ $member->name }} {{ $member->last_name }}</p>
                                    </div>
                                    <div class="profilepopupimage">
                                        <img src="{{ Avatar::create($member->name.' '.$member->last_name)->toBase64() }}" alt="{{ $member->name }}">
                                    </div>
                                </div>
                                <div class="profilepopuplinks">
                                    <div class="removelink">
                                        <a onclick="removefromflag({{ $member->id }})" href="javascript:void(0)">Remove From Flag</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @if($totalmember > 3)
                     <div onclick="showmemberbox()" class="symbol symbol-30  symbol-circle symbol-light membermorethenthree" data-toggle="tooltip" title="" data-original-title="More Assignee">
                         <span class="symbol-label">{{$totalmember}}+</span>
                     </div>
                     @endif
                </div>
                <div class="member-list-image memberlistposition">
                    <img data-toggle="tooltip" title="" data-original-title="Add New Assignee" onclick="showmemberbox()" src="{{url('public/assets/svg/plussmember.svg')}}">
                    <div class="memberadd-box hidepopupall member-add-box-flag-height" @if(isset($memberopen)) style="display:block;" @endif>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Assignee</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <img onclick="showmemberbox()" class="memberclose" src="{{url('public/assets/svg/memberclose.svg')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2 positionrelative">
                                    <input onkeyup="searchmember(this.value)" type="text" placeholder="Search Assignee" class="form-control" name="flag_title" id="objective-name" required>
                                    <div class="membersearchiconforinput">
                                        <img src="{{ url('public/assets/images/searchiconsvg.svg') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="memberstoshow">
                            @foreach(DB::table('members')->where('org_user' , Auth::id())->limit(8)->get() as $r)
                            <div class="col-md-12 memberprofile" onclick="savemember({{$r->id}} , {{Cmf::gerescalatedmainid($data->id)}})">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="memberprofileimage">
                                            @if($r->image)
                                            <img src="{{ url('public/assets/images') }}/{{ $r->image }}">
                                            @else
                                            <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="membername">{{ $r->name }} {{ $r->last_name }}</div>
                                        <div class="memberdetail">{{ DB::table('users')->where('id' , $r->user_id)->first()->role }}</div>
                                    </div>
                                    <div class="col-md-2 text-center mt-3">
                                        @if(DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($data->id))->where('member_id' , $r->id)->count() > 0)
                                        <img class="tickimage" src="{{ url('public/assets/svg/smalltick.svg') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 text-right">
        <div class="action ml-0">
            <button onclick="maximizemodal()" id="open_in_full" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                <span class="material-symbols-outlined">open_in_full</span>
            </button>
            <button onclick="maximizemodal()" id="close_fullscreen" class="d-none btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                <span class="material-symbols-outlined">close_fullscreen</span>
            </button>
            <button data-bs-dismiss="modal" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>
        <!-- <div class="epic_id mr-3 mt-1" style="display: flex;">
            @if($data->flag_type == 'Impediment')
            <span style="font-size:18px" class="material-symbols-outlined mr-1">warning_off</span>
            IM-{{ $data->id }}
            @endif
            @if($data->flag_type == 'Risk')
            <span style="font-size:18px" class="material-symbols-outlined mr-1">emergency</span>
            RI-{{ $data->id }}
            @endif
            @if($data->flag_type == 'Blocker')
            <span style="font-size:18px" class="material-symbols-outlined mr-1">block</span>
            BL-{{ $data->id }}
            @endif
            @if($data->flag_type == 'Action')
            <span style="font-size:18px" class="material-symbols-outlined mr-1">call_to_action</span>
            AC-{{ $data->id }}
            @endif
        </div> -->
</div>
<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    function showmemberprofile(id) {
        $('#profilepopup'+id).slideToggle();
    }
    function removefromflag(id) {
        var flag_id = '{{ Cmf::gerescalatedmainid($data->id) }}';
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/flags/removefromflag') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                flag_id:flag_id,
            },
            success: function(res) {
               $('.modalheaderforapend').html(res);
                viewboards($('#viewboards').val());
            },
            error: function(error) {
                
            }
        });
    }
</script>