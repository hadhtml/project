<style type="text/css">
    .okrmappersearchdetail {
        display: unset;
    }
</style>
@if($objectives->count() > 0)
@foreach($objectives as $r)
<div onclick="selectobjective({{$r->id}})" class="epic">
    <div class="epic-tittle"><img src="{{ url('public/assets/svg/objectives/one.svg') }}"> {{ $r->objective_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        @if($r->type == 'unit')
        <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
        <span>{{ DB::table('business_units')->where('id' , $r->unit_id)->first()->business_name }}</span>
        @endif
        @if($r->type == 'stream')
        @php
            $value_Stream = DB::table('value_stream')->where('id' , $r->unit_id)->first();
        @endphp
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
            <span>{{ DB::table('business_units')->where('id' , $value_Stream->unit_id)->first()->business_name }}</span>
        </div>
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
            <span>{{ $value_Stream->value_name }}</span>
        </div>
        @endif
        @if($r->type == 'orgT')
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
            <span>{{ Cmf::getmainorganizationslug()->organization_name }}</span>
        </div>
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">groups</span>
            <span>{{ DB::table('org_team')->where('id' , $r->unit_id)->first()->team_title }}</span>
        </div>
        @endif
        @if($r->type == 'BU')
        @php
            $bu_team = DB::table('unit_team')->where('id' , $r->unit_id)->first();
        @endphp
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
            <span>{{ DB::table('business_units')->where('id' , $bu_team->org_id)->first()->business_name }}</span>
        </div>
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">groups</span>
            <span>{{ $bu_team->team_title }}</span>
        </div>
        @endif
        @if($r->type == 'VS')
        @php
            $vs_team = DB::table('value_team')->where('id' , $r->unit_id)->first();
            $value_stream = DB::table('value_stream')->where('id' , $vs_team->org_id)->first();
        @endphp
        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
            <span>{{ DB::table('business_units')->where('id' , $value_stream->unit_id)->first()->business_name }}</span>
        </div>

        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
            <span>{{ $value_stream->value_name }}</span>
        </div>

        <div class="d-flex mt-2">
            <span style="font-size:22px" class="material-symbols-outlined mr-2">groups</span>
            <span>{{ $vs_team->team_title }}</span>
        </div>
        @endif
    </div>
</div>
@endforeach
<script type="text/javascript">
    function selectobjective(id) {
        $('#objectiveid').val(id);
       $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/selectobjective') }}",
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

    <div class="text-center">
        <p>No Objective Found</p>
    </div>
@endif