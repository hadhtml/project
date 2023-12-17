
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
           <li>
                <a href="{{url('dashboard/organization/contacts')}}" @if (url()->current() == url('dashboard/organization/contacts')) class="active-link" @else class="nav-link"  @endif  title="" data-toggle="tooltip" data-placement="right" data-original-title="Contacts">
                    <span class="material-symbols-outlined">perm_contact_calendar</span>
                </a>
            </li>
            
         <!--    <li >
                  <a href="{{url('dashboard/organization/'.$organization->slug.'/Value-Streams')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/Value-Streams')) class="nav-link active" @else   @endif  class="nav-link" data-toggle="tooltip" data-placement="right" data-original-title="Value Streams">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.3697 4.89012L13.5097 2.28012C12.6497 1.90012 11.3497 1.90012 10.4897 2.28012L4.62969 4.89012C3.14969 5.55012 2.92969 6.45012 2.92969 6.93012C2.92969 7.41012 3.14969 8.31012 4.62969 8.97012L10.4897 11.5801C10.9197 11.7701 11.4597 11.8701 11.9997 11.8701C12.5397 11.8701 13.0797 11.7701 13.5097 11.5801L19.3697 8.97012C20.8497 8.31012 21.0697 7.41012 21.0697 6.93012C21.0697 6.45012 20.8597 5.55012 19.3697 4.89012Z" fill="#787878"/>
                        <path opacity="0.4" d="M12.0003 17.04C11.6203 17.04 11.2403 16.96 10.8903 16.81L4.15031 13.81C3.12031 13.35 2.32031 12.12 2.32031 10.99C2.32031 10.58 2.65031 10.25 3.06031 10.25C3.47031 10.25 3.80031 10.58 3.80031 10.99C3.80031 11.53 4.25031 12.23 4.75031 12.45L11.4903 15.45C11.8103 15.59 12.1803 15.59 12.5003 15.45L19.2403 12.45C19.7403 12.23 20.1903 11.54 20.1903 10.99C20.1903 10.58 20.5203 10.25 20.9303 10.25C21.3403 10.25 21.6703 10.58 21.6703 10.99C21.6703 12.11 20.8703 13.35 19.8403 13.81L13.1003 16.81C12.7603 16.96 12.3803 17.04 12.0003 17.04Z" fill="#787878"/>
                        <path opacity="0.4" d="M12.0003 22C11.6203 22 11.2403 21.92 10.8903 21.77L4.15031 18.77C3.04031 18.28 2.32031 17.17 2.32031 15.95C2.32031 15.54 2.65031 15.21 3.06031 15.21C3.47031 15.21 3.80031 15.54 3.80031 15.95C3.80031 16.58 4.17031 17.15 4.75031 17.41L11.4903 20.41C11.8103 20.55 12.1803 20.55 12.5003 20.41L19.2403 17.41C19.8103 17.16 20.1903 16.58 20.1903 15.95C20.1903 15.54 20.5203 15.21 20.9303 15.21C21.3403 15.21 21.6703 15.54 21.6703 15.95C21.6703 17.17 20.9503 18.27 19.8403 18.77L13.1003 21.77C12.7603 21.92 12.3803 22 12.0003 22Z" fill="#787878"/>
                        </svg>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" data-original-title="Backlog">
                <a href="{{url('dashboard/organization/'.$organization->slug.'/BU-Backlog')}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/BU-Backlog')) class="nav-link active" @else class="nav-link"  @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                      <path opacity="0.4" d="M18.0606 3.5H8.77398C4.74898 3.5 2.33398 5.90333 2.33398 9.94V19.215C2.33398 23.2633 4.74898 25.6667 8.77398 25.6667H18.049C22.0857 25.6667 24.489 23.2633 24.489 19.2267V9.94C24.5007 5.90333 22.0856 3.5 18.0606 3.5Z" fill="#787878"/>
                      <path d="M24.5227 3.47683C22.4344 1.37683 20.3927 1.33016 18.2461 3.47683L16.9277 4.78349C16.8111 4.90016 16.7761 5.06349 16.8227 5.21516C17.6394 8.07349 19.9261 10.3602 22.7844 11.1768C22.8194 11.1885 22.8777 11.1885 22.9127 11.1885C23.0294 11.1885 23.1461 11.1418 23.2277 11.0602L24.5227 9.75349C25.5844 8.69182 26.1094 7.67683 26.1094 6.63849C26.1094 5.58849 25.5844 4.55016 24.5227 3.47683Z" fill="#787878"/>
                      <path d="M20.8366 12.1566C20.5216 12.005 20.2183 11.8533 19.9383 11.6783C19.705 11.5383 19.4716 11.3866 19.25 11.2233C19.0633 11.1066 18.8533 10.9316 18.6433 10.7566C18.62 10.745 18.55 10.6866 18.4566 10.5933C18.095 10.3016 17.71 9.90498 17.3483 9.47331C17.325 9.44998 17.255 9.37998 17.1966 9.27498C17.08 9.14665 16.905 8.92498 16.7533 8.67998C16.625 8.51665 16.4733 8.28331 16.3333 8.03831C16.1583 7.74665 16.0066 7.45498 15.8666 7.15165C15.715 6.82498 15.5983 6.52165 15.4933 6.22998L9.21662 12.5066C8.80829 12.915 8.41162 13.685 8.32995 14.2566L7.82829 17.7333C7.72329 18.4683 7.92162 19.1566 8.37662 19.6116C8.76162 19.9966 9.28662 20.195 9.86995 20.195C9.99829 20.195 10.1266 20.1833 10.255 20.1716L13.72 19.6816C14.2916 19.6 15.0616 19.215 15.47 18.795L21.7466 12.5183C21.455 12.425 21.1633 12.2966 20.8366 12.1566Z" fill="#787878"/>
                    </svg>
                </a>
            </li>
            
             <li data-toggle="tooltip" data-placement="right" data-original-title="Performance Dashboard">
                <a href="{{url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)}}" @if (url()->current() == url('dashboard/organization/'.$organization->slug.'/performance-dashboard/'.$organization->type)) class="nav-link active" @else class="nav-link"  @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                      <path d="M25.6673 25.6665H2.33398C1.85565 25.6665 1.45898 25.2698 1.45898 24.7915C1.45898 24.3132 1.85565 23.9165 2.33398 23.9165H25.6673C26.1457 23.9165 26.5423 24.3132 26.5423 24.7915C26.5423 25.2698 26.1457 25.6665 25.6673 25.6665Z" fill="#787878"/>
                      <path d="M11.375 4.66683V25.6668H16.625V4.66683C16.625 3.3835 16.1 2.3335 14.525 2.3335H13.475C11.9 2.3335 11.375 3.3835 11.375 4.66683Z" fill="#787878"/>
                      <path opacity="0.4" d="M3.5 11.6668V25.6668H8.16667V11.6668C8.16667 10.3835 7.7 9.3335 6.3 9.3335H5.36667C3.96667 9.3335 3.5 10.3835 3.5 11.6668Z" fill="#787878"/>
                      <path opacity="0.4" d="M19.834 17.4998V25.6665H24.5007V17.4998C24.5007 16.2165 24.034 15.1665 22.634 15.1665H21.7007C20.3007 15.1665 19.834 16.2165 19.834 17.4998Z" fill="#787878"/>
                    </svg>
            </li>  -->

            <li>
                <a href="#" @if (url()->current() == url('dashboard/organization/users')) class="active-link" @else class="nav-link"  @endif title="" data-toggle="tooltip" data-placement="right" data-original-title="OKR Mapper">
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

    <!-- Include -->

    @include('Business-units.unit-subnav')

</div>