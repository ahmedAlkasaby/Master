<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_title'     => 'required|string|max:255',
            'site_email'     => 'required|email',
            'site_phone'     => 'required|string|max:20',
            'facebook'       => 'nullable|url',
            'twitter'        => 'nullable|url',
            'instagram'      => 'nullable|url',
            'linkedin'       => 'nullable|url',
            'gmail'          => 'nullable|email',
            'whatsapp'       => 'nullable|string|max:20',
            'site_language'  => 'required|string|max:10',
            'address'        => 'nullable|string|max:255',
        ];
    }

   
}
