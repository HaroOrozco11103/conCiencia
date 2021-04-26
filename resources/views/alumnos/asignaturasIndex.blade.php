@extends('layouts.index')

@section('content')
<div class="card shadow">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Materia</th>
                </tr>
            </thead>
            <tbody>
              @if(count($asignaturas)==0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  No hay asignaturas registradas.
                </div>
              @else
                @foreach($asignaturas as $key => $asi)
                <tr>
                    <td>
                        <a href="{{ route('dinamicas.juego', $asi->id) }}" class="btn-outline-info bg-white"> {{ $asi->nombre }} </a>
                    </td>
                </tr>
                @endforeach
              @endif
            </tbody>
        </table>
    </div>
    <br>
</div>
@endsection
