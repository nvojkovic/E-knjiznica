<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'DashboardController@Home');

//API routes
Route::get('/api/korisnik/{id}', 'ApiController@User');
Route::get('/api/knjiga/{id}', 'ApiController@Book');

//Book routes
Route::get('/knjiga/dodaj', 'BookController@Add');
Route::post('/knjiga/dodaj', 'BookController@AddPost');
Route::get('/knjiga/posudi', 'BookController@Borrow');
Route::post('/knjiga/posudi', 'BookController@BorrowPost');
Route::get('/knjiga/vrati', 'BookController@Returning');
Route::post('/knjiga/vrati', 'BookController@ReturningPost');

//User routes
Route::get('/ucenik/dodaj', 'UserController@Add');
Route::post('/ucenik/dodaj', 'UserController@AddPost');
