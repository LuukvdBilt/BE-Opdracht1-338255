<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\ProductController;


Route::get('/',[ProductController::class, 'index'])->name('home');


//allergenen index

Route::get('/allergeen', [AllergeenController::class, 'index'])->name('allergeen.index');



Route::get('products/allergeenInfo',[ProductController::class, 'allergenenInfo'])->name('products.allergenenInfo');

Route::get('product/{id}/leveringsInfo',[LeverancierController::class, 'leveringsInfo'])->name('products.leveringsInfo');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
