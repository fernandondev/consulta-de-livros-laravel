<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/paginaLogin', [AuthController::class, 'pegarViewLogin'])->name('paginaLogin');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);




Route::middleware(JWTMiddleware::class)->group(function() {


    Route::get('/', function () {
        return view('pagina-inicial');
    })->name('pagina-inicial');

    Route::post('/livro', [App\Http\Controllers\LivroController::class, 'buscarLivros'] )->name('livro');

    Route::get('/refresh', [AuthController::class, 'refresh']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


});

