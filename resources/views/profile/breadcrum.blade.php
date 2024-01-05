@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->first();
@endphp
<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
              @if(url()->current() == url('change-password')) Change Password @endif
              @if(url()->current() == url('profile-setting')) My Profile @endif
            </h5>
            <div class="d-flex flex-row page-sub-titles">
                <div class="mr-2">
                    <a href="{{route('home')}}">Dashboard</a>
                </div>
                <div class="mr-2">
                    <p>@if(url()->current() == url('change-password')) Change Password @endif @if(url()->current() == url('profile-setting')) My Profile @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>