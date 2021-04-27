<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerguntasFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
                'data_inicio' => 'required|min:2',
                'data_final' => 'required|min:2',
                'tipo_veiculo' => 'required',
                'retirado' => 'required|min:2',
                'devolucao' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'required' =>'O campo :attribute é obrigatorio',
            'min' => 'O campo :attribute precisa ter pelo menos 2 caracteres'
        ];
    }
}
