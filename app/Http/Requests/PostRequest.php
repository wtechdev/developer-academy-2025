<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => "required",
            "text" => "required",
        ];

        // Controllo se il metodo è post per capire se sono in creazione
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|file|max:2048|image';
        } else { // Se è un aggiornamento (PUT/PATCH), la validazione viene gestita dal Controller
            $rules['image'] = 'sometimes|file|max:2048|image';
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
            "title.required" => "Inserisci un titolo",
            "text.required" => "Inserisci il testo",
            "image.required" => "Inserisci l'immagine",
            "image.file" => "Inserisci un file valido",
            "image.max" => "Errore dimensione file max 2MB",
            "image.image" => "Errore formato file consentiti jpg/png",
        ];
    }
}
