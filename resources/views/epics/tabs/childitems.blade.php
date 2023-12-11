@php
    $epicstory = DB::table("epics_stroy")->where("epic_id", $epic->id)->get();
    $epicprogress = DB::table("epics_stroy")->where("epic_id", $epic->id)->sum("progress");
    $count = DB::table("epics_stroy")->where("epic_id", $epic->id)->count();
    if($count > 0)
    {
        $total = round($epicprogress / $count, 0);
    }else{
        $total = 0;
    }
@endphp
<div class="row mb-3">
    <div class="col-md-1">
        {{ $total }}%
    </div>
    <div class="col-md-11 mt-2">
        <div class="progress">
            <div class="progress-bar color-547AFF" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:{{ $total }}%">
              <span class="sr-only">{{ $total }}% Complete</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 @if($epicstory->count() > 4) paddingrightzero @endif">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div>
                <h4><img src="{{ url('public/assets/svg/childitemssvg.svg') }}"> Child Items</h4>
            </div>
            <div class="displayflex">
                <div class="dropdown firstdropdownofcomments">
                  <span class="dropdown-toggle orderbybutton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset($orderby))
                        @if($orderby == 'asc')
                            Order by Older
                        @endif
                        @if($orderby == 'desc')
                            Order by Latest
                        @endif
                    @else
                        Order By
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                      <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                    </svg> 
                  </span>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" onclick="showorderby('desc',{{ $epic->id }},'attachments')" href="javascript:void(0)">Latest</a>
                    <a class="dropdown-item" onclick="showorderby('asc',{{ $epic->id }},'attachments')" href="javascript:void(0)">Older</a>
                  </div>
                </div>
                <span onclick="additem()" class="btn btn-primary btn-sm">Add</span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4 uploadattachment">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <form id="createchilditem" method="POST" action="{{ url('dashboard/epics/createchilditem') }}">
            @csrf
            <input type="hidden" value="{{ $epic->id }}" name="epic_id">
            <div class="card comment-card storyaddcard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label for="epic_story_name">Item Title</label>
                                <input type="text" name="epic_story_name" id="epic_story_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label for="small-description">Assignee (optional)</label>
                                <select class="form-control" name="story_assign" id="story_assign">
                                    <option value="">Select Assignee</option>
                                    @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                      <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                               <label for="story_status">Status</label>
                               <select name="story_status" id="story_status" class="form-control">
                                <option value="">Select Type</option>
                                <option value="To Do">To Do</option>
                                <option value="In progress">In Progress</option>
                                 <option value="Done">Done</option>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="d-flex statusofstory">
                                <h4>Status</h4>
                                <div class="dropdown firstdropdownofcomments">
                                  <span class="dropdown-toggle orderbybutton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Done
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                                      <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                                    </svg>
                                  </span>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:void(0)">To Do</a>
                                    <a class="dropdown-item" href="javascript:void(0)">In Progress</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Done</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <span onclick="additem()" class="btn btn-default btn-sm">Cancel</span>
                            <button id="createchilditembutton" type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row mt-5">
    <div class="activity-feed  col-md-12">
        <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
            @if($epicstory->count() > 0)
                @foreach($epicstory as $s)
                <div class="row">
                    <div class="child-item">
                        <div class="child-item-chekbox-portion">
                            <label class="form-checkbox">
                                <input class="form-check-input"  type="checkbox" @if($s->progress > 0) checked onclick="updateprogress({{ $s->id }} , 1)" @else onclick="updateprogress({{ $s->id }} , 2)" @endif  value="{{$s->id}}"  id="flexCheckDefault">
                                <span class="checkbox-label"></span>
                            </label>
                            <div class="child-item-id">
                                <img src="{{ url('public/assets/svg/child-item-id.svg') }}"> {{ $s->StoryID }}
                            </div>
                        </div>
                        <div class="child-item-tittle">
                            {{ $s->epic_story_name }}
                        </div>
                        <div class="child-item-actions">
                            <div class="member-profile">
                                @foreach(DB::table('members')->get() as $r)
                                    @if($r->id == $s->story_assign)
                                        @if($r->image != NULL)
                                        <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                        @else
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&usqp=CAU" alt="Example Image">
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default status-change-button-item @if($s->story_status == 'To Do') todo-button-color @endif @if($s->story_status == 'In progress') inprogress-button-color @endif @if($s->story_status == 'Done') done-button-color @endif " id="showboardbutton">
                                    @if($s->story_status == 'To Do')
                                        To Do
                                    @endif
                                    @if($s->story_status == 'In progress')
                                        In Progress
                                    @endif
                                    @if($s->story_status == 'Done')
                                        Done
                                    @endif
                                </button>
                                <button type="button" class="@if($s->story_status == 'To Do') todo-button-color @endif @if($s->story_status == 'In progress') inprogress-button-color @endif @if($s->story_status == 'Done') done-button-color @endif status-change-button-item-arrow btn btn-danger dropdown-toggle dropdown-toggle-split archivebeardcimbgbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if($s->story_status == 'To Do') 
                                    <img src="{{url('public/assets/images/icons/angle-down.svg')}}" width="20">
                                    @endif 
                                    @if($s->story_status == 'In progress') 
                                    <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">
                                    @endif 
                                    @if($s->story_status == 'Done') 
                                    <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">
                                    @endif                                    
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    @if($s->story_status == 'To Do')
                                        <a class="dropdown-item" onclick="changeitemstatus('In progress',{{$s->id}})" href="javascript:void(0)">In Progress</a>
                                        <a class="dropdown-item" onclick="changeitemstatus('Done',{{$s->id}})" href="javascript:void(0)">Done</a>
                                    @endif
                                    @if($s->story_status == 'In progress')
                                        <a class="dropdown-item" onclick="changeitemstatus('To Do',{{$s->id}})" href="javascript:void(0)">To Do</a>
                                        <a class="dropdown-item" onclick="changeitemstatus('Done',{{$s->id}})" href="javascript:void(0)">Done</a>
                                    @endif
                                    @if($s->story_status == 'Done')
                                        <a class="dropdown-item" onclick="changeitemstatus('To Do',{{$s->id}})" href="javascript:void(0)">To Do</a>
                                        <a class="dropdown-item" onclick="changeitemstatus('In progress',{{$s->id}})" href="javascript:void(0)">In Progress</a>
                                    @endif
                                </div>
                            </div>
                            <img class="edit-item-image" type="button" onclick="editstorynew({{$s->id}})" src="{{ url('public/assets/svg/edit-2.svg') }}">
                            <img class="delete-item-image" src="{{ url('public/assets/svg/trash.svg') }}">
                        </div>
                    </div>
                    <div class="card comment-card storyaddcard editstorycard" id="editstory{{$s->id}}">
                        <div class="card-body"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label for="objective-name">Title</label>
                                        <input type="text" class="form-control" value="{{$s->epic_story_name}}" id="edit_story_title{{$s->id}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label for="small-description">Assignee</label>
                                        <select class="form-control" id="edit_story_assign{{$s->id}}">
                                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                              <option @if($r->id == $s->story_assign) selected @endif value="{{ $r->id }}">{{ $r->name }}</option>
                                            <?php }  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                       <label for="small-description">Status</label>
                                       <select class="form-control" id="edit_story_status{{$s->id}}">
                                        <option @if($s->story_status == 'To Do') selected @endif value="To Do">To Do</option>
                                        <option @if($s->story_status == 'In progress') selected @endif value="In progress">In Progress</option>
                                         <option @if($s->story_status == 'Done') selected @endif value="Done">Done</option>
                                       </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" onclick="editstorynew({{$s->id}})" class="btn btn-default btn-sm">Cancel</button>
                                <button type="button" onclick="updatestory({{$s->id}});" id="updateitembutton{{ $s->id }}" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="nodatafound">
                    <h4>No Child Items</h4>    
                </div>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
