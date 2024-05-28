<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
    <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
    <!-- <use xlink:href="{{ asset('img/brand/coreui1.svg#full') }}"></use> -->
    <!-- <img src="{{ asset('img/brand/logoBig.png') }}" alt="" width="100"> -->

</svg>
<svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
    <use xlink:href="{{ asset('img/brand/coreui1.svg#signet') }}"></use>
</svg>

    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif -->
        <li class="c-sidebar-nav-item">
    <x-utils.link
        :href="route('admin.sliders.index')"
        class="c-sidebar-nav-link"
        :text="__('Sliders')" />
    </li>
    <li class="c-sidebar-nav-item">
    <x-utils.link
        :href="route('admin.main_categories.index')"
        class="c-sidebar-nav-link"
        :text="__('Main Categories')" />
</li>
    <li class="c-sidebar-nav-item">
        <x-utils.link
            :href="route('admin.series.index')"
            class="c-sidebar-nav-link"
            :text="__('Series')" />
    </li>
    <li class="c-sidebar-nav-item">
    <x-utils.link
        :href="route('admin.companies.index')"
        class="c-sidebar-nav-link"
        :text="__('Companies')" />
</li>
<li class="c-sidebar-nav-item">
    <x-utils.link
        :href="route('admin.car_models.index')"
        class="c-sidebar-nav-link"
        :text="__('Car Models')" />
</li>
<li class="c-sidebar-nav-item">
    <x-utils.link
        :href="route('admin.years.index')"
        class="c-sidebar-nav-link"
        :text="__('Years')" />
</li>
<li class="c-sidebar-nav-item">
    <x-utils.link
        :href="route('admin.brands.index')"
        class="c-sidebar-nav-link"
        :text="__('Brands')" />
</li>







    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
