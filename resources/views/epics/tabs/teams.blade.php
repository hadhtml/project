<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <div>
                    <h4>Teams</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    if($data->epic_type == 'unit'){
        $team = DB::table('unit_team')->where('id'  ,$data->team_id)->first();
    }
    $dataArray = explode(",", $team->member);
    $dataCount = count($dataArray);
    $ObjResultcount  = DB::table('objectives')->where('unit_id',$team->id)->where('type','BU')->where('trash',NULL)->count();
    $EpicResultcount  = DB::table('epics')->where('buisness_unit_id',$team->id)->where('trash',NULL)->count();
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card business-card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div class="d-flex flex-row">
                        <div class="mr-2">
                            <img  class="gixie" data-item-id="{{ $team->id }}" style="width: 40px; object-fit: cover; border-radius: 10px; height: 40px;">
                        </div>
                        <div>
                            <h3 class="mb-0">
                                <a target="_blank" href="{{url('dashboard/organization/'.$team->slug.'/portfolio/BU')}}">{{$team->team_title}}</a>
                            </h3>
                            <small>
                                {{$dataCount}} total members
                            </small>
                        </div>
                    </div>
                    <div>
                        <div class="dropdown d-flex">
                            <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"  data-toggle="modal" data-target="#edit{{$team->id}}">Edit</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#delete{{$team->id}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center leader-section mt-4">
                    <div>
                        @if($team->lead_id)
                            @foreach(DB::table('members')->get() as $r)
                                @if($r->id == $team->lead_id)

                                    <div class="d-flex flex-row align-items-center">
                                        <div class="mr-2">
                                            @if($r->image != NULL)
                                            <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                            @else
                                            <img src="{{ Avatar::create($r->name)->toBase64() }}" alt="Example Image">
                                            @endif
                                        </div>

                                        <div class="d-flex flex-column">
                                            <div>
                                                <span class="text-primary">Team Lead</span>
                                            </div>
                                            <div>
                                                <span>{{$r->name}} {{ $r->last_name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <div class="d-flex align-items-center flex-lg-fill my-1">
                            <div class="symbol-group symbol-hover">
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Mark Stone">
                                    <img alt="Pic" src="https://img.freepik.com/premium-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg">
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Charlie Stone">
                                    <img alt="Pic" src="https://img.freepik.com/premium-photo/young-man-smiling-cheerfully-feeling-happy-pointing-side-upwards-showing-object-copy-space_1194-211017.jpg">
                                </div>
                                <div style="width:42px; height:42px; padding: 10px; font-size: 12px;" class="symbol symbol-30  symbol-circle symbol-light" data-toggle="tooltip" title="" data-original-title="More users">
                                    <span class="symbol-label">5+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row counter-section">
                    <div class="col-md-6 pr-2">
                        <div class="counter-card d-flex flex-row align-items-center">
                            <div class="mr-1">
                                <span class="material-symbols-outlined text-secondary">bolt</span>
                            </div>
                            <div class="d-flex flex-column">
                                <div>
                                    <b>{{$EpicResultcount}}</b>
                                </div>
                                <div>
                                    <small class="text-secondary">Epics</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-2">
                        <div class="counter-card d-flex flex-row align-items-center">
                            <div class="mr-1">
                                <span class="material-symbols-outlined text-secondary">adjust</span>
                            </div>
                            <div class="d-flex flex-column">
                                <div>
                                    <b>{{$ObjResultcount}}</b>
                                </div>
                                <div>
                                    <small class="text-secondary">Objectives</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>