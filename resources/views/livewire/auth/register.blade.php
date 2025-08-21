<div class="flex min-h screen items-center justify-center bg-white">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-11/12 max-w-6xl">
    
        {{-- bagian kiri --}}
        <div class="flex flex-col justify-center px-6 md:px-12">
            <h1 class="text-5xl font-extrabold leading-tight">
                <span class="text-[#FFB97B]">Materia</span><br>
                <span class="text-[#424242]">Tempat Untuk Beli</span><br>
                <span class="text-[#424242]">Material Premium &</span><br>
                <span class="text-[#424242]">Lengkap</span>
            </h1>
        </div>

        {{-- bagian kanan --}}
        <div class="flex justify-center items-center">
            <div class="bg-white rounded-2xl shadow-[0_0_25px_rgba(0,0,0,0.15)] p-8 w-full  max-w-md m-14">
                <h2 class="text-xl font-bold mb-4">Register</h2>

                <form wire:submit.prevent="Register" class="space-y-4">
                {{-- input nama --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                    <input type="name" wire:model="name" placeholder="Masukkan nama lengkap"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100 focus:ring-2 focus:ring-orange-400">
                </div>
                {{-- input email --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" wire:model="email" placeholder="Masukkan email"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100 focus:ring-2 focus:ring-orange-400">
                </div>
                {{-- input password --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" wire:model="password" placeholder="Masukkan password"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100 focus:ring-2 focus:ring-orange-400">
                </div>
                {{-- input konfirmasi password --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                    <input type="password" wire:model="password_confirmation" placeholder="Konfirmasi password"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100 focus:ring-2 focus:ring-orange-400">
                </div>
                {{-- tombol register --}}
                <button type="submit"
                    class="w-full bg-[#FFB97B] text-white py-2 rounded-lg hover:bg-orange-400 transition">
                    Register
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
