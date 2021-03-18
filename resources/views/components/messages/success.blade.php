@if(session('success_message'))
    <div x-show="open" x-data="{ open: true}" class="mt-4 space-y-8">
        <div class="rounded bg-green-50 p-4">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <div class="mr-2">
                        <svg viewBox="0 0 20 20" class="text-green-800 w-4 flex justify-center">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="icon-shape" class="fill-current">
                                    <path
                                        d="M2.92893219,17.0710678 C6.83417511,20.9763107 13.1658249,20.9763107 17.0710678,17.0710678 C20.9763107,13.1658249 20.9763107,6.83417511 17.0710678,2.92893219 C13.1658249,-0.976310729 6.83417511,-0.976310729 2.92893219,2.92893219 C-0.976310729,6.83417511 -0.976310729,13.1658249 2.92893219,17.0710678 L2.92893219,17.0710678 L2.92893219,17.0710678 Z M15.6568542,15.6568542 C18.7810486,12.5326599 18.7810486,7.46734008 15.6568542,4.34314575 C12.5326599,1.21895142 7.46734008,1.21895142 4.34314575,4.34314575 C1.21895142,7.46734008 1.21895142,12.5326599 4.34314575,15.6568542 C7.46734008,18.7810486 12.5326599,18.7810486 15.6568542,15.6568542 L15.6568542,15.6568542 Z M4,10 L6,8 L9,11 L14,6 L16,8 L9,15 L4,10 Z"
                                        id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="text-green-800">
                        {{ session('success_message') }}
                    </span>
                </div>
                <div>
                    <button @click="open = false">
                        <svg viewBox="0 0 20 20" class="text-green-800 w-4 flex justify-center">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="icon-shape" class="fill-current">
                                    <polygon id="Combined-Shape"
                                             points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644"></polygon>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
