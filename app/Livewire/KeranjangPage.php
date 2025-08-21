<?php

namespace App\Livewire;

use Livewire\Component;

class KeranjangPage extends Component
{
    public function render()
    {
        $data = [1, 2, 3, 4, 5]; // Example data, replace with actual data retrieval logic
        return view('livewire.keranjang-page', compact('data'));
    }
}
