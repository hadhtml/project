<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">link</span>
                </div>
                <div>
                    <h4>OKR Mapper</h4>
                </div>
            </div>
            <div class="displayflex">
                <span onclick="uploadattachment()" class="btn btn-default btn-sm">Add</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="activity-feed">
        <div class="col-md-12 col-lg-12 col-xl-12 uploadattachment">
            <div class="d-flex flex-column">
                <div class="card comment-card storyaddcard">
                    <div class="card-body">
                        <form id="okrmapperform" class="needs-validation" action="{{ url('dashboard/keyresult/okrmapperform') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="bussiness_key_id">
                            <input type="hidden" value="{{ $data->type }}" name="type">
                            <input type="hidden" value="{{ $data->unit_id }}" name="bussiness_unit_id">
                            <input type="hidden" value="{{ $data->obj_id }}" name="bussiness_obj_id">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="key_name">Select Team</label>
                                        <select required name="team_id" onchange="selectteamokrmapper(this.value , '{{ $data->type }}')" class="form-control">
                                            <option value="">Select Team</option>
                                            @if($data->type == 'org')
                                            @foreach(DB::table('org_team')->where('org_id' , $data->unit_id)->get() as $r)
                                            <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                                            @endforeach
                                            @endif
                                            @if($data->type == 'unit')
                                            @foreach(DB::table('unit_team')->where('org_id' , $data->unit_id)->get() as $r)
                                            <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                                            @endforeach
                                            @endif
                                            @if($data->type == 'stream')
                                            @foreach(DB::table('value_team')->where('org_id' , $data->unit_id)->get() as $r)
                                            <option value="{{ $r->id }}">{{ $r->team_title }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="key_name">Select Objective <small id="objectiveerror" class="text-danger"></small></label>
                                        <select required name="team_obj_id" id="select_objective" class="form-control">
                                            <option value="">Select Objective</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-theme" id="saveokrmapperbutton">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
            
        </div>
    </div>
</div>
<script type="text/javascript">
    function selectteamokrmapper(id,type) {
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/selectteamokrmapper') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                type:type
            },
            success: function(res) {
                if(res == 1)
                {
                    $('#select_objective').attr('disabled' , true);
                    $('#select_objective').find('option').remove().end().append('<option value=" ">Select Objective</option>');
                    $('#saveokrmapperbutton').attr('disabled' , true);
                    $('#objectiveerror').html('No Objectives for Selected Team');
                }else{
                    $('#objectiveerror').html('');
                    $('#saveokrmapperbutton').attr('disabled' , false);
                    $('#select_objective').attr('disabled' , false);
                    $('#select_objective').html(res);
                }
            },
            error: function(error) {
                
            }
        });
    }
    function uploadattachment() {
        $('.uploadattachment').slideToggle();
        $('.nodatafound').slideToggle();
    }
    $('#okrmapperform').on('submit',(function(e) {
        $('#saveokrmapperbutton').html('<i class="fa fa-spin fa-spinner"></i>');
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
                $('.secondportion').html(res);
            }
        });
    }));
</script>