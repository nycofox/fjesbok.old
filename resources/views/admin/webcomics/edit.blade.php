<x-admin-layout>
    <x-slot name="header">
        Webcomics - edit {{ $webcomic->name }}
    </x-slot>

    <x-card>
        <x-form action="{{ route('admin.webcomics.update', $webcomic) }}" method="patch">
            @bind($webcomic)
            <x-form-input name="name" label="Name"/>
            <x-form-input name="slug" label="Slug"/>
            <x-form-input name="author" label="Author"/>

            <x-form-submit/>
            @endbind
        </x-form>
    </x-card>
</x-admin-layout>
