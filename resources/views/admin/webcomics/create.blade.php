<x-admin-layout>
    <x-slot name="header">
        Webcomics - create new
    </x-slot>

    <x-card>
        <x-form action="{{ route('admin.webcomics.store') }}" method="post">
            <x-form-input name="name" label="Name" />
            <x-form-input name="slug" label="Slug" />
            <x-form-input name="author" label="Author" />

            <x-form-submit />
        </x-form>
    </x-card>
</x-admin-layout>
