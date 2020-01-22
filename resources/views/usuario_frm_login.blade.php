@extends('layouts.app');

@section('conteudo')
    
{{-- tela login --}}

    <div class="row">
        <div class="col-md-4 offset-4  col-sm-8 offset-2 col-xs-12">

            {{-- Apresentação dos erros de validação --}}

            @include('inc.erros');

            {{-- ========================================== --}}
            <form action="/usuario_executar_login" method="POST">
                {{ csrf_field() }}

                {{-- usuário --}}
                <div class="form-group">
                    <label for="id_text_usuario"> Usuário: </label>
                    <input type="text" class="form-control" id="id_text_usuario" 
                    name="text_usuario" placeholder="Usário" autocomplete="off">
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="id_text_senha"> Senha: </label>
                    <input type="password" class="form-control" id="id_text_senha" 
                    name="text_senha" placeholder="Senha" autocomplete="off">
                </div>

                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-success"> Entrar </button> 
                </div>

                {{-- recuperação de senha --}}
                <div class="text-center margem-top-20 ">
                    <a href="/usuario_frm_recuperar_senha"> Recuperar senha</a>
                </div>

                {{-- criar nova conta --}}
                <div class="text-center margem-top-20 ">
                    <p> Não possui uma conta, <a href="/usuario_frm_criar_conta"> cadastre-se aqui!</strong></a> </p>
                    
                </div>

            </form>

        </div>
    </div>
@endsection