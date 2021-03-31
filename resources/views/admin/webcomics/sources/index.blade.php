<x-admin-layout>
    <x-slot name="header">
        {{ $webcomic->name }} sources
    </x-slot>

    <x-card>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Homepage
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Last scraped
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    # of strips
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sources as $source)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ $source->homepage }}" title="{{ $source->homepage }}">
                        {{ Str::limit($source->homepage, 40) }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $source->last_scraped_at ? $source->last_scraped_at->diffForHumans() : 'Never' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $source->strips_count }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($source->active)
                            <span class="text-xm py-1 px-2 bg-green-400 text-white rounded font-bold">Active</span>
                        @else
                            <span class="text-xm py-1 px-2 bg-red-400 text-white rounded font-bold">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.webcomics.sources.scrape', [$webcomic, $source]) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Scrape now</a>
                        <a href="{{ route('admin.webcomics.sources.edit', [$webcomic, $source]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-2">
            <a href="{{ route('admin.webcomics.sources.create', $webcomic) }}" class="font-semibold">Add a new
                source</a>
        </div>

    </x-card>
</x-admin-layout>
