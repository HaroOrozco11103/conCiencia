@extends('layouts.index')

@section('content')
<br><br><br>
<head>
    <meta charset="UTF-8">
    <title>Entrar Profesor</title>
    <link rel="stylesheet" href="{{ asset('css/style/style.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Recursive" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/img/teacher.png') }}" alt="">
        </div>
        <div class="contenedor-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class=title-entrar-profesor>INICIAR SESIÓN PROFESOR</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Nombre de Usuario</h5>
                        <input id="username" type="text" class="input form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                            name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input id="password" type="password"
                            class="input password form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <span class="show-pass" onclick="showPass()">
                        <i id="hide1" class="fas fa-eye"></i>
                        <i id="hide2" class="fas fa-eye-slash"></i>
                    </span>
                </div>
                <a class="link-form" href="{{ route('register') }}">Crear cuenta</a>
                <input type="submit" class="btn" value="Entrar" >
            </form>
        </div>
    </div>
    <script src="{{ asset('js/scripts/app.js') }}"></script>
</body>
@endsection
