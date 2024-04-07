<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\categoryController;
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
Route::get('/admin/admin/list',[AdminController::class,'admin_lists'])->name('admin.lists');
Route::get('/admin/admin/add',[AdminController::class,'admin_add'])->name('admin.add');
Route::post('/admin/admin/add',[AdminController::class,'insert'])->name('admin.insert');
Route::get('/admin/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
Route::post('/admin/admin/edit/{id}',[AdminController::class,'update'])->name('admin.update');
Route::get('/admin/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');


Route::get('/admin/category/list',[categoryController::class,'category_lists'])->name('category.lists');
Route::get('/admin/category/add',[categoryController::class,'category_add'])->name('category.add');
Route::post('/admin/category/add',[categoryController::class,'category_insert'])->name('category.insert');
Route::get('/admin/category/edit/{id}',[categoryController::class,'category_edit'])->name('category.edit');
Route::post('/admin/category/edit/{id}',[categoryController::class,'category_update'])->name('category.update');
Route::get('/admin/category/delete/{id}',[categoryController::class,'category_delete'])->name('category.delete');



});





