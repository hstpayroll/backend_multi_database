<body>
    <div class="page" id="app">
        <!-- Main Navbar-->
        <header class="header z-index-50">
            <nav class="navbar py-3 px-0 shadow-sm text-white position-relative">
                <!-- Search Box-->
                <div class="search-box shadow-sm">
                    <button class="dismiss d-flex align-items-center">
                        <svg class="svg-icon svg-icon-heavy">
                            <use xlink:href="#close-1"> </use>
                        </svg>
                    </button>
                    <form id="searchForm" action="#" role="search">
                        <input class="form-control shadow-0" type="text" placeholder="What are you looking for...">
                    </form>
                </div>
                {{-- end of search --}}
                <div class="container-fluid w-100">
                    <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand -->
                            <a class="navbar-brand d-none d-sm-inline-block" href="#">
                                <div class="brand-text d-none d-lg-inline-block"><strong>HST</strong></div>
                                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>HST</strong></div>
                            </a>
                            <a class="menu-btn active" id="toggle-btn"
                                href="#"><span></span><span></span><span></span>
                            </a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="{{ route('home') }}"> </use>
                                    </svg></a></li>
                            <!-- Notifications-->
                            <li class="nav-item dropdown"> <a class="nav-link text-white" id="notifications"
                                    href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#chart-1"> </use>
                                    </svg><span class="badge bg-red badge-corner fw-normal">12</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm"
                                    aria-labelledby="notifications">
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-blue">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#envelope-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have
                                                        6 new messages </span><small class="small text-gray-600">4
                                                        minutes ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-green">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#chats-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                        WhatsApp messages</span><small class="small text-gray-600">4
                                                        minutes ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-orange">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#checked-window-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server
                                                        Rebooted</span><small class="small text-gray-600">8 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-green">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#chats-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                        WhatsApp messages</span><small class="small text-gray-600">10
                                                        minutes ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item all-notifications text-center" href="#"> <strong
                                                class="text-xs text-gray-600">view all notifications </strong></a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                    <span class="d-none d-sm-inline">{{ __('Logout') }}
                                    </span><svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#security-1"> </use>
                                    </svg></a></li>
                            </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
