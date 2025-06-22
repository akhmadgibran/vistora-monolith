<nav id="mainNavbar" class="bg-primer-light shadow w-full z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            {{-- <img src="{{ $siteSettings->logo_path ? asset('storage/' . $siteSettings->logo_path) : asset('default-images/logo-default.png') }}"
                alt="{{ $siteSettings->shop_name }}" class="w-12 h-auto"> --}}
            <img src="{{ asset('images/logo/vistora_logo_only_no_bg.png') }}"
                alt="Vistora Logo" class="w-12 h-auto">
        </a>

        <!-- Toggle Button -->
        <button id="navToggle" class="lg:hidden text-gray-700 focus:outline-none" aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div id="navMenu" class="hidden lg:flex lg:items-center lg:space-x-6 w-full lg:w-auto mt-4 lg:mt-0 flex-col lg:flex-row">
            <ul class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-6 text-gray-800">
                <li><a href="{{ route('home') }}" class="hover:text-primer-dark">Home</a></li>
                {{-- <li><a href="{{ route('product.category') }}" class="hover:text-primer-dark">Product</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-primer-dark">About us</a></li> --}}
            </ul>

            <!-- Mobile-only login/register -->
            <div class="lg:hidden flex flex-col mt-4 space-y-2 w-full">
                <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded text-center">Login</a>
                <a href="{{ route('register') }}" class="bg-green-600 text-white py-2 px-4 rounded text-center">Register</a>
            </div>
        </div>

        <!-- Right Side Of Navbar (Desktop only) -->
        <div class="hidden lg:flex items-center space-x-4">
            <a href="{{ route('login') }}">
                {{-- <img class="w-9 h-9" src="{{ asset('icons/iconamoon_profile-circle-fill.png') }}" alt="login"> --}}
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1 rounded 00 transition">Login</button>
            </a>
        </div>
    </div>
</nav>




<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navbar = document.getElementById('mainNavbar');
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        const navbarOffsetTop = navbar.offsetTop;

        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });

        window.addEventListener('scroll', () => {
            if (window.scrollY > navbarOffsetTop) {
                navbar.classList.add('fixed', 'top-0', 'left-0', 'right-0');
                document.body.style.paddingTop = navbar.offsetHeight + 'px';
            } else {
                navbar.classList.remove('fixed', 'top-0', 'left-0', 'right-0');
                document.body.style.paddingTop = '0';
            }
        });
    });
</script>
