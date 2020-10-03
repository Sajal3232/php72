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
Route::get('/catagory-product',[
    'uses' => 'App\Http\Controllers\NewShopController@categoryProduct',
    'as' => 'category-product'
]);

Route::get('/mail-us',[
    'uses' => 'App\Http\Controllers\NewShopController@mailUs',
    'as' => 'mail-us'
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
