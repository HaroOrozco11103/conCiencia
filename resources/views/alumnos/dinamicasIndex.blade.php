@extends('layouts.index')

@section('content')
<div class="contenedor-materias" id="contenedor-materias">
  @if(count($dinamicas)==0)
    <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
    No hay dinamicas registradas.
    </div>
  @else
    @foreach($dinamicas as $key => $din)
      <div class="materia">
        <a href="{{ route('dinamicas.show', $din->id) }}"> {{ $din->nombre }} </a>
      </div>
    @endforeach
  @endif
</div>
@endsection
