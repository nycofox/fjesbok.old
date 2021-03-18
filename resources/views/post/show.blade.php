<x-app-layout>
    <x-card>
        <div class="flex">
            @include('post._postleft')
            <div>
                <header class="mb-2">
                    <h3 class="font-bold">
                        <a href="{{ route('profile', $post->user) }}">{{ $post->user->name }}</a>
                    </h3>
                    <div class="flex text-sm">
                        <div class="mr-4">posted {{ $post->created_at->diffForHumans() }}</div>
                    </div>
                </header>

                <div class="text-lg space-y-4">
                    {!! Str::markdown($post->body) !!}
                </div>

                @if($post->media_id)
                    <div class="mt-2">
                        <a href="#">
                            <img src="{{ $post->media->url }}">
                        </a>
                    </div>
                @endif

                <div class="mt-4">
                    @include('post._postmenu')
                </div>

            </div>
        </div>
    </x-card>

    <livewire:comments-section :post="$post" />

{{--    <x-modal />--}}

</x-app-layout>
