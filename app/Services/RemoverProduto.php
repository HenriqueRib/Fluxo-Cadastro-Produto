<?php


namespace App\Services;

use App\Pergunta;
use App\Produto;
use Illuminate\Support\Facades\DB;

class RemoverProduto
{
    public function removerProduto($produtoId)
    {
        $nomeProduto = '';
        DB::transaction(function () use ($produtoId, &$nomeProduto) {
            $produto = Produto::find($produtoId);
            $nomeProduto = $produto->nome;

            $this->removerPergunta($produto);
            Produto::destroy($produtoId);
        });

        return $nomeProduto;
    }

    /**
     * @param $produto
     * @throws \Exception
     */
    private function removerPergunta($produto)
    {
        $produto->perguntas()->each(function (Pergunta $perguntas) {
            $perguntas->delete();
        });
    }
}