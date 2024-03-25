

<div class="row uploadattachment">

    <div class="col-md-12">

        <div class="card comment-card storyaddcard">
            <div class="card-body">
                <div id="success-check-in"></div>
                <form class="needs-validation savekpichartnewform" action="{{ url('add-kpi-check') }}"
                    method="POST">
                    @csrf

                    <input type="hidden" name="status" id="status">
                    <input type="hidden" name="kpi_id" value="{{ $data->id }}">
                    <input type="hidden" id="stream_id" value="{{ $data->stream_id }}">
                    <input type="hidden" id="kpi_id" value="{{ $data->id }}">
                    <input type="hidden" id="type" value="{{ $data->type }}">
                    <input type="hidden" id="savenewvalue" name="savenewvalue" value="">

                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">

                                <label for="small-description">Value</label>
                                <div class="input-group mb-0">

                                    <input type="text" name="value"
                                        class="form-control" id="inputField"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{$data->symbol}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                      


                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <label for="small-description">Date</label>
                                <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-6" id="newvalue">
                        </div>   


                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0" style="margin-bottom:-30px !important ">
                                <label for="flag_assignee">Participants <small
                                        class="text-danger">*</small></label>
                            </div>
                            <select required id="js-select1" multiple="multiple" name="participant[]">

                                @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                    <option value="{{ $r->id }}">{{ $r->name }}
                                        {{ $r->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <label for="small-description"
                                style="font-size:12px;color:#A7A7A7 !important">Status</label>

                            <div class="form-group mb-0">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label
                                        class="btn btn-light mr-2">
                                        <input type="radio" name="status" required
                                        
                                            value="On Track" id="option1"
                                            autocomplete="off"> On Track 
                                    </label>
                                    <label
                                         class="btn btn-light mr-2">
                                        <input type="radio" name="status" required id="option2"
            
                                            value="At Risk" autocomplete="off"> At Risk
                                    </label>
                                    <label
                                          class="btn btn-light mr-2">
                                        <input type="radio" name="status"
                
                                            id="option3" value="Off Track"
                                            autocomplete="off"> Off Track
                                    </label>
                                </div>

                                {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" onclick="getstatus('On Track');"
                                        class="btn btn-light mr-2">On Track</button>
                                    <button type="button" onclick="getstatus('At Risk');"
                                        class="btn btn-light mr-2">At Risk</button>
                                    <button type="button" onclick="getstatus('Off Track');"
                                        class="btn btn-light">Off Track</button>
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <label for="small-description">Summary</label>
                                <textarea name="summary" class="form-control"></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit"
                                class="saveepicflagbuttonasdsadsad btn btn-primary btn-sm">Check-In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@php

      $lastvalue = DB::table('kpi_check_in')
        ->orderby('id', 'desc')
        ->where('kpi_id', $data->id)
        ->first();

   $progress = 0;
   $maxlinebar = 0;
   $maxlinebar = $data->target_value;
    $alldata = DB::table('kpi_check_in')
        ->whereNotNull('value')
        ->orderby('check_date', 'ASC')
        ->where('kpi_id', $data->id)
        ->get();

    $months = [];
    $value = [];
    $color = [];
    foreach ($alldata as $month) {
        $months[] = \Carbon\Carbon::parse($month->check_date)->format('M d');
        $value[] = $month->value;
        if ($month->status == 'On Track') {
            $color[] = '#539884';
        } elseif ($month->status == 'At Risk') {
            $color[] = '#f7cd55';
        } else {
            $color[] = '#f35a47';
        }

        
    }

    if($type == 'order')
    {

      if($orderby == 'At Risk')
      {
        $keyqvalue = DB::table('kpi_check_in')->where('kpi_id',$data->id)->orderByRaw(DB::raw("FIELD(status, 'At Risk', 'On Track', 'Off Track')"))->get();   
      }
      if($orderby == 'Off Track')
      {
        $keyqvalue = DB::table('kpi_check_in')->where('kpi_id',$data->id)->orderByRaw(DB::raw("FIELD(status, 'Off Track', 'On Track', 'At Risk')"))->get();   
      }
      if($orderby == 'On Track')
      {
        $keyqvalue = DB::table('kpi_check_in')->where('kpi_id',$data->id)->orderByRaw(DB::raw("FIELD(status, 'On Track', 'Off Track', 'At Risk')"))->get();   
      }
    }   
  

      if($type == 'search')
      {
        $keyqvalue = DB::table('kpi_check_in')
        ->where('kpi_id', $data->id)
        ->where('value', 'like', "%$orderby%")
        ->get();
      }

      

@endphp

@if(count($keyqvalue) > 0)

@foreach ($keyqvalue as $val)
    @php
        $dataArray = explode(',', $val->participant);
        $dataCount = count($dataArray);
        $firstTwoIds = array_slice($dataArray, 0, 2);
        $remainingIds = array_slice($dataArray, 2);
        $remainingCount = count($remainingIds);

        $commentscount = DB::table('flag_comments')
            ->where('flag_id', $val->id)
            ->where('type', 'comment')
            ->where('comment_type', 'key')
            ->count();

        
            $max = max($value);
            $progress = ($max / $data->target_value * 100);

    @endphp

    <div class="card check-in-card mt-3" >
        <div class="card-body">
            <div class="d-flex flex-row align-items-center justify-content-between check-in-header">
                <div class="d-flex flex-row align-items-center">
                    <div class="lable">
                        <small> <span></span>{{ $val->status }} </small>
                    </div>
                    <div class="d-flex flex-row align-items-center value ml-3">
                        <div><small>Value: </small></div>
                        <h4 class="mt-2 ml-1">{{$data->symbol}} {{ Quarters::abbreviate($val->value) }}</h4>
                    </div>
                </div>
                <div>
                    <div class="symbol-group symbol-hover">

                        @foreach ($firstTwoIds as $member)
                            @foreach (DB::table('members')->get() as $r)
                                @if ($r->id == $member)
                                    @php
                                        $name = $r->name . ' ' . $r->last_name;
                                    @endphp

                                    <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip"
                                        title="" data-original-title="{{ $name }}">
                                        @if ($r->image != null)
                                            <img src="{{ asset('public/assets/images/' . $r->image) }}"
                                                alt="Example Image">
                                        @else
                                            <img src="{{ Avatar::create($name)->toBase64() }}"
                                                alt="Example Image">
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        @if ($dataCount > 3)
                            <div style="width:42px; height:42px; padding: 10px; font-size: 12px;"
                                class="symbol symbol-30  symbol-circle symbol-light"
                                data-toggle="tooltip" title=""
                                data-original-title="More users">
                                <span class="symbol-label">{{ $remainingCount }}+</span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="check-in-content">
                <p>{{ $val->summary }}</p>
            </div>
            <div class="d-flex flex-row justify-content-between mt-1">
                <div class="d-flex flex-row">
                    <button class="btn btn-default btn-sm"
                        onclick="showcomment({{ $val->id }})">Comments
                        ({{ $commentscount }})</button>
                </div>
                <div>
                    <div class="dropdown d-flex">

                        <span
                            class="mt-1">{{ \Carbon\Carbon::parse($val->created_at)->format('d M Y') }}</span>
                        <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{asset('/public/assets/svg/dropdowndots.svg')}}">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" data-toggle="modal"
                                onclick="showupdatecard({{ $val->id }})"
                                data-target="#edit22">Edit</a>
                            <a class="dropdown-item" data-toggle="modal"
                                onclick="deletekpivalue({{ $val->id }},'{{ $data->id }}')"
                                data-target="#delete22">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <input type="hidden" id="lastvalue" value="{{$lastvalue->value}}">

    <div class="uploadattachment{{ $val->id }} displaynone">
        <div class="card comment-card storyaddcard">
            <div class="card-body">
                <form class="needs-validation updatekpichart{{ $val->id }}"
                    action="{{ url('update-new-kpi-value') }}" method="POST" novalidate>
                    @csrf
                
                    <input type="hidden" value="{{ $val->id }}" name="id">
                    <input type="hidden" value="{{ $data->id }}" name="kpi_id">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <label for="small-description">Value</label>
                                <input type="text" name="value" value="{{ $val->value }}"
                                    onkeypress="return onlyNumberKey(event)" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group mb-0">
                                <label for="small-description">Date</label>
                                <input type="date" value="{{ $val->check_date }}" name="date"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0" style="margin-bottom:-30px !important ">
                                <label for="flag_assignee">Participants <small
                                        class="text-danger">*</small></label>
                            </div>
                            <select required id="js-select2{{ $val->id }}" multiple="multiple"
                                name="participant[]">
                                <option value="">Select Assignee</option>
                                @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                    <option
                                        @foreach ($dataArray as $member) @if ($r->id == $member) selected  @endif @endforeach
                                        value="{{ $r->id }}">{{ $r->name }}
                                        {{ $r->last_name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <label for="small-description"
                                style="font-size:12px;color:#A7A7A7 !important">Status</label>

                            <div class="form-group mb-0">

                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label
                                        @if ($val->status == 'On Track') class="btn btn-light active mr-2" @else  class="btn btn-light mr-2" @endif>
                                        <input type="radio" name="status"
                                            @if ($val->status == 'On Track') checked @endif
                                            value="On Track" id="option1"
                                            autocomplete="off"> On Track
                                    </label>
                                    <label
                                        @if ($val->status == 'At Risk') class="btn btn-light active mr-2" @else  class="btn btn-light mr-2" @endif>
                                        <input type="radio" name="status" id="option2"
                                            @if ($val->status == 'At Risk') checked @endif
                                            value="At Risk" autocomplete="off"> At Risk
                                    </label>
                                    <label
                                        @if ($val->status == 'Off Track') class="btn btn-light active mr-2" @else  class="btn btn-light mr-2" @endif>
                                        <input type="radio" name="status"
                                            @if ($val->status == 'Off Track') checked @endif
                                            id="option3" value="Off Track"
                                            autocomplete="off"> Off Track
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-0">
                                <label for="small-description">Summary</label>
                                <textarea name="summary" class="form-control">{{ $val->summary }}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <span onclick="showupdatecard({{ $val->id }})"
                                class="btn btn-default btn-sm">Cancel</span>
                            <button type="submit"
                                class="btn btn-primary btn-sm updateflagmodalbuton{{ $r->id }}">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.updatekpichart{{ $val->id }}').on('submit', (function(e) {
            $('.updateflagmodalbuton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#kpi-modal-content').html(data);
                }
            });
        }));
    </script>

