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
        @if ($KEYChart)
        @php
             
        $value = [];
        $keyqvalue = DB::table('key_quarter_value')
            ->where('key_chart_id', $KEYChart->id)
            // ->orderby('id', 'DESC')
            ->get();

            $Qvalue = [];
            $Qname = [];
            $KEYChartQ1 = DB::table('key_chart')
            ->where('key_id', $key->id)
            ->whereIn('IndexCount', [1, 2, 3, 4])
            ->get();
            if(count($KEYChartQ1) > 0)
            {
            foreach ($KEYChartQ1 as $allQ) 
            {
            $Qvalue[] = $allQ->quarter_value;
            $Qname[] = 'Q'.$allQ->IndexCount;
            }
            }else
            {
                $Qvalue = [];
            $Qname = [];
            }

         @endphp
         
       
       @if(count($keyqvalue) > 0)

       @php
        
        if(count($keyqvalue) <= 1 )
        {
        $value[] = ['Label1','Label2'];
      
        }else
        {
        foreach ($keyqvalue as $chart) {
        $value[] = $chart->value;
        }
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
var dataset2 = @json($value);

var labels = @json($Qname);

for (var i = labels.length; i < dataset2.length; i++) {
    // labels.push("Data Point " + (i + 1));
}

var data = {
    labels: labels.concat(new Array(dataset2.length - labels.length).fill("")),
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
     
     var extraLineData = "{{$KEYChart->quarter_value}}";
     var extraLineDataS = [0,extraLineData];

  
 
   
       
      

       var lineChart = new Chart(ctxLine, {
        type: 'line', 
        data: {
            labels:@json($value),
            datasets: [{
                    label: 'Actual Line',
                    data:@json($value),
                    borderColor: 'gray',
                    fill: false,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                    ],
                 
                    borderWidth: 2,
                },
                {
                label: 'Quarter (Target) Line',
                data:extraLineDataS,
                borderColor: 'gray', 
                borderWidth: 1.5,
                fill: false,
                borderDash: [5, 5],
                                                          
                },

      
             
              
            ]
        },
        
        options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        display: false,
                        
                    },
                    y: {
                        beginAtZero: true,
                        stepSize: 150,
                        
                    },
                },
          
            }
    });
    

    
  
</script>
@endif