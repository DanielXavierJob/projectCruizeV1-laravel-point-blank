<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatenteController extends Controller
{
    public function nome($numero){
		$i = $numero;
		switch ($i) {
			case 0: 
				return "Novato";
				break;
			case 1:
				return "Recruta";
				break;
			case 2:
				return "Soldado";
				break;
			case 3:
				return "Cabo";
				break;
			case 4:
				return "Sargento";
				break;
			case 5:
				return "Terceiro Sargento 1";
				break;
			case 6:
				return "Terceiro Sargento 2";
				break;
			case 7:
				return "Terceiro Sargento 3";
				break;
			case 8:
				return "Segundo Sargento 1";
				break;
			case 9:
				return "Segundo Sargento 2";
				break;
			case 10:
				return "Segundo Sargento 3";
				break;
			case 11:
				return "Segundo Sargento 4";
				break;
			case 12:
				return "Primeiro Sargento 1";
				break;
			case 13:
				return "Primeiro Sargento 2";
				break;
			case 14:
				return "Primeiro Sargento 3";
				break;
			case 15:
				return "Primeiro Sargento 4";
				break;
			case 16:
				return "Primeiro Sargento 5";
				break;
			case 17:
				return "Segundo Tenente 1";
				break;
			case 18:
				return "Segundo Tenente 2";
				break;
			case 19:
				return "Segundo Tenente 3";
				break;
			case 20:
				return "Segundo Tenente 4";
				break;
			case 21:
				return "Primeiro Tenente 1";
				break;
			case 22:
				return "Primeiro Tenente 2";
				break;
			case 23:
				return "Primeiro Tenente 3";
				break;
			case 24:
				return "Primeiro Tenente 4";
				break;
			case 25:
				return "Primeiro Tenente 5";
				break;
			case 26:
				return "Capitão 1";
				break;
			case 27:
				return "Capitão 2";
				break;
			case 28:
				return "Capitão 3";
				break;
			case 29:
				return "Capitão 4";
				break;
			case 30:
				return "Capitão 5";
				break;
			case 31:
				return "Major 1";
				break;
			case 32:
				return "Major 2";
				break;
			case 33:
				return "Major 3";
				break;
			case 34:
				return "Major 4";
				break;
			case 35:
				return "Major 5";
				break;
			case 36:
				return "Tenente Coronel 1";
				break;
			case 37:
				return "Tenente Coronel 2";
				break;
			case 38:
				return "Tenente Coronel 3";
				break;
			case 39:
				return "Tenente Coronel 4";
				break;
			case 40:
				return "Tenente Coronel 5";
				break;
			case 41:
				return "Coronel 1";
				break;
			case 42:
				return "Coronel 2";
				break;
			case 43:
				return "Coronel 3";
				break;
			case 44:
				return "Coronel 4";
				break;
			case 45:
				return "Coronel 5";
				break;
			case 46:
				return "General de Brigada";
				break;
			case 47:
				return "General de Divisão";
				break;
			case 48:
				return "General de Exército";
				break;
			case 49:
				return "Marechal";
				break;
			case 50:
				return "Herói de Guerra";
				break;
			case 51:
				return "Hero";
				break;
			case 53:
				return "Game Master";
				break;
			case 54:
				return "Game Master";
				break;
		}
	}

	public function liga($numero){

			switch($numero){
				case '2':
					return 'Prata';
				break;
				case '3':
					return 'Ouro';
				break;
				case '4':
					return 'Diamante';
				break;
				case '5':
					return 'Esmeralda';
				break;
				case '6':
					return 'Rubi';
				break;
			}		
	}
}

