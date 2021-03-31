<div class="flex text-sm font-semibold">
    <a href="{{ route('post.show', $post) }}" class="mr-4">
        {{ $post->comments_count }} {{ Str::plural('comment', $post->comments_count) }}
    </a>
    <form method="post" action="#">
        @csrf
        <button class="font-semibold" wire:click="$set('favoritePost', true)">Save</button>
    </form>

    @cannot('update', $post)
        <a href="#" class="ml-4">Report</a>
    @endcannot

    @can('update', $post)
        <a href="#" class="ml-4">Edit</a>
        <form method="post" action="{{ route('post.destroy', $post) }}">
            @csrf
            <button class="font-semibold ml-4" wire:click="$set('deletePost', true)">Delete</button>
        </form>
    @endcan

</div>
