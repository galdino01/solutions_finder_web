<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest {
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
            'user_id' => 'required',
            'nickname' => ['required', 'string', 'max:16'],
            'title' => ['required', 'string', 'min:1', 'max:64'],
            'text' => ['required', 'string', 'min: 1', 'max:1023'],
        ];
    }

    public function messages() {
        return [
            'title.required' => 'The title field is required.',
            'text.required' => 'The text field is required.',
            'title.string' => 'The title field must be a string.',
            'text.string' => 'The text field must be a string.',
            'title.min' => 'The title field require a minimum of 1 caracter.',
            'text.min' => 'The text field require a minimum of 1 caracter.',
            'title.max' => 'The title field accepts a maximum of 64 caracter.',
            'text.max' => 'The text field accepts a maximum of 1023 caracter.',
            'nickname.required' => 'The nickname field is required.',
            'nickname.max' => 'The text field accepts a maximum of 16 caracter.',
        ];
    }
}
