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
        // transaction
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

        // employee controller
        Route::get('/employee', 'EmployeeController@index')
            ->name('emp.index');
        Route::get('/employee/create', 'EmployeeController@create')
            ->name('emp.create');
        Route::post('/employee/store', 'EmployeeController@store')
            ->name('emp.store');
        Route::get('/employee/{id}/edit', 'EmployeeController@edit')
            ->name('emp.edit');
        Route::post('/employee/update', 'EmployeeController@update')
            ->name('emp.update');
        Route::post('/employee/delete', 'EmployeeController@delete')
            ->name('emp.delete');

        // location
        Route::get('/loc', 'LocationController@index')
            ->name('loc.index');
        Route::get('/loc/data', 'LocationController@data')
            ->name('loc.data');
        Route::post('/loc/store', 'LocationController@store')
            ->name('loc.store');
        Route::get('/loc/{id}/edit', 'LocationController@edit')
            ->name('loc.edit');
        Route::post('/loc/delete', 'LocationController@destroy')
            ->name('loc.delete');
        Route::post('/loc/update', 'LocationController@update')
            ->name('loc.update');
        
        // unit
        Route::get('/unit', 'UnitController@index')
            ->name('unit.index');
        Route::get('/unit/data', 'UnitController@data')
            ->name('unit.data');
        Route::post('/unit/store', 'UnitController@store')
            ->name('unit.store');
        Route::get('/unit/{id}/edit', 'UnitController@edit')
            ->name('unit.edit');
        Route::post('/unit/delete', 'UnitController@destroy')
            ->name('unit.delete');
        Route::post('/unit/update', 'UnitController@update')
            ->name('unit.update');

        Route::get('/incoming_goods', 'IncomingGoodsController@index')
            ->name('incoming_goods.index');
        Route::get('/incoming_goods/data', 'IncomingGoodsController@data')
            ->name('incoming_goods.data');
        Route::get('/incoming_goods/{code}/data', 'IncomingGoodsController@dataByIncomingCode')
            ->name('incoming_goods.by_incoming_code');
        Route::get('/incoming_goods/create', 'IncomingGoodsController@create')
            ->name('incoming_goods.create');
        Route::post('/incoming_goods/store', 'IncomingGoodsController@store')
            ->name('incoming_goods.store');
        Route::get('/incoming_goods/{id}/edit', 'IncomingGoodsController@edit')
            ->name('incoming_goods.edit');
        Route::post('/incoming_goods/update', 'IncomingGoodsController@update')
            ->name('incoming_goods.update');

        Route::get('/exit_item', 'ExitItemController@index')
            ->name('exit_item.index');    
        Route::get('/exit_item/data', 'ExitItemController@data')
            ->name('exit_item.data');    
        Route::get('/exit_item/store', 'ExitItemController@store')
            ->name('exit_item.store'); 
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

