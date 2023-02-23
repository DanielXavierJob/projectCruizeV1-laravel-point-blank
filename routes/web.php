<?php
use Illuminate\Support\Facades\Route;
session_start();
Route::get('/', 'SiteController@Home')->name('home');

Route::get('User', function(){
    return redirect('/Ranking');
});
Route::get('Clan', function(){
    return redirect('/RankingClan');
});
Route::get('User{id}', 'SiteController@Profile')->name('profile');

Route::post('ProfileAt', 'SiteController@AlterarProfile')->name('alterarProfile');

Route::get('Clan{id}','SiteController@ClanProfile')->name('profileclans');

Route::get('/Ranking', 'SiteController@Ranking_Individual')->name('ranking');

Route::get('/RankingTop', 'SiteController@Ranking_top3')->name('rankingtop3');

Route::get('/RankingClan', 'SiteController@Ranking_Clans')->name('rankingclan');

Route::get('/RankingTopClan', 'SiteController@Ranking_Clans_Top')->name('rankingclantop3');

Route::get('/Banimentos', 'SiteController@Ranking_Banimentos')->name('banimentos');

Route::get('/MixPlayer', 'SiteController@MixPlayer')->name('mixplayer');

Route::get('/Login', 'SiteController@Login')->name('login');

Route::get('/Logout', 'LoginController@Logout')->name('logout');

Route::post('login/do', 'loginController@Login')->name('LoginUser');

Route::post('cadastro/do','CadastroController@Cadastrar')->name('Cadastro');

Route::get('CashDiario', 'LoginController@CashDiario')->name('CashDiario');

Route::get('/MeuPerfil',  'SiteController@MeuPerfil')->name('meuperfil');
Route::get('/Noticias', function(){
    return view('projectcruize.v.paginas.noticias.noticiasgeral');
})->name('noticias');

Route::get('/NoticiaTal', function(){
    return view('projectcruize.v.paginas.noticias.profile.noticiaprofile');
})->name('noticiasprofile');

Route::get('/Atualizacoes', function(){
    return view('projectcruize.v.paginas.noticias.atualizacoes');
})->name('atualizacoes');

Route::get('/Eventos', function(){
    return view('projectcruize.v.paginas.noticias.eventos');
})->name('eventos');

Route::get('/Avisos', function(){
    return view('projectcruize.v.paginas.noticias.avisos');
})->name('avisos');

Route::get('/Equipe', 'SiteController@Equipe')->name('equipe');

Route::get('/Suporte', function(){
    return view('projectcruize.v.paginas.staff.profile.suporte');
})->name('suporte');