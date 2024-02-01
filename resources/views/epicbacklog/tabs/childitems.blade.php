<script>
$(function() {
    $(".sortable").sortable({
        update: function(event, ui) { 
            getOrder()
        }
    });
});
function getOrder(){
    var order= $(".sortable .ui-state-default").map(function() {
        return this.id;        
    }).get();
    var epic_id = '{{ $epic->id }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epicbacklog/sortchilditem') }}",
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
@php
    // $epicstory = DB::table("epics_stroy")->where("epic_id", $epic->id)->where('epic_type' , 'backlog')->orderby('sort_order' , 'asc')->get();
    $epicprogress = DB::table("epics_stroy")->where('epic_type' , 'backlog')->where("epic_id", $epic->id)->sum("progress");
    $count = DB::table("epics_stroy")->where('epic_type' , 'backlog')->where("epic_id", $epic->id)->count();
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
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">toc</span>
                </div>
                <div>
                    <h4>Child Items</h4>
                </div>
            </div>
            <div class="displayflex">
                <div class="dropdown firstdropdownofcomments">
                  <span class="dropdown-toggle orderbybutton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset($orderby))
                        @if($orderby == 'To Do')
                            Order by Status To Do
                        @endif
                        @if($orderby == 'In progress')
                            Order by Status In Progress
                        @endif
                        @if($orderby == 'Done')
                            Order by Status Done
                        @endif
                    @else
                        Order By Status
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                      <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                    </svg> 
                  </span>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" onclick="orderbychilditem('To Do',{{ $epic->id }})" href="javascript:void(0)">To Do</a>
                    <a class="dropdown-item" onclick="orderbychilditem('In progress',{{ $epic->id }})" href="javascript:void(0)">In Progress</a>
                    <a class="dropdown-item" onclick="orderbychilditem('Done',{{ $epic->id }})" href="javascript:void(0)">Done</a>
                  </div>
                </div>
                <span onclick="additem()" class="btn btn-primary btn-sm">Add</span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4 uploadattachment">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <form class="childitemform" method="POST" action="{{ url('dashboard/epicbacklog/createchilditem') }}">
            @csrf
            <input type="hidden" value="{{ $epic->id }}" name="epic_id">
            <div class="card comment-card storyaddcard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label for="epic_story_name">Title</label>
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
                            <div class="form-group">
                                <label>Type</label>
                                <div class="fieldouter">
                                  <div class="inputfield">
                                    <div class="selectbox">
                                        <div id="selectedoptionsasdasdas" class="selected">
                                            <div class="d-flex sdasdasd">
                                                <span class="material-symbols-outlined">checklist</span> 
                                                <span class="ml-2">Select Type</span>
                                            </div>
                                        </div>
                                        <i class="selectarrow">&nbsp;</i>
                                        <div class="selectOptionsbox">
                                            <div class="customoption" onclick="selectoption('task')">
                                                <div class="d-flex">
                                                    <span class="material-symbols-outlined">task</span> 
                                                    <span class="ml-2">Task</span>
                                                </div>
                                            </div>
                                            <div class="customoption" onclick="selectoption('story')">
                                                <div class="d-flex">
                                                    <span class="material-symbols-outlined">auto_stories</span> 
                                                    <span class="ml-2">Story</span>
                                                </div>
                                            </div>
                                            <div class="customoption" onclick="selectoption('bug')">
                                                <div class="d-flex">
                                                    <span class="material-symbols-outlined">bug_report</span> 
                                                    <span class="ml-2">Bug</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <input type="hidden" value="Task" required class="story_type_asign_select" name="story_type">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label for="epic_story_name">Description</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="To Do" id="storystatusnew" name="story_status">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="dropdown firstdropdownofcomments">
                              <span class="dropdown-toggle" type="button" id="dropdownnew" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Status To Do
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                                  <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                                </svg> 
                              </span>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" onclick="selectstorystatus('To Do' , 'new')" href="javascript:void(0)">To Do</a>
                                <a class="dropdown-item" onclick="selectstorystatus('In progress' , 'new')" href="javascript:void(0)">In Progress</a>
                                <a class="dropdown-item" onclick="selectstorystatus('Done' , 'new')" href="javascript:void(0)">Done</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <span onclick="additem()" class="btn btn-default btn-sm">Cancel</span>
                            <button type="submit" class="btn btn-primary btn-sm createitembutton">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('.childitemform').on('submit',(function(e) {
        $('.createitembutton').html('<i class="fa fa-spin fa-spinner"></i>');
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
                showheaderbacklog('{{$epic->id}}');
            }
        });
    }));
