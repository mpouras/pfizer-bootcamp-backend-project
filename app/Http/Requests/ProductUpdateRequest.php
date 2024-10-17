<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'nullable|string|unique:products,name',
            'category' => 'nullable|string',
            'active_ingredients' => 'nullable|string',
            'research_status' => 'nullable|string|in:Approved,In Development,Experimental',
            'batch_number' => 'nullable|string|unique:products,batch_number',
            'manufacturing_date' =>'nullable|date|before_or_equal:today' ,
            'expiration_date' =>'nullable|date|after:manufacturing_date',
        ];
    }
}
