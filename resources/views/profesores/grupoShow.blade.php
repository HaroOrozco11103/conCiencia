@extends('layouts.index')

@section('content')
<br><br><br>
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
@endsection
