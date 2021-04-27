<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerguntasFormRequest;
use App\Pergunta;
use App\Produto;
use App\Services\CriadorDePergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    public function index(Request $request ,$produtoId)
    {
        $produtos = Produto::find($produtoId);
        $perguntas = $produtos->perguntas();
        $mensagem = $request->session()->get('mensagem');

        return view('perguntas.index', compact('produtos','perguntas', 'mensagem'));
    }

    public function create()
    {
        return view('perguntas.create');
    }

    public function store(PerguntasFormRequest $request, CriadorDePergunta $criadorDePergunta ,$produtoId)
    {

        $perguntas = $criadorDePergunta->criarPergunta($request,$produtoId);
        $request->session()->flash('mensagem',
            "Pergunta do Produto criado com sucesso. 
            Será retirado em {$perguntas->retirado} e a devolução em {$perguntas->devolucao }");

        return \redirect()->route('listar_produtos');
    }

    public function destroy(Request $request)
    {
        Pergunta::destroy($request->id);
        $request->session()->flash('mensagem', "Pergunta removido do produto com sucesso");

        return \redirect()->route('listar_produtos');
    }
}
