<?php
$hash = bcrypt('styles');
?>

@section('content-link')
<link type="text/css" rel="stylesheet" href="{{ url(mix('css/soccer.min.css')).$hash }}">
@endsection

@section('header')
<header class="header">
    <div class="main-menu-wrap sticky-menu">
        <div class="container" style="margin-right: 0px;">
            <a href="{{ route('home') }}" class="custom-logo-link"><img src="images/soccer/logo.png" alt="logo" class="custom-logo" width="64"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#team-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <nav class="navbar">
                <div class="collapse navbar-collapse" id="team-menu">
                    <ul class="main-menu nav" style="display: inline-block;">
                        <li class=" {{  (Route::current()->getName() === 'home' ? 'active' :  (Route::current()->getName() === 'profile' ? 'active' : '')) }}">

                            @if(isset($_SESSION['hash']))                               
                                    <a href="{{ route('home') }}"><span>Home</span></a>
                                    <ul>
                                        <li><a href="{{ route('meuperfil') }}">Meu Perfil.</a></li>
                                    </ul>
                                @else
                                 <a href="{{ route('home') }}"><span>Home</span></a>
                                @endif
                        </li>
                        <li class=" {{  (Route::current()->getName() === 'ranking' ? 'active' : (Route::current()->getName() === 'rankingtop3' ? 'active' : (Route::current()->getName() === 'rankingclan' ? 'active' : (Route::current()->getName() === 'rankingclantop3' ? 'active' : (Route::current()->getName() === 'rankingclan' ? 'active' : (Route::current()->getName() === 'banimentos' ? 'active' : ''))))))}}">
                            <a href="{{ route('ranking') }}"><span>Ranking</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('ranking') }}"><span>Ranking dos Players<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                                    <ul>
                                        <li><a href="{{ route('rankingtop3') }}">Ranking <span style="color:#d62d20;">TOP 3</span></a></li>
                                        <li><a href="{{ route('ranking') }}">Ranking <span style="color:#d62d20;">Geral</span></a></li>
                                        <!-- <li><a href="#">Ranking<span style="color:#d62d20;"> Temporada</span></a></li> !-->
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('rankingclan') }}"><span>Ranking dos Clans<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                                    <ul>
                                        <li><a href="{{ route('rankingclantop3') }}">Ranking <span style="color:#d62d20;">TOP 3</span></a></li>
                                        <li><a href="{{ route('rankingclan') }}">Ranking <span style="color:#d62d20;">Geral</span></a></li>
                                        <!-- <li><a href="#">Ranking<span style="color:#d62d20;">Temporada</span></a></li> !-->
                                    </ul>
                                </li>
                                <li><a href="{{ route('banimentos') }}"><span style="color:#d62d20;">Banimentos</span></a></li>
                            </ul>
                        </li>
                        <li class=" {{  (Route::current()->getName() === 'mixplayer' ? 'active' : '') }}">
                            <a href="{{route('mixplayer')}}"><span>Team Mix</span></a>
                        </li>

                        <li class=" {{  (Route::current()->getName() === 'equipe' ? 'active' : '') }}">
                            <a href="{{route('equipe')}}"><span>Staff</span></a>
                        </li>

                        <li>
                            <a href="#"><span>Baixar Game</span></a>
                            <ul>
                                @foreach($download as $d)
                                <li><a href="{{$d->url_download}}" title="{{$d->info}}"><span>{{$d->platform}}&nbsp;({{$d->file_size}})</span></a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Suporte</span></a>
                            <ul>
                                <li><a href="https://discord.projectcruize.com/" title="Acesse nosso Discord!"><span>Discord</span></a></li>
                            </ul>
                        </li>

                        @if(isset($_SESSION['hash']))
                        <li>
                            <a href="{{route('CashDiario')}}"><span>Cash Diario</span></a>
                        </li>

                        <li>
                            <a style="color: white; padding-left: 210px;" href="#"><i class="fa fa-user-circle fa-2x"></i></a>
                            <ul>
                                <div class="card" style="width: 25rem; height: 28rem; background: url('../images/menu_login.jpg');">
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-align: center; color: White;">Olá {{$_SESSION['Usuario']}}!</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" style="color: black;">Gold: {{substr(number_format($_SESSION['Gold'], 2, ',', '.'),0,-3)}}</li>
                                            <li class="list-group-item" style="color: black;">Cash: {{substr(number_format($_SESSION['Cash'], 2, ',', '.'),0,-3)}}</li>
                                            <li class="list-group-item" style="color: black;">Estado do vip: <?php if ($_SESSION['Pc_Cafe'] != 0) {
                                                                                            echo '<span style="color: green;">Ativo</span>';
                                                                                        } else {
                                                                                            echo '<span style="color: red;">Inativo</span>';
                                                                                        } ?></li>
                                            <li class="list-group-item" style="color: black;"><a href="{{route('logout')}}" class="btn btn-primary"><span style="padding-left: 2rem;">Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        @else
                        <li class="{{  (Route::current()->getName() === 'login' ? 'active' : '') }}">
                            <a href="{{route('login')}}"><span>Login</span></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
@endsection