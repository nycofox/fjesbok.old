@if($errors->any())
    <x-card>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </x-card>
@endif
