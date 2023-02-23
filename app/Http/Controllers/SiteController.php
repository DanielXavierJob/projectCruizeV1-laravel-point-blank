<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class SiteController extends Controller
{
    private $c;
    private $d;
    private $dats;
    public function __construct()
    {
        $this->c = DB::table('web_downloads')
        ->select('*')
        ->orderBy('file_size','desc')
        ->get();
        if(isset($_SESSION['hash'])){
        $dc = DB::table('session_users')
        ->select('*')
        ->where('hash', '=', $_SESSION['hash'])
        ->get();
        foreach($dc as $d){
            if($d->session_data_end != null){
                session_destroy();
            }else{
                $da = DB::table('accounts')
                ->select('*')
                ->where('player_id', '=', $d->player_id)
                ->get();                          
                foreach($da as $usu){
                    $gb = DB::table('clan_dados')
                    ->select('accounts.player_name', 'clan_dados.owner_id')
                    ->join('accounts', 'accounts.player_id','=','clan_dados.owner_id')
                    ->where('accounts.player_id','=',$usu->player_id)->get();
                    foreach($gb as $clan){
                        $_SESSION['DONO_CLAN'] = $clan->owner_id;
                    }
                    $a = DB::select('SELECT * FROM "perfil_usuario" WHERE player_id = :id', ['id' => $usu->player_id]);
                    foreach($a as $b){
                        $_SESSION['Nacionalidade'] = $b->nacionalidade;
                        $_SESSION['Genero'] = $b->genero;
                        $_SESSION['Sobre'] = $b->sobre;
                        $_SESSION['Usuario'] = $usu->player_name;
                        $_SESSION['ID'] = $usu->player_id;
                        $_SESSION['Gold'] = $usu->gp;
                        $_SESSION['Cash'] = $usu->money;
                        $_SESSION['Pc_Cafe'] = $usu->pc_cafe;
                        $_SESSION['access_level'] = $usu->access_level;
                        $_SESSION['Email'] = $usu->email;
                        $_SESSION['DataCash'] = $usu->get_day_cash;
                        $_SESSION['ip'] = $usu->lastip;
                        $this->d = $usu->data_nasc;
                       
                    }
                   
                }
            }
        }

        }
    }

    public function MeuPerfil(Request $request){
            $xml = simplexml_load_file('http://www.geoplugin.net/xml.gp?ip='.$_SESSION['ip']);
            if($this->d == null){
                return view('projectcruize.v2.profileu.profile')->with('download', $this->c)->with('idade', $this->d)->with('local', $xml);
            }else{
                $data       = explode("-",$this->d);
                $anoNasc    = $data[0];
                $mesNasc    = $data[1];
                $diaNasc    = $data[2];
             
                $anoAtual   = date("Y");
                $mesAtual   = date("m");
                $diaAtual   = date("d");
             
                $idade      = $anoAtual - $anoNasc;
                
                if ($mesAtual < $mesNasc){
                    $idade -= 1;
                    $_SESSION['idade'] = $idade;
                    return view('projectcruize.v2.profileu.profile')->with('download', $this->c)->with('idade', $idade)->with('local', $xml);
                } elseif ( ($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc) ){
                    $idade -= 1;
                    $_SESSION['idade'] = $idade;
                    return view('projectcruize.v2.profileu.profile')->with('download', $this->c)->with('idade', $idade)->with('local', $xml);
                }else{
                    $_SESSION['idade'] = $idade;
                    return view('projectcruize.v2.profileu.profile')->with('download', $this->c)->with('idade', $idade)->with('local', $xml);
                }
            }
       
}
        
    public function Home(){
        $a = DB::table('accounts')
        ->select('player_id')
        ->count();
        $b = DB::table('accounts')
        ->select('online')
        ->where('online','=','true')
        ->count();
        $d = DB::table('site')
        ->select('acessos')->get();
        foreach($d as $num){
            if($num->acessos == 0){
                DB::table('site')
                ->insert([
                    'acessos' => 1
                ]);
            }else{
                    DB::table('site')
                    ->update([
                        'acessos' => $num->acessos + 1
                    ]);
            }
        }
        $g = DB::table('site')
        ->select('acessos')->get();
        return view('projectcruize.home')->with('contas_criadas', $a)->with('onlines', $b)->with('download', $this->c)->with('acessos', $g);
    }

    public function Ranking_Individual()
    {
      
        $query = DB::table('accounts')
        ->select(
            'accounts.login',
            'accounts.player_id',
            'accounts.access_level',
            'accounts.player_name',
            'accounts.online',
            'accounts.pc_cafe',
            'accounts.rank',
            'accounts.exp',
            'accounts.fights',
            'accounts.fights_win',
            'accounts.fights_lost',
            'accounts.headshots_count',
            'accounts.kills_count',
            'accounts.deaths_count',
            'accounts.totalkills_count',
            'perfil_usuario.liga')
            ->join('perfil_usuario','accounts.player_id','=','perfil_usuario.player_id','left')
            ->where('access_level','<','3')
            ->where('access_level','<>','-1')
            ->orderByDesc('accounts.exp')
            ->paginate(8);
            return view('projectcruize.v.paginas.ranking.ranking_usuario.ranking')->with('results', $query)->with('download', $this->c);
       
    }
    public function Ranking_top3()
    {
        $query = DB::select('SELECT * FROM ranking_geral() LIMIT 3');
        return view('projectcruize.v.paginas.ranking.ranking_usuario.rankingtop3')->with('results', $query)->with('download', $this->c);
    }
    public function Ranking_Clans()
    {
        // SELECT b.clan_name, b.owner_id, b.partidas, b.vitorias, b.derrotas, b.clan_exp, f.player_name FROM clan_dados as b INNER JOIN accounts as f ON owner_id = player_id
        $query = DB::table('clan_dados')
            ->select(
                'clan_dados.clan_id',
                'clan_dados.clan_rank',
                'clan_dados.clan_name',
                'clan_dados.partidas',
                'clan_dados.vitorias',
                'clan_dados.derrotas',
                'clan_dados.clan_exp',
                 'accounts.player_name')
            ->join('accounts', 'clan_dados.owner_id', '=', 'accounts.player_id')
            ->orderby('clan_exp', 'desc')
            ->paginate(6);
        return view('projectcruize.v.paginas.ranking.ranking_clan.rankingclan')->with('results', $query)->with('download', $this->c);
    }

    public function Ranking_Clans_Top()
    {
        $query = DB::table('clan_dados')
            ->select(
                'clan_dados.clan_id',
                'clan_rank',
                'clan_name', 
                'partidas', 
                'vitorias', 
                'derrotas', 
                'clan_exp', 
                'accounts.player_name')
            ->join('accounts', 'clan_dados.owner_id', '=', 'accounts.player_id')
            ->orderby('clan_exp', 'desc')
            ->limit(3)
            ->get();
        return view('projectcruize.v.paginas.ranking.ranking_clan.rankingclantop3')->with('results', $query)->with('download', $this->c);
    }

    public function Profile(Request $request, $id)
    {
        $ids = preg_replace('/[^[:alnum:]_]/', '', $id);
        if (is_numeric($ids)) {
            $query = DB::select('SELECT * FROM select_profile('.$ids.')');
            foreach ($query as $q) {
                $qq = new PatenteController;
                $a = $qq->nome($q->rank);
                $b = $qq->liga($q->liga);
                return view('projectcruize.v.paginas.ranking.ranking_usuario.profile.profileUser')->with('results', $query)->with('patente', $a)->with('tipo_liga', $b)->with('download', $this->c);
            }
            $request->session()->flash('error-danger', "<script>alert('Este usuario não existe!'); </script>");
            return redirect('/Ranking');
            die();
        } else {
            $request->session()->flash('alert-danger', "<script>alert('Digite um PID Valido!'); </script>");
            return redirect('/Ranking');
            die();
        }
    }

    public function ClanProfile(Request $request, $id)
    {
        $ids = preg_replace('/[^[:alnum:]_]/', '', $id);
        if (is_numeric($ids)) {
            $query = DB::select('SELECT * FROM select_clan('.$ids.')');
            foreach ($query as $q) {
                return view('projectcruize.v.paginas.ranking.ranking_clan.profile.profileclan')->with('results', $query)->with('download', $this->c);
                die();
            }
            $request->session()->flash('error-danger', "<script>alert('Este Clan não existe!'); </script>");
            return redirect('/RankingClan');
            die();
        } else {
            $request->session()->flash('error-danger', "<script>alert('Digite um PID Valido!'); </script>");
            return redirect('/RankingClan');
            die();
        }

    }
    
    public function Ranking_Banimentos()
    {
        $query = DB::table('accounts')
        ->select(
            'accounts.login',
            'accounts.player_id',
            'accounts.access_level',
            'accounts.player_name',
            'accounts.online',
            'accounts.pc_cafe',
            'accounts.rank',
            'accounts.exp',
            'accounts.fights',
            'accounts.fights_win',
            'accounts.fights_lost',
            'accounts.headshots_count',
            'accounts.kills_count',
            'accounts.deaths_count',
            'accounts.totalkills_count',
            'perfil_usuario.liga')
            ->join('perfil_usuario','accounts.player_id','=','perfil_usuario.player_id','left')
            ->where('accounts.access_level', '=', '-1')
            ->orderByDesc('accounts.exp')
            ->paginate(8);
            return view('projectcruize.v.paginas.ranking.ranking_usuario.banimentos')->with('results', $query)->with('download', $this->c);
    }

    public function MixPlayer(){
        return view('projectcruize.v.paginas.ranking.ranking_clan.mix.MixPlayer')->with('download', $this->c);
    }
    
    public function Equipe(){

            $query = DB::select("SELECT * FROM select_profile('2000001')");
            return view('projectcruize.v.paginas.staff.Equipe')->with('profile', $query)->with('download', $this->c);
    }

    public function Login(){
            return view('projectcruize.v2.login')->with('download', $this->c);
        
    }

    public function AlterarProfile(Request $request){
        if(isset($_SESSION['idade'])){
            DB::table('perfil_usuario')
            ->select('*')
            ->where('player_id', '=',$_SESSION['ID'])
            ->update([
                'nacionalidade' => $request->nacionalidade,
                'genero' => $request->genero,
                'sobre' => $request->sobre,
                'especializacao' => $request->especializacao,
                'idade' =>  $_SESSION['idade']
            ]);
            $request->session()->flash('alert-success', "Alteração do perfil concluida!");
            return redirect()->back();
        }else{
            session_destroy();
            $request->session()->flash('alert-danger', "Sua conta foi logada em outro acesso.");
            return redirect('/Login');
            die();
        }
        
    }
}
