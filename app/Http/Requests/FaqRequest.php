<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
        return [
            'name_ar' => 'required|string|regex:/^[\p{Arabic}\s.,!?@#%&*()\'\"-]+$/u',
            'name_en' => 'required|string|regex:/^[A-Za-z\s.,!?@#%&*()\'\"-]+$/',  
            'description_ar' => 'required|string|regex:/^[\p{Arabic}\s.,!?@#%&*()\'\"-]+$/u',
            'description_en' => 'required|string|regex:/^[A-Za-z\s.,!?@#%&*()\'\"-]+$/',  

           
            "active"=>'required'
        ];
    }


    public function messages(){
        return [
            'name_en.required' => __('validation.name_en_required'),
            'name_en.string' => __('validation.name_en_string'),
            'name_en.max' => __('validation.name_en_max'),
            'name_en.regex' => __('validation.name_en_regex'),
            'name_en.unique' => __('validation.name_en_unique'),

            'name_ar.required' => __('validation.name_ar_required'),
            'name_ar.string' => __('validation.name_ar_string'),
            'name_ar.max' => __('validation.name_ar_max'),
            'name_ar.regex' => __('validation.name_ar_regex'),
            'name_ar.unique' => __('validation.name_ar_unique'),

            'description_en.nullable' => __('validation.description_en_nullable'),
            'description_en.string' => __('validation.description_en_string'),
            'description_en.max' => __('validation.description_en_max'),
            'description_en.regex' => __('validation.description_en_regex'),

            'description_ar.nullable' => __('validation.description_ar_nullable'),
            'description_ar.string' => __('validation.description_ar_string'),
            'description_ar.max' => __('validation.description_ar_max'),
            'description_ar.regex' => __('validation.description_ar_regex'),

            'active.required' => __('validation.active_required'),
        ];
    }
}
