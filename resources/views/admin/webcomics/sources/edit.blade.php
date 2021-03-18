<x-admin-layout>
    <x-slot name="header">
        {{ $webcomic->name }} - edit source "{{ $source->name }}"
    </x-slot>

    <x-card>
        <x-form action="{{ route('admin.webcomics.sources.update', [$webcomic, $source]) }}" method="patch">
            @bind($source)
            @include('admin.webcomics.sources._form')
            @endbind
        </x-form>
        <div class="mt-2">
            <a href="{{ route('admin.webcomics.sources', $webcomic) }}">Back to {{ $webcomic->name }}</a>
        </div>
    </x-card>
</x-admin-layout>
