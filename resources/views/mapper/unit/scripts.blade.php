const dataToImport = {
    "drawflow": {
        "Home": {
            "data": {
                "1": {
                    "id": 1,
                    "name": "personalized",
                    "data": {},
                    "class": "buisnessunit-tab",
                    "html": '<div class="row"><div class="col-md-4"> <div class="buisnessunit"> <div class="mainheading row mb-3"> <div class="col-md-12"> <h4>{{$data->business_name}}</h4> </div> </div> @foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$data->id)->get() as $o) <div class="row"> <div class="col-md-1"> <img src="{{ url('public/assets/svg/linkingbuisnessunit.svg') }}"> </div> <div class="col-md-8"> <div class="buisnessunit-card-subtittle"> <p class="buisnessunitheading">{{ $o->objective_name }}</p> </div> </div> <div class="col-md-3 text-right"> <div class="badge bg-success buisnessunitbadge"> {{ $o->obj_prog }}% </div> </div> <div class="col-md-12"> @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $key_result) <div class="row mt-2"> <div class="col-md-1"> <img src="{{ url('public/assets/svg/linkingkey.svg') }}"> </div> <div class="col-md-7"> <p class="buisnessunitlinkingtext">{{$key_result->key_name}}</p> </div> <div class="col-md-1"> @if(DB::table('team_link_child')->where('bussiness_key_id' , $key_result->id)->count() > 0) <img src="{{ url('public/assets/svg/link.svg') }}"> @endif </div> <div class="col-md-3 text-right"> <div class="badge buisnessunitbadge">{{$key_result->key_prog}}%</div> </div> </div> @endforeach </div> </div> @endforeach </div> </div></div>',
                    "typenode": false,
                    "inputs": {},
                    "outputs": {
                        @foreach(DB::table('team_link_child')->where('from' , 'unit')->where('bussiness_unit_id'  ,$data->id)->get() as $key=> $t)
                        "output_{{$key+1}}": {
                            "connections": [{
                                "node": "10{{$key+1}}",
                                "output": "input_1"
                            }]
                        },
                        @endforeach
                    },
                    "pos_x": 10,
                    "pos_y": 20
                },
                @foreach($valuestream as $v)
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
                    "name": "personalized",
                    "data": {},
                    "class": "buisnessunit-tab-value-stream-objective",
                    "html": '<div class="col-md-4"> <div class="buisnessunit"> <div class="mainheading row mb-3"> <div class="col-md-12"> <h4>{{$v->value_name}}</h4> </div> </div> @foreach(DB::table('objectives')->where('type' , 'stream')->where('unit_id'  ,$v->id)->get() as $v_o) <div class="row"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingbuisnessunit.svg") }}"> </div> <div class="col-md-8"> <div class="buisnessunit-card-subtittle"> <p class="buisnessunitheading">{{ $v_o->objective_name }}</p> </div> </div> <div class="col-md-3 text-right"> <div class="badge bg-success buisnessunitbadge"> {{ $v_o->obj_prog }}% </div> </div> <div class="col-md-12"> @foreach(DB::table('key_result')->where('obj_id' , $v_o->id)->get() as $v_o_key_result) <div class="row mt-2"> <div class="col-md-1"> <img src="{{ url("public/assets/svg/linkingkey.svg") }}"> </div> <div class="col-md-7"> <p class="buisnessunitlinkingtext">{{$v_o_key_result->key_name}}</p> </div> <div class="col-md-1"> <img src="{{ url("public/assets/svg/link.svg") }}"> </div> <div class="col-md-3 text-right"> <div class="badge buisnessunitbadge">{{$v_o_key_result->key_prog}}%</div> </div> </div> @endforeach </div> </div> @endforeach </div> </div>',
                    "typenode": false,
                    "inputs": {
                        "input_1": {
                            "connections": [{
                                "node": "1",
                                "input": "output_1"
                            }]
                        }
                    },
                    "outputs": {},
                    "pos_x": 480,
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
                @endforeach
            }
        }
    }
}