function updatestory(s_id) {
    $('#updateitembutton'+s_id).html('<i class="fa fa-spin fa-spinner"></i>');
    // var title = $('#title'+s_id).val();
    var title = $('#edit_story_title' + s_id).val();
    var story_status = $('#edit_story_status' + s_id).val();
    var story_assign = $('#edit_story_assign' + s_id).val();
    var key = $('#edit_epic_key').val();
    var obj = $('#edit_epic_obj').val();
    if (title != '') {
        $.ajax({
            type: "POST",
            url: "{{ url('update-story') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                s_id: s_id,
                title: title,
                story_status: story_status,
                story_assign: story_assign,
                key: key,
                obj: obj

            },
            success: function(res) {
                showtabwithoutloader('{{$epic->id}}' , 'childitems');
            }
        });
    }

}
function changeitemstatus(status , id) {
    var title = $('#edit_story_title' + id).val();
    var story_status = $('#edit_story_status' + id).val();
    var story_assign = $('#edit_story_assign' + id).val();
    $.ajax({
        type: "POST",
        url: "{{ url('update-story') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            s_id: id,
            title: title,
            story_status: status,
            story_assign: story_assign

        },
        success: function(res) {
            showtabwithoutloader('{{$epic->id}}' , 'childitems');
        }
    });
}
function updateprogress(id , type) {
    if(type == 1)
    {
        changeitemstatus('To Do' , id);
    }
    if(type == 2)
    {
        changeitemstatus('Done' , id);
    }
}
 function editstorynew(id) {
    $('#editstory'+id).slideToggle();
}
function deleteattachmentshow(id) {
    $('#deleteattachmentshow'+id).slideToggle();
}
function additem() {
    $('.uploadattachment').slideToggle();
    $('.nodatafound').slideToggle();
}
$('#createchilditem').on('submit',(function(e) {
    $('.createchilditembutton').html('<i class="fa fa-spin fa-spinner"></i>');
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
            $('.createchilditembutton').html('loaderdisplay');
            $('.secondportion').html(data);
        }
    });
}));
</script>