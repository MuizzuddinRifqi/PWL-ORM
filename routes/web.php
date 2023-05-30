<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Models\Article;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('mahasiswas.index');
});

Route::resource('mahasiswas', MahasiswaController::class);

Route::get('/search', [SearchController::class, 'search']);

Route::get('mahasiswas/nilai/{Nim}', [MahasiswaController::class, 'nilai'])->name('mahasiswas.nilai');

Route::get('/articles/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
Route::resource('articles', ArticleController::class);

Route::get('/mahasiswas/cetakpdf/{mahasiswa}', 
    [MahasiswaController::class, 'print_pdf'])->name('print_pdf');
