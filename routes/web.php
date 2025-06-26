<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\{
    TradeManager,
    Dashboard
};

Route::get('/', Dashboard::class);




Route::get('/trader', TradeManager::class)->name('trader');

