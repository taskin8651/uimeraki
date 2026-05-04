<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        {{-- PRODUCT MANAGEMENT GROUP --}}
@can('product_management_access')
    @php
        $pmActive = request()->is('admin/product-categories*')
            || request()->is('admin/products*');
    @endphp

    <div x-data="{ open: {{ $pmActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Products"
                class="nav-link nav-group-btn {{ $pmActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-boxes nav-icon"></i>
                <span class="nav-label">Product Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('product_category_access')
                <a href="{{ route('admin.product-categories.index') }}"
                   class="sub-link {{ request()->is('admin/product-categories*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
                    Product Categories
                </a>
            @endcan

            @can('product_access')
                <a href="{{ route('admin.products.index') }}"
                   class="sub-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                    <i class="fas fa-box-open"></i>
                    Products
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- ABOUT MANAGEMENT GROUP --}}
@can('about_management_access')
    @php
        $aboutActive = request()->is('admin/about-pages*')
            || request()->is('admin/about-timelines*')
            || request()->is('admin/about-features*');
    @endphp

    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-info-circle nav-icon"></i>
                <span class="nav-label">About Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_page_access')
                <a href="{{ route('admin.about-pages.index') }}"
                   class="sub-link {{ request()->is('admin/about-pages*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    About Page
                </a>
            @endcan

            @can('about_timeline_access')
                <a href="{{ route('admin.about-timelines.index') }}"
                   class="sub-link {{ request()->is('admin/about-timelines*') ? 'active' : '' }}">
                    <i class="fas fa-stream"></i>
                    Journey Timeline
                </a>
            @endcan

            @can('about_feature_access')
                <a href="{{ route('admin.about-features.index') }}"
                   class="sub-link {{ request()->is('admin/about-features*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    Why Meraki Features
                </a>
            @endcan

        </div>
    </div>
@endcan


{{-- CAPABILITY MANAGEMENT GROUP --}}
@can('capability_management_access')
    @php
        $capabilityActive = request()->is('admin/capability-pages*')
            || request()->is('admin/capabilities*')
            || request()->is('admin/capability-specs*')
            || request()->is('admin/capability-processes*');
    @endphp

    <div x-data="{ open: {{ $capabilityActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Capabilities"
                class="nav-link nav-group-btn {{ $capabilityActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-industry nav-icon"></i>
                <span class="nav-label">Capability Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('capability_page_access')
                <a href="{{ route('admin.capability-pages.index') }}"
                   class="sub-link {{ request()->is('admin/capability-pages*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    Capability Page
                </a>
            @endcan

            @can('capability_access')
                <a href="{{ route('admin.capabilities.index') }}"
                   class="sub-link {{ request()->is('admin/capabilities*') && !request()->is('admin/capability-pages*') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i>
                    Capabilities
                </a>
            @endcan

            @can('capability_spec_access')
                <a href="{{ route('admin.capability-specs.index') }}"
                   class="sub-link {{ request()->is('admin/capability-specs*') ? 'active' : '' }}">
                    <i class="fas fa-table"></i>
                    Specifications
                </a>
            @endcan

            @can('capability_process_access')
                <a href="{{ route('admin.capability-processes.index') }}"
                   class="sub-link {{ request()->is('admin/capability-processes*') ? 'active' : '' }}">
                    <i class="fas fa-project-diagram"></i>
                    Process Steps
                </a>
            @endcan

        </div>
    </div>
@endcan

{{-- INDUSTRY MANAGEMENT GROUP --}}
@can('industry_management_access')
    @php
        $industryActive = request()->is('admin/industry-pages*')
            || request()->is('admin/industries*');
    @endphp

    <div x-data="{ open: {{ $industryActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Industries"
                class="nav-link nav-group-btn {{ $industryActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-building nav-icon"></i>
                <span class="nav-label">Industry Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('industry_page_access')
                <a href="{{ route('admin.industry-pages.index') }}"
                   class="sub-link {{ request()->is('admin/industry-pages*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    Industry Page
                </a>
            @endcan

            @can('industry_access')
                <a href="{{ route('admin.industries.index') }}"
                   class="sub-link {{ request()->is('admin/industries*') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Industries
                </a>
            @endcan

        </div>
    </div>
@endcan

        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>