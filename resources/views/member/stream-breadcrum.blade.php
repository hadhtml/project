@php

$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  

@endphp

 <div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
       
            <div class="d-flex flex-row">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">layers</span>
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        Value Stream
                    </h5>
                </div>
            </div>
            <div class="d-flex flex-row page-sub-titles">
                <div class="mr-2">
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

                </div>
                
                <div class="mr-2">
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" style="text-decoration: none;" >{{$team->business_name}}</a>
                        </div>
                    </div>
                </div>
         
                <div class="mr-2">
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">layers</span>
                        </div>
                        <div>
                            <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->value_name}}</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS'))
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">groups</span>
                        </div>
                        <div>
                           <p> Teams </p>                       
                        </div>
                    </div>
                
                    @else
                 
                    <div class="d-flex">
                        <div>
                            <span style="font-size:19px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                           <p> Dashboard  </p>                      
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center toolbar">
            <div class="mr-3">
                <!--<a href="#" class="btn btn-default">-->
                <!--    OKRs</a>-->
            </div>
            <div>
                @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/VS-TEAMS'))
                <button class="button" type="button" data-toggle="modal" data-target="#add-team-stream">
                    Add New
                </button>
                @endif
            </div>
        </div>
        <!--end::Toolbar-->
    </div>
</div>
