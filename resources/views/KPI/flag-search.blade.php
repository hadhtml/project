
{{-- <div class="displayflex">
    <input id="myInput" type="search" style="width:50%;height:35px !important"
        class="form-control  input-sm" onkeyup="getflag(this.value,'{{$data->id}}')" value="{{$id}}" placeholder="Search flags..." name="">

    <span onclick="uploadattachmentflag()" class="btn btn-default btn-sm ml-2">New Flag</span>
</div> --}}

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
        ->where('flag_title', 'like', "%$id%")
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
                                <input @if($flag->flag_status == 'doneflag') checked @endif class="form-check-input"  type="checkbox" @if($flag->flag_status == 'doneflag') onclick="updateflagstatus({{$flag->id}} , 'Todo')" @else onclick="updateflagstatus({{$flag->id}} , 'doneflag')" @endif value="{{$flag->id}}"  id="flexCheckDefault">
                                <span class="checkbox-label"></span>
                            </label>
                        </small>
                    </div>
                    <div class="d-flex flex-row align-items-center value ml-3">

                        <h4 class="mt-2 ml-1">{{ $flag->flag_title }}</h4>
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


<script>

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
</script>


