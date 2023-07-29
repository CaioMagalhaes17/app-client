<?php

namespace App\Http\Requests\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha este campo para o registro',
            'email.email' => 'Por favor, digite um email válido',
            'email.unique' => 'Este email já está sendo utilizado',
            'password.min' => 'A senha deve possuir no mínimo 8 caracteres',
            'password.confirmed' => 'As senhas não se coincidem'
        ];
    }
}
