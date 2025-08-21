<div class="flex items-center bg-[#FFB97B] p-5 gap-3">
    <!-- Logo -->
    <div class="flex items-center font-bold text-lg text-white">
        <img src="{{ asset('img/logo2.png') }}" alt="" class="w-40  mr-2">
    </div>

    <!-- Search Field -->
    <div class="flex flex-1 items-center bg-white rounded-md px-3 py-1 outline outline-2 outline-[#424242] ml-8 mr-auto">
        <i class="fas fa-search text-[#424242] mr-2"></i>
        <input type="text" placeholder="Search Yours" 
            class="flex-1 border-none outline-none text-sm">
    </div>

    <!-- Cart -->
    <div class="mr-5">
        <i class="fa-solid fa-cart-shopping text-xl text-[#424242] cursor-pointer"></i>
    </div>

    <!-- Buttons -->
    <a href="{{ route('auth.login') }}" class="bg-white text-black px-4 py-1.5 rounded-full text-sm cursor-pointer">
        Login
    </a>
    <a href="{{route('auth.register')}}" class="bg-[#424242] text-white px-4 py-1.5 rounded-full text-sm cursor-pointer">
        Register
    </a>
</div>
