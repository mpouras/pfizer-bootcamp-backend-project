<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:products,name',
            'category' => 'required|string',
            'active_ingredients' => 'required|string',
            'research_status' => 'required|string|in:Approved,In Development,Experimental',
            'batch_number' => 'required|string|unique:products,batch_number',
            'manufacturing_date' =>'required|date|before_or_equal:today' ,
            'expiration_date' =>'required|date|after:manufacturing_date',
            //
        ];
    }
}
