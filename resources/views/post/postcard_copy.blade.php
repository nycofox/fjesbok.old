<x-card>
    <div class="flex">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ route('profile', $post->user) }}">
                <img
                    src="{{ $post->user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50"
                    height="50"
                >
            </a>
        </div>
        <div>
            <h3 class="mb-2">
                <a class="font-bold" href="{{ route('profile', $post->user) }}">{{ $post->user->name }}</a>
                <span class="text-sm">posted {{ $post->created_at->diffForHumans() }}:</span>
            </h3>

            <div>
                {{ $post->body }}
            </div>

            <div>
                @if($post->media_id)
                    <img src="{{ $post->media->url }}">
                @endif
            </div>


        </div>
    </div>

    <x-card-footer>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-center mr-4">
                    <svg viewBox="0 0 20 20" class="text-gray-500 mr-1 w-4">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="icon-shape" class="fill-current">
                                <polygon id="Combined-Shape"
                                         points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                            </g>
                        </g>
                    </svg>
                    0
                    <svg viewBox="0 0 20 20" class="text-gray-500 ml-1 w-4">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="icon-shape" class="fill-current">
                                <polygon id="Combined-Shape"
                                         points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="text-sm mr-4">
                    0 comments
                </div>
            </div>
            <div>
                @can('update', $post)
                <form method="post" action="{{ route('post.destroy', $post) }}">
                    @csrf
                    <x-button>Delete</x-button>
                </form>
                @endcan
                <a href="#" class="text-gray-400 text-xs">Report</a>
            </div>
        </div>
    </x-card-footer>
</x-card>
