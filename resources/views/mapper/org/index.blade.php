@php
$var_objective = "mapper-org";
@endphp
@extends('components.main-layout')
<title>ORG-OKR Mapper</title>
@section('content')
<style type="text/css">
   .app-content{
      background-color: transparent !important;
   }
</style>
<style>
  #container {
      transform-origin: 0 0;
      transition: transform 0.2s;
  }
  .box {
      width: 100px;
      height: 100px;
      background-color: lightblue;
      margin: 20px;
      display: inline-block;
  }
</style>
<div id="container" style="margin-bottom: 20%;">
     <div id="box1" class="box">Box 1</div>
     <div id="box2" class="box">Box 2</div>
 </div>
 <button onclick="zoomIn()">Zoom In</button>
<button onclick="zoomOut()">Zoom Out</button>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/leader-line@1.0.5/leader-line.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/plain-draggable@2.5.12/plain-draggable.min.js"></script>

<script>
  let zoomLevel = 1;
  const container = document.getElementById('container');

  // Initialize LeaderLine
  let line = new LeaderLine(
      document.getElementById('box1'),
      document.getElementById('box2')
  );

  // Function to update line positions
  function updateLine() {
      line.position();
  }

  // Zoom in function
  function zoomIn() {
      zoomLevel += 0.1;
      container.style.transform = 'scale(' + zoomLevel + ')';
      setTimeout(updateLine, 200);  // Update line after the transition
  }

  // Zoom out function
  function zoomOut() {
      if (zoomLevel > 0.1) {
          zoomLevel -= 0.1;
          container.style.transform = 'scale(' + zoomLevel + ')';
          setTimeout(updateLine, 200);  // Update line after the transition
      }
  }

  // Handle window resize to update lines
  window.addEventListener('resize', updateLine);

  // Optional: Update lines on scroll if necessary
  window.addEventListener('scroll', updateLine);
</script>
@endsection