<?php

namespace App\Http\Requests\Backend\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'discount' => 'numeric|min:0',
            'final_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert Product Title.',
            'name.max' => 'Product Title may not be greater than 255 characters.',
            'code.required' => 'Please insert Product Code.',
            'code.max' => 'Product Code may not be greater than 255 characters.',
            'unit_price.required' => 'Please insert the Unit Price.',
            'unit_price.numeric' => 'Unit Price must be a numeric value.',
            'unit_price.min' => 'Unit Price must be greater than or equal to 0.',
            'discount.numeric' => 'Discount must be a numeric value.',
            'discount.min' => 'Discount must be greater than or equal to 0.',
            'final_price.required' => 'Please insert the Final Price.',
            'final_price.numeric' => 'Final Price must be a numeric value.',
            'final_price.min' => 'Final Price must be greater than or equal to 0.',
            'category_id.required' => 'Please select a Category.',
            'category_id.exists' => 'Selected Category does not exist.',
            'image.image' => 'Invalid image format. Please use JPEG, PNG, JPG, GIF, or SVG.',
            'image.mimes' => 'Invalid image format. Please use JPEG, PNG, JPG, GIF, or SVG.',
            'image.max' => 'The image size must not exceed 2048 KB.',
            'description.string' => 'Description must be a string.',
            'publish_datetime.required' => 'Please insert the Publish Date and Time.',
            'publish_datetime.date_format' => 'Invalid date and time format. Please use Y-m-d H:i:s.',
        ];
    }
}
