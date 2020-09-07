<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:5|max:255|confirmed'
        ];
    }

    public function messages() {
        return [
            'email.unique' => 'Такой email уже зарегистрирован.',
            'password.min' => 'Пароль должен быть не меньше 5 символов.',
            'password.confirmed' => 'Пароли не совпадают.'
        ];
    }
}
