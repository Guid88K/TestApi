<?php

use Illuminate\Support\Facades\Route;
use App\Data;
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
Route::get('/data', function () {
    $field_data = Data::all();
    return view('import_field',['field_data'=>$field_data]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/import','DataController@index')->name('view');
Route::post('/import_parse','DataController@import_csv')->name('import_parse');
//Route::post('/import_process', 'ImportController@processImport')->name('import_process');

