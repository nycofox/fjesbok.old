<div class="mt-1">
    <div class="flex justify-center">
        <form method="post" wire:submit.prevent="upvote">
            @csrf
            <button>
                <svg viewBox="0 0 20 20"
                     class="{{ $voteable->upvoted ? 'text-red-500' : 'text-gray-500' }} w-4">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="icon-shape" class="fill-current">
                            <polygon id="Combined-Shape"
                                     points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12"></polygon>
                        </g>
                    </g>
                </svg>
            </button>
        </form>
    </div>
    <div class="flex justify-center">
        {{ $voteable->score }}
    </div>
    <div class="flex justify-center">
        <form method="post" wire:submit.prevent="downvote">
            @csrf
            <button>
                <svg viewBox="0 0 20 20" class="{{ $voteable->downvoted ? 'text-blue-500' : 'text-gray-500' }} w-4">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="icon-shape" class="fill-current">
                            <polygon id="Combined-Shape"
                                     points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8"></polygon>
                        </g>
                    </g>
                </svg>
            </button>
        </form>
    </div>
</div>
