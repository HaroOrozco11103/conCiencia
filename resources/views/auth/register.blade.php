@extends('layouts.index')

@section('content')
<br><br><br>
<head>
    <meta charset="UTF-8">
    <title>Registro Profesor</title>
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
            @if(isset($user))
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                <input type="hidden" name="_method" value="PATCH">
            @else
            <form method="POST" action="{{ route('register') }}">
            @endif
                @csrf

                <h2 class=title-registor-profe>Crear cuenta</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Nombre</h5>
                        <input type="text" class="input" name="nombre" value="{{ $user->nombre ?? '' }}" required autofocus>
                    </div>
                </div>

                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input id="username" type="text"
                            class="input form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                            value="{{ $user->username ?? '' }}" required autofocus>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="input-div three">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="email" type="email"
                            class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ $user->email ?? '' }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                @if(!isset($user))
                <div class="input-div four">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input id="password" type="password"
                            class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
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

                <div class="input-div five">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirmar contraseña</h5>
                        <input id="password-confirm" type="password" class="input" name="password_confirmation"
                            required>
                    </div>
                    <span class="show-pass" onclick="showCheckPass()">
                        <i id="hide1-check" class="fas fa-eye"></i>
                        <i id="hide2-check" class="fas fa-eye-slash"></i>
                    </span>
                </div>
                @endif

                @if(isset($user))
                <div class="form-group">
                    <a class="btn-outline-info bg-white" href="{{ route('users.editPsw', $user->id) }}">Modificar contraseña</a>
                </div>
                @endif

                <button type="submit" class="btn">
                    @if(isset($user))
                      {{ __('Actualizar') }}
                    @else
                      {{ __('Crear Cuenta') }}
                    @endif
                </button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/scripts/app.js') }}"></script>
</body>
@endsection
