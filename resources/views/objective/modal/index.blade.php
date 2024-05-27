<div class="modal-header modalheaderforapend">
    @include('objective.modal.modalheader')
</div>
<div class="modal-body" id="showformforedit">
    <div class="row"><div class="col-md-12"><div class="border-top"></div></div></div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="menuettitle">
                <h4>Menu</h4>
                <input type="hidden" id="modaltab" value="general">
                <ul>
                    <li id="general" onclick="showtabobjective({{$data->id}} , 'general')" class="tabsclass active">
                        <span class="material-symbols-outlined"> edit_square </span> General
                    </li>
                    <li id="activites"@if($data->objective_name)  onclick="showtabobjective({{$data->id}} , 'activites')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                       <span class="material-symbols-outlined">browse_activity</span> Activities
                    </li>
                    @if($data->type != 'org')
                    <li id="okrmapper"@if($data->objective_name)  onclick="showtabobjective({{$data->id}} , 'okrmapper')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                       <span class="material-symbols-outlined">link</span> OKR Mapper
                    </li>
                    @endif
                </ul>
                <h4>Action</h4>
                <ul class="positionrelative">
                    <li @if($data->objective_name) onclick="deleteobjectiveshow({{$data->id}})"  @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif><span class="material-symbols-outlined">delete</span> Delete</li>
                    <div class="deleteflag deleteepiccard hidepopupall" id="deleteobjective{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Delete Objective</h4>
                            </div>
                            <div class="col-md-2">
                                <img onclick="deleteobjectiveshow({{$data->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                            </div>
                        </div>
                        <p>All actions will be removed from the activity feed and you won’t be able to re-open the card. There is no undo.</p>
                        <button onclick="deleteobjective({{$data->id}})" class="btn btn-danger btn-block">Delete</button>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-md-9 secondportion">
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
                            <input id="end_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->end_date)) }}" name="end_date" required>
                            
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
        </div>
    </div>
</div>
<script type="text/javascript">
    var today = new Date();
    var formattedToday = today.toISOString().split('T')[0];
    document.getElementById("end_date").min = formattedToday;

    function changeepicstatus(status , id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epics/changeepicstatus') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                edit_epic_name: '{{ $data->epic_name }}',
                edit_epic_start_date: '{{ $data->epic_start_date }}',
                edit_epic_end_date: '{{ $data->end_date }}',
                edit_epic_description: '{{ $data->epic_detail }}',
                edit_epic_id: id,
                edit_epic_status: status,
                edit_ini_epic_id: '{{ $data->initiative_id }}',
                type: '{{ $data->type }}',
                edit_epic_key: '{{ $data->key_id }}',
                edit_epic_obj: '{{ $data->obj_id }}',
                selectedOptions: '{{ $data->epic_name }}',
            },
            success: function(res) {
                showheader(id);
                $('#parentCollapsible').html(res);
                $("#nestedCollapsible{{ $data->obj_id }}").collapse('toggle');
                $("#key-result{{ $data->key_id }}").collapse('toggle');
                $("#initiative{{ $data->initiative_id }}").collapse('toggle');
            },
            error: function(error) {
                
            }
        });
    }
    function showtabwithoutloader(id , tab) {
        $('#modaltab').val(tab);
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epics/showtab') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                tab:tab,
            },
            success: function(res) {
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
                @if(!$data->objective_name)
                    $('#objectivemodalnew').modal('hide');
                @endif
            }
        });
    }));
</script>