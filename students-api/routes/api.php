<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk menampilkan data student
Route::get('/students', [StudentController::class, 'index'])
->middleware('auth:sanctum');
// Route untuk menambahkan data student
Route::post('/students', [StudentController::class, 'store'])
->middleware('auth:sanctum');
// Route untuk mengubah data student
Route::put('/students/{id}', [StudentController::class, 'update'])
->middleware('auth:sanctum');
// Route untuk menghapus data student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])
->middleware('auth:sanctum');
// Route untuk melihat data student
Route::get('/students/{id}', [StudentController::class, 'show'])
->middleware('auth:sanctum');

// Route untuk Registrasi user
Route::post('/register', [AuthController::class, 'register']);
// Route untuk Login User
Route::post('/login', [AuthController::class, 'login']);