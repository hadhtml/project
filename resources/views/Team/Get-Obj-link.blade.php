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
                        <form id="okrmapperform" method="POST" action="{{ url('dashboard/linking/saveteamlevellinking') }}">
                            @csrf
                            <input type="hidden" value="{{ $organization->id }}" name="team_id">
                            <input type="hidden" value="{{ $objective->id }}" name="team_obj_id">
                            @if($objective->type == 'BU')
                            <input type="hidden" value="unit" name="type">
                            @endif
                            @if($objective->type == 'orgT')
                            <input type="hidden" value="org" name="type">
                            @endif
                            @if($objective->type == 'VS')
                            <input type="hidden" value="stream" name="type">
                            @endif
                            <div class="row">
                                @if($type == 'BU')
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <select required id="business_uni_id" name="bussiness_unit_id" class="form-control unitobj" onchange="getunitobjective(this.value)">
                                             <option value="" >Select {{ Cmf::getmodulename("level_one") }}</option>
                                             <?php foreach(DB::table('business_units')->where('id',$organization->org_id)->get() as $r){ ?>
                                             <option value="{{ $r->id }}">{{ $r->business_name }}</option>
                                             <?php }  ?>
                                          </select>
                                          <label for="small-description">Choose {{ Cmf::getmodulename("level_one") }}</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <select name="bussiness_obj_id" id="showunitobjective" onchange="getunitkeyresult(this.value,1)"  class="form-control"  required>
                                            <option value="" >Select Objective</option>
                                          </select>
                                          <label for="small-description" >Choose Objective</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <select name="bussiness_key_id" id="showunitkeyresult1" onchange="checkkeyresultmapper(this.value,1)"   class="form-control key-BU" required>
                                            <option value="" >Select Key Result</option>
                                          </select>
                                          <label for="small-description" >Choose Key Result <small id="objectiveerror" class="text-danger"></small></label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                            <span onclick="uploadattachment()" class="btn btn-default btn-sm">Cancel</span>
                                            <button id="saveokrmapperbutton" type="submit" class="btn btn-primary btn-sm">Save</button>
                                       </div>
                                    </div>
                                    <div class="col-md-12 field_wrapper_bu"></div>
                                    @endif
                                    @if($type == 'VS')
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="d-flex flex-row align-items-center justify-content-between mt-4">
                                          <div>
                                             Team's Linking
                                          </div>
                                          <a href="javascript:void(0);" onclick="appendBu();" class="text-black" title="Add field"><i class="fa fa-plus" aria-hidden="true"></i></a> 
                                       </div>
                                       <hr>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <select class="form-control unitobj" onchange="getUnitObj(this.value,1)">
                                             <option value="" >Select {{ Cmf::getmodulename('level_two') }}</option>
                                             <?php foreach(DB::table('value_stream')->where('id',$organization->org_id)->get() as $r){ ?>
                                             <option value="{{ $r->id }}">{{ $r->value_name }}</option>
                                             <?php }  ?>
                                          </select>
                                          <label for="small-description">Choose {{ Cmf::getmodulename('level_two') }}</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <select name="" id="bu-obj1" onchange="getBUKey(this.value,1)"  class="form-control bu-obj" value="" required>
                                          </select>
                                          <label for="small-description" >Choose Objective</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                       <div class="form-group mb-0">
                                          <select name="" id="key-BU1"   class="form-control key-BU" value="" required>
                                          </select>
                                          <label for="small-description">Choose Key Result <small id="objectiveerror" class="text-danger"></small></label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                                       <div class="form-group mb-0">
                                            <span onclick="uploadattachment()" class="btn btn-default btn-sm">Cancel</span>
                                            <button id="saveokrmapperbutton" type="submit" class="btn btn-primary btn-sm">Save</button>
                                       </div>
                                    </div>
                                    <div class="col-md-12 field_wrapper_bu"></div>
                                @endif
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
    function uploadattachment() {
        $('.uploadattachment').slideToggle();
        $('.nodatafound').slideToggle();
    }
    function getunitobjective(id) {
        var type = "{{ $organization->type }}";
        $.ajax({
            type: "GET",
            url: "{{ url('get-unit-obj') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                type: type,
            },
            success: function(res) {
                if (res) {
                    $('#showunitobjective').empty();
                    $('#showunitobjective').append('<option hidden>Choose Obective</option>');
                    $.each(res, function(key, course) {
                        $('#showunitobjective').append('<option value="' + course.id + '">' + course
                            .objective_name + '</option>');
                    });
                } else {
                    $('#showunitobjective').empty();
                }

            }
        });
    }
    function getunitkeyresult(id,val) {
        var key_id = localStorage.getItem("key-id");
        $.ajax({
            type: "GET",
            url: "{{ url('get-BU-key') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                val:val,
                key_id:key_id,
            },
            success: function(res) {
                if (res) {
                    $('#showunitkeyresult' + val).empty();
                    $('#showunitkeyresult' + val).append('<option hidden>Choose Key Result</option>');
                    $.each(res, function(key, course) {
                        $('#showunitkeyresult' + val).append('<option value="' + course.id + '">' + course
                            .key_name + '</option>');
                    });
                } else {
                    $('#showunitkeyresult' + val).empty();
                }
            }
        });
    }
    function checkkeyresultmapper(id) {
        var team_id = '{{ $organization->id }}';
        var team_obj_id = '{{ $objective->id }}';
        var bussiness_unit_id = $('#business_uni_id').val();
        var bussiness_obj_id =  $('#showunitobjective').val();
        var bussiness_key_id =  $('#showunitkeyresult1').val();
        var type = '{{ $objective->type }}';
        if(type == 'BU')
        {
            var actualtype = 'unit';
        }
        if(type == 'orgT')
        {
            var actualtype = 'org';
        }
        if(type == 'VS')
        {
            var actualtype = 'stream';
        }
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/linking/checkkeyresultmapper') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                team_id: team_id,
                team_obj_id:team_obj_id,
                bussiness_unit_id:bussiness_unit_id,
                bussiness_obj_id:bussiness_obj_id,
                bussiness_key_id:bussiness_key_id,
                type:actualtype,
            },
            success: function(res) {
                if(res == 2)
                {
                    $('#saveokrmapperbutton').attr('disabled' , true);
                    $('#objectiveerror').html('This Key Result is Already Linked');
                }else{
                    $('#objectiveerror').html('');
                    $('#saveokrmapperbutton').attr('disabled' , false);
                }
            }
        });
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
                $('.link-data-obj').html(res);
            }
        });
    }));
</script>