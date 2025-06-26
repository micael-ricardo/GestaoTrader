<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\{
    TradeManager,
    Dashboard
};

Route::get('/', Dashboard::class)->name('dashboard');




Route::get('/trader', TradeManager::class)->name('trader');

