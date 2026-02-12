<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('members', MemberController::class);

Route::get('/scan-member', [ScanController::class, 'index']);
Route::post('/scan-member', [ScanController::class, 'scanMember']);

Route::resource('books', BookController::class);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store'])->name('books.store');