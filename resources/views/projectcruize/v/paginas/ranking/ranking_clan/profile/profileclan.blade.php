@extends('projectcruize.__construct.construct.sprint')

@section('content')
<main>
    <!--BREADCRUMBS BEGIN-->
<section class="image-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <div class="wrap">
                        <ul class="breadcrumbs">
                             <li style="color: white;"><a href="{{ route('home') }}" style="color: white;">Home</a>/</li>
                                <li style="color: white;"><a href="{{ route('rankingclan')}}" style="color: white;">Ranking Clan</a> /</li>
                            </ul>
                            <h1 style="color: white;">Profile</h1>
                    </div>
                </div>
            </div>	
        </div>
    </div>
</section>
<!--BREADCRUMBS END-->

    <!--PLAYER SINGLE WRAP BEGIN-->
    
    <section class="player-single-wrap">

        <!--PLAYER INFO BEGIN-->
<div class="container">
    <div class="row">

    @foreach($results as $q)
        <div class="col-md-12">
        
            <h4 class="player-name">{{$q->clan_name}}</h4>
        </div>
        <div class="col-md-3">
            <div class="player-photo">
               
            </div>
        </div>
        <div class="col-md-9">
            <div class="player-hockey-wrap">
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <div class="stats">
                            <p class="number">{{$q->clan_name}}#{{$q->clan_id}}</p>
                            <p class="name">Dono: {{$q->player_name}}</p>
                            <p class="name">Ranking: <img src="images/rankclans/{{$q->clan_rank}}.jpg"></p>
                            <p class="name">Sobre: <br> {{$q->clan_info}}</p>
                            <h5>Melhor player <span style="color: red;">{{$q->clan_name}}:</span><br> {{$q->melhor_jogador_win}}</h5>
                       
                        
                            <div class="wrapper-circle">
                                <div class="circle-item" >
                                <?php 
                                @$kd = round($q->vitorias / ($q->vitorias+$q->derrotas) * 100);
                                if($kd > 0){
                                    echo '
                                    <div class="circle-bar" id="circle_1" data-percent="'.$kd.'"></div>
                                    <div class="text">Percentual de vitoria</div>
                                    ';      
                                }
                                ?>  
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!--PLAYER INFO END-->

        <!--LAST MATCHES BEGIN-->
<div class="container last-hockey-macthes">
    <div class="row">
        <div class="col-md-12 overflow-scroll">
            <h6>Estartisticas</h6>
            <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">#</th>
      <th scope="col">Jogador</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $string = $q->best_exp;
      $array_exp = explode('-', $string);
      ?>

      <th scope="row" style="text-align: center;">Melhor Jogador: Experiencia.</th>
      <td><a href="{{ route('profile', $id=$array_exp[0])}}">{{$q->melhor_jogador_exp}}</a></td>
      <td>{{$array_exp[1]}}</td>

    </tr>
    
    <tr>
      <?php
      $string = $q->best_wins;
      $array_wins = explode('-', $string);
      ?>

      <th scope="row" style="text-align: center;">Melhor Jogador: Vitorias</th>
      <td><a href="{{ route('profile', $id=$array_wins[0])}}">{{$q->melhor_jogador_win}}</a></td>
      <td>{{$array_wins[1]}}</td>

    </tr>

    <tr>
      <?php
      $string = $q->best_participation;
      $array_participation = explode('-', $string);
      ?>

    <th scope="row" style="text-align: center;">Melhor Jogador: Participação</th>
    <td><a href="{{ route('profile', $id=$array_participation[0])}}">{{$q->melhor_jogador_participacao}}</a></td>
    <td>{{$array_participation[1]}}</td>

    </tr>

    <tr>
      <?php
      $string = $q->best_kills;
      $array_kills = explode('-', $string);
      ?>


    <th scope="row" style="text-align: center;">Melhor Jogador: Kills</th>
    <td><a href="{{ route('profile', $id=$array_kills[0])}}">{{$q->melhor_jogador_kill}}</a></td>
    <td>{{$array_kills[1]}}</td>
    </tr>


    <tr>
      <?php
      $string = $q->best_headshot;
      $array_hs = explode('-', $string);
      ?>
    <th scope="row" style="text-align: center;">Melhor Jogador: Headshots</th>
    <td><a href="{{ route('profile', $id=$array_hs[0])}}">{{$q->melhor_jogador_hs}}</a></td>
    <td>{{$array_hs[1]}}</td>

    </tr>
  </tbody>
</table>
        </div>
    </div>
</div>
<!--LAST MATCHES END-->

        <!--PLAYER STATS BEGIN-->
<section class="hockey-stats">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" >
                        <h6>Historico de partidas</h6>
                        <div class="overflow-scroll">
                            <table>
                                <tr>
                                    <th style="text-align: center;">Partidas</th>
                                    <th style="text-align: center;">Vitorias</th>
                                    <th style="text-align: center;">Derrotas</th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                    <span>{{$q->partidas}}</span>
                                    </td>

                                    <td style="text-align: center;">
                                     {{$q->vitorias}}
                                    </td>

                                    <td style="text-align: center;">
                                    {{$q->derrotas}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <h6>Trofeus</h6>
                        <div class="background-section">
                            <ul class="player-trophey">
                                <?php
                                 if($q->win_1 == null){
                                    echo '
                                    <li>
                                    <div> O clan '.$q->clan_name.', Não possue trofeus :( </div>
                                    </li>';
                                }else{
                                     $string = $q->win_1;
                                     $array_1 = explode('-', $string);
                                    echo '
                                    <li>
                                    <img src="images/common/'.$array_1[0].'.png" width="100" height="150" alt="trophy" title="'.$array_1[1].'">
                                    <div class="year">'.$array_1[2].'</div>
                                    </li>';

                                }?>
                            </ul>
                        </div>
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        </div>


    </div>
</section>
<!--PLAYER STATS END-->

    </section>
</main>
@endsection