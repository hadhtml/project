@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->first();
@endphp
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <div class="d-flex">
            <span class="material-symbols-outlined">key</span>
            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Invoice
            </h1>
        </div>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
            <li class="breadcrumb-item text-muted">
                <a href="{{url('organization/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-500 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-muted">Invoice</li>
        </ul>
    </div>
</div>