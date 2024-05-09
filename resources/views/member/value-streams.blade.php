 @php
$var_objective = "V-Stream";
@endphp
@extends('components.main-layout')
<title>{{ Cmf::getmodulename('level_two') }}</title>
@section('content')
@if(count($Stream) > 0)
<div class="row">
    @foreach($Stream as $stream)
    @php
    $TeamCount = DB::table('value_team')->where('org_id',$stream->id)->count();
    @endphp 
    <div class="col-md-4 col-xl-4 mb-8">
        <div class="card border-hover-primary">
            <div class="card-header border-0 pt-9">
                <div class="card-title m-0">
                    <div class="symbol symbol-50px w-50px bg-light">
                        <span class="module-icon material-symbols-outlined mr-2">layers</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-solid ki-dots-vertical fs-2x"></i>
                        </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                         <div class="menu-item px-3">
                            <a class="menu-link px-3"  data-toggle="modal" data-target="#edit{{$stream->ID}}">Edit</a>
                        </div>
                        <div class="menu-item px-3 my-1">
                            <a class="menu-link px-3" data-toggle="modal" data-target="#delete{{$stream->ID}}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-9">
                <a href="{{url('dashboard/organization/'.$stream->slug.'/dashboard/'.$stream->type)}}" class="fs-3 fw-bold text-gray-900">{{ \Illuminate\Support\Str::limit($stream->value_name,25, $end='...') }}</a>
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    {{ \Illuminate\Support\Str::limit($stream->detail,30, $end='...') }}
                </p>
                <div class="d-flex flex-wrap mb-5">
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">{{DB::table('objectives')->wherenull('trash')->where('unit_id' , $stream->id)->where('type' , 'stream')->count()}}</div>
                        <div class="fw-semibold text-gray-500">Objectives</div>
                    </div>
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">{{DB::table('value_team')->where('org_id' , $stream->id)->count()}}</div>
                        <div class="fw-semibold text-gray-500">{{ Cmf::getmodulename('level_three') }}</div>
                    </div>
                </div>
                @if($stream->Lead_id)
                @foreach(DB::table('members')->get() as $r)
                @if($r->id == $stream->Lead_id)
                <div class="symbol-group symbol-hover">
                    <div class="symbol symbol-35px symbol-circle">
                        @if($r->image != NULL)
                        <img src="{{asset('public/assets/images/'.$r->image)}}" alt="lead">
                        @else
                        <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="lead">
                        @endif
                    </div>
                    {{$r->name}} {{ $r->last_name }}
                </div>
                @endif
                @endforeach
                @else
                <td>N/A</td>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete{{$stream->ID}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Delete {{ Cmf::getmodulename("level_two") }}</h1>
                    </div>
                    <form method="POST">
                     @csrf   
                    <input type="hidden" name="delete_id" value="{{$stream->ID}}">
                    <div class="modal-body">
                        <div class="modal-body-error"></div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Write {{ Cmf::getmodulename('level_two') }} name and hit confirm</span>
                            </label>
                            <input type="text" name="bu_name"  class="form-control noPasteField{{$stream->ID}}" placeholder="Write {{ Cmf::getmodulename('level_two') }} name and hit confirm" required>
                        </div>                    
                    </div>
                    <div class="text-center">
                        <button type="button" onclick="DeleteValue({{$stream->ID}})" class="btn btn-danger">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit{{$stream->ID}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="{{url('update-value-stream')}}" method="POST">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Update {{ Cmf::getmodulename("level_two") }}</h1>
                        </div>
                        <input type="hidden" name="value_id" value="{{$stream->ID}}">
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">{{ Cmf::getmodulename("level_two") }} Title</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" name="value_name" value="{{$stream->value_name}}" required>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">{{ Cmf::getmodulename("level_one") }}</span>
                            </label>
                            <select class="form-control form-control-solid" name="unit_id" required>
                                <?php foreach(DB::table('business_units')->where('user_id',Auth::id())->get() as $r){ ?>
                                  <option @if($r->id == $stream->unit_id) selected @endif value="{{ $r->id }}">{{ $r->business_name }}</option>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Lead</span>
                            </label>
                            <select class="form-control form-control-solid" name="lead_manager" required>
                                <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                  <option @if($r->id == $stream->Lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{$r->last_name}}</option>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Small Description</span>
                            </label>
                            <textarea class="form-control form-control-solid" name="detail" rows="3" placeholder="Type Detail">{{$stream->DETAIL}}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Create Business Unit -->

<!-- Create Business Unit -->
@else
<div style="position:absolute;right:27%;top:40%;" class="text-center">
<img src="{{asset('public/business-unit.svg')}}"  width="120" height="120">
<div><h6 class="text-center">No Records Found</h6></div>
<div><p class="text-center">You may create a {{ Cmf::getmodulename("level_one") }} by clicking the button below.</p></div>
<button class="btn btn-flex btn-primary h-40px fs-7 fw-bold"  type="button" data-toggle="modal" data-target="#add-business-value">
    Add {{ Cmf::getmodulename("level_two") }}
</button>
</div>
@endif
<div class="modal fade" id="add-business-value" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form class="needs-validation" action="{{url('add-value-stream')}}" method="POST">
                    @csrf
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Create {{ Cmf::getmodulename('level_two') }}</h1>
                    </div>
                    <input type="hidden" name="org_value_id" value="{{$organization->id}}">
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Enter {{ Cmf::getmodulename('level_two') }} Title</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter {{ Cmf::getmodulename('level_two') }} Title" name="value_name" id="{{ Cmf::getmodulename('level_one') }}" required>
                    </div>
                    @php
                    $BCount = DB::table('business_units')->where('user_id',Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->count();
                    @endphp

                    @php
                    $memberCount = DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->count();
                    @endphp
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Lead</span>
                        </label>
                        <!--end::Label-->
                        <select class="form-control form-control-solid" name="lead_manager" required>
                            <option value="NULL" selected>Select Lead</option>
                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r){ ?>
                              <option value="{{ $r->id }}">{{ $r->name }} {{$r->last_name}}</option>
                            <?php }  ?>
                        </select>
                    </div>
                    @if($memberCount == 0)
                    <div class="alert alert-danger mt-1 ml-3" role="alert">
                    Add users before assigning <a href="{{route('settings.users')}}" class="alert-link">Click here</a>.
                    </div>
                    @endif
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span>Small Description</span>
                        </label>
                        <textarea class="form-control form-control-solid" name="detail" rows="3" placeholder="Type Detail"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   $(document).ready(function() {
    var table = $('.data-table').DataTable({
            'order':[],
            'columnDefs': [{
                "targets": [0,5],
                "orderable": false
            }]
         
      });

       });


     $(document).ready(function() {
    setTimeout(function(){$('.alert-success').slideUp();},3000); 
    });
    
        document.getElementById("noPasteField").addEventListener("paste", function (e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData("text/plain");
});


function DeleteValue(delete_id)
        {
 
        //  var delete_id = $('#delete_id').val();
         var value_name = $('.noPasteField'+delete_id).val();

    
        if(value_name == '')
        {
          $('#show-error').html('<div class="alert alert-danger" role="alert"> Please Enter Correct {{ Cmf::getmodulename("level_two") }} Name</div>');    
            return  false;
        }
       
        $.ajax({
        type: "POST",
        url: "{{ url('delete-value-stream') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        delete_id:delete_id,
        value_name:value_name
        },
        success: function(res) {
      
         if(res == 1)
         {
         $('.modal-body-error').html('<div class="alert alert-danger" role="alert"> Please Enter Correct {{ Cmf::getmodulename("level_two") }} Name</div>');    
             
         }else
         {
         $('.modal-body-error').html('<div class="alert alert-success" role="alert"> {{ Cmf::getmodulename("level_two") }} Deleted Successfully</div>');
         location.reload();
         } 


        }
        });

        }
</script>
@endsection