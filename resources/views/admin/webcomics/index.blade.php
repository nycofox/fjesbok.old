<x-admin-layout>
    <x-slot name="header">
        Webcomics - Index
    </x-slot>

    <x-card>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    # of sources
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($webcomics as $webcomic)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-40">
                                <img class="h-10"
                                     src="{{ $webcomic->logoUrl }}"
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="{{ route('admin.webcomics.sources', $webcomic) }}">{{ $webcomic->name }}</a>
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $webcomic->author ?? 'Unknown' }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $webcomic->sources_count }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.webcomics.edit', $webcomic) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="{{ route('admin.webcomics.sources.create', $webcomic) }}" class="ml-2 text-indigo-600 hover:text-indigo-900">Add source</a>
                    </td>
                </tr>
            @endforeach
            <!-- More items... -->
            </tbody>
        </table>

        <div class="mt-2">
            <a href="{{ route('admin.webcomics.create') }}" class="font-semibold">Add a new webcomic</a>
        </div>

    </x-card>
</x-admin-layout>
