@php
$var_objective = "security";
@endphp
@extends('components.main-layout')
<title>Choose Your Plan</title>
@section('content')
@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first();
@endphp
<div class="card" id="kt_pricing">
    <div class="card-body p-lg-17">
        <div class="d-flex flex-column">
            <div class="mb-13 text-center">
                <h1 class="fs-2hx fw-bold mb-5">Choose Your Plan</h1>
            </div>
            <div class="row g-10">
                @php
                $plan = DB::table('plan')->where('status','Active')->orderby('id','DESC')->get();
                @endphp
                @foreach($plan as $p)
                @php
                $dataArray = explode(',', $p->module);
                @endphp
                <div class="col-xl-4">
                    <div class="d-flex h-100 align-items-center">
                        <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                            <div class="mb-7 text-center">
                                <h1 class="text-gray-900 mb-5 fw-bolder">{{$p->plan_title}}</h1>
                                <div class="text-center">
                                    @if($p->base_price_status ==  'price')
                                    <span class="mb-2 text-primary">$</span>
                                    <span class="fs-3x fw-bold text-primary">{{$p->base_price}}</span>
                                    <span class="fs-7 fw-semibold opacity-50">/ 
                                    <span data-kt-element="period">{{$p->billing_method}}</span></span>
                                    @else
                                    <span class="fs-3x fw-bold text-primary">Free</span>
                                    @endif
                                </div>
                            </div>
                            <div class="w-100 mb-10">
                                @foreach($dataArray as $arr)
                                <div class="d-flex align-items-center mb-5">
                                    <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">{{$arr}}</span>
                                    <i class="ki-outline ki-check-circle fs-1 text-success"></i>
                                </div>
                                @endforeach
                            </div>
                            <a href="{{url('boost-payment/'.$p->plan_id)}}" class="btn btn-sm btn-primary">Select</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection