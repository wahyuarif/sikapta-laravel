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

// use Symfony\Component\Routing\Route;

use App\Bimbingan;
use App\Pengajuan;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// verifi
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/persyaratan', 'HomeController@persyaratan')->name('persyaratan');
Route::get('/tolak', 'HomeController@tolak')->name('home.tolak');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Auth::routes();
/**
 * 
 * 
 * Admin auth route
 */
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');
});
/**
 * 
 * 
 * Auth kaprodi route
 */
Route::prefix('dosen')->group(function() {
    Route::get('/', 'DosenController@index')->name('dosen.home');
    Route::get('/login', 'AuthDosen\LoginController@showLoginForm')->name('dosen.login');
    Route::post('/login', 'AuthDosen\LoginController@login')->name('dosen.login.submit');
    Route::post('/logout', 'AuthDosen\LoginController@logout')->name('dosen.logout');
    Route::get('/password/reset', 'AuthDosen\ForgotPasswordController@showLinkRequestForm')->name('dosen.password.request');
    Route::post('/password/email', 'AuthDosen\ForgotPasswordController@sendResetLinkEmail')->name('dosen.password.email');
    Route::get('/password/reset/{token}', 'AuthDosen\ResetPasswordController@showResetForm')->name('dosen.password.reset');
    Route::post('/password/reset', 'AuthDosen\ResetPasswordController@reset');
});
/**
 * 
 * 
 * SKS Route
 */
Route::prefix('sks')->group(function(){
    Route::get('/', 'SksController@index')->name('sks.index');
    Route::get('/exportExcel', 'SksController@exportExcel')->name('sks.exportExcel');
    Route::post('/importExcel', 'SksController@importExcel')->name('sks.importExcel');
});

Route::prefix('pengajuanKP')->group(function(){
    // Dosen Page
    Route::get('/', 'PengajuanKPController@index')->name('pengajuanKP');
    Route::get('/status', 'PengajuanKPController@status')->name('pengajuanKP.status');
    Route::get('/show/{id}' , 'PengajuanKPController@show')->name('pengajuanKP.show');
    Route::put('/terima/{id}', 'PengajuanKPController@terima')->name('pengajuanKP.terima');
    Route::put('/terimaSyarat/{id}', 'PengajuanKPController@terimaSyarat')->name('pengajuanKP.terimaSyarat');
    Route::get('/tolak/{id}', 'PengajuanKPController@tolak')->name('pengajuanKP.tolak');
    // Pengajuan Mahasiswa
    Route::get('/kerjaPraktek', 'PengajuanKPController@kerjaPraktek')->name('pengajuanKP.kerjaPraktek');
    Route::get('/kerjaPraktekSecond', function(){
        return view('pengajuanKP.formPengajuan');
    })->name('pengajuanKP.kerjaPraktekSecond');
    Route::post('/kerjaPraktek', 'PengajuanKPController@kpSubmit')->name('pengajuanKP.kpSubmit');
});

Route::prefix('bimbingan')->group(function(){
    Route::get('/mahasiswa', 'BimbinganController@indexMahasiswa')->name('bimbingan.mahasiswa');
    Route::put('/uploadBab/{id}','BimbinganController@uploadBab')->name('bimbingan.uploadBab');
    Route::get('/dosen', 'BimbinganController@indexDosen')->name('bimbingan.dosen');
    Route::get('/mahasiswa/{mahasiswa_id}', 'BimbinganController@bimbinganMahasiswa')->name('bimbingan.mahasiswa.show');
    Route::get('/terima/{id}', 'BimbinganController@terima')->name('bimbingan.terima');
    Route::post('/revisi', 'BimbinganController@revisi')->name('bimbingan.revisi');
    Route::put('/uploadRevisi/{id}','BimbinganController@uploadRevisi')->name('bimbingan.uploadRevisi');
});


Route::prefix('pengajuanTA')->group(function(){
    // Dosen Page
    Route::get('/', 'PengajuanTAController@index')->name('pengajuanTA');
    Route::get('/status', 'PengajuanTAController@status')->name('pengajuanTA.status');
    Route::get('/show/{id}' , 'PengajuanTAController@show')->name('pengajuanTA.show');
    Route::put('/terima/{id}', 'PengajuanTAController@terima')->name('pengajuanTA.terima');
    Route::put('/terimaSyarat/{id}', 'PengajuanTAController@terimaSyarat')->name('pengajuanTA.terimaSyarat');
    Route::get('/tolak/{id}', 'PengajuanTAController@tolak')->name('pengajuanTA.tolak');
    // Pengajuan Mahasiswa
    Route::get('/formPengajuan', 'PengajuanTAController@formPengajuan')->name('pengajuanTA.formPengajuan');
    Route::get('/tugasAkhirSecond', function(){
        return view('pengajuan.formPengajuan');
    })->name('pengajuan.tugasAkhirSecondSecond');
    Route::post('/kerjaPraktek', 'PengajuanTAController@taSubmit')->name('pengajuanTA.taSubmit');
});