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

Route::get('/', 'ProductController@index');

Route::get('/login', function () {
    return view('login');
});
//Logout the user
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

Route::post('/login', 'UserController@login');

//To get to the detail page of a product
Route::get('/product/{id}', 'ProductController@product');
//To get to the search page
Route::get('/search', 'ProductController@search');
//Route to add items to cart
Route::post('/add_to_cart', 'ProductController@addToCart');
//Get the Cart List
Route::get('/cartList', 'ProductController@getCartList');
