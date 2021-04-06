<x-app-layout>
    <x-slot name="title">
        Available Webcomics
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Index of available Webcomics
        </h2>
    </x-slot>

    <x-card>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($webcomics as $webcomic)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-none w-40">
                                <img class="w-40"
                                     src="{{ $webcomic->logo }}"
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $webcomic->name }}
                                    <span class="text-sm text-gray-500">by {{ $webcomic->author ?? 'Unknown' }}</span>
                                </div>
                                @foreach($webcomic->sources as $source)

                                    <div>
                                        Subscribe
                                        <span class="font-medium">
                                            <a href="{{ $source->homepage }}">
                                                {{ parse_url($source->homepage, 1) }}
                                            </a>
                                        </span>
                                        <span class="text-gray-500">
                                            ({{ $source->language }})
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            <!-- More items... -->
            </tbody>
        </table>
    </x-card>
</x-app-layout>
