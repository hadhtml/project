<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 @if($attachments->count() > 4) paddingrightzero @endif">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">attachment</span>
                </div>
                <div>
                    <h4>Attachments</h4>
                </div>
            </div>
            <div class="displayflex">
                <div class="dropdown firstdropdownofcomments">
                  <span class="dropdown-toggle orderbybutton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset($extension))
                       Filter By {{ $extension }}
                    @else
                        Filter By
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
                      <path d="M10.8339 0.644857C10.6453 0.456252 10.3502 0.439106 10.1422 0.593419L10.0826 0.644857L5.49992 5.2273L0.917236 0.644857C0.72863 0.456252 0.433494 0.439106 0.225519 0.593419L0.165935 0.644857C-0.0226701 0.833463 -0.0398163 1.1286 0.114497 1.33657L0.165935 1.39616L5.12427 6.35449C5.31287 6.5431 5.60801 6.56024 5.81599 6.40593L5.87557 6.35449L10.8339 1.39616C11.0414 1.18869 11.0414 0.852323 10.8339 0.644857Z" fill="#787878"/>
                    </svg> 
                  </span>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" onclick="filterbyextension({{ $data->id }},'All')" href="javascript:void(0)">All</a>
                    @foreach($extensions as $r)
                    <a class="dropdown-item" onclick="filterbyextension({{ $data->id }},'{{ $r->extension }}')" href="javascript:void(0)">{{ $r->extension }}</a>
                    @endforeach
                  </div>
                </div>
                <span onclick="uploadattachment()" class="btn btn-default btn-sm">Upload</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="activity-feed @if($attachments->count() == 0) col-md-12 @endif">
        <div class="col-md-12 col-lg-12 col-xl-12 uploadattachment">
            <div class="d-flex flex-column">
                <form id="uploadattachementform" enctype="multipart/form-data" method="post" action="{{ url('dashboard/epicbacklog/uploadattachment') }}">
                  @csrf
                  <input type="hidden" value="{{ $data->id }}" name="value_id">
                    <label class="dropzonelabel">
                        Drop a file or click to select one
                        <input accept=".png, .jpg, .jpeg, .doc, .docx, .xls, .xlsx, .pdf" onchange="submitform()" class="dropzoneinput" type="file" multiple name="file">
                    </label>
                </form>
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
        @if($attachments->count() > 0)
        @foreach($attachments as $r)
        <div class="card attachment-card-new">
            <div class="deletecomment" id="deleteattachmentshow{{ $r->id }}">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Delete Attachment</h4>
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
                <div class="col-md-1">
                      <img src="{{ url('public/assets/svg') }}/{{ $imagename }}">                
                </div>
                <div class="col-md-8 filename">
                    {!! \Illuminate\Support\Str::limit($r->file_name,60, $end='') !!}<br>
                    <span class="datecolor">Added On {{ Cmf::date_format($r->created_at) }}</span>
                </div>
                <div class="col-md-3">
                    <div class="displayflexandmarginleft">
                        <div class="pr-2">
                            <a href="{{ url('public/uploads') }}/{{ $r->attachment }}" download="" class="commenticon">
                                <img src="{{ url('public/assets/svg/downloadsvg.svg') }}">
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
                <h4>No Attachments</h4>    
            </div>
        @endif
    </div>

</div>
</div>
<script type="text/javascript">
  function filterbyextension(id,extention) {
      $.ajax({
          type: "POST",
          url: "{{ url('dashboard/flags/filterbyextension') }}",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
              id:id,
              extention:extention
          },
          success: function(data) {
              $('.secondportion').html(data);
          },
          error: function(error) {
              console.log('Error updating card position:', error);
          }
      });
  }
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
      url: "{{ url('dashboard/epicbacklog/deleteattachment') }}",
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