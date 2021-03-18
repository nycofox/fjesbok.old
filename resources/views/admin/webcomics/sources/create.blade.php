<x-admin-layout>
    <x-slot name="header">
        {{ $webcomic->name }} - create new source
    </x-slot>

    <x-card>
        <x-form action="{{ route('admin.webcomics.sources.store', $webcomic) }}" method="post">
            @include('admin.webcomics.sources._form')
        </x-form>
        <div class="mt-2">
            <a href="{{ route('admin.webcomics.sources', $webcomic) }}">Back to {{ $webcomic->name }}</a>
        </div>
    </x-card>
</x-admin-layout>
