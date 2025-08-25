<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProdukPage extends Component
{
    use WithFileUploads;

    public $foto_produk = []; // array untuk multiple foto

    public function save()
    {
        $this->validate([
            'foto_produk.*' => 'required|image|max:2048', // validasi tiap file
        ]);

        $paths = [];
        foreach ($this->foto_produk as $file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $paths[] = $file->storeAs('produk', $filename, 'public');
        }

        Produk::create([
            'nama_produk' => 'Produk Tes', // sementara
            'status' => 'tersedia',
            'foto_produk' => $paths, // simpan array, otomatis jadi JSON di DB
        ]);

        session()->flash('success', 'Produk berhasil disimpan.');
        return redirect()->route('home');
    }
    
    public function render()
    {
        $data = Produk::where('status', 'tersedia')->get();
        return view('livewire.produk-page', compact('data'));
    }
}
