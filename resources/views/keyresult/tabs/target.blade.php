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
<form id="updatetarget" class="needs-validation" action="{{ url('dashboard/keyresult/updatetarget') }}" method="POST" novalidate>
   @csrf
   <input type="hidden" id="key_result_id" value="{{ $data->id }}" name="id">
   <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-6">
         <div class="form-group mb-0">
            <label for="small-description">Key Result Type</label>
            <select required class="form-control" name="key_result_type" id="key_result_type">
               <option value="">Select Key Result Type</option>
               <option value="Should Increase to">Should Increase To</option>
               <option value="Should decrease to">Should decrease To</option>
               <option value="Should stay above">Should stay above</option>
               <option value="Should stay below">Should stay below</option>
               <option value="Achieved">Achieved or not(100% / 0%)</option>
            </select>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-6">
         <div class="form-group mb-0">
            <label for="small-description">Unit</label>
            <select class="form-control" name="key_result_unit" id="key_result_unit" >
               <option value="number">Number</option>
               <option value="pound £">pound £</option>
               <option value="Euro €">Euro €</option>
               <option value="Dollar $">Dollar $</option>
            </select>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-6">
         <div class="form-group mb-0">
            <label for="objective-name">Initial Number</label>
            <input type="text" name="init_value" onkeyup="checktarget()" onkeypress="return onlyNumberKey(event)" class="form-control" id="init_value" required>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-6">
         <div class="form-group mb-0">
            <label for="objective-name">Final Target</label>
            <input type="text" name="target_number" onkeyup="checktarget()" onkeypress="return onlyNumberKey(event)" class="form-control" id="target_number" required>
         </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-12 mt-2 mb-2">
         <h6 class="define-quarterly-targets">Define Quarterly Targets <span class="target-error"></span></h6>
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
      @endforeach
   </div>
   <div class="row">
       <div class="col-md-12 col-lg-12 col-xl-6 mt-2">
            <div class="btn btn-primary add_value">Add</div>
        </div>
   </div>
   <div class="row margintopfourtypixel">
      <div class="col-md-12 text-right">
         <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebutton">Save Changes</button>
      </div>
   </div>
</form>
<script type="text/javascript">
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
                    '<div class="col-md-12 col-lg-12 col-xl-6 removediv'+x+'"> <div class="form-group mb-0"> <label for="small-description">Quarter '+x+' Target</label> <input type="text" onkeypress="return onlyNumberKey(event)" value="" class="form-control target_value" placeholder="" name="Target[]"  onkeypress="return onlyNumberKey(event)"> <span onclick="removediv('+x+')" class="material-symbols-outlined deletequarter">close</span> </div> </div>';

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
                $('#target-error').html('The target value should be greater than the initial value');
                return false;
            } else if (target_number >= init_value) {
                $('#target-error').html('');

            } else {}
        }

        if (key_result_type == 'Should decrease to') {

            if (target_number >= init_value) {
                $('#target-error').html('The target value should be less than the initial value');
                return false;
            } else if (target_number <= init_value) {
                $('#target-error').html('');

            } else {}
        }
    }
</script>