<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                @if(isset($organization))
                {{ DB::table('business_units')->where('id' , $organization->id)->first()->business_name }}
                @else
                Business Units
                @endif
            </h5>
            <!-- Breadcrum Items -->
            <div class="d-flex flex-row page-sub-titles">
                <div class="mr-2">
                    <a href="{{route('home')}}">Dashboard</a>
                </div>
               
              
                @if(isset($organization))
                <div class="mr-2">
                    <p>{{ DB::table('business_units')->where('id' , $organization->id)->first()->business_name }}</p>
                </div>
                @endif

                @if(isset($organization))
                <div class="mr-2">
                    <a href="{{url('dashboard/organization/Business-Units')}}">BU-Dashboard</a>
                </div>
                @else
                <a href="{{url('dashboard/organization/Business-Units')}}">Business Units</a>
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
                    Add Business Unit
                </button>
            </div>
        </div>
        @endif
        <!--end::Toolbar-->
    </div>
</div>