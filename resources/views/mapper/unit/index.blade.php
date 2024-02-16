@php
$var_objective = "mapper-unit";
@endphp
@extends('components.main-layout')
<title>BU-OKR Mapper</title>
@section('content')

<div class="row">
    <div class="col-md-12">
        <div style="width: 100%; height: 100vh; padding: 50px;">
            
        <!-- Node 1 -->
          <div id="node_1" class="node">
            <div class="node-name slot-active drag-impo-grab">
              <div class="slot-label drag-impo-grab">Business Unit</div>
              
            </div>
            <div class="slot-active drag-impo-grab">
              <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab"><span class="label-text">Stuff</span></div>
              <div id="slot-anchor-1" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
            </div>
          </div>
          <!-- Node 1 End -->
          <!-- Node 2 -->
          <div id="node_2" class="node" style=" transform: translate(259px, 231px);">
            <div class="node-name drag-impo-grab">
              <div class="slot-anchor-node-name slot-anchor-inactive drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab">Value</div>
              <div class="slot-anchor-node-name slot-anchor-inactive drag-impo-grab"></div>
            </div>
            <div class="slot-active drag-impo-grab">
              <div id="slot-anchor-2" class="slot-anchor-small slot-anchor-active drag-impo-grab"></div>
              <div class="slot-label drag-impo-grab"><span class="label-text">Stuff</span></div>
              <div class="slot-anchor-small slot-anchor-inactive drag-impo-grab"></div>
            </div>
          </div>
          <!-- Node 2 End-->
          <!-- Node 3 -->
          <div id="node_3" class="node" style=" transform: translate(503px, 61px);">
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

  new PlainDraggable(node_2, {
    onMove: function() {
      line1.position();
      line2.position();
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });

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