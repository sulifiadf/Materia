<div class="min-h-screen bg-[#F3F5F7] p-6">

    <div class="grid grid-cols-1  gap-1 mb-4">

        {{-- bagian atas --}}
        <div class="grid grid-cols-1 items-center gap-2 p-2">
            <h2 class="text-lg font-bold">Keranjang</h2>
            <div class="flex items-center gap-3 border-y border-gray-600 py-2">
                <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-500 rounded focus:ring-blue-500">
                <label class="text-lg font-semibold">Pilih Semua</label>
            </div>
        </div>

        {{-- bagian TENGAH --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 p-2">

            {{-- tabel kiri --}}
            <div class="col-span-2 md:col-span-2 lg:col-span-3 p-2">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="border-b border-black">
                        <th class="text-left py-3">Product</th>
                        <th class="text-left py-3">Quantity</th>
                        <th class="text-left py-3">Price</th>
                        <th class="text-left py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($data as $item)
                    <tr class="align-middle">
                        <!-- Product -->
                        <td class="py-4 flex items-center gap-4">
                            <input type="checkbox" class="w-4 h-4">
                            <img src="#" alt="abc">
                            <div>
                                <p class="font-semibold">Name</p>
                                <x-heroicon-o-trash class="w-4 h-4"/>
                            </div>
                        </td>
                        <!-- Quantity -->
                        <td class="py-4">
                        <div class="flex items-center border rounded-md w-max">
                            <button class="px-3 py-1">−</button>
                            <span class="px-4">2</span>
                            <button class="px-3 py-1">+</button>
                        </div>
                        </td>
                        {{-- price --}}
                        <td class="py-4 font-semibold">
                            Rp 50.000
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

            {{-- form kanan --}}
            <div class="contianer rounded-lg border-2 border-black h-max  p-2">
                <h2 class="text-lg font-bold mb-4">Total</h2>
                <div class="flex justify-between mb-2">
                    <span class="font-semibold">Subtotal:</span>
                    <span>Rp 100.000</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="font-semibold">Tax:</span>
                    <span>Rp 10.000</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="font-semibold">Total:</span>
                    <span>Rp 110.000</span>
                </div>
                <a href="{{route('livewire.checkout-page')}}" class="w-full bg-[#424242] text-white py-2 rounded-md hover:bg-black">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
