<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\UnitController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PrintLabelsController;
use App\Http\Controllers\backend\PurchasesController;
use App\Http\Controllers\backend\PurchasesDetailsController;

//Settings
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\LocationController;
use App\Http\Controllers\backend\ThemeController;
use App\Http\Controllers\backend\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logut', [AdminController::class, 'Logout'])->name('admin.logout');

// Users Management Route

Route::prefix('users')->group(function (){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

});

// User Profile and Change Password 

Route::prefix('profiles')->group(function (){

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});

// Settings

Route::prefix('settings')->group(function (){

    // Company Management Route

    Route::get('/company/view', [CompanyController::class, 'CompanyView'])->name('company.view');
    Route::post('/company/store', [CompanyController::class, 'CompanyStore'])->name('company.store');
    Route::post('/company/update/{id}', [CompanyController::class, 'CompanyUpdate'])->name('company.update');

    // Location Management Route

    Route::get('/location/view', [LocationController::class, 'LocationView'])->name('location.view');
    Route::post('/location/store', [LocationController::class, 'LocationStore'])->name('location.store');
    Route::post('/location/update/{id}', [LocationController::class, 'LocationUpdate'])->name('location.update');

    // Theme Management Route

    Route::get('/theme/view', [ThemeController::class, 'ThemeView'])->name('theme.view');
    Route::post('/theme/store', [ThemeController::class, 'ThemeStore'])->name('theme.store');
    Route::post('/theme/update/{id}', [ThemeController::class, 'ThemeUpdate'])->name('theme.update');

    // Invoice Management Route

    Route::get('/invoice/view', [InvoiceController::class, 'InvoiceView'])->name('invoice.view');
    Route::post('/invoice/store', [InvoiceController::class, 'InvoiceStore'])->name('invoice.store');
    Route::post('/invoice/update/{id}', [InvoiceController::class, 'InvoiceUpdate'])->name('invoice.update');

});

// Contact Management Route

Route::prefix('contact')->group(function (){

    // Suppliers Management Route

    Route::get('/supplier/view', [SupplierController::class, 'SupplierView'])->name('supplier.view');
    Route::get('/supplier/add', [SupplierController::class, 'SupplierAdd'])->name('suppliers.add');
    Route::post('/supplier/store', [SupplierController::class, 'SupplierStore'])->name('suppliers.store');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'SupplierEdit'])->name('suppliers.edit');
    Route::post('/supplier/update/{id}', [SupplierController::class, 'SupplierUpdate'])->name('suppliers.update');
    Route::get('/supplier/delete/{id}', [SupplierController::class, 'SupplierDelete'])->name('suppliers.delete');
    Route::get('/supplier/profile/{id}', [SupplierController::class, 'SupplierProfile'])->name('suppliers.profile');

    // Clients Management Route

    Route::get('/client/view', [ClientController::class, 'ClientView'])->name('client.view');
    Route::get('/client/add', [ClientController::class, 'ClientAdd'])->name('clients.add');
    Route::post('/client/store', [ClientController::class, 'ClientStore'])->name('clients.store');
    Route::get('/client/edit/{id}', [ClientController::class, 'ClientEdit'])->name('clients.edit');
    Route::post('/client/update/{id}', [ClientController::class, 'ClientUpdate'])->name('clients.update');
    Route::get('/client/delete/{id}', [ClientController::class, 'ClientDelete'])->name('clients.delete');

});

// Products Management Route

Route::prefix('products')->group(function (){

    // Categories Management Route

    Route::get('/categories/view', [CategoryController::class, 'CategoriesView'])->name('categories.view');
    Route::get('/categories/add', [CategoryController::class, 'CategoriesAdd'])->name('category.add');
    Route::post('/categories/store', [CategoryController::class, 'CategoriesStore'])->name('category.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'CategoriesEdit'])->name('category.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'CategoriesUpdate'])->name('category.update');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'CategoriesDelete'])->name('category.delete');

    // Brands Management Route

    Route::get('/brands/view', [BrandController::class, 'BrandView'])->name('brands.view');
    Route::get('/brands/add', [BrandController::class, 'BrandAdd'])->name('brand.add');
    Route::post('/brands/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/brands/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/brands/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/brands/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

    // Brands Management Route

    Route::get('/units/view', [UnitController::class, 'UnitView'])->name('units.view');
    Route::get('/units/add', [UnitController::class, 'UnitAdd'])->name('unit.add');
    Route::post('/units/store', [UnitController::class, 'UnitStore'])->name('unit.store');
    Route::get('/units/edit/{id}', [UnitController::class, 'UnitEdit'])->name('unit.edit');
    Route::post('/units/update/{id}', [UnitController::class, 'UnitUpdate'])->name('unit.update');
    Route::get('/units/delete/{id}', [UnitController::class, 'UnitDelete'])->name('unit.delete');

    // Product Management Route

    Route::get('/product/view', [ProductController::class, 'ProductView'])->name('product.view');
    Route::get('/product/add', [ProductController::class, 'ProductAdd'])->name('product.add');
    Route::post('/product/store', [ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    Route::get('/product/details/{id}', [ProductController::class, 'ProductDetails'])->name('product.details');
    Route::get('/product/pdf', [ProductController::class, 'pdf'])->name('product.pdf');

    // Print Labels Management Route

    Route::get('/printLabls/view', [PrintLabelsController::class, 'PrintLabelsView'])->name('printLabels.view');
    Route::get('/printLabls/search', [PrintLabelsController::class, 'PrintLabelsSearch'])->name('search');
    Route::post('/printLabls/pdf', [PrintLabelsController::class, 'PrintLabelsPdf'])->name('PrintLabelsPdf');

    // Product Management Route

    Route::get('/purchases/view', [PurchasesController::class, 'PurchasesView'])->name('purchases.view');
    Route::get('/purchases/add', [PurchasesController::class, 'PurchaseAdd'])->name('purchase.add');
    Route::post('/purchases/store', [PurchasesController::class, 'PurchaseStore'])->name('purchase.store');
    Route::get('/purchases/change_status/{purchase}', [PurchasesController::class, 'change_status'])->name('purchase.change_status');
    Route::get('/purchases/details/{id}', [PurchasesController::class, 'PurchaseDetails'])->name('purchase.details');
    Route::get('/purchases/pdf/{id}', [PurchasesController::class, 'pdf'])->name('purchase.pdf');

});