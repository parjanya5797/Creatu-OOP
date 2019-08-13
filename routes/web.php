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

Route::get('/welcome', function () {
    
    return view('welcome');
});
//Login Routes
Route::get('/login','LoginController@index');
Route::POST('/loginsuccess','LoginController@check');
Route::get('/dashboard','DashboardController@index');
Route::resource('/register','RegisterController');


//Product Routes
Route::get('/product','ProductController@index');
Route::get('/product/create','ProductController@create');
Route::post('/product/store','ProductController@store');
Route::get('/edit/{id}','ProductController@edit');
Route::patch('/update/{id}','ProductController@update');
Route::get('/delete/{id}','ProductController@delete');

//Employee Routes
Route::get('/employee','EmployeeController@index');
Route::get('/employee/create','EmployeeController@create');
Route::post('/employee/store','EmployeeController@store');
Route::get('/employee/edit/{id}','EmployeeController@edit');

Route::get('/', function () {
    
    return view('layouts.admin');
});
Route::get('/dashboard',function ()
{
    return view('dashboard');
});
Route::get('/mail/create', 'MailController@create');
Route::post('/mail/store', 'MailController@sendmail');

