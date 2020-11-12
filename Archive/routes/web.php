<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\TestimonyController;

use App\Http\Controllers\Frontend\PageFrontController;

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

Route::group( [ 'namespace' => 'Frontend' ], function() {
	Route::get('/',[PageFrontController::class, 'home'])->name('home');

	Route::get('/product/{slug}',[PageFrontController::class, 'product'])->name('product');

	Route::get('/news',[PageFrontController::class, 'news'])->name('news');
	Route::get('/news/{slug}',[PageFrontController::class, 'newsDetail'])->name('news_detail');

	Route::get('/contact',[PageFrontController::class, 'contact'])->name('contact');
	Route::post('/sendEmail',[PageFrontController::class, 'sendEmail'])->name('send_email');

	Route::get('/faq',[PageFrontController::class, 'faq'])->name('faq');

	Route::get('/testimony',[PageFrontController::class, 'testimony'])->name('testimony');

	Route::get('/join-afc',[PageFrontController::class, 'about'])->name('about');
});

Route::group( [ 'namespace' => 'Admin', 'prefix'=>'admin' ], function() {
	Route::get('/login',[AuthController::class, 'login'])->name('admin_login');
	Route::post('/authentification',[AuthController::class, 'authenticate'])->name('admin_login_auth');
	Route::get('/forget-password',[AuthController::class, 'forgetPassword'])->name('admin_forget_password');
	Route::post('/forget-password-action',[AuthController::class, 'forgetPasswordAction'])->name('admin_forget_password_action');
	Route::get('/reset-password/{token}',[AuthController::class, 'resetPassword'])->name('password_reset');
	Route::post('/reset-password',[AuthController::class, 'resetPasswordAction'])->name('password_reset_action');

	Route::group( ['middleware' => 'auth'], function() {
		Route::get('/dashboard',[PageController::class, 'dashboard'])->name('admin_dashboard');

		Route::get('/profile',[ProfileController::class, 'index'])->name('admin_profile');

		Route::get('/general-setting',[PageController::class, 'general'])->name('admin_general');
		Route::put('/general-setting/update',[PageController::class, 'generalUpdate'])->name('admin_general_update');

		Route::get('/slider',[PageController::class, 'slider'])->name('admin_slider');
		Route::put('/home-slider',[PageController::class, 'sliderUpdate'])->name('admin_slider_update');

		Route::get('/faq',[FaqController::class, 'index'])->name('admin_faq');
		Route::post('/faq/create',[FaqController::class, 'doCreate'])->name('faq_create');
		Route::put('/faq/update/{id}',[FaqController::class, 'doUpdate'])->name('faq_update');
		Route::delete('/faq/delete/{id}',[FaqController::class, 'doDelete'])->name('faq_delete');

		Route::get('/page-about',[PageController::class, 'about'])->name('admin_about');
		Route::put('/page-about/update',[PageController::class, 'aboutUpdate'])->name('about_update');

		Route::get('/social-media',[SosmedController::class, 'index'])->name('admin_sosmed');
		Route::post('/social-media-action',[SosmedController::class, 'doCreate'])->name('admin_sosmed_action');
		Route::put('/social-media/update/{id}',[SosmedController::class, 'doUpdate'])->name('admin_sosmed_update');
		Route::delete('/social-media/delete/{id}',[SosmedController::class, 'doDelete'])->name('admin_sosmed_delete');

		Route::get('/profile',[ProfileController::class, 'index'])->name('admin_profile');
		Route::put('/profile/update/{id}',[ProfileController::class, 'updateProfile'])->name('admin_profile_update');
		Route::put('/profile/password/{id}',[ProfileController::class, 'updatePassword'])->name('admin_profile_password');

		Route::get('/package',[PackageController::class, 'index'])->name('admin_package');
		Route::post('/package/create',[PackageController::class, 'doCreate'])->name('package_create');
		Route::put('/package/update/{id}',[PackageController::class, 'doUpdate'])->name('package_update');
		Route::delete('/package/delete/{id}',[PackageController::class, 'doDelete'])->name('package_delete');

		Route::get('/product',[ProductController::class, 'index'])->name('admin_product');
		Route::get('/product/create',[ProductController::class, 'create'])->name('product_ceate');
		Route::post('/product/store',[ProductController::class, 'store'])->name('product_store');
		Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('product_edit');
		Route::put('/product/update/{id}',[ProductController::class, 'update'])->name('product_update');
		Route::delete('/product/delete/{id}',[ProductController::class, 'delete'])->name('product_delete');

		Route::get('/news',[BlogController::class, 'index'])->name('admin_blog');
		Route::get('/news/create',[BlogController::class, 'create'])->name('blog_create');
		Route::post('/news/store',[BlogController::class, 'store'])->name('blog_store');
		Route::get('/news/edit/{id}',[BlogController::class, 'edit'])->name('blog_edit');
		Route::put('/news/update/{id}',[BlogController::class, 'update'])->name('blog_update');
		Route::delete('/news/delete/{id}',[BlogController::class, 'delete'])->name('blog_delete');

		Route::get('/home-section',[HomeSectionController::class, 'index'])->name('admin_home_section');
		Route::get('/home-section/create',[HomeSectionController::class, 'create'])->name('home_section_create');
		Route::post('/home-section/store',[HomeSectionController::class, 'store'])->name('home_section_store');
		Route::get('/home-section/edit/{id}',[HomeSectionController::class, 'edit'])->name('home_section_edit');
		Route::put('/home-section/update/{id}',[HomeSectionController::class, 'update'])->name('home_section_update');
		Route::delete('/home-section/delete/{id}',[HomeSectionController::class, 'doDelete'])->name('home_section_delete');

		Route::get('/testimony',[TestimonyController::class, 'index'])->name('admin_testimony');
		Route::post('/testimony/create',[TestimonyController::class, 'store'])->name('testimony_create');
		Route::put('/testimony/update/{id}',[TestimonyController::class, 'update'])->name('testimony_update');
		Route::delete('/testimony/delete/{id}',[TestimonyController::class, 'delete'])->name('testimony_delete');

		Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
	});
});
