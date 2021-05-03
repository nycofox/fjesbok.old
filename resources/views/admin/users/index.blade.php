<x-admin-layout>
    <x-slot name="header">
        List of all users
    </x-slot>

    <x-card>
        @livewire('admin.users-datatable')
    </x-card>
</x-admin-layout>
