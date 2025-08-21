<div class="min-h-screen bg-[#F3F5F7] p-6">

  <div class="grid grid-cols-3 md:grid-cols-4 gap-8">

    <!-- Sidebar Filter -->
    <div class="bg-white border rounded-lg p-4 shadow h-max">
        <div class="flex items-center gap-1 mb-4">
        <x-heroicon-o-funnel class="w-6 h-6"/>
        <h2 class="font-bold mb-4">Filter</h2>
        </div>

      <!-- Categories -->
      <div class="mb-6">
        <h3 class="text-sm font-semibold mb-2">CATEGORIES</h3>
        <ul class="space-y-1 text-sm text-gray-700">
          <li><input type="checkbox" class="mr-2"> All Filter</li>
          <li><input type="checkbox" class="mr-2"> Painting</li>
          <li><input type="checkbox" class="mr-2"> Wood</li>
          <li><input type="checkbox" class="mr-2"> Metal</li>
          <li><input type="checkbox" class="mr-2"> Others</li>
        </ul>
      </div>

      <!-- Price -->
      <div>
        <h3 class="text-sm font-semibold mb-2">PRICE</h3>
        <ul class="space-y-1 text-sm text-gray-700">
          <li><input type="checkbox" class="mr-2"> $10.00 - $19.99</li>
          <li><input type="checkbox" class="mr-2"> $20.00 - $29.99</li>
          <li><input type="checkbox" class="mr-2"> $30.00 - $39.99</li>
          <li><input type="checkbox" class="mr-2"> $40.00 - $49.99</li>
          <li><input type="checkbox" class="mr-2"> $50.00+</li>
        </ul>
      </div>
    </div>

    <!-- Product List -->
    <div class="col-span-3">
      <!-- Header Sort -->
      <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-600">Sort by</p>
        <div class="flex gap-2">
          <button class="border px-2 py-1 rounded">≡</button>
          <button class="border px-2 py-1 rounded">☷</button>
        </div>
      </div>

      <!-- Grid Products -->
      <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($data as $item)
        <!-- Card Produk -->
            <div class="bg-white rounded-lg shadow p-4 flex flex-col gap-2">
        <span class="bg-[#FFB97B] text-white text-xs px-2 py-1 rounded w-max">NEW</span>
        <img src="{{asset('img/material1.png')}}" alt="Product" class="w-full h-32 object-contain mt-2">
        <h3 class="text-sm font-semibold mt-2">Material A</h3>
        <p class="text-gray-600 text-xs">Rp 50.000</p>
        <button class="mt-auto bg-[#424242] text-white text-sm px-3 py-1 rounded hover:bg-black">
            Add to cart
        </button>
        <div class="flex mt-2 text-yellow-400 text-xs">
            ★★★★☆
        </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
</div>

