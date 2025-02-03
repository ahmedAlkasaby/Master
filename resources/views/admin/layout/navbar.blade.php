<!-- Navbar -->
<nav class="layout-navbar container-p-y navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class="ti ti-sun me-2"></i>@lang("site.light")</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="ti ti-moon me-2"></i>@lang("site.dark")</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                    <i class="ti ti-language rounded-circle ti-md"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static">
                    @if (Auth::user()->lang=='ar')
                        <li>
                            <a class="dropdown-item " href="{{route('change.lang')}}"  data-text-direction="ltr">
                                <span class="align-middle">English</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item" href="{{route('change.lang')}}" data-text-direction="rtl" >
                                <span class="align-middle">العربيه</span>
                            </a>
                        </li>
                    @endif
                  </ul>
            </li>

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('uploads/'.auth()->user()->image)}}" alt class="h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="{{url("dashboard/profile")}}">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset('uploads/'.auth()->user()->image)}}" alt class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block">{{auth()->user()->name}}</span>
                            <small class="text-muted">{{auth()->user()->role}}</small>
                          </div>
                        </div>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>

                    <li>
                      <a class="dropdown-item" href="{{url("dashboard/profile")}}">
                        <i class="ti ti-user-check me-2 ti-sm"></i>
                        <span class="align-middle">{{ __('site.myprofile') }}</span>
                      </a>
                    </li>
                    <li>
                        <a href="{{route('settings.edit' ,['setting'=>1])}}" class="dropdown-item">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                        <span class="align-middle">{{ __('site.settings') }}</span>
                      </a>
                    </li>
                    @if (auth()->user()->hasPermission('notifications-read'))

                    <li>
                        <a href="{{route('notifications.index')}}" class="dropdown-item">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                        <span class="align-middle">{{ __('site.notifications') }}</span>
                      </a>
                    </li>
                    @endif

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <form method="post" action="{{url("logout")}}">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">{{ __('auth.logout') }}</span>
                            </button>
                        </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
            </ul>
        </ul>


    </div>
</nav>

<!-- / Navbar -->
