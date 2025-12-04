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
            'nome'      => ' required | string | max:50 | min:3',
            'documento'     => [' required', 'documento', Rule::unique('doadores')->ignore($doadorId)],
            'documento_tipo'  => ' required | string | min:2',
        ];
    }
}
