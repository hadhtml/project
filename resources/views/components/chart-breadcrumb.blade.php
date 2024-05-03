<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0" style="text-transform: capitalize;">
            Performance Dashboard
        </h1>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            <li class="breadcrumb-item text-muted">
                <a href="index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Performance Dashboard</li>
        </ul>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add Member</a>
            <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">New Campaign</a>
        </div>
    </div>
</div>
<!-- begin breadcrums -->
<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Performance Dashboard
            </h5>
          <div class="d-flex flex-row page-sub-titles align-items-center">
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
                <a  href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
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
                    <p>Performance Dashboard</p>
                </div>
               </div>
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center toolbar">
            
            <div class="dropdown dropleft mr-2">
                <div class="d-flex flex-column mr-3">
                    <div style="padding:20px">
                          Filter
                    <select class="chkveg" multiple="multiple" >
                      <option value="Green">Green</option>
                      <option value="Amber">Amber</option>
                       <option value="Red">Red</option>
                      <option value="N">N</option>
                     
                    </select>
                       <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="chart_status();" >
                       <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="20" width="20">
                       </button>
                    </div>
      
                </div>
                 
                </div>
            <div>
                
                <button class="button" data-toggle="modal" data-target="#create-chart">Add New</button>
            </div>
            
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!-- end breadcrums -->