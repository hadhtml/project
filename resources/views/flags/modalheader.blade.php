<div class="row positionrelative">

    @if($data->archived == 1)
    <div class="col-md-12">
        <h5 class="modal-title newmodaltittle marginleftthirty" id="create-epic">
            <img src="{{ url('public/assets/svg/traffic-cone-svgrepo-com.svg') }}">
        @if($data->flag_title) {{ $data->flag_title }} @else Enter Tittle @endif</h5>
    </div>
    <div class="col-md-12 marginleftthirty newmodalsubtittle">
        <p class="text-danger">This card has been archived, to un archive <a onclick="unarchiveflag({{$data->id}})" href="javascript:void(0)">Click here</a>.</p>
    </div>
    @else
    <div class="col-md-12 mb-5">
        <h5 class="modal-title newmodaltittle epic-tittle-header marginleftthirty" id="create-epic">
            <img src="{{ url('public/assets/svg/traffic-cone-svgrepo-com.svg') }}">@if($data->flag_title) {{ $data->flag_title }} @else Enter Tittle @endif
        </h5>
    </div>
    @endif
    <div class="col-md-12 displayflex">
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
                    $totalmember = DB::table('flag_members')->where('flag_id' , $data->id)->count();
                @endphp
                @foreach(DB::table('flag_members')->where('flag_id' , $data->id)->orderby('id' , 'desc')->limit(3)->get() as $r)
                @php
                    $member = DB::table('members')->where('id' , $r->member_id)->first();
                @endphp
                <div class="member-list-image membermargenles">
                    @if($member->image)
                    <img data-toggle="tooltip" title="" data-original-title="{{ $member->name }} {{ $member->last_name }}" src="{{ url('public/assets/images') }}/{{ $member->image }}">
                    @else
                    <img data-toggle="tooltip" title="" data-original-title="{{ $member->name }} {{ $member->last_name }}"  src="{{ Avatar::create($member->name.' '.$member->last_name)->toBase64() }}" alt="{{ $member->name }}" title="{{ $member->name }} {{ $member->last_name }}">
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
                <div class="memberadd-box" @if(isset($memberopen)) style="display:block;" @endif>
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
                        <div class="col-md-12 memberprofile" onclick="savemember({{$r->id}} , {{$data->id}})">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="memberprofileimage">
                                        @if($r->image)
                                        <img src="{{ url('public/assets/images') }}/{{ $r->image }}">
                                        @else
                                        <img src="{{ Avatar::create($r->name)->toBase64() }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="membername">{{ $r->name }} {{ $r->last_name }}</div>
                                    <div class="memberdetail">{{ DB::table('users')->where('id' , $r->user_id)->first()->role }}</div>
                                </div>
                                <div class="col-md-2 text-center mt-3">
                                    @if(DB::table('flag_members')->where('flag_id' , $data->id)->where('member_id' , $r->id)->count() > 0)
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
<div class="rightside" >
    <span onclick="maximizemodal()">
        <span class="material-symbols-outlined">open_in_full</span>
    </span>
    <img data-dismiss="modal" class="closeimage" aria-label="Close" src="{{url('public/assets/svg/cross.svg')}}">
</div>
<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>