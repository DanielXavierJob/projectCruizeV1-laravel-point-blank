@extends('projectcruize.__construct.construct.sprint')
@section('content')
<form method="POST" action="{{route('Resetar')}}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
    <small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seus dados pessoais com terceiros.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Token</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Token">
  </div>
  <button type="submit" class="btn btn-primary">Redefinir Senha</button>
</form style="margin-bottom: 10rem;">
@endsection