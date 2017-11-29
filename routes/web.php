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


Route::get('/', 'Controller@getHome');

Route::get('/login', function(){
    return view('login');
});

Route::get('/checkout', 'ProductController@checkout');

Route::get('/cart', 'ProductController@viewCart');

Route::get('/product-details', function(){
    return view('product-details');
});

Route::get('/shop', function(){
    return view('shop');
});

Route::get('/blog', function(){
    return view('blog');
});

Route::get('/blog-single', function(){
    return view('blog-single');
});

Route::get('/contact-us', function(){
    return view('contact-us');
});


////////////////////////////////////////////////
Route::get('session/get', 'UserController@getSession');
Route::get('session/put', 'UserController@putSession');
Route::get('session/forget', 'UserController@forgetSession');

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as'   => 'addToCart'
]);
