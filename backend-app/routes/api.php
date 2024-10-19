<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route api untuk menampilkan data animals
Route::get('/animals', [AnimalController::class, 'index']);
// Route api untuk menambah data animals
Route::post('/animals', [AnimalController::class, 'store']);
// Route api untuk mengupdate data animals
Route::put('/animals/{id}', [AnimalController::class, 'update']);
// Route untuk menghapus data animals
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);