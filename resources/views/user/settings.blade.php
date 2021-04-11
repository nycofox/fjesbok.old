<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }} -
            <spann class="text-sm text-gray-600">Settings</spann>
        </h2>
    </x-slot>

    <x-card>
        Settings...
    </x-card>
</x-app-layout>
