<?php

namespace App\classes;

class criarSenha{

    public static function criarCodigo(){

        //gerar um codigo aleatório para nova senha do usuário.action
        $valor = '';
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

        for ($i = 0; $i<6; $i++){
            $index = rand(0, strlen($caracteres));
            $valor .= substr($caracteres, $index, 1);

        }

        return $valor;

    }
}

?>