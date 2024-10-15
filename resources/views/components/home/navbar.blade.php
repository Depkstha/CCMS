@props(['title' => 'Dashboard'])
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        {{ $title }}
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">
                        <button class="ic-theme-mode" type="button">
                            <span class="light"><i
                                    class="fa-regular fa-sun align-middle fs-20 text-muted"></i></i></span>
                            <span class="dark"><i class="fa-regular fa-moon align-middle fs-20 text-muted"></i></span>
                        </button>
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z"
                                    fill="#717579" />
                                <path
                                    d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z"
                                    fill="#717579" />
                            </svg>

                            <span class="badge text-white badge-primary">16</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div id="DZ_W_Notification1" class="widget-media ic-scroll p-3" style="height:380px;">
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                <img alt="image" width="50"
                                                    src="{{ asset('assets/images/avatar/avatar.png') }}">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-info">
                                                KG
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Resport created successfully</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-success">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                <img alt="image" width="50" src="images/avatar/1.jpg">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-danger">
                                                KG
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Resport created successfully</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-primary">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a class="all-notification" href="javascript:void(0);">See all notifications <i
                                    class="ti-arrow-end"></i></a>
                        </div>
                    </li>

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('assets/images/avatar/avatar.png') }}" width="20" alt>
                            <div class="header-info ms-3">
                                <span class="fs-14 font-w600 mb-0">{{ auth()->user()->name }}</span>
                            </div>
                            <svg class="ms-4 mt-1 h-line" width="12" height="10" viewBox="0 0 12 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="0.5" width="12" height="1" fill="white" />
                                <rect y="4.5" width="12" height="1" fill="white" />
                                <rect y="8.5" width="12" height="1" fill="white" />
                            </svg>

                        </a>
                        <div class="profile-detail card">
                            <div class="card-body p-0">
                                <div class="d-flex profile-media justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/avatar/avatar.png') }}">
                                        <div class="ms-3">
                                            <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                                            <p>{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                    <a href="edit-profile.html">
                                        <div class="icon-box">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.379 8.44975L8.96409 17.8648C8.68489 18.144 8.32929 18.3343 7.9421 18.4117L5.00037 19.0001L5.58872 16.0583C5.66615 15.6711 5.85646 15.3155 6.13565 15.0363L15.5506 5.62132M18.379 8.44975L19.7932 7.03553C20.1837 6.64501 20.1837 6.01184 19.7932 5.62132L18.379 4.20711C17.9885 3.81658 17.3553 3.81658 16.9648 4.20711L15.5506 5.62132M18.379 8.44975L15.5506 5.62132"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                                <div class="media-box">
                                    <ul class="d-flex flex-colunm gap-2 flex-wrap">
                                        <li>
                                            <a href="app-profile.html">
                                                <div class="icon-box-lg">
                                                    <svg width="40" height="40" viewBox="0 0 40 40"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 20C5 11.7157 11.7157 5 20 5C28.2843 5 35 11.7157 35 20C35 28.2843 28.2843 35 20 35C11.7157 35 5 28.2843 5 20Z"
                                                            fill="white" fill-opacity="0.25" />
                                                        <circle cx="19.9997" cy="16.6667" r="6.66667"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M30.4335 30.5196C30.4904 30.6167 30.4727 30.7398 30.3915 30.8178C27.6957 33.4079 24.034 35 20.0004 35C15.9668 35 12.3051 33.4079 9.60933 30.8179C9.52818 30.7399 9.51048 30.6169 9.56735 30.5198C11.4843 27.2465 15.4363 25 20.0005 25C24.5645 25 28.5165 27.2464 30.4335 30.5196Z"
                                                            fill="white" />
                                                    </svg>
                                                    <p>Profile</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <div class="icon-box-lg">
                                                    <svg width="40" height="40" viewBox="0 0 40 40"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.25"
                                                            d="M28.6325 11.2111L16.3162 7.10573C15.6687 6.88989 15 7.37186 15 8.05442V31.9462C15 32.6288 15.6687 33.1108 16.3162 32.8949L28.6325 28.7895C29.4491 28.5173 30 27.753 30 26.8921V13.1085C30 12.2476 29.4491 11.4834 28.6325 11.2111Z"
                                                            fill="white" />
                                                        <path
                                                            d="M19.1663 15.833L23.333 19.9997M23.333 19.9997L19.1663 24.1663M23.333 19.9997H6.66634"
                                                            stroke="white" stroke-linecap="round" />
                                                    </svg>
                                                    <p>Logout</p>
                                                </div>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
