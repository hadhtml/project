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
         <a href="{{ route('settings.myprofile') }}" @if (url()->current() == route('settings.myprofile'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">person</span>
         </div>
         <div class="mr-2">
            My Profile
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{ route('settings.jirasettings') }}" @if (url()->current() == route('settings.jirasettings')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">manufacturing</span>
         </div>
         <div class="mr-2">
            Jira Setting
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{ route('settings.financial') }}" @if (url()->current() == route('settings.financial')) class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center"  @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">payments</span>
         </div>
         <div class="mr-2">
            Financial Year 
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{route('settings.users')}}" @if (url()->current() == route('settings.users'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif>
         <div class="mr-2">
            <span style="font-size:22px" class="material-symbols-outlined">group_add</span>
         </div>
         <div class="mr-2">
            All Users
         </div>
         </a>
      </li>
      <li class="mb-1">
         <a href="{{route('settings.security')}}" @if (url()->current() == route('settings.security'))  class="d-flex flex-row align-items-center nav-active" @else class="d-flex flex-row align-items-center" @endif>
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