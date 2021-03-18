<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Timeline
            <span class="ml-4 text-sm">Friends</span>
            <span class="ml-4 text-sm">Everyone</span>
        </h2>
    </x-slot>

    <div>
        @forelse($posts as $post)
            @include('post.postcard')
        @empty
            <x-card>Nothing here yet...</x-card>
        @endforelse
        <div class="my-4">
            {{ $posts->links() }}
        </div>

    {{--    <livewire:posts />--}}
</x-app-layout>
