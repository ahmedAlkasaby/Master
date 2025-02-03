<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $roleId = $this->route('role') ? $this->route('role')->id : null;

        return [
            'name'=>$roleId ? 'required|string|unique:roles,name,'.$roleId : 'required|string|unique:roles,name',
            'permissions'=>'array|required',
        ];
    }

    public function messages(){
        return[

            'name.required' => __('validation.name_required'),
            'name.string' => __('validation.name_string'),
            'name.unique' => __('validation.name_unique'),
            'display_name.required' => __('validation.display_name_required'),
            'display_name.string' => __('validation.display_name_string'),
            'display_name.unique' => __('validation.display_name_unique'),
            'permissions.array' => __('validation.permissions_array'),
            'permissions.required' => __('validation.permissions_required'),
        ];
    }
}
