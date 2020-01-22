@extends('layouts.app')

@section('conteudo')
    <p> <h3>Login Realizado com sucesso. </p></h3>
    <br>
<p>Usuário:  <span class="text-success"> {{ session('usuario')  }} </span> </p>
<p>Email:  <span class="text-success"> {{ session('email')  }} </span> </p>

<p> <a href="/usuario_frm_nova_senha"> Alterar Senha </a> </p>

    <div class="text-center pt-5">
        <a class=" btn  btn-primary pr-5 pl-5" href="/usuario_logout"> Logout </a>
    </div>
@endsection