<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => "required|min:10",
            'password' => "required|string|min:8",
        ];
    }

    public function massages(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'The email format is incorrect',
            'password.required' => 'Password is required',
            'password.string' => 'Password should be a string',
            'password.min' => 'Password should be at least 8 characters',
        ];
    }
}
