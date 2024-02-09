@php
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
   <div class="subheader subheader-solid breadcrums" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
                            <!--begin::Page Title-->
                          
                            <div class="d-flex flex-row">
                                <div>
                                    @if($organization->type == 'unit' || $organization->type == 'stream')
                                    <span style="font-size:22px" class="material-symbols-outlined">groups</span>

                                    @endif

                                    @if($organization->type == 'BU' || $organization->type == 'VS' )
                                    <span style="font-size:22px" class="material-symbols-outlined">folder_supervised</span>

                                    @endif
                                </div>
                                <div>
                                    @if($organization->type == 'unit' || $organization->type == 'stream')
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                        Teams
                                    </h5>
                                    @endif

                                    @if($organization->type == 'BU' || $organization->type == 'VS' )
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                        Dashboard
                                    </h5>
                                    @endif
                                </div>
                            </div>
                            <!-- Breadcrum Items -->
                           <div class="d-flex flex-row page-sub-titles align-items-center">
                                <div class="mr-2">
                                    @if($organization->type == 'BU')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                
                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'unit')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                
                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'orgT')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">home</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                
                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'org')
                                    <a  href="{{url('dashboard/organizations')}}" style="text-decoration: none;" >Dashboard</a>
                                    @endif

                                    @if($organization->type == 'VS')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">auto_stories</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>

                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'stream')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" style="text-decoration: none;" >Dashboard</a>
                                    @endif

                                    

                                    

                                    
                                </div>

                @if($organization->type == 'VS')                
                <div class="mr-2">
                    <div class="d-flex">
                        <div>
                            <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" style="text-decoration: none;" >{{$Unit->business_name}}</a>

                        </div>
                    </div>
               
                </div>
                @endif

                @if($organization->type == 'VS')

                <div class="mr-2">
                    <div class="d-flex">
                        <div>
                            <span style="font-size:22px" class="material-symbols-outlined">layers</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->value_name}}</a>

                        </div>
                    </div>
            
                </div>
                @endif

                                <div class="mr-2">
                                    @if($organization->type == 'BU')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="mr-2">
                                    @if($organization->type == 'unit')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->business_name}}</a>
                
                                        </div>
                                    </div>
                                    @endif
                                    @if($organization->type == 'BU')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                
                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'orgT')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                
                                        </div>
                                    </div>
                                    @endif

                                    @if($organization->type == 'stream')
                                    <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                                    @endif

                                    @if($organization->type == 'VS')
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                                        </div>
                                        <div>
                                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->team_title}}</a>
                
                                        </div>
                                    </div>
                            
                                    @endif
                                </div>
                            
                           
                                @if($organization->type == 'unit')
                                <div class="d-flex">
                                    <div>
                                        <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                                    </div>
                                    <div>
                                        <p>Teams</p>                
                                    </div>
                                </div>
                                @else
                                <div class="mr-2">
                                    <div class="d-flex">
                                        <div>
                                            <span style="font-size:22px" class="material-symbols-outlined">folder_supervised</span>
                                        </div>
                                        <div>
                                            <p>Dashboard</p>                
                                        </div>
                                    </div>
                                 
                                </div>
                                @endif

                            </div>
                            <!--End Breadcrum Items -->
                        </div>
                        <!--end::Info-->
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center toolbar">
                            <div>
                                @if($organization->type == 'unit')
                                <button class="button" type="button" data-toggle="modal" data-target="#add-team">
                                    Create Team
                                </button>
                                @endif
                            </div>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>