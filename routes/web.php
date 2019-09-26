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
});
