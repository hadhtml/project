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
<input type="hidden" value="{{ $data->obj_id }}" id="key_obj_id">
<input type="hidden" value="{{ $data->id }}" id="key_id_weight_tab">
<div class="row mt-5">
    <div class="col-md-1">
        <label class="checkbox checkbox-lg">
            <input @if($data->weight > 0) checked @endif class="check" type="checkbox" />
        </label>
    </div>
    <div class="col-md-5">
        <h6 class="add-weight-heading">Add Weight</h6>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="wieght-error"></div>    
    </div>
</div>
<div class="row weightvalue" @if($data->weight == 0) style="display:none;" @endif>
    <div class="col-md-6">
        <input class="range-slider__range-two form-control"  type="range" value="{{ $data->weight }}" min="1" max="100">
    </div>
    <div class="col-md-6">
        <input readonly id="sliderValue" @if($data->weight == 0) value="1" @else value="{{ $data->weight }}" @endif class="form-control range-slider__range-two"  type="text" min="1" >
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.check').on('click', function() {
            var isChecked = $(this).is(':checked');
            if (isChecked) {
                var id = '{{ $data->id }}';
                var weight = $('#sliderValue').val();
               $.ajax({
                    type: "POST",
                    url: "{{ url('dashboard/keyresult/addweight') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id:id,
                        weight:weight
                    },
                    success: function(res) {
                        $('.weightvalue').show();
                    },
                    error: function(error) {
                        
                    }
                });
            } else {
                var id = '{{ $data->id }}';
                $.ajax({
                    type: "POST",
                    url: "{{ url('dashboard/keyresult/removeweight') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id:id
                    },
                    success: function(res) {
                        $('.weightvalue').hide();
                    },
                    error: function(error) {
                        
                    }
                });
            }
        });
    });
</script>