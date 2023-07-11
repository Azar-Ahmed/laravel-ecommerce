<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;



use App\Http\Controllers\Front\UserAuthController;
use App\Http\Controllers\Front\FrontController;




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


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
    
// Admin Auth
Route::get('/admin/login', [AuthController::class, 'Login']);
Route::post('login-submit', [AuthController::class, 'LoginSubmit'])->name('login_submit');

Route::group(['middleware' => 'admin_auth'], function () {

    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'Dashboard']);

    // category
    Route::get('/admin/category', [CategoryController::class, 'Index']);
    Route::get('admin/category-form/{slug}', [CategoryController::class, 'Form']);
    Route::post('category/save', [CategoryController::class, 'Manage'])->name('category.save');
    Route::get('category-delete/{id}', [CategoryController::class, 'Delete']);
    Route::get('category-status/{status}/{id}', [CategoryController::class, 'Status']);

    // Sub category
    Route::get('/admin/sub-category', [SubCategoryController::class, 'Index']);
    Route::get('admin/sub-category-form/{slug}', [SubCategoryController::class, 'Form']);
    Route::post('sub-category/save', [SubCategoryController::class, 'Manage'])->name('sub-category.save');
    Route::get('sub-category-delete/{id}', [SubCategoryController::class, 'Delete']);
    Route::get('sub-category-status/{status}/{id}', [SubCategoryController::class, 'Status']);

    // product
    Route::get('/admin/product', [ProductController::class, 'Index']);
    Route::get('admin/product-form/{slug}', [ProductController::class, 'Form']);
    Route::post('product/save', [ProductController::class, 'Manage'])->name('product.save');
    Route::get('product-delete/{id}', [ProductController::class, 'Delete']);
    Route::get('product-status/{status}/{id}', [ProductController::class, 'Status']);
    Route::post('product-image/delete', [ProductController::class, 'DeleteMultipleImage'])->name('DeleteMultipleImage');


    // brand
    Route::get('/admin/brand', [BrandController::class, 'Index']);
    Route::get('admin/brand-form/{slug}', [BrandController::class, 'Form']);
    Route::post('brand/save', [BrandController::class, 'Manage'])->name('brand.save');
    Route::get('brand-delete/{id}', [BrandController::class, 'Delete']);
    Route::get('brand-status/{status}/{id}', [BrandController::class, 'Status']);

     // color
     Route::get('/admin/color', [ColorController::class, 'Index']);
     Route::get('admin/color-form/{slug}', [ColorController::class, 'Form']);
     Route::post('color/save', [ColorController::class, 'Manage'])->name('color.save');
     Route::get('color-delete/{id}', [ColorController::class, 'Delete']);
     Route::get('color-status/{status}/{id}', [ColorController::class, 'Status']);

    // size
    Route::get('/admin/size', [SizeController::class, 'Index']);
    Route::get('admin/size-form/{slug}', [SizeController::class, 'Form']);
    Route::post('size/save', [SizeController::class, 'Manage'])->name('size.save');
    Route::get('size-delete/{id}', [SizeController::class, 'Delete']);
    Route::get('size-status/{status}/{id}', [SizeController::class, 'Status']);

    // slider
    Route::get('/admin/slider', [SliderController::class, 'Index']);
    Route::get('admin/slider-form/{slug}', [SliderController::class, 'Form']);
    Route::post('slider/save', [SliderController::class, 'Manage'])->name('slider.save');
    Route::get('slider-delete/{id}', [SliderController::class, 'Delete']);
    Route::get('slider-status/{status}/{id}', [SliderController::class, 'Status']);

     // contact
     Route::get('/admin/contact', [ContactController::class, 'Index']);
     Route::get('contact-delete/{id}', [ContactController::class, 'Delete']);
     Route::get('contact-status/{status}/{id}', [ContactController::class, 'Status']);

    // user
    Route::get('/admin/user', [UserController::class, 'Index']);
    Route::get('user-delete/{id}', [UserController::class, 'Delete']);
    Route::get('user-status/{status}/{id}', [UserController::class, 'Status']);

     
    // Logout
    Route::get('logout', function () {
        session()->forget(['AdminLogin', 'AdminID', 'AdminName', 'AdminEmail']);
        return redirect('admin/login')->with('success', 'Logout successfully done');
    });
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontController::class, 'Index']);
Route::get('/shop', [FrontController::class, 'Shop']);
Route::get('/product-detail/{id}', [FrontController::class, 'ProductDetail']);
Route::get('/about-us', [FrontController::class, 'About']);
Route::get('/contact', [FrontController::class, 'Contact']);

// User Auth
Route::get('/user-register', [UserAuthController::class, 'UserRegister']);
Route::post('user-signup-submit', [UserAuthController::class, 'UserRegisterSubmit'])->name('user_signup_submit');

Route::get('/user-login', [UserAuthController::class, 'UserLogin']);
Route::post('user-login-submit', [UserAuthController::class, 'UserLoginSubmit'])->name('user_login_submit');


Route::group(['middleware' => 'user_auth'], function () {
    
    Route::get('/profile', [FrontController::class, 'Profile']);
    Route::get('/cart', [FrontController::class, 'Cart']);

    
    // Logout
    Route::get('user/logout', function () {
        session()->forget(['UserLogin', 'UserData']);
        return redirect('/')->with('success', 'Logout successfully done');
    });
});