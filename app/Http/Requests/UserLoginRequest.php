<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            //'email' => ['sometimes', 'required','email:rfc,dns', 'unique:users,email', 'max:255'],
            //'email' => 'required|email|unique:users,email,' . $this->user->id, 
            //'email' => 'required|email|max:199|unique:users,email',
        ];
    }
}
