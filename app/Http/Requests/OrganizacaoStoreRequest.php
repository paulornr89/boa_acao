<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizacaoStoreRequest extends FormRequest
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
            'razao'      => 'required | string | max:50 | min:3',
            'user_id'      => ['required', 'integer', 'exists:users,id'],
            'telefone'      => ' required | string | max:11 | min:11',
            'documento'     => ' required | string | max:14 | min:11 | unique:organizacoes',
            'endereco'     => ' string ',
            'cidade'     => ' string ',
            'estado'     => ' string | min:2',
            'cep'     => ' string | min:8 ',
            'documento_tipo'  => ' required | string | min:2',
        ];
    }
}
