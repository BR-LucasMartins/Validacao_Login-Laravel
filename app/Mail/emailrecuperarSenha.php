<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emailrecuperarSenha extends Mailable
{
    use Queueable, SerializesModels;

    //variavel na raiz da classe p/ que ela possa ser acessada em qualquer parte da aplaicação
    protected $nova_senha;


    public function __construct($nova_senha) //parametro passado pela function send email (usuariosController).

    {
        $this->nova_senha = $nova_senha;
    }

    
    public function build()
    {
        /*cria um array com a senha p/ passar como compact para view da mensagem
        que será enviada p/ o usuário */
        
        
        //paasa a nova senha para view emailRecuperarsenha
        //return $this->view('emails.emailRecuperarSenha', compact('senha_nova'));
        
        return $this->view('emails.emailRecuperarSenha')
        ->with(['nova_senha'=> $this->nova_senha]); 

    }
}
