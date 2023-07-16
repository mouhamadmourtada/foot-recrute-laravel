@props(['options', 'label', 'name', 'value'])

<div class="form-group myselect-container">
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{$name}}" class="form-control select my-select">
        @foreach ($options as $option)
            <option value = "{{ $option['value'] }}" {{ $option['value'] == $value ? 'selected' : ''}}>{{ $option['label'] }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="myAlert">{{ $message }}</div>
    @enderror
</div>

<style>
    .myselect-container *{
        font-size: 13px;
    }
    .myselect-container label{
        color : #947653;
        font-weight: 700;
    }
    .my-select{
        width: 100%;
        height: 35px;
    }

    .my-select option:active{
        background-color: #94765334;
    }
    .myAlert{
        color : red;
    }
</style>

  