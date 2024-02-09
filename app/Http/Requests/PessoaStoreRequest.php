<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PessoaStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cpf' => [
                'required',
                'string',
                'size:11',
                Rule::unique('pessoas', 'cpf'),
            ],
            'cep' => [
                'required',
                'string',
                'size:8',
                function ($attribute, $value, $fail) {
                    $response = @file_get_contents("https://viacep.com.br/ws/{$value}/json/");
                    $data = json_decode($response);
                    if ($response === false || empty($data->cep)) {
                        $fail('O CEP fornecido é inválido ou não consta na base de dados do ViaCEP.');
                    }
                },
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
