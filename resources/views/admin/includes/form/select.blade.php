{!! Form::label(null, $label, ['class' => 'form-label', 'for' => $id??null]) !!}

{!! Form::select($fieldName, ['' => __('site.select_option')] + (is_array($options) ? $options : $options->toArray()), $fieldValue ?? null, array_merge([
    'class' => isset($class) ? $class : 'form-select',
    'id' => isset($id) ? $id : null,
], isset($required) && $required ? ['required' => 'required'] : [])) !!}



{{-- <label for="{{ $id ?? '' }}" class="form-label">{{ $label }}</label>
<select name="{{ $fieldName }}" id="{{ $id ?? '' }}" class="{{ $class ?? 'form-select' }}"
    {{ isset($required) && $required ? 'required' : '' }}>

    <!-- خيار فارغ لجعل المستخدم يختار بنفسه -->
    <option value="">{{ __('site.select_option') }}</option>

    <!-- عرض الخيارات -->
    @foreach($options as $key => $value)
        <option value="{{ $key }}" {{ ($fieldValue ?? '') == $key ? 'selected' : '' }}>
            {{ $value }}
        </option>
    @endforeach
</select> --}}
