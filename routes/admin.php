<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AilmentsController;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\InnerPagesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AwardsController;
use App\Http\Controllers\Admin\OurOpeningController;
use App\Http\Controllers\Admin\TollFreeController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\SchedulesController;
use App\Http\Controllers\Admin\GalleryImagesController;

/*

|--------------------------------------------------------------------------

| API Routes

|--------------------------------------------------------------------------

|

| Here is where you can register API routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| is assigned the "api" middleware group. Enjoy building your API!

|

*/



Route::prefix('admin')->group(function(){
	
    #account setup
    Route::get('/',[AdminController::class, 'login'])->name('admin.login');
    Route::get('/login',[AdminController::class, 'login'])->name('admin.login');

    #dashboard setup
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin-login',[AdminController::class, 'admin_login'])->name('admin.admin_login');
    Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');	
	
	#accounts
    Route::get('/accounts',[AccountsController::class, 'getList'])->name('admin.accounts');
    Route::any('/accounts_paginate',[AccountsController::class, 'listPaginate'])->name('admin.accounts_paginate');
	Route::any('/edit-account/{row_id}',[AccountsController::class, 'editPage'])->name('admin.edit-account');
	Route::any('/add-account',[AccountsController::class, 'addPage'])->name('admin.add-accounts');

	#super admins
    Route::get('/admins',[AdminsController::class, 'getList'])->name('admin.admins');
    Route::any('/admins_paginate',[AdminsController::class, 'listPaginate'])->name('admin.admins_paginate');
	Route::any('/edit-admin/{row_id}',[AdminsController::class, 'editPage'])->name('admin.edit-admins');
	Route::any('/add-admin',[AdminsController::class, 'addPage'])->name('admin.add-admins');

	#ajax
	Route::post('/change-status',[AjaxController::class, 'changeStatus'])->name('admin.change-status');
    Route::post('/delete-record',[AjaxController::class, 'deleteRecord'])->name('admin.delete-record');
	
	#settings
    Route::get('/settings',[ProfileController::class, 'settings'])->name('admin.settings');
	Route::post('/save-setting',[ProfileController::class, 'saveSetting'])->name('admin.save-setting');

    #update profile
    Route::get('/update-profile',[ProfileController::class, 'updateProfile'])->name('admin.update-profile');
    Route::post('/save-profile',[ProfileController::class, 'saveProfile'])->name('admin.save-profile');

    #change password
    Route::get('/change-password',[ProfileController::class, 'changePassword'])->name('admin.change-password');
    Route::post('/update-password',[ProfileController::class, 'updatePassword'])->name('admin.dashboard');
	
	#Users
    Route::get('/users',[UsersController::class, 'getList'])->name('admin.users');
    Route::any('/users_paginate',[UsersController::class, 'listPaginate'])->name('admin.users_paginate');
    Route::any('/add-user',[UsersController::class, 'addPage'])->name('admin.add-user');
    Route::any('/edit-user/{row_id}',[UsersController::class, 'editPage'])->name('admin.edit-user');
	
	#tollfree
    Route::get('/toll-free',[TollFreeController::class, 'getList'])->name('admin.toll-free');
    Route::any('/toll_free_paginate',[TollFreeController::class, 'listPaginate'])->name('admin.toll_free_paginate');
    Route::any('/add-toll-free',[TollFreeController::class, 'addPage'])->name('admin.add-toll-free');
    Route::any('/edit-toll-free/{row_id}',[TollFreeController::class, 'editPage'])->name('admin.edit-toll-free');
	
	#categories
    Route::get('/categories',[CategoriesController::class, 'getList'])->name('admin.categories');
    Route::any('/categories_paginate',[CategoriesController::class, 'listPaginate'])->name('admin.categories_paginate');
    Route::any('/add-category',[CategoriesController::class, 'addPage'])->name('admin.add-category');
    Route::any('/edit-category/{row_id}',[CategoriesController::class, 'editPage'])->name('admin.edit-category');
	
	#categories
    Route::get('/news',[NewsController::class, 'getList'])->name('admin.news');
    Route::any('/news_paginate',[NewsController::class, 'listPaginate'])->name('admin.news_paginate');
    Route::any('/add-news',[NewsController::class, 'addPage'])->name('admin.add-news');
    Route::any('/edit-news/{row_id}',[NewsController::class, 'editPage'])->name('admin.edit-news');
	
	#categories
    Route::get('/testimonials',[TestimonialsController::class, 'getList'])->name('admin.testimonials');
    Route::any('/testimonials_paginate',[TestimonialsController::class, 'listPaginate'])->name('admin.testimonials_paginate');
    Route::any('/add-testimonial',[TestimonialsController::class, 'addPage'])->name('admin.add-testimonial');
    Route::any('/edit-testimonial/{row_id}',[TestimonialsController::class, 'editPage'])->name('admin.edit-testimonial');
			
	#FaqsController
    Route::get('/faqs',[FaqsController::class, 'getList'])->name('admin.faqs');
    Route::any('/faqs_paginate',[FaqsController::class, 'listPaginate'])->name('admin.faqs_paginate');
    Route::any('/add-faq',[FaqsController::class, 'addPage'])->name('admin.add-faq');
    Route::any('/edit-faq/{row_id}',[FaqsController::class, 'editPage'])->name('admin.edit-faq');
				
	#categories
    Route::get('/our-opening',[OurOpeningController::class, 'getList'])->name('admin.our-opening');
    Route::any('/ouropening_paginate',[OurOpeningController::class, 'listPaginate'])->name('admin.ouropening_paginate');
    Route::any('/add-our-opening',[OurOpeningController::class, 'addPage'])->name('admin.add-our-opening');
    Route::any('/edit-our-opening/{row_id}',[OurOpeningController::class, 'editPage'])->name('admin.edit-our-opening');
	
	#categories
    Route::get('/our-team',[OurTeamController::class, 'getList'])->name('admin.our-team');
    Route::any('/ourteam_paginate',[OurTeamController::class, 'listPaginate'])->name('admin.ourteam_paginate');
    Route::any('/add-our-team',[OurTeamController::class, 'addPage'])->name('admin.add-our-team');
    Route::any('/edit-our-team/{row_id}',[OurTeamController::class, 'editPage'])->name('admin.edit-our-team');
	
	#categories
    Route::get('/awards',[AwardsController::class, 'getList'])->name('admin.awards');
    Route::any('/awards_paginate',[AwardsController::class, 'listPaginate'])->name('admin.award_paginate');
    Route::any('/add-award',[AwardsController::class, 'addPage'])->name('admin.add-award');
    Route::any('/edit-award/{row_id}',[AwardsController::class, 'editPage'])->name('admin.edit-award');
	
	#blogs
    Route::get('/blogs',[BlogsController::class, 'getList'])->name('admin.blogs');
    Route::any('/blogs_paginate',[BlogsController::class, 'listPaginate'])->name('admin.blog_paginate');
    Route::any('/add-blog',[BlogsController::class, 'addPage'])->name('admin.add-blog');
    Route::any('/edit-blog/{row_id}',[BlogsController::class, 'editPage'])->name('admin.edit-blog');	
	Route::any('/add-event-images/{row_id}',[BlogsController::class, 'addEventImages'])->name('admin.add-event-images');
	Route::any('/upload-banner-images',[BlogsController::class, 'uploadGallery'])->name('admin.upload-banner-images');
	 
	#blogs
    Route::get('/inner-pages',[InnerPagesController::class, 'getList'])->name('admin.inner-pages');
    Route::any('/inner_pages_paginate',[InnerPagesController::class, 'listPaginate'])->name('admin.inner_pages_paginate');
    Route::any('/edit-inner-page/{row_id}',[InnerPagesController::class, 'editPage'])->name('admin.edit-inner-page');

	#categories
    Route::get('/contact-us',[ContactUsController::class, 'getList'])->name('admin.contact-us');
    Route::any('/contactus_paginate',[ContactUsController::class, 'listPaginate'])->name('admin.contactus_paginate');
    Route::any('/view-contact-us/{row_id}',[ContactUsController::class, 'viewPage'])->name('admin.view-contact-us');
	
	#categories
    Route::get('/schedules',[SchedulesController::class, 'getList'])->name('admin.schedule');
    Route::any('/schedules_paginate',[SchedulesController::class, 'listPaginate'])->name('admin.schedules_paginate');
    Route::any('/view-schedule/{row_id}',[SchedulesController::class, 'viewPage'])->name('admin.view-schedule');
	
	#categories
    Route::get('/newsletter',[NewsletterController::class, 'getList'])->name('admin.newsletter');
    Route::any('/newsletter_paginate',[NewsletterController::class, 'listPaginate'])->name('admin.newsletter_paginate');
	
	#products
    Route::get('/products',[ProductsController::class, 'getList'])->name('admin.products');
    Route::any('/products_paginate',[ProductsController::class, 'listPaginate'])->name('admin.products_paginate');
    Route::any('/add-product',[ProductsController::class, 'addPage'])->name('admin.add-product');
    Route::any('/edit-product/{row_id}',[ProductsController::class, 'editPage'])->name('admin.edit-product');	
	Route::any('/upload-product-images',[ProductsController::class, 'uploadProductImages'])->name('admin.upload-product-images');
	Route::any('/update-product-title',[ProductsController::class, 'updateProductTitle'])->name('admin.update-product-title');
	Route::any('/update-product-file',[ProductsController::class, 'updateProductFile'])->name('admin.update-product-file');
		
		
	#blogs
    Route::get('/banners',[GalleryController::class, 'getList'])->name('admin.banners');
    Route::any('/banners_paginate',[GalleryController::class, 'listPaginate'])->name('admin.banners_paginate');
    Route::any('/add-banner',[GalleryController::class, 'addPage'])->name('admin.add-banner');
    Route::any('/edit-banner/{row_id}',[GalleryController::class, 'editPage'])->name('admin.edit-banner');
	
    #gallery
    Route::get('/gallery/{row_id}',[GalleryImagesController::class, 'getList'])->name('admin.galleries');
    Route::any('/gallery_paginate',[GalleryImagesController::class, 'listPaginate'])->name('admin.gallery_paginate');
    Route::any('/add-gallery/{row_id}',[GalleryImagesController::class, 'addPage'])->name('admin.add-gallery');
    Route::any('/edit-gallery/{row_id}',[GalleryImagesController::class, 'editPage'])->name('admin.edit-gallery');
	
	#ajax
	Route::post('/get-sate',[AjaxController::class, 'getState'])->name('admin.get-state');
	Route::post('/get-city',[AjaxController::class, 'getCity'])->name('admin.get-city');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});