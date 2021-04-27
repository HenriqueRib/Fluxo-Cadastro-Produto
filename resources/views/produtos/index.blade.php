@extends('layout')

@section('cabecalho')
Cadastros de Produtos
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

        <a href="{{ route('form_criar_produto') }}" class="btn btn-dark mb-2">Adicionar Produto</a>
        <ul class="list-group">
            @foreach ($produtos as $produto)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $produto->nome }}
                    <span class="d-flex align-items-center">
                        <a href="produto/{{$produto->id}}/perguntas" class="btn btn-info btn-sm mr-2">
                            Adicionar Perguntas
                        </a>

                        <a href="produto/{{$produto->id}}/informacao" class="btn btn-info btn-sm mr-2">
                            <i class="fas fa-info-circle"></i>
                        </a>

                        <form method="post" action="/produto/{{$produto->id}}"
                        onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($produto->nome)}}')">
                            {!! csrf_field() !!}
                            {!! method_field('delete') !!}
                            <button class="btn btn-danger btn-sn">
                                <i class="far fa-trash-alt "></i>
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>

@endsection