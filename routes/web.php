<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CaptchaController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[PagesController::class, 'index'])->name('pages.index');
Route::get('/unit-plan/{slug}',[PagesController::class, 'unitPlan'])->name('pages.unit-plan');
Route::any('/get-unit-images',[AjaxController::class, 'getUnitImages'])->name('pages.get-unit-images');

Route::get('/about-us',[PagesController::class, 'aboutUs'])->name('pages.about-us');
Route::get('/our-team',[PagesController::class, 'ourTeam'])->name('pages.our-team');
Route::get('/blogs/{slug?}',[PagesController::class, 'blog'])->name('pages.blog');
Route::get('/contact-us',[PagesController::class, 'contactUs'])->name('pages.contact-us');
Route::get('/news',[PagesController::class, 'news'])->name('pages.news');
Route::get('/terms-and-conditions',[PagesController::class, 'termsAndConditions'])->name('pages.terms-and-conditions');
Route::get('/virtual-tour',[PagesController::class, 'virtualTour'])->name('pages.virtual-tour');
Route::get('/privacy-policy',[PagesController::class, 'privacyPolicy'])->name('pages.privacy-policy');
Route::get('/projects',[PagesController::class, 'projects'])->name('pages.projects');
Route::get('/product/{slug}',[PagesController::class, 'product'])->name('pages.product');
Route::get('/amenities/{slug?}',[PagesController::class, 'amenities'])->name('pages.amenities');
Route::get('/gallery/{slug?}/{folder?}',[PagesController::class, 'gallery'])->name('pages.gallery');
Route::get('/pages/{slug?}',[PagesController::class, 'innerPages'])->name('pages.inner-pages');
Route::get('/event-details/{slug?}',[PagesController::class, 'eventDetails'])->name('pages.event-details');
Route::get('/site-map',[PagesController::class, 'siteMap'])->name('pages.site-map');

Route::any('/get-toll-free',[AjaxController::class, 'getTollFree'])->name('pages.get-toll-free');
Route::any('/get-news',[AjaxController::class, 'getNews'])->name('pages.get-news');
Route::any('/search-projects',[AjaxController::class, 'searchProjects'])->name('pages.search-projects');
Route::any('/save-newsletter',[AjaxController::class, 'saveNewsletter'])->name('pages.save-newsletter');
Route::any('/save-schedule',[AjaxController::class, 'saveSchedule'])->name('pages.save-schedule');
Route::any('/get-category-images',[AjaxController::class, 'getCategoryImages'])->name('pages.get-category-images');

Route::get('/my-captcha', [CaptchaController::class, 'myCaptcha'])->name('pages.my-captcha');
Route::post('/my-captcha', [CaptchaController::class, 'myCaptchaPost'])->name('pages.my-captcha-post');
Route::get('/refresh_captcha', [CaptchaController::class, 'refreshCaptcha'])->name('pages.refresh_captcha');


require "api.php";
require "admin.php";
require "export.php";
require "import.php";
require "vendor.php";
require "report.php";