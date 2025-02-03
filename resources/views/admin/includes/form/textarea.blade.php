
{!! Form::label($fieldName, $label, ['class' => 'form-label']) !!}
{!! Form::textarea($fieldName, $fieldValue ?? null, [
    'class' => 'form-control',
    'rows' => 4,
    'placeholder' => $place ?? null,
    'id' => $id ?? null,
    'style' => 'height: 100px'
]) !!}