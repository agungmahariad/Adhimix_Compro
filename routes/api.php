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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-parent','C_content@getParent');
Route::get('activeLink/{id}/{stat}','C_content@activeLink');
Route::get('publish/{id}/{stat}','C_content@publish');
Route::get('activeLinkContent/{id}/{stat}','C_content@activeLinkContent');
Route::get('publishContent/{id}/{stat}','C_content@publishContent');
Route::get('activeLinkHeadline/{id}/{stat}','C_content@activeLinkHeadline');
Route::get('publishHeadline/{id}/{stat}','C_content@publishHeadline');

Route::get('activeLinkList/{id}/{stat}','C_content@activeLinkList');
Route::get('publishList/{id}/{stat}','C_content@publishList');
