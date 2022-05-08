<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role_id' => 'required|integer',
            'last_name' => 'required|between:3,200',
            'first_name' => 'required|between:3,255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'password_confirmation' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'Numele este obligatoriu',
            'last_name.between' => 'Numele trebuie sa aiba minim 3 caractere si maxim 200',
            'first_name.required' => 'Prenumele este obligatoriu',
            'first_name.between' => 'Prenumele trebuie sa aiba minim 3 caractere si maxim 200',
            'email.required' => 'Email-ul este obligatoriu',
            'email.email' => 'Trebuie introdus o adresa de email corecta',
            'email.unique' => 'Exista deja un utilizator cu aceasta adresa de email',
            'password.required' => 'Parola este obligatorie',
            'password.min' => 'Parola trebuie sa aiba minim 3 caractere',
            'password_confirmation.same' => 'Confirmarea parolei trebuie sa coincida cu parola'
        ];
    }
}
