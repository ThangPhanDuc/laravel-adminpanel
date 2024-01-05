<?php

namespace App\Http\Requests\Backend\Leaves;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeavesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-leave');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'start_date' => 'required|date',
            // 'end_date' => 'required|date|after_or_equal:start_date',
            // 'leave_type' => 'required|in:sick,annual,other',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'The start date field is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date field is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
            'leave_type.required' => 'The leave type field is required.',
            'leave_type.in' => 'Invalid leave type. Please select a valid option.',
        ];
    }
}
