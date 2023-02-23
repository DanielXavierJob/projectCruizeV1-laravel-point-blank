<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AuthCadastroController extends Controller
{
    //classifica variaveis privadas
    private $login;
    private $pass;
    private $data_nasc;
    private $email;
    private $token;
    private $token_DB;
    
    public function __construct(Request $request)
    {   //definindo variavel token do usuario
        $this->token = $request->token;

        //buscando usuario pela sessão login e senha
        $auth_token = DB::table('conta_temp')
        ->select('*')
        ->where('Usuario', $_SESSION['usuario'])
        ->where('Senha', $_SESSION['senha'])
        ->get();

        foreach($auth_token as $token){
            //definindo variaveis privadas pela db
            $this->token_DB = $token->token;
            $this->login = $token->Usuario;
            $this->pass = $token->Senha;
            $this->data_nasc = $token->data_nasc;
            $this->email = $token->email;
        }

    }

    public function ValidaToken(Request $request){

    //verifica se o token é identico
        if($this->token == $this->token_DB){

            //insere na tabela de contas o usuario.
            DB::table('contas')
                            ->select('*')
                            ->insert([
                                'login' => $this->login,
                                'password' => $this->pass,
                                'email' => $this->email,
                                'data_nasc' => $this->data_nasc,
                                'token' => $this->token,
                                'create_data' => date("d-m-y"),
                                'gp' => 180000, //QUANTIDADE DE GOLD PELO CADASTRO
                                'money' => 180000, //QUANTIDADE DE CASH PELO CADASTRO
                            ]);

             //Se der tudo certo
             $request->session()->flash('alert-success', "Conta criada com sucesso!");
             return redirect('/login');
             die();

        }else{

             //se der erro no token, retornar o erro.
             $request->session()->flash('alert-danger', "Verifique um token certo");
             return redirect('/authtoken');
             die();

        }
    }
}
