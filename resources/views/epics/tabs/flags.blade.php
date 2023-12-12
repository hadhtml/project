<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 @if($flags->count() > 4) paddingrightzero @endif">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div>
                <h4><img src="{{ url('public/assets/svg/btnflagsvg.svg') }}"> Flags</h4>
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
                    <a class="dropdown-item" onclick="showorderby('desc',{{ $data->id }},'attachments')" href="javascript:void(0)">Latest</a>
                    <a class="dropdown-item" onclick="showorderby('asc',{{ $data->id }},'attachments')" href="javascript:void(0)">Older</a>
                  </div>
                </div>
                <span onclick="uploadattachment()" class="btn btn-default btn-sm">Raise Flag</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="activity-feed @if($flags->count() == 0) col-md-12 @endif">
        <div class="col-md-12 col-lg-12 col-xl-12 uploadattachment">
            <div class="card comment-card storyaddcard">
                <div class="card-body">
                    <form class="needs-validation" action="#" method="POST" novalidate>
                        @csrf
                        <input type="hidden" value="{{ $data->id }}" id="flag_epic_id">
                        <input type="hidden" value="{{ $data->initiative_id }}" id="flag_ini_epic_id">
                        <input type="hidden" value="{{ $data->obj_id }}" id="flag_epic_obj">
                        <input type="hidden" value="{{ $data->key_id }}" id="flag_epic_key">
                        <input type="hidden" value="{{ $data->buisness_unit_id }}" id="buisness_unit_id">
                        <input type="hidden" value="{{ $data->epic_type }}" id="board_type">
                        <input type="hidden" value="{{ $data->epic_status }}" id="epic_status">
                        <div class="row">        
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <label for="small-description">Flag Type <small class="text-danger">*</small></label>
                                   <select class="form-control" id="flag_type" >
                                       <option value="">Select Flag Type</option>
                                       <option value="Risk">Risk</option>
                                       <option value="Impediment">Impediment</option>
                                       <option value="Blocker">Blocker</option>
                                       <option value="Action">Action</option>
                                   </select>
                                    
                                </div>
                            </div>
                             <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-0">
                                    <label for="lead-manager">Flag Assignee <small class="text-danger">*</small></label>
                                    <select class="form-control" id="flag_assign">
                                        @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                                          <option value="{{ $r->id }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                             <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <label for="small-description">Title <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control"  id="flag_title" >
                                    
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group mb-0">
                                    <label for="small-description">Description <small class="text-danger">*</small></label>
                                    <textarea id="flag_description" class="form-control"></textarea>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span onclick="uploadattachment()" class="btn btn-default btn-sm">Cancel</span>
                                <button id="updateflagmodalbuton" onclick="updateepicflag();" type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <div class="col-md-12 col-lg-12 col-xl-12" style="position: relative;">
        @if($flags->count() > 0)
        @foreach($flags as $r)
        <div class="card attachment-card-new">
            <div class="deletecomment" id="deleteattachmentshow{{ $r->id }}">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Delete Flag</h4>
                    </div>
                    <div class="col-md-2">
                        <img onclick="deleteattachmentshow({{$r->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                    </div>
                </div>
                <p>Do you want to delete this attachment ? You won’t be able to undo this action.</p>
                <button onclick="deleteattachment({{ $r->id }})" class="btn btn-danger btn-block">Delete</button>
            </div>
            <div class="card-body">
              @php
                  $imagename = $r->extension.'-attachment.svg';
              @endphp
              <div class="row">
                <div class="col-md-9 filename">
                    {{ $r->flag_title }}<br>
                    <span class="datecolor">Flag Added On {{ Cmf::date_format_new($r->created_at) }}</span>
                </div>
                <div class="col-md-3">
                    <div class="displayflexandmarginleft">
                        <div class="pr-2">
                            <a href="javscript:void(0)" class="commenticon">
                                <img src="{{ url('public/assets/svg/editcommentsvg.svg') }}">
                            </a>
                        </div>
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
                <h4>No Flags</h4>    
            </div>
        @endif
    </div>

</div>
</div>
<script type="text/javascript">
  function deleteattachmentshow(id) {
    $('#deleteattachmentshow'+id).slideToggle();
  }
  function uploadattachment() {
    $('.uploadattachment').slideToggle();
    $('.nodatafound').slideToggle();

  }
  function submitform() {
    $('#uploadattachementform').submit();
  }
function deleteattachment(id) {
  $.ajax({
      type: "POST",
      url: "{{ url('dashboard/epics/deleteattachment') }}",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id:id,
      },
      success: function(data) {
          $('.secondportion').html(data);
      },
      error: function(error) {
          console.log('Error updating card position:', error);
      }
  });
}
$('#uploadattachementform').on('submit',(function(e) {
    $('.secondportion').addClass('loaderdisplay');
    $('.secondportion').html('<i class="fa fa-spin fa-spinner"></i>');
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
            $('.secondportion').removeClass('loaderdisplay');
            $('.secondportion').html(data);
        }
    });
}));
</script>