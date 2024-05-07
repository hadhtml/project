@php
if($organization->type == 'BU')
{
$team  = DB::table('business_units')->where('id',$organization->org_id)->first();  
}
if($organization->type == 'stream')
{
$team  = DB::table('business_units')->where('id',$organization->unit_id)->first();  
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
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            @if(url()->current() == route('settings.security'))
            <span class="material-symbols-outlined">key</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Change Password
            </h1>
            @endif
            @if(url()->current() == url('organization/dashboard'))
            <span class="material-symbols-outlined">subscriptions</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Choose Your Plan
            </h1>
            @endif
            @if (url()->current() == url('Okr-report/'.$Sid.'/'.$organization->type))     
            <span class="material-symbols-outlined">Summarize</span>
            OKR Epics
            @elseif(url()->current() == url('Okr-report-3/'.$Sid.'/'.$organization->type))
            <span  class="material-symbols-outlined">Summarize</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0"> OKR Figures</h1>   
            @elseif(url()->current() == url('dashboard/organization/Okr-report-all/'.$Sid.'/'.$organization->type))
            <span  class="material-symbols-outlined">Summarize</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0"> Epics Completed</h1>
            @elseif(url()->current() == url('dashboard/organization/Okr-report-NC/'.$Sid.'/'.$organization->type))
            <span  class="material-symbols-outlined">Summarize</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0"> Epics Not Completed</h1>
            @elseif(url()->current() == url('dashboard/organization/Okr-report-remove/'.$Sid.'/'.$organization->type))
            <span class="material-symbols-outlined">Summarize</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0"> Epics Removed</h1>
            @elseif(url()->current() == url('dashboard/organization/Okr-report-allepic/'.$Sid.'/'.$organization->type))
            <span  class="material-symbols-outlined">Summarize</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0"> All Epics</h1>
            @else
            <span  class="material-symbols-outlined">Summarize</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">  Report</h1>
            @endif
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}"  class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}"  class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}"  class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'org')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a  href="{{ route('organization.dashboard') }}"  class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'orgT')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">home</span>
                <a  href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}"  class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif

            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a  href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}"  class="text-muted text-hover-primary">{{$Unit->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}"  class="text-muted text-hover-primary">{{$team->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
 
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}"  class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif

            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}"  class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
                    
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}"  class="text-muted text-hover-primary">{{$organization->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
           
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}"  class="text-muted text-hover-primary">{{$organization->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif

           @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}"  class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}"  class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if($organization->type == 'orgT')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}"  class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
           @endif
           @if (url()->current() == url('Okr-report/'.$Sid.'/'.$organization->type))
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">Summarize</span>
                OKR Epics
            </li>                   
            @endif
            @if (url()->current() == url('dashboard/organization/Okr-report-all/'.$Sid.'/'.$organization->type))
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">Summarize</span>
                Epics Completed
            </li>                                       
            @endif
            @if (url()->current() == url('Okr-report-3/'.$Sid.'/'.$organization->type))
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">Summarize</span>
                OKR Figures
            </li>                                         
            @endif
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">Summarize</span>
                Reports
            </li>
        </ul>
    </div>
</div>