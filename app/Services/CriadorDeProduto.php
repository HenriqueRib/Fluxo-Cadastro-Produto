<?php

namespace App\Services;

use App\Produto;
use Illuminate\Http\Request;

class CriadorDeProduto
{
    public function criarProduto(Request $request)
    {
        return Produto::create(
            [
                'nome' => $request->nome,
                'tipo' => $request->tipo,
                'imagem' => $this->nomeImagem($request),
                'preco' => $request->preco
            ]
        );
    }

    private function nomeImagem($request)
    {
        if ($request->file('imagem')->isValid()){
            $nomeFile = $request->nome . '.' . $request->file('imagem')->extension();
            ($request->file('imagem')->storeAs('public', $nomeFile));
            return $nomeFile;
        }
        return '';
    }
}