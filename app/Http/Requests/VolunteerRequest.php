<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
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
        $volunteerId = request()->input('id');

        return [
            'phone'=>$volunteerId ? 'required|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone,' . $volunteerId : 'required|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone',
            "name" => "required|string|max:50",
            "gender" => "required|in:male,female",
            "region_id" => "required",
            'password'=>$volunteerId ? 'nullable|confirmed|min:8|max:32':'required|confirmed|min:8|max:32',


        ];
    }

    public function messages()
{
    return [
        'phone.required' => __('validation.the_phone_required'),
        'phone.string' => __('validation.the_phone_string'),
        'phone.regex' => __('validation.the_phone_regex'),
        'phone.unique' => __('validation.the_phone_unique'),

        'name.required' => __('validation.the_name_required'),
        'name.string' => __('validation.the_name_string'),
        'name.max' => __('validation.the_name_max'),

        'gender.required' => __('validation.the_gender_required'),
        'gender.in' => __('validation.the_gender_in'),

        'region_id.required' => __('validation.the_region_id_required'),
        'password.required' => __('validation.the_password_required'),
        'password.confirmed' => __('validation.the_password_confirmed'),
        'password.min' => __('validation.the_password_min'),
        'password.max' => __('validation.the_password_max'),

    ];
}

}
