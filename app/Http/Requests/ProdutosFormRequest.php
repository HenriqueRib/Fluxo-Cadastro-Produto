<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosFormRequest extends FormRequest
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
                'nome' => 'required|min:2',
                'imagem' => 'required|min:2',
                'preco' => '',
                'tipo' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'required' =>'O campo :attribute é obrigatorio.',
            'nome.min' => 'O campo nome precisa ter pelo menos 2 caracteres.',
            'imagem.required' => 'Algo aconteceu na imagem. Tente enviar novamente.'
        ];
    }
}
