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
                                <div class="col-md-12 col-lg-12 col-xl-12" id="epicinputtoshow">
                                    <input type="hidden" id="epic_id" value="{{ $data->epic_id }}" name="epic_id">
                                    <div class="form-group mb-0 positionrelative">
                                        <label for="objective-name">Search Objectives</label>
                                        <input onkeyup="searchobjectives(this.value)" type="text" placeholder="Search Objectives" class="form-control">
                                        <div class="searchiconforinput">
                                            <img src="{{ url('public/assets/images/searchiconsvg.svg') }}">
                                        </div>
                                    </div>
                                    <div class="searchepic-box">
                
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="key_name">Select Team</label>
                                        <select id="selectedteamid" required name="team_id" onchange="selectteamokrmapper(this.value , '{{ $data->type }}')" class="form-control">
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
                                        <select onchange="checkkeyresultlink()" required name="team_obj_id" id="select_objective" class="form-control">
                                            <option value="">Select Objective</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
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
        @if($linking->count() > 0)
            @foreach($linking as $r)
            <div class="card attachment-card-new mt-3">
                <div class="deletecomment hidepopupall" id="deleteattachmentshow{{ $r->id }}">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Delete Linking</h4>
                        </div>
                        <div class="col-md-2">
                            <img onclick="deleteattachmentshow({{$r->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                        </div>
                    </div>
                    <p>Do you want to delete this Linking ? You won’t be able to undo this action.</p>
                    <button onclick="deletelinking({{ $r->id }})" class="btn btn-danger btn-block">Delete</button>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                @if($r->type == 'org')
                                    {{ DB::table('org_team')->where('id' , $r->team_id)->first()->team_title }} -> {{ DB::table('objectives')->where('id' , $r->team_obj_id)->first()->objective_name }}
                                @endif
                                @if($r->type == 'unit')
                                    {{ DB::table('unit_team')->where('id' , $r->team_id)->first()->team_title }} -> {{ DB::table('objectives')->where('id' , $r->team_obj_id)->first()->objective_name }}
                                @endif
                                @if($r->type == 'stream')
                                    {{ DB::table('value_team')->where('id' , $r->team_id)->first()->team_title }} -> {{ DB::table('objectives')->where('id' , $r->team_obj_id)->first()->objective_name }}
                                @endif
                            </div>
                            <div class="col-md-12">
                                <span class="material-symbols-outlined">link</span>
                            </div>
                            <div class="col-md-12">
                                @if($r->type == 'org')
                                    {{ DB::table('organization')->where('id' , $r->bussiness_unit_id)->first()->organization_name }} -> {{ DB::table('objectives')->where('id' , $r->bussiness_obj_id)->first()->objective_name }} -> {{ DB::table('key_result')->where('id' , $r->bussiness_key_id)->first()->key_name }}
                                @endif
                                @if($r->type == 'unit')
                                    {{ DB::table('business_units')->where('id' , $r->bussiness_unit_id)->first()->business_name }} -> {{ DB::table('objectives')->where('id' , $r->bussiness_obj_id)->first()->objective_name }} -> {{ DB::table('key_result')->where('id' , $r->bussiness_key_id)->first()->key_name }}
                                @endif
                                @if($r->type == 'stream')
                                    {{ DB::table('value_stream')->where('id' , $r->bussiness_unit_id)->first()->value_name }} -> {{ DB::table('objectives')->where('id' , $r->bussiness_obj_id)->first()->objective_name }} -> {{ DB::table('key_result')->where('id' , $r->bussiness_key_id)->first()->key_name }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="displayflexandmarginleft">
                            <div>
                                <span onclick="deleteattachmentshow({{$r->id}})" class="commenticon">
                                    <img src="{{ url('public/assets/svg/deleteattachmentsvg.svg') }}">
                                </span>
                            </div>
                        </div>          
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="nodatafound">
                    <h4>No Linking Found</h4>    
                </div>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
    function searchobjectives(id) {
        var type = '{{ $data->type }}';
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/searchobjectives') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                type:type
            },
            success: function(res) {
                if(id == '')
                {
                    $('.searchepic-box').hide();
                }else{
                    $('.searchepic-box').show();
                    $('.searchepic-box').html(res);
                }
            },
            error: function(error) {
                
            }
        });
    }
    function deletelinking(id) {
        var key_id = '{{ $data->id }}';
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/deletelinking') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id
            },
            success: function(res) {
                $('.secondportion').html(res);
            },
            error: function(error) {
                
            }
        });
    }
    function checkkeyresultlink() {
        var bussiness_key_id = "{{ $data->id }}";
        var type = "{{ $data->type }}";
        var bussiness_unit_id = "{{ $data->unit_id }}";
        var bussiness_obj_id = "{{ $data->obj_id }}";
        var team_obj_id = $('#select_objective').val();
        var selectedteamid = $('#selectedteamid').val();
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/checkkeyresultlink') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                bussiness_key_id:bussiness_key_id,
                type:type,
                bussiness_unit_id:bussiness_unit_id,
                bussiness_obj_id:bussiness_obj_id,
                team_obj_id:team_obj_id,
                team_id:selectedteamid,
            },
            success: function(res) {
                if(res == 2)
                {
                    $('#saveokrmapperbutton').attr('disabled' , true);
                    $('#objectiveerror').html('This Objective is Already Linked');
                }else{
                    $('#objectiveerror').html('');
                    $('#saveokrmapperbutton').attr('disabled' , false);
                }
            },
            error: function(error) {
                
            }
        });
    }
    function deleteattachmentshow(id) {
        $('#deleteattachmentshow'+id).slideToggle();
      }
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
                    checkkeyresultlink();
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