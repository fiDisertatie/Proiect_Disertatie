<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdeverintaIncadrareRequest extends FormRequest
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
            'teacher_id' => 'required|numeric',
            'nr_inregistrare' => 'required|numeric',
            'data_generare' => 'required|min:10|max:10',
            'foloseste_la' => 'required|min:4'

        ];
    }

    public function messages()
    {
        return [
            'teacher_id.required' => "Id-ul cadrului didactic este obligatoriu",
            'teacher_id.numeric' => "Id-ul cadrului didactic trebuie sa fie un numar intreg",
            'nr_inregistrare.required' => "Numarul de inregistrare este obligatoriu",
            'nr_inregistrare.numeric' => "Numarul de inregistrare trebuie sa fie un numar intreg",
            'data_generare.required' => "Data adeverintei este obligatorie",
            'data_generare.min' => "Data adeverintei nu este corecta, alegeti din calendar",
            'data_generare.max' => "Data adeverintei nu este corecta, alegeti din calendar",
            'foloseste_la.required' => "Motivul crearii adeverintei este obligatoriu",
            'foloseste_la.min' => "Motivul crearii adeverintei trebuie sa contina minim 4 caractere"
        ];
    }
}
