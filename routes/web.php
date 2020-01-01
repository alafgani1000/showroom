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
Route::get('/todo', 'TodoController@index')
    ->name('todo.index');
Route::get('/todo/data', 'TodoController@data')
    ->name('todo.data');
Route::post('/todo', 'TodoController@store')
    ->name('todo.store');

// Route::group(['prefix' => '', 'middleware' => ['auth','role:admin']], function () {
//     Route::get('url', 'controller')
//         ->name('route name');
    
//     Route::post('url', 'controller')
//         ->name('route name');

//     Route::put('url', 'controller')
//         ->name('route name');

//     Route::delete('url', 'controller')
//         ->name('route name');
// });

