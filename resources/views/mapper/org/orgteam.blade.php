@foreach(DB::table('org_team')->where('org_id'  , $data->id)->get() as $o_t)
<div id="orgteam{{ $o_t->id }}" class="node orgteambox">
   <div class="node-name slot-active drag-impo-grab">
      <div class="slot-label drag-impo-grab"><span class="mr-2 d-flex badge-team-valuestream">ORG <span style="font-size:22px" class="material-symbols-outlined ml-2">groups</span></span>  {{ $o_t->team_title }}</div>
   </div>
   @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $o_t->id)->where('type' , 'orgT')->get() as $o)
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