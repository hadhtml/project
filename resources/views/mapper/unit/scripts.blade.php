const dataToImport = {
    "drawflow": {
        "Home": {
            "data": {
                "1": {
                    "id": 1,
                    "name": "personalized",
                    "data": {},
                    "class": "buisnessunit-tab",
                    "html": '<div class="row"><div class="col-md-4"> <div class="buisnessunit"> <div class="mainheading row mb-3"> <div class="col-md-12"> <h4>{{$data->business_name}}</h4> </div> </div> @foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$data->id)->get() as $o) <div class="row"> <div class="col-md-1"> <img src="{{ url('public/assets/svg/linkingbuisnessunit.svg') }}"> </div> <div class="col-md-8"> <div class="buisnessunit-card-subtittle"> <p class="buisnessunitheading">{{ $o->objective_name }}</p> </div> </div> <div class="col-md-3 text-right"> <div class="badge bg-success buisnessunitbadge"> {{ $o->obj_prog }}% </div> </div> <div class="col-md-12"> @foreach(DB::table('key_result')->where('obj_id' , $o->id)->get() as $key_result) <div class="row mt-2"> <div class="col-md-1"> <img src="{{ url('public/assets/svg/linkingkey.svg') }}"> </div> <div class="col-md-7"> <p class="buisnessunitlinkingtext">{{$key_result->key_name}}</p> </div> <div class="col-md-1"> <img src="{{ url('public/assets/svg/link.svg') }}"> </div> <div class="col-md-3 text-right"> <div class="badge buisnessunitbadge">{{$key_result->key_prog}}%</div> </div> </div> @endforeach </div> </div> @endforeach </div> </div></div>',
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
                    "pos_y": 100
                }
            }
        }
    }
}