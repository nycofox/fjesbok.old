<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }} -
            <spann class="text-sm text-gray-600">Timeline</spann>
        </h2>
    </x-slot>

    <header class="mt-16">
        <div class="flex justify-center">
            <img class="h-40 w-40 rounded-full p-1 bg-white shadow-md"
                 src="{{ $user->avatar }}&s=400"
                 alt="">
        </div>
        <x-card class="md:-mt-24">
            <div class="flex justify-between items-center">
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center">
                        <h2 class="font-bold text-xl text-gray-800">{{ $postcount }}</h2>
                        <span class="text-gray-600">posts</span>
                    </div>
                    <div class="text-center">
                        <h2 class="font-bold text-xl text-gray-800">{{ $commentcount }}</h2>
                        <span class="text-gray-600">comments</span>
                    </div>
                    <div class="text-center">
                        <h2 class="font-bold text-xl text-gray-800">{{ $user->karma }}</h2>
                        <span class="text-gray-600">karma</span>
                    </div>
                </div>
                {{--                <div class="mx-10"></div>--}}
                <div>
                    @if($user->id = auth()->id())
                        <x-button>Edit profile</x-button>
                    @else
                        <x-button>Add as friend</x-button>
                    @endif
                </div>
            </div>
        </x-card>
    </header>

    @forelse($posts as $post)
        @include('post.postcard')
    @empty
        <x-card>{{ $user->name }} hasn't posted anything yet, why don't you encourage them?</x-card>
    @endforelse
</x-app-layout>
