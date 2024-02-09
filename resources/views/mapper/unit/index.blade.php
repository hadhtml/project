@php
$var_objective = "mapper-unit";
@endphp
@extends('components.main-layout')
<title>BU-OKR Mapper</title>
@section('content')
<style>
    .flowchart-example-container {
      width: 100%;
      height: 800px;
      background: white;
      border: 1px solid #BBB;
      margin-bottom: 10px;
    }
  </style>
<div class="row">
    <div class="col-md-12">
        <div class="flowchart-example-container" id="flowchartworkspace"></div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    /* global $ */
    $(document).ready(function() {
      var $flowchart = $('#flowchartworkspace');
      var $container = $flowchart.parent();
      $flowchart.flowchart({
        data: defaultFlowchartData,
        defaultSelectedLinkColor: '#000055',
        grid: 10,
        multipleLinksOnInput: true,
        multipleLinksOnOutput: true
      });
    });
    var defaultFlowchartData = {
      operators: {
        operator1: {
          top: 20,
          left: 20,
          properties: {
            title: '<h4 class="d-flex"><span class="material-symbols-outlined mr-2">domain</span> <span> {{$data->business_name}} {{$data->id}} </span></h4>',
            class: 'buisnessunit-tab',
            inputs: {},
            outputs: {
              @foreach(DB::table('key_result')->where('unit_id' , $data->id)->where('type' , 'unit')->get() as $key =>  $key_result)
                output_{{ $key+1 }}: {
                  label: '{{$key_result->key_name}}',
                },
              @endforeach
            }
          }
        },
        @foreach($valuestream as $value_stream_key => $v)
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
        operator{{ $value_stream_key+2 }}: {
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
          top: 20,
          @endif
          @if($loop->iteration == 2)
          @php
              $v_secondloop = $v_objectiveheight+$v_key_resultheight+20;
          @endphp
          top: {{$v_firstloop}},
          @endif
          @if($loop->iteration == 3)
          @php
              $v_thirdloop = $v_objectiveheight+$v_key_resultheight+20;
          @endphp
          top: {{$v_firstloop+$v_secondloop}},
          @endif
          @if($loop->iteration == 4)
          @php
              $v_fourthloop = $v_objectiveheight+$v_key_resultheight+20;
          @endphp
          top: {{$v_thirdloop+$v_firstloop+$v_secondloop}},
          @endif
          @if($loop->iteration == 5)
          top: {{$v_fourthloop+$v_thirdloop+$v_firstloop+$v_secondloop}},
          @endif
          left: 400,
          properties: {
            title: '<h4 class="d-flex"><span class="material-symbols-outlined mr-2">layers</span> <span> {{$v->value_name}} {{$v->id}}</span></h4>',
            class: 'value-stream-tab',
            body: '<div>Objectives</div>',
            inputs: {
              @foreach(DB::table('key_result')->where('unit_id' , $v->id)->where('type' , 'stream')->get() as $value_stream_key_result_key =>  $key_result)
                input_{{ $value_stream_key_result_key+1 }}: {
                  label: '{{$key_result->key_name}}',
                },
              @endforeach
            },
            outputs: {}
          }
        },
        @endforeach
      },
      links: {
        link_1: {
          fromOperator: 'operator1',
          fromConnector: 'output_1',
          toOperator: 'operator2',
          toConnector: 'input_1',
        },
        link_2: {
          fromOperator: 'operator1',
          fromConnector: 'output_1',
          toOperator: 'operator2',
          toConnector: 'input_2',
        },
      }
    };
  </script>
@endsection