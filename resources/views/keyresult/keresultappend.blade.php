@if($keyresult->count() > 0)
@foreach($keyresult as $r)
@if(DB::table('team_link_child')->where('bussiness_key_id'  ,$r->id)->where('linked_objective_id' , $data->id)->count() == 0)
@if($r->type == 'org')
<div onclick="selectkeyreslt({{$r->id}})" class="epic">
    <div class="epic-tittle d-flex"><span style="font-size:22px" class="material-symbols-outlined mr-2">key</span> <span>{{ $r->key_name }}</span></div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span>
        <span>{{ DB::table('organization')->where('id' , $r->unit_id)->first()->organization_name }}</span>
    </div>
</div>
@endif
@if($r->type == 'unit')
<div onclick="selectkeyreslt({{$r->id}})" class="epic">
    <div class="epic-tittle d-flex"><span style="font-size:22px" class="material-symbols-outlined mr-2">key</span> <span>{{ $r->key_name }}</span></div>
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
<div onclick="selectkeyreslt({{$r->id}})" class="epic">
    <div class="epic-tittle d-flex"><span style="font-size:22px" class="material-symbols-outlined mr-2">key</span> <span>{{ $r->key_name }}</span></div>
    <div class="epic-detail okrmappersearchdetail">
        <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
        <span>{{ $valuestream->value_name }}</span>
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