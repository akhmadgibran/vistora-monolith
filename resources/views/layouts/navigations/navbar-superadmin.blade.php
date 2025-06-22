<nav id="mainNavbar" class="bg-white shadow w-full z-50">
    <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center px-6 py-4">
        <a href="{{ route('superadmin.dashboard') }}" class="text-xl font-semibold text-gray-800">
            {{ config('app.name', 'Vistora') }}
        </a>

        <button id="navToggle" class="lg:hidden text-gray-700 focus:outline-none" aria-label="Toggle Navigation">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div id="navMenu" class="hidden w-full lg:w-auto lg:flex lg:items-center lg:justify-between mt-4 lg:mt-0">
            <ul class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-6 text-gray-700">
                {{-- <li><a href="{{ route('superadmin.product.index') }}" class="hover:text-blue-600">Product Management</a></li>
                <li><a href="{{ route('superadmin.category.index') }}" class="hover:text-blue-600">Category Management</a></li>
                <li><a href="{{ route('superadmin.admin.index') }}" class="hover:text-blue-600">Admin Management</a></li>
                <li><a href="{{ route('superadmin.shopstatus.index') }}" class="hover:text-blue-600">Shop Status Management</a></li>
                <li><a href="{{ route('superadmin.order.index') }}" class="hover:text-blue-600">Order Management</a></li>
                <li><a href="{{ route('superadmin.productpromotion.index') }}" class="hover:text-blue-600">Product Promotion Management</a></li>
                <li><a href="{{ route('superadmin.site-setting.index') }}" class="hover:text-blue-600">Website Content Management</a></li> --}}
            </ul>

            <ul class="mt-6 lg:mt-0 flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-4">
                @guest
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Register</a></li>
                    @endif
                @else
                    <li class="relative">
                        <button id="userMenuButton" class="flex items-center text-gray-700 hover:text-blue-600 focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="userMenu" class="absolute hidden right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-md z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{-- FIX: Complete Dropdown + Toggle Script --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        // Use querySelector for superadmin to avoid ID conflicts if both navbars are on the same page for testing
        const userMenuButton = document.querySelector('#userMenuButton'); 
        const userMenu = document.querySelector('#userMenu');

        // Toggle mobile menu
        if (navToggle && navMenu) {
            navToggle.addEventListener('click', () => {
                navMenu.classList.toggle('hidden');
            });
        }

        // Toggle user dropdown
        if (userMenuButton && userMenu) {
            userMenuButton.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevent the click from bubbling up to the document
                userMenu.classList.toggle('hidden');
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (userMenu && !userMenu.classList.contains('hidden') && userMenuButton && !userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    });
</script>