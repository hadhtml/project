@php
$var_objective = "mapper-unit";
@endphp
@extends('components.main-layout')
<title>BU-OKR Mapper</title>
@section('content')
<div class="row">
 <div class="col-md-12">
    <div class="card">
       <div class="card-body p-6">
          <div style="width: 100%; height: 100vh; padding: 50px;">

            <!-- Node 1 -->
            <div id="node_1" class="node" style="">
                <div class="node-name slot-active">
                    <div class="slot-label">{{ $data->business_name }}</div>
                </div>
                @foreach(DB::table('objectives')->where('unit_id' , $data->id)->where('type' , 'unit')->get() as $o)
                <div class="slot slot-inactive">
                    <span class="material-symbols-outlined f-18">location_searching</span>
                    <div class="slot-label" ><span class="label-text">{{ $o->objective_name }}</span></div>
                    <div class="badge-inprogress">{{ $o->obj_prog }}%</div>
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
                <!-- <div class="slot slot-inactive">
                  <div class="slot-anchor-small slot-anchor-inactive"></div>
                  <span class="material-symbols-outlined f-18 ml-2">key</span>
                  <div class="slot-label"><span class="label-text">Key Result name</span></div>
                  <div class="badge-todo mr-2">20%</div>
                  <div class="slot-anchor-small slot-anchor-inactive"></div>
                </div> -->
            </div>
            <!-- Node 1 End -->

            @php

            @endphp
            @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $v)
            <!-- Node 2 -->
            <div id="valuenode_{{ $v->id }}" class="node" style="transform: translate(259px, 131px);">
                <div class="node-name">
                    <div class="slot-label">{{ $v->value_name }}</div>
                </div>
                
                @foreach(DB::table('objectives')->where('unit_id' , $data->id)->where('type' , 'unit')->get() as $o)
                <div class="slot-active">
                    <div id="vs-in-1" class="slot-anchor-small slot-anchor-active"></div>
                    <span class="material-symbols-outlined f-18 ml-2">location_searching</span>
                    <div class="slot-label"><span class="label-text">Objective Name Goes here</span></div>
                    <div class="badge-todo mr-2">20%</div>
                    <div id="vs-out-1" class="slot-anchor-small slot-anchor-active"></div>
                </div>
                @endforeach
                <div class="slot slot-inactive">
                    <div class="slot-anchor-small slot-anchor-inactive"></div>
                    <span class="material-symbols-outlined f-18 ml-2">location_searching</span>
                    <div class="slot-label"><span class="label-text">Objective Name Goes here</span></div>
                    <div class="badge-todo mr-2">20%</div>
                    <div class="slot-anchor-small slot-anchor-inactive"></div>
                </div>

                <div class="slot slot-inactive">
                    <div class="slot-anchor-small slot-anchor-inactive"></div>
                    <span class="material-symbols-outlined f-18 ml-2">location_searching</span>
                    <div class="slot-label"><span class="label-text">Objective Name Goes here</span></div>
                    <div class="badge-todo mr-2">20%</div>
                    <div id="vs-out-2" class="slot-anchor-small slot-anchor-active"></div>
                </div>
            </div>
            <!-- Node 2 End-->
            @endforeach



            <!-- Node 3 -->
            <div id="node_3" class="node" style="transform: translate(503px, 61px);">
                <div class="node-name">
                    <div class="slot-label">Value Stream Team</div>
                </div>
                <div class="slot slot-active">
                    <div id="vs-team-in-1" class="slot-anchor-small slot-anchor-active"></div>
                    <span class="material-symbols-outlined f-18 ml-2">location_searching</span>
                    <div class="slot-label"><span class="label-text">Objective name</span></div>
                    <!-- <div class="slot-anchor-small slot-anchor-inactive"></div> -->
                </div>

                <div class="slot slot-inactive">
                    <div class="slot-anchor-small slot-anchor-inactive"></div>
                    <span class="material-symbols-outlined f-18 ml-2">location_searching</span>
                    <div class="slot-label"><span class="label-text">Objective name</span></div>
                    <!-- <div class="slot-anchor-small slot-anchor-inactive"></div> -->
                </div>

                <div class="slot slot-active">
                    <div id="vs-team-in-2" class="slot-anchor-small slot-anchor-active"></div>
                    <span class="material-symbols-outlined f-18 ml-2">location_searching</span>
                    <div class="slot-label"><span class="label-text">Objective name</span></div>
                    <!-- <div class="slot-anchor-small slot-anchor-inactive"></div> -->
                </div>
            </div>
            <!-- Node 3 End -->


            
        </div>
       </div>
    </div>
 </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/leader-line@1.0.5/leader-line.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/plain-draggable@2.5.12/plain-draggable.min.js"></script>
    <script type="text/javascript">
        window.addEventListener("load", function () {
            "use strict";

            var bu_out_1 = document.getElementById("bu-out-1"),
                vs_out_1 = document.getElementById("vs-out-1"),
                vs_out_2 = document.getElementById("vs-out-2"),
                vs_in_1 = document.getElementById("vs-in-1"),
                vs_team_in_1 = document.getElementById("vs-team-in-1"),
                vs_team_in_2 = document.getElementById("vs-team-in-2"),
                line1,
                line2,
                line3;

            // Drag Nodes

            // Drag Nodes and redraw lines
            new PlainDraggable(node_1, {
                onMove: function () {
                    line1.position();
                    line2.position();
                    line3.position();
                },
                onMoveStart: function () {
                    line.dash = { animation: true };
                },
                onDragEnd: function () {
                    line.dash = false;
                },
            });
            @foreach(DB::table('value_stream')->where('unit_id'  , $data->id)->get() as $v)
            new PlainDraggable(valuenode_{{ $v->id }}, {
                onMove: function () {
                    line1.position();
                    line2.position();
                },
                onMoveStart: function () {
                    line.dash = { animation: true };
                },
                onDragEnd: function () {
                    line.dash = false;
                },
            });
            @endforeach

            new PlainDraggable(node_3, {
                onMove: function () {
                    line1.position();
                    line2.position();
                    line3.position();
                },
                onMoveStart: function () {
                    line.dash = { animation: true };
                },
                onDragEnd: function () {
                    line.dash = false;
                },
            });

            line1 = new LeaderLine(vs_in_1, bu_out_1, {
                startPlug: "behind",
                endPlug: "behind",
                size: 4,
                startPlugSize: 1,
                endPlugSize: 1,
                startSocket: "left",
                endSocket: "right",
                color: "#547AFF",
            });

            line2 = new LeaderLine(vs_team_in_1, vs_out_1, {
                startPlug: "behind",
                endPlug: "behind",
                size: 4,
                startPlugSize: 1,
                endPlugSize: 1,
                startSocket: "left",
                endSocket: "right",
                color: "#547AFF",
            });

            line3 = new LeaderLine(vs_team_in_2, vs_out_2, {
                startPlug: "behind",
                endPlug: "behind",
                size: 4,
                startPlugSize: 1,
                endPlugSize: 1,
                startSocket: "left",
                endSocket: "right",
                color: "#547AFF",
            });
        });
    </script>
@endsection