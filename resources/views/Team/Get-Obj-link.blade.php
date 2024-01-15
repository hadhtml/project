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
                                    {{ DB::table('org_team')->where('org_id' , $r->team_id)->first()->team_title }} -> {{ DB::table('objectives')->where('id' , $r->team_obj_id)->first()->objective_name }}
                                @endif
                                @if($r->type == 'unit')
                                    {{ DB::table('unit_team')->where('org_id' , $r->team_id)->first()->team_title }} -> {{ DB::table('objectives')->where('id' , $r->team_obj_id)->first()->objective_name }}
                                @endif
                                @if($r->type == 'stream')
                                    {{ DB::table('value_team')->where('org_id' , $r->team_id)->first()->team_title }} -> {{ DB::table('objectives')->where('id' , $r->team_obj_id)->first()->objective_name }}
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