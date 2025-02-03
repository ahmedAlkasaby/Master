    {!! Form::label(null,$label, ['class' => 'form-label']) !!}
    {!! Form::number($fieldName, $fieldValue??null, array_merge([
    'class' => isset($class) ? $class : 'form-control',
    'id' => isset($id) ? $id : null,
    'placeholder' => $place??null
    ], isset($required) ? ['required' => 'required'] : [])) !!}
