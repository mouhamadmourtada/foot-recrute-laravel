@props(['name', 'label', 'type', 'placeholder'])
<div class="mb-3 inputFormCrud">
    <label for="{{ $name }}" class="control-label col-form-label">{{$label}}</label>
    <div class=""> 
        <input id="{{ $name }}" name="{{ $name }}" type="{{$type}}" {{ $attributes->merge(['class' => 'form-control'])}} placeholder="{{$placeholder}}" :value="old('{{ $name }}')" autofocus>
        @error($name)
            <div class="myAlert">{{ $message }}</div>
        @enderror
    </div>
</div>

<style>
    .inputFormCrud, .inputFormCrud *{
        font-size: 13px;
    }
    .inputFormCrud label{
        padding-bottom: 0px;
        color : #947653;
        font-weight: 700
    }
    .inputFormCrud input{
        height: 35px;
        outline: none;
        background-color: #12415807;
    }
    .inputFormCrud input:focus{
        outline: none;
    }
    
    .form-control{
        height: 48px;
        border : none;
        border-bottom: 2px solid #12415830;
        border-radius: 4px
    }
    .form-control:focus{
        box-shadow: none;
        border : none;
        border-bottom: 2px solid #071218;
        
    }
    .myAlert{
        color : red;
    }
    
</style>


