@extends('layouts.app')

@section('content')
<section id="forgot-password-page" class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white shadow-md rounded-xl p-8">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">{{ __('Forgot Your Password?') }}</h2>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded text-sm">
                {{ session('status') }}
            </div>
        @endif

        <p class="text-center text-sm text-gray-600 mb-6">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link.') }}
        </p>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus autocomplete="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email')  @enderror">

                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md  transition">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>

        <div class="text-center mt-6 text-sm text-gray-600">
            <p>Remember your password? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a></p>
        </div>
    </div>
</section>
@endsection
