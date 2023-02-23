<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function validacao(Request $request, $funcao)
    {
        switch ($funcao) {
            case 'validaContas':
                $nip = AuthController::validacao($request, 'ip');
                $a = DB::table('accounts')
                ->select('player_id')
                ->where('lastip','=',$nip)->count();
                if($a == 2){
                    return false;
                }else{
                    return true;
                }
        
            break;
            case 'ip':
                $ipaddress = '';
                if (getenv('HTTP_CLIENT_IP'))
                    $ipaddress = getenv('HTTP_CLIENT_IP');
                else if(getenv('REMOTE_ADDR'))
                    $ipaddress = getenv('REMOTE_ADDR');
                else if(getenv('HTTP_X_FORWARDED_FOR'))
                    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                else if(getenv('HTTP_X_FORWARDED'))
                    $ipaddress = getenv('HTTP_X_FORWARDED');
                else if(getenv('HTTP_FORWARDED_FOR'))
                    $ipaddress = getenv('HTTP_FORWARDED_FOR');
                else if(getenv('HTTP_FORWARDED'))
                    $ipaddress = getenv('HTTP_FORWARDED');
                else
                    $ipaddress = 'UNKNOWN';
        
                return $ipaddress;
            break;

            case 'consultaParams':

                if ($request->name == null || $request->password == null) {
                    return false;
                } else {
                    return true;
                }

                break;

            case 'validUser':
                $user = preg_replace('/[^[:alnum:]_]/', '', $request->name);
                $str = mb_strtolower($user, 'UTF-8');
                return $str;

                break;

            case 'validPass':

                $salt = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
                $output = hash_hmac('md5', $request->password, $salt);
                return $output;

                break;

            case 'ValidaSenhasIguais':
                if ($request->password == $request->password1) {
                    return true;
                } else {
                    return false;
                }

                break;

            case 'ValidaUsuariosDB':

                $nome_do_usuario = AuthController::validacao($request, 'validUser');
                $auth_nome = DB::table('accounts')
                    ->select('login')
                    ->where('login', $nome_do_usuario)
                    ->count();
                if ($auth_nome > 0) {
                    return false;
                } else {
                        return $nome_do_usuario;
                }


                break;

            case 'ValidaEmail':

                if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                    $email = DB::table('accounts')->select('email')->where('email', $request->email)->count();
                    if ($email != 0) {
                        return false;
                    } else {
                        return $request->email;
                    }
                } else {
                    return false;
                }

                break;

            case 'Recaptcha':
                if (isset($_POST['g-recaptcha-response'])) {
                    $captcha_data = $_POST['g-recaptcha-response'];
                }
                if (!$captcha_data) {
                    $request->session()->flash('alert-danger', "Preencha o captcha.");
                    return redirect('/login');
                    die();
                }
                $data = array(
                    'secret' => "6LesjwAVAAAAAMRpVw-vlpZ5JZauAYVJlrjNFdvY",
                    'response' => "$captcha_data"
                );

                $verify = curl_init();
                curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                curl_setopt($verify, CURLOPT_POST, true);
                curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                return curl_exec($verify);
                break;

            case 'validaData':

                    $format = 'Y-m-d';
                    $dataForm = $request->date;
                    $d = DateTime::createFromFormat($format, $dataForm);
                    $data = $d && $d->format($format);

                    if ($data == true) {

                        return $dataForm;

                    } else {

                        return false;

                    }

                break;

            case 'Token':

                $length = 15;
                return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
                
                break;
        }
    }
}
