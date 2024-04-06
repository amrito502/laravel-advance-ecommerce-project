<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',[AuthController::class,'admin_login'])->name('admin.login');
Route::post('/admin',[AuthController::class,'auth_login_admin'])->name('auth.admin.login');
Route::get('/admin/logout',[AuthController::class,'admin_logout'])->name('admin.logout');
// ======admin routes group========
Route::group(['middleware' => 'admin'], function(){

Route::get('/admin/dashboard',[DashboardController::class,'admin_dashboard'])->name('admin.dashboard');
Route::get('/admin/admin/list',[DashboardController::class,'admin_lists'])->name('admin.lists');


});





