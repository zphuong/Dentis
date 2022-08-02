<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

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

Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('lien-he','App\Http\Controllers\HomeController@lienHe');

// Product
Route::get('san-pham','App\Http\Controllers\HomeController@sanPham');
Route::get('san-pham/{slug}','App\Http\Controllers\ProductController@productDetail');
Route::get('advise','App\Http\Controllers\ProductController@advise');

// Blog
Route::get('tin-tuc','App\Http\Controllers\HomeController@tinTuc');
Route::get('tin-tuc/{slug}','App\Http\Controllers\BlogController@blogDetail');

//Contact
Route::get('gui-lien-he','App\Http\Controllers\MailController@contactMail');

//Search
Route::get('bao-hanh','App\Http\Controllers\HomeController@baoHanh');
Route::get('tra-cuu','App\Http\Controllers\HomeController@search');

//Login/Logout
Route::get('admin', 'App\Http\Controllers\LoginController@login');
Route::post('admin','App\Http\Controllers\LoginController@postLogin');
Route::get('logout','App\Http\Controllers\LoginController@logOut');

Route::prefix('dashboard')->middleware('CheckLogin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);

    // Insurance
    Route::prefix('insurance')->name('insurance.')->group(function(){
        // Route::post('ajax','App\Http\Controllers\InsuranceController@ajax');
        Route::get('add','App\Http\Controllers\InsuranceController@add');
        Route::post('add','App\Http\Controllers\InsuranceController@addInsurance');
        Route::get('all','App\Http\Controllers\InsuranceController@all');
        Route::get('contact','App\Http\Controllers\InsuranceController@contact');
        Route::get('old-customer','App\Http\Controllers\InsuranceController@oldCustomer');
        Route::get('qr/{id}','App\Http\Controllers\InsuranceController@qrCode');
        Route::get('edit/{id}','App\Http\Controllers\InsuranceController@getEdit');
        Route::post('edit/{id}','App\Http\Controllers\InsuranceController@postEdit');
        Route::get('delete/{id}','App\Http\Controllers\InsuranceController@delete');
        Route::get('search','App\Http\Controllers\InsuranceController@search');
        Route::get('updatecustomer/{id}','App\Http\Controllers\InsuranceController@updateCustomer');
        Route::get('deletecustomer/{id}','App\Http\Controllers\InsuranceController@deleteCustomer');
    });

    //Product
    Route::prefix('product')->group(function (){
        Route::get('/','App\Http\Controllers\ProductController@all');
        Route::get('add','App\Http\Controllers\ProductController@add');
        Route::post('add','App\Http\Controllers\ProductController@postAdd');
        Route::get('edit/{id}','App\Http\Controllers\ProductController@edit');
        Route::post('update/{id}','App\Http\Controllers\ProductController@update');
        Route::get('delete/{id}','App\Http\Controllers\ProductController@delete');
    });

    //Card
    Route::prefix('card')->group(function (){
        Route::get('/','App\Http\Controllers\CardController@all');
        Route::get('update','App\Http\Controllers\CardController@update');
    });

    //Blog
    Route::prefix('blog')->group(function (){
        Route::get('/','App\Http\Controllers\BlogController@all');
        Route::get('add','App\Http\Controllers\BlogController@add');
        Route::post('add','App\Http\Controllers\BlogController@create');
        Route::get('edit/{id}','App\Http\Controllers\BlogController@edit');
        Route::post('update/{id}','App\Http\Controllers\BlogController@update');
        Route::get('delete/{id}','App\Http\Controllers\BlogController@delete'); 
    });

    //User
    Route::prefix('user')->group(function(){
        Route::get('/','App\Http\Controllers\UserController@all');
        Route::post('add','App\Http\Controllers\UserController@add');
        Route::get('edit/{id}','App\Http\Controllers\UserController@edit');
        Route::post('edit/{id}','App\Http\Controllers\UserController@update');
        Route::get('delete/{id}','App\Http\Controllers\UserController@delete');
    });

    //Page
    Route::prefix('page')->group(function(){
        Route::get('/',[PageController::class, 'all']);
        Route::get('add',[PageController::class, 'add']);
        Route::post('add',[PageController::class, 'postAdd']);
        Route::get('edit/{id}',[PageController::class, 'edit']);
        Route::post('edit/{id}',[PageController::class, 'postEdit']);
        Route::get('delete/{id}',[PageController::class, 'delete']);
    });

});

//Page
Route::get('{slug}','App\Http\Controllers\PageController@getPage');