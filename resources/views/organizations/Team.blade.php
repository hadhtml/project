@php
    $var_objective = 'Org-team';
@endphp
@extends('components.main-layout')
<title>{{ Cmf::getmodulename('level_one') }}-{{ Cmf::getmodulename('level_three') }}</title>
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

    @if (count($Team) > 0)
    <div class="row">

        
            @foreach ($Team as $team)
                @php
                    $dataArray = explode(',', $team->member);
                    $dataCount = count($dataArray);
                    $firstTwoIds = array_slice($dataArray, 0, 2);
                    $remainingIds = array_slice($dataArray, 2);
                    $remainingCount = count($remainingIds);

                    $ObjResultcount = DB::table('objectives')
                        ->where('unit_id', $team->id)
                        ->where('type', 'orgT')
                        ->where('trash',NULL)
                        ->count();
                    $EpicResultcount = DB::table('team_backlog')
                        ->where('unit_id',$team->id)
                        ->where('epic_title','!=',NULL)
                        ->where('type','orgT')
                        ->count();


                @endphp
                <div class="col-md-4">
                    <div class="card border-hover-primary">
        <div class="card-header border-0 pt-9">
            <div class="card-title m-0">
                <div class="symbol symbol-50px w-50px bg-light">
                    <img  class="gixie" data-item-id="{{ $team->id }}" style="width: 50px;object-fit: cover;border-radius: 10px;height: 50px;">
                </div>
            </div>
            <div class="card-toolbar">
                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-solid ki-dots-vertical fs-2x"></i>
                    </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                     <div class="menu-item px-3">
                        <a class="menu-link px-3"  data-toggle="modal" data-target="#edit{{ $team->id }}">Edit</a>
                    </div>
                    <div class="menu-item px-3 my-1">
                        <a class="menu-link px-3" data-toggle="modal" data-target="#delete{{$team->id}}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-9">
            <a href="{{url('dashboard/organization/'.$team->slug.'/dashboard/orgT')}}" class="fs-3 fw-bold text-gray-900">{{$team->team_title}}</a>
            <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                {{$dataCount}} total members
            </p>
            <div class="d-flex flex-wrap mb-5">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">{{$ObjResultcount}}</div>
                    <div class="fw-semibold text-gray-500">Epics</div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">{{$ObjResultcount}}</div>
                    <div class="fw-semibold text-gray-500">Objectives</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center leader-section mt-4">
                 <div>
                     @if($team->lead_id)
                         @foreach(DB::table('members')->get() as $r)
                         @if($r->id == $team->lead_id)
 
                                 <div class="d-flex flex-row align-items-center">
                                     <div class="mr-2">
                                         @if($r->image != NULL)
                                         <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                         @else
                                         <img src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
                                         @endif
                                     </div>
 
                                     <div class="d-flex flex-column">
                                         <div>
                                             <span class="text-primary">Lead</span>
                                         </div>
                                         <div>
                                             <span>{{$r->name}} {{ $r->last_name }}</span>
                                         </div>
                                     </div>
                                 </div>
                             @endif
                         @endforeach
                     @endif
                 </div>
                 <div>
                     <div class="d-flex align-items-center flex-lg-fill my-1">
                        <div class="symbol-group symbol-hover">
                            @foreach($firstTwoIds as $member)
                            @foreach(DB::table('members')->get() as $r)
                            @if($r->id == $member)
                            @php
                            $name = $r->name.' '.$r->last_name;
                            @endphp
 
                             <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="{{$name}}">
                                 @if($r->image != NULL)
                                         <img src="{{asset('public/assets/images/'.$r->image)}}" alt="Example Image">
                                         @else
                                         <img src="{{ Avatar::create($name)->toBase64() }}" alt="Example Image">
                                         @endif
                             </div>
                             
                             @endif
                             @endforeach
                             @endforeach
                             @if($dataCount > 2)
                             <div style="width:42px; height:42px; padding: 10px; font-size: 12px;" class="symbol symbol-30  symbol-circle symbol-light" data-toggle="tooltip" title="" data-original-title="More users">
                                 <span class="symbol-label">{{$remainingCount}}+</span>
                             </div>
                             @endif
                         </div>
                     </div>
                 </div>
             </div>


        </div>
    </div>
                </div>
<div class="modal fade" id="delete{{ $team->id }}" tabindex="-1" aria-hidden="true">
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
                    <h1 class="mb-3">Delete {{ Cmf::getmodulename("level_three") }}</h1>
                </div>
                <form method="POST" action="{{ url('delete-org-team') }}">
                @csrf
                <input type="hidden" name="delete_id" value="{{ $team->id }}">
                <div class="text-center">
                    Are you sure you want to delete this Team?                    
                </div>
                <div class="text-center pt-15">
                    <button type="submit" class="btn btn-danger">
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

