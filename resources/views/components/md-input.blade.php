@props(['name', 'label', 'type'])

<div class="form-outline mb-4">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <input type="{{$type}}" {{ $attributes->merge(['class' => 'form-control form-control-lg']) }} name="{{ $name }}" :value="old('{{ $name }}')" required autofocus autocomplete="username">
    {{-- <x-input-error :messages="$errors->get('{{ $name }}')" class="mt-2" /> --}}
</div>
