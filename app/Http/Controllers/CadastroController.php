<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    //classifica variaveis privadas
    private $temp;
    private $login;
    private $pass;
    private $data_nasc;
    private $email;
    private $recaptcha;
    private $key_continue;
    private $IpUser;
    

    public function __construct(Request $request)
    {
       //inclusões de pacotes
       $auth = new AuthController;
        

        //Definindo Variaveis seguras
        $this->temp = $auth->validacao($request, 'validaContas');
        $this->login = $auth->validacao($request, 'ValidaUsuariosDB');
        $this->pass = $auth->validacao($request, 'validPass');
        $this->data_nasc = $auth->validacao($request, 'validaData');
        $this->email = $auth->validacao($request, 'ValidaEmail');
        $this->recaptcha = $auth->validacao($request, 'Recaptcha');
        $this->key_continue = $auth->validacao($request, 'ValidaSenhasIguais');
        $this->IpUser = $auth->validacao($request, 'ip');
    }

    public function Cadastrar(Request $request){
        
//verificação de contas cadastradas por ip
    if($this->temp == true){

    //verificação do login
        if($this->login == true){
            
        //verificação de senhas identicas
            if($this->key_continue == true){

            //verificação do email
                if($this->email == true){

                //valida data de nascimento
                    if($this->data_nasc == true){

                    //valida recaptcha
                        if($this->recaptcha == true){
                            
                            //inserção da conta na tabela de contas
                            DB::table('accounts')
                            ->select('*')
                            ->insert([
                                'login' => $this->login,
                                'password' => $this->pass,
                                'lastip' => $this->IpUser,
                                'email' => $this->email,
                                'data_nasc' => $this->data_nasc,
                                'create_data' => date("d-m-y")
                            ]);
                            $a = DB::table('accounts')
                            ->select('player_id')
                            ->orderBy('player_id', 'desc')
                            ->limit(1)
                            ->get();
                            foreach($a as $f){
                                DB::table('perfil_usuario')
                                ->select('*')
                                ->insert([
                                    'player_id' => $f->player_id
                                ]);
                            }
             //Se der tudo certo
             $request->session()->flash('alert-success', "Conta criada com sucesso! ");
             return redirect('/Login');
             die();

                    }else{

             //se der erro no Recaptcha, retornar o erro.
             $request->session()->flash('alert-danger', "Verifique o Recaptcha! #2-4");
             return redirect('/Login');
             die();
                }

                    }else{
             //se der erro na Data, retornar o erro.
             $request->session()->flash('alert-danger', "Verifique uma Data valida! #2-3");
             return redirect('/Login');
             die();
                }

                    }else{

             //se der erro no Email, retornar o erro.
             $request->session()->flash('alert-danger', "Verifique um Email valido #2-2");
             return redirect('/Login');
             die();
                }

                    }else{

             //se der erro na senha, retornar o erro.
             $request->session()->flash('alert-danger', "Verifique as senhas iguais #2-1");
             return redirect('/Login');
             die();

                }
                    }else{

             //se der erro no usuario, retornar o erro.
             $request->session()->flash('alert-danger', "Este Usuario já existe! #2-0");
             return redirect('/Login');
             die();
        }
                }else{
            //se der erro nas contas, retornar o erro.    
             $request->session()->flash('alert-danger', "Numero de contas excedidas. #1-0");
             return redirect('/Login');
             die(); 
        }
    }
   
}
