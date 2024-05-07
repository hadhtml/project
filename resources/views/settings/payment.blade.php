@php
$var_objective = "checkout";
@endphp
@extends('components.main-layout')
<title>CheckOut</title>
@section('content')
@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->orWhere('user_id', Auth::user()->invitation_id)->first();
@endphp
<!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
        <!--begin::Card-->
        <div class="card card-flush pt-3 mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2 class="fw-bold">Enter Payment Details</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div id="cashier"></div>
            <div class="card-body pt-3">
                <div class="p-2">
                    <!-- <div id="paypal-button-container" style="width: 100%"></div> -->
            </div>
                <div class="separator separator-dashed mb-7"></div> 
                <form  action="{{ url('stripe-post') }}" method="post" id="subscribe-form">
                     @csrf
                    <input type="hidden" id="plan" name="plan" value="{{$plan->plan_id}}">
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Card Holder Name</span>
                        </label>
                        <input type="text" placeholder="Card Holder Name" class="form-control form-control-solid"  id="card-holder-name" name="name" placeholder="" />
                     </div> 
                    <div class="form-row">
                        <label for="card-element">Credit or debit card</label>
                        <div id="card-element" class="form-control">        
                         </div>      
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="stripe-errors"></div>    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                        @endforeach
                    </div>
                    @endif    
                    <div class="form-group text-center mt-2">
                        <button  id="card-button" type="button" data-secret="{{ $intent->client_secret }}" 
                             class="btn btn-lg btn-success btn-block">SUBMIT</button>
                    </div>
                </form>
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <!--end::Content-->
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
        <!--begin::Card-->
        <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
            <div class="card-header">
                <div class="card-title">
                    <h2>Summary</h2>
                </div>
            </div>
            <div class="card-body pt-0 fs-6">
                <div class="mb-7">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-60px symbol-circle me-3">
                            @if(auth()->user()->image)
                            <img src="{{asset('public/assets/images/'.auth()->user()->image)}}">
                            @else
                            <img src="{{ Avatar::create(auth()->user()->name.' '.auth()->user()->last_name)->toBase64() }}">
                            @endif
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-2">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</a>
                            <a href="#" class="fw-semibold text-gray-600 text-hover-primary">{{ auth()->user()->email }}</a>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed mb-7"></div>
                <div class="mb-7">
                    <h5 class="mb-4">Product details</h5>
                    <div class="mb-0">
                        <span class="badge badge-light-info me-2">{{$plan->plan_title}}</span>
                        <span class="fw-semibold text-gray-600">£{{$plan->base_price}} / {{$plan->billing_method}}</span>
                    </div>
                </div>
                <div class="separator separator-dashed mb-7"></div>
                <div class="mb-10">
                    <h5 class="mb-4">Subscription Details</h5>
                    <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2">
                        <!--begin::Row-->
                        <tr class="">
                            <td class="text-gray-500">Subscription ID:</td>
                            <td class="text-gray-800">sub_4567_8765</td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr class="">
                            <td class="text-gray-500">Started:</td>
                            <td class="text-gray-800">15 Apr 2021</td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr class="">
                            <td class="text-gray-500">Status:</td>
                            <td>
                                <span class="badge badge-light-success">Active</span>
                            </td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr class="">
                            <td class="text-gray-500">Next Invoice:</td>
                            <td class="text-gray-800">15 Apr 2022</td>
                        </tr>
                        <!--end::Row-->
                    </table>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Sidebar-->
