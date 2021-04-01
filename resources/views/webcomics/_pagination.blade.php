<x-card>
    <div>
        <script type="text/javascript">
            shortcut.add("Left",function() {
                window.location.href = '{{ route('webcomics.show', $date->copy()->subDay()->format('Y-m-d')) }}';
            });
        </script>
        <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
           href="{{ route('webcomics.show', $date->copy()->subDay()->format('Y-m-d')) }}">Previous day</a>
        @if($date->isToday())
            <span
                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-400 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Next day</span>
            <span
                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-400 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Today</span>
        @else
            <script>
                shortcut.add("Right",function() {
                    window.location.href = '{{ route('webcomics.show', $date->copy()->addDay()->format('Y-m-d')) }}';
                });
            </script>
            <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('webcomics.show', $date->copy()->addDay()->format('Y-m-d')) }}">Next day</a>
            <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('webcomics.show') }}">Today</a>
        @endif
    </div>
    <div class="mt-4 text-gray-500 italic">
        Protip: You can use the left and right arrow to quickly go backwards or forwards between dates.
    </div>
</x-card>

@push('header-scripts')
    <script src="{{ asset('js/shortcuts.js') }}"></script>
@endpush
