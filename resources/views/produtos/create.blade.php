@extends('layout')

@section('cabecalho')
    Adicionar Produtos
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

    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome Produto</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="col col-4">
                <label for="tipo">Tipo</label>
                <select type="text" class="form-control" name="tipo" id="tipo">
                    <option value="sem">Sem preço fixo</option>
                    <option value="com">Com preço fixo</option>
                </select>

            </div>
        </div>

        <div class="row">
            <div class="col col-8">
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control" name="imagem" id="imagem">
            </div>

            <div class="col col-4" id="hidden_div" style="display: none;">

               <script>  window.onload=function(){
                document.getElementById('tipo').addEventListener('change', function () {
                var style = this.value == 'com' ? 'block' : 'none';
                document.getElementById('hidden_div').style.display = style;
                });
                }
               </script>

                <label for="preco">Preço</label>
                <input type="text" class="form-control" name="preco" id="preco" value="0.00">
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>

    </form>
@endsection
