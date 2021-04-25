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

    @forelse($strips as $strip)
        <x-card>
            <div class="font-bold text-lg flex items-center">
                @if($strip->source->webcomic->media_id)
                    <img src="{{ $strip->source->webcomic->logoUrl }}" class="h-10">
                @else
                    {{ $strip->source->webcomic->name }}
                @endif
                <span class="ml-2 font-normal text-sm text-gray-500">by {{ $strip->source->webcomic->author }}</span>
            </div>
            <div>
                <img src="{{ $strip->media->url }}">
            </div>
        </x-card>
    @empty
        <x-card>
            No strips today
        </x-card>
    @endforelse

    @include('webcomics._pagination')
</x-app-layout>
