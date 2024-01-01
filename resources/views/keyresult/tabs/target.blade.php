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
<form id="updatetarget" class="needs-validation" action="{{ url('dashboard/keyresult/updatetarget') }}" method="POST">
   @csrf
   <input type="hidden" id="key_result_id" value="{{ $data->id }}" name="id">
   <div class="activity-feed padding-right-ten">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="small-description">Key Result Type</label>
               <select onchange="selectkeyresult(this.value)" required class="form-control" name="key_result_type" id="key_result_type">
                  <option value="">Select Key Result Type</option>
                  <option @if($data->key_result_type == 'Should Increase to') selected @endif value="Should Increase to">Should Increase To</option>
                  <option @if($data->key_result_type == 'Should decrease to') selected @endif value="Should decrease to">Should decrease To</option>
                  <option @if($data->key_result_type == 'Should stay above') selected @endif value="Should stay above">Should stay above</option>
                  <option @if($data->key_result_type == 'Should stay below') selected @endif value="Should stay below">Should stay below</option>
                  <option @if($data->key_result_type == 'Achieved') selected @endif value="Achieved">Achieved or not(100% / 0%)</option>
               </select>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="small-description">Unit</label>
               <select onchange="selectunitresult(this.value)" class="form-control" required name="key_unit" id="key_result_unit">
                  <option value="">Select Unit</option>
                  <option @if($data->key_unit == 'number') selected @endif value="number">Number</option>
                  <option @if($data->key_unit == 'pound £') selected @endif value="pound £">Pound £</option>
                  <option @if($data->key_unit == 'Euro €') selected @endif value="Euro €">Euro €</option>
                  <option @if($data->key_unit == 'Dollar $') selected @endif value="Dollar $">Dollar $</option>
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
      <div class="row field_wrapper_key">
         @foreach(DB::table('key_chart')->where('key_id' , $data->id)->get() as $key=>$r)
         <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="form-group mb-0">
               <label for="small-description">Quarter {{ $key+1 }} Target</label>
               <input type="text" onkeypress="return onlyNumberKey(event)" value="{{ $r->quarter_value }}" class="form-control target_value" placeholder="" name="Target[]"  onkeypress="return onlyNumberKey(event)">   
               <span class="material-symbols-outlined deletequarter">close</span>
            </div>
         </div>
         <input type="hidden" value="{{ $r->IndexCount }}" name="IndexCount[]">
         @endforeach
      </div>
      <div class="row">
          <div class="col-md-12 col-lg-12 col-xl-6 mt-2">
               <div class="btn btn-primary add_value">Add</div>
           </div>
      </div>
   </div>
   <div class="row margintopfourtypixel">
      <div class="col-md-12 text-right">
         <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebutton">Save Changes</button>
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
        var maxField = 10;
        var addButton = $('.add_value');
        var wrapper = $('.field_wrapper_key');

        var x = {{ DB::table('key_chart')->where('key_id' , $data->id)->count() }};

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                var fieldHTML =
                    '<div class="col-md-12 col-lg-12 col-xl-6 removediv'+x+'"> <div class="form-group mb-0"> <label for="small-description">Quarter '+x+' Target</label> <input type="text" onkeypress="return onlyNumberKey(event)" value="" class="form-control target_value" placeholder="" name="newtarget[]"  onkeypress="return onlyNumberKey(event)"> <span onclick="removediv('+x+')" class="material-symbols-outlined deletequarter">close</span> </div> </div>';

                $(wrapper).append(fieldHTML); //Add field html
            }else{
                $('.target-error').html('Limit of Quarter Target is 10');
            }
        });
    });
    function removediv(id) {
        $('.removediv'+id).remove();
        $('.target-error').html('');
    }
    function checktarget()
    {
        var key_result_type = $('#key_result_type').val();
        var key_result_unit = $('#key_result_unit').val();
        var init_value = $('#init_value').val();
        var target_number = $('#target_number').val();
        console.log(key_result_type);
        if (key_result_type == 'Should Increase to') {
            console.log('ok');
            if (target_number <= init_value) {
               console.log('asdasdsad');
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
</script>