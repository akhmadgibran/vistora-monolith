@if (session('success'))
    <div class="container mx-auto mt-4 px-4">
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="container mx-auto mt-4 px-4">
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded shadow">
            {{ session('error') }}
        </div>
    </div>
@endif

@if (session('info'))
    <div class="container mx-auto mt-4 px-4">
        <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded shadow">
            {{ session('info') }}
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="container mx-auto mt-4 px-4">
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 px-4 py-3 rounded shadow">
            {{ session('warning') }}
        </div>
    </div>
@endif

{{-- @props(['type' => 'info', 'message' => ''])

@php
    $colors = [
        'success' => 'green',
        'error' => 'red',
        'info' => 'blue',
        'warning' => 'yellow',
    ];
    $color = $colors[$type] ?? 'gray';
@endphp

@if ($message)
    <div class="container mx-auto mt-4 px-4">
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-300 text-{{ $color }}-800 px-4 py-3 rounded shadow">
            {{ $message }}
        </div>
    </div>
@endif --}}
{{-- 
<x-flash-message type="success" :message="session('success')" />
<x-flash-message type="error" :message="session('error')" /> --}}
