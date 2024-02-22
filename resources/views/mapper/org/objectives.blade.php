<div class="slot slot-inactive">
    <span class="material-symbols-outlined f-18">location_searching</span>
    <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
    <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
</div>
@foreach(DB::table('key_result')->wherenull('trash')->where('obj_id' , $o->id)->get() as $k)
<div class="slot-active">
    <span class="material-symbols-outlined f-18 ml-2">key</span>
    <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
    <div class="badge-todo mr-2">{{ $k->key_prog }}%</div>
    <div id="buisness_unit_key_result_{{ $k->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
</div>
@endforeach