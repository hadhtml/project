@php
$var_objective = "mapper-unit";
@endphp
@extends('components.main-layout')
<title>BU-OKR Mapper</title>
@section('content')
<div class="row">
    <div class="col-md-12">
        <style>
        .flowchart-example-container {
            width: 800px;
            height: 400px;
            background: white;
            border: 1px solid #BBB;
            margin-bottom: 10px;
        }
    </style>
    <div id="chart_container">
        <div class="flowchart-example-container" id="flowchartworkspace"></div>
    </div>
    </div>
</div>
@endsection

@section('linking')
<script type="text/javascript">
      $(document).ready(function() {
        var data = {
          operators: {
            operator1: {
              top: 20,
              left: 20,
              properties: {
                title: '{{ $data->business_name }}',
                inputs: {},
                outputs: {
                  @foreach(DB::table('objectives')->where('type' , 'unit')->where('unit_id'  ,$data->id)->get() as $key => $o)
                  output_1: {
                    label: '{{ $o->objective_name }}',
                  },
                  @endforeach
                }
              }
            },
            operator2: {
              top: 80,
              left: 300,
              properties: {
                title: 'Operator 2',
                inputs: {
                  input_1: {
                    label: 'Input 1',
                  },
                  input_2: {
                    label: 'Input 2',
                  },
                },
                outputs: {}
              }
            },
          }
        };

        // Apply the plugin on a standard, empty div...
        $('#flowchartworkspace').flowchart({
          data: data
        });
      });
</script>
@endsection