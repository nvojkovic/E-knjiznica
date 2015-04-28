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
Route::get('/knjiga/otpisi', 'BookController@WriteOff');
Route::post('/knjiga/otpisi', 'BookController@WriteOffPost');
Route::get('/knjiga/povijest', 'StatisticsController@BookHistory');
Route::post('/knjiga/povijest', 'StatisticsController@BookHistoryPost');
Route::get('/knjiga/trazi', 'BookController@Search');
Route::post('/knjiga/trazi', 'BookController@SearchPost');
Route::get('/knjiga/posudbe', 'StatisticsController@Borrows');

//User routes
Route::get('/ucenik/dodaj', 'UserController@Add');
Route::post('/ucenik/dodaj', 'UserController@AddPost');
Route::get('/ucenik/povijest', 'StatisticsController@UserHistory');
Route::post('/ucenik/povijest', 'StatisticsController@UserHistoryPost');
Route::get('/ucenik/trazi', 'UserController@Search');
Route::get('/ucenik/prikazi/{id}', 'UserController@Show');

//AV routes
Route::get('/av/dodaj', 'AVController@Add');
Route::post('/av/dodaj', 'AVController@AddPost');
Route::get('/av/ispisi', 'AVPrintController@Create');
Route::post('/av/ispisi', 'AVPrintController@CreatePost');

//Card and sticker routes
Route::get('/iskaznice', 'CardController@Create');
Route::post('/iskaznice', 'CardController@CreatePost');
Route::get('/naljepnice', 'StickerController@Create');
Route::post('/naljepnice', 'StickerController@CreatePost');

//Contact routes
Route::get('/kontakt', 'ContactController@Show');
Route::post('/kontakt', 'ContactController@Send');