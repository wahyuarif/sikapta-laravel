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

use App\Pengajuan;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// verifi
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');
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

Route::prefix('pengajuan')->group(function(){
    // Dosen Page
    Route::get('/', 'PengajuanController@index')->name('pengajuan');
    Route::get('/show/{id}' , 'PengajuanController@show')->name('pengajuan.show');
    Route::put('/terima/{id}', 'PengajuanController@terima')->name('pengajuan.terima');
    Route::put('/terimaSyarat/{id}', 'PengajuanController@terimaSyarat')->name('pengajuan.terimaSyarat');
    Route::get('/tolak/{id}', 'PengajuanController@tolak')->name('pengajuan.tolak');
    // Pengajuan Mahasiswa
    Route::get('/kerjaPraktek', 'PengajuanController@kerjaPraktek')->name('pengajuan.kerjaPraktek');
    Route::get('/kerjaPraktekSecond', function(){
        return view('pengajuan.kerjaPraktekSecond');
    })->name('pengajuan.kerjaPraktekSecond');
    Route::post('/kerjaPraktek', 'PengajuanController@kpSubmit')->name('pengajuan.kpSubmit');
});

Route::prefix('bimbingan')->group(function(){
    Route::get('/mahasiswa', 'BimbinganController@indexMahasiswa')->name('bimbingan.mahasiswa');
    Route::get('/dosen', 'BimbinganController@indexDosen')->name('bimbingan.dosen');
});