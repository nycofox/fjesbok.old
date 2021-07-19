<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($date->isToday())
                Todays Webcomics ({{ $date->format('Y-m-d') }})
                <x-slot name="title">Webcomics today</x-slot>
            @else
                Webcomics for {{ $date->format('Y-m-d') }}
                <x-slot name="title">Webcomics ({{ $date->format('Y-m-d') }})</x-slot>
            @endif
        </h2>
    </x-slot>

    @forelse($webcomics['strips'] as $webcomic)
        <x-card>
            <div class="font-bold text-lg flex items-center">
                {{ $webcomic[0]['source']['webcomic']['name'] }}
                <span
                    class="ml-2 font-normal text-sm text-gray-500">by {{ $webcomic[0]['source']['webcomic']['author'] }}</span>
            </div>
            <div class="space-y-4">
                @foreach($webcomic as $strip)
                    <div>
                        <img src="{{ $strip['url'] }}" class="object-fill">
                        <div class="flex justify-between">
                            <span class="text-xs pl-1">
                                <a href="{{ deref_url($strip['source']['homepage']) }}">{{ $strip['source']['name'] }}</a>
                            </span>
                            <span></span>
                        </div>
                    </div>

                @endforeach
            </div>
        </x-card>
    @empty
        <x-card>
            No strips today
        </x-card>
    @endforelse

    @include('webcomics._pagination')
</x-app-layout>
