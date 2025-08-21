<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\KategoriPage;
use App\Livewire\KeranjangPage;
use App\Livewire\CheckoutPage;

Route::get('/', HomePage::class);
Route::get('/login', Login::class)->name('auth.login');
Route::get('/register', Register::class)->name('auth.register');
Route::get('/kategori-page', KategoriPage::class)->name('livewire.kategori-page');
Route::get('/keranjang-page', KeranjangPage::class)->name('livewire.keranjang-page');
Route::get('/checkout-page', CheckoutPage::class)->name('livewire.checkout-page');
