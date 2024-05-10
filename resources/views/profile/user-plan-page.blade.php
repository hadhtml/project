@php
$var_objective = "security3";
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
                <h1 class="fs-2hx fw-bold mb-5">CheckOut</h1>
            </div>
     
                @php
                
                $data = DB::table('user_plan')->where('user_id',Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first();
                $plan = DB::table('plan')->where('status','Active')->where('plan_id',$data->plan_id)->first();
                @endphp
               
                @php
                $dataArray = explode(',', $plan->module);
                $total  = ($plan->base_price * $data->package_status); 
                @endphp

                @if(Auth::user()->invitation_id == '')
               <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h1 class="text-gray-900 mb-5 fw-bolder">{{$plan->plan_title}}</h1>
                                        <div class="text-gray-600 fw-semibold mb-5">
                                            Optimal for 10+ team size<br> and new startup                                                 
                                        </div>
                                        <div class="w-100 mb-10">  
                                            <!--begin::Item-->
                                            @foreach($dataArray as $arr)                                               
                                            <div class="d-flex align-items-center mb-5">
                                                       
                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                {{$arr}}                                                
                                            </span> 
                                                <i class="ki-outline ki-check-circle fs-1 text-success"></i>                                                                                                                                                      
                                            </div>
                                            @endforeach
                                            <!--end::Item--> 
                                                                            
                                                                                
                                                
                                    </div>
                                    </div>
                                    <div>
                                        <div class="min-w-300px bg-primary text-center card-rounded py-12">                               

                                            <div class="fs-5x text-white d-flex justify-content-center align-items-start">
                                                <span class="fs-2 mt-3">£</span>
                                                
                                                <span class="lh-sm fw-semibold" data-kt-plan-price-month="99" data-kt-plan-price-annual="399">
                                                    {{$plan->base_price}}
                                                </span>                                    
                                            </div>

                                            <div class="text-white fw-bold mb-7">user / {{$plan->billing_method}}</div>
                                            @if($data->package_status == '' || $data->package_status == 0 )
                                            <div class="text-white fw-bold mb-3">No Of User : 0</div>
                                            @else
                                            <div class="text-white fw-bold mb-3">No Of User : {{$data->package_status}}</div>

                                            @endif
                                            @if($data->package_status == '' || $data->package_status == 0 )
                                            <div class="text-white fw-bold mb-3">Due Amount : £ {{$plan->base_price}}</div>
                                            @else
                                            <div class="text-white fw-bold mb-3">Due Amount : £ {{$total}}</div>
                                            @endif
                                            <a href="{{url('boost-payment/'.$plan->slug)}}" style="text-color:white" class="btn btn-light">CheckOut</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="row" id="plan">
                                <div class="col-md-6" >
                                  
                                </div>

                                <div class="col-md-6">
                                  
                                </div>
                                 </div>
                               

                            </div>

                        </div>
                    </div>
                    
                </div>
                @else
                Subscription inactive
                @endif
             
           
        </div>
    </div>
</div>
@endsection
