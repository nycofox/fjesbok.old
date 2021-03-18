<div {{ $attributes->merge(['class' => 'max-w-7xl pt-6 mx-auto']) }}>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            {{ $slot }}
        </div>
    </div>
</div>
