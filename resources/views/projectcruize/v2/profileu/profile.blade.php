@extends('projectcruize.__construct.construct.sprint')

@section('content')
@foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
@if(Session::has('error-'. $msg))
{!! Session::get('error-' . $msg) !!}
@elseif(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }}" role="alert" style="margin-bottom: 0px;">
  {!! Session::get('alert-' . $msg) !!}
</div>
@endif
@endforeach
<link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
<div class="wrapper">
  <div class="main-panel">
    <div class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Editar Perfil</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('alterarProfile')}}">
                @csrf
                <div class="row">
                  <div class="col-md-5 pr-md-1">
                    <div class="form-group">
                      <label>Company (disabled)</label>
                      <input type="text" class="form-control" disabled="" placeholder="Company" value="Project Cruize .">
                    </div>
                  </div>
                  <div class="col-md-3 px-md-1">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" disabled="" placeholder="Username" value="{{$_SESSION['Usuario']}}">
                    </div>
                  </div>
                  <div class="col-md-4 pl-md-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" disabled="" placeholder="{{$_SESSION['Email']}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                      <label>Especialização</label>
                      <input type="text" class="form-control" placeholder="Ex: Atirador de Elite." name="especializacao" required>
                    </div>
                  </div>
                  <div class="col-md-6 pl-md-1">
                    <div class="form-group">
                      <label>Nacionalidade</label>
                      <input type="text" class="form-control" placeholder="Ex: Brasileiro." name="nacionalidade" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Idade</label>
                      <input type="text" class="form-control" disabled="" placeholder="Idade" value="<?php if ($idade == null) {
                                                                                                        echo 'null';
                                                                                                      } else {
                                                                                                        echo $idade;
                                                                                                      } ?>">
                    </div>
                  </div>
                  <div class="col-md-6 pl-md-1">
                    <div class="form-group">
                      <label>Genero</label>
                      <input type="text" class="form-control" placeholder="Ex: Masculino." name="genero" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 pr-md-1">
                    <div class="form-group">
                      <label>Cidade</label>
                      <input type="text" class="form-control" disabled="" placeholder="City" value="{{$local->geoplugin_city}}">
                    </div>
                  </div>
                  <div class="col-md-4 px-md-1">
                    <div class="form-group">
                      <label>Pais</label>
                      <input type="text" class="form-control" disabled="" placeholder="Country" value="{{$local->geoplugin_countryName}}-{{$local->geoplugin_countryCode}}">
                    </div>
                  </div>
                  <div class="col-md-4 pl-md-1">
                    <div class="form-group">
                      <label>Regiao</label>
                      <input type="text" class="form-control" disabled="" placeholder="Region" value="{{$local->geoplugin_regionName}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Sobre</label>
                      <?php if ($_SESSION['Sobre'] != null) {
                        echo '<textarea rows="4" cols="80" style="text-align: center; font-size:2rem;"  class="form-control" placeholder="' . $_SESSION['Sobre'] . '" name="sobre" required></textarea>';
                      } else {
                        echo '<textarea rows="4" cols="80" style="text-align: center; font-size:2rem;" class="form-control" placeholder="Digite aqui sobre você" name="sobre" required></textarea>';
                      } ?>

                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-fill btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="card card-user">
            <div class="card-body">
              <p class="card-text">
                <div class="author">
                  <div class="block block-one"></div>
                  <div class="block block-two"></div>
                  <div class="block block-three"></div>
                  <div class="block block-four"></div>
                  <a href="javascript:void(0)">
                    <img class="avatar" src="../images/soccer/team-logod.png"  alt="...">
                    <h5 class="title">{{$_SESSION['Usuario']}}</h5>
                  </a>
                  <p class="description">
                    <?php if ($_SESSION['access_level'] > 3) {
                      echo 'Staff';
                    } else {
                      echo 'Jogador';
                    }
                    ?>
                  </p>
                </div>
              </p>
              <div class="card-description" style="text-align: center;">
                <?php
                if ($_SESSION['Sobre'] != null) {
                  echo '<span>' . $_SESSION['Sobre'] . '</span>';
                } else {
                  echo '<span>Não há nenhuma descrição</span>';
                } ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection