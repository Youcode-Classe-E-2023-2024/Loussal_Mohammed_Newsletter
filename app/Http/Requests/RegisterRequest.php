<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:8|max:30',
            'role' => ['required', Rule::in(['Redact', 'Member'])],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'agreement' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'name is required',
            'name.string' => 'name should be a string',
            'name.min' => 'name should at least contain 8 Characters',
            'name.max' => 'name should not pass 30 Characters max',
            'email.required' => 'email is required',
            'email.email' => 'the format in incorrect format email',
            'email.unique' => 'email already exists',
            'password.required' => 'password is required',
            'password.string' => 'password should be a string',
            'password.min' => 'password should at least contain 8 Characters',
            'agreement.required' => 'it\'s necessary to agree, to register',

        ];
    }
}
