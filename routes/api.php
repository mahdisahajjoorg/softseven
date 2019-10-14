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


// Api
Route::group(['prefix'=>'client','namespace'=>'api'], function(){
	//Schools Api
	Route::get('requestAllSchool', 'apiSchoolController@getAllSchoolName');
	Route::get('check_school', 'apiSchoolController@getSchool');
	Route::get('fastcodenew', 'apiSchoolController@fastcodenew');

	//Student Api
	Route::get('request_fastcode', 'ApiStudentController@getStudent');
	Route::get('request_screenname', 'ApiStudentController@request_screenname');

});