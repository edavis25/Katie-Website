<?php

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
    //$category = App\Category::find(1);
    //dd($category->products);
    //return view('welcome');
    return view('home');
});

Route::resource('products', 'ProductsController');
Route::resource('category', 'CategoryController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function() {
  return view('admin');
})->middleware('isAdmin');
