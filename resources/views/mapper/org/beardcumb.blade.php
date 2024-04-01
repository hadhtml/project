<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <!--begin::Page Title-->
            <div class="d-flex flex-row align-items-center">
                <div>
                    <span style="font-size:22px" class="material-symbols-outlined">link</span>
                </div>
                <div>
                    <h5 class="text-dark font-weight-bold ml-2">
                        OKR Mapper
                    </h5>
                </div>
            </div>
            <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">home</span>
                        </div>
                        <div>
                            <a href="{{route('organization.dashboard')}}" style="text-decoration: none;" >Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="mr-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span style="font-size:17px" class="material-symbols-outlined">link</span>
                        </div>
                        <div>
                            <p>OKR Mapper</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center toolbar">
         <div class="d-flex align-items-center">
            <a class="button" href="{{ url('dashboard/mapper') }}/{{ $data->slug }}/org?view=horizontal">Horizontal View</a>
         </div>
      </div>
    </div>
</div>
<style type="text/css">
   body{
      overflow: auto !important;
   }
   .subheader-solid{
      width: 81%;
      position: fixed;
      top: -3%;
      left: 300px;
      z-index: 999999;
   }
   .body-inner-content{
      overflow: auto;
      min-height: 1600px;
      min-width: 2500px;
      padding-left: 25px !important;
   }
</style>