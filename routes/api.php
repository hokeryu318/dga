<?php

use Illuminate\Http\Request;

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
Route::post('/oauth/token', [
    'uses' => 'Auth\CustomAccessTokenController@issueUserToken'
]);

Route::middleware('auth:api')->group(function(){
    Route::post('logout', 'API\ApiController@logout');
    Route::post('get_upcoming_works', 'API\ApiController@get_upcoming_works');
    Route::post('get_category_from_equip', 'API\ApiController@get_category_from_equip');
    Route::post('get_equip_detail', 'API\ApiController@get_equip_detail');
    Route::post('get_iform_detail', 'API\ApiController@get_iform_detail');
});