<div class="mr-auto p-2 displaynone show-comment{{ $val->id }}">comments

    <div class="p-2 btn btn-default btn-sm ml-40" onclick="writecomment({{ $val->id }})">Add Comments</div>

</div>




<div class="col-md-12 col-lg-12 col-xl-12 displaynone writecomment{{ $val->id }}">
    <div class="d-flex flex-column">
        <form method="POST" id="savecommentkpi{{ $val->id }}"
            action="{{ url('kpi-savecomment') }}">
            @csrf
            <input type="hidden" value="{{ $val->id }}" name="flag_id">
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="form-group mb-8">
                <label for="objective-name">Write Comment</label>
                <textarea id="textarea" style="height:100% !important;" class="form-control mention" name="comment"
                    rows="5"></textarea>
            </div>
            <span onclick="writecomment()" class="btn btn-default btn-sm">Cancel</span>
            <button type="submit" id="savecommentbutton{{ $val->id }}"
                class="btn btn-primary btn-sm">Save</button>
        </form>
    </div>
</div>

<script>
$('#savecommentkpi{{ $val->id }}').on('submit', (function(e) {
$('#savecommentbutton{{ $val->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
e.preventDefault();
var formData = new FormData(this);

$.ajax({
type: 'POST',
url: $(this).attr('action'),
data: formData,
cache: false,
contentType: false,
processData: false,
success: function(data) {
    $('#kpi-modal-content').html(data);
    $('.show-comment{{ $val->id }}').slideToggle();

}
});
}));
</script>

@php
$comments = DB::table('flag_comments')
->where('flag_id', $val->id)
->where('type', 'comment')
->where('comment_type', 'kpi')
->get();
@endphp
@foreach ($comments as $r)
@php
$user = DB::table('users')
->where('id', $r->user_id)
->first();
@endphp
<div class="card comment-card-new displaynone show-comment{{ $r->flag_id }}"
id="commentdeletekey{{ $r->id }}">
<div class="deletecomment" id="commentdelete{{ $r->id }}">
<div class="row">
<div class="col-md-10">
<h4>Delete Comment</h4>
</div>
<div class="col-md-2">
<img onclick="deletecommentshow({{ $r->id }})"
    src="{{ url('public/assets/svg/crossdelete.svg') }}">
</div>
</div>
<p>Do you want to delete your comment ? You won’t be able to undo this action.</p>
<button onclick="deletecomment({{ $r->id }},'{{ $data->id }}','{{$r->flag_id}}')"
class="btn btn-danger btn-block">Delete</button>
</div>
<div class="commentedit" id="commentedit{{ $r->id }}">
<form method="POST" id="updatecommentkpi{{ $r->id }}" action="{{ url('updatecomment-kpi') }}">
@csrf
<input type="hidden" value="{{ $r->id }}" name="comment_id">
<input type="hidden" value="{{ $data->id }}" name="id">
<div class="row mt-3">
<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="d-flex flex-column">
        <div>
            <div class="form-group mb-0">
                <textarea required class="form-control" name="comment">{{ $r->comment }}</textarea>
            </div>
        </div>
        <div>
            <span onclick="editcommenthide({{ $r->id }})"
                class="btn btn-default btn-sm">Cancel</span>
            <button type="submit" id="updatecommentbutton{{ $r->id }}"
                class="btn btn-primary btn-sm">Update</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
<div class="card-body ">
<div class="d-flex flex-column">
<div class="d-flex justify-content-between align-items-center mb-2">
<div class="d-flex flex-row align-items-center">
    <div class="d-flex">
        <div class="mr-2">
            @if ($user->image != null)
                <img height="40" width="40" style="border-radius: 50%;"
                    src="{{ asset('public/assets/images/' . $user->image) }}"
                    alt="{{ $user->name }} {{ $user->last_name }}">
            @else
                <img height="40" width="40"
                    src="{{ Avatar::create($user->name . ' ' . $user->last_name)->toBase64() }}"
                    alt="Example Image">
            @endif
        </div>
        <div>
            <h5>{{ $user->name }} {{ $user->last_name }}</h5>
            <small>{{ Cmf::date_format($r->created_at) }}</small>
            @if ($r->created_at != $r->updated_at)
                <small>Updated</small>
            @endif
        </div>
    </div>
</div>
<div class="d-flex flex-row align-items-center">
    <div class="pr-2">
        <span onclick="editcommentshow({{ $r->id }})" class="commenticon">
            <img src="{{ url('public/assets/svg/editcommentsvg.svg') }}">
        </span>
    </div>
    <div>
        <span onclick="deletecommentshow({{ $r->id }})" class="commenticon">
            <img src="{{ url('public/assets/svg/deletecomment.svg') }}">
        </span>
    </div>
</div>
</div>
@php
$str = strlen($r->comment);
@endphp
<div>
<p class="load-more" id="load-more{{ $r->id }}">
    {{ \Illuminate\Support\Str::limit($r->comment, 220, $end = '') }}
    @if ($str > 220)
        <a href="javascript:void(0);" onclick="loadmore({{ $r->id }});"
            id="toggle-button{{ $r->id }}" class=""
            style="font-size:10px;">More</a>
    @endif
</p>

<p id="more-content{{ $r->id }}" style="line-height:15px;display:none">
    {{ $r->comment }}
    <a href="javascript:void(0);" onclick="seeless({{ $r->id }});"
        id="toggle-button-less{{ $r->id }}" class=""
        style="font-size:10px;">Less</a>
</p>
</div>
<div>
<button onclick="replycomment({{ $r->id }})"
    class="btn btn-default btn-sm">Reply</button>
</div>

<div class="replycard{{ $r->id }}" style="display: none;">
<form id="savereplykpi{{ $r->id }}" method="POST"
    action="{{ url('savereply-kpi') }}">
    @csrf
    <input type="hidden" value="{{ $r->flag_id }}" name="flag_id">
    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    <input type="hidden" value="{{ $r->id }}" name="comment_id">
    <input type="hidden" value="{{ $data->id }}" name="id">
    <div class="d-flex flex-column mt-3 d-none">
        <div>
            <div class="form-group mb-0">
                <label for="objective-name">Write Reply</label>
                <textarea required class="form-control" name="comment"></textarea>
            </div>
        </div>
        <div>
            <span onclick="replycomment({{ $r->id }})"
                class="btn btn-default btn-sm">Cancel</span>
            <button type="submit" id="savereplybutton{{ $r->id }}"
                class="btn btn-primary btn-sm">Save</button>
        </div>
    </div>
</form>
</div>
<script type="text/javascript">
$('#savereplykpi{{ $r->id }}').on('submit', (function(e) {
    $('#savereplybutton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#savereplybutton{{ $r->id }}').html('Save');
            $('#kpi-modal-content').html(data);
            $('.show-comment{{ $val->id }}').slideToggle();
        }
    });
}));
</script>
</div>
</div>
</div>

