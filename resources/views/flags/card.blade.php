@php
    $user = DB::table('members')->where('id' , $r->flag_assign)->first();
@endphp
@if($r->flag_title)
<div id="{{$r->id}}" class="card impediment-card">
    @include('flags.simplecard')
</div>
@endif