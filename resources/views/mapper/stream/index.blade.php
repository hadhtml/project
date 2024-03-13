@php
$var_objective = "mapper-stream";
@endphp
@extends('components.main-layout')
<title>{{ $data->value_name }} OKR Mapper</title>
@section('content')

<div class="row">
    <div class="col-md-12">
        <div style="width: 100%; height: 5000px; padding: 50px;">
            
        <!-- Node 1 -->
          <div id="node_1" class="node">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">domain</span> {{ $data->value_name }}</div>
            </div>
            @foreach(DB::table('objectives')->where('unit_id' , $data->id)->where('type' , 'stream')->get() as $o)
            <div class="slot slot-inactive">
                <span class="material-symbols-outlined f-18">location_searching</span>
                <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
                <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
            </div>
            @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $k)
            <div class="slot-active">
                <div class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
                <span class="material-symbols-outlined f-18 ml-2">key</span>
                <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
                <div class="badge-todo mr-2">{{ $k->key_prog }}%</div>
                <div id="buisness_unit_key_result_{{ $k->id }}" class="slot-anchor-small @if(DB::table('team_link_child')->where('bussiness_key_id' , $k->id)->count() > 0) slot-anchor-active @else slot-anchor-inactive @endif"></div>
            </div>
            @endforeach
            @endforeach
          </div>
          <!-- Node 1 End -->
          <!-- Node 2 -->
          @foreach(DB::table('value_team')->where('org_id'  , $data->id)->get() as $key_calue_stream => $v)
          <div id="valuestreamteam{{ $v->id }}" class="node">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">groups</span> {{ $v->team_title }}</div>
            </div>
            @foreach(DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'VS')->get() as $o)
            <div class="@if(DB::table('team_link_child')->where('linked_objective_id' , $o->id)->count() > 0) slot-active @else slot-inactive @endif drag-impo-grab">
              <div id="connectedobjective{{ $o->id }}" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
              <span class="material-symbols-outlined f-18">location_searching</span>
              <div class="slot-label drag-impo-grab"><span class="label-text">{{ $o->objective_name }}</span></div>
              <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
              <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
            </div>
            @endforeach
          </div>
          @endforeach
        </div>
    </div>
</div>


<style type="text/css">
@foreach(DB::table('value_team')->where('org_id'  , $data->id)->get() as $key_calue_stream => $v)
  @php 
      $v_objective_count = DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'VS')->count();
      $v_i = 0;
      foreach(DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'VS')->get() as $v_key => $v_value)
      {
          foreach(DB::table('key_result')->where('obj_id' , $v_value->id)->get() as $v_key_result_index=>$v_key_result_value)
          {
              if($v_key_result_value)
              {
                  $v_i++;
              }
              
          }
      }
  @endphp
  @php
      $v_objectiveheight = $v_objective_count*80;
      if($v_objectiveheight == 0)
      {
          $v_objectiveheight = 35;
      }
      $v_key_resultheight = $v_i;
      if($v_key_resultheight == 0)
      {
          $v_key_resultheight = 50;
      }
  @endphp
@if($loop->first)
@php
    $v_firstloop = $v_objectiveheight+$v_key_resultheight+50;
@endphp
#valuestreamteam{{ $v->id }}{
  transform: translate(650px, 0px);
}
@endif
@if($loop->iteration == 2)
@php
    $v_secondloop = $v_objectiveheight+$v_key_resultheight+20;
@endphp
#valuestreamteam{{ $v->id }}{
  transform: translate(650px, {{$v_firstloop}}px);
}
@endif
@if($loop->iteration == 3)
@php
    $v_thirdloop = $v_objectiveheight+$v_key_resultheight+60;
@endphp
#valuestreamteam{{ $v->id }}{
  transform: translate(650px, {{$v_firstloop+$v_secondloop}}px);
}
@endif
@if($loop->iteration == 4)
@php
    $v_fourthloop = $v_objectiveheight+$v_key_resultheight+20;
@endphp
#valuestreamteam{{ $v->id }}{
  transform: translate(650px, {{$v_thirdloop+$v_firstloop+$v_secondloop}}px);
}
@endif
@if($loop->iteration == 5)
#valuestreamteam{{ $v->id }}{
  transform: translate(650px, {{$v_fourthloop+$v_thirdloop+$v_firstloop+$v_secondloop}}px);
}
@endif
@endforeach
</style>



@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/leader-line@1.0.5/leader-line.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/plain-draggable@2.5.12/plain-draggable.min.js"></script>
<script type="text/javascript">
  window.addEventListener("load", function() {
  "use strict";





  @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get() as $t_l_c)
   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
  @endforeach

  @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get() as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
  @endforeach

  @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get() as $linedeclarekeyforslot =>  $line_t_l_c)
   var line{{ $linedeclarekeyforslot+1 }};
  @endforeach


  @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get() as $linekeyforslot =>  $line_t_l_c)
   line{{$linekeyforslot+1}} = new LeaderLine(connectedobjective{{ $line_t_l_c->linked_objective_id }}, buisness_unit_key_result_{{ $line_t_l_c->bussiness_key_id }}, {
    startPlug: "behind",
    endPlug: "behind",
    size: 4,
    startPlugSize: 1,
    endPlugSize: 1,
    startSocket: "left",
    endSocket: "right",
    color: "#fb8c00"
    // path: 'grid',
    // dropShadow: {color: '#111', dx: 0, dy: 2, blur: 0.2}
  });
  @endforeach



  new PlainDraggable(node_1, {
    onMove: function() {
      @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get() as $draglinekey =>  $drag)
      line{{ $draglinekey+1 }}.position();
      @endforeach
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });
  @foreach(DB::table('value_team')->where('org_id'  , $data->id)->get() as $key_calue_stream => $v)
  new PlainDraggable(valuestreamteam{{ $v->id }}, {
    onMove: function() {
      @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get() as $draglinekey =>  $drag)
      line{{ $draglinekey+1 }}.position();
      @endforeach
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });
  @endforeach
});

    </script>
@endsection