<div class="row ml-3">
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


<div class="row mt-5 ml-3">
    <div class="col-md-1">
        <label class="checkbox checkbox-lg">
            <input  class="check" type="checkbox" />
        </label>
    </div>
    <div class="col-md-6">
        <h6 class="add-weight-heading">Add Weight</h6>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="wieght-error"></div>    
    </div>
</div>
@foreach($InitData as $data)
<div class="row weightvalue ml-3 mb-2"   style="display:none;" >
    <div class="col-md-4">
   
        <input class="form-control" readonly value="{{$data->initiative_name}}" >

        </div>
    <div class="col-md-6">
        <input class="range-slider__range_init{{$data->id}} form-control" id="" onchange="slider_value_Init({{$data->id}},this.value,'{{$data->key_id}}')" type="range"@if($data->initiative_weight == 0) value="0.1" @else value="{{ $data->initiative_weight }}" @endif min="0" max="100" >
    </div>
    <div class="col-md-2">
        <input  id="sliderValueinit{{ $data->id }}" onchange="slider_value_Init({{$data->id}},this.value,'{{$data->key_id}}')" @if($data->initiative_weight == 0) value="0" @else value="{{ $data->initiative_weight }}" @endif class="form-control range-slider__range_init"  type="text" min="0" >
    </div>
</div>
@endforeach

<div class="row ml-3 mb-2" style="display:none;" id="key_count">
    <div class="col-md-6">
        <span>Total Initiative ({{$InitDataCount}})</span>  
    </div>
    <div class="col-md-6">
        <span></span>
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
                        $('#key_count').show();
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
                        $('#key_count').hide();
                    },
                    error: function(error) {
                        
                    }
                });
            }
        });
    });
</script>