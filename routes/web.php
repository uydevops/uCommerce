<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdSettingsController;
use Illuminate\Support\Facades\Route;

// Ana Sayfa ve Sepet Rotası
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::post('/sepet', [FrontendController::class, 'sepet'])->name('sepet');

// Admin Giriş Sayfası ve Yönlendirme
Route::get('/admin', [AuthController::class, 'login'])->name('login');
Route::get('/login', function () {
    return redirect('/');
})->name('login');

// Kategori Sayfası
Route::get('kategori/{slug_kategoriadi}', [FrontendController::class, 'categories'])->name('categories');

// Oturum Açma ve Kapatma
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/logout', [DashboardController::class, 'logout'])->name('logout');
});

// Dashboard İçin Oturum Gerektiren Rotalar
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/dashboard/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/dashboard/categories', [DashboardController::class, 'categories'])->name('categories');

    // Genel Ayarlar Güncelleme Rotaları
    Route::post('/dashboard/settings/update', [GeneralSettingsController::class, 'updateSettings'])->name('general-settings.update');

    // JSON ve Analitik Değerler
    Route::post('/dashboard/add-task', [DashboardController::class, 'addTask'])->name('dashboard.add-task');
    Route::post('/dashboard/delete-task', [DashboardController::class, 'deleteTask'])->name('dashboard.delete-task');
    Route::post('/dashboard/check-task', [DashboardController::class, 'checkTask'])->name('dashboard.check-task');
    Route::get('/dashboard/approved-companies/{id}', [DashboardController::class, 'approvedCompanies'])->name('dashboard.approved-companies');
    Route::get('/dashboard/rejected-companies/{id}', [DashboardController::class, 'rejectedCompany'])->name('dashboard.rejected-companies');

    // Kullanıcı Ayarları Rotaları
    Route::post('/dashboard/users/update', [UserController::class, 'updateUser'])->name('users.update');
    Route::get('/dashboard/users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
    Route::post('/dashboard/users/add', [UserController::class, 'addUser'])->name('users.add');

    // Şirket Ayarları Rotaları
    Route::post('/dashboard/companies/update', [CompaniesController::class, 'updateCompany'])->name('companies.update');
    Route::get('/dashboard/companies/delete/{id}', [CompaniesController::class, 'deleteCompany'])->name('companies.delete');
    Route::post('/dashboard/companies/add', [CompaniesController::class, 'addCompany'])->name('companies.add');

    // Ürün Ayarları Rotaları
    Route::post('/dashboard/products/update', [ProductsController::class, 'updateProduct'])->name('products.update');
    Route::get('/dashboard/products/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('products.delete');
    Route::post('/dashboard/products/add', [ProductsController::class, 'addProduct'])->name('products.add');
    Route::get('/dashboard/products/show/{id}', [ProductsController::class, 'showProduct'])->name('products.show');

    // Kategori Ayarları Rotaları
    Route::post('/dashboard/categories/update', [CategoriesController::class, 'updateCategory'])->name('categories.update');
    Route::get('/dashboard/categories/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
    Route::post('/dashboard/categories/add', [CategoriesController::class, 'addCategory'])->name('categories.add');


    //Reklam Ayarları Rotaları

    Route::get('/dashboard/ads', [DashboardController::class, 'ads'])->name('ad_settings');
    Route::post('/dashboard/ads/update', [AdSettingsController::class, 'updateAds'])->name('ads.update');
    Route::post('/dashboard/ads/add', [AdSettingsController::class, 'addAds'])->name('ads.add');
    Route::get('/dashboard/ads/delete/{id}', [AdSettingsController::class, 'deleteAds'])->name('ads.delete');
});

