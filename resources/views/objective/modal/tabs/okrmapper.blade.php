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
                        <form id="okrmapperform" action="{{ url('dashboard/keyresult/okrmapperform') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->type }}" name="to">
                            <input type="hidden" required  value="{{ $data->id }}" name="objectiveid">
                            <div class="row mb-5">
                                <div class="col-md-12 col-lg-12 col-xl-12" id="epicinputtoshow">
                                    <div class="form-group mb-0 positionrelative">
                                        <label for="objective-name">Key Result</label>
                                        <input required style="height: 70px !important;" id="searchobjective" onkeyup="searchkeyresult(this.value)" type="text" placeholder="Search Key Result" name="objective_id" class="form-control">
                                        <div class="searchiconforinput">
                                            <img src="{{ url('public/assets/images/searchiconsvg.svg') }}">
                                        </div>
                                        <div class="selectepic" style="display: none;height: 58px;">
                                            
                                        </div>
                                    </div>
                                    <div class="searchepic-box">
                
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
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
                                @if($r->from == 'org')
                                    @php
                                        $keyresult = DB::table('key_result')->where('id' , $r->bussiness_key_id)->first();
                                        $objective = DB::table('objectives')->where('id' , $r->linked_objective_id)->first();
                                        $organization = DB::table('organization')->where('id' , $objective->unit_id)->first();
                                    @endphp
                                    <div class="epic">
                                        <div class="epic-tittle">
                                            <img class="mr-1" src="{{ url('public/assets/svg/objectives/two.svg') }}"> {{ $keyresult->key_name }}
                                        </div>
                                        <div class="epic-detail okrmappersearchdetail mt-2">
                                            <span style="font-size:22px" class="material-symbols-outlined mr-2">auto_stories</span>
                                            <span>{{ $organization->organization_name }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if($r->from == 'unit')
                                    @php
                                        $keyresult = DB::table('key_result')->where('id' , $r->bussiness_key_id)->first();
                                        $objective = DB::table('objectives')->where('id' , $r->linked_objective_id)->first();
                                        $organization = DB::table('business_units')->where('id' , $objective->unit_id)->first();
                                    @endphp
                                    <div class="epic">
                                        <div class="epic-tittle">
                                            <img class="mr-1" src="{{ url('public/assets/svg/objectives/two.svg') }}"> {{ $keyresult->key_name }}
                                        </div>
                                        <div class="epic-detail okrmappersearchdetail mt-2">
                                            <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
                                            <span>{{ $organization->business_name }}</span>
                                        </div>
                                    </div>
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
    function removeobjective(id) {
         $('#objectiveid').val('');
        $('.selectepic').hide();
        $('.selectepic').html('');
        $('#searchobjective').val('');
        $('#searchobjective').attr('disabled' , false)
    }
    function searchkeyresult(id) {
        var type = '{{ $data->type }}';
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/keyresult/searchkeyresult') }}",
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