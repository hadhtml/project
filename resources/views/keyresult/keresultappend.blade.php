@if($keyresult->count() > 0)
@foreach($keyresult as $r)
@if(DB::table('team_link_child')->where('bussiness_key_id'  ,$r->id)->count() == 0)
@if($r->type == 'org')
<div onclick="selectkeyreslt({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->key_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span>
        <span>{{ DB::table('organization')->where('id' , $r->unit_id)->first()->organization_name }}</span>
    </div>
</div>
@endif
@if($r->type == 'unit')
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
        <span>{{ DB::table('business_units')->where('id' , $r->unit_id)->first()->business_name }}</span>
    </div>
</div>
@endif
@if($r->type == 'stream')
@php
    $valuestream = DB::table('value_stream')->where('id' , $r->unit_id)->first();
@endphp
@if($valuestream)
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
        <span>{{ $valuestream->value_name }}</span>
    </div>
</div>
@endif
@endif
@if($r->type == 'VS')
@php
    $valueteam = DB::table('value_team')->where('id' , $r->unit_id)->first();
    $valuestream = DB::table('value_stream')->where('id' , $valueteam->org_id)->first();
@endphp
@if($valueteam && $valuestream)
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
        <span>{{ $valuestream->value_name }}</span>
        <span style="font-size:22px" class="material-symbols-outlined mr-2 ml-2">groups</span>
        <span>{{ $valueteam->team_title }}</span>
    </div>
</div>
@endif
@endif
@if($r->type == 'BU')
@php
    $businessteam = DB::table('unit_team')->where('id' , $r->unit_id)->first();
    $business_units = DB::table('business_units')->where('id' , $businessteam->org_id)->first();
@endphp
@if($businessteam && $business_units)
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
        <span>{{ $business_units->business_name }}</span>
        <span style="font-size:22px" class="material-symbols-outlined mr-2 ml-2">groups</span>
        <span>{{ $businessteam->team_title }}</span>
    </div>
</div>
@endif
@endif
@if($r->type == 'orgT')
@php
    $org_team = DB::table('org_team')->where('id' , $r->unit_id)->first();
    $organization = DB::table('organization')->where('id' , $org_team->org_id)->first();
@endphp
@if($org_team && $organization)
<div onclick="selectobjective({{$r->id}})" id="cloneid{{ $r->id }}" class="epic">
    <div class="epic-tittle">{{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span>
        <span>{{ $organization->organization_name }}</span>
        <span style="font-size:22px" class="material-symbols-outlined mr-2 ml-2">groups</span>
        <span>{{ $org_team->team_title }}</span>
    </div>
</div>
@endif
@endif
@endif
@endforeach

<script type="text/javascript">
    function selectkeyreslt(id) {
        $('#objectiveid').val(id);
       $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/selectkeyreslt') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id
            },
            success: function(res) {
                $('#searchobjective').attr('disabled' , true)
                $('.searchepic-box').hide();
                $('.selectepic').show();
                $('.selectepic').html(res);
            },
            error: function(error) {
                
            }
        });
    }
</script>
@else
    No Key Result Found
@endif