<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }} -
            <span class="text-sm text-gray-600">Settings</span>
        </h2>
    </x-slot>

    <x-card>
        <div class="grid grid-cols-12">

            <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">

                <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Basic Information</a>

                <a href="#" class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Security</a>

                <a href="#" class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Account Settings</a>

            </div>
        </div>
    </x-card>
</x-app-layout>
