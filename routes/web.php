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
        Route::get('/news/detais/{newsId}','HomeController@details')->name('blog-details');


    });

    Route::post('/checkAvailability','BookingController@availability')->name('checkAvailability');
    Route::post('/payement-initiation','BookingController@payementInitiation')->name('payment-initiation');
    Route::post('/calculate-room-amount','BookingController@calculateRoomAmount')->name('calculateRoomAmount');
    Route::post('/payment-response', 'BookingController@paymentConfirmation')->name('payment-confirmation');
    Route::get('/payment-failed', 'BookingController@paymentfailed')->name('payment-failed');
    Route::post('/payment-confirm', 'BookingController@bookingConfirmingView')->name('payment-confirming-view');

    });

//Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
//    return view('pages.admin.dashboard');
//})->name('dashboard');

//Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {

        Route::group([ 'namespace' => 'App\Http\Controllers\Admin','middleware' => ['auth:sanctum','verified']], function () {
            Route::get('/admin', 'HomeController@bookingManagementTable')->name('dashboard');
            Route::get('/admin/blog', 'HomeController@blog')->name('blog');
            Route::post('/admin/blog/store', 'HomeController@blogStore')->name('blog-store');
            Route::post('/admin/blog/store/status', 'HomeController@statusUpdate')->name('status-update');
            Route::post('/admin/blog/store/update', 'HomeController@blogUpdate')->name('blog-update');
            Route::get('/admin/blog/delete/{id}', 'HomeController@blogDelete')->name('blog-delete');

            Route::get('/admin/blog/update/{id}','HomeController@blogEdit')->name('blog-edit');
            Route::post('/admin/blog/store/{id}', 'HomeController@blogUpdate')->name('blog-update');
            Route::get('/admin/blog/delete/{id}', 'HomeController@blogDelete')->name('blog-delete');

            Route::get('/admin/room', 'RoomController@index')->name('admin.room');
            Route::post('/admin/room/store/status', 'RoomController@statusUpdate')->name('room-status-update');
            Route::post('/admin/room/store', 'RoomController@roomStore')->name('room-store');
            Route::get('/admin/room/delete/{id}', 'RoomController@roomDelete')->name('room-delete');
            Route::get('/admin/room/update/{id}','RoomController@roomEdit')->name('room-edit');
            Route::post('/admin/room/store/{id}', 'RoomController@roomUpdate')->name('room-update');
            Route::get('/admin/booking/{booked:id}','HomeController@guestDetailsManagement')->name('guestDetailsManagement');
            Route::post('/admin/booking/store/status', 'HomeController@checkInOutStatusUpdate')->name('checkinout-status-update');





        });
//});
