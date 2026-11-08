<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoGameController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games/filter/{value?}', function ($value = null) {
    if ($value) {
        return redirect()->route('games.index', [
            'genre' => $value
        ]);
    }

    return redirect()->route('games.index');
})->name('games.filter');

Route::resource('games', VideoGameController::class);