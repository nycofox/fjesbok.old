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

    <x-card>
        @forelse($post->comments as $comment)
            <div class="flex">
                <div class="flex items-top mr-4 -mt-4">
                    <livewire:votes :voteable="$comment"/>
                </div>
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
            </div>
            <hr>
        @empty
            <div>No replies yet!</div>
        @endforelse
    </x-card>
</div>
