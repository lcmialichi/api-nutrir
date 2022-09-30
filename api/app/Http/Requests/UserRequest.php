<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

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
        return [
            "password" => "required",
            "email" => "required|email"
        ];
    }

    // public function messages(){
    //     return [
    //         "email" => "email invalido!",
    //         "password.required" => "campo 'password' é obrigatorio"
    //     ];
    // }

    public function failedValidation($errors)
    {
        throw new ValidationException($errors->errors()->first());
    }
}
