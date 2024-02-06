<div class="modal-header modalheaderforapend">
    @include('epics.modalheader')
</div>
<div class="modal-body" id="showformforedit">
    <div class="row"><div class="col-md-12"><div class="border-top"></div></div></div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="menuettitle">
                <h4>Menu</h4>
                <input type="hidden" id="modaltab" value="general">
                <input type="hidden" id="tabs" value="">
                <ul>
                    <li id="general" onclick="showtab({{$data->id}} , 'general')" class="tabsclass active">
                        <span class="material-symbols-outlined"> edit_square </span> General
                    </li>
                    <li id="childitems" @if($data->epic_name)  onclick="showtab({{$data->id}} , 'childitems')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                        <span class="material-symbols-outlined">toc</span> Child Items
                    </li>
                    <li id="comments" @if($data->epic_name)  onclick="showtab({{$data->id}} , 'comments')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                        <span class="material-symbols-outlined">comment</span> Comments
                    </li>
                    <li id="activites"@if($data->epic_name)  onclick="showtab({{$data->id}} , 'activites')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                       <span class="material-symbols-outlined">browse_activity</span> Activities
                    </li>
                    <!-- <li id="checkins" onclick="showtab({{$data->id}} , 'checkins')" class="tabsclass">
                        <span class="material-symbols-outlined">checklist</span> Check-Ins
                    </li> -->
                    <li id="attachment" @if($data->epic_name)  onclick="showtab({{$data->id}} , 'attachment')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                        <span class="material-symbols-outlined"> attachment </span> Attachments</li>
                    <li id="flags" @if($data->epic_name)  onclick="showtab({{$data->id}} , 'flags')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                        <span class="material-symbols-outlined">flag</span> Flags
                    </li>
                    <li id="teams" @if($data->epic_name)  onclick="showtab({{$data->id}} , 'teams')" @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif class="tabsclass">
                        <span class="material-symbols-outlined"> group </span> Teams
                    </li>
                </ul>
                <h4>Action</h4>
                <ul class="positionrelative">
                    <!-- <li><img src="{{ url('public/assets/svg/archive-action.svg') }}"> Archive</li> -->
                    <!-- <li><span class="material-symbols-outlined">share</span> Share</li> -->
                    <!-- <li><img src="{{ url('public/assets/svg/arrow-right-action.svg') }}"> Move</li> -->
                    <li @if($data->epic_name) onclick="deleteflagshow({{$data->id}})"  @else data-toggle="tooltip" title="" data-original-title="Please Fill General Details" @endif><span class="material-symbols-outlined">delete</span> Delete</li>
                    <div class="deleteflag deleteepiccard hidepopupall" id="flagdelete{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Delete Epic</h4>
                            </div>
                            <div class="col-md-2">
                                <img onclick="deleteflagshow({{$data->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                            </div>
                        </div>
                        <p>All actions will be removed from the activity feed and you won’t be able to re-open the card. There is no undo.</p>
                        <button onclick="DeleteEpic({{$data->id}},{{ $data->initiative_id }},{{ $data->key_id }},{{ $data->obj_id }})" class="btn btn-danger btn-block">Delete</button>
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
            <form id="updategeneralepic" class="needs-validation" action="{{ url('dashboard/epics/updategeneral') }}" method="POST" novalidate>
                @csrf
                <input type="hidden" value="{{ $data->id }}" name="epic_id">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group mb-0">
                            <label for="epic_name">Epic Title</label>
                            <input type="text" required='true' value="{{ $data->epic_name }}" class="form-control" name="epic_name" id="epic_name">
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
                            <input id="epic_end_date" type="date" class="form-control" value="{{ date('Y-m-d',strtotime($data->epic_end_date)) }}" name="epic_end_date" name="edit_epic_end_date" required>
                            
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
                        <button type="submit" class="btn btn-primary btn-theme ripple savechangebutton" id="updatebuttonepic">@if($data->epic_name) Save Changes @else Save Epic @endif</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
     $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $( document ).ready(function() {
        var mindate = '{{ DB::table("initiative")->where("id" , $data->initiative_id)->first()->initiative_start_date }}';
        var maxdate = '{{ DB::table("initiative")->where("id" , $data->initiative_id)->first()->initiative_end_date }}';
        $('#epic_end_date').attr('min', mindate);
        $('#epic_end_date').attr('max', maxdate);
        $('#epic_start_date').attr('min', mindate);
        $('#epic_start_date').attr('max', maxdate);
    });
    function deleteflagshow(id) {
        $('#flagdelete'+id).slideToggle();
    }
    function changeepicstatus(status , id) {

        var tabs = $('#tabs').val();
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
                showheader(id);
               
                 showtab(id ,tabs);
                $('#parentCollapsible').html(res);
                $("#nestedCollapsible{{ $data->obj_id }}").collapse('toggle');
                $("#key-result{{ $data->key_id }}").collapse('toggle');
                $("#initiative{{ $data->initiative_id }}").collapse('toggle');
            },
            error: function(error) {
                
            }
        });
    }
    function showheader(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/epics/showheader') }}",
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
        $('#tabs').val(tab);
        $('.secondportion').addClass('loaderdisplay');
        $('.secondportion').html('<i class="fa fa-spin fa-spinner"></i>');
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
    $('#updategeneralepic').on('submit',(function(e) {
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
            success: function(res){
                $('#parentCollapsible').html(res);
                $("#nestedCollapsible{{ $data->obj_id }}").collapse('toggle');
                $("#key-result{{ $data->key_id }}").collapse('toggle');
                $("#initiative{{ $data->initiative_id }}").collapse('toggle');                
                showheader('{{ $data->id }}')
                $('#updatebuttonepic').html('Save Changes');
                @if(!$data->epic_name)
                    $('#edit-epic-modal-new').modal('hide');
                @endif
            }
        });
    }));
</script>