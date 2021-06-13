@extends('layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">{{ $grupo->codigo }}</div>
    <div class="card-header">
        <a class="btn btn-link" href="{{ route('alumnos.create', $grupo->id) }}"> Inscribir alumno </a>
    </div>

    <div class="card-body">
        <form method="POST" id="changeName" action="{{ route('grupos.update', $grupo->id) }}">
          <input type="hidden" name="_method" value="PATCH">
          @csrf
            <input type="text" class="form-control" name="nombre" value="{{ $grupo->nombre ?? '' }}" required autofocus>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-outline-primary">
              Guardar nombre
            </button>
        </div>
    </div>

    </form>
</div>

<br><br><br>

<div class="card shadow">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Username </th>
                    <th scope="col"> Fecha<br>de ingreso </th>
                    <th scope="col"> Opciones </th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $key => $alu)
                <tr>
                    <td>{{ $alu->nombre }}</td>
                    <td>{{ $alu->username }}</td>
                    <td>{{ $alu->created_at }}</td>
                    <td>
                        <a href="{{ route('alumnos.show', $alu->id) }}" class="btn-outline-info bg-white"> Detalles </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
</div>

<br><br><br>

<div class="card shadow">
  <div class="card-header">
    <p>
      <form id="SLR-form" action="{{ route('stats.SLR', 'profeGrupo') }}" method="POST">
        @csrf
          <input type="hidden" name="grupo" value="{{ $grupo->id }}">
          <select name="porcentaje">
              @for($i=0.05; $i<=1.01; $i+=0.05)
                <option value="{{ $i }}">{{ $i * 100 }}%</option>
              @endfor
              @for($i=1.5; $i<=10.00; $i+=0.50)
                <option value="{{ $i }}">{{ $i * 100 }}%</option>
              @endfor
          </select>
      </form>
      <a class="btn btn-link" href="{{ route('stats.SLR', 'profeGrupo') }}" onclick="event.preventDefault(); document.getElementById('SLR-form').submit();">
        Ver progreso
      </a>
    </p>
  </div>
  <div class="card-header">
    <div class="card-header">Materia</div>
    <form method="POST" action="{{ route('stats.SLR', 'profeGrupoMateria') }}">
      @csrf
        <input type="hidden" name="grupo" value="{{ $grupo->id }}">
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
              Ver progreso
            </button>
        </div>
    </form>
  </div>
</div>
@endsection
