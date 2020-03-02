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
Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['role:admin']], function(){
        Route::get('/transaction', 'TransactionController@index')
            ->name('tr.index');
        Route::get('/transaction/create', 'TransactionController@create')
            ->name('tr.create');
        Route::post('/transaction/store', 'TransactionController@store')
            ->name('tr.store');
        Route::get('/transaction/{id}/edit', 'TransactionController@edit')
            ->name('tr.edit');
        Route::post('/transaction/update', 'TransactionController@update')
            ->name('tr.update');
        Route::get('/transaction/{id}/detail', 'TransactionController@detail')
            ->name('tr.detail');

        Route::post('/part/delete', 'PartChangeController@destroy')
            ->name('part.delete');

        Route::get('/employee', 'EmployeeController@index')
            ->name('emp.index');
        Route::get('/employee/create', 'EmployeeController@create')
            ->name('emp.create');
        Route::post('/emp/store', 'EmployeeController@store')
            ->name('emp.store');
        /* 
        {
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
        Route::get('/todo/edit_detail/', 'TodoController@editDetail')
            ->name('todo.edit_detail');
        Route::post('/todo/update_detail', 'TodoController@updateDetail')
            ->name('todo.update_detail');
        Route::post('/todo/done_detail', 'TodoController@doneDetail')
            ->name('todo.done_detail');
        }
            */
    });
    
});



// Route::group(['prefix' => '', 'middleware' => ['auth','role:admin']], function () {
//     Route::get('url', 'controller')
//         ->name('route name');
// });

