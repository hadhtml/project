
<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
          
            <div class="d-flex flex-row">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">groups</span>
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        {{ Cmf::getmodulename('level_three') }}
                    </h5>
                </div>
            </div>
            <!-- Breadcrum Items -->
           <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">auto_stories</span>
                        </div>
                        <div>
                            <a  href="{{ route('organization.dashboard') }}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>

                </div>

                {{-- @if($organization->type == 'org')
                <div class="mr-2">
                <a  href="{{url('dashboard/organization/'.$organization->slug.'/portfolio/'.$organization->type)}}" style="text-decoration: none;" >{{$organization->organization_name}}</a>
            </div>
                @endif --}}
             
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">groups</span>
                        </div>
                        <div>
                            <p>{{ Cmf::getmodulename('level_three') }}</p>
                        </div>
                    </div>

             
                </div>
            </div>
            <!--End Breadcrum Items -->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center toolbar">
            <div>
                <button class="button" type="button" data-toggle="modal" data-target="#add-team">
                    Create Team
                </button>
            </div>
        </div>
        <!--end::Toolbar-->
    </div>
</div>