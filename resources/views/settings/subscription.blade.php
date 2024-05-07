@php
$var_objective = "Jira";
@endphp
@extends('components.main-layout')
<title>Subscription Plan</title>
<style>
   .switch {
     position: relative;
     display: inline-block;
     width: 60px;
     height: 34px;
   }
   
   .switch input { 
     opacity: 0;
     width: 0;
     height: 0;
   }
   
   .slider {
     position: absolute;
     cursor: pointer;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #ccc;
     -webkit-transition: .4s;
     transition: .4s;
   }
   
   .slider:before {
      
     position: absolute;
     content: "";
     height: 26px;
     width: 26px;
     left: 4px;
     bottom: 4px;
     background-color: white;
     -webkit-transition: .4s;
     transition: .4s;
   }
   
   input:checked + .slider {
     background-color: #2196F3;

   }
   
   input:focus + .slider {

     box-shadow: 0 0 1px #2196F3;
   }
   
   input:checked + .slider:before {
     -webkit-transform: translateX(26px);
     -ms-transform: translateX(26px);
     transform: translateX(26px);
   
   }
   
   /* Rounded sliders */
   .slider.round {
     border-radius: 34px;
   }
   
   .slider.round:before {
     border-radius: 50%;
   }
   </style>
@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body p-10">
            <table class="table data-table">
               <thead>
                  <tr>
                     <td>Plan Title</td>
                     <td>Amount</td>
                     <td>Trial_start_at</td>
                     <td>Trial_end_at</td>
                     <td>Action</td>
                     <td>Upgrade Plan</td>
                  </tr>
               </thead>
               <tbody>
           
               
                  @php
                  $plan = DB::table('plan')->where('plan_id',$data->plan_id)->first();
                  @endphp
                  <tr>
                    
                     <td> {{$plan->plan_title}}</td>
                     @if($data->transaction_id != '')
                     <td>@if($plan) £{{$plan->base_price}} @endif</td>
                     @else
                    <td> Free </td>
                     @endif
                     <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</td>
                      @if($data->subscription_ends_at != NULL)
                     <td>{{ \Carbon\Carbon::parse($data->subscription_ends_at)->format('d M Y')}}</td>
                     @else
                      <td>NULL</td>
                     @endif

                     <td>
                      @if($data->transaction_id != Null)
                        <label class="switch">
                           <input type="checkbox" id="switcher" @if($data->subscription_ends_at == NULL) checked @endif  value="{{$plan->plan_title}}">
                           <span class="slider round"></span>
                         </label>
                       @endif                    
                        </td>
                    
                        <td>
                          @if($data->transaction_id != '')
                           <button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".bd-example-modal-lg">Upgrade</button>
                            @else
                           <button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".bd-example-modal-lg-new">Upgrade</button>
                           
                           @endif 

                       
                        </td>
             
                  </tr>
          
                 
                   
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@php
$plan = DB::table('plan')->where('plan_id','!=',$plan->plan_id)->where('base_price_status','!=','free')->get();
@endphp
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
      <div id="cashier"></div>
       @if(count($plan) > 0)
      
       <div class="card-group">
         @foreach($plan as $p)
         <div class="card">
           <div class="card-body">
             <h5 class="card-title text-secondary" >{{$p->plan_title}}</h5>
             
             <p class="card-text"> £ {{$p->base_price}} / {{$p->billing_method}}.</p>
           </div>
           <div class="card-footer">
             <button type="button" onclick="upgradePlan({{$p->id}},'{{$data->id}}')" id="update-plan" class="btn btn-primary">Upgrade</button>
           </div>
         </div>
         @endforeach
      
       </div>
   

       @endif

     

     </div>
   </div>
 </div>


 <div class="modal fade bd-example-modal-lg-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div id="cashier"></div>
      @if(count($plan) > 0)
     
      <div class="card-group">
        @foreach($plan as $p)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-secondary" >{{$p->plan_title}}</h5>
            
            <p class="card-text"> £ {{$p->base_price}} / {{$p->billing_method}}.</p>
          </div>
          <div class="card-footer">
            <a href="{{url('boost-payment/'.$p->plan_id)}}" class="btn btn-sm btn-primary">Upgrade</a>
          </div>
        </div>
        @endforeach
     
      </div>
  

      @endif

    

    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
   $(document).ready(function() {
   setTimeout(function(){$('.alert-success').slideUp();},3000); 
   }); 

  $('#switcher').click(function(){

   var name  = $('#switcher').val();

      $.ajax({
      url:"{{url('cancal-plan')}}", 
      type:"post",
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{name:name},
      success:function(data){
       location.reload();             
            
      }

      })
   
   
  });

  
function upgradePlan(plan_id,old_id)
{

  $('#update-plan').html('<i class="fa fa-spin fa-spinner"></i>');
   $.ajax({
   url:"{{url('upgarde-plan')}}", 
   type:"post",
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
   data:{plan_id:plan_id,old_id:old_id},
   success:function(data){
   
    
    $('#cashier').html('<div class="alert alert-success" role="alert">Plan Upgarded Successfully </div>');
      setTimeout(function() {
      location.reload(); 
      $('#cashier').html('');
      }, 3000);
         
   }

   })


}
</script>                    
@endsection