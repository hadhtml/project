<div class="modal-header modalheaderforapend">
    @include('keyresult.modalheader')
</div>
<div class="modal-body" id="showformforedit">
    <div class="row"><div class="col-md-12"><div class="border-top"></div></div></div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="menuettitle">
                <h4>Menu</h4>
                <input type="hidden" id="modaltab" value="general">
                <ul>
                    <li id="general" onclick="showtab({{$data->id}} , 'general')" class="tabsclass active">
                        <span class="material-symbols-outlined"> edit_square </span> General
                    </li>
                    <li id="targets" onclick="showtab({{$data->id}} , 'targets')" class="tabsclass">
                        <span class="material-symbols-outlined"> target </span> Targets
                    </li>
                    <li id="values" onclick="showtab({{$data->id}} , 'values')" class="tabsclass">
                        <span class="material-symbols-outlined"> task_alt </span> Check-in
                    </li>
                    <!--<li id="weighttab" onclick="showtab({{$data->id}} , 'weighttab')" class="tabsclass">-->
                    <!--    <span class="material-symbols-outlined"> weight </span> Weight-->
                    <!--</li>-->
                    <li id="charts" onclick="showtab({{$data->id}} , 'charts')" class="tabsclass">
                        <span class="material-symbols-outlined">monitoring</span> Charts
                    </li>
                    
                    <!-- <li id="teams" onclick="showtab({{$data->id}} , 'teams')" class="tabsclass">
                        <span class="material-symbols-outlined"> group </span> Teams
                    </li> -->
                    @if($data->type == 'org')
                    <li id="okrmapper" onclick="showtab({{$data->id}} , 'okrmapper')" class="tabsclass">
                        <span class="material-symbols-outlined"> link </span> OKR Mapper</li>
                    @endif
                    @if($data->type == 'unit')
                    <li id="okrmapper" onclick="showtab({{$data->id}} , 'okrmapper')" class="tabsclass">
                        <span class="material-symbols-outlined"> link </span> OKR Mapper</li>
                    @endif
                    @if($data->type == 'stream')
                    <li id="okrmapper" onclick="showtab({{$data->id}} , 'okrmapper')" class="tabsclass">
                        <span class="material-symbols-outlined"> link </span> OKR Mapper</li>
                    @endif
                </ul>
                <h4>Action</h4>
                <ul class="positionrelative">
                    <!-- <li><img src="{{ url('public/assets/svg/archive-action.svg') }}"> Archive</li> -->
                    <!-- <li><span class="material-symbols-outlined">share</span> Share</li> -->
                    <!-- <li><img src="{{ url('public/assets/svg/arrow-right-action.svg') }}"> Move</li> -->
                    <li onclick="deleteflagshow({{$data->id}})"><span class="material-symbols-outlined">delete</span> Delete</li>
                    <div class="deleteflag deleteepiccard" id="flagdelete{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Delete Key Result</h4>
                            </div>
                            <div class="col-md-2">
                                <img onclick="deleteflagshow({{$data->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                            </div>
                        </div>
                        <p>All actions will be removed from the activity feed and you won’t be able to re-open the card. There is no undo.</p>
                        <button onclick="deletekeyresult({{$data->id}},{{$data->obj_id}})" class="btn btn-danger btn-block">Delete</button>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-md-9 secondportion">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="d-flex flex-row align-items-center justify-content-between block-header">
                        <div>
                            <h4><img src="{{ url('public/assets/svg/editsvg.svg') }}"> General</h4>
                        </div>
                    </div>
                </div>
            </div>
            <form id="updategeneral" class="needs-validation" action="{{ url('dashboard/keyresult/updategeneral') }}" method="POST" novalidate>
                @csrf
                <input type="hidden" id="key_result_id" value="{{ $data->id }}" name="id">
                <input type="hidden" value="{{ $data->obj_id }}" id="objective_id_for_nested">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group mb-0">
                            <label for="key_name">Key Result title</label>
                            <input type="text" required='true' value="{{ $data->key_name }}" class="form-control" name="key_name" id="key_title">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group mb-0">
                            <label for="key_start_date">Start Date</label>
                            <input id="key_start_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->key_start_date)) }}" name="key_start_date"  required>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group mb-0">
                            <label for="key_end_date">End Date</label>
                            <input id="key_end_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->key_end_date)) }}" name="key_end_date" required>
                            
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group mb-0">
                            <label for="editor{{ $data->id }}">Description</label>
                            <div class="textareaformcontrol">
                                <textarea name="key_detail" id="editor{{ $data->id }}">{{ $data->key_detail }}</textarea> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margintopfourtypixel">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebutton">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        var mindate = '{{ DB::table("objectives")->where("id" , $data->obj_id)->first()->start_date }}';
        var maxdate = '{{ DB::table("objectives")->where("id" , $data->obj_id)->first()->end_date }}';
        $('#key_end_date').attr('min', mindate);
        $('#key_end_date').attr('max', maxdate);
        $('#key_start_date').attr('min', mindate);
        $('#key_start_date').attr('max', maxdate);
    });
    function deleteflagshow(id) {
        $('#flagdelete'+id).slideToggle();
    }
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
                edit_epic_end_date: '{{ $data->epic_end_date }}',
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
                $('.modalheaderforapend').html(res);
            },
            error: function(error) {
                
            }
        });
    }
    function showheader(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/showheader') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
            },
            success: function(res) {
                $('.modalheaderforapend').html(res);
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
    function showtab(id , tab) {
        $('#modaltab').val(tab);
        $('.secondportion').addClass('loaderdisplay');
        $('.secondportion').html('<i class="fa fa-spin fa-spinner"></i>');
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/showtab') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                tab:tab,
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
                $('#updatebutton').html('Save Changes');
                showheader($('#key_result_id').val());
                var objective_id_for_nested =  $('#objective_id_for_nested').val();
                $('#parentCollapsible').html(res);
                $("#nestedCollapsible" + objective_id_for_nested).collapse('toggle');
            }
        });
    }));
</script>