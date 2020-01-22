
{{-- Apresentação dos erros de validação --}}

@if (count($errors) != 0)

    <div class="alert alert-danger alert-dismissible fade show border" role="alert">

        {{-- titulo da caixa de erros --}}
        @if (count($errors) == 1)
            <p class="text-center"> <strong class="text-center">Erro: </strong> </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @else
        <p class="text-center"> <strong>Erros: </strong> </p>
        @endif

        {{-- Apresentar os erros --}}
        <ul>
            @foreach ($errors->all() as $erro)
                <li> {{ $erro }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </ul>

    </div>
@endif

{{-- ======================================================= --}}
{{-- Apresentação dos erros de verificação na base de dados --}}

@if (isset($erros_bd))

    <div class="alert alert-warning alert-dismissible fade show border" role="alert">
        @foreach ($erros_bd as $erro)
            {{ $erro }}
        @endforeach
    </div>   
@endif