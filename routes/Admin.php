<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

// Route::group(['middleware'=>'admin'],function () {
//     // Route::get('/login', 'AdminPostsController');

//     Route::get('/', function () {
//         return 'admin';
//     });
// });


Route::group(['prefix' => 'admin'], function () {
    Route::get('check', [adminController::class, 'check']);
    Route::any('login', [adminController::class, 'login'])->name('login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', function () {
            return 'admin';
        });
    });
});


