<?php





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recruitments', 'RecruitmentController@index');
Route::get('/recruitments/create', 'RecruitmentController@create');
Route::post('/recruitments', 'RecruitmentController@store');