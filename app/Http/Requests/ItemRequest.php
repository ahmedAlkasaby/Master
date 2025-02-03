<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $itemId = request()->input('id');

        return [
            "name_en" => $itemId ? "required|string|max:50|regex:/^[A-Za-z\s]+$/|unique:items,name,".$itemId : "required|string|max:50|regex:/^[A-Za-z\s]+$/|unique:items,name",
            "name_ar" => $itemId ? "required|string|max:50|regex:/^[\p{Arabic}\s]+$/u|unique:items,name,".$itemId : "required|string|max:50|regex:/^[\p{Arabic}\s]+$/u|unique:items,name",
            "description_en" => "nullable|string|max:250|regex:/^[A-Za-z\s]+$/",
            "description_ar" => "nullable|string|max:250|regex:/^[\p{Arabic}\s]+$/u",
            "category_id"=>'required|exists:categories,id',
        ];
    }

    public function messages(){
        return [
            'name_en.required' => __('validation.name_en_required'),
            'name_en.string' => __('validation.name_en_string'),
            'name_en.max' => __('validation.name_en_max'),
            'name_en.regex' => __('validation.name_en_regex'),

            'name_ar.required' => __('validation.name_ar_required'),
            'name_ar.string' => __('validation.name_ar_string'),
            'name_ar.max' => __('validation.name_ar_max'),
            'name_ar.regex' => __('validation.name_ar_regex'),

            'description_en.nullable' => __('validation.description_en_nullable'),
            'description_en.string' => __('validation.description_en_string'),
            'description_en.max' => __('validation.description_en_max'),
            'description_en.regex' => __('validation.description_en_regex'),

            'description_ar.nullable' => __('validation.description_ar_nullable'),
            'description_ar.string' => __('validation.description_ar_string'),
            'description_ar.max' => __('validation.description_ar_max'),
            'description_ar.regex' => __('validation.description_ar_regex'),

            'category_id.required' => __('validation.category_id_required'),
            'category_id.exists' => __('validation.category_id_exists'),
        ];
    }

}
