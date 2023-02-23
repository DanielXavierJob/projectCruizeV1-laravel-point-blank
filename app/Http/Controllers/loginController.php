<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Exception;

class loginController extends Controller
{
    private $login;
    private $pass;

    public function __construct(Request $request)
    {
        //inclusões de pacotes
        $auth = new AuthController;

        //Definindo Variaveis seguras
        $this->login = $auth->validacao($request, 'validUser');
        $this->pass = $auth->validacao($request, 'validPass');
    }

    public function Login(Request $request)
    {
        //Insere o usuario na sessão
             try{
            $a = DB::select('SELECT LoginUser(:logn, :pas)',['logn' => $this->login, 'pas' => $this->pass]);
            foreach($a as $b){
                $_SESSION['hash'] = $b->loginuser;
                if($request->lem_senha == 'on'){
                    setcookie("usuario", $request->name);
                    setcookie("senha", $request->pass);
                }
               return redirect()->route('home');
            }
            $request->session()->flash('alert-danger', "O Usuario não existe ");
            return redirect('/Login');
            die();
            }catch(Exception $e){

                $request->session()->flash('alert-danger', "Erro!".$e->getMessage());
                return redirect('/Login');
                die();
            }
       
            }
    public function Logout(Request $request){
        try{
            $a = DB::select('SELECT LogoutUsuario(:hashs)',['hashs' => $_SESSION['hash']]);
            foreach($a as $c){
                if($c->logoutusuario == true){
                    session_destroy();
                    $request->session()->flash('alert-success', "Conta deslogada com sucesso!");
                    return redirect()->route('login');
                }else{
                    $request->session()->flash('alert-danger', "Erro ao deslogar da conta, contatar o suporte.");
                    return redirect()->route('home');
                }
            }
           
        }catch(Exception $e){
            $request->session()->flash('alert-danger', "Erro!".$e->getMessage());
            return redirect('/Login');
            die();
        }
    }

    public function CashDiario(Request $request){
        if(isset($_SESSION['hash'])){
            try{
                $a = DB::select('SELECT UpdateCash(:hashs)',['hashs' => $_SESSION['hash']]);
                foreach($a as $c){
                    $string = $c->updatecash;
                    $array_1 = explode('-', $string);
                    if($array_1[0] == '1'){
                        $request->session()->flash('alert-warning', $array_1[1]);
                        return redirect()->route('home');
                    }else{
                        $a = substr(number_format($array_1[0], 2, ',', '.'),0,-3);
                        $request->session()->flash('alert-success', 'Parabens! você obteve: '.$a.' de Cash.');
                        return redirect()->route('home');
                    }
                       
                }
               
            }catch(Exception $e){
                $request->session()->flash('alert-danger', "Erro!".$e->getMessage());
                return redirect('/home');
                 die();
            }
        }else{
            session_destroy();
            $request->session()->flash('alert-danger', "Sua conta foi logada em outro acesso.");
            return redirect('/Login');
            die();
        }
       
    }
    
}
