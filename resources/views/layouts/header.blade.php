<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <a
                    href="
                @isset(Auth::user()->role) @if (Auth::user()->role != null && Auth::user()->role == 'admin')
                    {{ route('admin.managementUser') }}
                @else
                    {{ route('index') }} @endif
                @endisset
                
                ">DEMO</a>
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            @if (isset(Auth::User()->name))
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('mau/assets/img/avatars/' . Auth::User()->avata) }}" alt
                                class="w-px-40 h-px-40 rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('mau/assets/img/avatars/' . Auth::User()->avata) }}" alt
                                                class="w-px-40 h-px-40 rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::User()->name }}</span>
                                        <small class="text-muted">{{ Auth::User()->role }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('user.profile', ['id' => Auth::id()]) }}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('user.checkLogout') }}">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item lh-1 me-3">
                    <a href="{{ route('login') }}" class="btn rounded-pill btn-secondary">
                        <i class='tf-icons bx bx-user'></i>&nbsp; Login
                    </a>
                </li>
            @endif

            <!-- User -->

            <!--/ User -->
        </ul>
    </div>
</nav>
