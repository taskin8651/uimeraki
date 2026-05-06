@extends('layouts.admin')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
@endsection

@section('content')

@php
    $stats = $stats ?? [];

    $stats = array_merge([
        'users'               => 0,
        'roles'               => 0,
        'permissions'         => 0,
        'products'            => 0,
        'active_products'     => 0,
        'product_categories'  => 0,
        'capabilities'        => 0,
        'industries'          => 0,
        'resources'           => 0,
        'resource_categories' => 0,
        'partners'            => 0,
        'faqs'                => 0,
        'enquiries'           => 0,
        'new_enquiries'       => 0,
        'read_enquiries'      => 0,
        'replied_enquiries'   => 0,
        'closed_enquiries'    => 0,
        'settings'            => 0,
    ], $stats);

    $recentUsers      = $recentUsers ?? collect();
    $recentEnquiries  = $recentEnquiries ?? collect();
    $recentProducts   = $recentProducts ?? collect();
    $recentResources  = $recentResources ?? collect();
    $moduleCards      = $moduleCards ?? [];

    $chartLabels = $chartLabels ?? ['Users', 'Products', 'Resources', 'Enquiries', 'Partners'];
    $chartValues = $chartValues ?? [
        $stats['users'],
        $stats['products'],
        $stats['resources'],
        $stats['enquiries'],
        $stats['partners'],
    ];
@endphp

<button id="theme-toggle-btn" onclick="toggleTheme()" title="Customize Theme">
    <i class="fas fa-palette"></i>
</button>

<div id="theme-panel">
    <div class="theme-panel-head">
        <div>
            <p class="theme-panel-title">Theme Customizer</p>
            <p class="theme-panel-subtitle">Personalize your dashboard</p>
        </div>

        <button onclick="toggleTheme()" class="theme-close-btn">✕</button>
    </div>

    <div class="theme-panel-body">
        <p class="theme-label">Accent Color</p>

        <div class="theme-swatch-grid">
            <div class="color-swatch active" style="background:#4F46E5;" data-accent="#4F46E5" data-light="#EEF2FF" data-dark="#3730A3" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#0EA5E9;" data-accent="#0EA5E9" data-light="#E0F2FE" data-dark="#0284C7" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#10B981;" data-accent="#10B981" data-light="#D1FAE5" data-dark="#059669" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#F59E0B;" data-accent="#F59E0B" data-light="#FEF3C7" data-dark="#D97706" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#EF4444;" data-accent="#EF4444" data-light="#FEE2E2" data-dark="#DC2626" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#8B5CF6;" data-accent="#8B5CF6" data-light="#EDE9FE" data-dark="#7C3AED" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#EC4899;" data-accent="#EC4899" data-light="#FCE7F3" data-dark="#DB2777" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#14B8A6;" data-accent="#14B8A6" data-light="#CCFBF1" data-dark="#0F766E" onclick="setAccent(this)"></div>
            <div class="color-swatch" style="background:#F97316;" data-accent="#F97316" data-light="#FFEDD5" data-dark="#EA580C" onclick="setAccent(this)"></div>
        </div>

        <div class="theme-control-block">
            <p class="theme-label">Custom Color</p>

            <div class="custom-color-row">
                <input type="color" id="custom-color" value="#4F46E5" oninput="applyCustomColor(this.value)">
                <span id="hex-display">#4F46E5</span>
            </div>
        </div>

        <div class="theme-control-block">
            <p class="theme-label">Background Style</p>

            <div class="theme-bg-grid">
                <button onclick="setBg('bg-gray-100')" id="bg-gray" class="theme-bg-btn active-bg">☁ Light Gray</button>
                <button onclick="setBg('bg-white')" id="bg-white" class="theme-bg-btn">◻ White</button>
                <button onclick="setBg('bg-slate-800')" id="bg-dark" class="theme-bg-btn bg-dark-btn">◾ Dark</button>
                <button onclick="setBg('bg-blue-50')" id="bg-blue" class="theme-bg-btn bg-blue-btn">💧 Blue Tint</button>
            </div>
        </div>

        <div class="theme-control-block">
            <p class="theme-label">Interface Size</p>

            <div class="theme-size-row">
                <button onclick="setSize('compact')">Compact</button>
                <button onclick="setSize('default')" class="active-size">Default</button>
                <button onclick="setSize('spacious')">Spacious</button>
            </div>
        </div>

        <button onclick="resetTheme()" class="theme-reset-btn">
            ↺ Reset to Default
        </button>
    </div>
</div>

<div class="dash-page-head">
    <div>
        <h2 class="dash-page-title">Dashboard</h2>
        <p class="dash-page-subtitle">
            Welcome back, <strong>{{ auth()->user()->name }}</strong> — here's what's happening today.
        </p>
    </div>

    <div class="dash-head-actions">
        <span class="dash-date">
            <i class="fas fa-clock"></i>
            {{ now()->format('D, d M Y') }}
        </span>
    </div>
