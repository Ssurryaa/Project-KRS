<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MatkulController;

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


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('post.login');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile',[MahasiswaController::class,'index'])->name('profile');
    Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
    Route::get('/krs/add', [KrsController::class, 'add'])->name('krs.add');
    Route::post('/krs/add/save', [KrsController::class, 'addSave'])->name('krs.add.save');
    Route::post('krs/delete/{id}', [KrsController::class, 'delete'])->name('krs.delete');
    Route::post('krs/accept/{id}', [KrsController::class, 'accept'])->name('krs.accept');
    Route::post('krs/penilaian/{id}', [KrsController::class, 'penilaian'])->name('krs.penilaian');
    Route::get('krs/edit/{id}', [KrsController::class, 'edit'])->name('krs.edit');
    Route::post('krs/edit/{id}', [KrsController::class, 'editSave'])->name('krs.edit.save');
    Route::get('/khs', function () {
        return view('mahasiswa.khs');
    });
});

//admin
Route::get('/listmahasiswa',[AdminController::class,'index'])->name('listmahasiswa');
Route::get('/addmahasiswa', [AdminController::class,'addmahasiswa'])->name('addmahasiswa');
Route::post('/savemahasiswa',[AdminController::class,'savemahasiswa'])->name('savemahasiswa');
Route::get('/{id}/detailmahasiswa',[AdminController::class,'detailmahasiswa'])->name('detailmahasiswa');
Route::get('/{id}/editmahasiswa',[AdminController::class,'editmahasiswa'])->name('editmahasiswa');
Route::post('/{id}/saveedit',[AdminController::class,'saveedit'])->name('saveedit');
Route::post('/{id}/delete',[AdminController::class,'deletemahasiswa'])->name('deletemahasiswa');

//matkul
Route::get('/matakuliah',[MatkulController::class,'index'])->name('matakuliah');
Route::get('/addmatakuliah', [MatkulController::class,'addmatakuliah'])->name('addmatakuliah');
Route::post('/savematakuliah',[MatkulController::class,'savematakuliah'])->name('savematakuliah');
Route::get('/{id}/detailmatakuliah',[MatkulController::class,'detailmatakuliah'])->name('detailmatakuliah');
Route::get('/{id}/editmatakuliah',[MatkulController::class,'editmatakuliah'])->name('editmatakuliah');
Route::post('/{id}/saveeditmatkul',[MatkulController::class,'saveeditmatkul'])->name('saveeditmatkul');
Route::post('/{id}/deletematakuliah',[MatkulController::class,'deletematakuliah'])->name('deletematakuliah');

//dosen
Route::get('/listdosen',[AdminController::class,'dosen'])->name('listdosen');
Route::get('/adddosen', [AdminController::class,'adddosen'])->name('adddosen');
Route::post('/savedosen',[AdminController::class,'savedosen'])->name('savedosen');
Route::get('/{id}/detaildosen',[AdminController::class,'detaildosen'])->name('detaildosen');
Route::get('/{id}/editdosen',[AdminController::class,'editdosen'])->name('editdosen');
Route::post('/{id}/saveeditdosen',[AdminController::class,'saveeditdosen'])->name('saveeditdosen');
Route::post('/{id}/deletedosen',[AdminController::class,'deletedosen'])->name('deletedosen');

//dosen
Route::get('/krs_mahasiswa',[DosenController::class,'index'])->name('krs_mahasiswa');
Route::get('/{id}/pengajuanKRS', [DosenController::class,'pengajuanKRS'])->name('pengajuanKRS');
Route::post('{id}/accept', [DosenController::class, 'accept'])->name('krsaccept');
Route::get('/khsmahasiswa',[DosenController::class,'khs'])->name('khsmahasiswa');
Route::get('{id}/penilaiankhs', [DosenController::class, 'penilaiankhs'])->name('penilaiankhs');
Route::post('/{id}/penilaian', [DosenController::class,'penilaian'])->name('penilaian');

Route::get('/cetakkrs', [KrsController::class,'cetakkrs'])->name('cetakkrs');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});






