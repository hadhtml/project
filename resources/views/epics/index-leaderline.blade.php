@php
$var_objective = 'leaderline-'.$type;
@endphp
@extends('components.main-layout')
@if($type == 'unit')
<title>BU-Dependency Map</title>
@endif
@if($type == 'stream')
<title>VS-Dependency Map</title>
@endif
@if($type == 'VS')
<title>Dependency Map-{{$organization->team_title}}</title>
@endif
@if($type == 'BU')
<title>Dependency Map-{{$organization->team_title}}</title>
@endif
@if($type == 'orgT')
<title>Dependency Map-{{$organization->team_title}}</title>
@endif
@if($type == 'org')
<title>Org-Dependency Map</title>
@endif
<style type="text/css">
    /* Your existing styles remain unchanged */
    .dependency-card {
        width: 100%;
        text-align: center;
        font-size: 12px;
    }
    .todo {
        background: gray;
        color: white;
    }
    .in-progress {
        background: #ffe000;
        color: white;
    }
    .done {
        background: #00bc35;
        color: white;
    }
    .my-card {
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        gap: 3px;
        justify-content: center;
    }
    .my-btn {
        width: 30%;
        margin: 8px 5px;
    }
    .card-body-list {
        padding: 10px 0px;
    }

    .card-list
    {
    border-radius: 12px;
    /* background: var(--white, #FFF); */
    box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.05);
    border: transparent !important;
    }

 
</style>
<title>BU-OKR Mapper</title>
@section('content')

        @php
        $data = array();
        $block = array();
        $monthId = array();
        $maps = DB::table('dependency_map')->where('bussiness_unit_id',$organization->id)->get();
        
        foreach($maps as $map) {
            $data[] = $map->id;
            $monthId[] = $map->month_id;
        
            $mapblocks = DB::table('dependency_map_link')
            ->where('dependency_map_id', $map->id)
            ->distinct()
            ->pluck('block');
  

            
            
            foreach($mapblocks as $mapblock) {
                $block[$map->id][] = array(
                'block' => $mapblock,
                // 'block_type' => $mapblock->block_type,
                // 'dependency_map_id' => $mapblock->dependency_map_id,
     );
            }

            
        }

        $month = DB::table('quarter_month')->where('org_id',$organization->id)->whereIn('id',$monthId)->get();

        // $mapblock = DB::table('dependency_map_link')->select('block')->distinct()->whereIn('dependency_map_id',$data)->get();
   

        
   
        @endphp
        

        <div class="container-fluid p-5">
            
            <div class="row">
                @foreach($month as $months)
                <div class="col-md-3">
                    <div class="card-list">
                        <div class="card-header text-center">
                            {{$months->month}}
                        </div>
                        <div class="card-body-list">
                            <div class="my-card">
                                @foreach($maps as $map)
                                @if($map->month_id == $months->id)
                                
                                <div class="my-btn">
                                    <a href="#" id="epic-{{$map->id}}" style="background-color:grey"  class="btn  dependency-card todo">OE-{{$map->blocked_by}}</a>
                                </div>

                              
        
                    
                               

                                @foreach($block[$map->id] as $linked_item)
                                
                                <div class="my-btn ml-4">
                                    <a href="#"  style="background-color:grey" class="btn  point-to{{$map->id}} dependency-card todo">OE-{{$linked_item['block']}}</a>
                                </div>
                           

                                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/leader-line@1.0.5/leader-line.min.js"></script>
                        
                                <script>
                                window.addEventListener('load', function() {
                                'use strict';
                        
                                var element3 = document.getElementById('epic-{{$map->id}}');
                                var buttons = document.querySelectorAll('.point-to{{$map->id}}');
                        
                                buttons.forEach(function(button, index) {
                                    // Set different anchor positions for each arrow
                                    var anchorPosition = { x: (index + 1) * 2 + '%', y: (index + 1) * 15 + '%' };
                        
                                    // Check available space on each side of the button
                                    var leftSpace = element3.offsetLeft;
                                    var rightSpace = window.innerWidth - (element3.offsetLeft + element3.offsetWidth);
                                    var topSpace = element3.offsetTop;
                                    var bottomSpace = window.innerHeight - (element3.offsetTop + element3.offsetHeight);
                        
                                    // Adjust anchor position based on available space
                                    if (leftSpace < rightSpace) {
                                        anchorPosition.x = '0%';  // Point to the left if more space on the left
                                    } else {
                                        anchorPosition.x = '100%';  // Point to the right if more space on the right
                                    }
                        
                                    if (topSpace < bottomSpace) {
                                        anchorPosition.y = '0%';  // Point to the top if more space on the top
                                    } else {
                                        anchorPosition.y = '100%';  // Point to the bottom if more space on the bottom
                                    }
                        
                                    new LeaderLine(button, LeaderLine.pointAnchor(element3, anchorPosition), {
                                        size: 2,
                                        startSocket: 'auto',
                                        endSocket: 'auto',
                                        startPlug: 'disc',
                                        path: 'fluid',
                                        endPlug: 'arrow1'
                                    });
                                });
                        
                            });
                        </script>
                            
                            @endforeach
                            @endif
                            @endforeach
                              

                              
                      
                            
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
{{-- 
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            Jan 2024
                        </div>
                        <div class="card-body">
                            <div class="my-card">
                                <div class="my-btn">
                                    <a id="epic-3" href="#" class="btn btn-default dependency-card todo">SSP-4</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

      



        @endsection