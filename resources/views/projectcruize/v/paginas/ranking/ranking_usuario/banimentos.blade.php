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
                            <li><a href="{{ route('home') }}">Home</a>/</li>
                            <li>Banimentos</li>
                        </ul>
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
                    <h4>Banimentos</h4>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 overflow-scroll standings-table"> 
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="2017" role="tabpanel">
                            <table class="standing-full">
                                <tr>
                                    <th>ID</th>
                                    <th>Rank</th>
                                    <th>Jogador</th>
                                    <th>Estado</th>
                                    <th>Liga</th>
                                </tr>
                                <?php $num = ($results->currentPage() - 1) * $results->perPage() + 1; ?>
                                    @foreach($results as $q)
                                <tr>
                                <td class="up"><a href="{{  route('profile', $id=$q->player_id) }}">{{$q->num = $num++}}</a></td>
                                <td><img src="images/rankusuarios/{{$q->rank}}.gif" style="height: 20px;"></td>
                                <td><a href="{{  route('profile', $id=$q->player_id) }}">
                                    <?php if ($q->player_name == '') {
                                              echo $q->login;
                                                } else {
                                            if ($q->access_level == -1) {
                                              echo '<span style="color:red;">' . $q->player_name . '</span>';
                                                } else {
                                              echo $q->player_name;
                                                }
                                           } ?></a></td>
                                <td><span style="color: red;">Banido</span></td>
                                <?php if ($q->liga == '') {
                                            echo '<td><img src="images/ligas/0.png" style="height: 60px; width: 60px" title="Bronze"></td>';
                                        } else {
                                            echo '<td><img src="images/ligas/' . $q->liga . '.png" style="height: 60px; width: 60px"></td>';
                                        } ?>
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