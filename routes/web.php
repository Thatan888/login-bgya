<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StudentController;



Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */

    Route::get('form',[StudentController::class,'index']);
    Route::get('/autocomplete-student', [StudentController::class, 'autocomplete'])->name('autocomplete.student');

    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/app', 'HomeController@app')->name('home.app');
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */

        Route::resource('students', StudentController::class);
        Route::resource('applications', ApplicationController::class);
        Route::get('/users', [Controller::class, 'index'])->name('users.index');
    });
});
