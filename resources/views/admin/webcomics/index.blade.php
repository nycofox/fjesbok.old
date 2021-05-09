<x-admin-layout>
    <x-admin-header>
            <a href="{{ route('admin.webcomics.index') }}">Webcomics</a>
            <small class="page-info text-dark-m3">
                <i class="fa fa-angle-double-right text-80"></i>
                Index
            </small>
        </h1>
    </x-admin-header>

    <div class="card bcard h-auto">
        <table id="webcomics"
               class="d-style w-100 table text-dark-m1 text-95 border-y-1 brc-black-tp11 collapsed dtr-table">
            <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
            <tr>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    Name
                </th>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm text-nowrap" scope="col">
                    # of sources
                </th>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm" scope="col">
                    &nbsp;
                </th>
            </tr>
            </thead>
            <tbody class="pos-rel">
            @foreach($webcomics as $webcomic)
                <tr class="d-style bgc-h-default-l4">
                    <td class="text-105">
                        <div class="row">
                            <div class="col-sm-1">
                                <img class="img-fluid"
                                     src="{{ $webcomic->logoUrl }}"
                                     alt="">
                            </div>
                            <div class="col-auto">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="{{ route('admin.webcomics.sources', $webcomic) }}">{{ $webcomic->name }}</a>
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $webcomic->author ?? 'Unknown' }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-105">
                        {{ $webcomic->sources_count }}
                    </td>
                    <td class="text-105 text-nowrap">
                        <a href="{{ route('admin.webcomics.edit', $webcomic) }}">
                            <i class="nav-icon fa fa-edit"></i> Edit</a><br>
                        <a href="{{ route('admin.webcomics.sources.create', $webcomic) }}">
                            <i class="nav-icon fa fa-plus"></i> Add source</a>
                    </td>
                </tr>
            @endforeach
            <!-- More items... -->
            </tbody>
        </table>

        <div class="mt-2">
            <a href="{{ route('admin.webcomics.create') }}" class="font-semibold">
                <i class="nav-icon fa fa-plus"></i> Add a new webcomic</a>
        </div>
    </div>
</x-admin-layout>
