<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ResetaPassController extends Controller
{

    //classifica variaveis privadas
    private $Token;
    private $Token_DB;
    private $Pass;
    private $login;
    private $email;

    
    public function __construct(Request $request){  
        
        //inclusões de pacotes
        $Auth_Usu = new AuthController;

        //Definindo Variaveis seguras
        $this->login = $Auth_Usu->validacao($request, 'validUser');
        $this->email = $Auth_Usu->validacao($request, 'ValidaEmail');
        $this->Token = $request->Token;
    }

    private function ValidaUsuario()
    {
        //Busca dados pelo login e email
        $Auth = DB::table('usuarios')
            ->select('usuario', 'senha', 'token')
            ->where('usuario', $this->login)
            ->where('email', $this->email)
            ->get();

        foreach ($Auth as $usu) {

            //define variaveis do usuario
            $this->Token_DB = $usu->token;
            $this->Pass = $usu->senha;
            return true;

        }

        return false;

    }

    public function ResetaPass(Request $request)
    {
        //inclusões de pacotes
        $reseta = ResetaPassController::ValidaUsuario();

    //se puder resetar
        if ($reseta == true) {
        
        //verifica a tokens identicos
            if ($this->Token == $this->Token_DB) {

                //inicia sessão
                session_start();

                //Guardar Sessões
                $_SESSION['login'] = $this->login;
                $_SESSION['email'] = $this->email;
                $_SESSION['Token'] = $this->Token;

                //retorna pra o view
                return view('projectcruize.v2.ResetaPassAutenticado');
                die();

            } else {
            
                //Token incorreto
                $request->session()->flash('alert-danger', "Erro! Seu token está incorreto! #3-1");
                return redirect('/login');
                die();

            }
        } else {

            //Usuario ou Email incorreto
            $request->session()->flash('alert-danger', "Erro! Usuario ou Email incorreto! #3-0");
            return redirect('/login');
            die();

        }
    }


    public function NovoPass(Request $request)
    {
        session_start();
        //Chamando Pacotes
        $Auth_Usu = new AuthController;
        //Retornando senha md5
        $this->pass = $Auth_Usu->validacao($request, 'validPass');

        //verificando se os campos estão corretos
        $auth = $Auth_Usu->validacao($request, 'ValidaSenhasIguais');
        if($auth == true){
            DB::table('usuarios')
            ->select('senha')
            ->where('usuario', $_SESSION['login'])
            ->where('email', $_SESSION['email'])
            ->where('token', $_SESSION['Token'])
            ->update([
                'senha' => $this->pass
            ]);

            $request->session()->flash('alert-success', "Senha trocada com sucesso!");
            return redirect('/login');
            die();

        }else{
            $request->session()->flash('alert-danger', "Valide senhas iguais! #3-2");
            return view('projectcruize.v2.ResetaPassAutenticado');
            die();
        }
       
    }
}
