
<div class="aside">
    <div class="d-flex flex-column flex-shrink-0" style="width: 100%; height: 89vh;">
        <ul class="mb-auto text-center sidebar align-items-center mx-auto text-center" id="navbarSupportedContent">
            <li>
                <a href="{{url('/dashboard/organizations')}}" @if (url()->current() == url('dashboard/organizations')) class="active-link" @else class="nav-link"  @endif  aria-current="page" title="" data-toggle="tooltip" data-placement="right" data-original-title="Dashboard">
                    <span class="material-symbols-outlined">home</span>
                </a>
            </li>
        
            <li>
                <a href="{{url('dashboard/organization/Business-Units')}}"  @if (url()->current() == url('dashboard/organization/Business-Units')) class="active-link" @else class="nav-link"  @endif  data-toggle="tooltip" data-placement="right" data-original-title=" Business Units">
                    <span class="material-symbols-outlined">domain</span>
                </a>
            </li>
            <!-- <li class="buttonClick">
                <a href="#" data-toggle="tooltip" data-placement="right" data-original-title="Search">
                    <span class="material-symbols-outlined">search</span>
                </a>
            </li> -->
            
            <!-- <li>
                <a href="{{url('dashboard/organization/contacts')}}" @if (url()->current() == url('dashboard/organization/contacts')) class="active-link" @else class="nav-link"  @endif  title="" data-toggle="tooltip" data-placement="right" data-original-title="Contacts">
                    <span class="material-symbols-outlined">perm_contact_calendar</span>
                </a>
            </li> -->

            <li>
                <a href="#"  class="nav-link"  title="" data-toggle="tooltip" data-placement="right" data-original-title="OKR Mapper">
                    <span class="material-symbols-outlined">action_key</span>
                </a>
            </li>

            <li>
                <a href="{{url('dashboard/organization/users')}}" @if (url()->current() == url('dashboard/organization/users')) class="active-link" @else class="nav-link"  @endif title="" data-toggle="tooltip" data-placement="right" data-original-title="Users">
                    <span class="material-symbols-outlined">group</span>
                </a>
            </li>

        </ul>
        <div class="align-items-center mx-auto mb-3 text-center">
            <ul class="bottom-bar">
                <!-- <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" data-original-title="Chat">
                        <span class="material-symbols-outlined">chat_bubble</span>
                    </a>
                </li> -->
                <li>
                    <a href="{{url('dashboard/organization/setting')}}" @if (url()->current() == url('dashboard/organization/setting')) class="active-link" @else class="nav-link"  @endif title="" data-toggle="tooltip" data-placement="right" data-original-title="Settings">
                        <span class="material-symbols-outlined">settings</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#" class="icon" data-toggle="tooltip" data-placement="right" data-original-title="Chooe Theme">
                        <span class="material-symbols-outlined">brush</span>
                    </a>
                </li> -->
            </ul>

            <div class="mt-2 dropup">
                <img src="https://t4.ftcdn.net/jpg/02/14/74/61/360_F_214746128_31JkeaP6rU0NzzzdFC4khGkmqc8noe6h.jpg" class="dropdown-toggle fixbar-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu mb-5">
                    <a class="dropdown-item" href="{{url('profile-setting')}}">Profile</a>
                    <a class="dropdown-item" href="{{url('change-password')}}">Security</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-primary text-white" href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                  </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @include('member.sub-nav')

</div>