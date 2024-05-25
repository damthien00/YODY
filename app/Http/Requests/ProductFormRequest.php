<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => 'required|exists:product_categories,id',
            'product_name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'weight_unit' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'created_by' => 'nullable|exists:users,id',
            'published_on' => 'nullable|date',
            'alias' => 'nullable|string|max:255',
            'vendor_id' => 'nullable|exists:vendors,id',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
        ];
    }
}
