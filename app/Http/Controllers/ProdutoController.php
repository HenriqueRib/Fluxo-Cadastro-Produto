<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosFormRequest;

use App\Produto;
use App\Services\CriadorDeProduto;
use App\Services\RemoverProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('produtos.index' ,  compact('produtos', 'mensagem'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(ProdutosFormRequest $request, CriadorDeProduto $criadorDeProduto)
    {
        $produto = $criadorDeProduto->criarProduto($request);

        $request->session()->flash('mensagem',
            "Produto {$produto->id} criado com sucesso  {$produto->nome} tipo {$produto->tipo }");

        return \redirect()->route('listar_produtos');
    }

    public function destroy(Request $request , RemoverProduto $removerProduto)
    {
        $nomeProduto = $removerProduto->removerProduto($request->id);
        $request->session()->flash('mensagem', "Produto $nomeProduto removido com sucesso");

        return \redirect()->route('listar_produtos');
    }

}