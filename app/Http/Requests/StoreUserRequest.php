<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'min:4', 'max:16', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'The name field must be required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field accepts a maximum of 255 caracters.',
            'last_name.required' => 'The last name field must be required.',
            'last_name.string' => 'The last name field must be a string.',
            'last_name.max' => 'The last name accepts a maximum of 255 caracters.',
            'nickname.required' => 'The nickname field must be required.',
            'nickname.string' => 'The nickname field must be a string.',
            'nickname.min' => 'The nickname field accepts a minimum of 4 caracters.',
            'nickname.max' => 'The nickname field accepts a maximum of 16 caracters.',
            'nickname.unique' => 'This nickname is invalid.',
            'email.required' => 'The email field must be required.',
            'email.string' => 'The email field must be a string.',
            'email.email' => 'The email field must be a valid email.',
            'email.max' => 'The email field accepts a maximum of 255 caracters.',
            'email.unique' => 'This email is invalid.',
            'password.required' => 'The password field must be required.',
            'password.string' => 'The password field must be a string.',
            'password.min' => 'The password field accepts a minimum of 8 caracters.',
            'password.confirmed' => 'The password field must be confirmed.',
        ];
    }
}
