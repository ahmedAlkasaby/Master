<?php

namespace App\Http\Requests;

use App\Models\CharityCase;
use Illuminate\Foundation\Http\FormRequest;

class CaseRequest extends FormRequest
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
        $caseId = $this->route('case') ? $this->route('case')->id : null;
        $case=CharityCase::find($caseId);

        return [
            'name' => 'required|string',
            'phone' =>$caseId ? 'nullable|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone,' . $case->user_id : 'nullable|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone' ,
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            // 'title_ar' => 'required|string|regex:/^[\p{Arabic}a-zA-Z0-9\s\W]+$/u',
            // 'title_en' => 'required|string|regex:/^[\p{Arabic}a-zA-Z0-9\s\W]+$/u',
            // 'description_ar' => ['nullable', 'string', 'regex:/^[\p{Arabic}a-zA-Z0-9\s\W]+$/u', 'min:10', 'max:1000'],
            // 'description_en' => ['nullable', 'string', 'regex:/^[\p{Arabic}a-zA-Z0-9\s\W]+$/u', 'min:10', 'max:1000'],

            'priority' => 'nullable|in:high,medium,low',
            'repeating' => 'nullable|in:none,daily,weekly,monthly,yearly',
            'region_id' => 'required|exists:regions,id',
            'volunteer_id' => 'nullable|exists:users,id',
            'category_case_id' => 'required|exists:category_cases,id',
            'items' => 'required_without:price|array',
            'items.*.item_id' => 'required_without:price|exists:items,id',
            'items.*.amount' => 'required_without:price|numeric|min:1',
            'price' => 'required_without:items|nullable|numeric|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'code_name' => 'nullable|string',
            'national_number' => 'nullable|string' ,
            'condition' => 'nullable|string', // مثال لقائمة شروط
            'type_of_aid' => 'nullable|string', // مثال لأنواع الدعم
            'number_of_peaple' => 'nullable|integer', // العدد بين 1 و100
            'government' => 'nullable|string',
            'city' => 'nullable|string',
            'area' => 'nullable|string',
            'street' => 'nullable|string',
            'district' => 'nullable|string',
            'building' => 'nullable|string',
            'floor' => 'nullable|string',
            'apartment'=>'nullable|string'
        ];

    }

    public function messages() {
        return [
            'name.required' => __('validation.name_required'),
            'name.string' => __('validation.name_string'),

            'phone.regex' => __('validation.phone_regex'),
            'phone.unique' => __('validation.phone_unique'),

            'title_ar.required' => __('validation.title_ar_required'),
            'title_ar.string' => __('validation.title_ar_string'),
            'title_ar.regex' => __('validation.title_ar_regex'),

            'title_en.required' => __('validation.title_en_required'),
            'title_en.string' => __('validation.title_en_string'),
            'title_en.regex' => __('validation.title_en_regex'),

            'description_ar.nullable' => __('validation.description_ar_nullable'),
            'description_ar.string' => __('validation.description_ar_string'),
            'description_ar.min' => __('validation.description_ar_min'),
            'description_ar.max' => __('validation.description_ar_max'),

            'description_en.nullable' => __('validation.description_en_nullable'),
            'description_en.string' => __('validation.description_en_string'),
            'description_en.min' => __('validation.description_en_min'),
            'description_en.max' => __('validation.description_en_max'),

            'priority.in' => __('validation.priority_in'),
            'repeating.in' => __('validation.repeating_in'),

            'region_id.required' => __('validation.region_id_required'),
            'region_id.exists' => __('validation.region_id_exists'),

            'volunteer_id.required' => __('validation.volunteer_id_required'),
            'volunteer_id.exists' => __('validation.volunteer_id_exists'),

            'category_case_id.required' => __('validation.category_case_id_required'),
            'category_case_id.exists' => __('validation.category_case_id_exists'),

            'items.required_without' => __('validation.items_required_without'),
            'items.*.item_id.required_without' => __('validation.items_item_id_required_without'),
            'items.*.item_id.exists' => __('validation.items_item_id_exists'),
            'items.*.amount.required_without' => __('validation.items_amount_required_without'),
            'items.*.amount.numeric' => __('validation.items_amount_numeric'),
            'items.*.amount.min' => __('validation.items_amount_min'),

            'price.required_without' => __('validation.price_required_without'),
            'price.numeric' => __('validation.price_numeric'),
            'price.min' => __('validation.price_min'),

            'images.*.image' => __('validation.images_image'),
            'images.*.mimes' => __('validation.images_mimes'),
            'images.*.max' => __('validation.images_max'),
        ];
    }




}
