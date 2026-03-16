<?php

use App\Http\Controllers\LabelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/labels/create', [LabelController::class, 'create'])->name('labels.create');
Route::post('/labels', [LabelController::class, 'store'])->name('labels.store');