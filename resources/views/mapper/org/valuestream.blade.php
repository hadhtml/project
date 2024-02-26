@foreach($valuestream as $key_calue_stream => $v)
   <div id="valuestream{{ $v->id }}" class="node">
      <div class="node-name slot-active drag-impo-grab">
         <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">layers</span> {{ $v->value_name }}</div>
      </div>
      @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $v->id)->where('type' , 'stream')->get() as $o)
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
   @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)
   <div id="valuestreamteam{{ $v_t->id }}" class="node">
      <div class="node-name slot-active drag-impo-grab">
         <div class="slot-label drag-impo-grab"><span class="mr-2 d-flex badge-team-valuestream">VS <span style="font-size:22px" class="material-symbols-outlined ml-2">groups</span></span>  {{ $v_t->team_title }}</div>
      </div>
      @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $v_t->id)->where('type' , 'VS')->get() as $o)
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
@foreach($valuestream as $v)
   @if($loop->first)
   #valuestream{{ $v->id }}{
      transform: translate(650px, -60px);
   }
   @else
   #valuestream{{ $v->id }}{
      transform: translate(650px, {{ $v->mapper_height }}px);
   }
   @endif
   @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)
      @if($loop->first)
      #valuestreamteam{{ $v_t->id }}{
      transform: translate(1000px, -60px);
      }
      @else
      #valuestreamteam{{ $v_t->id }}{
      transform: translate(1000px, {{ $key_value_stream_team*200 }}px);
      }
      @endif
   @endforeach
@endforeach
</style>