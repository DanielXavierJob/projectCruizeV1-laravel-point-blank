
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
                                <li ><a href="{{ route('home') }}" style="color: white;">Home</a>/</li>
                                <li><a href="{{ route('ranking') }}" style="color: white;">Ranking</a>/</li>
                            </ul>
                            <h1 style="color: white;">Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="player-single-wrap">
        <div class="container">
            <div class="row">

                @foreach($results as $q)
                <div class="col-md-12">
                    <div class="captain-bage" style="color:#d62d20;">{{$patente}}</div>
                    <h4 class="player-name"><img src="images/rankusuarios/{{$q->rank}}.gif" width="25">&nbsp;<?php if($q->player_name == ''){
                         echo $q->login;
                        }else{
                            if($q->access_level == -1){
                                echo '<span style="color:red;">'.$q->player_name.'</span>';
                            }else{
                                echo $q->player_name.'#'.$q->player_id;
                            }   
                            }
                        ?>
                        </h4>
                </div>
                <div class="col-md-6">

                    <div class="player-photo">
                        <div class="number"></div>
                        <img class="img-responsive" src="images/soccer/single-player-photo.png" alt="player">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="player-info">
                        <h6 class="player-info-title">Descri????o</h6>
                        <div class="summary">
                            <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Especializa????o:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9" style="margin-left: 1rem;"><?php 
                                if($q->especializacao == ''){
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo 'N??o informado';
                                    }
                                }else{
                                    echo $q->especializacao;
                                }
                                    ?></div>

                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Nacionalidade:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9" style="margin-left: 1rem;"> <span style="color: green;"><?php 
                                if($q->nacionalidade == ''){
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo 'N??o informado';
                                    }
                                }else{
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo $q->nacionalidade;
                                    }
                                }
                                    ?></span></div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Genero:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9" style="margin-left: 1rem;"><?php 
                                if($q->genero == ''){
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo 'N??o informado';
                                    }
                                }else{
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo $q->genero;
                                    }
                                }
                                    ?></div>

                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="item">Idade:</div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9" style="margin-left: 1rem;"><?php 
                                if($q->idade == ''){
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo 'N??o informado';
                                    }
                                }else{
                                    if($q->access_level == -1){
                                        echo '<span style="color:red;"> O player: '.$q->player_name.' est?? banido.</span>';
                                    }else{
                                    echo $q->idade;
                                    }
                                }
                                    ?></div>
                            </div>
                        </div>
                        <h6>Historico</h6>
                        <div class="overflow-scroll">
                            <table>
                                <tr>
                                <th>Partidas</th>
                                    <th>Vitorias</th>
                                    <th>Derrotas</th>
                                    <th>KD</th>
                                    <th>HS</th>
                                    <th>Experiencia</th>
                                </tr>
                                <tr>
                                    <td>{{$q->fights}}</td>
                                    <td>{{$q->fights_win}}</td>
                                    <td>{{$q->fights_lost}}</td>
                                    <?php
                                      if($q->totalkills_count == 0){
                                        echo '<td>0%</td>';
                                    }else{
                                        @$kd = round($q->kills_count / ($q->kills_count+$q->deaths_count) * 100);
                                    echo '<td>'.$kd.'%</td>';
                                    }
                                   
                                        if($q->totalkills_count == 0){
                                            echo '<td>0%</td>';
                                        }else{
                                            @$hs = ($q->headshots_count * 100) / $q->totalkills_count;
                                            echo '<td>'.round($hs).'%</td>';
                                        }
                                        
                                    ?>
                                     <td>{{substr(number_format($q->exp, 2, ',', '.'),0,-3)}}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Kill</th>
                                    <th>Deaths</th>
                                    <th>Total de HS</th>
                                    <th>Total de kill</th>
                                    <th>Estado</th>
                                    <th>VIP</th>
                                </tr>
                                <tr>
                                <td>{{$q->kills_count}}</td>
                                <td>{{$q->deaths_count}}</td>
                                <td>{{$q->headshots_count}}</td>    
                                <td>{{$q->totalkills_count}}</td>
                                <?php if($q->online == true){echo '<td style="color: green;">Online</td>';}else{echo '<td style="color: red;">Offline</td>';}?></td>
                                <?php 
                                     if($q->pc_cafe > 0){
                                        echo '<td><span style="color: green;">Sim</span></td>';
                                     }else{
                                        echo '<td><span style="color: red;">N??o</span></td>';
                                     }
                                     ?>
                                </tr>
                            </table>
                        </div>
                        <h6>Sobre:</h6>
                        <p><?php 
                                if($q->sobre == ''){
                                    echo 'N??o informado';
                                }else{
                                    echo $q->sobre;
                                }
                                    ?></p>
                        <h6>Liga</h6>
                        <ul class="player-trophey">  
                            <li>
                                <?php                              
                                if($q->liga == ''){
                                   
                                    echo '<img src="images/ligas/0.png" style="height: 120px; width: 120px">
                                <div class="year">Bronze</div>';
                                }else{
                                    echo '<img src="images/ligas/'.$q->liga.'.png" style="height: 120px; width: 120px">
                                     <div class="year">'. $tipo_liga .'</div>';
                                     
                                }
                            ?>
                            </li>
                        </ul>
                        <h6>Trofeus</h6>
                        <ul class="player-trophey">  
                        <?php
                        if($q->access_level == '-1'){
                            echo '
                            <li>
                            <div> O Jogador '.$q->player_name.', N??o possue trofeus, porque est?? banido. :) </div>
                            </li>';
                        }else{
                            if($q->win_1 == null){
                                echo '
                                <li>
                                <div> O Jogador '.$q->player_name.', N??o possue trofeus :( </div>
                                </li>';
                            }else{
                                 $string = $q->win_1;
                                 $array_1 = explode('-', $string);
                                echo '
                                <li>
                                <img src="images/common/'.$array_1[0].'.png" width="100" height="150" alt="trophy" title="'.$array_1[1].'">
                                <div class="year">'.$array_1[2].'</div>
                                </li>';

                            }
                        }
                                ?>
                        </ul>
                    </div>
                </div>
                @endforeach
                <script>
                            setInterval(function() {
                                window.location.reload();
                            }, 60000)
                        </script>
            </div>
        </div>
    </section>
</main>
@endsection