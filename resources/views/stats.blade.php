@extends('layouts.index')

@section('content')
<br>
<div class="card shadow">

    <div class="form-group row mb-0">
        <div class="card-header">Materia</div>
        <form method="POST" action="{{ route('stats.SLR', 'globalMateria') }}">
          @csrf
            <select name="matSelect">
                @foreach($materias as $key => $mat)
                  <option value="{{ $mat->id }}">{{ $mat->nombre }}</option>
                @endforeach
            </select>
            <select name="porcentaje">
                @for($i=0.05; $i<=1.01; $i+=0.05)
                  <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
                @for($i=1.5; $i<=10.00; $i+=0.50)
                  <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
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
        <form method="POST" action="{{ route('stats.SLR', 'globalTipoDinamica') }}">
        <!--<form method="POST" action="{{ route('stats.SLR', ['globalTipoDinamica', 1, 0]) }}">-->
          @csrf
            <select name="tipoDinSelect">
                @foreach($tipoDinamicas as $key => $tDin)
                  <option value="{{ $tDin->nombre }}">{{ $tDin->nombre }}</option>
                @endforeach
            </select>
            <select name="porcentaje">
                @for($i=0.05; $i<=1.01; $i+=0.05)
                  <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
                @for($i=1.5; $i<=10.00; $i+=0.50)
                  <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
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
        <form method="POST" action="{{ route('stats.SLR', 'globalDinamicaEspecifica') }}">
          @csrf
            <select name="dinSelect">
                @foreach($dinamicas as $key => $din)
                  <option value="{{ $din->id }}">{{ $din->nombre }} - {{ $din->aNombre }}</option>
                @endforeach
            </select>
            <select name="porcentaje">
                @for($i=0.05; $i<=1.01; $i+=0.05)
                  <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
                @for($i=1.5; $i<=10.00; $i+=0.50)
                  <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
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
