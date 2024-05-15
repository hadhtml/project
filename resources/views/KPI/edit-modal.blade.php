
<style>
    .select2-container {
        min-width: 400px;
    }

    .select2-results__option {
        padding-right: 20px;
        vertical-align: middle;
    }

    .select2-results__option:before {
        content: "";
        display: inline-block;
        position: relative;
        height: 30px;
        width: 30px;
        border: 2px solid #e9e9e9;
        border-radius: 4px;
        background-color: #fff;
        margin-right: 20px;
        vertical-align: middle;
    }

    .select2-results__option[aria-selected=true]:before {
        font-family: fontAwesome;
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
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

    }

    .select2-selection .select2-selection--multiple:after {
        content: 'hhghgh';
    }

    /* select with icons badges single*/
    .select-icon .select2-selection__placeholder .badge {
        display: block;
    }

    .select-icon .placeholder {
        display: none;
    }

    .select-icon .select2-results__option:before,
    .select-icon .select2-results__option[aria-selected=true]:before {
        display: none !important;
        /* content: "" !important; */
    }

    .select-icon .select2-search--dropdown {
        display: none;
    }

    .day-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #eee;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
        font-size: 13px;
        margin: 2px;
    }

    .day-circle.checked {
        background-color: #3498db;/ Blue color when checked / color: #fff;/ White text when checked /
    }
</style>
<div class="modal-header modalheaderforapend">
    @include('KPI.modalheader')
</div>


