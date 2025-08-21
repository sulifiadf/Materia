<div class="min-h-screen bg-[#F3F5F7] p-6">
    <div class="grid grid-cols-1 gap-1 mb-4">

        {{-- judul atas --}}
        <div class="grid grid-cols-1 item-center gap-2 p-2 border-b border-black">
            <h2 class="text-lg font-bold">Checkout</h2>
        </div>

        {{-- form checkout--}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 p-2">

            {{-- form kiri --}}
            <div class="flex flex-col col-span-2 md:col-span-3 lg:col-span-3 p-2">
                {{-- form1 --}}
                <div class="container rounded-md border-2 border-gray-500 h-max p-4 mb-4">
                    <h2 class="text-lg font-semibold mb-4">Contact Information</h2>
                    <form>
                        <div class="mb-4">
                            <label for="nama_penerima" class="block text-sm font-medium text-gray-600">Nama Penerima</label>
                            <input type="nama_penerima" id="nama_penerima" name="nama_penerima" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-600">Nomor Telepon</label>
                            <input type="nomor_telepon" id="nomor_telepon" name="nomor_telepon" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </form>
                </div>
                {{-- form2 --}}
                <div class="container rounded-md border-2 border-gray-500 h-max p-4 mb-4">
                    <h2 class="text-lg font-semibold mb-4">Address Information</h2>
                    <form>
                        <div class="mb-4">
                            <label for="label" class="block text-sm font-medium text-gray-600">Jenis Alamat</label>
                            <input type="label" id="label" name="label" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                            <input type="alamat" id="alamat" name="alamat" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="kota" class="block text-sm font-medium text-gray-600">Kota</label>
                            <input type="kota" id="kota" name="kota" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="provinsi" class="block text-sm font-medium text-gray-600">Provinsi</label>
                            <input type="provinsi" id="provinsi" name="provinsi" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="kode_pos" class="block text-sm font-medium text-gray-600">Kode Pos</label>
                            <input type="kode_pos" id="kode_pos" name="kode_pos" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </form>
                </div>
                {{-- form3 --}}
                <div class="container rounded-md border-2 border-gray-500 h-max p-4">
                    <h2 class="text-lg font-semibold mb-4">Payment Method</h2>
                    <form action="">
                        <div class="mb-4">
                            <label for="metode_pembayaran" class="block text-sm font-medium text-gray-600">Metode Pembayaran</label>
                            <select id="metode_pembayaran" name="metode_pembayaran" class="mt-1 bg-[#F3F5F7] block w-full border border-gray-300 rounded-md shadow-none focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="transfer">Transfer Bank</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            {{-- form kanan --}}
            <div class="col-span-2 md:col-span-2 lg:col-span-1 p-2">
                <div class="container rounded-md border-2 border-gray-500  h-max p-4">
            
            <!-- Header -->
            <h2 class="text-lg font-bold mb-4">Order summary</h2>

            <!-- Items -->
            <div class="space-y-4">
            <!-- Item 1 -->
            <div class="flex items-start justify-between border-b pb-4">
                <div class="flex gap-3">
                <img src="https://via.placeholder.com/60" alt="Product" class="w-16 h-16 rounded-md border">
                <div>
                    <p class="font-semibold">Name</p>
                    <p class="text-sm text-gray-500">Color: Black</p>
                    <p class="text-sm font-medium">2</p>
                </div>
                </div>
                <p class="font-semibold">Rp.70,000</p>
            </div>

            <!-- Item 2 -->
            <div class="flex items-start justify-between border-b pb-4">
                <div class="flex gap-3">
                <img src="https://via.placeholder.com/60" alt="Product" class="w-16 h-16 rounded-md border">
                <div>
                    <p class="font-semibold">Name</p>
                    <p class="text-sm text-gray-500">Color: Red</p>
                    <p class="text-sm font-medium">2</p>
                </div>
                </div>
                <p class="font-semibold">Rp.70,000</p>
            </div>

            <!-- Item 3 -->
            <div class="flex items-start justify-between border-b pb-4">
                <div class="flex gap-3">
                <img src="https://via.placeholder.com/60" alt="Product" class="w-16 h-16 rounded-md border">
                <div>
                    <p class="font-semibold">Name</p>
                    <p class="text-sm text-gray-500">Color: Gold</p>
                    <p class="text-sm font-medium">2</p>
                </div>
                </div>
                <p class="font-semibold">Rp.70,000</p>
            </div>
            </div>

            <!-- Promo Code Input -->
            <div class="flex gap-2 mt-4">
            <input type="text" placeholder="Input" class="flex-1 border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="px-4 py-2 bg-black text-white text-sm rounded-md">Apply</button>
            </div>

            <!-- Applied Promo -->
            <div class="flex justify-between items-center mt-4 text-sm">
            <div class="flex items-center gap-2">
                <x-heroicon-o-ticket class="w-4 h-4 text-blue-500"/>
                <span class="text-gray-700">M4T3R1A</span>
            </div>
            <div class="text-green-500 font-medium">
                -$25.00 <span class="text-xs text-red-500 cursor-pointer ml-1">[Remove]</span>
            </div>
            </div>

            <!-- Summary -->
            <div class="mt-4 space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="font-medium">Shipping:</span>
                <span>Free</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Subtotal:</span>
                <span class="font-semibold">Rp.210,000</span>
            </div>
            <div class="flex justify-between text-lg font-bold border-t pt-2">
                <span>Total</span>
                <span>Rp.210,000</span>
            </div>
            </div>

            <!-- Button -->
            <button class="w-full mt-4 bg-[#424242] text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Place Order
            </button>

        </div>
        </div>

        </div>
    </div>
</div>
