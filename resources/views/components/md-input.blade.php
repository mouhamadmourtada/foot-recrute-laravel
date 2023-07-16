@props(['name', 'label', 'type'])

{{-- @php
    $errorMessages = $errors->get($name);
@endphp --}}

<div class="form-outline mb-4">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control form-control-lg" name="{{ $name }}" :value="old('{{ $name }}')" required autofocus >
    @if(is_array($errors->get('email')))
        @foreach($errors->get('email') as $errorMessage)
            <div class="alert alert-danger mt-2 mb-0">{{ $errorMessage }}</div>
        @endforeach
    @endif

    {{ $slot }}
</div>

