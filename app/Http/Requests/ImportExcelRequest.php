<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportExcelRequest extends FormRequest
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
            'excel_file' => "required|mimes:xlsx"
        ];
    }
    public function messages()
    {
        return [
            'excel_file.required' => 'Alegerea fișierului este obligatorie',
            'excel_file.mimes' => 'Fișierul trebuie să fie de tip Excel .xlsx'
        ];
    }
}
