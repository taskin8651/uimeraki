<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutPage;
use App\Models\Capability;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Industry;
use App\Models\Partner;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QualityPage;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\Role;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Route;

class HomeController
{
    public function index()
    {
        $stats = [
            'users'               => $this->safeCount(User::class),
            'roles'               => $this->safeCount(Role::class),
            'permissions'         => $this->safeCount(Permission::class),

            'products'            => $this->safeCount(Product::class),
            'active_products'     => $this->safeWhereCount(Product::class, 'status', 1),
            'product_categories'  => $this->safeCount(ProductCategory::class),

            'about_pages'         => $this->safeCount(AboutPage::class),
            'capabilities'        => $this->safeCount(Capability::class),
            'industries'          => $this->safeCount(Industry::class),
            'quality_pages'       => $this->safeCount(QualityPage::class),

            'resources'           => $this->safeCount(Resource::class),
            'resource_categories' => $this->safeCount(ResourceCategory::class),

            'partners'            => $this->safeCount(Partner::class),
            'faqs'                => $this->safeCount(Faq::class),

            'enquiries'           => $this->safeCount(Enquiry::class),
            'new_enquiries'       => $this->safeWhereCount(Enquiry::class, 'status', 'new'),
            'read_enquiries'      => $this->safeWhereCount(Enquiry::class, 'status', 'read'),
            'replied_enquiries'   => $this->safeWhereCount(Enquiry::class, 'status', 'replied'),
            'closed_enquiries'    => $this->safeWhereCount(Enquiry::class, 'status', 'closed'),

            'settings'            => $this->safeCount(WebsiteSetting::class),
        ];

        $recentUsers = User::with('roles')
            ->latest()
            ->take(5)
            ->get();

        $recentEnquiries = Enquiry::latest()
            ->take(6)
            ->get();

        $recentProducts = Product::with(['category', 'media'])
            ->latest()
            ->take(5)
            ->get();

        $recentResources = Resource::with(['category', 'media'])
            ->latest()
            ->take(5)
            ->get();

        $latestPartners = Partner::with('media')
            ->latest()
            ->take(6)
            ->get();

        $moduleCards = [
            [
                'title'      => 'Products',
                'count'      => $stats['products'],
                'icon'       => 'fas fa-box',
                'route'      => $this->safeRoute('admin.products.index'),
                'permission' => 'product_access',
                'color'      => '#4F46E5',
                'bg'         => '#EEF2FF',
                'text'       => $stats['active_products'] . ' active products',
            ],
            [
                'title'      => 'Product Categories',
                'count'      => $stats['product_categories'],
                'icon'       => 'fas fa-layer-group',
                'route'      => $this->safeRoute('admin.product-categories.index'),
                'permission' => 'product_category_access',
                'color'      => '#0EA5E9',
                'bg'         => '#E0F2FE',
                'text'       => 'Manage product groups',
            ],
            [
                'title'      => 'About Page',
                'count'      => $stats['about_pages'],
                'icon'       => 'fas fa-building',
                'route'      => $this->safeRoute('admin.about-pages.index'),
                'permission' => 'about_page_access',
                'color'      => '#6366F1',
                'bg'         => '#EEF2FF',
                'text'       => 'About page content',
            ],
            [
                'title'      => 'Capabilities',
                'count'      => $stats['capabilities'],
                'icon'       => 'fas fa-cogs',
                'route'      => $this->safeRoute('admin.capabilities.index'),
                'permission' => 'capability_access',
                'color'      => '#10B981',
                'bg'         => '#D1FAE5',
                'text'       => 'Machines and process cards',
            ],
            [
                'title'      => 'Industries',
                'count'      => $stats['industries'],
                'icon'       => 'fas fa-industry',
                'route'      => $this->safeRoute('admin.industries.index'),
                'permission' => 'industry_access',
                'color'      => '#F59E0B',
                'bg'         => '#FEF3C7',
                'text'       => 'Industries served',
            ],
            [
                'title'      => 'Quality Page',
                'count'      => $stats['quality_pages'],
                'icon'       => 'fas fa-shield-alt',
                'route'      => $this->safeRoute('admin.quality-pages.index'),
                'permission' => 'quality_page_access',
                'color'      => '#0F766E',
                'bg'         => '#CCFBF1',
                'text'       => 'Quality page content',
            ],
            [
                'title'      => 'Resources',
                'count'      => $stats['resources'],
                'icon'       => 'fas fa-newspaper',
                'route'      => $this->safeRoute('admin.resources.index'),
                'permission' => 'resource_access',
                'color'      => '#8B5CF6',
                'bg'         => '#EDE9FE',
                'text'       => $stats['resource_categories'] . ' resource categories',
            ],
            [
                'title'      => 'Partners',
                'count'      => $stats['partners'],
                'icon'       => 'fas fa-handshake',
                'route'      => $this->safeRoute('admin.partners.index'),
                'permission' => 'partner_access',
                'color'      => '#14B8A6',
                'bg'         => '#CCFBF1',
                'text'       => 'Partner logos',
            ],
            [
                'title'      => 'FAQs',
                'count'      => $stats['faqs'],
                'icon'       => 'fas fa-question-circle',
                'route'      => $this->safeRoute('admin.faqs.index'),
                'permission' => 'faq_access',
                'color'      => '#EC4899',
                'bg'         => '#FCE7F3',
                'text'       => 'Question and answer list',
            ],
            [
                'title'      => 'Enquiries',
                'count'      => $stats['enquiries'],
                'icon'       => 'fas fa-envelope-open-text',
                'route'      => $this->safeRoute('admin.enquiries.index'),
                'permission' => 'enquiry_access',
                'color'      => '#EF4444',
                'bg'         => '#FEE2E2',
                'text'       => $stats['new_enquiries'] . ' new enquiries',
            ],
            [
                'title'      => 'Website Settings',
                'count'      => $stats['settings'],
                'icon'       => 'fas fa-globe',
                'route'      => $this->safeRoute('admin.website-settings.index'),
                'permission' => 'website_setting_access',
                'color'      => '#64748B',
                'bg'         => '#F1F5F9',
                'text'       => 'Global website data',
            ],
        ];

        $chartLabels = [
            'Users',
            'Products',
            'Resources',
            'Enquiries',
            'Partners',
        ];

        $chartValues = [
            $stats['users'],
            $stats['products'],
            $stats['resources'],
            $stats['enquiries'],
            $stats['partners'],
        ];

        return view('home', compact(
            'stats',
            'recentUsers',
            'recentEnquiries',
            'recentProducts',
            'recentResources',
            'latestPartners',
            'moduleCards',
            'chartLabels',
            'chartValues'
        ));
    }

    private function safeRoute(string $name): string
    {
        return Route::has($name) ? route($name) : '#';
    }

    private function safeCount(string $model): int
    {
        return class_exists($model) ? $model::count() : 0;
    }

    private function safeWhereCount(string $model, string $column, mixed $value): int
    {
        return class_exists($model) ? $model::where($column, $value)->count() : 0;
    }
}