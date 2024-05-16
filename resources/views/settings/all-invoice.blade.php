@php
$var_objective = "invoice";
@endphp
@extends('components.main-layout')
<title>Invoice</title>
@section('content')
<div class="row">
   <div class="col-md-12">
     
      <div class="card">
         <div class="card-body">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
               <thead>
                  <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                     <td class="min-w-125px">ID</td>
                     <td class="min-w-125px">Invoice-Id</td>
                     <td class="min-w-125px">TOTAL AMOUNT</td>
                     <td class="text-end min-w-70px">Action</td>
                  </tr>
               </thead>
               <tbody class="fw-semibold text-gray-600">
                @foreach ($invoices as $key =>  $invoice)
                  <tr>
                     <td class="text-gray-600 text-hover-primary mb-1">{{$key + 1}}</td>
                     <td class="text-gray-600 text-hover-primary mb-1">{{ $invoice->id }}</td>
                     <td class="text-gray-600 text-hover-primary mb-1">{{ $invoice->total() }}</td>
                     <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="{{url('user/invoice/'.$invoice->id)}}"  class="menu-link px-3">View</a>
                           </div>
                           <!--end::Menu item-->
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="{{$invoice->invoice_pdf}}"   class="menu-link px-3" data-kt-customer-table-filter="delete_row">Download</a>
                           </div>
                           <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                     </td>
                  </tr>
               
                 
                  @endforeach 
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Create Business Unit -->
<!-- Create Business Unit -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
   $(document).ready(function() {
   setTimeout(function(){$('.alert-success').slideUp();},3000); 
   }); 
</script>                    
@endsection