<div class="modal fade" id="edit{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog mw-650px" role="document">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <form class="needs-validation" action="{{ url('update-team-org') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$team->id}}">
                        <div class="text-center mb-13">
                            <h1 class="mb-3">Update {{ Cmf::getmodulename('level_three') }}</h1>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">{{ Cmf::getmodulename('level_three') }} Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"  value="{{$team->team_title}}" name="team_title" id="team-title" required>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Lead</span>
                            </label>
                            <select class="form-control form-control-solid" name="lead_manager_team">
                                <?php foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r){ ?>
                                  <option @if($r->id == $team->lead_id) selected @endif value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                                <?php }  ?>
                            </select>
                        </div>
                        <div class="mb-10">
                            <div class="fs-6 fw-semibold mb-2">Please Select User From User List</div>
                            <div class="mh-300px scroll-y me-n7 pe-7" id="myTable">
                                @foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r)                   
                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed searchuser">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-35px symbol-circle">
                                            @if ($r->image != null)
                                                <img src="{{ asset('public/assets/images/' . $r->image) }}"
                                                    alt="Example Image">
                                            @else
                                            <img width="45px" height="45px" src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
                                            @endif
                                        </div>
                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $r->name }} {{ $r->last_name }}</a>
                                            <div class="fw-semibold text-muted">{{ $r->email }}</div>
                                        </div>
                                    </div>
                                    <div class="ms-2">
                                        <input type="checkbox" @foreach(explode(',',$team->member) as $t) @if($r->id == $t) checked @endif @endforeach value="{{$r->id}}" name="member[]">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
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
<div style="position:absolute;right:27%;top:40%;" class="text-center">
<img src="{{asset('public/team.svg')}}"  width="120" height="120">
<div><h6 class="text-center">No Records Found</h6></div>
<div><p class="text-center">You may create your first Team by clicking the bellow button.</p></div>
<button class="btn btn-flex btn-primary h-40px fs-7 fw-bold"  type="button" data-toggle="modal" data-target="#add-team">
    Add a Team
</button>
</div>
@endif
<div class="modal fade" id="add-team" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
    <div class="modal-dialog mw-650px" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <form  action="{{ url('add-team-org') }}" method="POST">
                    @csrf
                    <input type="hidden" name="team_unit_id" value="{{ $organization->id }}">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">Add {{ Cmf::getmodulename('level_three') }}</h1>
                    </div>
                    <input type="hidden" name="org_stream_id" value="{{$organization->id}}">
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">{{ Cmf::getmodulename('level_three') }} Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="team_title" id="team-title" required>
                    </div>
                    @php
                        $memberCount = DB::table('members')->where('org_user', Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->count();
                    @endphp
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Select Lead</span>
                        </label>
                        <select required class="form-control form-control-solid" name="lead_manager_team">
                            <option value="">Select Lead</option>
                            <?php foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r){ ?>
                              <option value="{{ $r->id }}">{{ $r->name }} {{ $r->last_name }}</option>
                            <?php }  ?>
                        </select>
                    </div>
                    @if($memberCount == 0)
                        <div class="alert alert-danger mt-1 ml-3" role="alert">
                            Add users before assigning <a href="{{ route('settings.users') }}"
                                class="alert-link">Click here</a>.
                        </div>
                    @endif
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Search User By Name</span>
                        </label>
                        <input id="myInput" type="search" class="form-control form-control-solid"  placeholder="Search User By Name" name="">
                    </div>
                    <div class="mb-10">
                        <div class="fs-6 fw-semibold mb-2">Please Select User From User List</div>
                        <div class="mh-300px scroll-y me-n7 pe-7" id="myTable">
                            @foreach(DB::table('members')->where('org_user',Auth::id())->orWhere('org_user',Auth::user()->invitation_id)->get() as $r)                      
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed searchuser">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        @if ($r->image != null)
                                            <img src="{{ asset('public/assets/images/' . $r->image) }}"
                                                alt="Example Image">
                                        @else
                                        <img width="45px" height="45px" src="{{ Avatar::create($r->name.' '.$r->last_name)->toBase64() }}" alt="Example Image">
                                        @endif
                                    </div>
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $r->name }} {{ $r->last_name }}</a>
                                        <div class="fw-semibold text-muted">{{ $r->email }}</div>
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <input type="checkbox" value="{{$r->id}}" name="member[]">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function search_member(val) {
          if(val != '')
          {
            $.ajax({
                type: "GET",
                url: "{{ url('get-user') }}",
                data: {
                    val: val
                },
                success: function(res) {

                    $('#member').show();
                    $('#member').html(res);
                    $('#member-old').hide();


                }
            });

        }else
        {
            
            $('#member-old').show();
            $('#member').hide();

        }

        }
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert-success').slideUp();
            }, 3000);
        });

        var elements = document.querySelectorAll('.gixie');

        elements.forEach(function(element) {
            var itemId = element.getAttribute('data-item-id');
            var imageData = new GIXI(300).getImage();

            element.setAttribute('src', imageData);
        });

        $('.check').on('click', function() {
                isChecked = $(this).is(':checked')

                if (isChecked) {
                }

            })

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script>
@endsection
