<?php

namespace App\Http\Controllers;

use\Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\usuarios;
use Session;
use App\classes\criarSenha;
use App\Mail\emailrecuperarSenha;
use\Illuminate\Support\Facades\Mail;


class usuariosController extends Controller
{
    //=======================================================
    public function index(){

        if(!Session::has('login')){
            return $this->frmLogin();
        }
        else{
            return view('aplicacao');
        }
        
    }


    /*=======================================================
    Login
    ======================================================= */
    public function frmLogin(){
        //apresenta a view do form de login 
        return view('usuario_frm_login');
    }

    public function executarLogin(Request $request){
        /* validação de login*/

        $this->validate($request,[
            'text_usuario'=> 'required',
            'text_senha'=> 'required'
        ]);

        $usuario =  usuarios::where('usuario', $request->text_usuario)->first();
        
        if($usuario == null){
            $erros_bd = ['Nome de usuário inválido! '];
    
            return view('/usuario_frm_login', compact('erros_bd'));
        }

        //verificar senha corresponde
        if(!Hash::check($request->text_senha, $usuario->senha)){

            $erros_bd = ['A Senha está incorreta  !'];
    
            return view('/usuario_frm_login', compact('erros_bd'));
        }

        //sessão 
        Session::put('login', 'validado');
        Session::put('email', $usuario->email);
        Session::put('id', $usuario->id_usuario);
        Session::put('usuario', $usuario->usuario);

        return view('aplicacao');

    }

 //=======================================================
    //Logout
    //=======================================================

    public function logout(){

        //destruir session

        Session::flush();
        return redirect('/');
    }



    //=======================================================
    //Recuperar senha
    //=======================================================
    public function frmRecuperarSenha(){
        return view('usuario_frm_recuperar_senha');
    }

    //=======================================================
    public function executarRecuperarSenha(Request $request){

        $this->validate($request,[
            'text_email'=>'required|email'
        ]);

        //busca o usuario do email digitado.
        $usuario = usuarios::where('email', $request->text_email)->get();  //get busca coleção de linhas da busca
        if($usuario->count() == 0){

            $erros_bd = ['Email não encontrado na base de dados.'];

            return view('/usuario_frm_recuperar_senha', compact('erros_bd'));
        }

        //atualizar a senha do usuário para nova senha
        $usuario = $usuario->first();

        
        //cria uma senha alaeatória
        $nova_senha = criarSenha::criarCodigo();

        $usuario->senha = Hash::make($nova_senha);
        $usuario->save();

        //enviar o email com nova senha p/ o usuário
        Mail::to($usuario->email)->send(new emailrecuperarSenha($nova_senha));
        /* ^ passa  a senha gerada como parametro para a classe de enviar email 
        para criar a mensagem que será enviada p/ o usuário */


        return redirect('/usuario_email_enviado');
    }


    public function frmCriarNovaSenha(){
        return view('/usuario_frm_nova_senha');
    }




    public function editarSenha(Request $request){

        $this->validate($request,[
            'text_senha'=>'required|between:6,15',
            'text_senha_confirmar'=>'required|same:text_senha',  //same, compara com o campo informado

        ]);

        $usuario = $request->session()->get('usuario'); //recupera o nome do usuario da sessão para clausa where
        
        $nova =  usuarios::where('usuario', $usuario)->first();

        $nova->senha = Hash::make($request->text_senha);
        $nova->update();

         return redirect('/aplicacao_index');
    }




    public function emailEnviado(){
        return view('/usuario_email_enviado');
    }

    


    /*=======================================================
    Criar nova conta 
    ======================================================= */

    public function frmCriarNovaConta(){
        //apresenta o formulario de criar nova conta
        return view('usuario_frm_criar_conta');
    }

    public function executarCriarNovaConta(Request $request){
        
        
        //executa a logica de validação
        $this->validate($request,[
            'text_usuario'=>'required|between:3,30|alpha_num',
            'text_senha'=>'required|between:6,15',
            'text_senha_confirmar'=>'required|same:text_senha',  //same, compara com o campo informado
            'text_email'=>'required|email',
            'check_termos_condicoes'=>'accepted'
        ]);

        //Verifica se já existe o memso usuário já existente
        $dados = usuarios::where('usuario', '=', $request->text_usuario)
                    ->orWhere('email', '=', $request->text_email)
                    ->get();

        if($dados->count() != 0){
            $erros_bd = ['Já existe um usuário cadastrado com o mesmo nome ou  endereço de e-mail.'];
            return view('usuario_frm_criar_conta', compact('erros_bd'));
        }


        //inserir o novo usuário no BD
        $novo = new usuarios;
        $novo->usuario = $request->text_usuario;
        $novo->senha = Hash::make($request->text_senha);
        $novo->email = $request->text_email;

        $novo->save();

        return redirect('/');
    }
}
