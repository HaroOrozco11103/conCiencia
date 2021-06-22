@extends('layouts.index')

@section('content')
<img src="{{ asset('images/img/wave-2.png') }}" alt="" class="wave">
<div class="container">
    <div class="img">
        <img src="{{ asset('images/img/teacher.png') }}" alt="">
    </div>
    <div class="contenedor-form">
        <form method="POST" action="{{ route('users.updatePsw', $user->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf

            <h2 class=title-registor-profe>Cambiar contraseña</h2>

            <div class="input-div four">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Contraseña anterior</h5>
                    <input id="oldPassword" type="password" class="input" name="oldPassword">
                </div>
                <span class="show-pass" onclick="showPass()">
                    <i id="hide1" class="fas fa-eye"></i>
                    <i id="hide2" class="fas fa-eye-slash"></i>
                </span>
            </div>

            <div class="input-div four">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Contraseña nueva</h5>
                    <input id="password" type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
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
                    <h5>Confirmar nueva contraseña</h5>
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                </div>
                <span class="show-pass" onclick="showCheckPass()">
                    <i id="hide1-check" class="fas fa-eye"></i>
                    <i id="hide2-check" class="fas fa-eye-slash"></i>
                </span>
            </div>

            <button type="submit" class="btn">Modificar contraseña</button>
        </form>
    </div>
</div>
@endsection