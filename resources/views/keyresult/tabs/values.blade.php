<style>
.select2-container {
  min-width: 480px;
}


.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: blue;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
  background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
  background-color: #eaeaeb;
  color: #272727;
}
.select2-container--default .select2-selection--multiple {
  margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
  border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
  /* border-color: #f77750; */
  border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
  border-width: 2px;
}
.select2-container--open .select2-dropdown--below {
  
  border-radius: 6px;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
  content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
  display: none;
}
.select-icon .placeholder {
/*  display: none; */
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
  display: none !important;
  /* content: "" !important; */
}
.select-icon  .select2-search--dropdown {
  display: none;
}
</style>
@if (!isset($noreport))
    @if ($KEYChart)
        @php
            $keyqvalue = '';
            $keyqfirst = DB::table('key_quarter_value')
                ->where('key_chart_id', $KEYChart->id)
                ->orderby('id', 'DESC')
                ->first();
            if ($keyqfirst) {
                $keyqvalue = $keyqfirst->value;
            }
        @endphp
    @endif


    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="d-flex flex-row align-items-center justify-content-between block-header">
                <div class="d-flex flex-row align-items-center">
                    <div class="mr-2">
                        <span class="material-symbols-outlined">database</span>
                    </div>
                    <div>
                        <h4>Current Value : @if ($KEYChart)
                                <span id="q-value{{ $KEYChart->id }}">{{ $keyqvalue }}</span>
                                @endif @if ($KEYChart)
                                    <span class="valueheading">{{ $key->key_result_type }} {{ $KEYChart->quarter_value }}
                                @endif
                                </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($report && $KEYChart)
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="d-flex flex-row align-items-center justify-content-between block-header">
                    <div class="d-flex flex-row align-items-center">
                        <div class="mr-2">
                            <span class="material-symbols-outlined">
                                checklist
                                </span>
                        </div>
                        <div>
                            <h4>Check-in</h4>
                        </div>
                    </div>
                    <div class="displayflex">

                        <span onclick="uploadattachment()" class="btn btn-default btn-sm">New Check-In</span>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="row uploadattachment">
            <div class="col-md-12">
                <div class="card comment-card storyaddcard">
                    <div class="card-body">
                        <form class="needs-validation savekeychartnewform"
                            action="{{ url('add-new-quarter-value') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $key->id }}" name="id">
                            <input type="hidden" value="{{ $KEYChart->id }}" name="key_chart_id">
                            <input type="hidden" value="{{ $report->id  }}" name="sprint_id">

                         

                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Value</label>
                                        <input type="text" name="value" onkeypress="return onlyNumberKey(event)" class="form-control"
                                            id="new-chart-value{{ $key->id }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group mb-0">
                                        <label for="flag_type">Status<small class="text-danger">*</small></label>
                                       <select required class="form-control" name="status" id="flag_type" >
                                           <option value="">Select Status</option>
                                           <option value="On Track">On Track</option>
                                           <option value="At Risk">At Risk</option>
                                           <option value="Off Track">Off Track</option>
                                       </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0" style="margin-bottom:-30px !important ">
                                        <label for="flag_assignee">Participants <small class="text-danger">*</small></label>
                                    </div>
                                        <select required id="js-select1"  multiple="multiple" name="participant[]">
                                            <option value="">Select Assignee</option>
                                            @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                                <option value="{{ $r->id }}">{{ $r->name }}
                                                    {{ $r->last_name }}</option>
                                            @endforeach
                                        </select>

                                   
                                </div>
                             
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Summary</label>
                                        <textarea name="summary" class="form-control"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span onclick="uploadattachment()" class="btn btn-default btn-sm">Cancel</span>
                                    <button type="submit"
                                        class="saveepicflagbuttonasdsadsad btn btn-primary btn-sm">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="form-group mb-0">
                    <label for="small-description">New Value</label>
                    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control"
                        id="new-chart-value{{ $key->id }}" required>
                </div>
            </div>
        </div> --}}
    @else
        <div class="ml-2 text-danger mt-2" role="alert">
            Define Quarterly Target for Current Quarter
        </div>
    @endif
    <div class="row field_wrapper_key">
        <div class="col-md-12">
            @if ($KEYChart)
                @php
                    $keyqvalue = DB::table('key_quarter_value')
                        ->where('key_chart_id', $KEYChart->id)
                        ->orderby('id', 'DESC')
                        ->get();
                @endphp
                   @foreach($keyqvalue as $val)

                   @php
                   $dataArray = explode(',', $val->participant);
                   $dataCount = count($dataArray);
                    $firstTwoIds = array_slice($dataArray, 0, 2);
                    $remainingIds = array_slice($dataArray, 2);
                    $remainingCount = count($remainingIds);
                              
             
        $commentscount = DB::table('flag_comments')->where('flag_id',$val->id)->where('type','comment')->where('comment_type','key')->count();
    
                   @endphp
                   <div class="card check-in-card">
                       <div class="card-body">
                           <div class="d-flex flex-row align-items-center justify-content-between check-in-header">
                               <div class="d-flex flex-row align-items-center">   
                                   <div class="lable">
                                       <small> <span></span>{{$val->status}}</small>
                                   </div>
                                   <div class="d-flex flex-row align-items-center value ml-3">
                                       <div><small>Value: </small></div>
                                       <h4 class="mt-2 ml-1">{{$val->value}}</h4>
                                   </div>
                               </div>
                               <div>
                                   <div class="symbol-group symbol-hover">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                    @foreach($firstTwoIds as $member)
                                    @foreach(DB::table('members')->get() as $r)
                                    @if($r->id == $member)
                                    @php
                                    $name = $r->name.' '.$r->last_name;
                                    @endphp
         
                                     <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="{{$name}}">
                                         @if($r->image != NULL)
                                                 <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                                 @else
                                                 <img src="{{ Avatar::create($name)->toBase64() }}" alt="Example Image">
                                                 @endif
                                     </div>
                                     
                                     @endif
                                     @endforeach
                                     @endforeach
                                     @if($dataCount > 3)
                                     <div style="width:42px; height:42px; padding: 10px; font-size: 12px;" class="symbol symbol-30  symbol-circle symbol-light" data-toggle="tooltip" title="" data-original-title="More users">
                                         <span class="symbol-label">{{$remainingCount}}+</span>
                                     </div>
                                     @endif
                                                                                  
                                   </div>
                               </div>
                           </div>
           
                           <div class="check-in-content">
                               <p>{{$val->summary}}</p>
                           </div>
                           <div class="d-flex flex-row justify-content-between mt-1">
                               <div class="d-flex flex-row">
                                   <button class="btn btn-default btn-sm">Comments ({{$commentscount}})</button>
                               </div>
                               <div>
                                   <div class="dropdown d-flex">
                                     
                                      <span class="mt-1"> {{ \Carbon\Carbon::parse($val->created_at)->diffForHumans(); }}</span>
                                       <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <img src="http://dev.agileprolific.com/public/assets/svg/dropdowndots.svg">
                                       </button>
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                           <a class="dropdown-item" data-toggle="modal" onclick="showupdatecard({{$val->id}})" data-target="#edit22">Edit</a>
                                           <a class="dropdown-item" data-toggle="modal" onclick="deletequartervalue({{ $val->id }})" data-target="#delete22">Delete</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                         
                       </div>
                       
                   </div>
                  
       
                 
               

                   <div class="uploadattachment{{ $val->id }} displaynone">
                    <div class="card comment-card storyaddcard">
                        <div class="card-body">
                            <form class="needs-validation updatekeychart{{ $val->id }}" action="{{ url('update-new-quarter-value') }}" method="POST" novalidate>
                                @csrf
                                <input type="hidden" value="{{ $val->id }}" name="flag_id">
                                <input type="hidden" value="{{ $key->id }}" name="id">
                                <div class="row">        
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group mb-0">
                                            <label for="small-description">Value</label>
                                            <input type="text" name="value" value="{{$val->value}}" onkeypress="return onlyNumberKey(event)" class="form-control"
                                                id="new-chart-value{{ $key->id }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group mb-0">
                                            <label for="flag_type">Status<small class="text-danger">*</small></label>
                                           <select required class="form-control" name="status" id="flag_type" >
                                           
                                               <option @if($val->status == 'On Track') selected @endif value="On Track">On Track</option>
                                               <option @if($val->status == 'At Risk') selected @endif value="At Risk">At Risk</option>
                                               <option @if($val->status == 'Off Track') selected @endif value="Off Track">Off Track</option>
                                           </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0" style="margin-bottom:-30px !important ">
                                            <label for="flag_assignee">Participants <small class="text-danger">*</small></label>
                                        </div>
                                            <select required id="js-select2{{$val->id}}"  multiple="multiple"  name="participant[]">
                                                <option value="">Select Assignee</option>
                                                @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                                    <option @foreach($dataArray as $member) @if($r->id == $member ) selected  @endif @endforeach value="{{ $r->id }}">{{ $r->name }}
                                                        {{ $r->last_name }}</option>
                                                @endforeach
                                            </select>
    
                                       
                                    </div>
                                 
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <label for="small-description">Summary</label>
                                            <textarea name="summary" class="form-control">{{$val->summary}}</textarea>
    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span onclick="showupdatecard({{ $val->id }})" class="btn btn-default btn-sm">Cancel</span>
                                        <button type="submit" class="btn btn-primary btn-sm updateflagmodalbuton{{ $r->id }}">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('.updatekeychart{{ $val->id }}').on('submit',(function(e) {
                        $('.updateflagmodalbuton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                                $('.secondportion').html(data);
                            }
                        });
                    }));
                </script>
                 <div class="row">
                    <div class="col-md-12">
                 <div class="d-flex flex-row justify-content-between mt-1">
                    <div class="d-flex flex-row">
                        <h6 class="text-black">Comments</h6>
                    </div>
                    <div>
                        <div class="dropdown d-flex">
                          
            
                            <button class="btn btn-default btn-sm" onclick="writecomment({{ $val->id }})">
                              Add Comments
                            </button>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 displaynone writecomment{{ $val->id }}" >
            <div class="d-flex flex-column">
                <form method="POST" id="savecommentkey{{ $val->id }}" action="{{ url('keyresult-savecomment') }}">
                @csrf
                <input type="hidden" value="{{$val->id}}" name="flag_id">
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <input type="hidden" value="{{ $key->id }}" name="id">
                    <div class="form-group mb-8">
                        <label for="objective-name">Write Comment</label>
                        <textarea id="textarea" style="height:100% !important;" class="form-control mention" name="comment" rows="5"></textarea>
                    </div>
                    <span onclick="writecomment()" class="btn btn-default btn-sm">Cancel</span>
                    <button type="submit" id="savecommentbutton{{ $val->id }}" class="btn btn-primary btn-sm">Save</button>
                </form>
            </div>
        </div>
        @php 
        $comments = DB::table('flag_comments')->where('flag_id',$val->id)->where('type','comment')->where('comment_type','key')->get();
        @endphp
        @foreach($comments as $r)
        @php
            $user = DB::table('users')->where('id',$r->user_id)->first();
        @endphp
        <div class="card comment-card-new" id="commentdeletekey{{ $r->id }}">
            <div class="deletecomment" id="commentdelete{{ $r->id }}">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Delete Comment</h4>
                    </div>
                    <div class="col-md-2">
                        <img onclick="deletecommentshow({{$r->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                    </div>
                </div>
                <p>Do you want to delete your comment ? You won’t be able to undo this action.</p>
                <button onclick="deletecomment({{ $r->id }},'{{ $key->id }}')" class="btn btn-danger btn-block">Delete</button>
            </div>
            <div class="commentedit" id="commentedit{{ $r->id }}">
                <form method="POST" id="updatecomment{{ $r->id }}" action="{{ url('updatecomment-key') }}">
                    @csrf
                    <input type="hidden" value="{{ $r->id }}" name="comment_id">
                    <input type="hidden" value="{{ $key->id }}" name="id">
                    <div class="row mt-3">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-column">
                                <div>
                                    <div class="form-group mb-0">
                                        <textarea required class="form-control" name="comment">{{ $r->comment }}</textarea>
                                    </div>
                                </div>
                                <div>
                                    <span onclick="editcommenthide({{$r->id}})" class="btn btn-default btn-sm">Cancel</span>
                                    <button type="submit" id="updatecommentbutton{{ $r->id }}" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex flex-row align-items-center">
                            <div class="d-flex">
                                <div class="mr-2">
                                    @if($user->image != NULL)
                                    <img height="40" width="40" style="border-radius: 50%;" src="{{asset('public/assets/images/'.$user->image)}}" alt="{{ $user->name }} {{ $user->last_name }}">
                                    @else
                                    <img height="40" width="40" src="{{ Avatar::create($user->name.' '.$user->last_name)->toBase64() }}" alt="Example Image">
                                    @endif
                                </div>
                                <div>
                                    <h5>{{ $user->name }} {{ $user->last_name }}</h5>
                                    <small>{{ Cmf::date_format($r->created_at) }}</small>
                                    @if($r->created_at != $r->updated_at)
                                    <small>Updated</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div class="pr-2">
                                <span onclick="editcommentshow({{$r->id}})" class="commenticon">
                                    <img src="{{ url('public/assets/svg/editcommentsvg.svg') }}">
                                </span>
                            </div>
                            <div>
                                <span onclick="deletecommentshow({{$r->id}})" class="commenticon">
                                    <img src="{{ url('public/assets/svg/deletecomment.svg') }}">
                                </span>
                            </div>
                        </div>
                    </div>
                    @php
                    $str = strlen($r->comment);
                    @endphp
                    <div>
                        <p class="load-more" id="load-more{{$r->id}}">{{ \Illuminate\Support\Str::limit($r->comment,220, $end='') }}
                            @if($str > 220)
                            <a  href="javascript:void(0);" onclick="loadmore({{$r->id}});" id="toggle-button{{$r->id}}" class="" style="font-size:10px;">More</a>
                            @endif
                        </p>

                        <p id="more-content{{$r->id}}"  style="line-height:15px;display:none">
                            {{$r->comment}}
                      <a href="javascript:void(0);" onclick="seeless({{$r->id}});" id="toggle-button-less{{$r->id}}" class="" style="font-size:10px;">Less</a>
                        </p>
                    </div>
                    <div>
                        <button onclick="replycomment({{$r->id}})" class="btn btn-default btn-sm">Reply</button>
                    </div>
                    
                    <div class="replycard{{ $r->id }}" style="display: none;" >
                        <form id="savereply{{ $r->id }}" method="POST" action="{{ url('savereply-key') }}">
                            @csrf
                            <input type="hidden" value="{{ $r->flag_id }}" name="flag_id">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="hidden" value="{{ $r->id }}" name="comment_id">
                            <input type="hidden" value="{{ $key->id }}" name="id">
                            <div class="d-flex flex-column mt-3 d-none" >
                                <div>
                                    <div class="form-group mb-0">
                                        <label for="objective-name">Write Reply</label>
                                        <textarea required class="form-control" name="comment"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <span onclick="replycomment({{$r->id}})" class="btn btn-default btn-sm">Cancel</span>
                                    <button type="submit" id="savereplybutton{{ $r->id }}" class="btn btn-primary btn-sm">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script type="text/javascript">
                        $('#savereply{{ $r->id }}').on('submit',(function(e) {
                            $('#savereplybutton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                                    $('#savereplybutton{{ $r->id }}').html('Save');
                                    $('.secondportion').html(data);
                                }
                            });
                        }));
                    </script>
                </div>
            </div>
        </div>

        @foreach(DB::table('flag_comments')->where('type' , 'reply')->where('comment_id' , $r->id)->orderby('id' , 'desc')->get() as $p)
        @php
            $puser = DB::table('users')->where('id',$p->user_id)->first();
        @endphp
            <div class="card comment-card-new reply-card">
                <div class="deletecomment" id="commentdelete{{ $p->id }}">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Delete Comment</h4>
                        </div>
                        <div class="col-md-2">
                            <img onclick="deletecomment
                            show({{$p->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                        </div>
                    </div>
                    <p>Do you want to delete your comment ? You won’t be able to undo this action.</p>
                    <button onclick="deletecomment({{ $p->id }})" class="btn btn-danger btn-block">Delete</button>
                </div>
                <div class="commentedit" id="commentedit{{ $p->id }}">
                    <form method="POST" id="updatecomment{{ $p->id }}" action="{{ url('updatecomment-key') }}">
                        @csrf
                        <input type="hidden" value="{{ $p->id }}" name="comment_id">
                        <input type="hidden" value="{{ $key->id }}" name="id">
                        <div class="row mt-3">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="d-flex flex-column">
                                    <div>
                                        <div class="form-group mb-0">
                                            <textarea required class="form-control" name="comment">{{ $p->comment }}</textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <span onclick="editcommenthide({{$p->id}})" class="btn btn-default btn-sm">Cancel</span>
                                        <button type="submit" id="updatecommentbutton{{ $p->id }}" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        @if($puser->image != NULL)
                                        <img height="40" width="40" style="border-radius: 50%;" src="{{asset('public/assets/images/'.$puser->image)}}" alt="{{ $puser->name }} {{ $puser->last_name }}">
                                        @else
                                        <img height="40" width="40" src="{{ Avatar::create($puser->name.' '.$puser->last_name)->toBase64() }}" alt="Example Image">
                                        @endif
                                    </div>
                                    <div>
                                        <h5>{{ $user->name }} {{ $user->last_name }}</h5>
                                        <small>{{ Cmf::date_format($p->created_at) }}</small>
                                        @if($p->created_at != $p->updated_at)
                                        <small>Updated</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="pr-2">
                                    <span onclick="editcommentshow({{$p->id}})" class="commenticon">
                                        <img src="{{ url('public/assets/svg/editcommentsvg.svg') }}">
                                    </span>
                                </div>
                                <div>
                                    <span onclick="deletecommentshow({{$p->id}})" class="commenticon">
                                        <img src="{{ url('public/assets/svg/deletecomment.svg') }}">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{{ $p->comment }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $('#updatecomment{{ $p->id }}').on('submit',(function(e) {
                    $('#updatecommentbutton{{ $p->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                            $('#updatecommentbutton{{ $p->id }}').html('Save');
                            $('.secondportion').html(data);
                            
                        }
                    });
                }));
            </script>
            @endforeach

        <script type="text/javascript">
        $('#updatecomment{{ $r->id }}').on('submit',(function(e) {
            $('#updatecommentbutton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                    $('#updatecommentbutton{{ $r->id }}').html('Save');
                    $('.secondportion').html(data);
                    
                }
            });
        }));
    </script>
        @endforeach
        
 
        <script type="text/javascript">
            $("#textarea").keypress(function (e) {
                if(e.which === 13 && !e.shiftKey) {
                    e.preventDefault();
                    $(this).closest("form").submit();
                }
            });

            $('#savecommentkey{{ $val->id }}').on('submit',(function(e) {
                $('#savecommentbutton{{ $val->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                        $('#savecommentbutton{{ $val->id}}').html('Save');
                        $('.secondportion').html(data);

                    }
                });
            }));

  
               

        </script>
      @endforeach
                {{-- <div @if ($keyqvalue->count() > 4) class="activity-feed" @endif>
                    <table class="table value-table">
                        <thead>
                            <tr>
                                <th>Updated On</th>
                                <th class="text-center">Value</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($keyqvalue as $val)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($val->created_at)->format('d M Y') }}</td>
                                    <td class="text-center" id="edit-val{{ $val->id }}">{{ $val->value }}</td>
                                    <td class="text-right" id="edit-button-val{{ $val->id }}">
                                        <button class="btn-circle btn-tolbar" type="button"
                                            onclick="editquartervalue({{ $val->id }},'{{ $val->value }}')">
                                            <span class="material-symbols-outlined">edit</span>
                                        </button>
                                        <button class="btn-circle btn-tolbar" type="button"
                                            onclick="deletequartervalue({{ $val->id }})">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div> --}}
            @endif
        </div>
    </div>
   

    <div class="row margintopfourtypixel">
        <div class="col-md-12 text-right">
            {{-- <button class="btn btn-primary"
                @if ($KEYChart) onclick="addnewquartervalue({{ $key->id }},'{{ $KEYChart->id }}','{{ $report->id }}')" @else disabled @endif
                type="button">Add</button> --}}
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="d-flex flex-row align-items-center justify-content-between block-header">
                <div class="d-flex flex-row align-items-center">
                    <div class="mr-2">
                        <span class="material-symbols-outlined">database</span>
                    </div>
                    <div>
                        <h4>Values</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="activity-feed">
            <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
                <div class="nodatafound">
                    <h4>Please Start Quarter First for Add Values in Key Result</h4>
                </div>
            </div>
        </div>
    </div>
