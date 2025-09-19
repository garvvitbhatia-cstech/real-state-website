<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExportController;

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

Route::prefix('admin')->group(function () {

	Route::any('/export-category',[ExportController::class, 'exportCategory'])->name('exports.category');
	Route::any('/export-product',[ExportController::class, 'exportProduct'])->name('exports.product');
	Route::any('/export-enquiry',[ExportController::class, 'exportEnquiry'])->name('exports.enquiry');
	Route::any('/export-team',[ExportController::class, 'exportTeam'])->name('exports.team');
	Route::any('/export-newsletter',[ExportController::class, 'exportNewsletter'])->name('exports.newsletter');
	Route::any('/export-news',[ExportController::class, 'exportNews'])->name('exports.news');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});