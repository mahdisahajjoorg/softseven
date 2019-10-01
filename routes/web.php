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


    //Flag
    Route::get('/flags','FlagController@index')->name('flag.index');
    Route::get('/add-flag','FlagController@add_flag_form')->name('flag.add_flag_form');
    Route::post('/add-flag','FlagController@add_flag_form_submit')->name('flag.add_flag_form_submit');
    Route::post('/remove-flag','FlagController@remove_flag')->name('flag.remove_flag');
    
    //Prohibited Words
    Route::get('/block-words','BlockWordsController@index')->name('blockwords.index');
    Route::post('/update-block-words','BlockWordsController@update_block_words')->name('blockwords.update_block_words');
    Route::post('/delete-block-words','BlockWordsController@delete_block_words')->name('blockwords.delete_block_words');
    Route::get('/add-block-words','BlockWordsController@add_block_words_form')->name('blockwords.add_block_words_form');
    Route::post('/add-block-words','BlockWordsController@add_block_words_form_submit')->name('blockwords.add_block_words_form_submit');

    //Words
    Route::get('/words','BlockWordsController@words')->name('blockwords.words');
    Route::post('/delete-words','BlockWordsController@delete_words')->name('blockwords.delete_words');
    Route::get('/add-word','BlockWordsController@add_word_form')->name('blockwords.add_word_form');
    Route::post('/add-word','BlockWordsController@add_word_form_submit')->name('blockwords.add_word_form_submit');

    //Unaccepted Students
    Route::get('/unapproved-students','StudentController@unapproved_students')->name('student.unapproved_students');
    Route::get('/approve/{id}','StudentController@approve')->name('student.approve');
    Route::get('/change-to-nonstudent/{id}','StudentController@change_to_nonstudent')->name('student.change_to_nonstudent');
    Route::get('/approve-all','StudentController@approve_all')->name('student.approve_all');

    //Certificates
    Route::get('/certificates','CertificateController@index')->name('certificate.index');
    Route::post('/delete-certificate','CertificateController@delete_certificate')->name('certificate.delete_certificate');
    Route::get('/edit-certificate/{id}','CertificateController@edit_certificate_form')->name('certificate.edit_certificate_form');
    Route::post('/edit-certificate','CertificateController@edit_certificate_form_submit')->name('certificate.edit_certificate_form_submit');
    Route::get('/add-certificate','CertificateController@add_certificate_form')->name('certificate.add_certificate_form');
    Route::post('/add-certificate','CertificateController@add_certificate_form_submit')->name('certificate.add_certificate_form_submit');

    //Scores
    Route::get('/scores','ScoreController@index')->name('score.index');
});



//start by sajol mahmud

Route::group(['middleware'=>['authMiddleware']],function(){
    Route::resource('allgrade', 'SpellingBeeController');
    Route::get('/delete-grade','SpellingBeeController@delete_grade')->name('spelling_bee.delete_grade');

    //al weeks
    
    Route::get('questions/allweek','SpellingBeeController@allWeek')->name('all_week');
    Route::get('questions/allweek/edit/{id}','SpellingBeeController@weekEdit')->name('all_week.edit');
    Route::get('questions/allweek/create','SpellingBeeController@weekCreate')->name('all_week.create');
    Route::get('questions/allweek/save','SpellingBeeController@weekSave')->name('all_week.save');
    Route::get('questions/allweek/update/{id}','SpellingBeeController@weekUpdate')->name('all_week.update');
    Route::get('questions/allweek/delete','SpellingBeeController@weekdelete')->name('all_week.delete');



    //all question
    
    Route::get('questions','SpellingBeeController@allQuestion')->name('questions');
    Route::get('questions/edit/{id}','SpellingBeeController@questionEdit')->name('questions.edit');
    Route::get('questions/create','SpellingBeeController@questionCreate')->name('questions.create');
    Route::post('questions/save','SpellingBeeController@questionSave')->name('questions.save');
    Route::post('questions/update/{id}','SpellingBeeController@questionUpdate')->name('questions.update');
    Route::get('questions/delete','SpellingBeeController@questionDelete')->name('questions.delete');

    //supercontest
    Route::resource('supercontest', 'SuperContestController');
}); 

