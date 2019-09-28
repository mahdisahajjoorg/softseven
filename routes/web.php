<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','HomeBaseController@login_form')->name('home_base.login_form');
Route::post('/login-submit','HomeBaseController@login_form_submit')->name('home_base.login_form_submit');
Route::group(['middleware'=>['authMiddleware']],function(){
    Route::get('/logout','HomeBaseController@logout')->name('home_base.logout');

    // Employee
    Route::get('/employees','EmployeeController@index')->name('employee.index');
    Route::get('/add-employee','EmployeeController@add_employee_form')->name('employee.add_employee_form');
    Route::post('/add-employee','EmployeeController@add_employee_form_submit')->name('employee.add_employee_form_submit');
    Route::get('/edit-employee/{id}','EmployeeController@edit_employee_form')->name('employee.edit_employee_form');
    Route::post('/edit-employee','EmployeeController@edit_employee_form_submit')->name('employee.edit_employee_form_submit');
    Route::get('/delete-employee','EmployeeController@delete_employee')->name('employee.delete_employee');

    // Schools
    Route::get('/schools','SchoolController@index')->name('school.index');
    Route::get('/add-school','SchoolController@add_school_form')->name('school.add_school_form');
    Route::post('/add-school','SchoolController@add_school_form_submit')->name('school.add_school_form_submit');
    Route::post('/get-county','SchoolController@get_county')->name('school.get_country');
    Route::get('/edit-school/{id}','SchoolController@edit_school_form')->name('school.edit_school_form');
    Route::post('/edit-school','SchoolController@edit_school_form_submit')->name('school.edit_school_form_submit');
    Route::post('/check-schoolcode','SchoolController@check_schoolcode')->name('school.check_schoolcode');
    Route::post('/get-county-one','SchoolController@get_county_one')->name('school.get_county_one');
    Route::get('/school-memo/{id}','SchoolController@school_memo')->name('school.school_memo');
    Route::get('/add-memo','SchoolController@add_memo_form')->name('school.add_memo_form');
    Route::post('/add-memo','SchoolController@add_memo_form_submit')->name('school.add_memo_form_submit');
    Route::get('/edit-memo/{id}','SchoolController@edit_memo_form')->name('school.edit_memo_form');
    Route::post('/edit-memo','SchoolController@edit_memo_form_submit')->name('school.edit_memo_form_submit');
    Route::post('/delete-memo','SchoolController@delete_memo')->name('school.delete_memo');
    Route::get('/school-expired','SchoolController@school_expired')->name('school.school_expired');
    Route::get('/edit-expire-month/{id}/{month}','SchoolController@edit_expire_month')->name('school.edit_expire_month');

    //Game Level
    Route::get('/game-level','GameLevelController@index')->name('game.index');
    Route::get('/add-game-level','GameLevelController@add_game_level_form')->name('game.add_game_level_form');
    Route::post('/add-game-level','GameLevelController@add_game_level_form_submit')->name('game.add_game_level_form_submit');
    Route::post('/edit-game-level','GameLevelController@edit_game_level')->name('game.edit_game_level');
    Route::post('/delete-game-level','GameLevelController@delete_game_level')->name('game.delete_game_level');

});



//start by sajol mahmud

Route::group(['middleware'=>['authMiddleware']],function(){
    Route::resource('allgrade', 'SpellingBeeController');
    Route::get('/delete-grade','SpellingBeeController@delete_grade')->name('spelling_bee.delete_grade');

    //al weeks
    
    Route::get('questions/allweek','SpellingBeeController@allWeek')->name('all_week');
    Route::get('questions/allweek/edit{id}','SpellingBeeController@weekEdit')->name('all_week.edit');
    Route::get('questions/allweek/create','SpellingBeeController@weekCreate')->name('all_week.create');
    Route::get('questions/allweek/save','SpellingBeeController@weekSave')->name('all_week.save');
    Route::get('questions/allweek/update/{id}','SpellingBeeController@weekUpdate')->name('all_week.update');
    Route::get('questions/allweek/delete','SpellingBeeController@weekdelete')->name('all_week.delete');



    //all question
    
    Route::get('questions','SpellingBeeController@allQuestion')->name('questions');
    Route::get('questions/edit{id}','SpellingBeeController@questionEdit')->name('questions.edit');
    Route::get('questions/create','SpellingBeeController@questionCreate')->name('questions.create');
    Route::get('questions/save','SpellingBeeController@questionSave')->name('questions.save');
    Route::get('questions/update/{id}','SpellingBeeController@questionUpdate')->name('questions.update');
    Route::get('questions/delete','SpellingBeeController@questionDelete')->name('questions.delete');
}); 

//End by sajol mahmud