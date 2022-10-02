<?php

namespace App\Http\Requests;

use App\Rules\Cpf;
use Illuminate\Http\Request;
use App\Exceptions\ValidationException;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\AuthenticateController;

class UserRequest extends FormRequest
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
        return  [
            "dadosPessoais" => "required|array",
            "daodPessoais.nome" => "string|max:70",
            "*daodPessoais.cpf" => [
                "required", "numeric", "digits:11",
            ],
            "dadosContato" => "array",
            "dadosContato.ddd" => "required_unless:dadosContato,null|numeric|digits:2",
            "dadosContato.telefone" => "required_unless:dadosContato,null|numeric|digits:9"
        ];
    }

    public function messages()
    {
        return [
            "dadosContato.ddd.required_unless" => ""
        ];
        // troca as mensagens de retorno aqui
    }

    public function attributer()
    {
        return [

        ];
    }

    public function failedValidation($errors)
    {
        throw new ValidationException($errors->errors()->first(), 422);
    }
}