@endif








  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>

   

    function uploadattachment() {
        $('.uploadattachment').slideToggle();
        $('.nodatafound').slideToggle();
    }

    function showupdatecard(id) {
  $('.uploadattachment'+id).slideToggle();
}

function writecomment(id) {
    $('.writecomment' + id).slideToggle();   
}



function showupdatecard(id) {
  $('.uploadattachment'+id).slideToggle();
  $("#js-select2" + id).select2({
      closeOnSelect : false,
      placeholder : "Select Assignee",
      allowHtml: true,
      allowClear: true,
      tags: true // создает новые опции на лету
    });

}

    $('.savekeychartnewform').on('submit',(function(e) {
    $('.saveepicflagbuttonasdsadsad').html('<i class="fa fa-spin fa-spinner"></i>');
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
            $('.secondportion').html(data);
   
        }
    });
}));

function deletecommentshow(id) {
    $('#commentdelete'+id).slideToggle();
}

function deletecomment(id,key) {
    $.ajax({
        type: "POST",
        url: "{{ url('deletecomment-key') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            key:key,
        },
        success: function(data) {
            $('#commentdeletekey'+ id).remove();
            $('.secondportion').html(data);
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
}

function editcommentshow(id) {
    $('#commentedit'+id).show();
}

function editcommenthide(id) {
    $('#commentedit'+id).hide();
}

function replycomment(id) {
    $('.replycard'+id).slideToggle();
}
// $(function() {


//  $('.key-chart').multiselect({
//    includeSelectAllOption:true,
//    numberDisplayed: 0
//  });


// });

$("#js-select1").select2({
      closeOnSelect : false,
      placeholder : "Select Assignee",
      // allowHtml: true,
      allowClear: true,
      tags: true // создает новые опции на лету
    });


</script>


