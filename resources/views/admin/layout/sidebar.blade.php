<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{url('/dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">@lang('site.Woudyan') </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Page -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__("site.dashboard")}}</span>
        </li>
        <li class="menu-item {{ Route::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin') }}" class="menu-link">
                <i class="fa-solid fa-house ms-1 me-3"></i>
                <div>{{ __('site.home') }}</div>
            </a>
        </li>

        @if (auth()->user()->hasPermission('roles-read'))
        <li class="menu-item {{ Route::is('roles.*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="fa-solid fa-pen-to-square ms-1 me-3"></i>
                <div>{{ __('site.roles') }}</div>
            </a>
        </li>
        @endif
        <li class="menu-item {{ Route::is('volunteers.*') || Route::is('admins.*') || Route::is('doners.*') ? 'open' : '' }}"
            style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid fa-user ms-1 me-3"></i>
                <div data-i18n="{{ __('site.users') }}">{{ __('site.users') }}</div>
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->hasPermission('volunteers-read'))
                <li class="menu-item {{ Route::is('volunteers.*') ? 'active' : '' }}">
                    <a href="{{ route('volunteers.index') }}" class="menu-link">
                        <div>{{ __('site.volunteers') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('admins-read'))
                <li class="menu-item {{ Route::is('admins.*') ? 'active' : '' }}">
                    <a href="{{ route('admins.index') }}" class="menu-link">
                        <div>{{ __('site.admins') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('doners-read'))
                <li class="menu-item {{ Route::is('doners.*') ? 'active' : '' }}">
                    <a href="{{ route('doners.index') }}" class="menu-link">
                        <div>{{ __('site.doners') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__("site.important")}}</span>
        </li>


        <li class="menu-item {{ Route::is('cases.*') || Route::is('categoriesCases.*') ? 'open' : '' }}" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid fa-hands-holding-child ms-1 me-3"></i>
                <div data-i18n="{{ __('site.cases') }}">{{ __('site.cases') }}</div>
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->hasPermission('categoriesCases-read'))
                <li class="menu-item {{ Route::is('categoriesCases.*') ? 'active' : '' }}">
                    <a href="{{ route('categoriesCases.index') }}" class="menu-link">
                        <div>{{ __('site.category_cases') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('cases-read'))
                <li class="menu-item {{ Route::is('cases.*') && request()->query('status') == null ? 'active' : '' }}">
                    <a href="{{ route('cases.index') }}" class="menu-link">
                        <div>{{ __('site.allCases') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cases.index') && request()->query('status') == 'need' ? 'active' : '' }}">
                    <a href="{{ route('cases.index', ['status' => 'need']) }}" class="menu-link">
                        <div>{{ __('site.cases_need') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cases.index') && request()->query('status') == 'repeating' ? 'active' : '' }}">
                    <a href="{{ route('cases.index',['status'=>'repeating']) }}" class="menu-link">
                        <div>{{ __('site.repeating_cases') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cases.index') && request()->query('status') == 'ending' ? 'active' : '' }}">
                    <a href="{{ route('cases.index',['status'=>'ending']) }}" class="menu-link">
                        <div>{{ __('site.comming_to_end') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cases.index') && request()->query('status') == 'archive' ? 'active' : '' }}">
                    <a href="{{ route('cases.index', ['status'=>'archive']) }}" class="menu-link">
                        <div>{{ __('site.archive_cases') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cases.index') && request()->query('status') == 'finish' ? 'active' : '' }}">
                    <a href="{{ route('cases.index', ['status'=>'finish']) }}" class="menu-link">
                        <div>{{ __('site.finish_cases') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cases.index') && request()->query('status') == 'expire' ? 'active' : '' }}">
                    <a href="{{ route('cases.index', ['status'=>'expire']) }}" class="menu-link">
                        <div>{{ __('site.expire_cases') }}</div>
                    </a>
                </li>
                @endif


            </ul>
        </li>



        <li class="menu-item {{ Route::is('transfers.*') || Route::is('donations.*') || Route::is('purchases.*') ? 'open' : '' }}"
            style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid fa-money-bill-transfer ms-1 me-3"></i>
                <div data-i18n="{{ __('site.process') }}">{{ __('site.process') }}</div>
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->hasPermission('transfers-read'))
                <li class="menu-item {{ Route::is('transfers.*') ? 'active' : '' }}">
                    <a href="{{ route('transfers.index') }}" class="menu-link">
                        <div>{{ __('site.transefers') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('donations-read'))
                <li class="menu-item {{ Route::is('donations.*') ? 'active' : '' }}">
                    <a href="{{ route('donations.index') }}" class="menu-link">
                        <div>{{ __('site.donations') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('purchases-read'))
                <li class="menu-item {{ Route::is('purchases.*') ? 'active' : '' }}">
                    <a href="{{ route('purchases.index') }}" class="menu-link">
                        <div>{{ __('site.purchases') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>


        <li class="menu-item {{ Route::is('items.*') || Route::is('categories.*') ? 'open' : '' }}" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid fa-sitemap ms-1 me-3"></i>
                <div data-i18n="{{ __('site.items') }}">{{ __('site.items') }}</div>
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->hasPermission('items-read'))
                <li class="menu-item {{ Route::is('items.*') ? 'active' : '' }}">
                    <a href="{{ route('items.index') }}" class="menu-link">
                        <div>{{ __('site.items') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('categories-read'))
                <li class="menu-item {{ Route::is('categories.*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="menu-link">
                        <div>{{ __('site.categories') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>

        @if (auth()->user()->hasPermission('payments-read'))
        <li class="menu-item {{ Route::is('payments.*') ? 'active' : '' }}">
            <a href="{{ route('payments.index') }}" class="menu-link">
                <i class="fa-solid fa-credit-card ms-1 me-3"></i>
                <div>{{ __('site.payments') }}</div>
            </a>
        </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__("site.address")}}</span>
        </li>



        <li class="menu-item {{ Route::is('cities.*') || Route::is('regions.*') ? 'open' : '' }}" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid fa-map-location-dot ms-1 me-3"></i>
                <div data-i18n="{{ __('site.address') }}">{{ __('site.address') }}</div>
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->hasPermission('cities-read'))
                <li class="menu-item {{ Route::is('cities.*') ? 'active' : '' }}">
                    <a href="{{ route('cities.index') }}" class="menu-link">
                        <div>{{ __('site.cities') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('regions-read'))
                <li class="menu-item {{ Route::is('regions.*') ? 'active' : '' }}">
                    <a href="{{ route('regions.index') }}" class="menu-link">
                        <div>{{ __('site.regions') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>



        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__("site.application")}}</span>
        </li>

        @if (auth()->user()->hasPermission('storage-read'))
        <li class="menu-item {{ Route::is('storage.*') ? 'active' : '' }}">
            <a href="{{ route('storage.info') }}" class="menu-link">
                <i class="fa-solid fa-database ms-1 me-3"></i>
                <div>{{ __('site.storage') }}</div>
            </a>
        </li>
        @endif





        @if (auth()->user()->hasPermission('sliders-read'))
        <li class="menu-item {{ Route::is('sliders.*') ? 'active' : '' }}">
            <a href="{{ route('sliders.index') }}" class="menu-link">
                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-slideshow">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l.01 0" />
                    <path d="M3 3m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                    <path d="M3 13l4 -4a3 5 0 0 1 3 0l4 4" />
                    <path d="M13 12l2 -2a3 5 0 0 1 3 0l3 3" />
                    <path d="M8 21l.01 0" />
                    <path d="M12 21l.01 0" />
                    <path d="M16 21l.01 0" />
                </svg>
                <div>{{ __('site.sliders') }}</div>
            </a>
        </li>
        @endif

        @if (auth()->user()->hasPermission('impacts-read'))
        <li class="menu-item {{ Route::is('impacts.*') ? 'active' : '' }}">
            <a href="{{ route('impacts.index') }}" class="menu-link">
                <i class="fa-solid fa-users-rays ms-1 me-3"></i>
                <div>{{ __('site.impacts') }}</div>
            </a>
        </li>
        @endif


        @if (auth()->user()->hasPermission('pages-read'))
        <li class="menu-item {{ Route::is('pages.*') ? 'active' : '' }}">
            <a href="{{ route('pages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-hand-stop"></i>
                <div>{{ __('site.pages') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('faqs-read'))
        <li class="menu-item {{ Route::is('faqs.*') ? 'active' : '' }}">
            <a href="{{ route('faqs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div>{{ __('site.faqs') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('messages-read'))
        <li class="menu-item {{ Route::is('messages.*') ? 'active' : '' }}">
            <a href="{{ route('messages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div>{{ __('site.messages') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->hasPermission('notifications-read'))
        <li class="menu-item {{ Route::is('notifications.*') ? 'active' : '' }}">
            <a href="{{ route('notifications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div>{{ __('site.notifications') }}</div>
            </a>
        </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__("site.translations")}}</span>
        </li>

        <li class="menu-item {{ Route::is('translations.*') ? 'active' : '' }}">
            <a href="{{ route('translations') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div>{{ __('site.translations') }}</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('clear.cache') ? 'active' : '' }}">
            <a href="{{ route('clear.cache') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-refresh"></i>
                <div>{{ __('site.clear_cache') }}</div>
            </a>
        </li>


    </ul>
</aside>
<!-- / Menu -->
