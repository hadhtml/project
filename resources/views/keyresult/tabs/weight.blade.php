<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">weight</span>
                </div>
                <div>
                    <h4>Set Weight (Optional)</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-1">
        <label class="checkbox checkbox-lg">
            <input class="check" type="checkbox" />
        </label>
    </div>
    <div class="col-md-5">
        <h6 class="add-weight-heading">Add Weight</h6>
    </div>
</div>
<div id="wieght-error"></div>
    <div class="row" id="weightappend">
      
     </div>
      
        <script type="text/javascript">
            $(document).ready(function() {
                $('.check').on('click', function() {
                    console.log('ok');
                    var isChecked = $(this).is(':checked');
                    if (isChecked) {
                        // Show the weight div
                        $('#weightappend').html('');
                        $('#weightappend').append(
                            '<div class="col-md-6"><input class="range-slider__range-two form-control"  type="range" value="1" min="1" max="100"></div><div class="col-md-6"><input id="sliderValue" class="form-control range-slider__range-two"  type="text" min="1" value="1"></div>'
                            ); // Add field html


                    } else {
                        $('#weightappend').html(''); // Hide the weight div
                    }
                });
            });
        </script>