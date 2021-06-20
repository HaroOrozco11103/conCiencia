@extends('layouts.index')

@section('content')
<div class="contenedor-nav nav-oculta">
    <nav class="nav nav-dinamicas">
        <div class="burger">
            <i class="fas fa-bars boton" id="btn"></i>
        </div>
        <div class="titulo-nav nav-active">
            <h2>Dinamicas</h2>
        </div>
        <ul class="nav-links nav-active">
            @if(count($recomendaciones)==0)
              <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                No hay dinamicas registradas.
              </div>
            @else
              @foreach($recomendaciones as $key => $din)
                <li><a href="{{ route('dinamicas.show', $din[0]) }}" class="btn-outline-info bg-white"> {{ $din[1] }} </a></li>
              @endforeach
            @endif
        </ul>
    </nav>
    <div>
      @yield('dinamica')
    </div>
</div>

<script src="{{ asset('js/scripts/side-nav.js') }}"></script> <!--JS usado para vistas-->
@endsection