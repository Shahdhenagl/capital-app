<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TechnicianChangeStatusRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'order_id'     => 'required|exists:orders,id',
        'status' => 'required|in:accepted,rejected,arrived,in_progress,complete,not_complete',
       'reason_not_complete'=>'required_if:status,not_complete',
          'reason_rejected'=>'required_if:status,rejected',
        'report' => 'required_if:status,complete|nullable|string',
        'image_before' => 'required_if:status,in_progress|image|mimes:jpg,jpeg,png,webp|max:2048',
      'image_after'  => 'required_if:status,complete|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
