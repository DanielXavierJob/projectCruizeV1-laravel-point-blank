@extends('projectcruize.__construct.construct.sprint')
@section('content')
<div class="coming-wrap" style="position: inherit;">
    <div class="coming-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="big-text">O MIX DE CLAN COMEÇARÁ EM </span>
                    <div class="counter">
                        <ul>

                            <li>
                                <div class="digit" id="dias"></div>
                                <div class="descr">Dias</div>
                            </li>

                            <li>
                                <div class="digit" id="horas"></div>
                                <div class="descr">Horas</div>
                            </li>

                            <li>
                                <div class="digit" id="minutos"></div>
                                <div class="descr">Minutos</div>
                            </li>

                            <li>
                                <div class="digit" id="segundos"></div>
                                <div class="descr">Segundos</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

 
  document.getElementById("dias").innerHTML = days;
  document.getElementById("horas").innerHTML = hours;
  document.getElementById("minutos").innerHTML = minutes;
  document.getElementById("segundos").innerHTML = seconds;
}, 1000);
</script>

@endsection