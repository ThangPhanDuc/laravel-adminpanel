<?php

namespace App\Http\Requests\Backend\Employees;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-employee');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required|max:191|unique:employees,full_name,' . $this->segment(4),
            'phone_number' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Please insert Employee Full Name.',
            'full_name.max' => 'Employee Full Name may not be greater than 191 characters.',
            'full_name.unique' => 'The employee name is already taken. Please try with a different name.',
            'phone_number.required' => 'Please insert Phone Number.',
            'position.required' => 'Please insert Employee Position.',
            'salary.required' => 'Please insert Salary.',
            'salary.numeric' => 'Salary must be a number.',
        ];
    }
}
