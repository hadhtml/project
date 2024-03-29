<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    
    <title>CheckOut</title>
    <style type="text/css">
    </style>
</head>

<body style="background: #f3f3f3;">

<div class="container">

<h2 style="text-align:center">Confirm and payment</h2>




    <div class="row ml-5 d-flex">
        <div class="col-md-10">
            <div class="d-flex">
                <div class="p-2"><div id="paypal-button-container" style="width: 10%"></div>  </div>

                <form role="form" action="{{ url('stripe-post') }}" method="post" >

                 @csrf
                 <input type="hidden" name="id" value="{{$plan->id}}">

                <div class="p-2">    
                    <button class="btn btn-dark d-flex" type="submit">
                    <img src="{{asset('public/credit-card.svg')}}"> <span>Stripe</span>
                </button>
            </div>
            </form>

              </div>

              
                
      


    

    

        
            
        
            <div class="row" id="stripe" style="display: none;">
        
                <div class="col-md-6">
        
                    <div class="panel panel-default credit-card-box">
        
                        {{-- <div class="panel-heading display-table" >
        
                                <h3 class="panel-title" >Payment Details</h3>
        
                        </div> --}}
        
                        <div class="panel-body">
        
            
        
                            @if (Session::has('success'))
        
                                <div class="alert alert-success text-center">
        
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        
                                    <p>{{ Session::get('success') }}</p>
        
                                </div>
        
                            @endif
        
            
        
                            <form 
        
                                    role="form" 
        
                                    action="{{ url('stripe-post') }}" 
        
                                    method="post" 
        
                                    class="require-validation"
        
                                    data-cc-on-file="false"
        
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
        
                                    id="payment-form">
        
                                @csrf
        
            
        
                           
                                <input type="hidden" name="id" value="{{$plan->id}}">
             
        
                                <div class='form-row row' >
        
                                    <div class='col-xs-12 form-group  required' style="width:100%">
        
                                        <label class='control-label'>Card Number</label> 
                                        <input
        
                                            autocomplete='off'  class='form-control card-number' min="16" size='20'
        
                                            type='text'>
        
                                    </div>
        
                                </div>
        
            
        
                                <div class='form-row row'>
        
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
        
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
        
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
        
                                            type='text'>
        
                                    </div>
        
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
        
                                        <label class='control-label'>Expiration Month</label> <input
        
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
        
                                            type='text'>
        
                                    </div>
        
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
        
                                        <label class='control-label'>Expiration Year</label> <input
        
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
        
                                            type='text'>
        
                                    </div>
        
                                </div>
        
            
        
                                <div class='form-row row'>
        
                                    <div class='col-md-12 error form-group hide'>
        
                                        <div class='alert-danger alert'>Please correct the errors and try
        
                                            again.</div>
        
                                    </div>
        
                                </div>
        
            
        
                                <div class="row">
        
                                    <div class="col-xs-12">
        
                                        <button class="btn btn-primary btn-lg btn-block ml-2" type="submit">Pay Now</button>
        
                                    </div>
        
                                </div>
        
                                    
        
                            </form>
        
                        </div>
        
                    </div>        
        
                </div>
        
            </div>
        
                
        
        </div>



        <div class="col-md-2">

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$plan->plan_title}} Subscriptions Plan</h5>
                  <p class="card-text">${{$plan->base_price}} / mo</p>
                
                </div>
              </div>
            </div>
    </div>
</div>


        
     



      
  



<script src="https://pay.google.com/gp/p/js/pay.js"></script>    

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>




<script>

  



   
var url = "{{ url('get-paypal-client-id') }}";
$.get(url, function(data) {
    var paypalClientId = data.paypal_client_id;
    var paypalScriptUrl = 'https://www.paypal.com/sdk/js?client-id=' + paypalClientId + '&currency=USD&disable-funding=card,paylater';

    var scriptElement = document.createElement('script');
    scriptElement.src = paypalScriptUrl;

    scriptElement.onload = function() {
        var value = "{{$plan->base_price}}";
   var plan_id = "{{$plan->id}}";
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: value
                    }
                }]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
             
                 paypalpay(plan_id,value,transaction.id);

            });
        }
    }).render('#paypal-button-container');

    };

    document.body.appendChild(scriptElement);
});


    function paypalpay(plan_id,value,transaction)
    {
    var url1 = "{{url('paypal-pay')}}";    

    $.ajax({
        url:url1, 
        type:"post",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data:{plan_id:plan_id,value:value,transaction:transaction},
        success:function(res){
        // $('.message').html(res.message);
        window.location.href = res;
        }

    })

    }
</script>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    

<script type="text/javascript">

  

$(function() {

  

    var $form = $(".require-validation");

     

    $('form.require-validation').bind('submit', function(e) {

        var $form = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs = $form.find('.required').find(inputSelector),

        $errorMessage = $form.find('div.error'),

        valid = true;

        $errorMessage.addClass('hide');

    

        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {

          var $input = $(el);

          if ($input.val() === '') {

            $input.parent().addClass('has-error');

            $errorMessage.removeClass('hide');

            e.preventDefault();

          }

        });

     

        if (!$form.data('cc-on-file')) {

          e.preventDefault();

          Stripe.setPublishableKey($form.data('stripe-publishable-key'));

          Stripe.createToken({

            number: $('.card-number').val(),

            cvc: $('.card-cvc').val(),

            exp_month: $('.card-expiry-month').val(),

            exp_year: $('.card-expiry-year').val()

          }, stripeResponseHandler);

        }

    

    });

      

    function stripeResponseHandler(status, response) {

        if (response.error) {

            $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

          

        } else {


            var token = response['id'];

                 
             
            $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            console.log(token);

            $form.get(0).submit();

        }

    }

     

});

function showform()
{
    $('#stripe').slideToggle();
}

</script>

</body>
</html>
