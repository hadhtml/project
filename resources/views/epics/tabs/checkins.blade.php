<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">checklist</span>
                </div>
                <div>
                    <h4>Dependency Map</h4>
                </div>
            </div>
            <div class="displayflex">
                <span onclick="uploadattachment()" class="btn btn-default btn-sm">Add</span>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12 col-lg-12 col-xl-12 uploadattachment">
    <div class="d-flex flex-column">
        <div class="card comment-card storyaddcard">
            <div class="card-body">
                <form id="saveissueform" action="{{ url('savemapissue') }}" method="POST"> 
                    @csrf
                    <input type="hidden" value="{{ $data->id }}" name="epic_id">
                    <input type="hidden" value="{{ $data->epic_type }}" name="type">
                    <input type="hidden" value="{{ $data->buisness_unit_id }}" name="bussiness_unit_id">
                    <input type="hidden"  value="{{$data->month_id}}"  id="month_id" name="objectiveid">

                    <div class="row mb-5">
                        <div class="col-md-12 col-lg-12 col-xl-12" id="epicinputtoshow">
                            <div class="form-group mb-0 positionrelative">
                                <label for="objective-name">Search for issues</label>
                                <input required style="height: 70px !important;" id="searchobjective" onkeyup="searchissue(this.value,'{{$data->id}}')" type="text" placeholder="Search for issues" name="objective_id" class="form-control">
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
                            <button type="button" onclick="savelinkingmap();" class="btn btn-primary btn-theme" id="saveokrmapperbutton">Add</button>
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

        @php
        @endphp
        @if($r->block)
        <div class="card attachment-card-new mt-3">
            <div class="deletecomment hidepopupall" id="deleteattachmentshow{{ $r->ID }}">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Delete Linking</h4>
                    </div>
                    <div class="col-md-2">
                        <img onclick="deleteattachmentshow({{$r->ID}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                    </div>
                </div>
                <p>Do you want to delete this Linking ? You won’t be able to undo this action.</p>
                <button onclick="deletelinkingmap({{ $r->ID }},'{{$r->map_id}}')" class="btn btn-danger btn-block">Delete</button>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12">
                         
                       
                            @php
                                $name = '';
                                
                               

                                
                                if($r->block_type == 'Story')
                                {
                                $objective = DB::table('epics_stroy')->where('id' , $r->block)->first();
                                $name = $objective->epic_story_name;
                                }else
                                {
                                $objective = DB::table('epics')->where('id' , $r->block)->first();
                                $name = $objective->epic_name;
                                }
                   
                        
                     
                            @endphp
                            <div class="epic">
                                
                                <div class="epic-tittle"> @if($r->block_type == 'Story') <span style="font-size:20px;margin-top:-10px" class="material-symbols-outlined">auto_stories</span> @else <img src="http://localhost/agileprolific/public/assets/svg/arrow.svg"> @endif  @if($r->block_type == 'Story') SSP-{{ $r->block }} @else OE-{{ $r->block }} @endif {{ $name }}</div>
                                <div class="epic-detail okrmappersearchdetail mt-2">
                                    
                                    @if($r->block_level_type == 'org')
                                    <span style="font-size:22px" class="material-symbols-outlined mr-2">home</span>
                                    <span>{{ DB::table('organization')->where('id' , $r->block_level_id)->first()->organization_name }}</span>
                                    @endif
                                    @if($r->block_level_type == 'unit')
                                    <span style="font-size:22px" class="material-symbols-outlined mr-2">domain</span>
                                    <span>{{ DB::table('business_units')->where('id' , $r->block_level_id)->first()->business_name }}</span>
                                    @endif
                                    @if($r->block_level_type == 'stream')
                                    <span style="font-size:22px" class="material-symbols-outlined mr-2">layers</span>
                                    <span>{{ DB::table('value_stream')->where('id' , $r->block_level_id)->first()->value_name }}</span>
                                    @endif
                                    @if($r->block_level_type == 'VS')
                                    <span style="font-size:22px" class="material-symbols-outlined mr-2">groups</span>
                                    <span>{{ DB::table('value_team')->where('id' , $r->block_level_id)->first()->team_title }}</span>
                                    @endif
                                    @if($r->block_level_type == 'BU')
                                    <span style="font-size:22px" class="material-symbols-outlined mr-2">groups</span>
                                    <span>{{ DB::table('unit_team')->where('id',$r->block_level_id)->first()->team_title }}</span>
                                    @endif
                                    @if($r->block_level_type == 'orgT')
                                    <span style="font-size:22px" class="material-symbols-outlined mr-2">groups</span>
                                    <span>{{ DB::table('org_team')->where('id' , $r->block_level_id)->first()->team_title }}</span>
                                    @endif
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="displayflexandmarginleft">
                        <div>
                            <span onclick="deleteattachmentshow({{$r->ID}})" class="commenticon">
                                <img src="{{ url('public/assets/svg/deleteattachmentsvg.svg') }}">
                            </span>
                        </div>
                    </div>          
                </div>
              </div>
            </div>
        </div>
        @endif
        @endforeach
        @else
            <div class="nodatafound">
                <h4>No Linking Found</h4>    
            </div>
        @endif
    </div>

<script type="text/javascript">
function uploadattachment() {
    $('.uploadattachment').slideToggle();
    $('.nodatafound').slideToggle();
}

function removeobjective(id) {
         $('#objectiveid').val('');
        $('.selectepic').hide();
        $('.selectepic').html('');
        $('#searchobjective').val('');
        $('#searchobjective').attr('disabled' , false)
    }

function searchissue(id,epic) {
        var type = '{{ $data->type }}';
        var unit_id = '{{$data->buisness_unit_id}}';
        $.ajax({
            type: "POST",
            url: "{{ url('searchissues') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                type:type,
                epic:epic,
                unit_id:unit_id,
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

    // $('#saveissueform').on('submit',(function(e) {
    //     $('#saveokrmapperbutton').html('<i class="fa fa-spin fa-spinner"></i>');
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     $.ajax({
    //         type:'POST',
    //         url: $(this).attr('action'),
    //         data:formData,
    //         cache:false,
    //         contentType: false,
    //         processData: false,
    //         success: function(res){
    //             $('.secondportion').html(res);
    //         }
    //     });
    // }));

    function deleteattachmentshow(id) {
        $('#deleteattachmentshow'+id).slideToggle();
      }

      function deletelinkingmap(id,map_id) {
        var epic_id = '{{ $data->id }}';
        $.ajax({
            type: "POST",
            url: "{{ url('deletelinkingmap') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id:id,
                epic_id:epic_id,
                map_id:map_id,
            },
            success: function(res) {
                $('.secondportion').html(res);
            },
            error: function(error) {
                
            }
        });
    }

    function savelinkingmap() {
        var epic_id = '{{ $data->id }}';
        var type ="{{ $data->epic_type }}";
        var  bussiness_unit_id ="{{ $data->buisness_unit_id }}";
        var  block_type = $('#block_type').val();
        var  block_level_id = $('#block_level_id').val();
        var  block_level_type = $('#block_level_type').val();
        var  objectiveid = $('#objectiveid').val();
        var  month_id = $('#month_id').val();

        $.ajax({
            type: "POST",
            url: "{{ url('savemapissue') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                epic_id:epic_id,
                type:type,
                bussiness_unit_id:bussiness_unit_id,
                block_type:block_type,
                block_level_id:block_level_id,
                block_level_type:block_level_type,
                objectiveid:objectiveid,
                month_id:month_id,

            },
            success: function(res) {
                $('.secondportion').html(res);
            },
            error: function(error) {
                
            }
        });
    }
</script>