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


    // start by rakesh
    //question 
    Route::get('Settings/add_new_level','QuestionController@add_set_ques')->name('question.set_add');
    Route::post('Settings/add','QuestionController@store_set_question')->name('question.add_question_setting_form_submit');
    Route::get('questions/index/auditory','QuestionController@index')->name('question.question');

    Route::get('questions_settings_delete','QuestionController@delete_w_setting_ques')->name('question_w.delete_w_s_ques');

    Route::get('settings/wordraceSettings','QuestionController@Word_race_settings')->name('question.ques_settions_form');
    Route::get('settings/edit_w_level/{id}','QuestionController@Word_race_settings_edit')->name('question.edit_settings_form');
    Route::post('update_w_level','QuestionController@Word_race_settings_update')->name('question.update_w_level');

    Route::get('questions/add','QuestionController@add_ques')->name('question.add_question_form');
    Route::post('/add-question','QuestionController@store')->name('question.add_question_form_submit');
    Route::get('questions/edit_a/{id}','QuestionController@Word_race_question_edit')->name('ques_w.edit_wordrace_form');
    Route::post('questions/update_a','QuestionController@Word_race_question_update')->name('question.edit_w_question_form_submit');
    Route::get('questions_delete','QuestionController@delete_w_ques')->name('question_w.delete_w_ques');

    //Money contest-all money level
    Route::get('questions/all_money_level/AllMoneyLevel','MoneyController@index')->name('question.all_money_level_question_form');
    Route::get('questions/money_level','MoneyController@add_form')->name('question.add_money_level_question_form');
    Route::post('money_leve_add','MoneyController@store_money_q')->name('question.store_money_level_question_form');
    Route::get('questions/edit_money_level/{id}','MoneyController@edit_form_ques')->name('ques.edit_money_q_form');
    Route::post('update_money','MoneyController@update_form_ques')->name('question.update_money_level_question_form');
    Route::get('del_money','MoneyController@del_ques')->name('question.del_money_level_question_form');

    //Money contest-all question
    Route::get('questions/all_money_qustion','MoneyController@show')->name('question.all_money_question');
    Route::get('questions/edit_money_qustion/{id}','MoneyController@show')->name('money.edit_money_submit_form');
    Route::get('questions/delete_money_qustion','MoneyController@del_question')->name('question.del_money_question_form');
    Route::get('questions/add_money','MoneyController@add_question_money')->name('question.add_money_question_form');
    Route::post('questions/add_money_store','MoneyController@store_question_money')->name('question.add_money_submit');
    //end by rakesh



});



//start by sajol mahmud

Route::group(['middleware'=>['authMiddleware']],function(){
    Route::resource('spelling_bee', 'SpellingBeeController');
}); 

//End by sajol mahmud