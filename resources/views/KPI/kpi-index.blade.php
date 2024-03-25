@php
$var_objective = 'Pagekpi-'.$type;
@endphp
@extends('components.main-layout')
@if($organization->type == 'unit')
<title>BU-KpI</title>
@endif
@if($organization->type == 'stream')
<title>VS-KpI</title>
@endif
@if($organization->type == 'org')
<title>Org-KpI</title>
@endif
@if($organization->type == 'BU')
<title>KpI-{{$organization->team_title}}</title>
@endif

@if($organization->type == 'VS')
<title>KpI-{{$organization->team_title}}</title>
@endif

@if($organization->type == 'orgT')
<title>KpI-{{$organization->team_title}}</title>
@endif
@section('content')
    <style>
        .tab {
            display: none;
        }
    </style>


@if (count($data) > 0)
<div class="row" id="chart-update">
    @foreach ($data as $chart_data)
        @php
              $chart = array();
              $chart = DB::table('kpi_check_in')
                ->where('kpi_id', $chart_data->id)
                ->whereNotNull('value')
                ->orderby('id','DESC')
                ->first();    
            
            $alldata = DB::table('kpi_check_in')
                ->whereNotNull('value')
                ->orderby('check_date','ASC')
                ->get();  
                
                
                $maxlinebar = 0;
                $maxlinebar = $chart_data->target_value;    
        @endphp

        
            <div class="col-md-6 mb-5">
                <div class="card p-3 mt-2">
                    <div class="card-body">
                        <div class="row chart-header mb-5">
                            <div class="col-md-12">
                                <div class="d-flex flex-row title-area">
                                    <div style="width:80% !important">
                                        <h3 class="title mb-1">{{$chart_data->title}}</h3>
                                        <small class="subtitle">{{$chart_data->summary}}</small> 
                                    </div>
                                    <div class="d-flex justify-content-between ml-auto">
                                        <div>
                                            <div class="dropdown">
                                                
                                                <button onclick="resetZoom({{$chart_data->id}})" class="btn btn-circle btn-xl btn-tolbar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none">
                                                      <path d="M18.3327 10.0001C18.3327 14.6001 14.5993 18.3334 9.99935 18.3334C5.39935 18.3334 2.59102 13.7001 2.59102 13.7001M2.59102 13.7001H6.35768M2.59102 13.7001V17.8667M1.66602 10.0001C1.66602 5.40008 5.36602 1.66675 9.99935 1.66675C15.5577 1.66675 18.3327 6.30008 18.3327 6.30008M18.3327 6.30008V2.13341M18.3327 6.30008H14.6327" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                                
                                                <button class="btn btn-circle btn-xl btn-tolbar dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{ asset('public/assets/images/icons/dots.svg') }}">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="editkpichart({{ $chart_data->id }});" data-toggle="modal"
                                                        data-target="#edit-kpi-modal-new">Edit Values</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                        data-toggle="modal" data-target="#edit-chart-kpi{{$chart_data->id}}">Edit Basic Detail</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="deletechart({{ $chart_data->id }});"
                                                        data-toggle="modal" data-target="#delete{{$chart_data->id}}">Delete Kpi</a>
                                                       
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-row justify-content-between target-area">
                                    <div class="d-flex flex-row align-items-center stats-section mt-3">
                                        <div><small>Target Value:</small></div>
                                        @if($chart_data->target_value)
                                        <div class="ml-2"><b>{{ Quarters::abbreviate($chart_data->target_value) }}</b></div>
                                        @else
                                        <div class="ml-2"><b>None</b></div>
                                        @endif
                                    </div>
                                    @php
                                    $date = \Carbon\Carbon::parse($chart_data->target_date)->format('M d Y');
                                    $member = DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->count();

                                    @endphp
                                    <div class="d-flex flex-row align-items-center stats-section mt-3">
                                        <div><small class="">Target Date:</small></div>
                                        <div class="ml-2">
                                            @if($chart_data->target_date)
                                            <b>{{ $date }}</b>
                                            @else
                                            <b>TBC</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center stats-section mt-3">
                                     
                                        @if($member > 0)
                                        @if($chart_data->lead_id)
                                        @foreach(DB::table('members')->get() as $r)
                                        @if($r->id == $chart_data->lead_id)
                                        <div class="ml-2">
                                            @if($r->image != NULL)
                                            <img src="{{asset('public/assets/images/'.$r->image)}}" width="25" height="25" alt="lead">
                                            @else
                                            <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" width="25" height="25" alt="lead">
                                            @endif
                                            <span>{{$r->name}} {{ $r->last_name }}</span>
                                        </div>
                                        @endif
                                        @endforeach
                                        @endif
                                        @endif
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $months = [];
                            $value = [];
                            $color = [];
                            foreach ($alldata as $month) {
                                if ($month->kpi_id == $chart_data->id) {
                                    $months[] = \Carbon\Carbon::parse($month->check_date)->format('M d');
                                    $value[] = $month->value;
                                    if($month->status == 'On Track')
                                        {
                                        $color[] = '#539884';
                                        }elseif($month->status == 'At Risk')
                                        {
                                        $color[] = '#f7cd55';
                                        }else
                                        {
                                        $color[] = '#f35a47';
                                        }
                                }
                            }
                        @endphp
                        <div class="card-body" style="height: 350px;">
                            <canvas id="lineChart{{ $chart_data->id }}"></canvas>
                        </div>
                        @if(count($alldata) > 0)
                        @foreach ($alldata as $graph)
                            @if ($graph->kpi_id == $chart_data->id)
                                @php
                                    $max = max($value);
                             
                                
                                $extraLineData = 0;    
                                if($chart_data->target_value != NULL)
                                {
                                $extraLineData = $chart_data->target_value;
                                }
                                
                                $extraLineDataG = 0;
                             
                                @endphp

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@1.0.1"></script>
                                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8/hammer.min.js"></script>
                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
                                <script>
                                    var chartData{{ $graph->id }} = @json($graph);

                                    var ctxLine{{ $graph->id }} = document.getElementById('lineChart{{ $graph->kpi_id }}').getContext(
                                        '2d');

                                     var maxLinebar = @json($maxlinebar);
                                
                                      var calculatedMaxbar = Math.ceil(maxLinebar / 25) * 25;
                                      var calculatedMaxbarNew = (calculatedMaxbar + 100);
                                     
                                    var extraLineData = "{{$chart_data->target_value}}";
                                    // var extraLineDataSs = [0,extraLineData];
                                //    var extraLineDataa = Array(@json($value).length).fill(extraLineData);
                                      var extraLineDataa = Array.from({length: @json($value).length}, (_, i) => i === 0 ? 0 : extraLineData);

                                               
                                //     var maxValue = Math.max(...@json($value), ...extraLineData, ...extraLineData);
                                //     extraLineDataS[extraLineDataS.length - 1] = maxValue;
                                     
                                       

                                      

                                       var lineChart= new Chart(ctxLine{{ $graph->id }}, {
                                        type: 'line', // Corrected to create a line chart
                                        data: {
                                            labels: @json($months),
                                            datasets: [{
                                                    label: 'Status',
                                                    data: @json($value),
                                                    borderColor: 'gray',
                                                    fill: false,
                                                    borderWidth: 2,
                                                    pointRadius: 5,
                                                    backgroundColor:@json($color),
                                                    tension: 0.5
                                                },
                                                {
                                                label: 'Trend Line',
                                                data: extraLineDataa,
                                                fill: false,
                                                borderWidth: 1.5,
                                                borderColor: 'gray',
                                                borderDash: [5, 5],
                                                borderWidth: 2,
                                                pointRadius: 0,
                                            },
                                                
                                               
                                            ]
                                        },
                                        options: {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                scales: {
                                                    x: {
                                                        beginAtZero: true,
                                                    },
                                                    y: {
                                                        beginAtZero: true,
                                                        max: calculatedMaxbarNew,
                                                    },
                                                },
                                                plugins: {
                                                    zoom: {
                                                        pan: {
                                                            enabled: true,
                                                            mode: 'xy',
                                                            speed: 10, // Adjust the speed of dragging
                                                        },
                                                        zoom: {
                                                            wheel: {
                                                                enabled: false,
                                                            },
                                                            drag: {
                                                                enabled: false,
                                                            },
                                                            pinch: {
                                                                enabled: false,
                                                            },
                                                            mode: 'xy',
                                                        }
                                                    },
                                                    legend: {
                                                        display: false,
                                                    
                                                    }
                                                }
                                            }
                                    });
                                    
                                         

                                     function resetZoom(val) {
                            
                                        lineChart.resetZoom(val);
                                    }
                                </script>
                                @else
                                <script>
        
                                    var ctxLine{{ $chart_data->id }} = document.getElementById('lineChart{{$chart_data->id }}').getContext(
                                        '2d');
        
                                     var maxLinebar = @json($maxlinebar);
                                
                                      var calculatedMaxbar = Math.ceil(maxLinebar / 25) * 25;
                                      var calculatedMaxbarNew = (calculatedMaxbar + 100);
                                     
                                    var extraLineData = "{{$chart_data->target_value}}";
                                    var extraLineDataSs = [0,extraLineData];
               
        
                                       var lineChart= new Chart(ctxLine{{ $chart_data->id }}, {
                                        type: 'line', // Corrected to create a line chart
                                        data: {
                                            labels: extraLineDataSs,
                                            datasets: [{
                                            label: 'Actual Line',
                                            data: extraLineDataSs,
                                            fill: false,
                                                borderWidth: 1.5,
                                                borderColor: 'gray',
                                                borderDash: [5, 5],
                                                borderWidth: 2,
                                                pointRadius: 0,
                                                },
                                                
                                                
                                               
                                            ]
                                        },
                                        options: {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                scales: {
                                                    x: {
                                                        beginAtZero: true,
                                                    },
                                                    y: {
                                                        beginAtZero: true,
                                                        max: calculatedMaxbarNew,
                                                    },
                                                },
                                                plugins: {
                                                    zoom: {
                                                        pan: {
                                                            enabled: true,
                                                            mode: 'xy',
                                                            speed: 10, // Adjust the speed of dragging
                                                        },
                                                        zoom: {
                                                            wheel: {
                                                                enabled: true,
                                                            },
                                                            drag: {
                                                                enabled: true,
                                                            },
                                                            pinch: {
                                                                enabled: true,
                                                            },
                                                            mode: 'xy',
                                                        }
                                                    },
                                                    
                                                }
                                            }
                                    });
                                    
                                         
        
                                     function resetZoom(val) {
                            
                                        lineChart.resetZoom(val);
                                    }
                                </script>
                            @endif
                        @endforeach
                        @else
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="mr-2"><b>Updated on</b></div>
                                <div class="">
                                    <small>{{ \Carbon\Carbon::parse($chart_data->updated_at)->format('M d Y') }}</small>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="mr-2">
                                  <div class="circle white"></div>
                                 </div>
                                        @if($chart)
                                        @if($chart->status == 'On Track')                              
                                        <div class="mr-2">
                                            <div class="circle green"></div>
                                        </div>
                                        <div><small>Status (Green)</small></div>
                                        @endif

                                        @if($chart->status == 'At Risk')                              
                                        <div class="mr-2">
                                            <div class="circle red"></div>
                                        </div>
                                        <div><small>Status (Red)</small></div>
                                        @endif

                                        @if($chart->status == 'Off Track')                              
                                        <div class="mr-2">
                                            <div class="circle amber"></div>
                                        </div>
                                        <div><small>Status (Amber)</small></div>
                                        @endif
                                        @else
                                        <div><small>No Status</small></div>
                                        @endif
                                    
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      


            <div class="modal fade" id="edit-chart-kpi{{$chart_data->id}}" tabindex="-1" role="dialog" aria-labelledby="create-chart"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 526px !important;">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="success-chart" role="alert"></div>
                                <span id="chart-feild-error" class="ml-3 text-danger"></span>
                                <span id="green-feild-error" class="ml-3 text-danger"></span>
                            </div>
                        </div>
                     
                            <div class="d-flex flex-row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="modal-title" id="">New KPI</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Add a Kpi CVC file</p>
                                    </div>
                                    <div id="success-chart" role="alert"></div>
                                    <span id="chart-feild-error" class="ml-3 text-danger"></span>
                                </div>
                                <div class="ml-auto">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <img src="{{ asset('public/assets/images/icons/minus.svg') }}">
                                    </button>
                                </div>
                            </div>
                            <form class="needs-validation" action="{{url('update-kpi-basic')}}"  method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$chart_data->id}}">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" value="{{$chart_data->title}}" name="title" required id="title">
                                        <label for="objective-name">Title</label>
                                    </div>
                                </div>
                           
                             
                            </div>
    
                     
                            <div class="row">
                                    <div class="col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" value="{{$chart_data->target_value}}" onkeypress="return onlyNumberKey(event)"
                                                 name="t_value" id="t_value">
    
                                            <label for="objective-name">Target Value</label>
                                        </div>
                                    </div>
                        
                                    
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control"
                                                name="symbol" id="symbol" value="{{$chart_data->symbol}}">
                                            <label for="start-date" style="bottom:72px">Symbol</label>
                                        </div>
                                    </div>
    
                                      
                                    <div class="col-md-5 col-lg-5 col-xl-5">
                                        <div class="form-group mb-0">
                                            <input type="date" class="form-control"  min="{{ date('Y-m-d') }}"
                                                name="t_date"  value="{{$chart_data->target_date}}">
                                            <label for="start-date" style="bottom:72px">Target Date</label>
                                        </div>
                                    </div>
    
                                
    
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <select class="form-control" name="lead_manager" id="lead_manager">
                                                <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                                  <option @if($chart_data->lead_id == $r->id) selected   @endif  value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                                <?php }  ?>
                                            </select>
                                            <label for="lead-manager">Lead</label>
                                        </div>
                                    </div>
                                
        
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <textarea type="text" class="form-control"
                                                value="" cols="5" name="summary" id="summary">{{$chart_data->summary}}</textarea>
                                            <label for="objective-name">Summary</label>
                                        </div>
                                    </div>
    
                              
                               
                             
    
                                </div>
    
    
                    </div>
    
                    <div class="modal-footer">
                        <div class="d-flex align-items-end">
                            <button type="submit"  class="btn btn-primary  btn-sm ml-4">Update</button>
                        </div>
                        </form>
                       
                    </div>
    
                </div>
            </div>
        </div> 
        
        
        <div class="modal fade" id="delete{{ $chart_data->id }}" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete KPI</h5>
                     <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <form method="POST" action="{{ url('delete-kpi-chart') }}">
                     @csrf
                     <input type="hidden" name="delete_id" value="{{ $chart_data->id }}">
                     <div class="modal-body">
                        Are you sure you want to delete this KPI?
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                           data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
    @endforeach





</div>
@endif

    @include('KPI.kpi_script')




@endsection
