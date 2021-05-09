<x-admin-layout>
    <x-admin-header>
        <a href="{{ route('admin.webcomics.index') }}">Webcomics</a>
        <i class="fa fa-angle-double-right text-80"></i>
        <a href="{{ route('admin.webcomics.sources', $webcomic) }}">{{ $webcomic->name }}</a>
        <small class="page-info text-dark-m3">
            <i class="fa fa-angle-double-right text-80"></i>
            Sources
        </small>
        </h1>
    </x-admin-header>

    <div class="card bcard h-auto">
        <table id="webcomics"
               class="d-style w-100 table text-dark-m1 text-95 border-y-1 brc-black-tp11 collapsed dtr-table">
            <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
            <tr>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    Homepage
                </th>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    Last scraped
                </th>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    # of strips
                </th>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    Status
                </th>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="pos-rel">
            @foreach($sources as $source)
                <tr class="d-style bgc-h-default-l4">
                    <td class="text-105">
                        <a href="{{ $source->homepage }}" title="{{ $source->homepage }}" target="_blank">
                            {{ Str::limit($source->homepage, 40) }}
                        </a>
                    </td>
                    <td class="text-105">
                        {{ $source->last_scraped_at ? $source->last_scraped_at->diffForHumans() : 'Never' }}
                    </td>
                    <td class="text-105">
                        {{ $source->strips_count }}
                    </td>
                    <td class="text-105">
                        @if($source->active)
                            <span class="m-1 badge bgc-green-l2 radius-round text-dark-tp4 px-3 text-90">
						        Active
					        </span>
                        @else
                            <span class="m-1 badge bgc-red-l3 radius-round text-danger-d3 px-3 text-90">
						        Inactive
					        </span>
                        @endif
                    </td>
                    <td class="text-105">
                        <a href="{{ route('admin.webcomics.sources.scrape', [$webcomic, $source]) }}"
                           class="text-indigo-600 hover:text-indigo-900 mr-2">Scrape now</a>
                        <a href="{{ route('admin.webcomics.sources.edit', [$webcomic, $source]) }}"
                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="m-2">
            <a href="{{ route('admin.webcomics.sources.create', $webcomic) }}" class="font-semibold">
                <i class="nav-icon fa fa-plus"></i>
                Add a new source
            </a>
        </div>

    </div>
</x-admin-layout>
