<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\VisitorapiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/store', [VisitorapiController::class, 'store'])->name('visitor.store');
Route::get('/visitor_exist', [VisitorapiController::class, 'visitorExist'])->name('visitor.exist');
Route::get('/visitor_logs',[VisitorapiController::class,'visitorLog'])->name('get.visitor.log');
Route::get('/visitor_list', [VisitorapiController::class, 'index'])->name('visitor.list');
Route::get('/visitor_search', [VisitorapiController::class, 'visitorSearch'])->name('visitor.seacrh');
Route::get('/visitor_log_search', [VisitorapiController::class, 'visitorLogSearch'])->name('visitor.log.seacrh');
;
Route::post('/visitor_checkout', [VisitorapiController::class, 'visitorCheckout'])->name('visitor.checkout');
