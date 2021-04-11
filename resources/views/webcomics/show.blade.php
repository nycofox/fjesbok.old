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
            <div class="font-bold text-lg">{{ $strip->source->webcomic->name }}
                <span class="font-normal text-sm text-gray-500">by {{ $strip->source->webcomic->author }}</span>
                <div>
                    <img src="{{ $strip->media->url }}">
                </div>
			</div>
        </x-card>
    @empty
        <x-card>
            No strips today
        </x-card>
    @endforelse

    @include('webcomics._pagination')
</x-app-layout>
