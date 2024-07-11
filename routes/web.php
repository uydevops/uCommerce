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
Route::get('/hakkimizda', [FrontendController::class, 'about'])->name('about');
Route::get('/iletisim', [FrontendController::class, 'contact'])->name('contact');   
Route::get('/urunler/{slug_kategoriadi?}', [FrontendController::class, 'products'])->name('page.products');
Route::get('/urun/{slug_urunadi}', [FrontendController::class, 'productDetail'])->name('page.product.detail');
Route::post('/sepet', [FrontendController::class, 'basket'])->name('basket');
Route::post('/odeme', [FrontendController::class, 'payment'])->name('payment');
Route::post('paytr', [FrontendController::class, 'paytrCallback'])->name('paytr.callback');


// Admin Giriş Sayfası ve Yönlendirme
Route::get('/admin', [AuthController::class, 'login'])->name('login');
Route::get('/login', fn() => redirect('/'))->name('login');

// Kategori Sayfası
Route::get('kategori/{slug_kategoriadi}', [FrontendController::class, 'categories'])->name('categories');

// Oturum Açma ve Kapatma
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/logout', [DashboardController::class, 'logout'])->name('logout');
});

// Dashboard İçin Oturum Gerektiren Rotalar
Route::middleware('auth')->group(function () {
    // Dashboard Sayfaları
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/users', [DashboardController::class, 'users'])->name('users');
        Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
        Route::get('/products', [DashboardController::class, 'products'])->name('products');
        Route::get('/categories', [DashboardController::class, 'categories'])->name('categories');
        Route::get('/ads', [DashboardController::class, 'ads'])->name('ad_settings');

        // Genel Ayarlar Güncelleme Rotaları
        Route::post('/settings/update', [GeneralSettingsController::class, 'updateSettings'])->name('general-settings.update');

        // JSON ve Analitik Değerler
        Route::post('/add-task', [DashboardController::class, 'addTask'])->name('dashboard.add-task');
        Route::post('/delete-task', [DashboardController::class, 'deleteTask'])->name('dashboard.delete-task');
        Route::post('/check-task', [DashboardController::class, 'checkTask'])->name('dashboard.check-task');
        Route::get('/approved-companies/{id}', [DashboardController::class, 'approvedCompanies'])->name('dashboard.approved-companies');
        Route::get('/rejected-companies/{id}', [DashboardController::class, 'rejectedCompany'])->name('dashboard.rejected-companies');

        // Kullanıcı Ayarları Rotaları
        Route::post('/users/update', [UserController::class, 'updateUser'])->name('users.update');
        Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
        Route::post('/users/add', [UserController::class, 'addUser'])->name('users.add');

        // Şirket Ayarları Rotaları
        Route::post('/companies/update', [CompaniesController::class, 'updateCompany'])->name('companies.update');
        Route::get('/companies/delete/{id}', [CompaniesController::class, 'deleteCompany'])->name('companies.delete');
        Route::post('/companies/add', [CompaniesController::class, 'addCompany'])->name('companies.add');

        // Ürün Ayarları Rotaları
        Route::post('/products/update', [ProductsController::class, 'updateProduct'])->name('products.update');
        Route::get('/products/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('products.delete');
        Route::post('/products/add', [ProductsController::class, 'addProduct'])->name('products.add');
        Route::get('/products/show/{id}', [ProductsController::class, 'showProduct'])->name('products.show');

        // Kategori Ayarları Rotaları
        Route::post('/categories/update', [CategoriesController::class, 'updateCategory'])->name('categories.update');
        Route::get('/categories/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
        Route::post('/categories/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

        // Reklam Ayarları Rotaları
        Route::post('/ads/update', [AdSettingsController::class, 'updateAds'])->name('ads.update');
        Route::post('/ads/add', [AdSettingsController::class, 'addAds'])->name('ads.add');
        Route::get('/ads/delete/{id}', [AdSettingsController::class, 'deleteAds'])->name('ads.delete');
    });
});
