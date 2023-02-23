@extends('projectcruize.__construct.construct.sprint')

@section('content')
<main>
<div class="alert alert-warning" role="alert" style="margin-bottom: 0px;"> Usuarios com contas cadastradas pelo launcher, enviar data de nascimento para o Ramon no discord.</div>
@foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
    @if(Session::has('error-'. $msg))
    {!! Session::get('error-' . $msg) !!}
    @elseif(Session::has('alert-' . $msg))
    <div class="alert alert-{{ $msg }}" role="alert" style="margin-bottom: 0px;">
        {!! Session::get('alert-' . $msg) !!}
    </div>
    @endif
    @endforeach
<div class="main-slider-section">
    <div class="main-slider">
        <div id="main-slider" class="carousel slide" data-ride="carousel" data-interval="4000">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="main-slider-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="match-date" id="HoraTemp"></div>
                                    <script>
			// Função para formatar 1 em 01
			const zeroFill = n => {
				return ('0' + n).slice(-2);
			}

			// Cria intervalo
			const interval = setInterval(() => {
				// Pega o horário atual
				const now = new Date();

				// Formata a data conforme dd/mm/aaaa hh:ii:ss
				const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

				// Exibe na tela usando a div#data-hora
				document.getElementById('HoraTemp').innerHTML = dataHora;
			}, 1000);
		</script>
                                    <div class="team"> Contas criadas:
                                       <div class="big-count" style="color: green;">
                                          {{$contas_criadas}}
                                           </div>
                                    </div> 
                                    <div class="team"> Usuarios conectados:
                                       <div class="big-count" style="color: green;">
                                          {{$onlines}}
                                           </div>
                                    </div>       
                                    <div class="team"> Quantidade de acessos no site:
                                       <div class="big-count" style="color: green;">
                                          @foreach($acessos as $num)
                                          {{$num->acessos}}
                                          @endforeach
                                           </div>
                                    </div>       
                                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="main-slider-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="match-date" id="datas"></div>

                                    <div class="team"> MIX CLAN
                                    </div>                                        
                                    <div class="counter" data-date="1534185200000">
                                        <ul>
                                            <li>
                                                <div class="digit days" id="day"></div>
                                                <div class="descr" >Dias</div>
                                            </li>
                                            <li>
                                                <div class="digit hours" id="horas"></div>
                                                <div class="descr" >Horas</div>
                                            </li>
                                            <li>
                                                <div class="digit minutes" id="minutos"></div>
                                                <div class="descr" >Minutos</div>
                                            </li>
                                            <li>
                                                <div class="digit seconds" id="segundos"></div>
                                                <div class="descr" >Segundos</div>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <a class="nav-arrow left-arrow" href="#main-slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only"></span>
            </a>
            <a class="nav-arrow right-arrow" href="#main-slider" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only"></span>
            </a>

            <div class="event-nav">
                <div class="container">
                    <div class="row no-gutter carousel-indicators">

                        <div class="col-sm-4 active" data-slide-to="0" data-target="#main-slider">
                            <a href="#" class="nav-item">
                                <span class="championship">Estado do servidor</span>
                                <span class="teams-wrap">
                                    <span class="team"><img src="images/soccer/team-logoa.png" alt="team-logo"></span>
                                    <span class="score">
                                        <span style="color: green;">Online</span>
                                    </span>

                                    <span class="team1">
                                        <span><img src="images/soccer/team-logob.png" alt="team-logo"></span>
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="col-sm-4" data-slide-to="1" data-target="#main-slider">
                            <a href="#" class="nav-item">
                                <span class="championship">Mix Clan</span>
                                <span class="teams-wrap">

                                    <span class="team"><img src="images/soccer/team-logoe.png" alt="team-logo"></span>
                                    <span class="score countdown" data-date="1534185200000">
                                        <span class="days" id="dias"></span>
                                        <span class="hours" id="horas1"></span>
                                        <span class="minutes" id="minutos1"></span>
                                        <span class="seconds" id="segundos1"></span>
                                    </span>

                                    <span class="team1">
                                        <span><img src="images/soccer/team-logoa.png" alt="team-logo"></span>
                                    </span>

                                </span>
                            </a>
                        </div>
                        <script>

var countDownDate = new Date("June 30, 2020 12:00:00").getTime();


var x = setInterval(function() {


  var now = new Date().getTime();


  var distance = countDownDate - now;


  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

 
  document.getElementById("day").innerHTML = days;
  document.getElementById("horas").innerHTML = hours;
  document.getElementById("minutos").innerHTML = minutes;
  document.getElementById("segundos").innerHTML = seconds;
  document.getElementById("dias").innerHTML = days;
  document.getElementById("horas1").innerHTML = hours;
  document.getElementById("minutos1").innerHTML = minutes;
  document.getElementById("segundos1").innerHTML = seconds;
}, 1000);
</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection