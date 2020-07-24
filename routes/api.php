<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('common-routes')->group(function () { });

    Route::prefix('user-routes')->group(function () {
        Route::post('register', 'UserController@postRegister');
        Route::post('oauth2/token', 'LocalOAuth2Controller@AccessToken');
        Route::post('oauth2/token/refresh', 'LocalOAuth2Controller@RefreshToken');

        Route::middleware('auth:api:users')->group(function () {
            Route::get('account', 'UserControllers\UserController@getAccount');
            Route::get('service-providers', 'UserControllers\ServiceProviderController@getServiceProviders');
        });
    });

    // TODO: Add
    Route::prefix('service-provider-routes')->group(function () {
        // TODO: Add

        Route::middleware('api:serviceProviders')->group(function () {
            // TODO: Add
        });
    });
});
