@php
$sprint = DB::table('sprint')->where('user_id',Auth::id())->where('value_unit_id',$organization->id)->where('status',NULL)->count();


if($organization->type == 'stream')
{
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
}

if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}

if($organization->type == 'VS')
{
$team  = DB::table('value_stream')->where('id',$organization->org_id)->first();
$Unit  = DB::table('business_units')->where('id',$team->unit_id)->first();  

}

if($organization->type == 'orgT')
{
$team  = DB::table('organization')->where('id',$organization->org_id)->first();  
}


@endphp
<style>
    
</style>

<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <div class="d-flex flex-row">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">folder_supervised</span>
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        OKR Planner
                    </h5>
                </div>
            </div>
            <div class="d-flex flex-row page-sub-titles">
                 <div class="mr-2">
                    @if($organization->type == 'unit')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                    @endif

                    @if($organization->type == 'stream')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                    @endif
                    @if($organization->type == 'BU')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                    @endif
                    @if($organization->type == 'VS')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                    @endif
                    @if($organization->type == 'org')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organizations')}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                    @endif
                    @if($organization->type == 'orgT')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                    @endif
                   
                    </div>
                   
                    <div class="mr-2">
                        @if($organization->type == 'stream')
                        <div class="d-flex">
                            <div>
                                <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                            </div>
                            <div>
                                <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                            </div>
                        </div>
                        @endif
                 

           
                        @if($organization->type == 'BU')
                        <div class="d-flex">
                            <div>
                                <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                            </div>
                            <div>
                                <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                            </div>
                        </div>
                        @endif
     

                    @if($organization->type == 'VS')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" style="text-decoration: none;" >{{$Unit->business_name}}</a>
                        </div>
                    </div>
                 

                
                 
                    @endif

                    @if($organization->type == 'VS')
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">layers</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->value_name}}</a>
                        </div>
                    </div>
                    @endif

                </div>

                    
             
                               
                             
                                <div class="mr-2">
                                    @if($organization->type == 'stream')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">layers</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                                        </div>
                                    </div>
                                    @endif
                                    
                                     @if($organization->type == 'unit')
                                     <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'BU')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">groups</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($organization->type == 'VS')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">groups</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($organization->type == 'orgT')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">home</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                                        </div>
                                    </div>
                                    @endif
                                    {{-- @if($organization->type == 'org')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->organization_name}}</a>
                                    @endif
                                   --}}
                                </div>
                                <div class="mr-2">
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:19px" class="material-symbols-outlined">folder_supervised</span>
                                        </div>
                                        <div>
                                            <p>OKR Planner</p>
                                        </div>
                                    </div>
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
                        <option value="0">Unassigned</option>
                    
                     
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
                        <option value="0">Unassigned</option>
                    
                     
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
                        <option value="0">Unassigned</option>
                    
                     
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
                    <select class="flag-search" multiple="multiple" >
                      <option value="Risk">Risk</option>
                      <option value="Impediment">Impediment</option>
                       <option value="Blocker">Blocker</option>
                      <option value="Action">Action</option>
                      <option value="0">No Flag</option>
                     
                    </select>
                       <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetFagEpic();" >
                       <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                       </button>
                    </div>
      
                </div>
             
            </div>
            @if($sprint > 0)
            <div id="sprint-end">
                <button class="button mr-1" id="endquarterbutton" data-toggle="modal" data-target="#" onclick="endquarter()">End Quarter</button>
            </div>
            @else
             <div id="sprint-end">
                <button class="button mr-1"  onclick="startquarter()">Start Quarter</button>
            </div>
            @endif
            <div>
                <button class="button" onclick="addnewobjective({{$organization->id}} , '{{ $organization->type }}', '{{ $organization->slug }}')">Add New</button>
            </div>
        </div>
        <!--end::Toolbar-->
    </div>
</div>