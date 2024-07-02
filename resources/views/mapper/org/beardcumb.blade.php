<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            <span class="material-symbols-outlined">link</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">OKR Mapper
            </h1>
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            <li class="breadcrumb-item text-muted">
                <a href="{{url('organization/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">OKR Mapper</li>
        </ul>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        @if(isset($_GET['view']) == 'horizontal')
        <a href="{{ url('dashboard/mapper') }}/{{ $data->slug }}/org" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" >Vertical View</a>
        @else
        <a href="{{ url('dashboard/mapper') }}/{{ $data->slug }}/org?view=horizontal" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" >Horizontal View</a>
        @endif
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
      min-width: 4500px;
      padding-left: 25px !important;
   }
</style>