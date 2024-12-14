<textarea 
    id="{{ $id }}" 
    name="{{ $name }}" 
    class="form-control" 
    rows="{{ $rows }}" 
    {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
