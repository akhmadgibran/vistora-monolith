@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white shadow-md rounded-xl p-8 text-center">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            {{ __('Verify Your Email Address') }}
        </h2>

        @if (session('resent'))
            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-300 rounded-md p-3">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p class="text-gray-700 mb-2">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>
        <p class="text-gray-700">
            {{ __('If you did not receive the email') }},
        </p>

        <form method="POST" action="{{ route('verification.send') }}" class="inline-block mt-4">
            @csrf
            <button type="submit"
                class="text-blue-600 hover:underline font-medium text-sm focus:outline-none">
                {{ __('click here to request another') }}
            </button>.
        </form>

        <div class="mt-6">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="w-full inline-block text-center bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md transition">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</section>
@endsection
