@extends('projectcruize.__construct.construct.sprint')
@section('content')
<main>
  <section class="image-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <div class="wrap">
                        <ul class="breadcrumbs">
                            <li><a href="{{ route('home') }}">Home</a>/</li>
                            <li><a href="{{ route('ranking') }}">Ranking</a>/</li>
                        </ul>
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>	
        </div>
    </div>
</section>

    <section class="player-single-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="captain-bage" style="color:#d62d20;">Heroi de Guerra</div>
                    <h4 class="player-name"><img src="images/rankusuarios/50.gif" width="25">&nbsp;RAMON</h4>
                </div>
                <div class="col-md-6">
                    
<div class="player-photo">
    <div class="number"></div>
    <img class="img-responsive" src="images/soccer/single-player-photo.png" alt="player">
</div>
                </div>
                <div class="col-md-6">
                    <div class="player-info">
                        <h6 class="player-info-title">Descrição</h6>	
                        <div class="summary">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Nacionalidade:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9"> <span style="color: green;">Brasileiro</span></div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Posição:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">Top 1</div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Idade:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">18</div>
                            </div>
                        </div>
                        <h6>Historico</h6>
                        <div class="overflow-scroll">
                            <table>
                                <tr>
                                    <th>Vitorias</th>
                                    <th>Derrotas</th>
                                    <th>Kills</th>
                                    <th>Deaths</th>
                                </tr>
                                <tr>
                                    <td>16.000</td>
                                    <td>5.145</td>
                                    <td>230.047</td>
                                    <td>57.089</td>
                                </tr>
                            </table>
                        </div>
                        <h6>Sobre:</h6>
                        <p>Sou um jogador forte e leal, diante das situações penso antes de agir, e ajo com devida firmeza.</p>
                        <h6>Trofeus</h6>
                        <ul class="player-trophey">
                            <li>
                                <img src="images/common/am-trophey1.png" width="100" height="150" alt="trophy">
                                <div class="year">2012</div>
                            </li>
                            <li>
                                <img src="images/common/am-trophey.png" width="100" height="150" alt="trophy">
                                <div class="year">2015</div>
                            </li>
                            <li>
                                <img src="images/common/am-trophey2.png" width="100" height="150" alt="trophy">
                                <div class="year">2017</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection