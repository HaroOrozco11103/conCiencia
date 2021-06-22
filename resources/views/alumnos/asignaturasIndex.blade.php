@extends('layouts.index')

@section('content')
<div class="background">
  <div class="contenedor-materias" id="contenedor-materias">
    @if(count($asignaturas)==0)
    <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
      No hay asignaturas registradas.
    </div>
    @else
    @foreach($asignaturas as $key => $asi)
    <div class="materia" onclick="window.location.href='{{ route('asignaturas.show', $asi->id) }}'">{{ $asi->nombre }}
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection