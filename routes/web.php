<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControllers;

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

Route::get('/posts',[PostControllers::class, 'index']);