</div>

<div class="welcome-banner">
    <div class="welcome-content">
        <p class="welcome-title">
            Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }},
            {{ explode(' ', auth()->user()->name)[0] }}! 👋
        </p>

        <p class="welcome-subtitle">
            Your admin panel is running smoothly. Here's a summary of today's activity.
        </p>

        <div class="welcome-mini-grid">
            <div class="welcome-mini-card">
                <span>Total Users</span>
                <strong>{{ $stats['users'] }}</strong>
            </div>

            <div class="welcome-mini-card">
                <span>Products</span>
                <strong>{{ $stats['products'] }}</strong>
            </div>

            <div class="welcome-mini-card">
                <span>New Enquiries</span>
                <strong>{{ $stats['new_enquiries'] }}</strong>
            </div>
        </div>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-inner">
            <div>
                <p class="stat-card-label">Total Users</p>
                <p class="stat-card-value">{{ $stats['users'] }}</p>
                <span class="dash-badge badge-up">User management</span>
            </div>

            <div class="icon-wrap">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-bar-fill" style="width:72%"></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-inner">
            <div>
                <p class="stat-card-label">Products</p>
                <p class="stat-card-value">{{ $stats['products'] }}</p>
                <span class="dash-badge badge-green">{{ $stats['active_products'] }} active</span>
            </div>

            <div class="icon-wrap icon-green">
                <i class="fas fa-box"></i>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-bar-fill fill-green" style="width:64%"></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-inner">
            <div>
                <p class="stat-card-label">Resources</p>
                <p class="stat-card-value">{{ $stats['resources'] }}</p>
                <span class="dash-badge badge-yellow">Knowledge center</span>
            </div>

            <div class="icon-wrap icon-yellow">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-bar-fill fill-yellow" style="width:58%"></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-inner">
            <div>
                <p class="stat-card-label">Enquiries</p>
                <p class="stat-card-value">{{ $stats['enquiries'] }}</p>
                <span class="dash-badge badge-red">{{ $stats['new_enquiries'] }} new</span>
            </div>

            <div class="icon-wrap icon-red">
                <i class="fas fa-envelope-open-text"></i>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-bar-fill fill-red" style="width:55%"></div>
        </div>
    </div>
</div>

<div class="chart-card module-card-wrap">
    <div class="card-head">
        <div>
            <p class="card-title">Website Modules</p>
            <p class="card-subtitle">Quick overview of all dynamic content modules</p>
        </div>
    </div>

    <div class="module-grid">
        @forelse($moduleCards as $card)
            @can($card['permission'])
                <a href="{{ $card['route'] ?? '#' }}" class="module-card">
                    <div class="module-icon" style="background:{{ $card['bg'] ?? '#EEF2FF' }}; color:{{ $card['color'] ?? '#4F46E5' }};">
                        <i class="{{ $card['icon'] ?? 'fas fa-circle' }}"></i>
                    </div>

                    <div>
                        <p class="module-title">{{ $card['title'] ?? '-' }}</p>
                        <p class="module-count">{{ $card['count'] ?? 0 }}</p>
                        <p class="module-text">{{ $card['text'] ?? '' }}</p>
                    </div>
                </a>
            @endcan
        @empty
            <div class="empty-box">
                <i class="fas fa-box-open"></i>
                <p>No module cards found</p>
            </div>
        @endforelse
    </div>
</div>

<div class="chart-grid">
    <div class="chart-card">
        <div class="card-head">
            <div>
                <p class="card-title">Module Overview</p>
                <p class="card-subtitle">Important module counts</p>
            </div>
        </div>

        <canvas id="lineChart" height="90"></canvas>
    </div>

    <div class="chart-card">
        <div class="card-head">
            <div>
                <p class="card-title">Content Distribution</p>
                <p class="card-subtitle">Users, products, resources and enquiries</p>
            </div>
        </div>

        <canvas id="doughnutChart" height="160"></canvas>

        <div class="doughnut-legend" id="doughnut-legend"></div>
    </div>
</div>

