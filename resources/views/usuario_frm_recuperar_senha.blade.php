@extends('layouts.app');

@section('conteudo')
    

{{-- Recuperar senha --}}

    <div class="row">
        <div class="col-md-4 offset-4  col-sm-8 offset-2 col-xs-12">

            {{-- Apresentação dos erros de validação --}}

            @include('inc.erros');

            {{-- ========================================== --}}




            <form action="/usuario_executar_recuperar_senha" method="POST">
                {{ csrf_field() }}

                {{-- email --}}
                <div class="form-group margin-top">
                    <label for="id_text_email"> Email: </label>
                    <input type="email" class="form-control" id="id_text_email" 
                    name="text_email" placeholder="Usário" autocomplete="off">
                </div>

    

                <div class="text-center pt-3 margem-top-20">
                    <button type="submit" class="btn btn-primary"> Recuperar senha </button> 
                </div>

                {{-- voltar a tela de login --}}
                <div class="text-center margem-top-20 ">
                    <a class="btn btn-secondary" href="/"> Voltar </a>
                </div>

               

            </form>

        </div>
    </div>
@endsection