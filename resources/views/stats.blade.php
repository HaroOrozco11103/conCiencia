@extends('layouts.index')

@section('content')
<br>
<div class="card shadow">

    <div class="form-group row mb-0">
        <div class="card-header">Materia</div>
        <form method="POST" action="{{ route('stats.SLR', ['globalMateria', 1, 0]) }}">
          @csrf
            <select name="matSelect">
                @foreach($materias as $key => $mat)
                  <option value="{{ $mat->id }}">{{ $mat->nombre }}</option>
                @endforeach
            </select>
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-primary">
                  Entrar
                </button>
            </div>
        </form>
    </div>

    <br><br>

    <div class="form-group row mb-0">
        <div class="card-header">Tipo de dinámica</div>
        <form method="POST" action="{{ route('stats.SLR', ['globalTipoDinamica', 1, 0]) }}">
          @csrf
            <select name="tipoDinSelect">
                @foreach($tipoDinamicas as $key => $tDin)
                  <option value="{{ $tDin->nombre }}">{{ $tDin->nombre }}</option>
                @endforeach
            </select>
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-primary">
                  Entrar
                </button>
            </div>
        </form>
    </div>

    <br><br>

    <div class="form-group row mb-0">
        <div class="card-header">Dinámica específica</div>
        <form method="POST" action="{{ route('stats.SLR', ['globalDinamicaEspecifica', 1, 0]) }}">
          @csrf
            <select name="dinSelect">
                @foreach($dinamicas as $key => $din)
                  <option value="{{ $din->id }}">{{ $din->nombre }} - {{ $din->aNombre }}</option>
                @endforeach
            </select>
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-primary">
                  Entrar
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
