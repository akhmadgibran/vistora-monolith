@extends('layouts.app')

@section('content')
{{-- 
    Menggunakan min-h-screen untuk memastikan section mengambil tinggi layar penuh.
    bg-gray-50 memberikan sedikit warna latar belakang agar kontras dengan kartu putih.
--}}
<section id="welcome-page" class="min-h-screen bg-gray-50">

    {{-- Kontainer flex untuk menempatkan kartu di tengah secara vertikal dan horizontal --}}
    <div class="flex items-center justify-center min-h-screen p-4">

        {{-- 
            Ini adalah kartu utama.
            - bg-white: Warna latar belakang kartu (sebelumnya bg-card-primer).
            - rounded-2xl: Sudut yang lebih tumpul, setara dengan rounded-4 di Bootstrap.
            - p-8 sm:p-12: Padding yang responsif, lebih besar di layar yang lebih lebar.
            - w-full max-w-md: Lebar kartu akan penuh di layar kecil dan maksimal 512px di layar besar.
        --}}
        <div class="w-full max-w-md p-8 mx-auto bg-white shadow-sm rounded-2xl sm:p-12">
            
            {{-- 
                Judul (sebelumnya title-script).
                - text-3xl: Ukuran font besar.
                - font-bold: Teks tebal.
                - text-gray-800: Warna teks gelap.
                - mb-6: Margin bawah (setara mb-4 di Bootstrap).
            --}}
            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">
                {{ __('Welcome!') }}
            </h2>

            {{-- 
                Contoh jika Anda ingin menampilkan pesan status (dari kode asli Anda).
                Ini adalah styling untuk alert-success versi Tailwind.
            --}}
            @if (session('status'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="mb-8 text-center text-gray-600">
                {{ __('Welcome to Vistora, your first step to digitalize your shop online!') }}
            </p>

            <div>
                {{--
                    Tombol yang dibuat dari utility classes.
                    - block w-full: Agar link mengambil lebar penuh.
                    - bg-indigo-600: Warna latar tombol (sebelumnya bg-button-primer).
                    - hover:bg-indigo-700: Efek hover.
                    - focus:ring: Efek outline saat tombol di-fokus (baik untuk aksesibilitas).
                    - transition-colors: Animasi perubahan warna yang halus.
                --}}
                <a href="{{ route('home') }}" class="block w-full px-4 py-3 font-semibold text-center text-white transition-colors duration-200 bg-indigo-600 hover:bg-indigo-700 rounded-lg  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Start Shopping') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection