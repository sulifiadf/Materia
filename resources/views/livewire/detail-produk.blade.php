<div class="min-h-screen bg-[#F3F5F7] p-6">
    <div class="grid grid-cols-1 gap-1 mb-4">

        {{-- container atas --}}
        <div class="container rounded-md border h-max p-6 mb-4 bg-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- gambar kiri --}}
                <div>
                    <img src="https://via.placeholder.com/600x600" 
                        alt="produk" 
                        class="w-full h-96 object-contain rounded-md border ">

                    <div class="flex gap-4 mt-4">
                        <img src="https://via.placeholder.com/100x100" 
                            alt="Thumbnail" 
                            class="w-24 h-24 object-contain rounded-lg border cursor-pointer hover:border-black" />
                        <img src="https://via.placeholder.com/100x100" 
                            alt="Thumbnail" 
                            class="w-24 h-24 object-contain rounded-lg border cursor-pointer hover:border-black" />
                        <img src="https://via.placeholder.com/100x100" 
                            alt="Thumbnail" 
                            class="w-24 h-24 object-contain rounded-lg border cursor-pointer hover:border-black" />
                    </div>
                </div>

                {{-- deskripsi kanan --}}
                <div>
                    <span class="bg-green-500 text-white px-3 py-1 text-xs rounded">-50%</span>
                    <h2 class="text-2xl font-bold mt-2">Tray Table</h2>
                    <p class="text-gray-600 mt-2">
                        Buy one or buy a few and make every space where you sit more convenient.
                        Light and easy to move around with removable tray top, handy for serving snacks.
                    </p>

                    <div class="mt-4">
                        <span class="text-xl font-bold text-gray-900">Rp. 35,000</span>
                        <span class="text-gray-400 line-through ml-2">Rp. 50,000</span>
                    </div>

                    <!-- Warna -->
                    <div class="mt-6">
                        <h3 class="text-sm font-semibold text-gray-700 mb-2">Color</h3>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-3 py-1 bg-orange-200 text-gray-800 rounded">Black</button>
                            <button class="px-3 py-1 bg-orange-200 text-gray-800 rounded">Black</button>
                            <button class="px-3 py-1 bg-orange-200 text-gray-800 rounded">Black</button>
                            <button class="px-3 py-1 bg-orange-200 text-gray-800 rounded">Black</button>
                        </div>
                    </div>

                    <!-- Quantity + Add to Cart -->
                    <div class="flex items-center mt-6 gap-4">
                        <div class="flex items-center border rounded">
                            <button class="px-3 py-2">-</button>
                            <span class="px-4">1</span>
                            <button class="px-3 py-2">+</button>
                        </div>
                        <button class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">
                            Add to Cart
                        </button>
                    </div>

                    <div class="mt-6 text-sm text-gray-600">
                        <p><span class="font-semibold">Stok:</span> 1117</p>
                        <p><span class="font-semibold">Category:</span> Living Room, Bedroom</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Customer Reviews --}}
        <div class="container rounded-md border h-max p-6 bg-white">
            <h2 class="text-xl font-bold mb-4">Customer Reviews</h2>

            <!-- Rating summary -->
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <span>★★★★☆</span>
                <span>11 Reviews</span>
            </div>

            <!-- Reviews header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold">11 Reviews</h3>
                <select class="border rounded px-2 py-1 text-sm">
                    <option>Newest</option>
                    <option>Oldest</option>
                    <option>Highest Rating</option>
                    <option>Lowest Rating</option>
                </select>
            </div>

            <!-- Review item -->
            <div class="space-y-6">
                <div class="border-b pb-4">
                    <div class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full" alt="avatar">
                        <div>
                            <h4 class="font-semibold">Sofia Harvetz</h4>
                            <span class="text-yellow-500">★★★★★</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mt-2 text-sm">
                        I bought it 3 weeks ago and now come back just to say "Awesome Product". I really enjoy it.
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.
                    </p>
                    <div class="flex gap-4 text-xs text-gray-500 mt-2">
                        <button>Like</button>
                        <button>Reply</button>
                    </div>
                </div>

                <!-- contoh review lain -->
                <div class="border-b pb-4">
                    <div class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full" alt="avatar">
                        <div>
                            <h4 class="font-semibold">Nicolas Jensen</h4>
                            <span class="text-yellow-500">★★★★☆</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mt-2 text-sm">
                        Product quality is good, packaging also safe. Will order again!
                    </p>
                    <div class="flex gap-4 text-xs text-gray-500 mt-2">
                        <button>Like</button>
                        <button>Reply</button>
                    </div>
                </div>
            </div>

            <!-- Load more button -->
            <div class="flex justify-center mt-6">
                <button class="px-6 py-2 border rounded hover:bg-gray-100">Load more</button>
            </div>
        </div>

    </div>
</div>
