{!! Form::label(null, $label, ['class' => 'form-label', 'for' => $id ?? null]) !!}
{!! Form::text($fieldName, !empty($fieldValue) ? $fieldValue : '', array_merge([
    'class' => isset($class) ? $class : 'form-control',
    'id' => isset($id) ? $id : null,
    'placeholder' => isset($place) ? $place : ''
], isset($required) && $required ? ['required' => 'required'] : [])) !!}
