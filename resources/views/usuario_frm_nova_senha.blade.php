@extends('layouts.app');

@section('conteudo')
<div class="row">
    <div class="col-md-4 offset-4  col-sm-8 offset-2 col-xs-12">

        {{-- Apresentação dos erros de validação --}}

        @include('inc.erros');

        {{-- ========================================== --}}




        <form action="/usuario_editar_senha" method="POST">
            {{ csrf_field() }}


            {{-- Password --}}
            <div class="form-group">
                <label for="id_text_senha"> Nova Senha: </label>
                <input type="password" class="form-control" id="id_text_senha" 
                name="text_senha" placeholder="Senha" autocomplete="off">
            </div>

            {{-- confirmar  Password --}}
            <div class="form-group">
                <label for="id_text_senha_confirmar"> Confirmar senha: </label>
                <input type="password" class="form-control" id="id_text_senha_confirmar" 
                name="text_senha_confirmar" placeholder="Confirmar Senha" autocomplete="off">
            </div>

            <div class="text-center pt-3 margem-top-20">
                <button type="submit" class="btn btn-success"> Alterar </button> 
            </div>

            {{-- voltar a tela de login --}}
            <div class="text-center margem-top-20 ">
                <a class="btn btn-primary" href="/"> Voltar </a>
            </div>


        </form>

    </div>
</div>
@endsection