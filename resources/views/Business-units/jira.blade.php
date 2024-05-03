@php
$Backlog = DB::table('backlog_unit')->get();
$jir = DB::table('jira_setting')->where('user_id',Auth::id())->first();
@endphp
@if(count($jiradata) > 0)
<div class="col-md-12">
   <table class="table align-middle table-row-dashed fs-6 gy-5">
      <thead>
         <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <td class="w-10px pe-2">
               <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input" type="checkbox" id="checkAlljira" />
               </div>
            </td>
            <td class="min-w-125px">Summary</td>
            <td class="text-center min-w-70px">Description</td>
         </tr>
      </thead>
      <tbody id="check" class="fw-semibold text-gray-600">
        
         @foreach($jiradata as $data)
         <tr>
            <td>
               <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input type="checkbox" class="check-jira form-check-input"  value="{{$data->id}}" name="jira_epic[]"> 
               </div>
            </td>
            <td>{{$data->Summary}}</td>
            <td>{{$data->detail}}</td>
         </tr>
         @endforeach
       
      </tbody>
   </table>
</div>
@else
No Data Found
@endif
@if(count($jiradata) > 0)
<div class="col-md-12">
   <div class="form-check">
      <input class="form-check-input" type="radio" required value="off" name="flex" @if($jir) @if($jir->sync == 'off') checked @endif @endif id="flexRadioDefault1" >
      <label class="form-check-label ml-2 mt-1" for="flexRadioDefault1">
      One time download
      </label>
   </div>
   <div class="form-check mt-3">
      <input class="form-check-input" type="radio" required name="flex" @if($jir) @if($jir->sync == 'on') checked @endif @endif value="on" id="flexRadioDefault2" >
      <label class="form-check-label ml-2 mt-1" for="flexRadioDefault2">
      Keep Synching
      </label>
   </div>
</div>
@endif
<div class="col-md-12">
   <div class="text-center pt-15">
      <button type="submit" id="date1-end" class="btn btn-primary" disabled>
          <span class="indicator-label">Download</span>
      </button>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
      $('#checkAlljira').change(function() {
         $(':checkbox', '#check').prop('checked', this.checked);
      });
   });

   $('#checkAlljira').change(function() {
         $(':checkbox', '#check').prop('checked', this.checked);
   
           if(this.checked)
           {
            $("#date1-end").prop("disabled",false);
   
           }else
           {
            $("#date1-end").prop("disabled",true);
   
           }
   
   
           
   
       });
   
       $('.check-jira').on('click', function(){
       isChecked = $(this).is(':checked')
       
       if(isChecked){ 
         $("#date1-end").prop("disabled",false);
       }
    
       })
</script>