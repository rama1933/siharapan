<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KoefisienController;




Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');
Route::get('profile', [App\Http\Controllers\LandingController::class, 'profile'])->name('profile');
Route::get('struktur', [App\Http\Controllers\LandingController::class, 'struktur'])->name('struktur');
Route::get('/landing/berita', [App\Http\Controllers\LandingController::class, 'indexberita'])->name('landing.berita');
Route::get('/landing/berita/detail/{id}', [App\Http\Controllers\LandingController::class, 'indexdetailberita'])->name('landing.berita.detail');
Route::get('detail/{id}', [App\Http\Controllers\LandingController::class, 'detail'])->name('detail');
Route::get('filter', [App\Http\Controllers\LandingController::class, 'filter'])->name('folter');
Route::get('pdf', [App\Http\Controllers\LandingController::class, 'pdf'])->name('pdf');
Route::get('excel', [App\Http\Controllers\LandingController::class, 'excel'])->name('excel');
Route::get('detail/{id}/pdf', [App\Http\Controllers\LandingController::class, 'exportDetailPdf'])->name('export.pdf.detail');
Route::get('/detail/{id}/excel', [App\Http\Controllers\LandingController::class, 'exportDetailExcel'])->name('export.excel.detail');

Route::post('/landing/filter', [App\Http\Controllers\LandingController::class, 'filter'])->name('landing.filter');
Route::get('/landing/chart/filter', [App\Http\Controllers\LandingController::class, 'filterChart'])->name('landing.chart.filter');
Route::get('/detail/{id}/data', [App\Http\Controllers\LandingController::class, 'getDetailData'])->name('landing.detail.data');

Route::get('/masuk_form', 'Auth\LoginController@showLoginForm')->name('masuk_form');
Route::post('/masuk', 'Auth\LoginController@login')->name('masuk_submit');

Auth::routes();

Route::middleware('role:admin')->group(function () {
    Route::prefix('/master')->group(
        function () {
            Route::prefix('/data')->group(
                function () {
                    Route::get('/', [App\Http\Controllers\MasterController::class, 'data'])->name('master.data');
                    Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('master.show');
                    Route::post('/delete', [App\Http\Controllers\MasterController::class, 'deletedata'])->name('master.delete');
                }
            );

            Route::prefix('/satuan')->group(
                function () {
                    Route::get('/', [App\Http\Controllers\MasterController::class, 'indexsatuan'])->name('satuan.index');
                    Route::post('/store', [App\Http\Controllers\MasterController::class, 'storesatuan'])->name('satuan.store');
                    Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatesatuan'])->name('satuan.update');
                }
            );

            Route::prefix('/komoditi')->group(
                function () {
                    Route::get('/', [App\Http\Controllers\MasterController::class, 'indexkomoditi'])->name('komoditi.index');
                    Route::post('/store', [App\Http\Controllers\MasterController::class, 'storekomoditi'])->name('komoditi.store');
                    Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatekomoditi'])->name('komoditi.update');
                }
            );

            Route::prefix('/bapo')->group(
                function () {
                    Route::get('/', [App\Http\Controllers\MasterController::class, 'indexbapo'])->name('bapo.index');
                    Route::post('/store', [App\Http\Controllers\MasterController::class, 'storebapo'])->name('bapo.store');
                    Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatebapo'])->name('bapo.update');
                }
            );
        }
    );


    Route::prefix('/berita')->group(
        function () {
            Route::get('/', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
            Route::post('/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
            Route::post('/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
            Route::get('/data', [App\Http\Controllers\BeritaController::class, 'data'])->name('berita.data');
            Route::get('/show', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show');
            Route::post('/delete', [App\Http\Controllers\BeritaController::class, 'delete'])->name('berita.delete');
        }
    );


    Route::prefix('/harga')->group(
        function () {
            Route::prefix('/data')->group(
                function () {
                    Route::get('/', [App\Http\Controllers\HargaController::class, 'data'])->name('harga.data');
                    Route::get('/show', [App\Http\Controllers\HargaController::class, 'showdata'])->name('harga.show');
                    Route::post('/delete', [App\Http\Controllers\HargaController::class, 'deletedata'])->name('harga.delete');
                }
            );

            Route::prefix('/kandangan')->group(
                function () {
                    Route::get('/', [App\Http\Controllers\HargaController::class, 'indexkandangan'])->name('harga.kandangan.index');
                    Route::post('/store', [App\Http\Controllers\HargaController::class, 'store'])->name('harga.kandangan.store');
                    Route::post('/update', [App\Http\Controllers\HargaController::class, 'update'])->name('harga.kandangan.update');
                }
            );

            Route::get('/koefisien-harga', [KoefisienController::class, 'index'])->name('koefisien.index');
            Route::post('/koefisien/calculate', [KoefisienController::class, 'calculate'])->name('koefisien.calculate');
            Route::get('/koefisien/pdf', [KoefisienController::class, 'exportPdf'])->name('koefisien.export.pdf');
            Route::get('/koefisien/excel', [KoefisienController::class, 'exportExcel'])->name('koefisien.export.excel');
        }
    );
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');