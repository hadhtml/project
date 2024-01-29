<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">edit_square</span>
                </div>
                <div>
                    <h4>General</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="updategeneralobjective" class="needs-validation" action="{{ url('dashboard/objectives/updategeneral') }}" method="POST" novalidate>
    @csrf
    <input type="hidden" value="{{ $data->id }}" name="id">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="form-group mb-0">
                <label for="epic_name">Objective Name</label>
                <input type="text" required='true' value="{{ $data->objective_name }}" class="form-control" name="objective_name" id="objective_name">
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="form-group mb-0">
                <label for="start_date">Start Date</label>
                <input id="start_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->start_date)) }}" name="start_date"  required>
                
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="form-group mb-0">
                <label for="end_date">End Date</label>
                <input id="end_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->end_date)) }}" name="end_date" name="edit_epic_end_date" required>
                
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="form-group mb-0">
                <label for="editor{{ $data->id }}">Description</label>
                <div class="textareaformcontrol">
                    <textarea name="detail" id="editor{{ $data->id }}">{{ $data->detail }}</textarea> 
                </div>
            </div>
        </div>
    </div>
    <div class="row margintopfourtypixel">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebuttonepic">@if($data->objective_name) Save Changes @else Add Objective @endif</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    $('#editor{{ $data->id }}').summernote({
        height: 180,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['view', ['fullscreen', 'codeview']],
        ],
    });
    $('#updategeneralobjective').on('submit',(function(e) {
        $('#updatebuttonepic').html('<i class="fa fa-spin fa-spinner"></i>');
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                showobjectiveheader('{{ $data->id }}');
                $('#updatebuttonepic').html('Save Changes');
                $('#parentCollapsible').html(data);
            }
        });
    }));
</script>