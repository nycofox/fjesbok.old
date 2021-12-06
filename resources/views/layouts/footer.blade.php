<footer class="bg-gray-400 mt-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-4 font-semibold text-gray-100">
            <div class="px-4 md:px-0">
                <ul>
                    <li>&copy{{ now()->year }} {{ config('app.name') }}</li>
                    <li class="text-sm">
                        Version {{ config('app.release.version') }}
                        (<a href="{{ route('page', 'changelog') }}">changelog</a>)
                    </li>
                </ul>
            </div>
            <div class="px-4 md:px-0">
                <ul class="md:text-center">
                    <li><a href="mailto:{{ config('mail.from.address') }}">
                            Contact us
                            <span class="text-sm">({{ config('mail.from.address') }})</span>
                        </a></li>
                </ul>
            </div>
            <div class="px-4 md:px-0">
                <ul class="md:text-right">
                    <li><a href="{{ route('page', 'terms') }}">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