</script>
<div class="row mt-5">
    <div class="activity-feed  col-md-12">
        <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
            @if($epicstory->count() > 0)
                @foreach($epicstory as $s)
                <div class="row ui-state-default" style="cursor: pointer;" id="{{ $s->id }}">
                    <div class="child-item">
                        <div class="child-item-chekbox-portion">
                            <label class="form-checkbox">
                                <input @if($s->story_status == 'Done') checked @endif class="form-check-input allchilditem" @if($s->story_status != 'Done') onclick="changeitemstatus('Done',{{$s->id}})" @else onclick="changeitemstatus('To Do',{{$s->id}})" @endif name="checkbox[]" value="{{ $s->id }}" onclick="childcheckbox()" type="checkbox" id="flexCheckDefault">
                                <span class="checkbox-label"></span>
                            </label>
                            <div class="child-item-id">
                                @if($s->story_type == 'Bug')
                                <span class="material-symbols-outlined">bug_report</span><span style="position:absolute;margin-left: 5px;">{{ $s->StoryID }}</span> 
                                @endif
                                @if($s->story_type == 'Task')
                                <span class="material-symbols-outlined">task</span> <span style="position:absolute;margin-left: 5px;">{{ $s->StoryID }}</span> 
                                @endif
                                @if($s->story_type == 'Story')
                                <span class="material-symbols-outlined">auto_stories</span> <span style="position:absolute;margin-left: 5px;">{{ $s->StoryID }}</span> 
                                @endif
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
                                        <img data-toggle="tooltip" title="" data-original-title="{{$r->name}}" src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                        @else
                                        <img data-toggle="tooltip" title="" data-original-title="{{$r->name}}" src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="{{$r->name}} {{$r->last_name}}">
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
                                    <img src="{{url('public/assets/svg/arrow-down-white.svg')}}" width="20">
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
                            <img onclick="deletechilditemshow({{$s->id}})" class="delete-item-image" src="{{ url('public/assets/svg/trash.svg') }}">
                            <div class="deletechildstory hidepopupall" id="deleteattachmentshow{{ $s->id }}">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h4>Delete Child Item</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <img onclick="deletechilditemshow({{$s->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                                    </div>
                                </div>
                                <p>Do you want to delete this Child Item? You won’t be able to undo this action.</p>
                                <span onclick="deletechilditem({{ $s->id }})" id="deletebutton{{ $s->id }}" class="btn btn-danger btn-block">Delete</span>
                            </div>
                        </div>
                    </div>
                    <div class="card comment-card storyaddcard editstorycard editstory{{$s->id}}">
                        <div class="card-body">
                            <form class="updatechlditem{{ $s->id }}" method="POST" action="{{ url('dashboard/epicbacklog/updatechlditem') }}">
                                @csrf
                                <input type="hidden" value="{{ $s->id }}" name="id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label for="epic_story_name">Title</label>
                                            <input type="text" value="{{ $s->epic_story_name }}" name="epic_story_name" id="epic_story_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label for="small-description">Assignee (optional)</label>
                                            <select class="form-control" name="story_assign" id="story_assign">
                                                <option value="">Select Assignee</option>
                                                @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                                  <option @if($s->story_assign == $r->id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <div class="fieldouter">
                                              <div class="inputfield">
                                                <div class="selectbox">
                                                    <div id="selectedoptionsasdasdas" class="selected">
                                                        <div class="d-flex sdasdasd{{ $s->id }}">
                                                            @if($s->story_type == 'Bug')
                                                            <span class="material-symbols-outlined">bug_report</span>
                                                            @endif
                                                            @if($s->story_type == 'Task')
                                                            <span class="material-symbols-outlined">task</span>
                                                            @endif
                                                            @if($s->story_type == 'Story')
                                                            <span class="material-symbols-outlined">auto_stories</span>
                                                            @endif
                                                            <span class="ml-2">{{ $s->story_type }}</span>
                                                        </div>
                                                    </div>
                                                    <i class="selectarrow">&nbsp;</i>
                                                    <div class="selectOptionsbox">
                                                        <div class="customoption" onclick="selectoptionedit('task' , {{$s->id}})">
                                                            <div class="d-flex">
                                                                <span class="material-symbols-outlined">task</span> 
                                                                <span class="ml-2">Task</span>
                                                            </div>
                                                        </div>
                                                        <div class="customoption" onclick="selectoptionedit('story', {{$s->id}})">
                                                            <div class="d-flex">
                                                                <span class="material-symbols-outlined">auto_stories</span> 
                                                                <span class="ml-2">Story</span>
                                                            </div>
                                                        </div>
                                                        <div class="customoption" onclick="selectoptionedit('bug', {{$s->id}})">
                                                            <div class="d-flex">
                                                                <span class="material-symbols-outlined">bug_report</span> 
                                                                <span class="ml-2">Bug</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{ $s->story_type }}" required class="story_type_asign_select{{ $s->id }}" name="story_type">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label for="epic_story_name">Description</label>
                                            <input type="text" value="{{ $s->description }}" name="description" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $s->story_status }}" id="storystatus{{ $s->id }}" name="story_status">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="dropdown firstdropdownofcomments">
                                          <span class="dropdown-toggle" type="button" id="dropdown{{ $s->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Status {{ $s->story_status }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                                              <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                                            </svg> 
                                          </span>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" onclick="selectstorystatus('To Do' , {{ $s->id }})" href="javascript:void(0)">To Do</a>
                                            <a class="dropdown-item" onclick="selectstorystatus('In progress' , {{ $s->id }})" href="javascript:void(0)">In Progress</a>
                                            <a class="dropdown-item" onclick="selectstorystatus('Done' ,{{ $s->id }})" href="javascript:void(0)">Done</a>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span onclick="additem()" class="btn btn-default btn-sm">Cancel</span>
                                        <button type="submit" class="btn btn-primary btn-sm createitembutton{{ $s->id }}">Save</button>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                                $('.updatechlditem{{ $s->id }}').on('submit',(function(e) {
                                    $('.createitembutton{{ $s->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                                            showheaderbacklog('{{$epic->id}}');
                                        }
                                    });
                                }));
                            </script>
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
function orderbychilditem(order,epic_id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epicbacklog/orderbychilditembacklog') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            order: order,
            epic_id:epic_id,
        },
        success: function(res) {
            $('.secondportion').html(res);
        }
    });
}
function deletechilditemshow(id) {
    $('#deleteattachmentshow'+id).slideToggle();
}
function bulkeditcheckbox() {
    if ($('#bulkeditcheckbox').is(':checked')) {
        $('.allchilditem').prop("checked", true);
        $('.bulkedit').css('color' , 'black');
        $('.bulkedit').css('font-weight' , '600');
    }else{
        $('.allchilditem').prop("checked", false);
        $('.bulkedit').css('color' , '#b2b2b2');
        $('.bulkedit').css('font-weight' , '400');

    }
    var numberOfChecked = $('.allchilditem:checkbox:checked').length;
    var totalCheckboxes = $('.allchilditem:checkbox').length;
    var numberNotChecked = totalCheckboxes - numberOfChecked;
    $('.bulkedit').css('color' , 'black');
    $('.bulkedit').css('font-weight' , '600');
    if(numberOfChecked > 0)
    {
        $('.bulkedit').css('color' , 'black');
        $('.bulkedit').css('font-weight' , '600');
    }else{
        $('.deletealert').hide();
        $('.bulkedit').css('color' , '#b2b2b2');
        $('.bulkedit').css('font-weight' , '400');
    }
}
$('.sortable').on('submit',(function(e) {
    $('#submitBtn').html('<i class="fa fa-spin fa-spinner"></i>');
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
            showtabwithoutloader('{{$epic->id}}' , 'childitems');
        }
    });
}));
function deletechilditemsbulk() {
    var totalCheckboxes = $('.allchilditem:checkbox:checked').length;
    if(totalCheckboxes == 0)
    {
        
    }else
    {
        $('.deletealert').slideToggle();
    }
}
function childcheckbox() {
    var numberOfChecked = $('.allchilditem:checkbox:checked').length;
    var totalCheckboxes = $('.allchilditem:checkbox').length;
    var numberNotChecked = totalCheckboxes - numberOfChecked;
    $('.bulkedit').css('color' , 'black');
    $('.bulkedit').css('font-weight' , '600');
    if(numberOfChecked > 0)
    {
        $('.bulkedit').css('color' , 'black');
        $('.bulkedit').css('font-weight' , '600');
    }else{
        $('.deletealert').hide();
        $('.bulkedit').css('color' , '#b2b2b2');
        $('.bulkedit').css('font-weight' , '400');
    }

    if(numberNotChecked == 0)
    {
        $('#bulkeditcheckbox').prop("checked", true);
    }else{
        $('#bulkeditcheckbox').prop("checked", false);
    }
}
function deletechilditem(id) {
    $('#deletebutton'+id).html('<i class="fa fa-spin fa-spinner"></i>');
    var key = '{{ $epic->key_id }}';
    var obj = '{{ $epic->obj_id }}';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epicbacklog/deletechilditem') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            key: key,
            obj: obj
        },
        success: function(res) {
            showtabwithoutloader('{{$epic->id}}' , 'childitems');
            
        }
    });
}
function changeitemstatus(status , id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/epicbacklog/changeitemstatus') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            status: status

        },
        success: function(res) {
            showtabwithoutloader('{{$epic->id}}' , 'childitems');
            showheaderbacklog('{{$epic->id}}');
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
    $('.editstory'+id).slideToggle();
}
function deleteattachmentshow(id) {
    $('#deleteattachmentshow'+id).slideToggle();
}
function additem() {
    $('.uploadattachment').slideToggle();
    $('.nodatafound').slideToggle();
}

