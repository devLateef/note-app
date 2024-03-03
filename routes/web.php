<?php

use App\Http\Controllers\NotesController;
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

Route::get('/', function () {
    // $note = Note::first();
    // return $note;
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('notes', NotesController::class);
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\NotesController::class, 'index'])->name('home');
