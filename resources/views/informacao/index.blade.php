@extends('layout')

@section('cabecalho')
    Informações do produto: {{ $produtos->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        <div class="row align-items-center">
            <li class="list-group-item col col-6 d-flex justify-content-between align-items-center">Nome do produto: {{ $produtos->nome }}.</li>
            <li class="list-group-item col col-4"> Tipo de preço: {{ $produtos->tipo }}.</li>
            @if( !($produtos->preco === "0.0"))
                <li class="list-group-item col col-2"> Preço R$ {{ $produtos->preco }}.</li>
            @endif
        </div>
        <button class="btn btn-primary mt-2 mb-2">
            <a href="{{asset('storage/'. $produtos->imagem)}}" style="color: white; text-decoration: none">
                <i class="far fa-images"></i>
                Ver imagem do produto
            </a>
        </button>

        @if( !empty($perguntas->tipo_veiculo))
            <br>
            <h2>Perguntas do  produto </h2>
            <div class="row align-items-center">
                <li class="list-group-item col col-4">Data inicial: {{ $perguntas->data_inicio }}</li>
                <li class="list-group-item col col-4">Data final: {{ $perguntas->data_final }}</li>
                <li class="list-group-item col col-4">Tipo do veículo: {{ $perguntas->tipo_veiculo }}</li>
            </div>
            <div class="row align-items-center">
                <li class="list-group-item col col-6">Retirado em  {{ $perguntas->retirado }}.</li>
                <li class="list-group-item col col-6">Devolução em  {{ $perguntas->devolucao }}.</li>
            </div>
        @endif
    </ul>

@endsection
