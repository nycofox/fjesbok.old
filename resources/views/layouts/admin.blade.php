<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl font-bold text-red-800 leading-tight">
            @if(isset($header))
                <span class="text-black font-bold mt-2">{{ $header ?? '' }}</span>
                -
            @endif
            {{ config('app.name') }} ADMIN AREA
        </h2>
    </x-slot>

    {{ $slot }}

</x-app-layout>
