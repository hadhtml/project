@php
$var_objective = "Jira";
@endphp
@extends('components.main-layout')
<title>Financial Year Setting</title>
@section('content')
<div class="row">
   <div class="col-md-12">

      
      <div class="card">
         @if (session('message'))
         <div class="alert alert-success mt-1" role="alert">
            {{ session('message') }}
         </div>
         @endif
         <div class="card-body p-10">
            <form class="needs-validation" action="{{url('add-financial-year')}}" method="POST">
               @csrf
               @php
               $month = DB::table('settings')->where('user_id',Auth::id())->first();
               $monthNumber = 0;
               if($month)
               {
               $monthNumber = $month->month;
               }
               $carbonDate = \Carbon\Carbon::create(null, $monthNumber + 1, 1);
               $monthName = $carbonDate->format('F');
               @endphp
               <!-- <p class="ml-2">Selected Month <b>{{$monthName}}</b></p> -->
               <div class="row mt-1">
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">When does your first planning quarter (Q1) start Month</span>
                        </label>
                        <select class="form-control form-control-solid" name="month">
                        <option @if($month) @if($month->month == 0) selected @endif @endif value='0'>January</option>
                        <option @if($month) @if($month->month == 1) selected @endif @endif value='1'>February</option>
                        <option @if($month) @if($month->month == 2) selected @endif @endif value='2'>March</option>
                        <option @if($month) @if($month->month == 3) selected @endif @endif value='3'>April</option>
                        <option @if($month) @if($month->month == 4) selected @endif @endif value='4'>May</option>
                        <option @if($month) @if($month->month == 5) selected @endif @endif value='5'>June</option>
                        <option @if($month) @if($month->month == 6) selected @endif @endif value='6'>July</option>
                        <option @if($month) @if($month->month == 7) selected @endif @endif value='7'>August</option>
                        <option @if($month) @if($month->month == 8) selected @endif @endif value='8'>September</option>
                        <option @if($month) @if($month->month == 9) selected @endif @endif value='9'>October</option>
                        <option @if($month) @if($month->month == 10) selected @endif @endif value='10'>November</option>
                        <option @if($month) @if($month->month == 11) selected @endif @endif value='11'>December</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <button class="btn btn-primary btn-lg btn-theme ripple" type="submit">Save Settings</button>
                  </div>
               </div>
            </form>
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