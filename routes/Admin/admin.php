<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {

    Auth::routes();
    Route::group(['middleware' => ['auth:admin']], function () {

    });
});
