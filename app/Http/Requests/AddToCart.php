<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCart extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;     //Default false
        return false;     //Changed to it
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',            
            'description' => 'required|string|max:200',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'pid' => 'required|numeric'
        ];
    }
}
          