@extends('layouts.index')

@section('content')
<br><br><br>
<div class="card shadow">
    <div class="card-header">{{ __('Agregar usuario') }}</div>

    <div class="card-body">
        @if(isset($user))
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            @else
            <form method="POST" action="{{ route('register') }}">
                @endif
                @csrf

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nombre" value="{{ $user->nombre ?? '' }}" required
                            autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="username"
                        class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>
                    <div class="col-md-6">
                        <input id="username" type="text"
                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                            value="{{ $user->username ?? '' }}" required autofocus>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                        class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ $user->email ?? '' }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                @if(!isset($user))
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                        {{ __('Confirmar Contraseña') }}
                    </label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>
                @endif

                @if(isset($user))
                <div class="form-group">
                    <a class="btn-outline-info bg-white" href="{{ route('users.editPsw', $user->id) }}">Modificar contraseña</a>
                </div>
    </div>
    @endif

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-outline-primary">
                @if(isset($user))
                  {{ __('Actualizar') }}
                @else
                  {{ __('Crear Cuenta') }}
                @endif
            </button>
        </div>
    </div>

    </form>
</div>
@endsection
