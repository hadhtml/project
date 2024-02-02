<script>
$(function() {
    $("#sortable").sortable({
        update: function(event, ui) { 
            getOrder()
        }
    });
});
function getOrder(){
    var order= $("#sortable .ui-state-default").map(function() {
        return this.id;        
    }).get();
    console.log(order)
    var epic_id = '{{ $data->id }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epics/sortflags') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            order: order,
            epic_id:epic_id,
        },
        success: function(res) {
            
        }
    });
    return order;
}
</script>
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 @if($flags->count() > 4) paddingrightzero @endif">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">flag</span>
                </div>
                <div>
                    <h4>Flags</h4>
                </div>
            </div>
            <div class="displayflex">
                <div class="dropdown firstdropdownofcomments">
                  <span class="dropdown-toggle orderbybutton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset($orderby))
                        @if($orderby == 'asc')
                            Filter by Older
                        @endif
                        @if($orderby == 'desc')
                            Filter by Latest
                        @endif
                    @else
                        Filter By
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                      <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                    </svg> 
                  </span>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="javascript:void(0)">All</a>
                    <a class="dropdown-item" href="javascript:void(0)">Impediment</a>
                    <a class="dropdown-item" href="javascript:void(0)">Risk</a>
                    <a class="dropdown-item" href="javascript:void(0)">Blocker</a>
                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                  </div>
                </div>
                <span onclick="uploadattachment()" class="btn btn-default btn-sm">Raise Flag</span>
            </div>
        </div>
    </div>
