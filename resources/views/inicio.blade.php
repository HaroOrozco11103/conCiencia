@extends('layouts.index')

@section('content')
<style>
  .block
  {
    display: block;
    width: 100%;
    border: none;
    background-color: #252850;
    color: white;
    padding: 50px 100px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    border-radius: 5px;
  }

  .block:hover
  {
    background-color: #36465D;
    color: white;
  }

  footer {
  text-align: right;
  padding: 30px;
  }
</style>

<div class="container-fluid mt--5">
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-center pt-5">
        <div class="col-0">
          <form action="{{ route('asignaturas.index') }}" method="GET">
            <button type="submit" class="btn block btn-block">Jugar</button>
          </form>
          <br><br><br>
          <form action="{{ route('grupos.entrar') }}" method="GET">
            <button type="submit" class="btn block btn-block">Entrar a un grupo</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</div>
<footer>
  <p><a href="">Stats Globales</a></p>
</footer>
@endsection
