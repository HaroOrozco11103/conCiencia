@extends('layouts.index')

@section('content')
<head>
    <meta charset="UTF-8">
    <title>Registro Profesor</title>
    <link rel="stylesheet" href="{{ asset('css/style/style.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Recursive" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>

<body>
  <div class="contenedor-profesor">
    <nav class="nav-profesor">
      <ul class="nav-links">
          <li><a href="/perfil-profesor.html">Perfil</a></li>
          <li><a href="/grupo.html">Grupos</a></li>
          <li><a href="/estadisticas-globales.html" class="estadisticas-glob-link">Datos Globales</a></li>
      </ul>
    </nav>
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
  </div>
</body>

<footer>
  <p><a href="">Stats Globales</a></p>
</footer>
@endsection
