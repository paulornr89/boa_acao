<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email'     => ' required | email | unique:users',
            'password'  => ' required | string | min:8',
            'is_donor' => 'boolean|nullable',
            'is_admin' => 'boolean|nullable',
            'is_organization' => 'boolean|nullable',
        ];
    }

     public function messages()
    {
        return [
            'email.require'     => 'O email é obrigatório!!',
            'email.email'       => 'Informe um email válido!',
            'email.unique'      => 'Email indiponível, cadastre outro email.',
            'password.min'      => 'A senha deve ter no mínimo oito caracteres!',
            'password.require'  => 'A senha é obrigatória!!',
        ];
    }
}
