<?php

namespace App\Services;

use App\Pergunta;
use Illuminate\Http\Request;

class CriadorDePergunta
{
    public function criarPergunta(Request $request, $produtoId)
    {
        return Pergunta::create(
            [
                'retirado' => $request->retirado,
                'devolucao' => $request->devolucao,
                'data_inicio' => $request->data_inicio,
                'data_final' => $request->data_final,
                'tipo_veiculo' => $request->tipo_veiculo,
                'produto_id' => $produtoId
            ]
        );
    }
}