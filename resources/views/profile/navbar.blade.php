@php
$organization = DB::table('organization')->where('user_id',Auth::id())->where('trash',NULL)->first();
$data = array();
if(Auth::user()->invitation_id == '')
{
 $data = DB::table('user_plan')->where('user_id',Auth::id())->first();
 $user = Auth::user();
$invoices = $user->invoicesIncludingPending();    
}




@endphp
<h6 class="mt-3 mb-3">Settings</h6>

<div class="menu-item">
    <a href="{{ route('settings.myprofile') }}" class="menu-link @if (url()->current() == route('settings.myprofile'))  active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">person</span>
        </span>
        <span class="menu-title">My Profile</span>
    </a>
</div>
@if(Auth::user()->invitation_id == '')
<div class="menu-item">
    <a href="{{ route('settings.jirasettings') }}"  class="menu-link @if (url()->current() == route('settings.jirasettings')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">manufacturing</span>
        </span>
        <span class="menu-title">Jira Setting</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{ route('settings.financial') }}"  class="menu-link @if (url()->current() == route('settings.financial')) active  @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">payments</span>
        </span>
        <span class="menu-title">Financial Year </span>
    </a>
</div>
<div class="menu-item">
    <a href="{{route('settings.users')}}"  class="menu-link @if (url()->current() == route('settings.users'))  active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">group_add</span>
        </span>
        <span class="menu-title">All Users</span>
    </a>
</div>
<div class="menu-item">
    <a href="{{route('settings.asignmodule')}}"  class="menu-link @if (url()->current() == route('settings.asignmodule')) active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">foundation</span>
        </span>
        <span class="menu-title">Asign Names</span>
    </a>
</div>
@endif
<div class="menu-item">
    <a href="{{route('settings.security')}}"  class="menu-link @if (url()->current() == route('settings.security'))  active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">key</span>
        </span>
        <span class="menu-title">Change Password</span>
    </a>
</div>
@if($data)
@if($data->transaction_id != '')
<div class="menu-item">
    <a href="{{route('settings.subscription')}}"  class="menu-link @if (url()->current() == route('settings.subscription'))  active @endif">
        <span class="menu-icon">
            <span class="material-symbols-outlined">subscriptions</span>
        </span>
        <span class="menu-title">Subscription</span>
    </a>
</div>
@endif
@endif

<div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
      <span class="menu-bullet">
        <span class="material-symbols-outlined">
            payments
            </span>
      </span>
      <span class="menu-title">Invoice Manager</span>
    
    </span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion" kt-hidden-height="85" style="display: none; overflow: hidden;">
      <!--begin:Menu item-->
      <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
        <!--begin:Menu link-->
        <span class="menu-link">
          <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
          </span>
          <span class="menu-title">View Invoices</span>
          <span class="menu-arrow"></span>
        </span>
   
        <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="127" style="display: none; overflow: hidden;">
        @foreach ($invoices as $key =>  $invoice)
          <div class="menu-item">
  
            <a class="menu-link" href="{{url('user/invoice/'.$invoice->id)}}">
              <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
              </span>
              <span class="menu-title">Invoice {{$key + 1}}</span>
            </a>
          
          </div>
          @endforeach
         
        </div>
   
      </div>
   
    </div>

  </div>