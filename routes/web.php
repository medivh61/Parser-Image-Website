<?php

use App\Http\Controllers\ImageParserController;
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


Route::get('/', [ImageParserController::class, 'index'])->name('index');
Route::post('/parse', [ImageParserController::class, 'parse'])->name('parse');


