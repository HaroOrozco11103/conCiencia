@extends('layouts.index')

@section('content')
    <img src="{{ asset('images/img/wave.png') }}" alt="" class="wave">
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/img/classroom.png') }}" alt="">
        </div>
        <div class="contenedor-form">
            <form method="POST" action="{{ route('grupos.autenticar') }}">
                @csrf
                <h2 class=title-entrar-grupo>Entrar a un grupo</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Nombre</h5>
                        <input type="text" class="input" name="nombre" required>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="div">
                        <h5>Código de Grupo</h5>
                        <input type="text" class="input" name="codigo" required>
                    </div>
                </div>
                <a class="link-form" href="{{ route('login') }}">Soy un profesor</a>
                <input type="submit" class="btn" value="Entrar" >

                @if (session('mensaje'))
                    <div class="alert alert-danger">
                        {{ session('mensaje') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