<div class="dash-two-grid">
    <div class="chart-card">
        <div class="card-head">
            <p class="card-title">Recent Users</p>

            @can('user_access')
                <a href="{{ route('admin.users.index') }}" class="card-link">View All →</a>
            @endcan
        </div>

        <table class="dash-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentUsers as $user)
                    <tr>
                        <td>
                            <div class="user-mini">
                                <div class="avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p>{{ $user->name }}</p>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </div>
                        </td>

                        <td>
                            @forelse($user->roles as $role)
                                <span class="pill pill-blue">{{ $role->title }}</span>
                            @empty
                                <span class="pill pill-gray">No Role</span>
                            @endforelse
                        </td>

                        <td>
                            @if($user->email_verified_at)
                                <span class="pill pill-green">Verified</span>
                            @else
                                <span class="pill pill-yellow">Pending</span>
                            @endif
                        </td>

                        <td class="muted-cell">
                            {{ optional($user->created_at)->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-cell">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="chart-card">
        <div class="card-head">
            <p class="card-title">Recent Enquiries</p>

            @can('enquiry_access')
                <a href="{{ route('admin.enquiries.index') }}" class="card-link">View All →</a>
            @endcan
        </div>

        <div class="activity-list">
            @forelse($recentEnquiries as $enquiry)
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="activity-body">
                        <p>
                            <strong>{{ $enquiry->name }}</strong>
                            @if($enquiry->company)
                                from {{ $enquiry->company }}
                            @endif
                        </p>

                        <span>{{ $enquiry->enquiry_type ?? 'General enquiry' }}</span>
                        <small>{{ optional($enquiry->created_at)->diffForHumans() }}</small>
                    </div>

                    @if($enquiry->status === 'new')
                        <span class="pill pill-red">New</span>
                    @elseif($enquiry->status === 'replied')
                        <span class="pill pill-green">Replied</span>
                    @elseif($enquiry->status === 'closed')
                        <span class="pill pill-gray">Closed</span>
                    @else
                        <span class="pill pill-yellow">{{ ucfirst($enquiry->status ?? 'Pending') }}</span>
                    @endif
                </div>
            @empty
                <div class="empty-box">
                    <i class="fas fa-inbox"></i>
                    <p>No enquiries found</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="dash-two-grid">
    <div class="chart-card">
        <div class="card-head">
            <p class="card-title">Recent Products</p>

            @can('product_access')
                <a href="{{ route('admin.products.index') }}" class="card-link">View All →</a>
            @endcan
        </div>

        <table class="dash-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentProducts as $product)
                    <tr>
                        <td>
                            <div class="table-media">
                                <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}">

                                <div>
                                    <p>{{ $product->name }}</p>
                                    <span>{{ optional($product->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </td>

                        <td>{{ optional($product->category)->name ?? '-' }}</td>

                        <td>
                            @if($product->status)
                                <span class="pill pill-green">Active</span>
                            @else
                                <span class="pill pill-yellow">Inactive</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty-cell">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="chart-card">
        <div class="card-head">
            <p class="card-title">Recent Resources</p>

            @can('resource_access')
                <a href="{{ route('admin.resources.index') }}" class="card-link">View All →</a>
            @endcan
        </div>

        <table class="dash-table">
            <thead>
                <tr>
                    <th>Resource</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentResources as $resource)
                    <tr>
                        <td>
                            <div class="table-media">
                                <img src="{{ $resource->image_url }}" alt="{{ $resource->title }}">

                                <div>
                                    <p>{{ $resource->title }}</p>
                                    <span>{{ optional($resource->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </td>

                        <td>{{ $resource->type_label ?? optional($resource->category)->name ?? '-' }}</td>

                        <td>
                            @if($resource->status)
                                <span class="pill pill-green">Active</span>
                            @else
                                <span class="pill pill-yellow">Inactive</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty-cell">No resources found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="chart-card quick-actions-card">
    <p class="card-title">Quick Actions</p>

    <div class="quick-actions-grid">
        @can('user_create')
            <a href="{{ route('admin.users.create') }}" class="quick-action qa-primary">
                <i class="fas fa-user-plus"></i> Add User
            </a>
        @endcan

        @can('product_create')
            <a href="{{ route('admin.products.create') }}" class="quick-action qa-product">
                <i class="fas fa-box"></i> Add Product
            </a>
        @endcan

        @can('resource_create')
            <a href="{{ route('admin.resources.create') }}" class="quick-action qa-resource">
                <i class="fas fa-newspaper"></i> Add Resource
            </a>
        @endcan

        @can('partner_create')
            <a href="{{ route('admin.partners.create') }}" class="quick-action qa-partner">
                <i class="fas fa-handshake"></i> Add Partner
            </a>
        @endcan

        @can('faq_create')
            <a href="{{ route('admin.faqs.create') }}" class="quick-action qa-faq">
                <i class="fas fa-question-circle"></i> Add FAQ
            </a>
        @endcan

        @can('enquiry_access')
            <a href="{{ route('admin.enquiries.index') }}" class="quick-action qa-enquiry">
                <i class="fas fa-envelope-open-text"></i> View Enquiries
            </a>
        @endcan

        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}" class="quick-action qa-password">
                    <i class="fas fa-key"></i> Change Password
                </a>
            @endcan
        @endif
    </div>
</div>

@endsection

@section('scripts')
@parent

<script>
    window.dashboardData = {
        chartLabels: @json($chartLabels),
        chartValues: @json($chartValues),
        lineLabels: @json($chartLabels),
        lineValues: @json($chartValues),
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
@endsection