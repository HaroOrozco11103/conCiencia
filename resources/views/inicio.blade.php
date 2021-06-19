@extends('layouts.index')

@section('content')
  <div class="botones">
    <div class="jugar middle">
      <div class="front-jugar">
        <img src="{{ asset('images/img/kids-playing.png') }}" alt="">
      </div>
      <div class="back-jugar">
        <div class="boton-inicio" onclick="window.location.href='{{ route('asignaturas.index') }}'">JUGAR</div>
      </div>
    </div>
    <div class="grupo middle">
      <div class="front-grupo">
        <img src="{{ asset('images/img/classroom.png') }}" alt="">
      </div>
      <div class="back-grupo">
        <div class="boton-inicio" onclick="window.location.href='{{ route('grupos.entrar') }}'">ENTRAR A UN GRUPO</div>
      </div>
    </div>
  </div>
@endsection
