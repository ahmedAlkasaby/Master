<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.index') }}" class="app-brand-link">
            {{-- <a href="https://systemira.com" class="app-brand-link"> --}}
            <span class="app-brand-logo demo">
                @include('admin.layouts.image-head')
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Systemira</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- @if ($access_all == 1)  --}}
        <li class="menu-item @if (isset($class) && $class == 'home') active @endif">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Email">{{ __('Home') }}</div>
            </a>
        </li>
        @if (auth()->user()->isAbleTo($access_all_perms))
        <li class="menu-item  @if (isset($class) && $class == 'setting') active @endif">
            <a href="{{ route('admin.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Email">{{ __('Setting') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['roles.index']))
        <li class="menu-item  @if (isset($class) && $class == 'role') active @endif">
            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-components"></i>
                <div data-i18n="Email">{{ __('Roles') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['categories.index']))
        <li class="menu-item  @if (isset($class) && $class == 'category') active @endif">
            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
                <div data-i18n="Email">{{ __('Categories') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['products.index']))
        <li class="menu-item  @if (isset($class) && $class == 'product') active @endif">
            <a href="{{ route('admin.products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                <div data-i18n="Email">{{ __('Products') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['pages.index']))
        <li class="menu-item  @if (isset($class) && $class == 'page') active @endif">
            <a href="{{ route('admin.pages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Email">{{ __('Pages') }}</div>
            </a>
        </li>
        <li class="menu-item  @if (isset($class) && $class == 'page_slider') active @endif">
            <a href="{{ route('admin.pages.index',['type'=>'slider']) }}" class="menu-link">
                <i class="menu-icon tf-icons ti  ti-text-wrap-disabled"></i>
                <div data-i18n="Email">{{ __('Slider') }}</div>
            </a>
        </li>

        <li class="menu-item  @if (isset($class) && $class == 'page_support') active @endif">
            <a href="{{ route('admin.pages.index',['type'=>'support']) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Email">{{ __('Support') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['users.index']))
        <li class="menu-item @if (isset($class) && in_array($class,['admin','delivery','client'])) active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Dashboards">{{ __('Users') }}</div>
                <!-- <div class="badge bg-primary rounded-pill ms-auto">3</div>/ -->
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (isset($class) && $class == 'admin') active @endif">
                    <a href="{{ route('admin.users.index', ['type' => 'admin']) }}" class="menu-link">
                        <div data-i18n="Analytics">{{ __('Users') }}</div>
                    </a>
                </li>
                <li class="menu-item @if (isset($class) && $class == 'client') active @endif">
                    <a href="{{ route('admin.users.index', ['type' => 'client']) }}" class="menu-link">
                        <div data-i18n="CRM">{{ __('Clients') }}</div>
                    </a>
                </li>
                <li class="menu-item @if (isset($class) && $class == 'delivery') active @endif">
                    <a href="{{ route('admin.users.index', ['type' => 'delivery']) }}" class="menu-link">
                        <div data-i18n="CRM">{{ __('Deliveries') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['contacts.index']))
        <li class="menu-item @if (isset($class) && $class == 'contact') active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-mail-opened"></i>
                <div data-i18n="Dashboards">{{ __('Contact Us') }}</div>
                <!-- <div class="badge bg-primary rounded-pill ms-auto">2</div> -->
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (isset($class) && $class == 'contact') active @endif">
                    <a href="{{ route('admin.contacts.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-mail-opened"></i>
                        <div data-i18n="Email">{{ __('List') }}</div>
                    </a>
                </li>
                <li class="menu-item  @if (isset($class) && $class == 'contact_delete') active @endif">
                    <a href="{{ route('admin.contacts.index',['type'=>'delete']) }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-table"></i>
                        <div data-i18n="Email">{{ __('Delete Requests') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['notifications.index']))
        <li class="menu-item @if (isset($class) && $class == 'notification') active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-bell"></i>
                <div data-i18n="Dashboards">{{ __('Notifications') }}</div>
                <!-- <div class="badge bg-primary rounded-pill ms-auto">2</div> -->
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (isset($class) && $class == 'notification_create') active @endif">
                    <a href="{{ route('admin.notifications.create') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-bell"></i>
                        <div data-i18n="Email">{{ __('Create Notification') }}</div>
                    </a>
                </li>
                <li class="menu-item  @if (isset($class) && $class == 'notification') active @endif">
                    <a href="{{ route('admin.notifications.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-table"></i>
                        <div data-i18n="Email">{{ __('All Notifications') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="menu-item">
            <a href="{{ route('admin.calendar') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Calendar">{{ __('Calendar') }}</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Components">Components</span>
        </li>
        @if (auth()->user()->isAbleTo(['cities.index', 'regions.index']))
        <li class="menu-item @if (isset($class) && ($class == 'city' || $class == 'region')) active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-building"></i>
                <div data-i18n="Dashboards">{{ __('Cities') }}</div>
                <!-- <div class="badge bg-primary rounded-pill ms-auto">2</div> -->
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->isAbleTo(['cities.index']))
                <li class="menu-item @if (isset($class) && $class == 'city') active @endif"">
            <a href=" {{ route('admin.cities.index') }}" class="menu-link">
                    <div data-i18n="Analytics">{{ __('Cities') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->isAbleTo(['regions.index']))
                <li class="menu-item @if (isset($class) && $class == 'region') active @endif">
                    <a href="{{ route('admin.regions.index') }}" class="menu-link">
                        <div data-i18n="CRM">{{ __('Regions') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if (auth()->user()->isAbleTo(['branches.index']))
        <li class="menu-item  @if (isset($class) && $class == 'branch') active @endif">
            <a href="{{ route('admin.branches.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                <div data-i18n="Email">{{ __('Branches') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['groups.index']))
        <li class="menu-item  @if (isset($class) && $class == 'group') active @endif">
            <a href="{{ route('admin.groups.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-forms"></i>
                <div data-i18n="Email">{{ __('Groups') }}</div>
            </a>
        </li>
        @endif

        @if (auth()->user()->isAbleTo(['orders.index', 'order_rejects.index']))
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Dashboards">{{ __('Orders') }}</div>
                <!-- <div class="badge bg-primary rounded-pill ms-auto">2</div> -->
            </a>
            <ul class="menu-sub">
                @if (auth()->user()->isAbleTo(['orders.index']))
                <li class="menu-item  @if (isset($class) && $class == 'order') active @endif">
                    <a href="{{ route('admin.orders.index') }}" class="menu-link">
                        <div data-i18n="Analytics">{{ __('List') }}</div>
                    </a>
                </li>
                @endif
                @if (auth()->user()->isAbleTo(['order_rejects.index']))
                <li class="menu-item @if (isset($class) && $class == 'order_reject') active @endif">
                    <a href="{{ route('admin.order_rejects.index') }}" class="menu-link">
                        <div data-i18n="CRM">{{ __('Order Rejects') }}</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif



        @if (auth()->user()->isAbleTo(['additions.index']))
        <li class="menu-item  @if (isset($class) && $class == 'addition') active @endif">
            <a href="{{ route('admin.additions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-checkbox"></i>
                <div data-i18n="Email">{{ __('Additions') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['units.index']))
        <li class="menu-item  @if (isset($class) && $class == 'unit') active @endif">
            <a href="{{ route('admin.units.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-navbar"></i>
                <div data-i18n="Email">{{ __('Units') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['sizes.index']))
        <li class="menu-item  @if (isset($class) && $class == 'size') active @endif">
            <a href="{{ route('admin.sizes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-toggle-left"></i>
                <div data-i18n="Email">{{ __('Sizes') }}</div>
            </a>
        </li>
        @endif
        {{-- @if (auth()->user()->isAbleTo(['brands.index']))
       <li class="menu-item  @if (isset($class) && $class == 'brand') active @endif">
         <a href="{{ route('admin.brands.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-table"></i>
        <div data-i18n="Email">{{ __('Brands') }}</div>
        </a>
        </li>
        @endif--}}

        @if (auth()->user()->isAbleTo(['favorites.index']))
        <li class="menu-item  @if (isset($class) && $class == 'favorite') active @endif">
            <a href="{{ route('admin.favorites.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div data-i18n="Email">{{ __('Favorites') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['reviews.index']))
        <li class="menu-item  @if (isset($class) && $class == 'review') active @endif">
            <a href="{{ route('admin.reviews.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-star"></i>
                <div data-i18n="Email">{{ __('Reviews') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['coupons.index']))
        <li class="menu-item  @if (isset($class) && $class == 'coupon') active @endif">
            <a href="{{ route('admin.coupons.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Email">{{ __('Coupons') }}</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['payments.index']))
        <li class="menu-item  @if (isset($class) && $class == 'payment') active @endif">
            <a href="{{ route('admin.payments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Email">{{ __('Payments') }}</div>
            </a>
        </li>
        @endif



        @if (auth()->user()->isAbleTo(['addresses.index']))
        <li class="menu-item  @if (isset($class) && $class == 'address') active @endif">
            <a href="{{ route('admin.addresses.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-map"></i>
                <div data-i18n="Email">{{ __('Address') }}</div>
            </a>
        </li>
        @endif
        {{--@if (auth()->user()->isAbleTo(['wallets.index']))
       <li class="menu-item  @if (isset($class) && $class == 'wallet') active @endif">
         <a href="{{ route('admin.wallets.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-table"></i>
        <div data-i18n="Email">{{ __('Wallets') }}</div>
        </a>
        </li>
        @endif
        @if (auth()->user()->isAbleTo(['points.index']))
        <li class="menu-item  @if (isset($class) && $class == 'point') active @endif">
            <a href="{{ route('admin.points.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-table"></i>
                <div data-i18n="Email">{{ __('Points') }}</div>
            </a>
        </li>
        @endif--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Components">Misc</span>
        </li>
        @if (auth()->user()->isAbleTo(['translations.index']))
        <li class="menu-item  @if (isset($class) && $class == 'translation') active @endif">
            <a href="{{ url('') }}/translations" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Email">{{ __('Translations') }}</div>
            </a>
        </li>
        @endif
        @if (in_array(auth()->user()->type, $access_all_type) &&
        in_array(auth()->user()->id, $access_all_id) &&
        auth()->user()->can($access_all_perms))
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">{{ __('Developer') }}</div>
                <!-- <div class="badge bg-primary rounded-pill ms-auto">2</div> -->
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.optimize.clear') }}" class="menu-link">
                        <div data-i18n="Analytics">{{ __('Optimize') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.optimize') }}" class="menu-link">
                        <div data-i18n="CRM">{{ __('Cache') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

    </ul>
</aside>
