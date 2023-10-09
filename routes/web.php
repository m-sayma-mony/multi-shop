<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductContorller;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


// Frontend Start
Route::get('/', [HomeController::class, 'index'])->name('home');
// Frontend End

// Backend Start
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/manage', [CategoryController::class, 'index'])->name('admin.category.manage');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
// Backend End

Route::resource('products', ProductContorller::class);