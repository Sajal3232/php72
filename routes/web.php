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
Route::get('/product-details/{id}',[
    'uses' => 'App\Http\Controllers\NewShopController@productdetails',
    'as' => 'product-details'
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