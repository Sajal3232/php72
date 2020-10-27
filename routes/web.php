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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/','App\Http\Controllers\StudentController@index');

//  Route::get('/',[
//      'uses'=> 'App\Http\Controllers\StudentController@index',
//      'as'=>'/'
//  ]);
//  Route::get('/about',[
//     'uses'=> 'App\Http\Controllers\StudentController@add',
//     'as'=>'/about'
// ]);

Route::get('/',[
    'uses' => 'App\Http\Controllers\NewShopController@index',
    'as' => '/'
]);
Route::get('/catagory-product/{id}',[
    'uses' => 'App\Http\Controllers\NewShopController@categoryProduct',
    'as' => 'category-product'
]);
Route::get('/product-details/{id}/{name}',[
    'uses' => 'App\Http\Controllers\NewShopController@productdetails',
    'as' => 'product-details'
]);

// add to cart
Route::post('/cart/add',[
    'uses' => 'App\Http\Controllers\CartController@addtocart',
    'as' => 'add-to-cart'
]);
Route::get('/cart/show',[
    'uses' => 'App\Http\Controllers\CartController@showcart',
    'as' => 'show-cart'
]);
Route::get('/cart/show',[
    'uses' => 'App\Http\Controllers\CartController@showcart',
    'as' => 'show-cart'
]);
Route::get('/cart/delete/{uniqueid}',[
    'uses' => 'App\Http\Controllers\CartController@deletecartitem',
    'as' => 'delete-cart-item'
]);
Route::post('/cart/update',[
    'uses' => 'App\Http\Controllers\CartController@updatecartitem',
    'as' => 'update-cart-quantity'
]);
// ////checkout
Route::get('/cart/checkout',[
    'uses' => 'App\Http\Controllers\CheckoutController@index',
    'as' => 'checkout'
]);

Route::post('/customer/registration',[
    'uses' => 'App\Http\Controllers\CheckoutController@customersignup',
    'as' => 'customer-sign-up'
]);

Route::get('/checkout/shipping',[
    'uses' => 'App\Http\Controllers\CheckoutController@shippingForm',
    'as' => 'checkout-shipping'
]);

Route::post('/shipping/save',[
    'uses' => 'App\Http\Controllers\CheckoutController@saveshippinginfo',
    'as' => 'new-shipping'
]);
Route::get('/checkout/payment',[
    'uses' => 'App\Http\Controllers\CheckoutController@paymentForm',
    'as' => 'checkout-payment'
]);

Route::post('/checkout/order',[
    'uses' => 'App\Http\Controllers\CheckoutController@newOrder',
    'as' => 'new-order'
]);

Route::get('/complete/order',[
    'uses' => 'App\Http\Controllers\CheckoutController@completeOrder',
    'as' => 'complete-order'
]);

////customer login
Route::post('/checkout/customer-login',[
    'uses' => 'App\Http\Controllers\CheckoutController@customerlogincheck',
    'as' => 'customer-login'
]);

////customer-logout from header
Route::post('/checkout/customer-logout',[
    'uses' => 'App\Http\Controllers\CheckoutController@customerlogoutfromheader',
    'as' => 'customer-logout'
]);

Route::get('/checkout/new-customer-login',[
    'uses' => 'App\Http\Controllers\CheckoutController@customerloginfromheader',
    'as' => 'new-customer-login'
]);


////customer login from fornt
Route::post('/checkout/new-customer-login-front',[
    'uses' => 'App\Http\Controllers\CheckoutController@newcustomerloginfront',
    'as' => 'new-customer-login-front'
]);






Route::get('/mail-us',[
    'uses' => 'App\Http\Controllers\NewShopController@mailUs',
    'as' => 'mail-us'
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/add',[
    'uses'=>"App\Http\Controllers\CategoryController@index",
    'as'=>'category/add-category'
]);
Route::get('/category/manage',[
    'uses'=>"App\Http\Controllers\CategoryController@manage",
    'as'=>'category/manage-category'
]);
Route::post('/category/new-category',[
    'uses'=>"App\Http\Controllers\CategoryController@savecategoryinfo",
    'as'=>'category/new-category'
]);
Route::get('/category/unpublished/{id}',[
    'uses'=>"App\Http\Controllers\CategoryController@unpublishedcategoryinfo",
    'as'=>'unpublished-category'
]);
Route::get('/category/published/{id}',[
    'uses'=>"App\Http\Controllers\CategoryController@publishedcategoryinfo",
    'as'=>'published-category'
]);
Route::get('/category/edit/{id}',[
    'uses'=>"App\Http\Controllers\CategoryController@editcategoryinfo",
    'as'=>'edit-category'
]);
Route::post('/category/update',[
    'uses'=>"App\Http\Controllers\CategoryController@updatecategoryinfo",
    'as'=>'update-category'
]);
Route::get('/category/delete/{id}',[
    'uses'=>"App\Http\Controllers\CategoryController@deletecategoryinfo",
    'as'=>'delete-category'
]);
// brand==========
Route::get('/brand/add',[
    'uses'=>"App\Http\Controllers\brandController@index",
    'as'=>'brand/add'
]);
Route::post('/brand/save',[
    'uses'=>"App\Http\Controllers\brandController@savebrand",
    'as'=>'new-brand'
]);
Route::get('/brand/product',[
    'uses'=>"App\Http\Controllers\brandController@brandsproduct",
    'as'=>'brands-product'
]);
//product
Route::get('/product/add',[
    'uses'=>"App\Http\Controllers\productController@index",
    'as'=>'product/add'
]);
Route::post('/product/save',[
    'uses'=>"App\Http\Controllers\productController@saveproduct",
    'as'=>'product/new'
]);
Route::get('/product/manage',[
    'uses'=>"App\Http\Controllers\productController@manageproduct",
    'as'=>'product/manage'
]);
Route::get('/product/edit/{id}',[
    'uses'=>"App\Http\Controllers\productController@editproduct",
    'as'=>'product/edit'
]);

Route::post('/product/update',[
    'uses'=>"App\Http\Controllers\productController@updateproduct",
    'as'=>'product/update'
]);