@foreach (DB::table('flag_comments')->where('type', 'reply')->where('comment_id', $r->id)->orderby('id', 'desc')->get() as $p)
@php
$puser = DB::table('users')
->where('id', $p->user_id)
->first();
@endphp
<div class="card comment-card-new reply-card">
<div class="deletecomment" id="commentdelete{{ $p->id }}">
<div class="row">
<div class="col-md-10">
    <h4>Delete Comment</h4>
</div>
<div class="col-md-2">
    <img onclick="deletecomment
        show({{ $p->id }})"
        src="{{ url('public/assets/svg/crossdelete.svg') }}">
</div>
</div>
<p>Do you want to delete your comment ? You won’t be able to undo this action.</p>
<button onclick="deletecomment({{ $p->id }})"
class="btn btn-danger btn-block">Delete</button>
</div>
<div class="commentedit" id="commentedit{{ $p->id }}">
<form method="POST" id="updatecommentkpi{{ $p->id }}"
action="{{ url('updatecomment-kpi') }}">
@csrf
<input type="hidden" value="{{ $p->id }}" name="comment_id">
<input type="hidden" value="{{ $data->id }}" name="id">
<div class="row mt-3">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-column">
            <div>
                <div class="form-group mb-0">
                    <textarea required class="form-control" name="comment">{{ $p->comment }}</textarea>
                </div>
            </div>
            <div>
                <span onclick="editcommenthide({{ $p->id }})"
                    class="btn btn-default btn-sm">Cancel</span>
                <button type="submit" id="updatecommentbutton{{ $p->id }}"
                    class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>
