@extends('layouts.index')

@section('content')
    <img src="{{ asset('images/img/wave-2.png') }}" alt="" class="wave">
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/img/teacher.png') }}" alt="">
        </div>
        <div class="contenedor-form">
            @if(isset($user))
            <form class="form-log" method="POST" action="{{ route('users.update', $user->id) }}">
                <input type="hidden" name="_method" value="PATCH">
            @else
            <form class="form-log" method="POST" action="{{ route('register') }}">
            @endif
                @csrf

                @if(isset($user))
                <h2 class=title-registor-profe>Actualizar datos</h2>
                @else
                <h2 class=title-registor-profe>Crear cuenta</h2>
                @endif

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" placeholder="Nombre" class="input" name="nombre" value="{{ $user->nombre ?? '' }}" required autofocus>
                    </div>
                </div>

                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="div">
                        <input id="username" type="text" placeholder="Usuario"
                            class="input {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
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
                        <input id="email" type="email" placeholder="Email"
                            class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
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
                        <input id="password" type="password" placeholder="Contraseña"
                            class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
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
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Confirmar contraseña"
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
@endsection
