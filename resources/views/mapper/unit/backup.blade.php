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
          <div id="node_1" class="node">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">domain</span> {{ $data->business_name }}</div>
            </div>
            <div class="slot-active drag-impo-grab">
              <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab"><span class="label-text">Stuff</span></div>
              <div id="slot-anchor-1" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
            </div>
            @foreach(DB::table('objectives')->where('unit_id' , $data->id)->where('type' , 'unit')->get() as $o)
            <div class="slot slot-inactive">
                <span class="material-symbols-outlined f-18">location_searching</span>
                <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
                <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
            </div>
            @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $k)
            <div class="slot-active">
                <div class="slot-anchor-small slot-anchor-inactive"></div>
                <span class="material-symbols-outlined f-18 ml-2">key</span>
                <div class="slot-label"><span class="label-text">{{ $k->key_name }}</span></div>
                <div class="badge-todo mr-2">{{ $k->key_prog }}%</div>
                <div id="bu-out-1" class="slot-anchor-small slot-anchor-active"></div>
            </div>
            @endforeach
            @endforeach
          </div>
          <!-- Node 1 End -->
          <!-- Node 2 -->
          @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $key_calue_stream => $v)
          <div id="valuestream{{ $v->id }}" class="node">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">layers</span> {{ $v->value_name }}</div>
            </div>
            <div class="slot-active drag-impo-grab">
              <div id="slot-anchor-2" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab"><span class="label-text">Stuff</span></div>
              <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
            </div>
            @foreach(DB::table('objectives')->where('unit_id' , $v->id)->where('type' , 'stream')->get() as $o)
            <div class="slot slot-inactive">
                <span class="material-symbols-outlined f-18">location_searching</span>
                <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
                <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
            </div>
            @endforeach
          </div>
                @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)
                <div id="valuestreamteam{{ $v_t->id }}" class="node">
                  <div class="node-name slot-active drag-impo-grab">
                    <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">groups</span> {{ $v_t->team_title }}</div>
                  </div>
                  <div class="slot-active drag-impo-grab">
                    <div id="slot-anchor-2" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
                    <div class="slot-label drag-impo-grab"><span class="label-text">Stuff</span></div>
                    <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
                  </div>
                  @foreach(DB::table('objectives')->where('unit_id' , $v_t->id)->where('type' , 'VS')->get() as $o)
                  <div class="slot slot-inactive">
                      <span class="material-symbols-outlined f-18">location_searching</span>
                      <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
                      <div class="badge-inprogress">{{round($o->obj_prog,0)}}%</div>
                  </div>
                  @endforeach
                </div>
                @endforeach
          @endforeach
          <!-- Node 2 End-->
          <!-- Node 3 -->
          <div id="node_3" class="node" style=" transform: translate(0px, 1000px);">
            <div class="node-name drag-impo-grab">
              <div class="slot-anchor-node-name slot-anchor-inactive drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab">NODE 3</div>
              <div class="slot-anchor-node-name slot-anchor-inactive drag-impo-grab"></div>
            </div>
            <div class="slot slot-active drag-impo-grab">
              <div id="slot-anchor-3" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab"><span class="label-text">Stuff</span></div>
              <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
            </div>
          </div>
          <!-- Node 3 End -->
          
        </div>
    </div>
</div>


<style type="text/css">
  @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $key_calue_stream => $v)

      @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)

        #valuestreamteam{{ $v_t->id }}{
          transform: translate(700px, 0px);
        }

      @endforeach





  @php 
      $v_objective_count = DB::table('objectives')->where('type' , 'stream')->where('unit_id'  ,$v->id)->count();
      $v_i = 0;
      foreach(DB::table('objectives')->where('type' , 'stream')->where('unit_id'  ,$v->id)->get() as $v_key => $v_value)
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
  #valuestream{{ $v->id }}{
    transform: translate(350px, 0px);
  }
  @endif
  @if($loop->iteration == 2)
  @php
      $v_secondloop = $v_objectiveheight+$v_key_resultheight+20;
  @endphp
  #valuestream{{ $v->id }}{
    transform: translate(350px, {{$v_firstloop}}px);
  }
  @endif
  @if($loop->iteration == 3)
  @php
      $v_thirdloop = $v_objectiveheight+$v_key_resultheight+60;
  @endphp
  #valuestream{{ $v->id }}{
    transform: translate(350px, {{$v_firstloop+$v_secondloop}}px);
  }
  @endif
  @if($loop->iteration == 4)
  @php
      $v_fourthloop = $v_objectiveheight+$v_key_resultheight+20;
  @endphp
  #valuestream{{ $v->id }}{
    transform: translate(350px, {{$v_thirdloop+$v_firstloop+$v_secondloop}}px);
  }
  @endif
  @if($loop->iteration == 5)
  #valuestream{{ $v->id }}{
    transform: translate(350px, {{$v_fourthloop+$v_thirdloop+$v_firstloop+$v_secondloop}}px);
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

  var slot1_out = document.getElementById("slot-anchor-1"),
    slot2_in = document.getElementById("slot-anchor-2"),
    slot3_in = document.getElementById("slot-anchor-3"),
    slot4_out = document.getElementById("slot-anchor-4"),
    slot5_in = document.getElementById("slot-anchor-5"),
    lt_slot1_out = document.getElementById("lt_slot1_out"),
    line1,
    line2,
    line3;

  // Drag Nodes

  // Drag Nodes and redraw lines
  new PlainDraggable(node_1, {
    onMove: function() {
      line1.position();
      line2.position();
      line3.position();
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });

  @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $v)
  new PlainDraggable(valuestream{{ $v->id }}, {
    onMove: function() {
      line1.position();
      line2.position();
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });

    @foreach(DB::table('value_team')->where('org_id'  , $v->id)->get() as $key_value_stream_team => $v_t)

       new PlainDraggable(valuestreamteam{{ $v_t->id }}, {
          onMove: function() {
            line1.position();
            line2.position();
          },
          // onMoveStart: function() { line.dash = {animation: true}; },
          onDragEnd: function() {
            line.dash = false;
          }
        });

    @endforeach
  @endforeach
  new PlainDraggable(node_3, {
    onMove: function() {
      line1.position();
      line2.position();
      line3.position();
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });




  line1 = new LeaderLine(slot2_in, slot1_out, {
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
  line2 = new LeaderLine(slot3_in, slot1_out, {
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
  line3 = new LeaderLine(slot5_in, slot4_out, {
    startPlug: "behind",
    endPlug: "behind",
    size: 8,
    startPlugSize: 1,
    endPlugSize: 1,
    startSocket: "left",
    endSocket: "right",
    color: "#30c117",
    path: "straight"
    // dropShadow: {color: '#111', dx: 0, dy: 2, blur: 0.2}
  });

});

    </script>
@endsection