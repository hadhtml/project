<script src="{{ url('public/assets/bootstrap-typeahead.min.js') }}"></script>
<script src="{{ url('public/assets/mention.js') }}"></script>
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 @if($comments->count() > 1) paddingrightzero @endif">
        <div class="d-flex flex-row align-items-center justify-content-between block-header">
            <div class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span class="material-symbols-outlined">comment</span>
                </div>
                <div>
                    <h4>Comments</h4>
                </div>
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
                    <a class="dropdown-item" onclick="showorderby('desc',{{ $data->id }},'flag_comments')" href="javascript:void(0)">Latest</a>
                    <a class="dropdown-item" onclick="showorderby('asc',{{ $data->id }},'flag_comments')" href="javascript:void(0)">Older</a>
                  </div>
                </div>
                <span onclick="writecomment()" class="btn btn-default btn-sm">Add</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="activity-feed @if($comments->count() == 0) col-md-12 @endif">
        <div class="col-md-12 col-lg-12 col-xl-12 writecomment">
            <div class="d-flex flex-column">
                <form method="POST" id="savecomment{{ $data->id }}" action="{{ url('dashboard/flags/savecomment') }}">
                @csrf
                <input type="hidden" value="{{ $data->id }}" name="flag_id">
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <div class="form-group mb-8">
                        <label for="objective-name">Write Comment</label>
                        <textarea id="textarea" style="height:100% !important;" class="form-control mention" name="comment" rows="5"></textarea>
                    </div>
                    <span onclick="writecomment()" class="btn btn-default btn-sm">Cancel</span>
                    <button type="submit" id="savecommentbutton{{ $data->id }}" class="btn btn-primary btn-sm">Save</button>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $("#textarea").keypress(function (e) {
                if(e.which === 13 && !e.shiftKey) {
                    e.preventDefault();
                    $(this).closest("form").submit();
                }
            });
            $(document).ready(function(){
             $(".mention").mention({
                users: [
                    @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r)
                    {
                       username: '{{ $r->name }}',
                       image: '{{ Avatar::create($r->name.''.$r->last_name)->toBase64() }}'
                    }@if($loop->last) @else ,@endif 
                    @endforeach
                ]
             });
          });
        </script>
    <div class="col-md-12 col-lg-12 col-xl-12">
        @if($comments->count() > 0)
        @foreach($comments as $r)
        @php
            $user = DB::table('users')->where('id',$r->user_id)->first();
        @endphp
        <div class="card comment-card-new">
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
                <button onclick="deletecomment({{ $r->id }})" class="btn btn-danger btn-block">Delete</button>
            </div>
            <div class="commentedit" id="commentedit{{ $r->id }}">
                <form method="POST" id="updatecomment{{ $r->id }}" action="{{ url('dashboard/flags/updatecomment') }}">
                    @csrf
                    <input type="hidden" value="{{ $r->id }}" name="comment_id">
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
                            <div class="d-flex flex-column">
                                <div>
                                    
                                    <h5>
                                        @if($user->image != NULL)
                                    <img src="{{asset('public/assets/images/'.$user->image)}}" alt="Example Image">
                                    @else
                                    <img height="20" width="20" src="{{ Avatar::create($user->name.' '.$user->last_name)->toBase64() }}" alt="Example Image">
                                    @endif
                                        {{ $user->name }} {{ $user->last_name }}</h5>
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
                        <form id="savereply{{ $r->id }}" method="POST" action="{{ url('dashboard/flags/savereply') }}">
                            @csrf
                            <input type="hidden" value="{{ $r->flag_id }}" name="flag_id">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="hidden" value="{{ $r->id }}" name="comment_id">
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
                            <img onclick="deletecommentshow({{$p->id}})" src="{{ url('public/assets/svg/crossdelete.svg') }}">
                        </div>
                    </div>
                    <p>Do you want to delete your comment ? You won’t be able to undo this action.</p>
                    <button onclick="deletecomment({{ $p->id }})" class="btn btn-danger btn-block">Delete</button>
                </div>
                <div class="commentedit" id="commentedit{{ $p->id }}">
                    <form method="POST" id="updatecomment{{ $p->id }}" action="{{ url('dashboard/flags/updatecomment') }}">
                        @csrf
                        <input type="hidden" value="{{ $p->id }}" name="comment_id">
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
                                <div class="d-flex flex-column">
                                    <div>
                                        <h5>{{ $puser->name }} {{ $puser->last_name }}</h5>
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
        @else
            <div class="nodatafound">
                <h4>No Comments</h4>    
            </div>
        @endif
    </div>

</div>
</div>
<script type="text/javascript">
$('#savecomment{{ $data->id }}').on('submit',(function(e) {
    $('#savecommentbutton{{ $data->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
            $('#savecommentbutton{{ $data->id }}').html('Save');
            $("#savecomment{{ $data->id }}")[0].reset();
            $('#updateflag{{ $data->id }}').submit();
            $('.secondportion').html(data);

            viewboards($('#viewboards').val());
        }
    });
}));
function writecomment() {
    $('.writecomment').slideToggle();   
}
function replycomment(id) {
    $('.replycard'+id).slideToggle();
}
function editcommentshow(id) {
    $('#commentedit'+id).show();
}
function editcommenthide(id) {
    $('#commentedit'+id).hide();
}
function deletecommentshow(id) {
    $('#commentdelete'+id).slideToggle();
}
function deletecomment(id) {
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/flags/deletecomment') }}",
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

function loadmore(x) {

const toggleButton = document.getElementById("toggle-button" + x);
const moreContent = document.getElementById("more-content");
const LoadmoreContent = document.getElementById("load-more" + x);

toggleButton.addEventListener("click", function() {
    // moreContent.style.display = "block";
    // LoadmoreContent.style.display = "none";

    $('#more-content' + x).show();
    $('#load-more' + x).hide();

});
}

function seeless(x) {

const toggleButton = document.getElementById("toggle-button-less" + x);
const moreContent = document.getElementById("more-content");
const LoadmoreContent = document.getElementById("load-more" + x);

toggleButton.addEventListener("click", function() {
    // moreContent.style.display = "none";
    // LoadmoreContent.style.display = "block";

    $('#more-content' + x).hide();
    $('#load-more' + x).show();

});
}

</script>