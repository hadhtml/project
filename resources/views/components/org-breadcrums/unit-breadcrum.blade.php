<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                @if($var_objective == 'mapper-unit')
                    OKR Mapper
                @else
                @if(isset($organization))
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                    </div>
                    <div>
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            {{ DB::table('business_units')->where('id' , $organization->id)->first()->business_name }}

                        </h5>
                    </div>
                </div>
                @else
                
            <div class="d-flex flex-row align-items-center">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">domain</span>
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold ml-2">
                        {{ Cmf::getmodulename("level_one") }}
                    </h5>
                </div>
            </div>
                @endif
                @endif
            </h5>
            <!-- Breadcrum Items -->
            <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a href="{{route('home')}}">Dashboard</a>

                        </div>
                    </div>
                </div>
                @if(isset($organization))
                <div class="mr-2">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <p>{{ DB::table('business_units')->where('id' , $organization->id)->first()->business_name }}</p>


                        </div>
                    </div>
                </div>
                @endif
                @if($var_objective == 'mapper-unit')
                    <div class="mr-2">
                        <p>OKR Mapper</p>
                    </div>
                @else
                    @if(isset($organization))
                    <div class="mr-2">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                            </div>
                            <div>
                                <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}">BU-Dashboard</a>
    
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">domain</span>
                        </div>
                        <div>
                            <a href="{{route('organization.level-one', Cmf::getmoduleslug('level_one'))}}">{{ Cmf::getmodulename("level_one") }}</a>

                        </div>
                    </div>
                    @endif
                @endif
            </div>
            <!--End Breadcrum Items -->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        @if(!isset($organization))
        <div class="d-flex align-items-center toolbar">
            <div>
                <button class="button" type="button" data-toggle="modal" data-target="#add-business-unit">
                    Add {{ Cmf::getmodulename('level_one') }}
                </button>
            </div>
        </div>
        @endif
        <!--end::Toolbar-->
    </div>
</div>