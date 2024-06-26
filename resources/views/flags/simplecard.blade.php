<div class="card-body ui-state-default" id="{{ $r->id }}">
    <div class="d-flex flex-column">
        <div class="d-flex flex-row" onclick="editflag({{$r->id}})">
            <div class="d-flex flex-row mb-2 align-items-center">
                @php
                    $flagtittle = DB::table('flags')->where('id'  , Cmf::gerescalatedmainid($r->id))->first();
                @endphp
                @if($flagtittle->epic_id)
                <div class="epic_id" data-toggle="tooltip"
                            data-placement="top" data-original-title="Epic ID">
                    <img src="{{ url('public/assets/svg/arrow.svg') }}">
                     OE-{{ $r->epic_id }}
                </div>
                @endif
                <div class="epic_id d-flex align-items-center mr-2" data-toggle="tooltip"
                            data-placement="top" data-original-title="Flag ID">
                    @if($r->flag_type == 'Impediment')
                    <span style="font-size:18px" class="material-symbols-outlined">warning_off</span>
                    IM-{{ $r->id }}
                    @endif
                    @if($r->flag_type == 'Risk')
                    <span style="font-size:22px" class="material-symbols-outlined">emergency</span>
                    RI-{{ $r->id }}
                    @endif
                    @if($r->flag_type == 'Blocker')
                    <span style="font-size:22px" class="material-symbols-outlined">block</span>
                    BL-{{ $r->id }}
                    @endif
                    @if($r->flag_type == 'Action')
                    <span style="font-size:22px" class="material-symbols-outlined">call_to_action</span>
                    AC-{{ $r->id }}
                    @endif
                </div>

                <div class="epic_id d-flex align-items-center mr-2" data-toggle="tooltip" data-placement="top" data-original-title="Owner">
                    @if($r->board_type == 'VS')
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">groups</span> {{ DB::table('value_team')->where('id' , $r->business_units)->first()->team_title }}
                    @endif
                    @if($r->board_type == 'stream')
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">layers</span> {{ DB::table('value_stream')->where('id' , $r->business_units)->first()->value_name }}
                    @endif
                    @if($r->board_type == 'unit')
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">domain</span> {{ DB::table('business_units')->where('id' , $r->business_units)->first()->business_name }}
                    @endif
                    @if($r->board_type == 'BU')
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">groups</span> {{ DB::table('unit_team')->where('id' , $r->business_units)->first()->team_title }}
                    @endif
                    @if($r->board_type == 'org')
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">auto_stories</span> {{ DB::table('organization')->where('id' , $r->business_units)->first()->organization_name }}
                    @endif
                    @if($r->board_type == 'orgT')
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">groups</span> {{ DB::table('org_team')->where('id' , $r->business_units)->first()->team_title }}
                    @endif
                </div>

                @php
                $check_escalate = DB::table('escalate_cards')->where('flag_id' , $r->id)
                @endphp
                @if($check_escalate->count() > 0)
                    @if(DB::table('flags')->where('escalate' , $check_escalate->first()->id)->first())
                    @if(DB::table('flags')->where('escalate' , $check_escalate->first()->id)->first()->flag_status == 'doneflag')
                        <div class="epic_id">
                            <span class="material-symbols-outlined mr-1">check_circle</span>
                            Unblocked
                        </div>
                    @endif
                    @else
                        
                    @endif
                @endif
            </div>
            
        </div>
        @if($r->archived == 1)
        <a onclick="unarchiveflag({{$r->id}})" href="javascript:void(0)">
            Un Archived
        </a>
        @endif

        @if($r->escalate)
        <a href="javascript:void(0)">
            Escalated Flag
        </a>
        @endif
        @php
                $flagtittle = DB::table('flags')->where('id'  , Cmf::gerescalatedmainid($r->id))->first();
            @endphp
        @php
            $str = strlen($flagtittle->flag_title);
            $strl = strlen($flagtittle->flag_description);
        @endphp
        <div onclick="editflag({{$r->id}})">
            <h5>
                {{ \Illuminate\Support\Str::limit($flagtittle->flag_title,40, $end='') }}
                @if($str > 40)
                    <a href="javascript:void(0);" onclick="loadmore({{$r->id}});" id="toggle-button{{$r->id}}" class="" style="font-size:10px;">More</a>
                @endif
            </h5>
        </div>
        <div onclick="editflag({{$r->id}})">
            <p class="content show-read-more" id="show-read{{$r->id}}">
               {{ \Illuminate\Support\Str::limit(strip_tags($flagtittle->flag_description),122, $end='') }}
                @if($strl > 122 )
                <a href="javascript:void(0);" onclick="loadmoretext({{$r->id}});" id="toggle-button-text{{$r->id}}" class="" style="font-size:10px;">More</a>
                @endif

            </p>
            <p class="content show-read-more-text" id="show-read-more{{$r->id}}" style="display:none">
                {{$flagtittle->flag_description}}
                <a href="javascript:void(0);" onclick="seelesstext({{$r->id}});" id="toggle-button-less-text{{$r->id}}" class="" style="font-size:10px">Less</a>
            </p>
        </div>
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center">
                @if(DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->first())
                <div onclick="editflag({{$r->id}})" class="d-flex flex-row align-items-center image-cont pr-3">
                    <div class="pr-1 d-flex">
                        @php
                            $member_id = DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->orderby('id' , 'desc')->limit(3)->get();
                        @endphp
                        @php
                            $totalmember = DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->count();
                        @endphp
                        @foreach($member_id as $m)
                            @php
                                $user = DB::table('members')->where('id' , $m->member_id)->first();
                            @endphp
                            @if($user->image != NULL)
                            <img class="user-image" src="{{asset('public/assets/images/'.$user->image)}}" alt="{{ $user->name }}" data-toggle="tooltip" title="" data-original-title="{{ $user->name }} {{ $user->last_name }}">
                            @else
                            <img class="user-image" src="{{ Avatar::create($user->name.' '.$user->last_name)->toBase64() }}" alt="{{ $user->name }}" data-toggle="tooltip" title="" data-original-title="{{ $user->name }} {{ $user->last_name }}">
                            @endif
                        @endforeach
                        @if($totalmember > 3)
                         <div onclick="showmemberbox()" class="membermorethenthree simplecardmoreusers" data-toggle="tooltip" title="" data-original-title="More Assignee">
                             {{$totalmember}}+
                         </div>
                         @endif
                    </div>
                </div>
                @endif
                <div class="vertical-line pr-2"></div>
                <div onclick="editflag({{$r->id}})" data-toggle="tooltip" title="" data-original-title="Flag Comments" class="d-flex flex-row align-items-center">
                    <div class="pr-1">
                        <small>{{ DB::Table('flag_comments')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->where('type' , 'comment')->count() }}</small>
                    </div>
                    <div>
                        <img src="{{ url('public/assets/svg/comments.svg') }}">
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row">
                @if($r->board_type != 'org')
                    @php
                        $checkescalate = DB::table('escalate_cards')->where('flag_id' , $r->id)->count();
                    @endphp
                    @if($checkescalate > 0)
                    <div data-toggle="tooltip" title="" data-original-title="Escalate Flag">
                        <button style="background-color: #3661ec !important;" class="btn btn-circle btn-tolbar bg-transparent">
                            <img src="{{ url('public/assets/svg/uparrow-white.svg') }}">
                        </button>
                    </div>
                    @else
                    <div data-toggle="tooltip" title="" data-original-title="Escalate Flag">
                        <button onclick="escalateflag({{$r->id}})" class="btn btn-circle btn-tolbar bg-transparent">
                            <img src="{{ url('public/assets/svg/uparrow.svg') }}">
                        </button>
                    </div>
                    @endif
                @endif
                <div>
                    <div class="dropdown d-flex">
                        <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if($r->archived == 1)
                            <a class="dropdown-item" onclick="unarchiveflag({{$r->id}})" href="javascript:void(0)">Un Archive</a>
                            @else
                            <a class="dropdown-item" onclick="archiveflag({{$r->id}})" href="javascript:void(0)">Archive</a>
                            @endif
                            <a class="dropdown-item" onclick="editflag({{$r->id}})" href="javascript:void(0)">Edit</a>
                            <a class="dropdown-item" onclick="deleteflag({{$r->id}})" href="javascript:void(0)">Delete</a>
                            @if($r->board_type != 'org')
                                @if($checkescalate > 0)
                                    <a class="dropdown-item" href="javascript:void(0)">Escalated</a>
                                @else
                                    <a onclick="escalateflag({{$r->id}})" class="dropdown-item" href="javascript:void(0)">Escalate</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>