<div>
    <x-card>
        <form wire:submit.prevent="postComment" method="post" action="#">
            @csrf

            <textarea id="body" wire:model.defer="body" name="body" rows="3"
                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                      placeholder="Want to add a reply?"></textarea>
            @error('body')
            <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
            @enderror
            <x-button class="mt-2">Add comment</x-button>
        </form>

    </x-card>

    <x-messages.success/>


    @forelse($post->comments as $comment)
        <x-card>
            <div class="mb-2">
                <div class="text-sm">
                    <a href="{{ route('profile', $comment->user) }}" class="font-semibold">
                        {{ $comment->user->name }}
                    </a>
                    replied {{ $comment->created_at->diffForHumans() }}:
                </div>
                <div class="text-lg">
                    {!! Str::markdown($comment->body) !!}
                </div>
            </div>
        </x-card>
    @empty
        <x-card>
            <div>No replies yet!</div>
        </x-card>
    @endforelse
</div>
