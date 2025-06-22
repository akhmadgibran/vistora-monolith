@extends('layouts.app')

@section('content')
<section id="profile-edit" class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-xl bg-white shadow-md rounded-xl p-8">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">{{ __('Edit Profile') }}</h2>

        @if (session('status') === 'profile-information-updated')
            <div class="mb-4 text-sm text-green-600 bg-green-100 border border-green-300 rounded-md p-3">
                {{ __('Profile updated successfully!') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user-profile-information.update') }}" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Name') }}</label>
                <input id="name" type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name', 'updateProfileInformation')  @enderror"
                    name="name"
                    value="{{ old('name', Auth::user()->name) }}"
                    required autocomplete="name" autofocus>
                @error('name', 'updateProfileInformation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email', 'updateProfileInformation')  @enderror"
                    name="email"
                    value="{{ old('email', Auth::user()->email) }}"
                    required autocomplete="email">
                @error('email', 'updateProfileInformation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Whatsapp Number') }}</label>
                <input id="phone" type="text"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('phone', 'updateProfileInformation')  @enderror"
                    name="phone"
                    value="{{ old('phone', Auth::user()->phone) }}"
                    required>
                @error('phone', 'updateProfileInformation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Address') }}</label>
                <textarea id="address"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('address', 'updateProfileInformation')  @enderror"
                    name="address"
                    required>{{ old('address', Auth::user()->address) }}</textarea>
                @error('address', 'updateProfileInformation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Change Password Link --}}
            <div class="text-center">
                <a href="{{ route('profile.password') }}" class="text-sm text-blue-600 hover:underline">
                    {{ __('Change Password?') }}
                </a>
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    {{ __('Update Profile') }}
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
