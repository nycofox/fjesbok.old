<x-card>
    <div class="uppercase tracking-wide text-c2 mb-4">Site</div>
    <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest border-b-0"
         @if(Route::is('admin.dashboard'))
         style="border-left: 4px solid #e2624b !important;"
        @endif
    >
        <a href="{{ route('admin.dashboard') }}" class="pl-2">Admin Dashboard</a>
    </div>
    <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest"
         @if(Route::is('admin.users.*'))
         style="border-left: 4px solid #e2624b !important;"
        @endif
    >
        <a href="{{ route('admin.users.index') }}" class="pl-2">Users</a>
    </div>
    <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
        <a href="{{ url(config('laravel-log-reader.view_route_path')) }}" class="pl-2">Log Reader</a>
    </div>

    <div class="uppercase tracking-wide text-c2 mb-4 mt-8">Modules</div>
    <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest"
         @if(Route::is('admin.webcomics.*'))
         style="border-left: 4px solid #e2624b !important;"
        @endif
    >
        <a href="{{ route('admin.webcomics.index') }}" class="pl-2">Webcomics</a>
    </div>

</x-card>