</div>
</form>
</div>
<div class="card-body displaynone show-comment{{ $r->flag_id }}">
<div class="d-flex flex-column">
<div class="d-flex justify-content-between align-items-center mb-2">
    <div class="d-flex flex-row align-items-center">
        <div class="d-flex">
            <div class="mr-2">
                @if ($puser->image != null)
                    <img height="40" width="40" style="border-radius: 50%;"
                        src="{{ asset('public/assets/images/' . $puser->image) }}"
                        alt="{{ $puser->name }} {{ $puser->last_name }}">
                @else
                    <img height="40" width="40"
                        src="{{ Avatar::create($puser->name . ' ' . $puser->last_name)->toBase64() }}"
                        alt="Example Image">
                @endif
            </div>
            <div>
                <h5>{{ $user->name }} {{ $user->last_name }}</h5>
                <small>{{ Cmf::date_format($p->created_at) }}</small>
                @if ($p->created_at != $p->updated_at)
                    <small>Updated</small>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex flex-row align-items-center">
        <div class="pr-2">
            <span onclick="editcommentshow({{ $p->id }})" class="commenticon">
                <img src="{{ url('public/assets/svg/editcommentsvg.svg') }}">
            </span>
        </div>
        <div>
            <span onclick="deletecommentshow({{ $p->id }})" class="commenticon">
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
$('#updatecommentkpi{{ $p->id }}').on('submit', (function(e) {
$('#updatecommentbutton{{ $p->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type: 'POST',
url: $(this).attr('action'),
data: formData,
cache: false,
contentType: false,
processData: false,
success: function(data) {
    $('#updatecommentbutton{{ $p->id }}').html('Save');
    $('#kpi-modal-content').html(data);
    $('.show-comment{{ $val->id }}').slideToggle();

}
});
}));
</script>
@endforeach

