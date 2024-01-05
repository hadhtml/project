@php
$organization = DB::table('organization')->where('user_id',Auth::id())->where('trash',NULL)->first();    
@endphp
<div class="flex-shrink-0 p-3 bg-white sub-nav open" id="panel">
   {{-- <button id="closeBtn" class="close-button">
   <img src="https://dev.agileprolific.com/public/assets/images/icons/collaps.svg">
   </button> --}}
   <h6 class="title">Settings</h6>
   <ul class="list-unstyled ps-0 expanded-navbar-options">
      <li class="mb-1">
         <a href="{{url('profile-setting')}}" @if (url()->current() == url('profile-setting'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">person</span>
         </div>
         <div class="mr-2">
            My Profile
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{url('dashboard/organization/setting')}}" @if (url()->current() == url('dashboard/organization/setting')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">manufacturing</span>
         </div>
         <div class="mr-2">
            Jira Setting
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{url('dashboard/organization/setting/financial')}}" @if (url()->current() == url('dashboard/organization/setting/financial')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">payments</span>
         </div>
         <div class="mr-2">
            Financial Year Setting 
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{url('dashboard/organization/users')}}" @if (url()->current() == url('dashboard/organization/users'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">group_add</span>
         </div>
         <div class="mr-2">
            All Users
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{url('change-password')}}" @if (url()->current() == url('change-password'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">key</span>
         </div>
         <div class="mr-2">
            Change Password
         </div>
         </a>
      </li>
      <!-- <li class="mb-1">
         <a href="#" class="d-flex flex-row align-items-center">
             <div class="mr-2">
                  <span style="font-size:22px" class="material-symbols-outlined">sprint</span>
             </div>
             <div class="mr-2">
                 Leadership Actions
             </div>
         </a>
         </li>
         <li class="mb-1">
         <a href="#" class="d-flex flex-row align-items-center">
             <div class="mr-2">
                 <span style="font-size:22px" class="material-symbols-outlined">dangerous</span>
             </div>
             <div class="mr-2">
                 Blockers
             </div>
             <div>
                 <span class="badge btn-circle-xs badge-warning text-sm">10+</span>
             </div>
         </a>
         </li> -->
   </ul>
</div>