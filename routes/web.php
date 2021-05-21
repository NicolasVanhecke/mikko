<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

Route::get('/', [ MainController::class, 'homepage' ] );
Route::get('/paydays/{year}', [ MainController::class, 'paydays' ] ); // navigate via URL to desired year
Route::post('/calculate-form', [ MainController::class, 'form' ] ); // handles input from form
Route::get('/generate/{year}', [ MainController::class, 'generate' ] );
