<?php

namespace App\Http\Controllers;

use App\Pergunta;
use App\Produto;

class InformacaoController extends Controller
{
    public function index($produtoId)
    {
        $produtos = Produto::find($produtoId);
        $perguntas = Pergunta::where('produto_id', $produtoId)->first();

        return view('informacao.index'
            , compact('produtos','perguntas')
        );
    }
}
