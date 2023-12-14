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
            <li class="buttonClick">
                <a href="#" data-toggle="tooltip" data-placement="right" data-original-title="Search">
                    <span class="material-symbols-outlined">search</span>
                </a>
            </li>
            <li>
                <a href="{{url('dashboard/organization/users')}}" @if (url()->current() == url('dashboard/organization/users')) class="active-link" @else class="nav-link"  @endif title="" data-toggle="tooltip" data-placement="right" data-original-title="Users">
                    <span class="material-symbols-outlined">group</span>
                </a>
            </li>
            <li>
                <a href="{{url('dashboard/organization/contacts')}}" @if (url()->current() == url('dashboard/organization/contacts')) class="active-link" @else class="nav-link"  @endif  title="" data-toggle="tooltip" data-placement="right" data-original-title="Contacts">
                    <span class="material-symbols-outlined">perm_contact_calendar</span>
                </a>
            </li>

            <li>
                <a href="#" @if (url()->current() == url('dashboard/organization/users')) class="active-link" @else class="nav-link"  @endif title="" data-toggle="tooltip" data-placement="right" data-original-title="OKR Mapping">
                    <span class="material-symbols-outlined">action_key</span>
                </a>
            </li>



        </ul>
        <div class="align-items-center mx-auto mb-3 text-center">
            <ul class="bottom-bar">
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" data-original-title="Chat">
                        <span class="material-symbols-outlined">chat_bubble</span>
                    </a>
                </li>
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
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Security</a>
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
</div>




<div class="flex-shrink-0 p-3 bg-white sub-nav" id="panel" style="width: 230px; margin-top: 5%;">
    <button id="closeBtn" class="close-button">
        <img src="https://dev.agileprolific.com/public/assets/images/icons/collaps.svg">
    </button>
    <h6 class="title">Menu</h6>
    <ul class="list-unstyled ps-0 expanded-navbar mb-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded" data-toggle="collapse" data-target="#home-collapse" aria-expanded="true">
                <div class="d-flex flex-row align-items-center">
                    <div class="mr-2">
                        <span style="font-size:20px" class="material-symbols-outlined">storefront</span>
                    </div>
                    <div>
                        Business Units
                    </div>
                </div>
            </button>
            <div class="collapse" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-1 py-2 nav-root-item">
                    <li><a href="#" class="link-dark rounded">Business Unit name</a></li>
                    <li><a href="#" class="link-dark rounded">Business Unit name</a></li>
                    <li><a href="#" class="link-dark rounded">Business Unit name</a></li>
                    <li><a href="#" class="link-dark rounded">Business Unit name</a></li>
                </ul>
            </div>
        </li>
    </ul>

    <ul class="list-unstyled ps-0 expanded-navbar-options">
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span style="font-size:20px" class="material-symbols-outlined">layers</span>
                </div>
                <div class="mr-2">
                    About
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span style="font-size:20px" class="material-symbols-outlined">layers</span>
                </div>
                <div class="mr-2">
                    Value Streams
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:20px" class="material-symbols-outlined">map</span>
                </div>
                <div class="mr-2">
                    OKR Mapper
                </div>
            </a>
        </li>
        <!-- Portfolio -->
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:20px" class="material-symbols-outlined">planner_review</span>
                </div>
                <div class="mr-2">
                    OKR Planner
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:20px" class="material-symbols-outlined">key_visualizer</span>
                </div>
                <div class="mr-2">
                    Epic Backlog
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span style="font-size:20px" class="material-symbols-outlined">warning_off</span>
                </div>
                <div class="mr-2">
                    Impediments
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                     <span style="font-size:20px" class="material-symbols-outlined">escalator_warning</span>
                </div>
                <div class="mr-2">
                    Leadership Actions
                </div>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="d-flex flex-row align-items-center">
                <div class="mr-2">
                    <span style="font-size:20px" class="material-symbols-outlined">dangerous</span>
                </div>
                <div class="mr-2">
                    Blockers
                </div>
            </a>
        </li>
    </ul>
</div>