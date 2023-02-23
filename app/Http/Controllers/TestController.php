<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $Data_de_Hoje;
    private $Data_de_Expiracao;

     public function __construct()
     {
        $this->Data_de_Hoje = date("yy-m-d");
        $data_de_expiracao = DB::table('tabela_ranking') 
        ->select('data_de_vencimento')
        ->get();
        foreach($data_de_expiracao as $data){
            $this->Data_de_Expiracao = $data->data_de_vencimento;
        }
        if($this->Data_de_Hoje == $this->Data_de_Expiracao){
           DB::table('usuarios')
           ->select('exp')
           ->update([
               'exp' => 0
           ]);
        }else{
            dd([
                'Não é hoje!',
                'Data de hoje: ' => $this->Data_de_Hoje,
                'Data de Expiração: ' => $this->Data_de_Expiracao
            ]);
        }
     }
  
  
  
     public function Test(){
     }
}
