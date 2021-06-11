<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/about', function () {
    return view('pages.about');
});
Route::resource('posts', 'App\Http\Controllers\PostsController');
Auth::routes();



Route::resource('admin/landingpage', 'App\Http\Controllers\AdminController');
Route::resource('admin/usercontrol', 'App\Http\Controllers\AdminControllerUsers');


// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('posts', PostsController::class);
// });
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
