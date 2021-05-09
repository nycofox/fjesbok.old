<div class="form-group row">
    <div class="col-sm-3 col-form-label text-sm-right pr-0">
        <label for="{{ $attributes->get('id') ?: $id() }}" class="mb-0">
            {{ $label }}
        </label>
    </div>

    <div class="col-sm-9">
        <input
            type="{{ $type }}"
            class="form-control col-sm-8 col-md-6"
            id="{{ $attributes->get('id') ?: $id() }}"
            name="{{ $name }}"
            value="{{ $value }}"
        />
    </div>
</div>


{{--<div class="@if($type === 'hidden') d-none @else form-group @endif">--}}
{{--    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />--}}

{{--    <div class="input-group">--}}
{{--        @isset($prepend)--}}
{{--            <div class="input-group-prepend">--}}
{{--                <div class="input-group-text">--}}
{{--                    {!! $prepend !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endisset--}}

{{--        <input {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}--}}
{{--            type="{{ $type }}"--}}

{{--            @if($isWired())--}}
{{--                wire:model{!! $wireModifier() !!}="{{ $name }}"--}}
{{--            @else--}}
{{--                name="{{ $name }}"--}}
{{--                value="{{ $value }}"--}}
{{--            @endif--}}

{{--            @if($label && !$attributes->get('id'))--}}
{{--                id="{{ $id() }}"--}}
{{--            @endif--}}
{{--        />--}}

{{--        @isset($append)--}}
{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    {!! $append !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endisset--}}
{{--    </div>--}}

{{--    {!! $help ?? null !!}--}}

{{--    @if($hasErrorAndShow($name))--}}
{{--        <x-form-errors :name="$name" />--}}
{{--    @endif--}}
{{--</div>--}}
