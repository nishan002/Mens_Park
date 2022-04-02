<?php

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


// Landing Page directories
Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('homepage');
Route::get('/product_view', [App\Http\Controllers\HomePageController::class, 'product_view'])->name('product_view');
Route::get('/outlet_view', [App\Http\Controllers\HomePageController::class, 'outlet_view'])->name('outlet_view');
Route::get('/outlet_map', [App\Http\Controllers\HomePageController::class, 'outlet_map'])->name('outlet_map');
Route::get('/about_me', [App\Http\Controllers\HomePageController::class, 'about_me'])->name('about_me');
Route::get('/contact', [App\Http\Controllers\HomePageController::class, 'contact'])->name('contact');

// Route for searching products and outlets
Route::get('/search_products', [App\Http\Controllers\HomePageController::class, 'search_products'])->name('search_products');
Route::get('/search_outlets', [App\Http\Controllers\HomePageController::class, 'search_outlets'])->name('search_outlets');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index'])->name('dashboard');
    
// Route for the Categories
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');
    Route::get('/add_category', [App\Http\Controllers\Admin\CategoryController::class, 'add_category'])->name('add_category');
    Route::post('/store_category', [App\Http\Controllers\Admin\CategoryController::class, 'store_category'])->name('store_category');
    Route::get('/edit_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
    Route::put('/update_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');  
    Route::get('/delete_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');  
    Route::get('/category_search', [App\Http\Controllers\Admin\CategoryController::class, 'category_search'])->name('category_search');  

// Route for the Products
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
    Route::get('/add_product', [App\Http\Controllers\Admin\ProductController::class, 'add_product'])->name('add_product');
    Route::post('/store_product', [App\Http\Controllers\Admin\ProductController::class, 'store_product'])->name('store_product');
    Route::get('/edit_product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
    Route::put('/update_product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');  
    Route::get('/delete_product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
    Route::get('/product_search', [App\Http\Controllers\Admin\ProductController::class, 'product_search'])->name('product_search');  


// Route for the Outlets
    Route::get('/outlets', [App\Http\Controllers\Admin\OutletController::class, 'index'])->name('outlets');
    Route::get('/add_outlet', [App\Http\Controllers\Admin\OutletController::class, 'add_outlet'])->name('add_outlet');
    Route::post('/store_outlet', [App\Http\Controllers\Admin\OutletController::class, 'store_outlet'])->name('store_outlet');
    Route::get('/edit_outlet/{id}', [App\Http\Controllers\Admin\OutletController::class, 'edit'])->name('edit');
    Route::put('/update_outlet/{id}', [App\Http\Controllers\Admin\OutletController::class, 'update'])->name('update');  
    Route::get('/delete_outlet/{id}', [App\Http\Controllers\Admin\OutletController::class, 'destroy'])->name('destroy');
    Route::get('/outlet_search', [App\Http\Controllers\Admin\OutletController::class, 'outlet_search'])->name('outlet_search');  

});