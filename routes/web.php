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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware'=>'partner'], function (){
Route::get('/invitation', 'UserController@invitation')->name('invitation');
Route::post('/invitation_send', 'UserController@invitation_send')->name('invitation_send');
});
Route::get('/referal_registration/{partner}', 'UserController@referal_registration')->name('referal_registration');
Route::resource('balance','BalanceController');
