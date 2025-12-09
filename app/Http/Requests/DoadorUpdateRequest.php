<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoadorUpdateRequest extends FormRequest
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
        $doadorId = $this->route('doador');

        return [
            'nome'      => 'sometimes | string | max:50 | min:3',
            'user_id'      => ['sometimes', 'integer', 'exists:users,id'],
            'telefone'      => ' sometimes | string | max:11 | min:11',
            'documento'     => ' sometimes | string | max:14 | min:11 | unique:doadores',
            'endereco'     => ' sometimes | string | max:100 ',
            'cidade'     => ' sometimes | string | max:20',
            'estado'     => ' sometimes | string | min:2',
            'cep'     => ' sometimes | min:8 ',
            'documento_tipo'  => ' sometimes | string | min:2',
        ];
    }
}
