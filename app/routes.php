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
Route::get('/api/userlike/{partialName}', 'ApiController@UserLike');

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

//AV routes
Route::get('/av/dodaj', 'AVController@Add');
Route::post('/av/dodaj', 'AVController@AddPost');

//Card and sticker routes
Route::get('/iskaznice', 'CardController@Create');
Route::post('/iskaznice', 'CardController@CreatePost');
Route::get('/naljepnice', 'StickerController@Create');
Route::post('/naljepnice', 'StickerController@CreatePost');

//Contact routes
Route::get('/kontakt', 'ContactController@Show');
Route::post('/kontakt', 'ContactController@Send');