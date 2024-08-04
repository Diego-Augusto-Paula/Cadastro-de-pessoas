<?php

use App\Http\Controllers\PessoaController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Pessoa/Index', []);
// });

require __DIR__ . '/auth.php';


Route::resource('/', \App\Http\Controllers\PessoaController::class)->names('pessoa');


//Route::resource('endereco', \App\Http\Controllers\EnderecoController::class)->names('endereco');
Route::resource('/{pessoa}/endereco', \App\Http\Controllers\EnderecoController::class)->names('endereco');
