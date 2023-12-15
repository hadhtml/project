@extends('linking.includes.layout')
@section('metta_tittle')
<title>Linking </title>
@endsection
@section('content')
@php
    $business_units = DB::table('business_units')->where('user_id',Auth::id())->orderby('id' , 'asc')->limit(5)->get();
@endphp

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="content d-flex flex-column flex-column-fluid">
            <!-- begin page Content -->
            <div class="container-fluid">
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



                    // editor.createCurvature = function(start_pos_x, start_pos_y, end_pos_x, end_pos_y, curvature_value, type) {
                    //   var center_x = ((end_pos_x - start_pos_x)/2)+start_pos_x;
                    //   return ' M ' + start_pos_x + ' ' + start_pos_y + ' L '+ center_x +' ' +  start_pos_y  + ' L ' + center_x + ' ' +  end_pos_y  + ' L ' + end_pos_x + ' ' + end_pos_y;
                    // }



                    const dataToImport = {
                        "drawflow": {
                            "Home": {
                                "data": {
                                    "1": {
                                        "id": 1,
                                        "name": "personalized",
                                        "data": {},
                                        "class": "organization-tab",
                                        "html": "<div>Organiaztion</div>",
                                        "typenode": false,
                                        "inputs": {},
                                        "outputs": {
                                            "output_1": {
                                                "connections": [{
                                                    "node": "1",
                                                    "output": "input_1"
                                                }]
                                            }
                                        },
                                        "pos_x": 10,
                                        "pos_y": 350
                                    },
                                    @foreach($business_units as $b)
                                        @php 
                                            $objective_count = DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$b->id)->count();
                                            $i = 0;
                                            foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$b->id)->get() as $key => $value)
                                            {
                                                foreach(DB::table('key_result')->where('obj_id' , $value->id)->get() as $key_result_index=>$key_result_value)
                                                {
                                                    if($key_result_value)
                                                    {
                                                        $i++;
                                                    }
                                                    
                                                }
                                            }
                                        @endphp
                                        "{{ $b->id+1 }}": {
                                            "id": {{ $b->id+1 }},
                                            "name": "slack",
                                            "data": {},
                                            "class": "buisnessunit-tab",
                                            "html": '<div class="col-md-4"> <div class="buisnessunit"> <div class="mainheading row mb-3"> <div class="col-md-12"> <h4>{{$b->business_name}}</h4> </div> </div> @foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$b->id)->get() as $o) <div class="row"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingbuisnessunit.svg") }}"> </div> <div class="col-md-8"> <div class="buisnessunit-card-subtittle"> <p class="buisnessunitheading">{{ $o->objective_name }}</p> </div> </div> <div class="col-md-3 text-right"> <div class="badge bg-success buisnessunitbadge"> {{ $o->obj_prog }}% </div> </div> <div class="col-md-12"> @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $key_result)  <div class="row mt-2"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingkey.svg") }}"> </div> <div class="col-md-7"> <p class="buisnessunitlinkingtext">{{$key_result->key_name}}</p> </div> <div class="col-md-1"> <img src="{{ url("public/assets/svg/link.svg") }}"> </div> <div class="col-md-3 text-right"> <div class="badge buisnessunitbadge">{{$key_result->key_prog}}%</div> </div> </div> @endforeach </div> </div> @endforeach </div> </div>',
                                            "typenode": false,
                                            "inputs": {
                                                "input_1": {
                                                    "connections": [{
                                                        "node": "1",
                                                        "input": "output_1"
                                                    }]
                                                }
                                            },
                                            "outputs": {
                                                @foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$b->id)->get() as $o)
                                                @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $key_result)
                                                "output_{{ $key_result->id }}": {
                                                    "connections": [{
                                                        "node": "1",
                                                        "output": "input_1"
                                                    }]
                                                },
                                                 @endforeach
                                                @endforeach
                                            },
                                            "pos_x": 250,
                                            @php
                                                $objectiveheight = $objective_count*80;
                                                $key_resultheight = $i*50;
                                            @endphp
                                            @if($loop->first)
                                            @php
                                                $firstloop = $objectiveheight+$key_resultheight+20;
                                            @endphp
                                            "pos_y": 20,
                                            @endif
                                            @if($loop->iteration == 2)
                                            @php
                                                $secondloop = $objectiveheight+$key_resultheight+20;
                                            @endphp
                                            "pos_y": {{$firstloop}},
                                            @endif
                                            @if($loop->iteration == 3)
                                            @php
                                                $thirdloop = $objectiveheight+$key_resultheight+20;
                                            @endphp
                                            "pos_y": {{$firstloop+$secondloop}},
                                            @endif
                                            @if($loop->iteration == 4)
                                            @php
                                                $fourthloop = $objectiveheight+$key_resultheight+20;
                                            @endphp
                                            "pos_y": {{$thirdloop+$firstloop+$secondloop}},
                                            @endif
                                            @if($loop->iteration == 5)
                                            "pos_y": {{$fourthloop+$thirdloop+$firstloop+$secondloop}},
                                            @endif
                                            
                                        },
                                        @foreach(DB::table('value_stream')->where('unit_id'  ,$b->id)->get() as $v)
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
                                        "{{ 100+$v->id }}": {
                                            "id": {{ 100+$v->id }},
                                            "name": "slack",
                                            "data": {},
                                            "class": "buisnessunit-tab-valuestrwea",
                                            "html": '<div class="col-md-4"> <div class="buisnessunit"> <div class="mainheading row mb-3"> <div class="col-md-12"> <h4>{{$v->value_name}}</h4> </div> </div> @foreach(DB::table('objectives')->where('type' , 'stream')->where('unit_id'  ,$v->id)->get() as $v_o) <div class="row"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingbuisnessunit.svg") }}"> </div> <div class="col-md-8"> <div class="buisnessunit-card-subtittle"> <p class="buisnessunitheading">{{ $v_o->objective_name }}</p> </div> </div> <div class="col-md-3 text-right"> <div class="badge bg-success buisnessunitbadge"> {{ $v_o->obj_prog }}% </div> </div> <div class="col-md-12"> @foreach(DB::table('key_result')->where('obj_id' , $v_o->id)->get() as $v_o_key_result) <div class="row mt-2"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingkey.svg") }}"> </div> <div class="col-md-7"> <p class="buisnessunitlinkingtext">{{$v_o_key_result->key_name}}</p> </div> <div class="col-md-1"> <img src="{{ url("public/assets/svg/link.svg") }}"> </div> <div class="col-md-3 text-right"> <div class="badge buisnessunitbadge">{{$v_o_key_result->key_prog}}%</div> </div> </div> @endforeach </div> </div> @endforeach </div> </div>',
                                            "typenode": false,
                                            "inputs": {
                                                @foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$b->id)->get() as $o)
                                                @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $key_result)
                                                "input_{{ $key_result->id }}": {
                                                    "connections": [{
                                                        "node": "1",
                                                        "input": "output_1"
                                                    }]
                                                },
                                                 @endforeach
                                                @endforeach
                                            },
                                            "outputs": {},
                                            "pos_x": 680,
                                            @php
                                                $v_objectiveheight = $v_objective_count*80;
                                                if($v_objectiveheight == 0)
                                                {
                                                    $v_objectiveheight = 50;
                                                }
                                                $v_key_resultheight = $v_i*50;
                                                if($v_key_resultheight == 0)
                                                {
                                                    $v_key_resultheight = 50;
                                                }
                                            @endphp
                                            @if($loop->first)
                                            @php
                                                $v_firstloop = $v_objectiveheight+$v_key_resultheight+20;
                                            @endphp
                                            "pos_y": 20,
                                            @endif
                                            @if($loop->iteration == 2)
                                            @php
                                                $v_secondloop = $v_objectiveheight+$v_key_resultheight+20;
                                            @endphp
                                            "pos_y": {{$v_firstloop}},
                                            @endif
                                            @if($loop->iteration == 3)
                                            @php
                                                $v_thirdloop = $v_objectiveheight+$v_key_resultheight+20;
                                            @endphp
                                            "pos_y": {{$v_firstloop+$v_secondloop}},
                                            @endif
                                            @if($loop->iteration == 4)
                                            @php
                                                $v_fourthloop = $v_objectiveheight+$v_key_resultheight+20;
                                            @endphp
                                            "pos_y": {{$v_thirdloop+$v_firstloop+$v_secondloop}},
                                            @endif
                                            @if($loop->iteration == 5)
                                            "pos_y": {{$v_fourthloop+$v_thirdloop+$v_firstloop+$v_secondloop}},
                                            @endif
                                        },

                                        @foreach(DB::Table('value_team')->where('org_id' , $v->id)->get() as $value_team)
                                        "{{ 1000+$value_team->id }}": {
                                            "id": {{ 1000+$value_team->id }},
                                            "name": "slack",
                                            "data": {},
                                            "class": "buisnessunit-tab-valuestrwea",
                                            "html": '<div class="col-md-4"> <div class="buisnessunit"> <div class="mainheading row mb-3"> <div class="col-md-12"> <h4>{{$value_team->team_title}}</h4> </div> </div> @foreach(DB::table('objectives')->where('type' , 'VS')->where('unit_id'  ,$value_team->id)->get() as $v_o) <div class="row"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingbuisnessunit.svg") }}"> </div> <div class="col-md-8"> <div class="buisnessunit-card-subtittle"> <p class="buisnessunitheading">{{ $v_o->objective_name }}</p> </div> </div> <div class="col-md-3 text-right"> <div class="badge bg-success buisnessunitbadge"> {{ $v_o->obj_prog }}% </div> </div> <div class="col-md-12"> @foreach(DB::table('key_result')->where('obj_id' , $v_o->id)->get() as $v_o_key_result) <div class="row mt-2"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingkey.svg") }}"> </div> <div class="col-md-7"> <p class="buisnessunitlinkingtext">{{$v_o_key_result->key_name}}</p> </div> <div class="col-md-1"> <img src="{{ url("public/assets/svg/link.svg") }}"> </div> <div class="col-md-3 text-right"> <div class="badge buisnessunitbadge">{{$v_o_key_result->key_prog}}%</div> </div> </div> @endforeach </div> </div> @endforeach </div> </div>',
                                            "typenode": false,
                                            "inputs": {},
                                            "outputs": {},
                                            "pos_x": 1130,
                                            "pos_y": 50,
                                        },
                                        @endforeach
                                        @endforeach
                                    @endforeach
                                }
                            }
                        }
                    }

                    editor.start();
                    editor.import(dataToImport);

                    // Events!
                    editor.on('nodeCreated', function(id) {
                      console.log("Node created " + id);
                    })

                    editor.on('nodeRemoved', function(id) {
                      console.log("Node removed " + id);
                    })

                    editor.on('nodeSelected', function(id) {
                      console.log("Node selected " + id);
                    })

                    editor.on('moduleCreated', function(name) {
                      console.log("Module Created " + name);
                    })

                    editor.on('moduleChanged', function(name) {
                      console.log("Module Changed " + name);
                    })

                    editor.on('connectionCreated', function(connection) {
                      console.log('Connection created');
                      console.log(connection);
                    })

                    editor.on('connectionRemoved', function(connection) {
                      console.log('Connection removed');
                      console.log(connection);
                    })
                /*
                    editor.on('mouseMove', function(position) {
                      console.log('Position mouse x:' + position.x + ' y:'+ position.y);
                    })
                */
                    editor.on('nodeMoved', function(id) {
                      console.log("Node moved " + id);
                    })

                    editor.on('zoom', function(zoom) {
                      console.log('Zoom level ' + zoom);
                    })

                    editor.on('translate', function(position) {
                      console.log('Translate x:' + position.x + ' y:'+ position.y);
                    })

                    editor.on('addReroute', function(id) {
                      console.log("Reroute added " + id);
                    })

                    editor.on('removeReroute', function(id) {
                      console.log("Reroute removed " + id);
                    })
                    /* DRAG EVENT */

                    /* Mouse and Touch Actions */

                    var elements = document.getElementsByClassName('drag-drawflow');
                    for (var i = 0; i < elements.length; i++) {
                      elements[i].addEventListener('touchend', drop, false);
                      elements[i].addEventListener('touchmove', positionMobile, false);
                      elements[i].addEventListener('touchstart', drag, false );
                    }

                    var mobile_item_selec = '';
                    var mobile_last_move = null;
                   function positionMobile(ev) {
                     mobile_last_move = ev;
                   }

                   function allowDrop(ev) {
                      ev.preventDefault();
                    }

                    function drag(ev) {
                      if (ev.type === "touchstart") {
                        mobile_item_selec = ev.target.closest(".drag-drawflow").getAttribute('data-node');
                      } else {
                      ev.dataTransfer.setData("node", ev.target.getAttribute('data-node'));
                      }
                    }

                    function drop(ev) {
                      if (ev.type === "touchend") {
                        var parentdrawflow = document.elementFromPoint( mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY).closest("#drawflow");
                        if(parentdrawflow != null) {
                          addNodeToDrawFlow(mobile_item_selec, mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY);
                        }
                        mobile_item_selec = '';
                      } else {
                        ev.preventDefault();
                        var data = ev.dataTransfer.getData("node");
                        addNodeToDrawFlow(data, ev.clientX, ev.clientY);
                      }

                    }

                    

                  var transform = '';
                  function showpopup(e) {
                    e.target.closest(".drawflow-node").style.zIndex = "9999";
                    e.target.children[0].style.display = "block";
                    //document.getElementById("modalfix").style.display = "block";

                    //e.target.children[0].style.transform = 'translate('+translate.x+'px, '+translate.y+'px)';
                    transform = editor.precanvas.style.transform;
                    editor.precanvas.style.transform = '';
                    editor.precanvas.style.left = editor.canvas_x +'px';
                    editor.precanvas.style.top = editor.canvas_y +'px';
                    console.log(transform);

                    //e.target.children[0].style.top  =  -editor.canvas_y - editor.container.offsetTop +'px';
                    //e.target.children[0].style.left  =  -editor.canvas_x  - editor.container.offsetLeft +'px';
                    editor.editor_mode = "fixed";

                  }

                   function closemodal(e) {
                     e.target.closest(".drawflow-node").style.zIndex = "2";
                     e.target.parentElement.parentElement.style.display  ="none";
                     //document.getElementById("modalfix").style.display = "none";
                     editor.precanvas.style.transform = transform;
                       editor.precanvas.style.left = '0px';
                       editor.precanvas.style.top = '0px';
                      editor.editor_mode = "edit";
                   }

                    function changeModule(event) {
                      var all = document.querySelectorAll(".menu ul li");
                        for (var i = 0; i < all.length; i++) {
                          all[i].classList.remove('selected');
                        }
                      event.target.classList.add('selected');
                    }

                    function changeMode(option) {

                    //console.log(lock.id);
                      if(option == 'lock') {
                        lock.style.display = 'none';
                        unlock.style.display = 'block';
                      } else {
                        lock.style.display = 'block';
                        unlock.style.display = 'none';
                      }

                    }

                  </script>
            </div>
        </div>
    </div>
</div>

     

@endsection