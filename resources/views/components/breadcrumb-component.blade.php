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

<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            <span class="material-symbols-outlined">folder_supervised</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">OKR Planner
            </h1>
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
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/dashboard/'.$organization->type)}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'org')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">auto_stories</span>
                <a href="{{ route('organization.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'orgT')
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
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$Unit->slug.'/portfolio/'.$Unit->type)}}" class="text-muted text-hover-primary">{{$Unit->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$team->slug.'/portfolio/'.$team->type)}}" class="text-muted text-hover-primary">{{$team->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'stream')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">layers</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->value_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'unit')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">domain</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->business_name}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'BU')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'VS')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            @if($organization->type == 'orgT')
            <li class="breadcrumb-item text-muted">
                <span class="material-symbols-outlined">group</span>
                <a href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" class="text-muted text-hover-primary">{{$organization->team_title}}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @endif
            <li class="breadcrumb-item text-muted">OKR Planner</li>
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        @if($type == 'unit')  
        <div class="d-flex flex-column">
            <div>
            {{ Cmf::getmodulename('level_three') }}
          
            <select class="chkveg" multiple="multiple" >
                @foreach(DB::table('unit_team')->where('org_id',$organization->id)->get() as $r)
                <option value="{{$r->id}}">{{$r->team_title}}</option>
                @endforeach
                <option value="0">Unassigned</option>
            
             
            </select>
               <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetEpicTeamSearch();" >
               <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="14" width="14">
               </button>
            </div>

        </div> 
        @endif

        @if($type == 'stream')  
        <div class="d-flex flex-column">
            <div >
            {{ Cmf::getmodulename('level_three') }}
          
            <select class="chkveg" multiple="multiple" >
                
                @foreach(DB::table('value_team')->where('org_id',$organization->id)->get() as $r)
                <option value="{{$r->id}}">{{$r->team_title}}</option>
                @endforeach
                <option value="0">Unassigned</option>
            
             
            </select>
               <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetEpicTeamSearch();" >
               <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="14" width="14">
               </button>
            </div>

        </div> 
        @endif

        @if($type == 'org')  
        <div class="d-flex flex-column">
            <div >
            {{ Cmf::getmodulename('level_three') }}
          
            <select class="chkveg" multiple="multiple" >

                @foreach(DB::table('org_team')->where('org_id',$organization->id)->get() as $r)
                <option value="{{$r->id}}">{{$r->team_title}}</option>
                @endforeach
                <option value="0">Unassigned</option>
            
             
            </select>
               <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetEpicTeamSearch();" >
               <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="15" width="15">
               </button>
            </div>

        </div> 
        @endif
        <div class="d-flex flex-column">
            <div >
                  Flag
            <select class="flag-search" multiple="multiple" >
              <option value="Risk">Risk</option>
              <option value="Impediment">Impediment</option>
               <option value="Blocker">Blocker</option>
              <option value="Action">Action</option>
              <option value="0">No Flag</option>
             
            </select>
               <button class="btn-circle btn-tolbar bg-transparent" type="button" onclick="GetFagEpic();" >
               <img src="{{asset('public/assets/images/icons/filter.svg')}}" width="15" width="15">
               </button>
            </div>

        </div>

        <button class="btn btn-flex btn-primary h-40px fs-7 fw-bold" onclick="addnewobjective({{$organization->id}} , '{{ $organization->type }}', '{{ $organization->slug }}')">Add New</button>
    </div>
</div>