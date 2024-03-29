<!DOCTYPE html>
<html>
<head>
 <title>Subscription Plan</title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>
</head>
<body>

<h2 style="text-align:center">Subscriptions Plan</h2>
{{-- <p style="text-align:center">Resize the browser window to see the effect.</p> --}}

@php
$plan = DB::table('plan')->where('status','Active')->orderby('id','DESC')->get();
@endphp

@foreach($plan as $p)

@php
$dataArray = explode(',', $p->module);
@endphp

<div class="columns">
  <ul class="price">
    <li class="header">{{$p->plan_title}}</li>
    @if($p->base_price_status ==  'price')
    <li class="grey">${{$p->base_price}} / mo</li>
    @else
    <li class="grey">Free</li>
    @endif
    <li class="">{{$p->duration}} days</li>
    @foreach($dataArray as $arr)
    <li>{{$arr}}</li>
    @endforeach
    <li class="grey">
        <a href="{{url('boost-payment/'.$p->slug)}}"  class="btn btn-primary" >Checkout</a>    </li>
  </ul>
</div>
@endforeach



      
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://js.braintreegateway.com/web/3.79.1/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.79.1/js/hosted-fields.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    
     
        $(document).on('click', '#form-button', function() {
            $('.hosted-field').html('');
            var plan_id = $(this).attr("data-id");
            alert(plan_id);
            
        var url = "{{url('profile/client_token')}}";    
        $.get(url, function(response) {
            braintree.client.create({
                authorization: response.clientToken
            }, function(err, clientInstance) {
                if (err) {
                    console.error(err);
                    return;
                }

                
            

                braintree.hostedFields.create({
                    client: clientInstance,
                      styles: {
                             'input': {
                            'color': '#282c37',
                            'font-size': '16px',
                            
                            'line-height': '3'
                          },
                            ':focus': {
                                'color': 'black'
                            },
                            '.valid': {
                                'color': 'black'
                            },
                            '.invalid': {
                                'color': 'black'
                            }
                            },
                    fields: {
                        number: {
                            selector: '#card-number',
                            placeholder: '4111 1111 1111 1111'
                        },
                        cvv: {
                            selector: '#cvv',
                            placeholder: '123'
                        },
                        expirationDate: {
                            selector: '#expiration-date',
                            placeholder: 'MM/YYYY'
                        },
                      
                    }
                }, function(err, hostedFieldsInstance) {
                    if (err) {
                        console.error(err);
                        return;
                    }
                    
                      

                    document.getElementById('checkout-form').addEventListener('submit', function(event) {
                        event.preventDefault();

                        hostedFieldsInstance.tokenize(function(err, payload) {
                            if (err) {
                                console.error(err);
                                $('#card_error').html(err.message);
                                return;
                            }

                            var nonce = payload.nonce;
                         
                         
                            var urlnew = "{{url('boost/private-process-payment')}}";

                            $.get(urlnew, { nonce:nonce,plan_id:plan_id}, function(response) {
                                if(response.success == true)
                                {
                                    $('#card_error').html('');
                                    $('.message').html(response.message);
                                    

                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000);
                                
                                }else
                                {
                                   console.log(response.message); 
                                    
                                }
                                
                            });
                        });
                    });
                });
            });
        });
    });
</script>
<style>

#checkout-form {
height: 100%;
display: flex;
justify-content: center;
align-items: center;
}


/*--------------------
PANEL FORM
--------------------*/

.panel__content {
padding: 1em 2em;

}

.textfield--float-label {
width: 50%;
float: left;
display: inline-block;
padding-right: 5px;
}






.hosted-field {
height: 50px;

display: block;
color: black;
border-bottom: 1px solid rgba(0, 0, 0, .26);
border-top: 1px solid rgba(0, 0, 0, .26);
border-left: 1px solid rgba(0, 0, 0, .26);
border-right: 1px solid rgba(0, 0, 0, .26);
width: 150%;
font-size: 16px;
padding: 10px;
border-radius: 5px;
margin-left:50px; 

}

.pay-button {
/*background: #ffd223;*/
/*color: #ffd223;*/
margin-bottom: 20px;
margin-left: 50px;

border: 0;
border-radius: 3px;
padding: 1em 3em;
font-size: 1em;
text-transform: uppercase;
box-shadow: 0 0 2px rgba(0, 0, 0, .12), 0 2px 2px rgba(0, 0, 0, .2);
}


/*--------------------
BT HOSTED FIELDS SPECIFIC 
--------------------*/

.braintree-hosted-fields-focused {
border-bottom: 2px solid;
}
</style>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 700px !important">
      <div class="modal-content">
        <div class="message ml-5 mt-3 text-success"></div>
        <form id="checkout-form">
            <div class="row mt-3">
                 
                  <div class="col-md-12 w-100">
                     
                      <div class="row">                                      
                          <div style="display:none;" class="card-wrapper"></div>
                          <div class="col-md-12 mb-3">
                              <div class="form-group">
                                <div class="textfield--float-label">
        <!-- Begin hosted fields section -->
                                    <label class="hosted-field--label ml-5" for="card-number">
                                      Credit Number
                                    </label>
                                      <div id="card-number" class="hosted-field"></div>
                                    <!-- End hosted fields section -->
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12 mb-3">
                              <div class="form-group">
                                  <div class="textfield--float-label">
        <!-- Begin hosted fields section -->
                            <label class="hosted-field--label ml-5" for="expiration-date">
                               <span class="icon">
                             </span>
                              Expiration Date</label>
                            <div id="expiration-date" class="hosted-field"></div>
                            <!-- End hosted fields section -->
                          </div>
                              </div>
                          </div>
                          <div class="col-md-12 mb-3">
                              <div class="form-group">
                                    <div class="textfield--float-label">
        <!-- Begin hosted fields section -->
                                <label class="hosted-field--label ml-5" for="cvv">
                                  <span class="icon">
                                    </span>
                                    CVV</label>
                                <div id="cvv" class="hosted-field"></div>
                                
                                <!-- End hosted fields section -->
                              </div>
                              </div>
                          </div>
                          
                          <div id="card_error" class="ml-5 mb-2 text-danger"></div>
                        
                  
                          
         
                      <button class="pay-button thm-btn btn default-btn-one mr-5">Confirm and Pay</button>
        
                      </div>
                    
                  </div>
                    
              </div>
              </form>

      </div>
    </div>
  </div>
</body>
</html>
