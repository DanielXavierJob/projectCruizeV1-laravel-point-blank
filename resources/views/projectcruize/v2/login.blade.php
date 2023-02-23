<?php if(!isset($_SESSION['id'])){ ?>

@extends('projectcruize.__construct.frag_site.login2')

@section('content-link')
<link rel="stylesheet" href="{{ url(mix('css/login.min.css'))}}">
@endsection
@section('content')
<main class="padding" id="card-cads">
    <div class="coluns">
        <div class="login-wrap">
            <div class="login-html">
                <a href="{{ route('home') }}" style="padding-right: 10px; color: white;" title="Voltar para Home"><i class="fa fa-arrow-left fa-1x" aria-hidden="true"></i></a>
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Cadastro</label>
                <div class="login-form">       
                        <div class="sign-in-htm">

                   <form class="form-sign-in" method="POST" action="{{ route('LoginUser') }}">
                           @csrf
                           <div class="group">
                        @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
    @if(Session::has('error-'. $msg))
    {!! Session::get('error-' . $msg) !!}
    @elseif(Session::has('alert-' . $msg))
        <div class="alert alert-{{ $msg }}" role="alert" style="margin-bottom: 0px;">
            {!! Session::get('alert-' . $msg) !!}
        </div>
    @endif
@endforeach
                           </div>
                           <div class="group">
                           
                           </div>
                            <div class="group">
                                <label for="user" class="label">Usuario</label>
                                <input id="user" type="text" style="text-transform: lowercase;" class="input" name="name">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Senha</label>
                                <input  type="pass" id="pass" type="password" class="input" data-type="password" name="password">
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" name="lem_senha" checked>
                                <label for="check"><span class="icon"></span> Quero me lembrar</label>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Logar">
                            </div>
                            <div class="foot-lnk">
                                <a href="#forgot" style="color: white;">Esqueceu o Usuario ou Senha?</a>
                            </div>
                            </form>
                        </div>
                   

                    <div class="sign-up-htm">
                        <form class="form-sign-up" method="POST" action="{{route('Cadastro')}}">
                        @csrf
                        <div class="group">
                        @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
    @if(Session::has('error-'. $msg))
    {!! Session::get('error-' . $msg) !!}
    @elseif(Session::has('alert-' . $msg))
        <div class="alert alert-{{ $msg }}" role="alert" style="margin-bottom: 0px;">
            {!! Session::get('alert-' . $msg) !!}
        </div>
    @endif
@endforeach
                           </div>
                            <div class="group">
                                <input id="user" type="text" class="input" style="text-transform: lowercase;" name="name" placeholder="Usuario" style="color: white;" required>
                            </div>
                            <div class="group">
                                <input id="pass" type="password"  minlength="6" class="input" data-type="password" name="password" placeholder="Senha" style="color: white;" required>
                            </div>
                            <div class="group">
                                <input id="pass" type="password"  minlength="6" class="input" data-type="password" name="password1" placeholder="Repita sua Senha" style="color: white;" required>
                            </div>
                            <div class="group">
                                <input id="email" type="Email"  minlength="6" class="input" data-type="email" name="email" placeholder="Email" style="color: white;" required>
                            </div>
                            <div class="group">
                                <input id="date" type="date"  minlength="6" class="input" data-type="date" name="date" placeholder="Data de nascimento" style="color: white;" required>
                            </div>
                           
                            <div class="group">
                                <div id="g-recaptcha" class="g-recaptcha" data-sitekey="6LesjwAVAAAAADxk8NpvUaJFE6jCWT4vy9NnaTum" style="margin-left: 40px; margin-bottom:2px;"></div>
                            </div>

                            <div class="group">
                                <input type="submit" class="button" value="Cadastrar"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
@endsection
<?php }else{ ?>
<script language= "JavaScript">
location.href="/"
</script>
<?php } ?>

