<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\HomePage;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\KategoriPage;
use App\Livewire\KeranjangPage;
use App\Livewire\CheckoutPage;
use App\Livewire\DetailProduk;
use App\Livewire\ProdukPage;

Route::get('/', HomePage::class)->name('home');

route::middleware('guest')->group(function(){
    Route::get('/login', Login::class)->name('auth.login');
    Route::get('/register', Register::class)->name('auth.register');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('auth.login');
})->name('logout');

//Route::get('/login', Login::class)->name('auth.login');
//Route::get('/register', Register::class)->name('auth.register');
Route::get('/kategori-page', KategoriPage::class)->name('livewire.kategori-page');
Route::get('/keranjang-page', KeranjangPage::class)->name('livewire.keranjang-page');
Route::get('/checkout-page', CheckoutPage::class)->name('livewire.checkout-page');
Route::get('/detail-produk', DetailProduk::class)->name('livewire.detail-produk');
Route::get('/produk-page', ProdukPage::class)->name('livewire.produk-page');