//End by sajol mahmud



    // start by rakesh
    Route::group(['middleware'=>['authMiddleware']],function(){
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
    Route::get('questions/edit_money_qustion/{id}','MoneyController@money_edit')->name('money.edit_money_submit_form');
    Route::get('questions/delete_money_qustion','MoneyController@del_question')->name('question.del_money_question_form');
    Route::get('questions/add_money','MoneyController@add_question_money')->name('question.add_money_question_form');
    Route::post('questions/add_money_store','MoneyController@store_question_money')->name('question.add_money_submit');
    Route::post('questions/update_money_two','MoneyController@money_update')->name('question.update_money_2_submit');
    Route::get('del_money_two','MoneyController@del_ques_two')->name('question.del_money_question_two_form');


    //GeoRace -All level question
    Route::get('questions/geo_level/GeloLevel','GeoRaceController@add_form')->name('question.all_geo_level');
    Route::post('questions/geo_level/GeloLevel_add','GeoRaceController@store_all_level')->name('question.add_Geo_question_form_submit');
     Route::get('questions/all_geo_level/AllGeloLevel','GeoRaceController@index')->name('question.all_geo_level_view');
     Route::get('questions/edit_geo_level/{id}','GeoRaceController@edit_all_level')->name('ques_w.edit_all_level_wordrace_form');
     Route::post('questions/update_geo_level','GeoRaceController@update_all_level')->name('question.update_Geo_question_form_submit');
     Route::get('del_al_level_two','GeoRaceController@del_al_level')->name('question.del_al_level_two');

     //GeoRace -All question
     Route::get('questions/all_geo_qustion','GeoRaceController@show')->name('question.all_geo_q_view');
     Route::get('questions/add_geo','GeoRaceController@add_ques')->name('question.add_all_geo_question');
     Route::post('questions/store_geo','GeoRaceController@store_ques')->name('question.add_geo_question_form_submit');
     Route::get('questions/edit_geo_qustion/{id}','GeoRaceController@geo_edit')->name('ques_w.edit_geo_ques_wordrace_form');
     Route::post('questions/update_geo','GeoRaceController@update_geo')->name('question.update_geo_question_form_submit');
     Route::get('questions/del_geo_question','GeoRaceController@del_geo_ques')->name('question.del_geo_question');

     //Time - All level question
     Route::get('questions/all_time_level','TimeController@index')->name('question.all_time_question');
     Route::get('questions/time_level','TimeController@add_time_level_ques')->name('question.add_time_level_tt');
     Route::post('questions/store_time_lvl','TimeController@store_time_level_ques')->name('question.add_time_level_question');
     Route::get('questions/edit_time_level/{id}','TimeController@edit_ques_level')->name('question.all_time_edit_question');
     Route::post('questions/update_time_lvl','TimeController@update_ques_level')->name('question.update_time_level_question');
     Route::get('questions/del_time_level','TimeController@del_level')->name('question.del_time_level');
     //Time - All Question
     Route::get('questions/all_time_qustion','TimeController@show')->name('question.all_time_question_two');
     Route::get('questions/add_time','TimeController@add_time')->name('question.add_time_question_two');
     Route::post('questions/add_time_store','TimeController@store_time')->name('question.add_time_question_form_submit');
     Route::get('questions/edit_time_question/{id}','TimeController@edit_time_ques')->name('ques_w.edit_time_ques');
     Route::post('questions/update_time_question','TimeController@update_time_ques')->name('question.update_time_question_form_submit');
     Route::get('questions/del_ques','TimeController@del_time_ques')->name('ques_w.edit_time_quesdel_time_ques');

     //Notice
     Route::get('users/notice','Notice@index')->name('ques_w.notice');
     Route::post('users/notice_store','Notice@store')->name('question.add_notice_submit');
     Route::get('users/allnotice','Notice@show')->name('ques_w.show_notice');
     Route::get('users/notice_del','Notice@del')->name('ques_w.notice_del');

     //All firstname
    Route::get('firstname/firstnamelist', 'UserController@firstNameList')->name('firstname_list');
    Route::get('firstname/searchlist/{id}', 'UserController@searchlist');
    Route::get('firstname/firstnamelist/edit/{id}', 'UserController@firstNameEdit');
    Route::post('firstname/firstnamelist/update/{id}', 'UserController@firstNameUpdate')->name('firstname_list.update');
    

    //end by rakesh
    });
    