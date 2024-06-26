<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">monitoring</span>
                </div>
                <div>
                    <h4>Charts</h4>
                </div>

             



            

            </div>
        </div>
        @php
  
        @endphp
        @if ($KEYChart)
        @php
             
        $value = [];
        $QId = [];
        $color = [];
        $allvalue = [];
        $allcolor = [];

        $formattedDate = '';
        $maxlinebar = 0;

            $Qvalue = [];
            $Qname = [];
            
            $KEYChartQ1 = DB::table('key_chart')
            ->where('key_id', $key->id)
            ->whereIn('IndexCount', [1, 2, 3, 4])
            ->get();
            if(count($KEYChartQ1) > 0)
            {
            if(count($KEYChartQ1) <= 1 )
            {
             $Qvalue[] = [0,$allQ->quarter_value];
      
             }else
             {

            foreach ($KEYChartQ1 as $allQ) 
            {
            $Qvalue[] = $allQ->quarter_value;
            $Qname[] = 'Q'.$allQ->IndexCount;
            $QId[] =   $allQ->id;
            }
             }
          
            // array_unshift($Qvalue, 0);
            }else
            {
            $Qvalue = [];
            $Qname = [];
            }

            $keyqvalue = DB::table('key_quarter_value')
            ->where('key_chart_id',$KEYChart->id)
            ->orderby('created_at', 'ASC')
            ->get();

            // $keyqvaluemax = DB::table('key_quarter_value')
            //             ->where('key_chart_id', $KEYChart->id)
            //             ->orderby('id', 'DESC')
            //             ->first();

            $keyqvalueAll = DB::table('key_quarter_value')
            ->whereIn('key_chart_id',$QId)
            ->orderby('created_at', 'ASC')
            ->get();

         @endphp
         
         @if(count($keyqvalueAll) > 0)

         @php
        
        foreach ($keyqvalueAll as $allchart) {
        $allvalue[] = $allchart->value;
        if($allchart->status == 'On Track')
        {
        $allcolor[] = '#539884';
        }elseif($allchart->status == 'At Risk')
        {
        $allcolor[] = '#f7cd55';
        }else
        {
        $allcolor[] = '#f35a47';
        }
        }
      
                    

       @endphp
         @endif  
       
       @if(count($keyqvalue) > 0)

       @php
        
        if(count($keyqvalue) <= 1 )
        {
        $value[] = ['Label1','Label2'];
      
        }else
        {
        foreach ($keyqvalue as $chart) {
        $value[] = $chart->value;
        if($chart->status == 'On Track')
        {
        $color[] = '#539884';
        }elseif($chart->status == 'At Risk')
        {
        $color[] = '#f7cd55';
        }else
        {
        $color[] = '#f35a47';
        }
       
        $maxlinebar = max($value);
        }
        }
       
      
      
    $currentDate = \Carbon\Carbon::now();
    $currentYear = $currentDate->year;
    $currentMonth = $currentDate->month;
    $yearMonthString = $currentDate->format('Y');
    $yearMonth = $currentDate->format('F');
    $CurrentQuarter = '';
    $formattedDate = '';

    $CurrentQuarter = DB::table('quarter_month')
                    ->where('org_id',$key->unit_id)
                    ->where('month',$yearMonth)
                    ->where('year',$yearMonthString)->first();
    if($CurrentQuarter)
    {
        $Quarter = DB::table('quarter_month')
                    ->where('quarter_id',$CurrentQuarter->quarter_id)
                    ->orderby('id','DESC')
                    ->first();

    $monthNumber = \Carbon\Carbon::parse($Quarter->month)->month;
    $firstDayOfNextMonth = \Carbon\Carbon::create(null, $monthNumber + 1, 1, 0, 0, 0);
    $lastDayOfMonth = $firstDayOfNextMonth->subDay();
    $formattedDate = $lastDayOfMonth->toDateString();

    

    }                 

       @endphp
       @endif
    


       
        
     
        
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Current Quarter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Overall</a>
            </li>
         
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card-body" style="height: 250px;">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card-body" style="height: 250px;">
                    <canvas id="lineChart2"></canvas>
                </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
<script>


var dataset1 = @json($Qvalue);
var dataset2 = @json($allvalue);
var alldatasetcolor = @json($allcolor);

var labels = @json($Qname);

for (var i = labels.length; i < dataset2.length; i++) {
    // labels.push("Data Point " + (i + 1));
}

var data = {
    labels: labels,
    datasets: [{
        label: 'Quarter Target',
        data: dataset1,
        borderColor: 'rgb(255, 99, 132)',
        fill: false,
        borderColor: 'gray', 
        borderWidth: 1.5,
        borderDash: [5, 5],
        pointStyle: 'circle',
        pointRadius: 5,
        pointHoverRadius: 5,
        backgroundColor:'blue',
     
    }, {
        label: 'Check-in Value',
        data: dataset2,
        borderColor: 'gray',
        fill: false,
        pointRadius: 5,
        borderWidth: 1.5,
        backgroundColor:alldatasetcolor,
       
    }]
};


var ctx = document.getElementById('lineChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        scales: {
            x: {
            beginAtZero: true,
                      
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
  
</script>
            </div>
          
          </div>
        
  
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
<script>


    var ctxLine = document.getElementById('lineChart').getContext(
        '2d');
    if (window.lineChart !== undefined) 
    {
    window.lineChart.destroy(); 
    }
     
var extraLineData = {{$KEYChart->quarter_value}}; // Assuming $KEYChart->quarter_value is a numeric value

var actualData = @json($value);
var color = @json($color);

var formattedDate = "{{$formattedDate}}";

// var extraLineDataS = Array.from({length: actualData.length}, (_, i) => i === 0 ? 0 : extraLineData);
// var extraLineDataS = Array(actualData.length).fill(extraLineData);
var maxLinebar = "{{$maxlinebar}}";

var extraLineDataS = Array.from({
        length: @json($value).length
    }, (_, i) => i === 0 ? 0 : extraLineData);

                                        
var calculatedMaxbar = Math.ceil(maxLinebar / 25) * 25;
var calculatedMaxbarNew = (calculatedMaxbar + 50);

var lineChart = new Chart(ctxLine, {
    type: 'line', 
    data: {
        labels:actualData,
        datasets: [{
            label: 'Actual Line',
            data: actualData,
            borderColor: 'gray',
            fill: false,
            backgroundColor:color,
            borderWidth: 2,
            pointRadius: 5,
        },
        {
            label: 'Quarter (Target) Line (' + formattedDate + ')',
            data: extraLineDataS,
            borderColor: 'gray', 
            fill: false,
            borderDash: [5, 5],
            borderWidth: 2,
            pointRadius: 0,
            
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true,
                display: false,
                stepSize:20,
            },
            y: {
                beginAtZero: true,
                stepSize:20,
                max: calculatedMaxbarNew,
            },
        },
    }
});
    

    
  
</script>
@endif
