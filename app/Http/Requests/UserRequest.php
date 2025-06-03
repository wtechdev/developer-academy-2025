<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // qui è possibile inserire una logica per bloccare l'accesso alla validazione
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            "name" => "required",
            "email" => "required|email:rfc,dns,spoof,filter,filter_unicode",
        ];
        // Controllo se il metodo è post per capire se sono in creazione
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|min:8|confirmed';
        }
        
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            "name.required" => "Inserisci il nominativo",
            "email.required" => "Inserisci indirizzo email",
            "email.email" => "Indirizzo email non valido",
            'password.required' => 'La password è obbligatoria',
            'password.min' => 'La password deve essere di almeno 8 caratteri',
            'password.confirmed' => 'Le password non corrispondono',
        ];
    }
}
