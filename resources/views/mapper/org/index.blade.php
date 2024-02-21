@php
$var_objective = "mapper-org";
@endphp
@extends('components.main-layout')
<title>ORG-OKR Mapper</title>
@section('content')

<div class="row">
    <div class="col-md-12">
        <div style="width: 100%; height: 5000px; padding: 50px;">
          <div id="node_1" class="node" style="transform: translate(-60px, -60px);;">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span> {{ $data->organization_name }}</div>
            </div>
            @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $data->id)->where('type' , 'org')->get() as $o)
                @include('mapper.org.objectives')
            @endforeach
          </div>
          @foreach($business_units as $b)
              <div id="buisnessunit{{ $b->id }}" class="node">
                <div class="node-name slot-active drag-impo-grab">
                  <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">domain</span> {{ $b->business_name }}</div>
                </div>
                @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $b->id)->where('type' , 'unit')->get() as $o)
                  @include('mapper.org.objectives')
                @endforeach
              </div>
              @foreach(DB::table('value_stream')->where('unit_id'  , $b->id)->orderby('id' , 'asc')->limit(4)->get() as $key_calue_stream => $v)
              <div id="valuestream{{ $v->id }}" class="node">
                <div class="node-name slot-active drag-impo-grab">
                  <div class="slot-label drag-impo-grab"><span style="font-size:22px" class="material-symbols-outlined">layers</span> {{ $v->value_name }}</div>
                </div>
                @foreach(DB::table('objectives')->wherenull('trash')->where('unit_id' , $v->id)->where('type' , 'stream')->get() as $o)
                  @include('mapper.org.objectives')
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
          @endforeach
        </div>
    </div>
</div>


<style type="text/css">
  @foreach($business_units as $key_calue_stream => $b)
    #buisnessunit{{ $b->id }}{
      transform: translate(300px, {{ $b->mapper_height }}px);
    }


    @foreach(DB::table('value_stream')->where('unit_id'  , $b->id)->get() as $key_calue_stream => $v)
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
          transform: translate(550px, {{ $v->mapper_height  }}px);
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
    $team_link_child_org =   DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' , 'org')->where('from' , 'stream')->get();
    $team_link_child_unit =   DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' , 'org')->where('from' , 'unit')->get();
    $onevar = DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' , 'org')->orwhere('from' ,'stream')->where('from' , 'unit')->get();
  @endphp


  @foreach($team_link_child_org as $t_l_c)
   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
  @endforeach

  @foreach($team_link_child_unit as $t_l_c)
   var slout_out_buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }} = document.getElementById("buisness_unit_key_result_{{ $t_l_c->bussiness_key_id }}");
  @endforeach

  @foreach($team_link_child_unit as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
  @endforeach
  @foreach($team_link_child_org as $in_t_l_c)
   var connectedobjective{{ $in_t_l_c->linked_objective_id }} = document.getElementById("connectedobjective{{ $in_t_l_c->linked_objective_id }}");
  @endforeach

  @foreach(DB::table('team_link_child')->where('bussiness_unit_id' , $data->id)->orwhere('from' , 'org')->where('from' , 'unit')->orwhere('from' ,'stream')->get() as $linedeclarekeyforslot =>  $line_t_l_c)
   var line{{ $linedeclarekeyforslot+1 }};
  @endforeach

  @foreach($onevar as $linekeyforslot =>  $line_t_l_c)
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
      @foreach($onevar as $draglinekey =>  $drag)
      line{{ $draglinekey+1 }}.position();
      @endforeach
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });


  @foreach($business_units as $key_calue_stream => $b)
    new PlainDraggable(buisnessunit{{ $b->id }}, {
      onMove: function() {
        @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' ,'stream')->where('from' , 'unit')->get() as $draglinekey =>  $drag)
        line{{ $draglinekey+1 }}.position();
        @endforeach
      },
      // onMoveStart: function() { line.dash = {animation: true}; },
      onDragEnd: function() {
        line.dash = false;
      }
    });
    @foreach(DB::table('value_stream')->where('unit_id'  , $b->id)->get() as $v)
    new PlainDraggable(valuestream{{ $v->id }}, {
      onMove: function() {
        @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' ,'stream')->where('from' , 'unit')->get() as $draglinekey =>  $drag)
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
              @foreach(DB::table('team_link_child')->where('user_id' , Auth::id())->where('bussiness_unit_id' , $data->id)->orwhere('from' ,'stream')->get() as $draglinekey =>  $drag)
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
  @endforeach
});

    </script>
@endsection