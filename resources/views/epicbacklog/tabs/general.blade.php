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
<form id="updategeneral" class="needs-validation" action="{{ url('dashboard/epicbacklog/updategeneral') }}" method="POST" novalidate>
                @csrf
<input type="hidden" value="{{ $data->id }}" name="epic_id">
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group mb-0">
            <label for="epic_name">Epic Title</label>
            <input type="text" required='true' value="{{ $data->epic_title }}" class="form-control" name="epic_name" id="epic_title">
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="form-group mb-0">
            <label for="epic_start_date">Start Date</label>
            <input id="epic_start_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->epic_start_date)) }}" name="epic_start_date"  required>
            
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="form-group mb-0">
            <label for="epic_end_date">End Date</label>
            <input id="epic_end_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->epic_end_date)) }}" name="epic_end_date" required>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="form-group mb-0">
            <label for="editor{{ $data->id }}">Description</label>
            <div class="textareaformcontrol">
                <textarea name="epic_detail" id="editor{{ $data->id }}">{{ $data->epic_detail }}</textarea> 
            </div>
        </div>
    </div>
</div>
<div class="row margintopfourtypixel">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebutton">@if($data->epic_title) Save Changes @else Save Epic @endif</button>
    </div>
</div>
</form>
<script type="text/javascript">
    function showtab(id , tab , table) {
        $('#modaltab').val(tab);
        $('.secondportion').addClass('loaderdisplay');
        $('.secondportion').html('<i class="fa fa-spin fa-spinner"></i>');
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epicbacklog/showtab') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                tab:tab,
                table: table,
            },
            success: function(res) {
                $('.secondportion').removeClass('loaderdisplay');
                $('.secondportion').html(res);
                $('.tabsclass').removeClass('active');
                $('#'+tab).addClass('active');
            },
            error: function(error) {
                
            }
        });
    }
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
    $('#updategeneral').on('submit',(function(e) {
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
                showheaderbacklog('{{ $data->id }}' , '{{ $table }}')
                $('#updatebutton').html('Save Changes');
            }
        });
    }));
</script>