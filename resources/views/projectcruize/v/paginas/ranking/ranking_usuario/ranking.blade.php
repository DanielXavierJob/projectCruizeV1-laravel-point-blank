@extends('projectcruize.__construct.construct.sprint')

@section('content')
<main>
    @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
    @if(Session::has('error-'. $msg))
    {!! Session::get('error-' . $msg) !!}
    @elseif(Session::has('alert-' . $msg))
    <div class="alert alert-{{ $msg }}" role="alert" style="margin-bottom: 0px;">
        {!! Session::get('alert-' . $msg) !!}
    </div>
    @endif
    @endforeach
    <!--BREADCRUMBS BEGIN-->
    <section class="image-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <div class="wrap">
                            <ul class="breadcrumbs">
                                <li style="color: white;"><a href="{{ route('home') }}" style="color: white;">Home</a>/</li>
                                <li style="color: white;">Ranking</li>
                            </ul>
                            <h1 style="color: white;"> Ranking Geral</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BREADCRUMBS END-->

    <!--STANDING TABLE WRAP BEGIN-->

    <section class="standing-table-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4>Ranking Geral</h4>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 overflow-scroll standings-table">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="2017" role="tabpanel">
                            <table class="standing-full">
                                <tr>
                                    <th>ID</th>
                                    <th>Patente</th>
                                    <th>Jogador</th>
                                    <th>Partidas</th>
                                    <th>Vitorias</th>
                                    <th>Derrotas</th>
                                    <th>KD</th>
                                    <th>HS</th>
                                    <th>Experiencia</th>
                                    <th>Liga</th>
                                    <th>Estado</th>
                                </tr>
                                    <?php $num = ($results->currentPage() - 1) * $results->perPage() + 1; ?>
                                    @foreach($results as $q)
                                    <tr>
                                        {{ csrf_field() }}
                                        <td class="up"><a href="{{  route('profile', $id=$q->player_id) }}">{{$q->num = $num++}}</a></td>
                                        <td><img src="images/rankusuarios/{{$q->rank}}.gif" style="height: 20px;"></td>
                                        <td><a href="{{  route('profile', $id=$q->player_id) }}"><?php if ($q->player_name == '') {
                                                                                                        echo $q->login;
                                                                                                    } else {
                                                                                                        if ($q->access_level == -1) {
                                                                                                            echo '<span style="color:red;">' . $q->player_name . '</span>';
                                                                                                        } else {
                                                                                                            echo $q->player_name;
                                                                                                        }
                                                                                                    } ?></a></td>
                                        <td>{{$q->fights}}</td>
                                        <td>{{$q->fights_win}}</td>
                                        <td>{{$q->fights_lost}}</td>
                                        <?php
                                        if ($q->totalkills_count == 0) {
                                            echo '<td>0%</td>';
                                        } else {
                                            @$kd = round($q->kills_count / ($q->kills_count + $q->deaths_count) * 100);
                                            echo '<td>' . $kd . '%</td>';
                                        }

                                        if ($q->totalkills_count == 0) {
                                            echo '<td>0%</td>';
                                        } else {
                                            @$hs = ($q->headshots_count * 100) / $q->totalkills_count;
                                            echo '<td>' . round($hs) . '%</td>';
                                        }

                                        ?>
                                        <td>{{substr(number_format($q->exp, 2, ',', '.'),0,-3)}}</td>
                                        <?php if ($q->liga == '') {
                                            echo '<td><img src="images/ligas/0.png" style="height: 60px; width: 60px" title="Bronze"></td>';
                                        } else {
                                            echo '<td><img src="images/ligas/' . $q->liga . '.png" style="height: 60px; width: 60px"></td>';
                                        } ?>
                                        <?php if ($q->online == true) {
                                            echo '<td id="on" style="color: green;">Online</td>';
                                        } else {
                                            echo '<td id="on" style="color: red;">Offline</td>';
                                        } ?></td>
                                    </tr>
                                   
                                    @endforeach
                            </table>
                            {!! $results->links() !!}
                                        
                        <script>
                            setInterval(function() {
                                window.location.reload();
                            }, 60000)
                        </script>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection