<x-form-input name="name" label="Name"/>
<x-form-input name="slug" label="Slug"/>
<x-form-input name="author" label="Author"/>

<div class="mt-4">
    <label class="block">
        <span class="text-gray-700">Logo</span>
        <input class="block mt-1" type="file" name="logo" id="logo"/>
    </label>
    @if($errors->has('logo'))
        @foreach ($errors->get('logo') as $message)
            <p class="text-red-500 text-xs italic">
                {{ $message }}
            </p>
        @endforeach
    @endif
</div>

<x-form-submit/>
