<div class="flex min-h-screen items-center justify-center bg-white">
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
            <div class="bg-white rounded-2xl shadow-[0_0_25px_rgba(0,0,0,0.15)] p-8 w-full max-w-md m-14">
                <h2 class="text-xl font-bold mb-4">Register</h2>

                {{-- Display success message --}}
                @if (session()->has('message'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                {{-- Display error message --}}
                @if (session()->has('error'))
                    <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="register" class="space-y-4">
                    {{-- input nama --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                        <input type="text" 
                            wire:model.defer="name"
                            placeholder="Masukkan nama lengkap"
                            class="w-full px-4 py-2 rounded-lg border @error('name') border-red-500 bg-red-50 @else border-gray-300 bg-orange-100 @enderror focus:ring-2 focus:ring-orange-400">
                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- input email --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" 
                            wire:model.defer="email"
                            placeholder="Masukkan email"
                            class="w-full px-4 py-2 rounded-lg border @error('email') border-red-500 bg-red-50 @else border-gray-300 bg-orange-100 @enderror focus:ring-2 focus:ring-orange-400">
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- input password --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" 
                            wire:model.defer="password"
                            placeholder="Masukkan password"
                            class="w-full px-4 py-2 rounded-lg border @error('password') border-red-500 bg-red-50 @else border-gray-300 bg-orange-100 @enderror focus:ring-2 focus:ring-orange-400">
                        @error('password')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- input konfirmasi password --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                        <input type="password" 
                            wire:model.defer="password_confirmation"
                            placeholder="Konfirmasi password"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100 focus:ring-2 focus:ring-orange-400">
                    </div>

                    {{-- tombol register --}}
                    <button 
                        type="submit" 
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-not-allowed"
                        class="w-full bg-[#FFB97B] text-white py-2 rounded-lg hover:bg-orange-400 transition duration-200">
                        <span wire:loading.remove>Register</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </form>

                {{-- Link to login --}}
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('auth.login') }}" class="text-[#FFB97B] hover:text-orange-400 font-medium">
                            Login disini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>