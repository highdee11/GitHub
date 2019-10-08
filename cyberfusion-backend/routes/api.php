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


Route::prefix('v1')->group(function() {

    // AUTH
    Route::post('login', "loginController@login");

    Route::get('check', "loginController@check");
    Route::get('/checkAuth',"loginController@checkAuth");
    Route::get('/refreshtoken',"loginController@reset_token");

    Route::post('reseller/{reseller_id}/servers' , 'ServerController@store');
    Route::get('reseller/{reseller_id}/servers' , 'ServerController@index');
    Route::put('reseller/{reseller_id}/servers/{server_id}' , 'ServerController@update');
    Route::delete('reseller/{reseller_id}/servers/{server_id}' , 'ServerController@destroy');
    Route::get('reseller/{keyword}/servers/search' , 'ServerController@search');
    Route::get('reseller/{keyword}/servers/orderby' , 'ServerController@orderby');


    Route::post('reseller/{reseller_id}/tags' , 'TagController@store');
    Route::get('reseller/{reseller_id}/tags' , 'TagController@index');
    Route::put('reseller/{reseller_id}/tags/{tag_id}' , 'TagController@update');
    Route::delete('reseller/{reseller_id}/tags/{tag_id}' , 'TagController@destroy');
    Route::get('reseller/{keyword}/tags/search' , 'TagController@search');
    Route::get('reseller/{keyword}/tags/orderby' , 'TagController@orderby');


    Route::post('reseller/{reseller_id}/crons' , 'CronJobController@store');
    Route::get('reseller/{reseller_id}/crons' , 'CronJobController@index');
    Route::put('reseller/{reseller_id}/crons/{cron_id}' , 'CronJobController@update');
    Route::delete('reseller/{reseller_id}/crons/{cron_id}' , 'CronJobController@destroy');
    Route::get('reseller/{keyword}/crons/search' , 'CronJobController@search');
    Route::get('reseller/{keyword}/crons/orderby' , 'CronJobController@orderby');


    Route::post('reseller/{reseller_id}/db' , 'DatabaseController@store');
    Route::get('reseller/{reseller_id}/db' , 'DatabaseController@index');
    Route::put('reseller/{reseller_id}/db/{db_id}' , 'DatabaseController@update');
    Route::delete('reseller/{reseller_id}/db/{db_id}' , 'DatabaseController@destroy');
    Route::get('reseller/{keyword}/db/search' , 'DatabaseController@search');
    Route::get('reseller/{keyword}/db/orderby' , 'DatabaseController@orderby');


    Route::post('reseller/{reseller_id}/clients' , 'ClientController@store');
    Route::get('reseller/{reseller_id}/clients' , 'ClientController@index');
    Route::put('reseller/{reseller_id}/clients/{client_id}' , 'ClientController@update');
    Route::delete('reseller/{reseller_id}/clients/{client_id}' , 'ClientController@destroy');
    Route::get('reseller/{keyword}/clients/search' , 'ClientController@search');
    Route::get('reseller/{keyword}/clients/orderby' , 'ClientController@orderby');

    Route::post('reseller/{reseller_id}/domains' , 'DomainsController@store');
    Route::get('reseller/{reseller_id}/domains' , 'DomainsController@index');
    Route::put('reseller/{reseller_id}/domains/{client_id}' , 'DomainsController@update');
    Route::delete('reseller/{reseller_id}/domains/{client_id}' , 'DomainsController@destroy');
    Route::get('reseller/{keyword}/domains/search' , 'DomainsController@search');
    Route::get('reseller/{keyword}/domains/orderby' , 'DomainsController@orderby');


    // MODELS
    Route::apiResources([
        'users' 			=> 'UserController',
//        'servers'           =>'ServerController',
//        'tags'           =>'TagController',
//        'crons'           =>'CronJobController',
    ]);


});
