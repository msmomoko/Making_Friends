<?php





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recruitments', 'RecruitmentController@index');
Route::get('/recruitments/create', 'RecruitmentController@create');
Route::post('/recruitments', 'RecruitmentController@store');
Route::get('/recruitments/{recruitment}/edit', 'RecruitmentController@edit');
Route::put('/recruitments/{recruitment}', 'RecruitmentController@update');