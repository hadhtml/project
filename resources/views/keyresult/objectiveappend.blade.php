@foreach($objectives as $r)
@if($r->type == 'unit')
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->type }}|{{ $r->objective_name }}</div>
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
    <div class="epic-tittle">{{ $r->type }}|{{ $r->objective_name }}</div>
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
@endphp
@if($valueteam)
@php
    $valuestream = DB::table('value_stream')->where('id' , $valueteam->org_id)->first();
@endphp
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle">{{ $r->type }}|{{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
        <span>{{ $valuestream->value_name }}</span>
    </div>
</div>
@endif
@endif
@endforeach