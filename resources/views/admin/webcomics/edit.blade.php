<x-admin-layout>
    <x-slot name="header">
        Webcomics - edit {{ $webcomic->name }}
    </x-slot>

    <x-card>
        <x-form action="{{ route('admin.webcomics.update', $webcomic) }}" method="patch" enctype="multipart/form-data">
            @bind($webcomic)
            @include('admin.webcomics._form')
            @endbind
        </x-form>
    </x-card>
</x-admin-layout>
