<?php

use App\Http\Controllers\Frontend\ProductPageController;
use App\Http\Controllers\Frontend\AboutPageController as FrontendAboutPageController;
use App\Http\Controllers\Frontend\CapabilityPageController as FrontendCapabilityPageController;
use App\Http\Controllers\Frontend\IndustryPageController as FrontendIndustryPageController;
use App\Http\Controllers\Frontend\QualityPageController as FrontendQualityPageController;
use App\Http\Controllers\Frontend\ResourcePageController as FrontendResourcePageController;
use App\Http\Controllers\Admin\WebsiteSettingController;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

  Route::resource('product-categories', ProductCategoryController::class);
        Route::resource('products', ProductController::class);

        Route::delete('products/gallery-image/{media}', [ProductController::class, 'deleteGalleryImage'])
            ->name('products.gallery-image.delete');
// About Pages
            Route::resource('about-pages', AboutPageController::class);
        Route::resource('about-timelines', AboutTimelineController::class);
        Route::resource('about-features', AboutFeatureController::class);
// Capability Pages
         Route::resource('capability-pages', CapabilityPageController::class);
        Route::resource('capabilities', CapabilityController::class);
        Route::resource('capability-specs', CapabilitySpecController::class);
        Route::resource('capability-processes', CapabilityProcessController::class);

        // Industry Pages
           Route::resource('industry-pages', IndustryPageController::class);
        Route::resource('industries', IndustryController::class);

        // Quality Pages
         Route::resource('quality-pages', QualityPageController::class);
        Route::resource('quality-snapshots', QualitySnapshotController::class);
        Route::resource('quality-pillars', QualityPillarController::class);
        Route::resource('quality-processes', QualityProcessController::class);

        // Resource Pages
        Route::resource('resource-pages', ResourcePageController::class);
        Route::resource('resource-categories', ResourceCategoryController::class);
        Route::resource('resources', ResourceController::class);

        // Contact Page
        Route::get('website-settings', [WebsiteSettingController::class, 'index'])
    ->name('website-settings.index');

Route::put('website-settings/{websiteSetting}', [WebsiteSettingController::class, 'update'])
    ->name('website-settings.update');

    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


// Frontend routes

Route::get('/products', [ProductPageController::class, 'index'])
    ->name('products.index');

Route::get('/products/{slug}', [ProductPageController::class, 'show'])
    ->name('products.show');

Route::get('/about', [FrontendAboutPageController::class, 'index'])->name('about');

Route::get('/capabilities', [FrontendCapabilityPageController::class, 'index'])->name('capabilities');

Route::get('/industries', [FrontendIndustryPageController::class, 'index'])->name('industries.index');


Route::get('/quality', [FrontendQualityPageController::class, 'index'])->name('quality');

Route::get('/resources', [FrontendResourcePageController::class, 'index'])->name('resources');

Route::get('/resources/{slug}', [FrontendResourcePageController::class, 'show'])->name('resources.show');

