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
    return view('auth.login');
});

Route::get('/home', 'HomeController@index'
)->middleware('auth');

Route::post('/sekolah/delete','SekolahController@delete');
Route::resource('sekolah', 'SekolahController');

Route::post('/jurusan/delete','JurusanController@delete');
Route::resource('jurusan', 'JurusanController');

Route::post('/attrPembayaran/delete','AttrPembayaranController@delete');
Route::resource('attrPembayaran', 'AttrPembayaranController');

Route::post('/period/delete','PeriodController@delete');
Route::resource('period', 'PeriodController');

Route::post('/skema/delete','SkemaController@delete');
Route::resource('skema', 'SkemaController');

Route::resource('siswa', 'SiswaController');

Route::resource('report', 'ReportController');
Route::post('report/getReport', 'ReportController@getReport');
Route::get('/export/{start}/{end}','ReportController@export');

Route::post('bayar/step1', 'BayarController@step1');
Route::post('bayar/step2', 'BayarController@step2');
Route::get('/downloadPDF/{id}','BayarController@downloadPDF');
Route::get('/inputBayaran','BayarController@inputBayaran');
Route::resource('bayar', 'BayarController');

Auth::routes();



