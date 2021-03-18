<div x-show="open" class="md:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        @include('layouts.navbar.items_mobile')
    </div>
    <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full"
                     src="{{ auth()->user()->avatar }}"
                     alt="">
            </div>
            <div class="ml-3">
                <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
                <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
            </div>
            <button
                class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </button>
        </div>
        <div class="mt-3 px-2 space-y-1">
            <a href="{{ route('profile', auth()->user()) }}"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your
                Profile</a>

            <a href="#"
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign
                    out</a>
            </form>
        </div>
    </div>
</div>
