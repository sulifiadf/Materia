<div class="bg-[#F3F5F7] min-h-screen p-6">
<!--#F3F5F7 = warna home -->
  <!-- Grid Banner -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <!-- Material 1 (besar) -->
    <div class="md:col-span-2 md:row-span-2 bg-white rounded-lg shadow p-4 flex flex-col">
      <img src="{{asset('img/material1.png')}}" alt="Material 1" class="w-full h-full object-contain">
      <h2 class="text-xl font-bold mt-2">Material 1</h2>
      <p class="text-gray-600">Shop Now</p>
    </div>

    <!-- Material 2 -->
    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
      <img src="{{asset('img/material2.png')}}" alt="Material 2" class="w-full h-40 object-contain">
      <h2 class="font-semibold mt-2">Material 2</h2>
      <p class="text-gray-600">Shop Now</p>
    </div>

    <!-- Material 3 -->
    <div class="bg-white rounded-lg shadow p-4 flex flex-col">
      <img src="{{asset('img/material3.png')}}" alt="Material 3" class="w-full h-40 object-contain">
      <h2 class="font-semibold mt-2">Material 3</h2>
      <p class="text-gray-600">Shop Now</p>
    </div>
  </div>

  <!-- Rekomendasi Section -->
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-lg font-bold text-gray-900">Rekomendasi Untukmu</h2>
    <a href="#" class="text-sm text-gray-700 hover:underline">Lihat Banyak</a>
  </div>

  <!-- Product Grid -->
  <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
    @foreach($promo as $item)
    <!-- Card Product -->
    <div class="bg-white rounded-lg shadow p-4 flex flex-col" 
    wire:key="{{ $item->id }}"
    onclick="window.location='{{ route('livewire.detail-produk', ['id' => $item->id]) }}'">
      
      <span class="bg-[#FFB97B] text-white text-xs px-2 py-1 rounded w-max">NEW</span>
      {{-- gambar produk --}}
          @if(is_array($item->foto_produk) && count($item->foto_produk) > 0)
          <img src="{{ url('storage/'.$item->foto_produk[0]) }}" 
              alt="{{ $item->nama_produk }}" 
              class="w-full h-32 object-contain mt-2">
      @else
          <img src="{{ asset('img/no-image.png') }}" 
              alt="No image" 
              class="w-full h-32 object-contain mt-2">
      @endif
      
      <h3 class="text-sm font-semibold mt-2">{{$item->nama_produk}}</h3>
      <p class="text-gray-600 text-xs">Rp 50.000</p>
      <a href="/keranjang-page" wire:navigate
        onclick="event.stopPropagation()" 
        class="mt-auto bg-[#424242] text-white text-sm px-3 py-1 rounded hover:bg-black">
        Add to cart
      </a>
      <div class="flex mt-2 text-yellow-400 text-xs">
        ★★★★☆
      </div>
    </div>
    @endforeach
    
  </div>
</div>