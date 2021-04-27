@extends('layout')

@section('cabecalho')
    Perguntas do produto: {{ $produtos->nome }}
@endsection

@section('conteudo')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <ul class="list-group">
        <label>Informações do {{ $produtos->nome }}</label>
        <div class="row align-items-center">
            <li class="list-group-item col col-6">Nome do produto: {{ $produtos->nome }}</li>
             <li class="list-group-item col col-4"> Tipo de preço: {{ $produtos->tipo }}</li>
            @if( !($produtos->preco === "0.0"))
                <li class="list-group-item col col-2"> Preço {{ $produtos->preco }}</li>
            @endif
        </div>
      </ul>
    <br>
    <form method="post">
        {!! csrf_field() !!}
            <h1>Perguntas do produto</h1>
            <hr>
            <div class="row">
                <div class="col col-4">
                    <label for="data_inicio">Data inicial</label>
                    <input type="date" class="form-control" name="data_inicio" id="data_inicio">
                </div>
                <div class="col col-4">
                    <label for="data_final">Data final</label>
                    <input type="date" class="form-control" name="data_final" id="data_final">
                </div>
                <div class="col col-4">
                    <label for="tipo_veiculo">Tipo de veiculo</label>
                    <select type="text" class="form-control" name="tipo_veiculo" id="tipo_veiculo">
                        <option value="conversivel">conversivel</option>
                        <option value="executivo">executivo</option>
                        <option value="luxo">luxo</option>
                        <option value="popular">popular</option>
                        <option value="van">van</option>
                    </select>

                </div>
            </div>

            <br>
            <h1>Local</h1>
            <hr>

            <div class="row">
                <div class="col col-6">
                    <label for="retirado">Retirado em:</label>
                    <input type="text" class="form-control" name="retirado" id="retirado">
                </div>
                <div class="col col-6">
                    <label for="devolucao">Devolução em:</label>
                    <input type="text" class="form-control" name="devolucao" id="devolucao">

                </div>
            </div>
    <button class="btn btn-primary mt-2 mb-2">Adicionar</button>
    </form>
@endsection