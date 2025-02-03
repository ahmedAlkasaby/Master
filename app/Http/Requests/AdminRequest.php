<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        $AdminId = $request->input('id');
        // dd($AdminId);

        return [
            'name'=>'required|string',
            'phone'=>$AdminId ? 'required|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone,' . $AdminId : 'required|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone',
            'password'=>$AdminId ? 'nullable|confirmed|min:8|max:32':'required|confirmed|min:8|max:32',
            "lang"=>"required",
            'role_id'=>'required|exists:roles,id'
        ];
    }

    public function messages(){
        return [
            'name.required' => __('validation.the_name_required'),
            'name.string' => __('validation.the_name_string'),
            'phone.required' => __('validation.the_phone_required'),
            'phone.string' => __('validation.the_phone_string'),
            'phone.unique' => __('validation.the_phone_unique'),
            'phone.regex' => __('validation.the_phone_regex'),
            'password.required' => __('validation.the_password_required'),
            'password.confirmed' => __('validation.the_password_confirmed'),
            'password.min' => __('validation.the_password_min'),
            'password.max' => __('validation.the_password_max'),
            'role_id.required' => __('validation.the_role_id_required'),
            'role_id.exists' => __('validation.the_role_id_exists'),
        ];
    }

}
