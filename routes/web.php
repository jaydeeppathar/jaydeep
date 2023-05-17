<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FrontSettingController;
use App\Http\Controllers\AddProductController;


use App\Http\Controllers\FrontTheme\FrontHomeController;
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
    return view('welcome');
});
Route::get('test', [CollectionController::class, 'test'])->name('test');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');       
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('admin/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');

// User Controller
Route::resource('admin/user', UserController::class); 
Route::resource('admin/category', CategoryController::class); 
Route::resource('admin/sub-category', SubCategoryController::class); 
Route::resource('admin/product', ProductController::class); 
Route::get('settings',[FrontSettingController::class,'indexFront'])->name('front.setting');
Route::post('settings-update',[FrontSettingController::class,'createFront'])->name('settings.update');
// Route::post('settings-update', array('as'=> 'front.setting.update', 'uses' => 'Admin\FrontSettingController@createFront'));

Route::get('/home',[FrontHomeController::class,'home'])->name('home');
Route::get('/about',[FrontHomeController::class,'about'])->name('about');
Route::get('/product/{id}',[FrontHomeController::class,'product'])->name('product');
Route::get('/contact',[FrontHomeController::class,'contact'])->name('contact');
Route::resource('/contactus',ContactUsController::class);
Route::get('/product-detail/{slug}',[FrontHomeController::class,'productDetail'])->name('product.detail');
Route::get('/product-page/{id}',[FrontHomeController::class,'productPage'])->name('product.page');
// Route::get('/check-order',[FrontHomeController::class,'checkOrder'])->name('check.order');

Route::get('cart', [FrontHomeController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{slug}', [FrontHomeController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FrontHomeController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [FrontHomeController::class, 'remove'])->name('remove.from.cart');

Route::resource('/addproduct',AddProductController::class);

Route::post('/fetch-subcategory', [ProductController::class, 'fetchsubcategory']);
	