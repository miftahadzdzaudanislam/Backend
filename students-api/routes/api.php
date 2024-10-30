<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk menampilkan data student
Route::get('/students', [StudentController::class, 'index']);
// Route untuk menambahkan data student
Route::post('/students', [StudentController::class, 'store']);
// Route untuk mengubah data student
Route::put('/students/{id}', [StudentController::class, 'update']);
// Route untuk menghapus data student
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
// Route untuk melihat data student
Route::get('/students/{id}', [StudentController::class, 'show']);