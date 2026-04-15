<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
        'category_id' => 'required|exists:categories,id',   
        // 'user_id'=> 'required|exists:users,id',        
        'elevator_user_id'=>'required|exists:elevator_users,id',
        'desc'=>'required',
       
        ];
    }
}
