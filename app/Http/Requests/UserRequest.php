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
            "dadosPessoais.nome" => "string|max:70",
            "*dadosPessoais.cpf" => [
                "required", "numeric", "digits:11", new Cpf
            ],
            "dadosContato" => "array",
            "dadosContato.ddd" => "required_unless:dadosContato,null|numeric|digits:2",
            "dadosContato.telefone" => "required_unless:dadosContato,null|numeric|digits:9",
            "dadosContato.email" => "required_unless:dadosContato,null|email",
            "dadosEndereco" => "array",
            "dadosEndereco.rua" => "required_unless:dadosEndereco,null|string|max:140",
            "dadosEndereco.bairro" => "required_unless:dadosEndereco,null|string|max:70:",
            "dadosEndereco.estado" => "required_unless:dadosEndereco,null|string|max:2",
            "dadosEndereco.cidade" => "required_unless:dadosEndereco,null|string|max:50",
            "dadosAcesso" => "array",
            "dadosAcesso.usuario" => "required_unless:dadosAcesso,null|string|max:20",
            "dadosAcesso.senha" => "required_unless:dadosAcesso,null|string|max:30",
            "dadosNutricionista" => "array",
            "dadosNutricionista.crn" => "required_unless:dadosNutricionista,null|numeric|digits_between:1,30"
        ];
    }

    public function messages()
    {
       return [];
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
