@if($objectives->count() > 0)
@foreach($objectives as $r)
 @if(DB::table('dependency_map_link')->where('block',$r->id)->where('unit_id',$unit)->count() == 0)
<div onclick="selectobjective({{ $r->id }},'{{$r->type}}')" class="epic">
    <div class="epic-tittle"> @if($r->type == 'Story') <span style="font-size:20px" class="material-symbols-outlined">auto_stories</span> @else <img src="http://localhost/agileprolific/public/assets/svg/arrow.svg"> @endif @if($r->type == 'Story') SSP-{{ $r->id }} @else OE-{{ $r->id }} @endif {{ $r->epic_name }}</div>
    <div class="epic-detail okrmappersearchdetail">
        {{-- <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span> --}}
        {{-- <span>{{ DB::table('business_units')->where('id' , $r->unit_id)->first()->business_name }}</span> --}}
    </div>
</div>

@endif
@endforeach




<script type="text/javascript">
    function selectobjective(id,type) {
    
        $('#objectiveid').val(id);
       $.ajax({
            type: "POST",
            url: "{{ url('selectissue') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                type:type,
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

    No issues Found
@endif