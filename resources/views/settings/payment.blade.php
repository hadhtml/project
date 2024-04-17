<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}"> --}}
    <link rel="icon" type="image/x-icon" href="{{asset('public/assets/images/icons/icon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
    
    <title>CheckOut</title>
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
</head>

<body style="background: #f3f3f3;">

<div class="container">

<h2 style="text-align:center">Confirm and payment</h2>




    <div class="row ml-5 d-flex">
        <div class="col-md-10">
            <div class="d-flex">
                 <div class="p-2"><div id="paypal-button-container" style="width: 10%"></div>  </div> 


                <div class="p-2">  
                    {{-- <div id="paypal-button-container" style="max-width:100px;"></div>   --}}
                    <button class="btn btn-dark d-flex" type="button">
                    <img src="{{asset('public/credit-card.svg')}}"> <span>Stripe</span>
                </button>
            </div>
            </form>

    

              </div>

              
                
              <div id="cashier"></div>
           

              <div class="row" id="stripe">
        
                <div class="col-md-6">

                    
                    <form  action="{{ url('stripe-post') }}" method="post" id="subscribe-form">

                        @csrf
           
                        <input type="hidden" id="plan" name="plan" value="{{$plan->plan_id}}">

                        <div class="">
                        <label for="card-holder-name">Card Holder Name</label>   
                        <input id="card-holder-name" class="form-control" type="text">
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

                <div class="col-md-6 mt-7">

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{$plan->plan_title}} Subscriptions Plan</h5>
                          <p class="card-text">${{$plan->base_price}} / {{$plan->billing_method}}</p>
                        
                        </div>
                      </div>
                    </div>
              </div>      

    

        
            
        
         
        
                
        
        </div>



      
    </div>
</div>


        
     



      
  



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
                }, 1000);
                    // }
           
                }

            })
              
    }
    </script>

</body>
</html>
