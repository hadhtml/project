<div class="row">
   <div class="col-md-12 col-lg-12 col-xl-12">
      <div class="d-flex flex-row align-items-center justify-content-between block-header">
         <div class="d-flex flex-row align-items-center">
            <div class="mr-2">
               <span class="material-symbols-outlined">target</span>
            </div>
            <div>
               <h4>Targets</h4>
            </div>
         </div>
      </div>
   </div>
</div>
<form id="updatetarget" class="needs-validation" action="{{ url('dashboard/objectives/updatetarget') }}" method="POST">
   @csrf
   <input type="hidden" id="key_result_id" value="{{ $data->id }}" name="id">
   <div class="activity-feed padding-right-ten">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="small-description">Key Result Type</label>
               <select onchange="selectkeyresult(this.value)" required class="form-control" name="key_result_type" id="key_result_type">
                  <option value="">Select Key Result Type</option>
                  <option @if($data->obj_result_type == 'Should Increase to') selected @endif value="Should Increase to">Should Increase To</option>
                  <option @if($data->obj_result_type == 'Should decrease to') selected @endif value="Should decrease to">Should decrease To</option>
                  <option @if($data->obj_result_type == 'Should stay above') selected @endif value="Should stay above">Should stay above</option>
                  <option @if($data->obj_result_type == 'Should stay below') selected @endif value="Should stay below">Should stay below</option>
                  <option @if($data->obj_result_type == 'Achieved') selected @endif value="Achieved">Achieved or not(100% / 0%)</option>
               </select>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="small-description">Unit</label>
               <select onchange="selectunitresult(this.value)" class="form-control" required name="key_unit" id="key_unit">
                  <option value="">Select Unit</option>
                  <option @if($data->obj_unit == 'number') selected @endif value="number">Number</option>
                  <option @if($data->obj_unit == 'pound £') selected @endif value="pound £">Pound £</option>
                  <option @if($data->obj_unit == 'Euro €') selected @endif value="Euro €">Euro €</option>
                  <option @if($data->obj_unit == 'Dollar $') selected @endif value="Dollar $">Dollar $</option>
               </select>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="objective-name">Initial Number</label>
               <input type="text" value="{{ $data->init_value }}" name="init_value" onkeyup="checktarget()" onkeypress="return onlyNumberKey(event)" class="form-control" id="init_value" required>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="objective-name">Final Target</label>
               <input type="text" value="{{ $data->target_number }}" name="target_number" onkeyup="checktarget()" onkeypress="return onlyNumberKey(event)" class="form-control" id="target_number" required>
            </div>
         </div>
         <div class="col-md-12">
            <span class="target-error"></span>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-12 mt-2 mb-2">
            <h6 class="define-quarterly-targets">Define Quarterly Targets </h6>
         </div>
      </div>
      @php
      $ChartCount = DB::table('obj_chart')->where('obj_id' , $data->id)->count();
      @endphp
      <div class="row field_wrapper_key">
         @foreach(DB::table('obj_chart')->where('obj_id' , $data->id)->get() as $key=>$r)
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="small-description">Quarter {{ $key+1 }} Target</label>
               <input type="text" onkeypress="return onlyNumberKey(event)" value="{{ $r->quarter_value }}" class="form-control target_value" placeholder="" name="Target[]"  onkeypress="return onlyNumberKey(event)">   
               <span class="material-symbols-outlined deletequarter">close</span>
            </div>
         </div>
         <input type="hidden" value="{{ $r->IndexCount }}" name="IndexCount[]" class="IndexCount">
         @endforeach
      </div>
      <div class="row">
          <div class="col-md-12 col-lg-12 col-xl-6 mt-2">
               @if($ChartCount == 4)
              
               @else
               <div class="btn btn-primary add_value">Add</div>
               @endif
           </div>
      </div>
   </div>
   <div class="row margintopfourtypixel">
      <div class="col-md-12 text-right">
         <button type="button" class="btn btn-primary btn-theme ripple savechangebutton" onclick="updatetarget();" id="updatebutton">Save Changes</button>
      </div>
   </div>
</form>
<script type="text/javascript">
   function selectkeyresult(id) {
      checktarget();
   }
   function selectunitresult(id) {
      checktarget();
   }
    $(document).ready(function() {
        var maxField = 4;
        var addButton = $('.add_value');
        var wrapper = $('.field_wrapper_key');

        var x = {{ DB::table('key_chart')->where('key_id' , $data->id)->count() }};

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                var fieldHTML =
                    '<div class="col-md-12 col-lg-12 col-xl-6 removediv'+x+'"> <div class="form-group mb-0"> <label for="small-description">Quarter '+x+' Target</label> <input type="text" onkeypress="return onlyNumberKey(event)" value="" class="form-control newtarget" placeholder="" name="newtarget[]"  onkeypress="return onlyNumberKey(event)"> <span  class="material-symbols-outlined remove_button deletequarter">close</span> </div> </div>';

                $(wrapper).append(fieldHTML); //Add field html
            }else{
                $('.target-error').html('Limit of Quarter Target is 4');
            }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).closest('.col-md-12').remove(); //Remove the closest parent div with class 'col-md-12'
        x--;
        $('.target-error').html('');
    });
    });
   //  function removediv(id) {
   //      $('.removediv'+id).remove();
   //      $('.target-error').html('');
   //  }
    function checktarget()
    {
        var key_result_type = $('#obj_result_type').val();
        var key_result_unit = $('#obj_result_unit').val();
        var init_value = $('#init_value').val();
        var target_number = $('#target_number').val();
  
        if (key_result_type == 'Should Increase to') {
           
            if (target_number <= init_value) {
               
                $('.target-error').html('The target value should be greater than the initial value');
                return false;
            } else if (target_number >= init_value) {
                $('.target-error').html('');

            } else {}
        }

        if (key_result_type == 'Should decrease to') {

            if (target_number >= init_value) {
                $('.target-error').html('The target value should be less than the initial value');
                return false;
            } else if (target_number <= init_value) {
                $('.target-error').html('');

            } else {}
        }
    }
    $('#updatetarget').on('submit',(function(e) {
        $('#updatebutton').html('<i class="fa fa-spin fa-spinner"></i>');
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(res){
                $('#updatebutton').html('Save Changes');
                $('.secondportion').html(res);
            }
        });
    }));
    
    function updatetarget() {
     $('#updatebutton').html('<i class="fa fa-spin fa-spinner"></i>');
     var key_result_type = $('#key_result_type').val();
     var  key_unit = $('#key_unit').val();
     var id = $('#key_result_id').val();
     var init_value = $('#init_value').val();
     var target_number = $('#target_number').val();
     
     
    var Target = [];
    var newtarget = [];
    var IndexCount = [];
 
     $('.target_value').each(function() {
        Target.push($(this).val());
    });

    $('.newtarget').each(function() {
        newtarget.push($(this).val());
    });
    
     $('.IndexCount').each(function() {
        IndexCount.push($(this).val());
    });
    
    
    
     
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/objectives/updatetarget') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                key_result_type: key_result_type,
                key_unit: key_unit,
                target_number:target_number,
                init_value:init_value,
                id:id,
                newtarget:newtarget,
                Target:Target,
                IndexCount:IndexCount,
                
                
            },
            success: function(data) {
                 $('#updatebutton').html('Save Changes');
                $('.secondportion').html(data);
           
            },
            error: function(error) {
                console.log('Error updating card position:', error);
            }
        });
    }
</script>

