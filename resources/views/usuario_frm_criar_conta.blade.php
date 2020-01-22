@extends('layouts.app');

@section('conteudo')
    

{{-- criar conta de usuários --}}

    <div class="row">
        <div class="col-md-4 offset-4  col-sm-8 offset-2 col-xs-12">

            {{-- Apresentação dos erros de validação --}}

            @include('inc.erros');

            {{-- ========================================== --}}




            <form action="/usuario_executar_criar_conta" method="POST">
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

                {{-- confirmar  Password --}}
                <div class="form-group">
                    <label for="id_text_senha_confirmar"> Confirmar senha: </label>
                    <input type="password" class="form-control" id="id_text_senha_confirmar" 
                    name="text_senha_confirmar" placeholder="Confirmar Senha" autocomplete="off">
                </div>


                {{-- email --}}
                <div class="form-group">
                    <label for="id_text_email"> Email: </label>
                    <input type="email" class="form-control" id="id_text_email" 
                    name="text_email" placeholder="Usário" autocomplete="off">
                </div>

                {{-- termos de contrato --}}
                <div class="form-control text-center">
                    <input type="checkbox" id="id_check_termos_condicoes" name="check_termos_condicoes" 
                    value="1">
                    <label for="id_check_termos_condicoes"> Concordo com os termos e condições.</label>
                </div>

                <div class="text-center pt-3 margem-top-20">
                    <button type="submit" class="btn btn-success"> Criar nova conta </button> 
                </div>

                {{-- voltar a tela de login --}}
                <div class="text-center margem-top-20 ">
                    <a class="btn btn-primary" href="/"> Voltar </a>
                </div>

               

            </form>

        </div>
    </div>
@endsection