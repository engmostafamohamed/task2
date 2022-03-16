<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\serviceProviderController;
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


Route::group(['prefix' => 'serviceProvider'], function () {
    Route::get('check', [serviceProviderController::class, 'check']);
    Route::any('login', [serviceProviderController::class, 'login'])->name('alogin');
    Route::group(['middleware' => 'serviceProvider'], function () {
        Route::get('/', function () {
            return 'serviceProvider';
        });
    });
});

