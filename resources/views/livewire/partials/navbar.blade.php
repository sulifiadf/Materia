<nav class="bg-[#FFB97B] p-4">
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="w-32 md:w-40">
        </div>

        <!-- Hamburger (mobile) -->
        <button id="menu-toggle" class="md:hidden text-white text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center flex-1 ml-8 gap-6">
            <!-- Search Field -->
            <div class="flex flex-1 items-center bg-white rounded-md px-3 py-1 outline outline-2 outline-[#424242]">
                <i class="fas fa-search text-[#424242] mr-2"></i>
                <input type="text" placeholder="Search Yours"
                    class="flex-1 border-none outline-none text-sm">
            </div>

            <!-- Cart -->
            <a href="/keranjang-page" wire:navigate class="text-[#424242] text-xl">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

            {{-- jika belum login --}}
            @guest
                <div class="flex gap-3">
                    <a href="/login" wire:navigate 
                        class="bg-white text-black px-4 py-1.5 rounded-full text-sm"> 
                        Login 
                    </a>
                    <a href="/register" wire:navigate
                        class="bg-[#424242] text-white px-4 py-1.5 rounded-full text-sm">
                        Register
                    </a>
                </div>
            @endguest

            {{-- jika sudah login --}}
            <div class="flex items-center gap-3">
                @auth
                    <div class="flex items-center gap-3">
                        <img src="#" 
                        alt=""
                        class="w-10 h-10 rounded-full border">

                        <form action="{{ route('logout') }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit">
                                <x-heroicon-o-arrow-right-on-rectangle class="w-6 h-6 text-white"/>
                            </button>
                        </form>

                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden flex-col mt-4 space-y-4 md:hidden">
        <!-- Search Field -->
        <div class="flex items-center bg-white rounded-md px-3 py-1 outline outline-2 outline-[#424242]">
            <i class="fas fa-search text-[#424242] mr-2"></i>
            <input type="text" placeholder="Search Yours"
                class="flex-1 border-none outline-none text-sm">
        </div>

        <!-- Cart -->
        <a href="/keranjang-page" wire:navigate class="text-[#424242] text-lg flex items-center gap-2">
            <i class="fa-solid fa-cart-shopping"></i> Cart
        </a>

    </div>
</nav>

<script>
    // Toggle mobile menu
    document.getElementById("menu-toggle").addEventListener("click", function() {
        const menu = document.getElementById("mobile-menu");
        menu.classList.toggle("hidden");
    });
</script>
