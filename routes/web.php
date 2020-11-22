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

//Route::get('/', function () {
//    return view('pages.user.home.welcome');
//});

Route::group(['middleware' => ['guest'], 'namespace' => 'App\Http\Controllers\User'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about-us','HomeController@aboutUs')->name('about-us');
    Route::get('/contact','HomeController@contact')->name('contact');
    Route::get('/room','HomeController@room')->name('room');

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
        Route::get('/news','HomeController@blog')->name('blog');
        Route::get('/news/detais','HomeController@details')->name('blog-details');


    });



    });

//Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
//    return view('pages.admin.dashboard');
//})->name('dashboard');

//Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {

        Route::group([ 'namespace' => 'App\Http\Controllers\Admin','middleware' => ['auth:sanctum','verified']], function () {
            Route::get('/admin', 'HomeController@booking')->name('dashboard');
            Route::get('/admin/blog', 'HomeController@blog')->name('blog');
            Route::post('/admin/blog/store', 'HomeController@blogStore')->name('blog-store');
            Route::post('/admin/blog/store/status', 'HomeController@statusUpdate')->name('status-update');


        });
//});
