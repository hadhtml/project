<div class="slot-active">
    <span class="material-symbols-outlined f-18 ml-2">key</span>
    <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
    @if($k->key_status == 'In progress')
    <span class="badge-cs warning mr-1"style="width: 25px;">{{round($k->key_prog,0)}}%</span>
    @endif
    @if($k->key_status == 'Done')
    <span class="badge-cs success mr-1"style="width: 25px;">{{round($k->key_prog,0)}}%</span>
    @endif
    @if($k->key_status == 'To Do')
    <span class="badge-cs bg-secondary mr-1"style="width: 25px;">{{round($k->key_prog,0)}}%</span>
    @endif
    <div id="buisness_unit_key_result_{{ $k->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->where('from' , 'org')->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
</div>