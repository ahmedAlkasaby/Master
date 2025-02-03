<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'items.*.item_id' => 'required|exists:items,id', // التحقق من أن العنصر موجود
            'items.*.amount' => 'required|integer|min:1', // يجب أن تكون الكمية عدد صحيح أكبر من أو يساوي 1
            'items.*.unit_price' => 'required|numeric|min:1', // يجب أن يكون سعر الوحدة رقمًا أكبر من أو يساوي 0
        ];
    }


    public function messages(): array
{
    return [
        'items.*.item_id.required' => __('validation.required', ['attribute' => __('site.item')]),
        'items.*.item_id.exists' => __('validation.exists', ['attribute' => __('site.item')]),
        'items.*.amount.required' => __('validation.required', ['attribute' => __('site.amount')]),
        'items.*.amount.integer' => __('validation.integer', ['attribute' => __('site.amount')]),
        'items.*.amount.min' => __('validation.min.numeric', ['attribute' =>__('site.amount'), 'min' => 1]),
        'items.*.unit_price.required' => __('validation.required', ['attribute' => __('site.unit_price')]),
        'items.*.unit_price.numeric' => __('validation.numeric', ['attribute' =>  __('site.unit_price')]),
        'items.*.unit_price.min' => __('validation.min.numeric', ['attribute' => __('site.unit_price'), 'min' => 1]),
    ];
}

}
