@php
$var_objective = 'invoice';
@endphp
@extends('components.main-layout')
<title>Invoice</title>
@section('content')

  


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <!-- begin::Invoice 1-->
                <div class="card">
                    <!-- begin::Body-->
                    <div class="card-body py-20">
                        <!-- begin::Wrapper-->
                        <div class="mw-lg-950px mx-auto w-100">
                            <!-- begin::Header-->
                            <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                                <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">INVOICE</h4>

                                <!--end::Logo-->
                                <div class="text-sm-end">
                                    <!--begin::Logo-->
                                    <a href="#">
                                        <img alt="Logo"
                                            src="/metronic8/demo39/assets/media/svg/brand-logos/duolingo.svg">
                                    </a>
                                    <!--end::Logo-->

                                    <!--begin::Text-->
                                    {{-- <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                                        <div>Cecilia Chapman, 711-2880 Nulla St, Mankato</div>

                                        <div>Mississippi 96522</div>
                                    </div> --}}
                                    <!--end::Text-->
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="border-bottom pb-12">
                                <!--begin::Image-->
                                <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center bgi-size-cover card-rounded h-150px h-lg-250px mb-lg-20"
                                    style="background-image: url(http://localhost/agileprolific/public/assetsvone/media/patterns/pattern-1.jpg)">
                                </div>

                                <!--end::Image-->

                                <!--begin::Wrapper-->
                                <div class="d-flex justify-content-between flex-column flex-md-row">
                                    <!--begin::Content-->
                                    <div class="flex-grow-1 pt-8 mb-13">
                                        <!--begin::Table-->
                                        <div class="table-responsive border-bottom mb-14">
                                            <table class="table">
                                                <thead>
                                                    <tr class="border-bottom fs-6 fw-bold text-muted text-uppercase">
                                                        <th class="min-w-175px pb-9">Description</th>
                                                        <th class="min-w-100px pe-lg-6 pb-9 text-end">UNIT PRICE
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                               


                                                    <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                        <td class="d-flex align-items-center pb-10">
                                                    

                                                            @if($alldata){{$alldata->plan_title}}@endif
                                                        </td>

                                             
                                                        <td class="fs-5 text-gray-900 fw-bolder pe-lg-6"> {{ $invoice->total() }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->

                                        <!--begin::Section-->
                                        {{-- <div class="d-flex flex-column mw-md-300px w-100">
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-5 mb-3 text-gray-90000">BANK TRANSFER</div>
                                            <!--end::Label-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                                <!--begin::Accountname-->
                                                <div class="fw-semibold pe-5">Account Name:</div>
                                                <!--end::Accountname-->

                                                <!--begin::Label-->
                                                <div class="text-end fw-norma">Barclays UK</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-5">Account Number:</div>
                                                <!--end::Accountnumber-->

                                                <!--begin::Number-->
                                                <div class="text-end fw-norma">1234567890934</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack text-gray-800 fs-6">
                                                <!--begin::Code-->
                                                <div class="fw-semibold  pe-5">Code:</div>
                                                <!--end::Code-->

                                                <!--begin::Label-->
                                                <div class="text-end fw-norma">BARC0032UK</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                        </div> --}}
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->

                                    <!--begin::Separator-->
                                    <div class="border-end d-none d-md-block mh-450px mx-9"></div>
                                    <!--end::Separator-->

                                    <!--begin::Content-->
                                    <div class="text-end pt-10">
                                        <!--begin::Total Amount-->
                                        <div class="fs-3 fw-bold text-muted mb-3">TOTAL AMOUNT</div>

                                        <div class="fs-xl-2x fs-2 fw-bolder"> {{ $invoice->total() }}</div>

                                        <div class="text-muted fw-semibold">Taxes included</div>
                                        <!--end::Total Amount-->

                                        <div class="border-bottom w-100 my-7 my-lg-16"></div>

                                        <!--begin::Invoice To-->
                                        <div class="text-gray-600 fs-6 fw-semibold mb-3">INVOICE TO.</div>

                                        <div class="fs-6 text-gray-800 fw-semibold mb-8">{{ $invoice->customer_name }}<br>{{ $invoice->customer_email }}
                                            20620 </div>
                                        <!--end::Invoice To-->

                                        <!--begin::Invoice No-->
                                        <div class="text-gray-600 fs-6 fw-semibold mb-3">INVOICE NO.</div>

                                        <div class="fs-6 text-gray-800 fw-semibold mb-8">{{ $invoice->id }}</div>
                                        <!--end::Invoice No-->

                                        <!--begin::Invoice Date-->
                                        <div class="text-gray-600 fs-6 fw-semibold mb-3">DATE</div>

                                        <div class="fs-6 text-gray-800 fw-semibold">{{ $invoice->date()->toFormattedDateString() }}</div>
                                        <!--end::Invoice Date-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->

                            </div>
                            <!--end::Body-->

                            <!-- begin::Footer-->
                            <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                                <!-- begin::Actions-->
                                <div class="my-1 me-5">
                                    <!-- begin::Pint-->
                                    <button type="button" class="btn btn-success my-1 me-12"
                                        onclick="window.print();">Print Invoice</button>
                                    <!-- end::Pint-->

                                    <!-- begin::Download-->
                                    <a type="button" href="{{$invoice->invoice_pdf}}" class="btn btn-light-success my-1">Download</a>
                                    <!-- end::Download-->
                                </div>
                                <!-- end::Actions-->

                                <!-- begin::Action-->
                                
                                <!-- end::Action-->
                            </div>
                            <!-- end::Footer-->
                        </div>
                        <!-- end::Wrapper-->
                    </div>
                    <!-- end::Body-->
                </div>
                <!-- end::Invoice 1-->
            </div>
            <!--end::Content container-->
     

   
    <!--end::Layout-->













    </script>
@endsection
