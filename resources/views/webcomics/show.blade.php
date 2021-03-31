<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Webcomics for {{ $date->format('Y-m-d') }}
        </h2>
    </x-slot>

    <x-card>
        Comic...
    </x-card>
</x-app-layout>
