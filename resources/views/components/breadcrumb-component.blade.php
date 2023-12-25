@php
$sprint = DB::table('sprint')->where('user_id',Auth::id())->where('value_unit_id',$organization->id)->where('status',NULL)->count();



@endphp
<style>
    
</style>

<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                OKR Planner
            </h5>
            <div class="d-flex flex-row page-sub-titles">
                 <div class="mr-2">
                    @if($organization->type == 'unit')
                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                    @endif

                    @if($organization->type == 'stream')
                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                    @endif
                    @if($organization->type == 'BU')
                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                    @endif
                    @if($organization->type == 'VS')
                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                    @endif
                    @if($organization->type == 'org')
                    <a  href="{{url('dashboard/organizations')}}" style="text-decoration: none;" >Dashboard</a>
                    @endif
                    @if($organization->type == 'orgT')
                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                    @endif
                   
                    </div>
                               
                             
                                <div class="mr-2">
                                    @if($organization->type == 'stream')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                                    @endif
                                    
                                     @if($organization->type == 'unit')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                                    @endif

                                    @if($organization->type == 'BU')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                    @endif
                                    @if($organization->type == 'VS')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                    @endif
                                    @if($organization->type == 'orgT')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                    @endif
                                </div>
                                <div class="mr-2">
                                    <p>OKR Planner</p>
                                </div>
            </div>
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
     
        <div class="d-flex align-items-center toolbar">
            <div class="d-flex flex-row organization-drop align-items-center mr-3">
                @if($type == 'unit')  
                <div class="d-flex flex-column mr-3">
                    <div style="padding:20px">
                    Team
                  
                    <select class="chkveg" multiple="multiple" >
                        @foreach(DB::table('unit_team')->where('org_id',$organization->id)->get() as $r)
                        <option value="{{$r->id}}">{{$r->team_title}}</option>
                        @endforeach
                    
                     
                    </select>
                       <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetEpicTeamSearch();" >
                       <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                       </button>
                    </div>
      
                </div> 
                @endif

                @if($type == 'stream')  
                <div class="d-flex flex-column mr-3">
                    <div style="padding:20px">
                    Team
                  
                    <select class="chkveg" multiple="multiple" >
                        @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
                        <option value="{{$r->id}}">{{$r->team_title}}</option>
                        @endforeach
                    
                     
                    </select>
                       <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetEpicTeamSearch();" >
                       <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                       </button>
                    </div>
      
                </div> 
                @endif

                @if($type == 'org')  
                <div class="d-flex flex-column mr-3">
                    <div style="padding:20px">
                    Team
                  
                    <select class="chkveg" multiple="multiple" >
                        @foreach(DB::table('org_team')->where('org_id',$organization->id)->get() as $r)
                        <option value="{{$r->id}}">{{$r->team_title}}</option>
                        @endforeach
                    
                     
                    </select>
                       <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetEpicTeamSearch();" >
                       <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                       </button>
                    </div>
      
                </div> 
                @endif
 
 
                
                <div class="d-flex flex-column mr-3">
                    <div style="padding:20px">
                          Flag
                    <select class="chkveg" multiple="multiple" >
                       <option value="All">ALL</option>
                      <option value="Risk">Risk</option>
                      <option value="Impediment">Impediment</option>
                       <option value="Blocker">Blocker</option>
                      <option value="Action">Action</option>
                      <option value="null">No Flag</option>
                     
                    </select>
                       <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetFagEpic();" >
                       <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                       </button>
                    </div>
      
                </div>
             
            </div>
            <!--<div class="mr-3">-->
            <!--    <button class="btn-circle btn-tolbar bg-transparent">-->
            <!--        <img src="{{asset('public/assets/images/icons/share.svg')}}" width="20" width="20">-->
            <!--    </button>-->
            <!--    <button class="btn-circle btn-tolbar bg-transparent">-->
            <!--        <img src="{{asset('public/assets/images/icons/calendar.svg')}}" width="20" width="20">-->
            <!--    </button>-->
            <!--    <button class="btn-circle btn-tolbar bg-transparent">-->
            <!--        <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">-->
            <!--    </button>-->
            <!--</div>-->
            <!--<div class="mr-3">-->
            <!--    <div class="symbol-group symbol-hover">-->
            <!--        <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Mark Stone">-->
            <!--            <img alt="Pic" src="https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-chest_176420-18743.jpg?w=2000">-->
            <!--        </div>-->
            <!--        <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Charlie Stone">-->
            <!--            <img alt="Pic" src="https://t4.ftcdn.net/jpg/02/98/28/89/360_F_298288984_8i0PB7s9aWPzi1LeuNGGrnjXkmXRpcZn.jpg">-->
            <!--        </div>-->
            <!--        <div class="symbol symbol-30 symbol-label-counter symbol-circle symbol-light" data-toggle="tooltip" title="" data-original-title="More users">-->
            <!--            <span class="symbol-label font-weight-bold">5+</span>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            @if($sprint > 0)
            <div id="sprint-end">
                <button class="button mr-1" data-toggle="modal" data-target="#" onclick="endquarter()">End Quarter</button>
            </div>
            @else
             <div id="sprint-end">
                <button class="button mr-1" data-toggle="modal" data-target="#create-report">Start Quarter</button>
            </div>
            @endif
            <div>
                <button class="button" data-toggle="modal" data-target="#create-objective">Add New</button>
            </div>
        </div>
        <!--end::Toolbar-->
    </div>
</div>