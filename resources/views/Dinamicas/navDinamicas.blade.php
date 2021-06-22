@extends('layouts.index')

@section('content')
<div class="contenedor-nav nav-visible">
    <nav class="nav-dinamica">
        <div class="burger" onclick=navSlide()>
            <i class="fas fa-times" id="btn-nav"></i>
        </div>
        <div class="titulo-nav">
            <h2>Dinamicas Recomendadas</h2>
        </div>
        <ul class="nav-links recomendaciones">
            @if(count($recomendaciones)==0)
              <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                No hay dinamicas registradas.
              </div>
            @else
              @foreach($recomendaciones as $key => $din)
                <li onclick="window.location.href='{{ route('dinamicas.show', $din[0]) }}'"><a class="materia recomendada"> {{ $din[1] }} </a></li>
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