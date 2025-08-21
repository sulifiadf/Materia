<?php

namespace App\Livewire;

use Livewire\Component;

class KategoriPage extends Component
{
    public function render()
    {
        $data=[1,2,3,4,5,6,7,8,9,10];
        return view('livewire.kategori-page', compact('data'));
    }
    
}
