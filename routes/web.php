<?php
/**
 * Author: thangkt
 */


Route::get('/', 'HomeController@index')->name('home');

Route::get('/checkout', 'ProductController@checkout');

Route::get('/cart', 'ProductController@viewCart');

Route::get('/product-details', function(){
    return view('product-details');
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

Route::post('/upload', [
    'as'=>'upload',
    'uses'=>'ProductController@upload'
]);

Route::get('/add_product', 'ProductController@getUploadPage')->middleware('auth');

Route::get('/edit_product', 'ProductController@editProduct')->middleware('auth');

Route::post('/edit', [
    'as'=>'edit',
    'uses'=>'ProductController@edit'
]);

Route::post('/search', [
    'as'=>'search',
    'uses'=>'ProductController@search'
]);

Route::post('/postInforCustomer', [
    'as'=>'postInforCustomer',
    'uses'=>'ProductController@postInforCustomer'
]);










































/**
 * get data by json
 */
Route::get('/getOrders', 'JsonController@getOrders');

Route::get('/getCart', 'JsonController@getCart');

Route::post('/changeStatus', [
    'as'=>'changeStatus',
    'uses'=>'JsonController@changeStatus'
]);

// get data
Route::get('/getJsonProducts', 'JsonController@getJsonProducts');

Route::get('/getJsonEmployees', 'JsonController@getJsonEmployees');

Route::get('/getJsonExportReceiptes', 'JsonController@getJsonExportReceiptes');

Route::get('/getJsonImportReceiptes', 'JsonController@getJsonImportReceiptes');

Route::get('/getJsonSuppliers', 'JsonController@getJsonSuppliers');

Route::get('/getJsonManagers', 'JsonController@getJsonManagers');

Route::get('/getJsonAccounts', 'JsonController@getJsonAccounts');

Route::get('/getDefaultSalary', 'JsonController@getDefaultSalary');
// post data

Route::post('/saveJsonProducts', [
    'as'=>'saveJsonProducts',
    'uses'=>'JsonController@saveJsonProducts'
]);

Route::post('/updateJsonProducts', [
    'as'=>'updateJsonProducts',
    'uses'=>'JsonController@updateJsonProducts'
]);

Route::post('/saveJsonEmployees', [
    'as'=>'saveJsonEmployees',
    'uses'=>'JsonController@saveJsonEmployees'
]);

Route::post('/updateJsonEmployees', [
    'uses'=>'JsonController@updateJsonEmployees',
    'as'=>'updateJsonEmployees'
]);

Route::post('/saveJsonExportReceipt',[
    'as'=>'saveJsonExportReceipt',
    'uses'=>'JsonController@saveJsonExportReceipt'
]);

Route::post('/updateJsonExportReceipt', [
    'as'=>'updateJsonExportReceipt',
    'uses'=>'JsonController@updateJsonExportReceipt'
]);

Route::post('/saveJsonImportReceipt', [
    'as'=>'saveJsonImportReceipt',
    'uses'=>'JsonController@saveJsonImportReceipt'
]);

Route::post('/updateJsonImportReceipt', [
    'as'=>'updateJsonImportReceipt',
    'uses'=>'JsonController@updateJsonImportReceipt'
]);

Route::post('/saveJsonSupplier', [
    'as'=>'saveJsonSupplier',
    'uses'=>'JsonController@saveJsonSupplier'
]);

Route::post('/loginApp', [
    'as'=>'loginApp',
    'uses'=>'JsonController@loginApp'
]);

Route::post('/saveJsonManager', [
    'as'=>'saveJsonManager',
    'uses'=>'JsonController@saveJsonManager'
]);

Route::post('/updateJsonManager', [
    'as'=>'updateJsonManager',
    'uses'=>'JsonController@updateJsonManager'
]);

Route::post('/saveJsonAccount', [
    'as'=>'saveJsonAccount',
    'uses'=>'JsonController@saveJsonAccount'
]);

Route::post('/updateJsonAccount', [
    'as'=>'updateJsonAccount',
    'uses'=>'JsonController@updateJsonAccount'
]);

Route::post('/getManagerById', [
    'as'=>'getManagerById',
    'uses'=>'JsonController@getManagerById'
]);

Route::post('/employee2manager', [
    'as'=>'employee2manager',
    'uses'=>'JsonController@employee2manager'
]);
















////////////////////////////////////////////////
Route::get('session/get', 'UserController@getSession');
Route::get('session/put', 'UserController@putSession');
Route::get('session/forget', 'UserController@forgetSession');

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as'   => 'addToCart'
]);

Route::get('/delete_item/{id}',[
    'uses' => 'ProductController@delete_item',
    'as' => 'delete_item'
]);

Route::get('/plus/{id}',[
    'uses' => 'ProductController@plus',
    'as' => 'plus'
]);

Route::get('/subtract/{id}',[
    'uses' => 'ProductController@subtract',
    'as' => 'subtract'
]);

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{type}', 'HomeController@get_category');

Route::get('/test_post',function(){
    return view('test_post');
});
