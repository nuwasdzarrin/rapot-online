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

Route::get('/','SiteController@home');
Route::get('/register','SiteController@register');
Route::get('/visi','SiteController@visi');
Route::get('/sukses','SiteController@sukses');
Route::post('/postregister','SiteController@postregister');


//login admin
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
//login siswa
Route::get('/loginsiswa','AuthsiswaController@loginsiswa')->name('login');
Route::post('/postloginsiswa','AuthsiswaController@postloginsiswa');
Route::get('/logoutsiswa','AuthsiswaController@logoutsiswa');
//login guru
Route::get('/loginguru','AuthguruController@loginguru')->name('login');
Route::post('/postloginguru','AuthguruController@postloginguru');
Route::get('/logoutguru','AuthguruController@logoutguru');

Route::get('/password','SettingController@home');
Route::get('/setting','SettingController@home');
Route::post('/setting/{id}/updatepassword','SettingController@updatepassword');
Route::get('/setting/{id}/update','SettingController@update');



Route::group(['middleware' => ['auth','CheckRole:admin,guru,siswa']], function (){
//siswa
	Route::get('/siswa','SiswaController@index');
	Route::post('/siswa/create','SiswaController@create');
	Route::get('/siswa/{id}/edit','SiswaController@edit');
	Route::post('/siswa/{id}/update','SiswaController@update');
	Route::get('/siswa/{id}/delete','SiswaController@delete');
	Route::get('/siswa/{id}/profile','SiswaController@profile');
	Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
	Route::post('/siswa/{id}/addekstra','SiswaController@addekstra');
	Route::post('/siswa/addsaransiswa/{id}','SiswaController@addsaransiswa');
	Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');
	Route::get('/siswa/{id}/{idekstra}/deleteekstra','SiswaController@deleteekstra');
	Route::get('/siswa/{id}/editnilai','SiswaController@editnilai');
	Route::get('/siswa/nilai','SiswaController@nilai');
	Route::get('/siswa/export/{id}','SiswaController@export');
	Route::get('/siswa/datasiswa/{id}','SiswaController@datasiswa');
	Route::post('/siswa/import_excel', 'SiswaController@import_excel');
	Route::post('/siswa/{id}/addmulok','MulokController@addmulok');
	Route::get('/siswa/{id}/{idmulok}/deletemulok','MulokController@deletemulok');
	Route::post('/siswa/{id}/addsikap','SikapController@addsikap');
	Route::get('/siswa/{id}/{idsikap}/deletesikap','SikapController@deletesikap');

//Guru
	Route::get('/guru','GuruController@index');
	Route::post('/guru/create','GuruController@create');
	Route::get('/guru/{id}/edit','GuruController@edit');
	Route::post('/guru/{id}/update','GuruController@update');
	Route::get('/guru/{id}/delete','GuruController@delete');
	Route::get('/guru/{id}/profile','GuruController@profile');
	Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
	//Admin

	Route::get('/operator','AdminController@index');
	Route::post('/operator/create','AdminController@create');
	Route::get('/operator/{id}/edit','AdminController@edit');
	Route::get('/operator/{id}/delete','AdminController@delete');
	Route::post('/operator/{id}/update','AdminController@update');

	// Kehadiran
	Route::get('/kehadiran','KehadiranSiswaController@index');
	Route::post('/kehadiran/store','KehadiranSiswaController@store');
	Route::get('/kehadiran/{id}/destroy','KehadiranSiswaController@destroy');

	
});


Route::group(['middleware' => ['auth','CheckRole:admin,siswa,guru']], function (){
Route::get('/dashboard','DashboardController@index');
// rangking
Route::get('/rangking','RangkingController@index');
Route::get('/rangking/kelas/{kelas}','RangkingController@show');
//aktif
Route::get('/aktif','AktifController@index');
Route::post('/aktif','AktifController@simpan');
Route::get('/aktifkan',function() {return redirect('/aktif');});
Route::put('/aktifkan/{id}','AktifController@aktivasi');
Route::put('/aktif/{id}','AktifController@update');
Route::delete('/aktif/{id}','AktifController@hapus');

Route::get('/kelas_1','SiswaController@kelas_1');
Route::get('/kelas_2','SiswaController@kelas_2');
Route::get('/kelas_3','SiswaController@kelas_3');
Route::get('/kelas_4','SiswaController@kelas_4');
Route::get('/kelas_5','SiswaController@kelas_5');
Route::get('/kelas_6','SiswaController@kelas_6');

Route::put('/kkm-update/{id}', 'kkmController@update');
Route::get('/ekstrakurikuler', function() {return view('setting.ekstra');});
Route::post('/ekstrakurikuler', 'EkstraController@save');
Route::put('/ekstrakurikuler/{id}', 'EkstraController@update');
Route::delete('/ekstrakurikuler/{id}', 'EkstraController@hapus');
});
