@extends('layouts.app')

@section('content')
<section id="change-password-page" class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white shadow-md rounded-xl p-8">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">{{ __('Change Password') }}</h2>

        @if (session('status') === 'password-updated')
            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-300 rounded-md p-3">
                {{ __('Password updated successfully!') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user-password.update') }}" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Current Password --}}
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Current Password') }}
                </label>
                <input id="current_password" type="password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('current_password', 'updatePassword')  @enderror"
                    name="current_password" required autofocus>
                @error('current_password', 'updatePassword')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- New Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('New Password') }}
                </label>
                <input id="password" type="password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password', 'updatePassword')  @enderror"
                    name="password" required autocomplete="new-password">
                @error('password', 'updatePassword')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm New Password --}}
            <div>
                <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Confirm New Password') }}
                </label>
                <input id="password-confirm" type="password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password_confirmation', 'updatePassword')  @enderror"
                    name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation', 'updatePassword')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    {{ __('Change Password') }}
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
