<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Exceptions\ValidationException;
use App\Http\Controllers\AuthenticateController;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    private string $controller;

    public function __construct(Request $request)
    {

        $this->controller = $request->route()->controller::class;
    }
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
        return match ($this->controller) {
            AuthenticateController::class => $this->authRule(),
            default => []
        };
    }

    public function authRule()
    {
        return [
            "password" => "required",
            "email" => "required|email"
        ];
    }

    public function messages()
    {
        return [];
        // troca as mensagens de retorno aqui
    }

    public function failedValidation($errors)
    {
        throw new ValidationException($errors->errors()->first(), 422);
    }
}
