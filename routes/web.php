<?php





Auth::routes();

Route::get('/', 'RecruitmentController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recruitments', 'RecruitmentController@index');
Route::get('/recruitments/{recruitment}', 'RecruitmentController@show');
Route::get('/recruitments/create', 'RecruitmentController@create');
Route::post('/recruitments', 'RecruitmentController@store');
Route::get('/recruitments/{recruitment}/edit', 'RecruitmentController@edit');
Route::put('/recruitments/{recruitment}', 'RecruitmentController@update');
Route::delete('/recruitments/{recruitment}', 'RecruitmentController@delete');

Route::post('/recruitments/{recruitment}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('/recruitments/{recruitment}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');