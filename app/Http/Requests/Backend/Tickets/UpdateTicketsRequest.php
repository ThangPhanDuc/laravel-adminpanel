<?php

namespace App\Http\Requests\Backend\Tickets;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-blog');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'content' => 'required|string',
            // 'type' => 'required|string',
            // 'expected' => 'required|string',
            // 'user_id' => 'required|exists:users,id',
            // 'ticket_flag_id' => 'required|exists:ticket_flags,id',
            // 'status' => 'required|string|in:pending,in-progress,completed',
            // 'link' => 'nullable|url',
            // 'image_path' => 'nullable|string',
            // 'response' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Content is required.',
            'type.required' => 'Type is required.',
            'expected.required' => 'Expected is required.',
            'user_id.required' => 'User is required.',
            'user_id.exists' => 'User does not exist in the system.',
            'ticket_flag_id.required' => 'Flag is required.',
            'ticket_flag_id.exists' => 'Flag does not exist in the system.',
            'status.required' => 'Status is required.',
            'status.in' => 'Invalid status.',
            'link.url' => 'Invalid link format.',
        ];
    }
}
