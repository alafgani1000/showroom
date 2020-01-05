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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/todo', 'TodoController@index')
        ->name('todo.index');
    Route::get('/todo/data', 'TodoController@data')
        ->name('todo.data');
    Route::post('/todo', 'TodoController@store')
        ->name('todo.store');
    Route::get('/todo/delete','TodoController@delete')
        ->name('todo.delete');
    Route::get('/todo/edit','TodoController@edit')
        ->name('todo.edit');
    Route::post('/todo/delete_detail', 'TodoController@deleteDetail')
        ->name('todo.delete_detail');
    Route::post('/todo/update', 'TodoController@update')
        ->name('todo.update');
});


// Route::group(['prefix' => '', 'middleware' => ['auth','role:admin']], function () {
//     Route::get('url', 'controller')
//         ->name('route name');
// });

