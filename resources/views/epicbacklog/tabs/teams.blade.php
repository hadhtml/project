<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <div>
                    <h4>{{ Cmf::getmodulename('level_three') }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@if($data->team_id)
@php
    if($data->type == 'unit'){
        $team = DB::table('unit_team')->where('id'  ,$data->team_id)->first();
    }
    if($data->type == 'org'){
        $team = DB::table('org_team')->where('id'  ,$data->team_id)->first();
    }
    if($data->type == 'stream'){
        $team = DB::table('value_team')->where('id'  ,$data->team_id)->first();
    }
    if($data->type == 'VS'){
        $team = DB::table('value_team')->where('id'  ,$data->team_id)->first();
    }
    if($data->type == 'BU'){
        $team = DB::table('unit_team')->where('id'  ,$data->team_id)->first();
    }
    $dataArray = explode(',', $team->member);
    $dataCount = count($dataArray);
    $firstTwoIds = array_slice($dataArray, 0, 2);
    $remainingIds = array_slice($dataArray, 2);
    $remainingCount = count($remainingIds);
    $dataCount = count($dataArray);
    $ObjResultcount  = DB::table('objectives')->where('unit_id',$team->id)->where('type','BU')->where('trash',NULL)->count();
    $EpicResultcount  = DB::table('epics')->where('buisness_unit_id',$team->id)->where('trash',NULL)->count();
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card team-card">
            <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-row mt-3">
                    <div class="mr-2">
                        <img class="gixie" data-item-id="{{ $team->id }}" style="width: 40px; object-fit: cover; border-radius: 10px; height: 40px;">
                    </div>
                    <div>
                        <h3 class="mb-0">
                            <a href="javascript:void(0)">{{$team->team_title}}</a>
                        </h3>
                        <small>
                            {{$dataCount}} total members
                        </small>
                    </div>
                </div>
                <div>
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
                                            <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
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
                                        <div class="mr-2">
                                            <div class="dropdown d-flex">
                                                <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{ url('public/assets/svg/dropdowndots.svg') }}">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a onclick="removeteamfromepic({{$data->id}})" class="dropdown-item">Remove From Epic</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
        <div class="nodatafound">
            <h4>No Team Linked This Epic</h4>    
        </div>
    </div>
</div>
@endif
<script type="text/javascript">
    var elements = document.querySelectorAll('.gixie');

    elements.forEach(function(element) {
        var itemId = element.getAttribute('data-item-id');
        var imageData = new GIXI(300).getImage(); 

        element.setAttribute('src', imageData);
    });
    function removeteamfromepic(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epics/removeteamfromepic') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(res) {
                $('.secondportion').html(res);
                showheader('{{ $data->id }}');
            }
        });
    }
</script>