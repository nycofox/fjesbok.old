<div>
    @forelse($posts as $post)
        @include('post.postcard')
    @empty
        <x-card>Nothing here yet...</x-card>
    @endforelse
    <div class="my-4">
        {{--        {{ $posts->links() }}--}}
    </div>

    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
</div>