function selectoption(id) {
    if(id == 'task')
    {
        $('.sdasdasd').html('<span class="material-symbols-outlined">task</span><span class="ml-2">Task</span>');
        $('.story_type_asign_select').val('Task');
    }
    if(id == 'story')
    {
        $('.sdasdasd').html('<div class="d-flex"><span class="material-symbols-outlined">auto_stories</span><span class="ml-2">Story</span></div>');
        $('.story_type_asign_select').val('Story');
        
    }
    if(id == 'bug')
    {
        $('.sdasdasd').html('<div class="d-flex"><span class="material-symbols-outlined">bug_report</span><span class="ml-2">Bug</span></div>');
        $('.story_type_asign_select').val('Bug');
    }
    $('.selectOptionsbox').toggleClass('active');
}
function selectoptionedit(id , value) {
    if(id == 'task')
    {
        $('.sdasdasd'+value).html('<span class="material-symbols-outlined">task</span><span class="ml-2">Task</span>');
        $('.story_type_asign_select'+value).val('Task');
    }
    if(id == 'story')
    {
        $('.sdasdasd'+value).html('<div class="d-flex"><span class="material-symbols-outlined">auto_stories</span><span class="ml-2">Story</span></div>');
        $('.story_type_asign_select'+value).val('Story');
        
    }
    if(id == 'bug')
    {
        $('.sdasdasd'+value).html('<div class="d-flex"><span class="material-symbols-outlined">bug_report</span><span class="ml-2">Bug</span></div>');
        $('.story_type_asign_select'+value).val('Bug');
    }
    $('.selectOptionsbox').toggleClass('active');
}
$(document).ready( function(touch) {
  $('.selectbox .selected').click(function(){
    $('.selectOptionsbox').toggleClass('active');
  });
});
</script>