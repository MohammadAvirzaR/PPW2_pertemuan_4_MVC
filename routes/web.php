<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControllers;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    $title = "Landing Page";
    $tagline = "Solusi Digital untuk Bisnis Anda";
    $features = [
        "Desain Responsif & Modern",
        "Mudah Dikelola",
        "Harga Terjangkau"
    ];

    return view('landingPage', compact('title', 'tagline', 'features'));
});

Route::get('/about', function () {
    return view('about',[
        'name' => 'Mohammad Avirza Radyatanza',
        'email' => 'avirzaradyatanza@gmail.com'
    ]);
});

Route::get('/book',[BookController::class, 'index'])->name('books.index');
Route::get('/book/create',[BookController::class, 'create'])->name('books.create');
Route::post('/book',[BookController::class, 'store'])->name('books.store');




