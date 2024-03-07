@php
$var_objective = "mapper-org";
@endphp
@extends('components.main-layout')
<title>ORG-OKR Mapper</title>
@section('content')
<style type="text/css">
.bodyheight {
  min-height: 1600px;
  min-width: 1600px;
}
.leader-line {
  z-index: -1;
}
.node {
  height: auto;
  position: absolute;
  min-width: 100px;
  max-width: 250px;
  background: #d8d8d8;
  margin: 10px;
}
.slot-label {
  flex: 100px;
  min-width: 100px;
  max-width: 250px;
}
.node-name .slot-label {
  flex: 100px;
  min-width: 100px;
  max-width: 250px;
  padding: 0 5px;
  border: 3px #5b5b5b solid;
}

.label-text {
  padding: 0 5px;
}
.slot-button {
  padding: 4px 4px 4px 6px;
  margin-top: 10px;
  margin-right: 10px;
  margin-left: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
  text-transform: uppercase;
  font-family: "Source Code Pro", monospace;
  background: transparent;
  border: 4px #8e8e8e solid;
  color: #5b5b5b;
}
.slot-config {
  padding: 4px 4px 4px 6px;
  margin-top: 10px;
  margin-right: 10px;
  margin-left: 10px;
  display: inline-flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
  text-transform: uppercase;
  font-family: "Source Code Pro", monospace;
  background: transparent;
  border: 1px #8e8e8e solid;
  color: #5b5b5b;
  border-radius: 30px;
}
.field-active,
.field-inactive {
  padding: 5px;
  margin-top: 10px;
  margin-right: 10px;
  margin-left: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
  text-transform: uppercase;
  font-family: "Source Code Pro", monospace;
  background: #fff;
  color: #5b5b5b;
  text-transform: none;
  font-style: italic;
}
.field-inactive {
  border: 3px #5b5b5b solid;
  background: #ccc;
  color: #5b5b5b;
  text-transform: none;
  font-style: italic;
}
.slot-active,
.slot-inactive {
  padding: 4px;
  margin-top: 10px;
  margin-right: 10px;
  margin-left: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
  text-transform: uppercase;
  font-family: "Source Code Pro", monospace;
  border: 3px #5b5b5b solid;
  background: #fff;
  color: #5b5b5b;
}
.slot-inactive {
  background: #8e8e8e;
  border: 3px #8e8e8e solid;
  color: #fff;
}
.slot:last-child {
  margin-top: 10px;
  margin-bottom: 10px;
}
.elevation-3 {
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
.slot-anchor-small {
  width: 8px;
  height: 8px;
  border-width: 4px;
  border-color: #d8d8d8;
  border-style: solid;
}
.slot-anchor-node-name {
  width: 22px;
  height: 22px;
  border-width: 3px;
  border-color: #d8d8d8;
  border-style: solid;
}
.slot-anchor-active {
  background: #fb8c00;
  border-color: #fb8c00;
  border-style: solid;
}

.slot-anchor-inactive {
  background: #d8d8d8;
  border-color: #d8d8d8;
  border-style: solid;
}
.node-name {
  font-size: 14px;
  font-weight: 700;
  padding: 0px 0px;
  text-transform: uppercase;
  font-family: "Source Code Pro", monospace;
  color: #dddddd;
  background: #5b5b5b;
  margin: 0;
  width: auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.node-name.slot-active {
  border-style: none;
}
.node-name .slot-anchor-inactive {
  background: #fff;
  border-color: #5b5b5b;
  border-style: solid;
}
.node-name.slot-active .slot-anchor-node-name.slot-anchor-active {
  background: #30c117;
  border-color: #30c117;
  border-style: solid;
}

</style>
<div class="row">
 <div class="col-md-12">
     <div class="card">
         <div class="card-body">
            <div class="bodyheight">

  <!-- Node 1 -->
  <div id="node_1" class="node" style="">
    <div class="node-name slot-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">NODE 1</div>
      <div id="slot-anchor-4" class="slot-anchor-node-name slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div id="slot-anchor-1" class="slot-anchor-small slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
  </div>
  <!-- Node 1 End -->
  <!-- Node 2 -->
  <div id="node_2" class="node" style=" transform: translate(259px, 231px);">
    <div class="node-name" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">NODE 2</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div id="slot-anchor-2" class="slot-anchor-small slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
  </div>
  <!-- Node 2 End-->
  <!-- Node 3 -->
  <div id="node_3" class="node" style=" transform: translate(503px, 61px);">
    <div class="node-name" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">NODE 3</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.
      </div>
    </div>
    <div class="slot slot-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div id="slot-anchor-3" class="slot-anchor-small slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
  </div>
  <!-- Node 3 End -->
  <!-- Node 4 -->
  <div id="node_4" class="node" style=" transform: translate(794px, 17px);">
    <div class="node-name slot-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div id="slot-anchor-5" class="slot-anchor-node-name slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">NODE 4</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div id="node_4_slot1_in" class="slot-anchor-small slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Stuff</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
  </div>
  <!-- Node 4 End -->
  <!-- Node 5 -->
  <div id="learningTask" class="node" style=" transform: translate(0, 500px);">
    <div class="node-name" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">LearningTask</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Outcome</span></div>
      <div id="lt_slot1_out" class="slot-anchor-small slot-anchor-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Learning Objective</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Supporting Materials</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Guidance/Task Support</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Rubric</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-button" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><i class="zmdi zmdi-plus zmdi-hc-lg"></i><span class="label-text">New Attribute</span></div>
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot slot-config" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><i class="zmdi zmdi-settings zmdi-hc-lg"></i><span class="label-text">Settings</span></div>
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
  </div>
  <!-- Node 5 End -->
  <!-- Node 6 -->
  <div id="math" class="node" style=" transform: translate(300px, 500px);">
    <div class="node-name" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">Math</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Add</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Subtract</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Multiply</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
  </div>
  <!-- Node 6 End -->
  <!-- Node 7 -->
  <div id="date" class="node" style=" transform: translate(0, 900px);">

    <div class="node-name" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">Date</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot field-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Preview: 2008-09-15T15:53:00+05:00</span></div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Day:<input type="text" placeholder="22" name="fname"></span></div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Month:<input type="text" placeholder="(1) January" name="fname"></span></div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Year:<input type="text" placeholder="2008" name="fname"></span></div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Time:<input type="text" placeholder="2:30pm" name="fname"></span></div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Time Zone:<input type="text" placeholder="Eastern" name="fname"></span></div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Notation:   
            <select>
                <option value="iso8601">ISO 8601</option>
                <option value="other">Other</option>
                </select>        
            </span>
        <span class="label-text">Format:
                <select>
                    <option value="iso8601">E8601DZw.d</option>
                    <option value="other">Other</option>
                </select>          
            </span>
      </div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
  </div>
  <!-- Node 7 End -->
  <!-- Node 8 -->
  <div id="logic" class="node" style=" transform: translate(300px, 500px);">
    <div class="node-name" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">Logic</div>
      <div class="slot-anchor-node-name slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot field-active" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <!-- <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div> -->
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">If:   
            <select>
                <option value="Equal to">Equal to</option>
                <option value="Equal to">Does not equal</option>
                <option value="Greater than">Greater than</option>
                <option value="Greater than or equal to">Greater than or equal to</option>
                <option value="Less than">Less than</option>
                <option value="Less than or equal to">Less than or equal to</option>
                <option value="null">null</option>
                <option value="true">true</option>
                <option value="false">false</option>
                </select>        
            </span>
        <span class="label-text">Then:
                <select>
                    <option value="set true">Set true</option>
                    <option value="set false">Set false</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value="">nothing</option>
                </select>          
            </span>
      </div>
      <!-- <div  class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>   -->
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Subtract</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
    <div class="slot slot-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;">
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
      <div class="slot-label" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"><span class="label-text">Else</span></div>
      <div class="slot-anchor-small slot-anchor-inactive" style="will-change: transform; -webkit-tap-highlight-color: transparent; cursor: grab; user-select: none;"></div>
    </div>
  </div>
  <!-- Node 8 End -->
  
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
   window.addEventListener("load", function() {
  "use strict";

  var slot1_out = document.getElementById("slot-anchor-1"),
    slot2_in = document.getElementById("slot-anchor-2"),
    slot3_in = document.getElementById("slot-anchor-3"),
    slot4_out = document.getElementById("slot-anchor-4"),
    slot5_in = document.getElementById("slot-anchor-5"),
    node_4_slot1_in = document.getElementById("node_4_slot1_in"),
    lt_slot1_out = document.getElementById("lt_slot1_out"),
    line1,
    line2,
    line3,
    learningtask1;

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
  new PlainDraggable(node_4, {
    onMove: function() {
      line3.position();
      learningtask1.position();
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });
  new PlainDraggable(learningTask, {
    onMove: function() {
      learningtask1.position();
    },
    // onMoveStart: function() { line.dash = {animation: true}; },
    onDragEnd: function() {
      line.dash = false;
    }
  });
  new PlainDraggable(math);
  new PlainDraggable(logic);
  new PlainDraggable(date);

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
  learningtask1 = new LeaderLine(node_4_slot1_in, lt_slot1_out, {
    startPlug: "behind",
    endPlug: "behind",
    size: 4,
    startPlugSize: 1,
    endPlugSize: 1,
    startSocket: "left",
    endSocket: "right",
    color: "#fb8c00" // orange: #fb8c00, green: #30c117
    // path: 'straight',
    // dropShadow: {color: '#111', dx: 0, dy: 2, blur: 0.2}
  });
});

</script>
@endsection