<div class="modal-body" id="showformforedit">
    <div class="row">
        <div class="col-md-12">
            <div class="border-top"></div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-7">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link home-tab" onclick="showtab('home');" type="button" data-bs-toggle="tab"
                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                        style="font-size: 12px" aria-selected="true">Check-in</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link ml-2 active profile-tab" onclick="showtab('profile');" type="button"
                        aria-controls="profile" style="font-size: 12px" aria-selected="false">Flags</button>
                </li>
            </ul>

            <div class="mt-2 tab-home" id="home" aria-labelledby="home-tab">
                <div class="displayflex">
                    <input id="myInput" type="text" style="width:40%;height:35px !important"
                        class="form-control  input-sm" onkeyup="getcheckin(this.value,'{{$data->id}}')" placeholder="Search..." name="">
                        <div class="dropdown ml-1">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            OrderBy <span id="selectedItem"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" onclick="orderbykpistatus('On Track',{{ $data->id }})">On Track</a>
                              <a class="dropdown-item" onclick="orderbykpistatus('Off Track',{{ $data->id }})">Off Track</a>
                              <a class="dropdown-item" onclick="orderbykpistatus('At Risk',{{ $data->id }})">At Risk</a>
                            </div>
                          </div>
                    <span onclick="uploadattachment()" class="btn btn-default btn-sm ml-2">New Check-In</span>
                </div>

                <div class="check-in-render">

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
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Value</label>
                                            <div class="position-relative d-flex align-items-center">
                                                <span style=" position: absolute; left: 15px; font-size: 20px; ">{{$data->symbol}}</span>
                                                <input type="text" name="value" class="form-control form-control-solid ps-12" id="inputField" required>
                                            </div>
                                        </div>                          
                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Date</span>
                                                </label>
                                                <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control form-control-solid" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" id="newvalue">
                                        </div>   


                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Participants</span>
                                                </label>
                                                <select class="form-control form-control-solid" required id="js-select1" multiple="multiple" name="participant[]">
                                                    @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                                        <option value="{{ $r->id }}">{{ $r->name }}
                                                            {{ $r->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Status</span>
                                                </label>
                                    
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
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Summary</span>
                                                </label>
                                                <textarea name="summary" class="form-control form-control-solid" rows="3"></textarea>
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

                    $keyqvalue = DB::table('kpi_check_in')
                        ->where('kpi_id', $data->id)
                        ->orderby('id', 'desc')
                        ->get();
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
@else
<p class="mt-5">No Check-in Found</p>
@endif

</div>

</div>

            <div class="mt-2 " style="display:none" id="profile" aria-labelledby="profile-tab">

                <div class="displayflex">
                    <input id="myInput" type="text" style="width:50%;height:35px !important"
                        class="form-control  input-sm" onkeyup="getflag(this.value,'{{$data->id}}')" placeholder="Search flags..." name="">

                    <span onclick="uploadattachmentflag()" class="btn btn-default btn-sm ml-2">New Flag</span>
                </div>

                <div class="flag-render">

                <div class="row uploadattachmentflag displaynone">

                    <div class="col-md-12">

                        <div class="card comment-card storyaddcard">
                            <div class="card-body">
                                <div id="success-check-in-flag"></div>
                                <form class="needs-validation savekpiflagnewform" action="{{ url('add-kpi-flag') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $data->id }}" name="flag_kpi_id">
                                    <input type="hidden" value="{{ $data->stream_id }}" name="buisness_unit_id">
                                    <input type="hidden" value="{{ $data->type }}" name="board_type">

                                    <div class="row">

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group mb-0">
                                                <label for="small-description">Title <small
                                                        class="text-danger">*</small></label>
                                                <input required type="text" class="form-control"
                                                    name="flag_title">

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-0">
                                                <label for="small-description">Flag Type <small
                                                        class="text-danger">*</small></label>
                                                <select class="form-control" name="flag_type">
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
                                                <label for="lead-manager">Assignee <small
                                                        class="text-danger">*</small></label>
                                                <select class="form-control" name="flag_assign">
                                                    <option value="">Select Assignee </option>
                                                    @foreach (DB::table('members')->where('org_user', Auth::id())->get() as $r)
                                                        <option value="{{ $r->id }}">{{ $r->name }}
                                                            {{ $r->last_name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group mb-0">
                                                <label for="small-description">Description</label>
                                                <textarea name="flag_description" class="form-control"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button id="updateflagmodalbuton" class="btn btn-primary btn-sm  mt-3"
                                                type="submit">Add Flag</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $kpiflag = DB::table('flags')
                        ->where('epic_id', $data->id)
                        ->orderby('id', 'desc')
                        ->get();

                        
                @endphp

                @if(count($kpiflag) > 0)

                @foreach ($kpiflag as $flag)
                    <div class="card check-in-card mt-3" id="remove{{$flag->id}}">
                        <div class="card-body">
                            <div class="d-flex flex-row align-items-center justify-content-between check-in-header">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="lable">
                                        <small> <span></span>
                                            <label class="form-checkbox">
                                                <input @if($flag->flag_status == 'doneflag') checked @endif class="form-check-input"  type="checkbox" @if($flag->flag_status == 'doneflag') onclick="updateflagstatus({{$flag->id}} , 'todoflag')" @else onclick="updateflagstatus({{$flag->id}} , 'doneflag')" @endif value="{{$flag->id}}"  id="flexCheckDefault">
                                                <span class="checkbox-label"></span>
                                            </label>
                                        </small>
                                    </div>
                                    <div class="d-flex flex-row align-items-center value ml-3">

                                        <h4 class="mt-2 ml-1">{{ $flag->flag_title }}</h4>
                                    </div>

                                    <div class="ml-40">
                                    
                                        @if($flag->flag_status == 'todoflag')
                                        <div class="flagstatusbadge ml-30 w-50 todo-button-color">To Do</div>
                                        @endif
                                        @if($flag->flag_status == 'inprogress')
                                        <div class="flagstatusbadge ml-35 w-50 inprogress-button-color">In Progress</div>
                                        @endif
                                        @if($flag->flag_status == 'doneflag')
                                        <div class="flagstatusbadge ml-35 w-50 done-button-color">Done</div>
                                        @endif
                                    </div>
                                        
                                 
                                </div>
                                <div>

                                </div>
                            </div>

                            <div class="check-in-content">
                                <p>{{ $flag->flag_description }}</p>
                            </div>
                            <div class="d-flex flex-row justify-content-between mt-1">
                                <div class="d-flex flex-row">
                                    <div style="width: 113px;"
                                        class="flag-type-new @if ($flag->flag_type == 'Risk') risk-color @endif @if ($flag->flag_type == 'Impediment') impediment-color @endif">
                                        {{ $flag->flag_type }}
                                    </div>
                                    <div class="epic_id mr-3 mt-1">
                                        @if(DB::table('flag_members')->where('flag_id' , $flag->id)->first())
                                            <div class="d-flex flex-row align-items-center image-cont ml-3">
                                                
                                                    @php
                                                        $member_id = DB::table('flag_members')->where('flag_id' , $flag->id)->first();
                                                        $user = DB::table('members')->where('id' , $member_id->member_id)->first();
                                                    @endphp
                                                    @if($user->image != NULL)
                                                    <img class="user-image" src="{{asset('public/assets/images/'.$user->image)}}" width="20" height="20" alt="Example Image">
                                                    @else
                                                    <img class="user-image" src="{{ Avatar::create($user->name.' '.$user->last_name)->toBase64() }}" width="20" height="20" alt="Example Image">
                                                    @endif
                                               
                                                <div>
                                                   <span class="ml-1"> {{ $user->name }} {{ $user->last_name }}</span>
                                                </div>
                                            </div>
                                      
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown d-flex">

                                        <button class="btn btn-circle dropdown-toggle btn-tolbar bg-transparent"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <img src="{{asset('/public/assets/svg/dropdowndots.svg')}}">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-toggle="modal"
                                               onclick="showupdatecard({{$flag->id}})"
                                                data-target="#edit22">Edit</a>
                                            <a class="dropdown-item" data-toggle="modal"
                                                onclick="deletekpiflag({{ $flag->id }},'{{ $data->id }}')"
                                                data-target="#delete22">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="uploadattachment{{ $flag->id }} displaynone">
                        <div class="card comment-card storyaddcard">
                            <div class="card-body">
                                <form class="needs-validation updateflag{{ $flag->id }}" action="{{ url('dashboard/kpiflagupdate') }}" method="POST" novalidate>
                                    @csrf
                                    <input type="hidden" value="{{ $flag->id }}" name="flag_id">
                                    <input type="hidden" value="{{ $data->id }}" name="kpi_id">

                                    <div class="row">
                                        
                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group mb-0">
                                                <label for="small-description">Title <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" value="{{ $flag->flag_title }}" name="flag_title" >
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-0">
                                                <label for="small-description">Flag Type <small class="text-danger">*</small></label>
                                               <select class="form-control" name="flag_type" >
                                                   <option value="">Select Flag Type</option>
                                                   <option @if($flag->flag_type == 'Risk') selected @endif value="Risk">Risk</option>
                                                   <option @if($flag->flag_type == 'Impediment') selected @endif value="Impediment">Impediment</option>
                                                   <option @if($flag->flag_type == 'Blocker') selected @endif value="Blocker">Blocker</option>
                                                   <option @if($flag->flag_type == 'Action') selected @endif value="Action">Action</option>
                                               </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-0">
                                                <label for="lead-manager">Assignee <small class="text-danger">*</small></label>
                                                <select class="form-control" name="flag_assign">
                                                    @foreach(DB::table('members')->where('org_user',Auth::id())->get() as $m)
                                                      <option @if(DB::table('flag_members')->where('flag_id' , $flag->id)->first())  @if(DB::table('flag_members')->where('flag_id' , $flag->id)->first()->member_id == $m->id) selected @endif  @endif value="{{ $m->id }}">{{ $m->name }} {{ $m->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group mb-0">
                                                <label for="small-description">Description <small class="text-danger">*</small></label>
                                                <textarea name="flag_description" class="form-control">{{ $flag->flag_description }}</textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span onclick="showupdatecard({{ $flag->id }})" class="btn btn-default btn-sm">Cancel</span>
                                            <button type="submit" class="btn btn-primary btn-sm updateflagmodalbuton{{ $flag->id }}">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('.updateflag{{ $flag->id }}').on('submit',(function(e) {
                            // $('.updateflagmodalbuton{{ $flag->id }}').html('<i class="fa fa-spin fa-spinner"></i>');
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
                                    $('.flag-render').html(data);
                                }
                            });
                        }));
                    </script>
                @endforeach

                @else
                <p class="mt-5">No Flag Found.</p>
                @endif

            </div>

               
            </div>





        </div>
        <div class="col-md-5 secondportion">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12 mt-10">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">{{$data->symbol}} {{ Quarters::abbreviate($maxlinebar) }}</div>
                        <div class="p-2 bd-highlight">{{round($progress,0)}}%</div>
                      </div>
                 
                    <div class="progress" style="height: 15px !important">
                       
                        <div class="progress-bar" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    <div style="height:350px;" class="mt-2">
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div class="d-flex flex-row align-items-center justify-content-between block-header">
                        <div class="d-flex flex-row align-items-center">
                            <div class="mr-2">
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctxLine = document.getElementById('lineChart').getContext(
        '2d');



    var actualData = @json($value);
    var month = @json($months);
    var color = @json($color);
    var maxLinebar = @json($maxlinebar);

    var calculatedMaxbar = Math.ceil(maxLinebar / 25) * 25;
    var calculatedMaxbarNew = (calculatedMaxbar + 100);
    var extraLineData = "{{ $data->target_value }}";
    var extraLineDataa = Array.from({
        length: @json($value).length
    }, (_, i) => i === 0 ? 0 : extraLineData);


    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                    label: 'Status',
                    data: @json($value),
                    borderColor: 'gray',
                    fill: false,
                    backgroundColor: color,
                    borderWidth: 2,
                    pointRadius: 5,
                    tension: 0.5
                },
                {
                    label: 'Trend Line',
                    data: extraLineDataa,
                    fill: false,
                    borderWidth: 1.5,
                    borderColor: 'gray',
                    borderDash: [5, 5],
                    borderWidth: 2,
                    pointRadius: 0,
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                    display: true,
                    stepSize: 20,
                },
                y: {
                    beginAtZero: true,
                    stepSize: 20,
                    max: calculatedMaxbarNew,
                },
            },
            plugins: {
            legend: {
                display: false,
            
            }
        }
        }
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script>
    function uploadattachment() {
        $('.uploadattachment').slideToggle();
    }

    function showupdatecard(id) {
        $('.uploadattachment' + id).slideToggle();
    }

    function writecomment(id) {
        $('.writecomment' + id).slideToggle();
    }


    function showupdatecard(id) {
        $('.uploadattachment' + id).slideToggle();
        $("#js-select2" + id).select2({
            closeOnSelect: false,
            placeholder: "Select Assignee",
            allowHtml: true,
            allowClear: true,
            tags: true // создает новые опции на лету
        });

    }

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

    function deletecommentshow(id) {
        $('#commentdelete' + id).slideToggle();
    }

    function deletecomment(id, flag,flag_id) {
        $.ajax({
            type: "POST",
            url: "{{ url('deletecomment-kpi') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                flag: flag,
            },
            success: function(data) {
                $('#commentdeletekey' + id).remove();
                $('#kpi-modal-content').html(data);
                $('.show-comment' + flag_id).slideToggle();

            },
            error: function(error) {
                console.log('Error updating card position:', error);
            }
        });
    }

    function editcommentshow(id) {
        $('#commentedit' + id).show();
    }

    function editcommenthide(id) {
        $('#commentedit' + id).hide();
    }

    function replycomment(id) {
        $('.replycard' + id).slideToggle();
    }
    // $(function() {

    //  $('.key-chart').multiselect({
    //    includeSelectAllOption:true,
    //    numberDisplayed: 0
    //  });

    // });

    $("#js-select1").select2({
        closeOnSelect: false,
        placeholder: "Select Assignee",
        // allowHtml: true,
        allowClear: true,
        tags: false // создает новые опции на лету

    });



    function getstatus(id) {
        $('#status').val(id);
    }



    function showcomment(id) {
        $('.show-comment' + id).slideToggle();
    }

    function deletekpivalue(id, kpi_id) {
        $.ajax({
            type: "POST",
            url: "{{ url('kpi-deletevalue') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                kpi_id: kpi_id,


            },
            success: function(res) {
                setTimeout(function() {
                    $('#kpi-modal-content').html(res);
                }, 2000);

            }
        });
    }

    function showtab(tab) {

        if (tab == 'profile') {
            $('#home').hide();
            $('#profile').show();
            $(".profile-tab").css("background-color", "#e9ecef");
            $(".home-tab").css("background-color", "#fff"); 

        }

        if (tab == 'home') {
            $('#home').show();
            $('#profile').hide();
            $(".profile-tab").css("background-color", "#fff");
            $(".home-tab").css("background-color", "#e9ecef"); 
        }
    }


    function uploadattachmentflag() {
        $('.uploadattachmentflag').slideToggle();
    }

    $('.savekpiflagnewform').on('submit', (function(e) {
        // $('.saveepicflagbuttonasdsadsad').html('<i class="fa fa-spin fa-spinner"></i>');
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

                $('#success-check-in-flag').html(
                    '<div class="alert alert-success" role="alert"> Flag Added Successfully</div>'
                );

                setTimeout(function() {
                    $('.flag-render').html(data);
                }, 2000);

                

            }
        });
    }));


    function deletekpiflag(flag_id, kpi_id) {
        $.ajax({
            type: "POST",
            url: "{{ url('kpi-deleteflag') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                flag_id: flag_id,
                kpi_id: kpi_id,


            },
            success: function(res) {
                // setTimeout(function() {
                //     $('#kpi-modal-content').html(res);
                // }, 2000);

                $('#remove' + flag_id).remove();

            }
        });
    }

    function kpirender(kpi_id,type,stream_id) {
        $.ajax({
            type: "GET",
            url: "{{ url('kpi-render') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                kpi_id: kpi_id,
                type:type,
                stream_id:stream_id,


            },
            success: function(res) {
              $('#chart-update').html(res);
                


            }
        });
    }

    function getflag(id,kpi_id) {
        $.ajax({
            type: "GET",
            url: "{{ url('kpi-flag-search') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
            id:id,
            kpi_id:kpi_id

            },
            success: function(res) {
            $('.flag-render').html(res);
                
            }
        });
    }

    $(document).ready(function(){
    $('#inputField').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.includes('+')) {
            var val = $('#lastvalue').val();
            var aadd = inputValue.replace(/[^1-9\.]/g,'');
            var newvalue = (parseInt(val) + parseInt(aadd));
            $('#newvalue').html('<input type="text" class="form-control w-50" value="'+newvalue+'">')
            $('#savenewvalue').val(newvalue);
        
            // You can perform further actions here if the user enters a plus sign
        }else
        {
            $('#newvalue').html('');
            $('#savenewvalue').val('');
        }
    });
});

function orderbykpistatus(order,kpi_id) {
    var type = 'order';
    $.ajax({
        type: "POST",
        url: "{{ url('dashboard/orderbykpistatus') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            order: order,
            kpi_id:kpi_id,
            type:type,
        },
        success: function(res) {
            $('.check-in-render').html(res);
            $('#selectedItem').html(order);
        }
    });
}



function getcheckin(id,kpi_id) {
      var type = 'search';
        $.ajax({
            type: "GET",
            url: "{{ url('kpi-checkin-search') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
            id:id,
            kpi_id:kpi_id,
            type:type

            },
            success: function(res) {
            $('.check-in-render').html(res);
                
            }
        });
    }
</script>
