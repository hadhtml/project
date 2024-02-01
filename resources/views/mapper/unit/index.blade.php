@php
$var_objective = "mapper-unit";
@endphp
@extends('components.main-layout')
<title>BU-OKR Mapper</title>
@section('content')
<div class="row">
    <div class="col-md-12">
        <script src="https://cdn.jsdelivr.net/gh/jerosoler/Drawflow/dist/drawflow.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/drawflow/drawflow.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('public/assets/drawflow/beautiful.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
        <div class="wrapper">
            <div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)">
              <div class="btn-lock">
                <i id="lock" class="fas fa-lock" onclick="editor.editor_mode='fixed'; changeMode('lock');"></i>
                <i id="unlock" class="fas fa-lock-open" onclick="editor.editor_mode='edit'; changeMode('unlock');" style="display:none;"></i>
              </div>
              <div class="bar-zoom">
                <i class="fas fa-search-minus" onclick="editor.zoom_out()"></i>
                <i class="fas fa-search" onclick="editor.zoom_reset()"></i>
                <i class="fas fa-search-plus" onclick="editor.zoom_in()"></i>
              </div>
            </div>
        </div>

        <script>

          var id = document.getElementById("drawflow");
          const editor = new Drawflow(id);
          editor.reroute = true;
          editor.reroute_fix_curvature = true;
          editor.force_first_input = false;
          editor.zoom = 1;
          editor.editor_mode = 'edit';


         @include('mapper.unit.scripts') 

          editor.start();
          editor.import(dataToImport);
        </script>
    </div>
</div>
@endsection