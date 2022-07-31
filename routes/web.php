<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });





Route::get('/','Frontend\FrontendController@index')->name('index');
Route::get('/category','Frontend\FrontendController@category')->name('user.categories');
Route::get('view-category/{slug}','Frontend\FrontendController@viewCategory')->name('view.category');
Route::get('product-page/{category_slug}/{product_slug}','Frontend\FrontendController@showProduct')->name('product.page');

// Routes for User

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard','Admin\FrontendController@index')->name('admin.index');

    // Routes for AdminCategories

    Route::get('categories','Admin\CategoryController@index')->name('admin.categories.index');
    Route::get('categories/create','Admin\CategoryController@create')->name('admin.categories.create');
    Route::post('categories','Admin\CategoryController@store')->name('admin.categories.store');
    Route::get('/categories/{id}/edit','Admin\CategoryController@edit')->name('admin.categories.edit');
    Route::patch('/categories/{id}','Admin\CategoryController@update')->name('admin.categories.update');
    Route::get('/categories/{id}','Admin\CategoryController@destroy')->name('admin.categories.destroy');
    
    // Routes for AdminProducts
    Route::get('products','Admin\ProductController@index')->name('admin.products.index');
    Route::get('products/create','Admin\ProductController@create')->name('admin.products.create');
    Route::post('products','Admin\ProductController@store')->name('admin.products.store');
    Route::get('/products/{id}/edit','Admin\ProductController@edit')->name('admin.products.edit');
    Route::patch('/products/{id}','Admin\ProductController@update')->name('admin.products.update');
    Route::get('/products/{id}','Admin\ProductController@destroy')->name('admin.products.destroy');
    

    });





