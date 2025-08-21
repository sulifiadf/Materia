<div class="flex min-h-screen items-center justify-center bg-white">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-11/12 max-w-6xl">

        <!-- Bagian Kiri -->
        <div class="flex flex-col justify-center px-6 md:px-12">
            <h1 class="text-5xl font-extrabold leading-tight">
                <span class="text-[#FFB97B]">Materia</span><br>
                <span class="text-[#424242]">Tempat Untuk Beli</span><br>
                <span class="text-[#424242]">Material Premium &</span><br>
                <span class="text-[#424242]">Lengkap</span>
            </h1>

            <p class="mt-6 text-gray-700">
                Belum Punya Akun? <a href="#" class="text-blue-600 hover:underline">Register Terlebih Dahulu</a>
            </p>
        </div>

        <!-- Bagian Kanan (Form Login) -->
        <div class="flex justify-center items-center">
            <div class="bg-white rounded-2xl shadow-[0_0_25px_rgba(0,0,0,0.15)] p-8 w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Login</h2>

                <form wire:submit.prevent="login" class="space-y-4">
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" wire:model="email" placeholder="Enter your email id"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" wire:model="password" placeholder="Enter your password"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-orange-100">
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit"
                        class="w-full bg-[#FFB97B] text-white py-2 rounded-lg hover:bg-orange-400 transition">
                        Login
                    </button>
                </form>

                <p class="text-sm text-gray-600 mt-4 text-center">
                    Not registered yet?
                    <a href="{{route('auth.register')}}" class="text-blue-600 hover:underline">Create an account</a>
                </p>
            </div>
        </div>
    </div>
</div>
