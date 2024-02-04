<div class="row ml-3">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">weight</span>
                </div>
                <div>
                    <h4>Set Initiative’s weight (Optional)</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@if(count($InitData) > 0)
<div class="row mt-5 ml-3">
    <div class="col-md-1">
        <label class="checkbox checkbox-lg">
            <input  class="check" @if($Weight  > 0) checked  @endif type="checkbox" />
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
<div class="row weightvalue ml-3 mb-2"  @if($Weight  > 0)  @else style="display:none;" @endif >
    <div class="col-md-4">
   
       <h6 class="mt-4">{{$data->initiative_name}}</h6>

        </div>
    <div class="col-md-6">
        <input class="range-slider__range_init{{$data->id}} form-control" id="" onchange="slider_value_Init({{$data->id}},this.value,'{{$data->key_id}}')" type="range"@if($data->initiative_weight == 0) value="0" @else value="{{ $data->initiative_weight }}" @endif min="0" max="100" >
    </div>
    <div class="col-md-2">
        <input  id="sliderValueinit{{ $data->id }}" onchange="slider_value_Init({{$data->id}},this.value,'{{$data->key_id}}')" @if($data->initiative_weight == 0) value="0" @else value="{{ $data->initiative_weight }}" @endif class="form-control range-slider__range_init"  type="text" min="0" >
    </div>
</div>


<div class="row ml-3 mb-2" style="display:none;" id="key_count">
    <div class="col-md-6">
        <span>Total Initiative ({{$InitDataCount}})</span>  
    </div>
    <div class="col-md-6">
        <span></span>
    </div>
</div>
@endforeach
@else
<span class="ml-5">No Initiative found</span>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        $('.check').on('click', function() {
            var isChecked = $(this).is(':checked');
            if (isChecked) {
                var id = '';
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
                var id = '';
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