<script type="text/javascript">
$('#updatecommentkpi{{ $r->id }}').on('submit', (function(e) {
$('#updatecommentbutton{{ $r->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type: 'POST',
url: $(this).attr('action'),
data: formData,
cache: false,
contentType: false,
processData: false,
success: function(data) {
$('#updatecommentbutton{{ $r->id }}').html('Save');
$('#kpi-modal-content').html(data);
$('.show-comment{{ $val->id }}').slideToggle();

}
});
}));
</script>
@endforeach
@endforeach

@endif

<script>

$('.savekpichartnewform').on('submit', (function(e) {
        $('.saveepicflagbuttonasdsadsad').html('<i class="fa fa-spin fa-spinner"></i>');
        e.preventDefault();
        var formData = new FormData(this);
        var type = $('#type').val();
        var stream_id = $('#stream_id').val();
        var kpi_id = $('#kpi_id').val();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                $('#success-check-in').html(
                    '<div class="alert alert-success" role="alert"> Check-in Value Added Successfully</div>'
                );

                setTimeout(function() {
                    $('#kpi-modal-content').html(data);
                }, 2000);

                kpirender(kpi_id,type,stream_id);

            }
        });
    }));

      $("#js-select1").select2({
        closeOnSelect: false,
        placeholder: "Select Assignee",
        // allowHtml: true,
        allowClear: true,
        tags: false // создает новые опции на лету

    });
</script>