<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl font-bold text-red-800 leading-tight">
            @if(isset($header))
                <span class="text-black font-bold mt-2">{{ $header ?? '' }}</span> -
            @endif
            {{ config('app.name') }} ADMIN AREA
        </h2>
    </x-slot>

    <div class="flex flex-wrap">
        <div id="main" class="flex-grow md:mr-4">
            {{ $slot }}
        </div>
        <div id="sidebar" class="md:flex-none">
            @include('admin._sidebar')
        </div>

    </div>

</x-app-layout>
