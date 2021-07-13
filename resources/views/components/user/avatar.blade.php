<div class="flex relative w-16 h-16 bg-orange-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white">
    <a href="{{ route('profile', $user) }}">
        <img class="rounded-full" alt="{{ $user->name }}" src="{{ $user->avatar }}">
        @if(Cache::has('user-online-' . $user->id))
            <div class="bg-green-500 border-solid border-white border-2 rounded-full w-4 h-4 absolute bottom-0 right-0 p-1"></div>
        @else
            <div class="bg-gray-400 border-solid border-white border-2 rounded-full w-4 h-4 absolute bottom-0 right-0 p-1"></div>
        @endif
    </a>
</div>
