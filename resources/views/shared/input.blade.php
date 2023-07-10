@php
    $class ??= null;
    $type ??= '';
    $name ??= '';
    $value ??='';
    $label ??="";
@endphp
<div @class(['form-group', $class])>
    <label for="{{$name}}">{{$label}}</label>

    @if ($type=="text")
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control @error($name)
        is-invalid
    @enderror" value="{{old($name, $value)}}">
    @else 
        <textarea class="form-control @error($name)
            is-invalid
        @enderror" name="{{$name}}" id="{{$name}}" cols="30" rows="10">{{$value}}</textarea>
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror



</div>