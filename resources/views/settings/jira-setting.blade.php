@php
$var_objective = "Jira";
@endphp
@extends('components.main-layout')
<title>Jira Setting</title>
@section('content')
<div class="row">
   <div class="col-md-12">
      @if (session('message'))
      <div class="alert alert-success mt-1" role="alert">
         {{ session('message') }}
      </div>
      @endif
      <div class="card">
         <div class="card-body">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
               <thead>
                  <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                     <td class="min-w-125px">Jira Connect Name</td>
                     <td class="min-w-125px">Jira Url</td>
                     <td class="min-w-125px">Jira User Name</td>
                     <td class="text-end min-w-70px">Action</td>
                  </tr>
               </thead>
               <tbody class="fw-semibold text-gray-600">
                  @foreach($Jiradata as $data)
                  <tr>
                     <td class="text-gray-600 text-hover-primary mb-1">{{$data->jira_name}}</td>
                     <td class="text-gray-600 text-hover-primary mb-1">{{$data->jira_url}}</td>
                     <td class="text-gray-600 text-hover-primary mb-1">{{$data->user_name}}</td>
                     <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#create{{$data->id}}" class="menu-link px-3">View</a>
                           </div>
                           <!--end::Menu item-->
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$data->id}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                           </div>
                           <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                     </td>
                  </tr>
                  <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header pb-0 border-0 justify-content-end">
                               <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                                   <i class="ki-outline ki-cross fs-1"></i>
                               </div>
                           </div>
                           <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                               <div class="text-center mb-13">
                                 <h1 class="mb-3" id="end-quartr">Delete Account</h1>
                              </div>
                              <form method="POST" action="{{url('delete-jira-account')}}">
                                 @csrf   
                                 <input type="hidden" name="delete_id" value="{{$data->id}}">
                                 <div class="text-center pb-15">
                                    Are you sure you want to delete this Jira Account?
                                 </div>
                                 <div class="text-center">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="create{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
                   <div class="modal-dialog mw-650px" role="document">
                       <div class="modal-content">
                           <div class="modal-header pb-0 border-0 justify-content-end">
                               <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                                   <i class="ki-outline ki-cross fs-1"></i>
                               </div>
                           </div>
                           <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                               <div class="text-center mb-13">
                                 <h1 class="mb-3" id="end-quartr">Update your Jira account</h1>
                              </div>
                              <form class="needs-validation" action="{{url('update-jira-setting')}}" method="POST">
                                 @csrf
                                 <input type="hidden" name="jira_id" value="{{$data->id}}">
                                 <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="d-flex flex-column mb-7 fv-row">
                                          <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                              <span class="required">Jira Connect Name</span>
                                          </label>
                                          <input type="text" class="form-control form-control-solid" value="{{$data->jira_name}}" name="jira_name"  id="team-title" required>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="d-flex flex-column mb-7 fv-row">
                                          <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                              <span class="required">Jira Url</span>
                                          </label>
                                          <input type="url" class="form-control form-control-solid" value="{{$data->jira_url}}" name="jira_url"  id="team-title" required>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="d-flex flex-column mb-7 fv-row">
                                          <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                              <span class="required">Jira User Name</span>
                                          </label>
                                          <input type="text" class="form-control form-control-solid" value="{{$data->user_name}}" name="user_name"  id="team-title" required>
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                       <div class="d-flex flex-column mb-7 fv-row">
                                          <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                              <span class="required">Jira Token</span>
                                          </label>
                                          <input type="text" class="form-control form-control-solid" value="{{$data->token}}" name="token"  id="team-title" required>
                                       </div>
                                    </div>
                                    <div class="text-center pt-15">
                                       <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Connect</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach 
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Create Business Unit -->
<!-- Create Business Unit -->
<div class="modal fade" id="create-jira" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
 <div class="modal-dialog mw-650px" role="document">
     <div class="modal-content">
         <div class="modal-header pb-0 border-0 justify-content-end">
             <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                 <i class="ki-outline ki-cross fs-1"></i>
             </div>
         </div>
         <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
             <div class="text-center mb-13">
               <h1 class="mb-3" id="end-quartr">Connect your Jira account</h1>
            </div>
            <form class="needs-validation" action="{{url('add-jira-setting')}}" method="POST">
               @csrf
               <div class="row">
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jira Connect Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="jira_name"  id="team-title" required>
                      </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jira Url</span>
                        </label>
                        <input type="url" class="form-control form-control-solid" name="jira_url"  id="team-title" required>
                      </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jira User Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="user_name"  id="team-title" required>
                      </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jira Token</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="token"  id="team-title" required>
                      </div>
                  </div>
                  <div class="text-center pt-15">
                     <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Connect</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="create-financial" tabindex="-1" role="dialog" aria-labelledby="add-team" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 526px !important;">
         <div class="modal-header">
            <div class="row">
               <div class="col-md-12">
                  <h5 class="modal-title" id="create-epic">Financial Year Setting</h5>
               </div>
               <div class="col-md-12">
                  <p>Fill-in the details bellow</p>
               </div>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="{{asset('public/assets/images/icons/minus.svg')}}">
            </button>
         </div>
         <div class="modal-body">
            <form class="needs-validation" action="{{url('add-financial-year')}}" method="POST">
               @csrf
               @php
               $month = DB::table('settings')->where('user_id',Auth::id())->first();
               $monthNumber = 0;
               if($month)
               {
               $monthNumber = $month->month;
               }
               $carbonDate = \Carbon\Carbon::create(null, $monthNumber + 1, 1);
               $monthName = $carbonDate->format('F');
               @endphp
               <p class="ml-2">Selected Month <b>{{$monthName}}</b></p>
               <div class="row mt-1">
                  <div class="col-md-12 col-lg-12 col-xl-12">
                     <div class="form-group mb-0">
                        <select class="form-control" name="month">
                        <option @if($month) @if($month->month == 0) selected @endif @endif value='0'>Janaury</option>
                        <option @if($month) @if($month->month == 1) selected @endif @endif value='1'>February</option>
                        <option @if($month) @if($month->month == 2) selected @endif @endif value='2'>March</option>
                        <option @if($month) @if($month->month == 3) selected @endif @endif value='3'>April</option>
                        <option @if($month) @if($month->month == 4) selected @endif @endif value='4'>May</option>
                        <option @if($month) @if($month->month == 5) selected @endif @endif value='5'>June</option>
                        <option @if($month) @if($month->month == 6) selected @endif @endif value='6'>July</option>
                        <option @if($month) @if($month->month == 7) selected @endif @endif value='7'>August</option>
                        <option @if($month) @if($month->month == 8) selected @endif @endif value='8'>September</option>
                        <option @if($month) @if($month->month == 9) selected @endif @endif value='9'>October</option>
                        <option @if($month) @if($month->month == 10) selected @endif @endif value='10'>November</option>
                        <option @if($month) @if($month->month == 11) selected @endif @endif value='11'>December</option>
                        </select>
                        <label for="lead-manager">Select Month</label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <button class="btn btn-primary btn-lg btn-theme btn-block ripple" type="submit">Save Settings</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
   $(document).ready(function() {
   setTimeout(function(){$('.alert-success').slideUp();},3000); 
   }); 
</script>                    
@endsection