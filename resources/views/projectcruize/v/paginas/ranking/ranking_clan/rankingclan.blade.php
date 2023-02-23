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
                            <li style="color: white;">Ranking Clan</li>
                        </ul>
                        <h1 style="color: white;">Ranking Geral</h1>
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
                                    <th>Clan</th>
                                    <th>Vitorias</th>
                                    <th>Derrotas</th>
                                    <th>Experiencia</th>
                                    <th>Dono</th>
                                </tr>
                                <?php $num = ($results->currentPage() - 1) * $results->perPage() + 1; ?>
                                @foreach($results as $q)
                                <tr>
                                <td class="up">{{$q->num = $num++}} </td>
                                    <td><img src="images/rankclans/{{$q->clan_rank}}.jpg" style="height:30px;"></td>
                                    <td><a href="{{  route('profileclans', $id=$q->clan_id) }}">{{$q->clan_name}}</a></td>
                                    <td><a href="{{  route('profileclans', $id=$q->clan_id) }}">{{$q->vitorias}}</a></td>
                                    <td><a href="{{  route('profileclans', $id=$q->clan_id) }}">{{$q->derrotas}}</a></td>
                                    <td><a href="{{  route('profileclans', $id=$q->clan_id) }}">{{$q->clan_exp}}</a></td>
                                    <td><a href="{{  route('profileclans', $id=$q->clan_id) }}">{{$q->player_name}}</a></td>
                                </tr>
                                @endforeach
                            </table>
                            {!! $results->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection