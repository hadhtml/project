@php
$organization  = DB::table('organization')->where('user_id',Auth::id())->first();
@endphp
<div class="subheader subheader-solid breadcrums" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-start flex-column flex-wrap mr-2">
            <div class="d-flex flex-row align-items-center">
                <div>
                    @if(url()->current() == route('settings.security'))
                    <span style="font-size:22px" class="material-symbols-outlined">key</span>
                    @endif
                    @if(url()->current() == route('settings.myprofile'))
                    <span style="font-size:22px" class="material-symbols-outlined">person</span>
                    @endif                    
                </div>
                <div class="ml-3">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                      @if(url()->current() == route('settings.security')) Change Password @endif
                      @if(url()->current() == route('settings.myprofile')) My Profile @endif
                    </h5>
                </div>
            </div>
            <div class="d-flex flex-row page-sub-titles align-items-center">
                <div class="mr-2">
                    <a href="{{url('organization/dashboard')}}">Dashboard</a>
                </div>
                <div class="mr-2">
                    <p>@if(url()->current() == route('settings.security')) Change Password @endif @if(url()->current() == route('settings.myprofile')) My Profile @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>
