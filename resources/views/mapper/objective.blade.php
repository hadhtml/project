<div class="slot slot-inactive">
    <span class="material-symbols-outlined f-18">location_searching</span>
    <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
    @if($o->status == 'In progress')
    <span class="badge-cs warning"style="width: 25px;">{{round($o->obj_prog,0)}}%</span>
    @endif
    @if($o->status == 'Done')
    <span class="badge-cs success"style="width: 25px;">{{round($o->obj_prog,0)}}%</span>
    @endif
    @if($o->status == 'To Do')
    <span class="badge-cs bg-secondary"style="width: 25px;">{{round($o->obj_prog,0)}}%</span>
    @endif
</div>