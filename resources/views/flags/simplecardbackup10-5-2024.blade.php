<div onclick="editflag({{$r->id}})" id="{{ $r->id }}">
    @php
        $flagtittle = DB::table('flags')->where('id'  , Cmf::gerescalatedmainid($r->id))->first();
    @endphp
    <div class="card-header border-0 pt-2" style=" padding: 0.5rem !important; ">
        <div class="card-title m-0">
            <div class="card-toolbar">
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
        </div>
        @if($flagtittle->epic_id)
        <div class="card-toolbar">
            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">OE-{{ $r->epic_id }}</span>
        </div>
        @endif
    </div>
    @php
        $flagtittle = DB::table('flags')->where('id'  , Cmf::gerescalatedmainid($r->id))->first();
    @endphp
    @php
        $str = strlen($flagtittle->flag_title);
        $strl = strlen($flagtittle->flag_description);
    @endphp
    <div class="card-body p-2">
        <div class="fs-3 fw-bold text-gray-900">{{ \Illuminate\Support\Str::limit($flagtittle->flag_title,40, $end='') }}
            @if($str > 40)
                <a href="javascript:void(0);" onclick="loadmore({{$r->id}});" id="toggle-button{{$r->id}}" class="" style="font-size:10px;">More</a>
            @endif
        </div>
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            {{ \Illuminate\Support\Str::limit(strip_tags($flagtittle->flag_description),122, $end='') }}
                @if($strl > 122 )
                <a href="javascript:void(0);" onclick="loadmoretext({{$r->id}});" id="toggle-button-text{{$r->id}}" class="" style="font-size:10px;">More</a>
                @endif
        </p>
        @php
            $member_id = DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->orderby('id' , 'desc')->limit(3)->get();
        @endphp
        @php
            $totalmember = DB::table('flag_members')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->count();
        @endphp
        <div style="display: flex;justify-content: space-between;">
            @if($totalmember > 1)
            <div class="symbol-group symbol-hover mb-5" style="margin-left: 0px;">
                @foreach($member_id as $m)
                    @php
                        $user = DB::table('members')->where('id' , $m->member_id)->first();
                    @endphp
                    @if($user->image != NULL)
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $user->name }} {{ $user->last_name }}" data-bs-original-title="{{ $user->name }} {{ $user->last_name }}" data-kt-initialized="1">
                        <img alt="Pic" src="{{asset('public/assets/images/'.$user->image)}}">
                    </div>
                    @else
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $user->name }} {{ $user->last_name }}" data-bs-original-title="{{ $user->name }} {{ $user->last_name }}" data-kt-initialized="1">
                        <img alt="Pic" src="{{ Avatar::create($user->name.' '.$user->last_name)->toBase64() }}">
                    </div>
                    @endif
                @endforeach
                @if($totalmember > 3)
                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">{{$totalmember}}+</span>
                </div>
                @endif
            </div>
            @endif
            <div style="padding-left: 0px !important;" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1">
                <i class="ki-outline ki-message-text-2 fs-2 me-1"></i>{{ DB::Table('flag_comments')->where('flag_id' , Cmf::gerescalatedmainid($r->id))->where('type' , 'comment')->count() }}
            </div>
        </div>
        <div style="display: flex;justify-content: space-between;">
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
                    <div class="epic_id d-flex align-items-center mr-2" data-toggle="tooltip" data-placement="top" data-original-title="Owner">
                        <span style="font-size:18px" class="material-symbols-outlined mr-1">check_circle</span>
                        Unblocked
                    </div>
                @endif
                @else
                    
                @endif
            @endif
            @if($r->archived == 1)
            <div onclick="unarchiveflag({{$r->id}})" class="epic_id d-flex align-items-center mr-2">
                Un Archived
            </div>
            @endif
            @if($r->escalate)
            <div class="epic_id d-flex align-items-center mr-2">
                Escalated Flag
            </div>
            @endif
        </div>
        
    </div>
</div>