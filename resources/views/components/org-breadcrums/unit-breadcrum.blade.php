<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            @if($var_objective == 'mapper-unit')
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
            OKR Mapper
            </h1>
            @else
                @if(isset($organization))
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                    {{ DB::table('business_units')->where('id',$organization->id)->first()->business_name }}
                    </h1>
                @else
                <span class="material-symbols-outlined">domain</span>
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                {{ Cmf::getmodulename("level_one") }}
                </h1>
                @endif
            @endif
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            <li class="breadcrumb-item text-muted">
                <a href="{{url('organization/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            @if(isset($organization))
            <li class="breadcrumb-item text-muted">{{ DB::table('business_units')->where('id' , $organization->id)->first()->business_name }}</li>
            @endif

            @if($var_objective == 'mapper-unit')
                <li class="breadcrumb-item text-muted">OKR Mapper</li>
            @else
                @if(isset($organization))
                <li class="breadcrumb-item text-muted">
                    <span class="material-symbols-outlined">auto_stories</span>
                    <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}" class="text-muted text-hover-primary">BU-Dashboard</a>
                </li>
                @else
                <li class="breadcrumb-item text-muted">
                    <span class="material-symbols-outlined">domain</span>
                    <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}" class="text-muted text-hover-primary">{{ Cmf::getmodulename("level_one") }}</a>
                </li>
                @endif
            @endif
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        @if(!isset($organization))
        <a href="javascript:void(0)" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" onclick="emptyform();" data-toggle="modal" data-target="#add-business-unit">Add {{ Cmf::getmodulename('level_one') }}</a>
        @endif
    </div>
</div>