<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('new-ticket', 'TicketsController@create');
Route::post('new-ticket', 'TicketsController@store');

Route::get('my_tickets', 'TicketsController@userTickets');
Route::get('tickets/{ticket_id}', 'TIcketsController@show');

Route::post('comment', 'CommentsController@postComment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});