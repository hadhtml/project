@php
$var_objective = "mapper-unit";
@endphp
@extends('components.main-layout')
<title>BU-OKR Mapper</title>
@section('content')

<div class="row">
    <div class="col-md-12">
        <div style="width: 100%; height: 5000px; padding: 50px;">
            
        <!-- Node 1 -->
          <div id="node_1" class="node" style="transform: translate(-60px, -60px);;">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">domain</span> {{ $data->business_name }}</div>
            </div>
            @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $data->id)->where('type' , 'unit')->get() as $o)
            <div class="slot slot-inactive">
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
          @foreach(DB::table('unit_team')->where('org_id'  , $data->id)->get() as $b_t)
          <div id="buisnessunitteam{{ $b_t->id }}" class="node">
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
          <!-- Node 1 End -->
          <!-- Node 2 -->
          @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->orderby('id' , 'asc')->limit(4)->get() as $key_calue_stream => $v)
          <div id="valuestream{{ $v->id }}" class="node">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">layers</span> {{ $v->value_name }}</div>
            </div>
            @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $v->id)->where('type' , 'stream')->get() as $o)
            <div class="@if(DB::table('team_link_child')->where('linked_objective_id' , $o->id)->count() > 0) slot-active @else slot-inactive @endif drag-impo-grab">
              <div id="connectedobjective{{ $o->id }}" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
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
        </div>
    </div>
</div>


<style type="text/css">
  @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $key_calue_stream => $v)
      @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)
      @if($loop->first)
        #valuestreamteam{{ $v_t->id }}{
          transform: translate(900px, -60px);
        }
      @else
      #valuestreamteam{{ $v_t->id }}{
        transform: translate(900px, {{ $key_value_stream_team*200 }}px);
      }
      @endif
      @endforeach

    #valuestream{{ $v->id }}{
        transform: translate(350px, {{ $v->mapper_height  }}px);
      }

  @endforeach


  @foreach(DB::table('unit_team')->where('org_id'  , $data->id)->get() as $b_t)

  @if($loop->first)
    #buisnessunitteam{{ $b_t->id }}{
      transform: translate(900px, 400px);
    }
  @else
  #buisnessunitteam{{ $b_t->id }}{
    transform: translate(900px, {{ $key_value_stream_team*200 }}px);
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

  @php
    $team_link_child_stream =   DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->where('from' , 'stream')->get();
    $team_link_child_unit =   DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->where('from' , 'unit')->get();
    $team_link_child_unit_or_stream = DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' ,'stream')->where('from' , 'unit')->get();
  @endphp

  @foreach($team_link_child_stream as $t_l_c)
   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
  @endforeach

  @foreach($team_link_child_unit as $t_l_c)
   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
  @endforeach

  @foreach($team_link_child_unit as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
  @endforeach
  @foreach($team_link_child_stream as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
  @endforeach

  @foreach($team_link_child_unit_or_stream as $linedeclarekeyforslot =>  $line_t_l_c)
   var line{{ $linedeclarekeyforslot+1 }};
  @endforeach


  @foreach($team_link_child_unit_or_stream as $linekeyforslot =>  $line_t_l_c)
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
      @foreach($team_link_child_unit_or_stream as $draglinekey =>  $drag)
      line{{ $draglinekey+1 }}.position();
      @endforeach
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });


  @foreach(DB::table('unit_team')->where('org_id'  , $data->id)->get() as $b_t)
    new PlainDraggable(buisnessunitteam{{ $b_t->id }}, {
      onMove: function() {
        @foreach($team_link_child_unit_or_stream as $draglinekey =>  $drag)
        line{{ $draglinekey+1 }}.position();
        @endforeach
      },
      // onMoveStart: function() { line.dash = {animation: true}; },
      onDragEnd: function() {
        line.dash = false;
      }
    });
  @endforeach



  @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $v)
  new PlainDraggable(valuestream{{ $v->id }}, {
    onMove: function() {
      @foreach($team_link_child_unit_or_stream as $draglinekey =>  $drag)
      line{{ $draglinekey+1 }}.position();
      @endforeach
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });

    @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)

       new PlainDraggable(valuestreamteam{{ $v_t->id }}, {
          onMove: function() {
            @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->orwhere('from' ,'stream')->get() as $draglinekey =>  $drag)
            line{{ $draglinekey+1 }}.position();
            @endforeach
          },
          // onMoveStart: function() { line.dash = {animation: true}; },
          onDragEnd: function() {
            line.dash = false;
          }
        });

    @endforeach
  @endforeach
});

    </script>
@endsection