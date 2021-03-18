<div class="mr-4 flex-shrink-0">
    <a href="{{ route('profile', $post->user) }}">
        <img
            src="{{ $post->user->avatar }}"
            alt=""
            class="rounded-full"
            width="50"
            height="50"
        >
    </a>
{{--    <x-user.avatar :user="$user" />--}}
    <livewire:votes :voteable="$post" />
</div>
