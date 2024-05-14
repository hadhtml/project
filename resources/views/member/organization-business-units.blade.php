@php
$var_objective = "Org-Unit";
@endphp
@extends('components.main-layout')
<title>Org-{{ Cmf::getmodulename('level_one') }}</title>
@section('content')

@if (session('message'))
  <div class="row">
      <div class="col-md-12">
          <div class="alert alert-success mt-1" role="alert">
              {{ session('message') }}
          </div>
      </div>
  </div>
@endif
@if(count($Unit) > 0)
<div class="row">
    @foreach($Unit as $unit)
        @php
           $ValueCount = DB::table('value_stream')->where('unit_id',$unit->id)->count();
           $TeamCount = DB::table('unit_team')->where('org_id',$unit->id)->count();
           $member = DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->count();
        @endphp
        <div class="col-md-4 col-xl-4 mb-8">
            <div class="card border-hover-primary">
                <div class="card-header border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-100px w-100px">
                            <span class="module-icon material-symbols-outlined mr-2">domain</span>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-solid ki-dots-vertical fs-2x"></i>
                            </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                             <div class="menu-item px-3">
                                <a class="menu-link px-3"  data-toggle="modal" data-target="#edit{{$unit->id}}">Edit</a>
                            </div>
                            <div class="menu-item px-3 my-1">
                                <a class="menu-link px-3" data-toggle="modal" data-target="#delete{{$unit->id}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-9">
                    <a href="{{url('dashboard/organization/'.$unit->slug.'/dashboard/'.$unit->type)}}" class="fs-3 fw-bold text-gray-900">{{ \Illuminate\Support\Str::limit($unit->business_name,25, $end='...') }}</a>
                    <p class="text-gray-500 fw-semibold fs-5 mb-3">
                        {{ \Illuminate\Support\Str::limit($unit->detail,30, $end='...') }}
                    </p>
                    <div class="d-flex flex-wrap mb-5">
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">{{$ValueCount}}</div>
                            <div class="fw-semibold text-gray-500">{{ Cmf::getmodulename("level_two") }}</div>
                        </div>
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">{{$TeamCount}}</div>
                            <div class="fw-semibold text-gray-500">{{ Cmf::getmodulename('level_three') }}</div>
                        </div>
                    </div>
                    @if($member > 0)
                    @if($unit->lead_id)
                    @foreach(DB::table('members')->get() as $r)
                    @if($r->id == $unit->lead_id)
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

                    @endif
                    @else
                    <div>
                        <a class="nav-link" href="{{route('settings.users')}}">
                            <button class="btn btn-primary">Assign</button>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete{{$unit->id}}" tabindex="-1" aria-hidden="true">
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
                            <h1 class="mb-3">Delete {{ Cmf::getmodulename("level_one") }}</h1>
                        </div>
                        <form method="POST">
                         @csrf   
                         <input type="hidden" name="delete_id" id="delete_id" value="{{$unit->id}}">
                      
                        <div class="modal-body">
                            <div class="modal-body-error"></div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Write {{ Cmf::getmodulename('level_one') }} name and hit confirm</span>
                                </label>
                                <input type="text" name="bu_name"  id="bu_name{{$unit->id}}" class="form-control form-control-solid" placeholder="Write {{ Cmf::getmodulename('level_one') }} name and hit confirm" required>
                            </div>                    
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="DeleteUnit({{$unit->id}});" class="btn btn-danger">
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
        <div class="modal fade" id="edit{{$unit->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="{{url('update-business-unit')}}" method="POST">
                            @csrf
                            <div class="mb-13 text-center">
                                <h1 class="mb-3">Update {{ Cmf::getmodulename("level_one") }}</h1>
                            </div>
                            <input type="hidden" name="unit_id" value="{{$unit->id}}">
                            <input type="hidden" name="org_id" value="{{ DB::table('organization')->where('user_id' ,Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->first()->id }}">
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">{{ Cmf::getmodulename("level_one") }} Title</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="unit_name" value="{{$unit->business_name}}" required>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Select Lead</span>
                                </label>
                                <select class="form-control form-control-solid" required name="lead_manager">
                                    <?php foreach(DB::table('members')->where('org_user',Auth::id())->get() as $r){ ?>
                                      <option @if($r->id == $unit->lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span>Type {{ Cmf::getmodulename('level_one') }} Details</span>
                                </label>
                                <textarea class="form-control form-control-solid" rows="3" name="unit_detail" placeholder="Type {{ Cmf::getmodulename('level_one') }} Details">{{$unit->detail}}</textarea>
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

@else
<div class="card">
    <div class="card-body">
       <div class="text-center">
          <img src="{{ asset('public/epic-backlog.svg') }}" alt="" width="120" height="120" class="mw-100">
       </div>
       <div class="card-px text-center  pt-15 pb-15">
          <h2 class="fs-2x fw-bold mb-0">No Records Found</h2>
          <p class="text-gray-500 fs-4 fw-semibold py-7">You may create a {{ Cmf::getmodulename("level_one") }} by clicking the button below.</p>
          <a data-toggle="modal" data-target="#add-business-unit" href="#" class="btn btn-primary er fs-6 px-8 py-4">Add {{ Cmf::getmodulename("level_one") }}</a>
       </div>
    </div>
 </div>
@endif


<!-- Create Business Unit -->
<div class="modal fade" id="add-business-unit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
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
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <form class="needs-validation" action="{{url('add-business-unit')}}"  method="POST">
                    @csrf
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Create {{ Cmf::getmodulename("level_one") }}</h1>
                    </div>
                    <input type="hidden" name="org_unit_id" value="{{ DB::table('organization')->where('user_id' ,Auth::id())->orWhere('user_id',Auth::user()->invitation_id)->first()->id }}">

                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">{{ Cmf::getmodulename("level_one") }} Title</span>
                        </label>
                        <input  type="text" class="form-control form-control-solid" placeholder="Enter {{ Cmf::getmodulename('level_one') }} Title" name="unit_name" required />
                    </div>
                    @php
                    $memberCount = DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->count();
                    @endphp
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Select Lead</span>
                        </label>
                        <select class="form-control" name="lead_manager" required>
                            <option value="">Select Lead </option>
                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r){ ?>
                              <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
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
                            <span class="required">Short Description</span>
                        </label>
                        <textarea class="form-control form-control-solid" rows="3" name="unit_detail" placeholder="Type {{ Cmf::getmodulename('level_one') }} Details"></textarea>
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
<!-- Create Business Unit -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script>
     $(document).ready(function() {
    setTimeout(function(){$('.alert-success').slideUp();},3000); 
    });
    
    document.getElementById("noPasteField").addEventListener("paste", function (e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData("text/plain");
});

        function DeleteUnit(delete_id)
        {
 
        //  var delete_id = $('#delete_id').val();
         var val = $('#bu_name'+delete_id).val();

      
        if(val == '')
        {
          $('#show-error').html('<div class="alert alert-danger" role="alert"> Please Enter  {{ Cmf::getmodulename("level_one") }} Name</div>');    
            return  false;
        }
       
        $.ajax({
        type: "POST",
        url: "{{ url('delete-business-unit') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        delete_id:delete_id,
        val:val
        },
        success: function(res) {
         if(res == 1)
         {
            $('#bu_name'+delete_id).val('');
         $('.modal-body-error').html('<div class="alert alert-danger" role="alert"> Please Enter Correct {{ Cmf::getmodulename("level_one") }} Name</div>');    
             
         }else
         {
            $('#bu_name'+delete_id).val('');
         $('.modal-body-error').html('<div class="alert alert-success" role="alert"> {{ Cmf::getmodulename("level_one") }} Deleted Successfully</div>');
        
         setTimeout(function() {
        location.reload();
                }, 2000);
         } 


        }
        });

        }


</script>  
@endsection
