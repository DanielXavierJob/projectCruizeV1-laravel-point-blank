@extends('projectcruize.__construct.construct.sprint')
@section('content')
<form method="POST" action="{{route('AuthPass')}}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Digite sua nova Senha</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="senha1">
  <div class="form-group">
    <label for="exampleInputPassword1">Digite novamente sua nova Senha</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="senha2">
  </div> 
  <button type="submit" class="btn btn-primary" >Submeter</button>
</form>
@endsection