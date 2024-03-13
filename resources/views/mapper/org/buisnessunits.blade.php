@foreach($business_units as $b)
<div id="buisnessunit{{ $b->id }}" class="node buisnessunits">
   <div class="node-name slot-active drag-impo-grab">
      <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">domain</span> {{ $b->business_name }}</div>
   </div>
   @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $b->id)->where('type' , 'unit')->get() as $o)
   <div class="@if(DB::table('team_link_child')->where('linked_objective_id' , $o->id)->count() > 0) slot-active @else slot-inactive @endif drag-impo-grab">
      <div id="connectedobjective{{ $o->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('linked_objective_id' , $o->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif drag-impo-grab"></div>
      <span class="material-symbols-outlined f-18">location_searching</span>
      <div class="slot-label drag-impo-grab"><span class="label-text">{{ $o->objective_name }}</span></div>
      @if($o->status == 'Done')
      <div class="badge-done">{{round($o->obj_prog,0)}}%</div>
      @endif
      @if($o->status == 'To Do')
      <div class="badge-todo">{{round($o->obj_prog,0)}}%</div>
      @endif
      @if($o->status == 'In progress')
      <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
      @endif
   </div>
   @foreach(DB::table('key_result')->wherenull('trash')->where('obj_id' , $o->id)->get() as $k)
   <div class="slot-active">
      <span class="material-symbols-outlined f-18 ml-2">key</span>
      <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
      @if($k->key_status == 'Done')
      <div class="badge-done mr-2"">{{round($k->key_prog,0)}}%</div>
      @endif
      @if($k->key_status == 'To Do')
      <div class="badge-todo mr-2"">{{round($k->key_prog,0)}}%</div>
      @endif
      @if($k->key_status == 'In progress')
      <div class="badge-inprogress mr-2"">{{round($k->key_prog,0)}}%</div>
      @endif
      <div id="buisness_unit_key_result_{{ $k->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
   </div>
   @endforeach
   @endforeach
</div>
@foreach(DB::table('unit_team')->where('org_id'  , $b->id)->get() as $b_t)
<div id="buisnessunitteam{{ $b_t->id }}" class="node buisnessunitsteam">
   <div class="node-name slot-active drag-impo-grab">
      <div class="slot-label drag-impo-grab"><span class="mr-2 d-flex badge-team-valuestream">BU <span style="font-size:22px" class="material-symbols-outlined ml-2">groups</span></span>  {{ $b_t->team_title }}</div>
   </div>
   @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $b_t->id)->where('type' , 'BU')->get() as $o)
   <div class="slot slot-inactive">
      <div id="connectedobjective{{ $o->id }}" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
      <span class="material-symbols-outlined f-18">location_searching</span>
      <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
      @if($o->status == 'Done')
      <div class="badge-done">{{round($o->obj_prog,0)}}%</div>
      @endif
      @if($o->status == 'To Do')
      <div class="badge-todo">{{round($o->obj_prog,0)}}%</div>
      @endif
      @if($o->status == 'In progress')
      <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
      @endif
   </div>
   @endforeach
</div>
@endforeach
@endforeach