</div>
<!--end::Layout-->
<style>
    .StripeElement {
        background-color: white;
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
{{-- <script src="https://pay.google.com/gp/p/js/pay.js"></script>     --}}

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>




<script>

  



   
// var url = "{{ url('get-paypal-client-id') }}";
// $.get(url, function(data) {
//     var paypalClientId = data.paypal_client_id;
//     var paypalScriptUrl = 'https://www.paypal.com/sdk/js?client-id=' + paypalClientId + '&currency=USD&disable-funding=card,paylater';

//     var scriptElement = document.createElement('script');
//     scriptElement.src = paypalScriptUrl;

//     scriptElement.onload = function() {
//         var value = "{{$plan->base_price}}";
//    var plan_id = "{{$plan->id}}";
//     paypal.Buttons({
//         createOrder: function(data, actions) {
//             return actions.order.create({
//                 purchase_units: [{
//                     amount: {
//                         value: value
//                     }
//                 }]
//             });
//         },

//         onApprove: function(data, actions) {
//             return actions.order.capture().then(function(orderData) {
//                 console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
//                 var transaction = orderData.purchase_units[0].payments.captures[0];
             
//                  paypalpay(plan_id,value,transaction.id);

//             });
//         }
//     }).render('#paypal-button-container');

//     };

//     document.body.appendChild(scriptElement);
// });


//     function paypalpay(plan_id,value,transaction)
//     {
//     var url1 = "{{url('paypal-pay')}}";    

//     $.ajax({
//         url:url1, 
//         type:"post",
//         headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//         data:{plan_id:plan_id,value:value,transaction:transaction},
//         success:function(res){
//         // $('.message').html(res.message);
//         window.location.href = res;
//         }

//     })

//     }


var url = "{{ url('get-paypal-client-id') }}";
$.get(url, function(data) {
    var paypalClientId = data.paypal_client_id;
    var paypalScriptUrl = 'https://www.paypal.com/sdk/js?client-id=' + paypalClientId + '&disable-funding=card,credit&vault=true&intent=subscription';

    var scriptElement = document.createElement('script');
    scriptElement.src = paypalScriptUrl;

    scriptElement.onload = function() {
      
   var plan_id = "{{$plan->paypal_id}}";
   paypal.Buttons({
        
        createSubscription: function(data, actions) {
          return actions.subscription.create({
           'plan_id': plan_id 
           });
         },
         onApprove: function(data, actions) {
        //    alert('You have successfully subscribed to ' + data.subscriptionID);
           paypalpay(plan_id,data.subscriptionID); 
         }
       }).render('#paypal-button-container');

    };

    document.body.appendChild(scriptElement);
});


    function paypalpay(plan_id,transaction)
    {
    var url1 = "{{url('paypal-pay')}}";    

    $.ajax({
        url:url1, 
        type:"post",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data:{plan_id:plan_id,transaction:transaction},
        success:function(res){
        // $('.message').html(res.message);

        $('#cashier').html('<div class="alert alert-success" role="alert">Subscribed To Plan Successfully </div>');
        setTimeout(function() {
        window.location.href = res;
        $('#cashier').html('');
        }, 1000);
        }

    })

    }
</script>



    

<script src="https://js.stripe.com/v3/"></script>
<script>    
var stripe = Stripe('{{ env('STRIPE_KEY') }}');

    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };    
    var card = elements.create('card', {hidePostalCode: true,
        style: style});   
         card.mount('#card-element');    
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });    
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;    
    cardButton.addEventListener('click', async (e) => {

        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
            );      
            if (error) 
            {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message; 
        } else {            
                // paymentMethodHandler(setupIntent.payment_method);
                payment(setupIntent.payment_method);

       
        }
      
        
    });    
    // function paymentMethodHandler(payment_method) {
    //     var form = document.getElementById('subscribe-form');
    //     var hiddenInput = document.createElement('input');
    //     hiddenInput.setAttribute('type', 'hidden');
    //     hiddenInput.setAttribute('name', 'payment_method');
    //     hiddenInput.setAttribute('value', payment_method);
    //     form.appendChild(hiddenInput); 
       
    //     form.submit();
    // }

    function payment(payment_method)
    {
            $('#card-button').html('<i class="fa fa-spin fa-spinner"></i>');
                var plan  = "{{$plan->plan_id}}";   
                var url1 = "{{url('stripe-post')}}";
                $.ajax({
                url:url1, 
                type:"post",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data:{payment_method:payment_method,plan:plan},
                success:function(data){
                    // if(data == 1)
                    // {
                    // $('#cashier').html('<div class="alert alert-danger" role="alert">Already subscribed To Plan </div>');

                    // }else
                    // {

                   $('#cashier').html('<div class="alert alert-success" role="alert">Subscribed To Plan Successfully </div>');
                   setTimeout(function() {
                    window.location.href = data;
                    $('#cashier').html('');
                }, 2000);
                    // }
           
                }

            })
              
    }
    </script>
@endsection