<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'product_code' => 'nullable|unique:products,product_code,' . ($this->route('product') ? $this->route('product')->id : '') . '|max:255',
            'product_sku' => 'nullable|unique:products,product_sku,' . ($this->route('product') ? $this->route('product')->id : '') . '|max:255',
            'quantity' => 'nullable|numeric|min:0',
            'regular_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'status' => 'nullable',
            'category_id' => 'nullable',
        ];
    }
}
