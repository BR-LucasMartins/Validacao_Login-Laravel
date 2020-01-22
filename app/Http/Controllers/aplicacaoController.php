<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Request;

class aplicacaoController extends Controller
{
    public function apresentarPaginaInicial(){
        
        //verifica sessão ativa
        if(!Session::has('login')){
            return redirect('/');
        }


        //apresenta pagina inicial 
        return view('aplicacao');
    }
}
