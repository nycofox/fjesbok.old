<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }} -
            <spann class="text-sm text-gray-600">Change password</spann>
        </h2>
    </x-slot>

    <x-card>
        <div>
            <p>Choose a new password. It must be at least 8 characters long.</p>

            <x-form action="{{ route('settings.password') }}" method="patch">
                <x-form-input name="old_password" type="password" label="Old Password" value=""/>
                <x-form-input name="new_password" type="password" label="New Password" value=""/>
                <x-form-input name="new_password_confirmation" type="password" label="Confirm your new password" value=""/>

                <x-form-submit/>
            </x-form>
        </div>
    </x-card>
</x-app-layout>