</div>
<div class="row uploadattachment">
    <div class="col-md-12">
        <div class="card comment-card storyaddcard">
            <div class="card-body">
                <form class="needs-validation saveepicflag" action="{{ url('dashboard/epicbacklog/saveepicflag') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $data->id }}" name="flag_epic_id">
                    <input type="hidden" value="{{ $data->unit_id }}" name="business_units">
                    <input type="hidden" value="{{ $data->type }}" name="board_type">
                    <div class="row">        
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <label for="flag_type">Flag Type <small class="text-danger">*</small></label>
                               <select required class="form-control" name="flag_type" id="flag_type" >
                                   <option value="">Select Type</option>
                                   <option value="Risk">Risk</option>
                                   <option value="Impediment">Impediment</option>
                                   <option value="Blocker">Blocker</option>
                                   <option value="Action">Action</option>
                               </select>
                                
                            </div>
                        </div>
                         <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <label for="flag_assignee">Assignee <small class="text-danger">*</small></label>
                                <select required class="form-control" id="flag_assignee" name="flag_assign">
                                    <option value="">Select Assignee</option>
                                    @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                      <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                         <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <label for="small-description">Title <small class="text-danger">*</small></label>
                                <input required type="text" class="form-control"  name="flag_title" >
                                
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <label for="small-description">Description</label>
                                <textarea name="flag_description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span onclick="uploadattachment()" class="btn btn-default btn-sm">Cancel</span>
                            <button type="submit" class="saveepicflagbutton btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="activity-feed @if($flags->count() == 0) col-md-12 @endif" id="list-container">
    <style type="text/css">
      .attachment-card-new{
        margin-top: 10px;
      }
      .attachment-card-new .card-body{
        padding: 10px;
      }
      .datecolor{
        font-size: 12px;
        color: #bdbdbd;
      }
      .filename{
        font-size: 15px;
        font-weight: 500;
        color: #4e5161;
      }
      .displayflexandmarginleft{
        display: flex;
        margin-left: 25px;
      }
    </style>
    <div id="sortable" type="1" class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
        @if($flags->count() > 0)
        @foreach($flags as $r)
        <div  id="{{ $r->id }}" class="ui-state-default card child-item child-item-flag">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1 text-left">
                        <div class="child-item-chekbox-portion">
                            <label class="form-checkbox">
                                <input @if($r->flag_status == 'doneflag') checked @endif class="form-check-input"  type="checkbox" @if($r->flag_status == 'doneflag') onclick="updateflagstatus({{$r->id}} , 'todoflag')" @else onclick="updateflagstatus({{$r->id}} , 'doneflag')" @endif value="{{$r->id}}"  id="flexCheckDefault">
                                <span class="checkbox-label"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="flag-tittle-new">{{ $r->flag_title }}</div>
                    </div>
                    <div class="col-md-2 text-right">
                        <img class="edit-item-image" type="button" onclick="showupdatecard({{$r->id}})" src="{{ url('public/assets/svg/edit-2.svg') }}">
                        <img class="delete-item-image" onclick="deleteflagshow({{$r->id}})" src="{{ url('public/assets/svg/trash.svg') }}">
                        <div class="deletechildstory hidepopupall" id="deleteattachmentshow{{ $r->id }}">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="text-left">Delete Flag</h4>
                                </div>
                                <div class="col-md-2">
                                    <img onclick="deleteflagshow({{$r->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                                </div>
                            </div>
                            <p class="text-left">Do you want to delete this Flag? You won’t be able to undo this action.</p>
                            <span onclick="deleteflag({{ $r->id }})" id="deletebutton{{ $r->id }}" class="btn btn-danger btn-block">Delete</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if($r->flag_status == 'todoflag')
                        <div class="flagstatusbadge todo-button-color">To Do</div>
                        @endif
                        @if($r->flag_status == 'inprogress')
                        <div class="flagstatusbadge inprogress-button-color">In Progress</div>
                        @endif
                        @if($r->flag_status == 'doneflag')
                        <div class="flagstatusbadge done-button-color">Done</div>
                        @endif
                        
                    </div>
                    @if(DB::table('flag_members')->where('flag_id' , $r->id)->first())
                    <div class="col-md-4">
                        <div class="d-flex flex-row align-items-center image-cont pr-3">
                            <div class="pr-1">
                                @php
                                    $member_id = DB::table('flag_members')->where('flag_id' , $r->id)->first();
                                    $user = DB::table('members')->where('id' , $member_id->member_id)->first();
                                @endphp
                                @if($user->image != NULL)
                                <img class="user-image" src="{{asset('public/assets/images/'.$user->image)}}" alt="Example Image">
                                @else
                                <img class="user-image" src="{{ Avatar::create($user->name.' '.$user->last_name)->toBase64() }}" alt="Example Image">
                                @endif
                            </div>
                            <div>
                                {{ $user->name }} {{ $user->last_name }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="flag-type-new @if($r->flag_type == 'Risk') risk-color @endif @if($r->flag_type == 'Impediment') impediment-color @endif">
                            {{ $r->flag_type }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="uploadattachment{{ $r->id }} displaynone">
            <div class="card comment-card storyaddcard">
                <div class="card-body">
                    <form class="needs-validation updateflag{{ $r->id }}" action="{{ url('dashboard/epics/flagupdate') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $r->id }}" name="flag_id">
                        <div class="row">        
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <label for="small-description">Flag Type <small class="text-danger">*</small></label>
                                   <select class="form-control" name="flag_type" >
                                       <option value="">Select Flag Type</option>
                                       <option @if($r->flag_type == 'Risk') selected @endif value="Risk">Risk</option>
                                       <option @if($r->flag_type == 'Impediment') selected @endif value="Impediment">Impediment</option>
                                       <option @if($r->flag_type == 'Blocker') selected @endif value="Blocker">Blocker</option>
                                       <option @if($r->flag_type == 'Action') selected @endif value="Action">Action</option>
                                   </select>
                                    
                                </div>
                            </div>
                             <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <label for="lead-manager">Assignee <small class="text-danger">*</small></label>
                                    <select class="form-control" name="flag_assign">
                                        @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $m)
                                          <option @if(DB::table('flag_members')->where('flag_id' , $r->id)->first())  @if(DB::table('flag_members')->where('flag_id' , $r->id)->first()->member_id == $m->id) selected @endif  @endif value="{{ $m->id }}">{{ $m->name }} {{ $m->last_name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                             <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <label for="small-description">Title <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" value="{{ $r->flag_title }}" name="flag_title" >
                                    
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <label for="small-description">Description <small class="text-danger">*</small></label>
                                    <textarea name="flag_description" class="form-control">{{ $r->flag_description }}</textarea>
                                    
                                </div>
                            </div>
                            <input type="hidden" value="{{ $r->flag_status }}" id="storystatus{{ $r->id }}" name="story_status">
                            <div class="row ml-2">
                                <div class="col-md-6">
                                    <div class="dropdown firstdropdownofcomments">
                                      <span class="dropdown-toggle" type="button" id="dropdown{{ $r->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status {{ $r->flag_status }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                                          <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                                        </svg> 
                                      </span>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" onclick="selectstorystatus('todoflag' , {{ $r->id }})" href="javascript:void(0)">To Do</a>
                                        <a class="dropdown-item" onclick="selectstorystatus('inprogress' , {{ $r->id }})" href="javascript:void(0)">In Progress</a>
                                        <a class="dropdown-item" onclick="selectstorystatus('doneflag' ,{{ $r->id }})" href="javascript:void(0)">Done</a>
                                      </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-md-6 text-right">
                                <span onclick="showupdatecard({{ $r->id }})" class="btn btn-default btn-sm">Cancel</span>
                                <button type="submit" class="updateflagmodalbuton{{ $r->id }} btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('.updateflag{{ $r->id }}').on('submit',(function(e) {
                $('.updateflagmodalbuton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
                e.preventDefault();
                var formData = new FormData(this);
                var cardid = $('#cardid').val();
                $.ajax({
                    type:'POST',
                    url: $(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        showtabwithoutloader('{{$data->id}}' , 'flags');
                    }
                });
            }));
        </script>
        @endforeach
        @else
            <div class="nodatafound">
                <h4>No Flags</h4>    
            </div>
        @endif
    </div>

</div>
</div>
<script src="https://unpkg.com/dragula@3.7.2/dist/dragula.js"></script>
<script src="https://unpkg.com/dom-autoscroller@2.2.3/dist/dom-autoscroller.js"></script>
<script type="text/javascript">
$('.saveepicflag').on('submit',(function(e) {
    $('.saveepicflagbutton').html('<i class="fa fa-spin fa-spinner"></i>');
    e.preventDefault();
    var formData = new FormData(this);
    var cardid = $('#cardid').val();
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            showtabwithoutloader('{{$data->id}}' , 'flags');
        }
    });
}));


function deleteflagshow(id) {
$('#deleteattachmentshow'+id).slideToggle();
}
function uploadattachment() {
    $('.uploadattachment').slideToggle();
    $('.nodatafound').slideToggle();
}
function showupdatecard(id) {
  $('.uploadattachment'+id).slideToggle();
}
function updateflagstatus(id,status) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epicbacklog/updateflagstatus') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id:id,
            status:status,
        },
        success: function(data) {
            showtabwithoutloader('{{$data->id}}' , 'flags');
        },
        error: function(error) {
          console.log('Error updating card position:', error);
        }
    });
}
function deleteflag(id) {
    $('#deletebutton'+id).html('<i class="fa fa-spin fa-spinner"></i>');
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/deleteflag') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            delete_id:id
        },
        success: function(data) {
            showtabwithoutloader('{{$data->id}}' , 'flags');
        },
        error: function(error) {
          console.log('Error updating card position:', error);
        }
    });
}
</script>