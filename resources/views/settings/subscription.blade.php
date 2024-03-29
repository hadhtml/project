@php
$var_objective = "Jira";
@endphp
@extends('components.main-layout')
<title>Subscription Plan</title>
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
                     <td>Transaction ID</td>
                     <td>Plan Expiry</td>
                  </tr>
               </thead>
               <tbody>
           
                  @foreach($data as $p)
                  @php
                  $plan = DB::table('plan')->where('id',$p->plan_id)->first();
                  @endphp
                  <tr>
                    
                     <td>@if($plan) {{$plan->plan_title}} @endif</td>
                     <td>${{$p->amount}}</td>
                     <td>{{$p->transaction_id}}</td>
                     <td>{{ \Carbon\Carbon::parse($p->plan_expire)->format('d M Y')}}</td>
                    
             
                  </tr>
          
                 
                  @endforeach        
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
   $(document).ready(function() {
   setTimeout(function(){$('.alert-success').slideUp();},3000); 
   }); 
</script>                    
@endsection