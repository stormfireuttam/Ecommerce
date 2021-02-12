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


use App\Product;

Route::get('/', 'ProductController@index');

//Login User
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', 'UserController@login');

//Register Account
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', 'UserController@register');

//Logout the user
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

//Display all products
//Route::get('/products', function () {
//    $data = Product::all();
//     return view('products', compact('data'));
//});
Route::get('/products', 'ProductController@show')->name('products');
Route::get('/products/{name}', 'ProductController@showCategoryWise');

//To get to the detail page of a product
Route::get('/product/{id}', 'ProductController@product');
//To get to the search page
Route::get('/search', 'ProductController@search');
//Route to add items to cart
Route::post('/add_to_cart', 'ProductController@addToCart');
//Get the Cart List
Route::get('/cartList', 'ProductController@getCartList');
//Remove Product from Cart
Route::get('/removeCart/{id}', 'ProductController@removeCart');
//Order Now
Route::get('/orderNow', 'ProductController@orderNow');
//Place Order
Route::post('/placeOrder', 'ProductController@placeOrder');
//View All Orders of a User
Route::get('/myorders', 'ProductController@orders');


//Route to send Mails to Users
//Route::get('/send', 'mailController@send');