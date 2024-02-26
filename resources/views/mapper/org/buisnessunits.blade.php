@foreach($business_units as $b)
<div id="buisnessunit{{ $b->id }}" class="node">
   <div class="node-name slot-active drag-impo-grab">
      <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">domain</span> {{ $b->business_name }}</div>
   </div>
   @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $b->id)->where('type' , 'unit')->get() as $o)
   <div class="@if(DB::table('team_link_child')->where('linked_objective_id' , $o->id)->count() > 0) slot-active @else slot-inactive @endif drag-impo-grab">
      <div id="connectedobjective{{ $o->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('linked_objective_id' , $o->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif drag-impo-grab"></div>
      <span class="material-symbols-outlined f-18">location_searching</span>
      <div class="slot-label drag-impo-grab"><span class="label-text">{{ $o->objective_name }}</span></div>
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
   @endforeach
</div>
@foreach(DB::table('unit_team')->where('org_id'  , $b->id)->get() as $b_t)
<div id="buisnessunitteam{{ $b_t->id }}" class="node">
   <div class="node-name slot-active drag-impo-grab">
      <div class="slot-label drag-impo-grab"><span class="mr-2 d-flex badge-team-valuestream">BU <span style="font-size:22px" class="material-symbols-outlined ml-2">groups</span></span>  {{ $b_t->team_title }}</div>
   </div>
   @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $b_t->id)->where('type' , 'BU')->get() as $o)
   <div class="slot slot-inactive">
      <div id="connectedobjective{{ $o->id }}" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
      <span class="material-symbols-outlined f-18">location_searching</span>
      <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
      <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
   </div>
   @endforeach
</div>
@endforeach
@endforeach

<style type="text/css">
@foreach($business_units as $key_calue_stream => $b)
@if($loop->first)
#buisnessunit{{ $b->id }}{
    transform: translate(300px, -60px);
}
@else
#buisnessunit{{ $b->id }}{
    transform: translate(300px, {{ $b->mapper_height }}px);
}
@endif
   @foreach(DB::table('unit_team')->where('org_id'  , $b->id)->get() as $b_t)
      @if($loop->first)
      #buisnessunitteam{{ $b_t->id }}{
      transform: translate(1350px, 400px);
      }
      @else
      #buisnessunitteam{{ $b_t->id }}{
      transform: translate(1350px, -60px);
      }
      @endif
   @endforeach
@endforeach
</style>