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
                @include('post._postmenu')
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

        </div>
    </div>
</x-card>
