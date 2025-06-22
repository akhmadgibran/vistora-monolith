<nav id="mainNavbar" class="bg-white shadow w-full z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            {{-- <img src="{{ $siteSettings->logo_path ? asset('storage/' . $siteSettings->logo_path) : asset('default-images/logo-default.png') }}"
                 alt="{{ $siteSettings->shop_name }}" class="w-12 h-auto"> --}}
            <img src="{{ asset('images/logo/vistora_logo_only_no_bg.png') }}"
                alt="Vistora Logo" class="w-12 h-auto">
        </a>

        <!-- Toggle Button (Mobile) -->
        <button id="navToggle" class="lg:hidden text-gray-800 focus:outline-none" aria-label="Toggle navigation">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div id="navMenu" class="hidden lg:flex lg:items-center lg:space-x-6 flex-col lg:flex-row w-full lg:w-auto mt-4 lg:mt-0">
            <ul class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-6 text-gray-800">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Home</a></li>
                {{-- <li><a href="{{ route('product.category') }}" class="hover:text-blue-600">Product</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-blue-600">About us</a></li> --}}
            </ul>

            <!-- Mobile-only buttons -->
            <div class="lg:hidden flex flex-col mt-4 space-y-2 w-full">
                {{-- <a href="{{ route('customer.cart.index') }}" class="bg-green-600 text-white py-2 px-4 rounded text-center">Cart</a> --}}
                <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white py-2 px-4 rounded text-center">Profile</a>
                {{-- <a href="{{ route('customer.order.index') }}" class="bg-indigo-600 text-white py-2 px-4 rounded text-center">Order</a> --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded w-full">Logout</button>
                </form>
            </div>
        </div>

        <!-- Desktop Right Side -->
        <div class="hidden lg:flex items-center space-x-4">
            {{-- <a href="{{ route('customer.cart.index') }}">
                <img class="w-8 h-8" src="{{ asset('icons/mage_basket-fill.png') }}" alt="cart">
            </a>
            <a href="{{ route('customer.order.index') }}">
                <img class="w-8 h-8" src="{{ asset('icons/lsicon_order-filled.png') }}" alt="order">
            </a>
            <a href="{{ route('profile.edit') }}">
                <img class="w-8 h-8" src="{{ asset('icons/iconamoon_profile-circle-fill.png') }}" alt="profile">
            </a> --}}
            <a href="{{ route('profile.edit') }}">
                <button class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 transition">Profile</button>
            </a> 
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 transition">Logout</button>
            </form>
        </div>
    </div>
</nav>
