@extends('layouts.index')

@section('content')
<br><br><br>
<div class="card shadow">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Grupos</th>
                </tr>
            </thead>
            <tbody>
              @if(count($grupos) == 0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  No hay grupos registrados a su cargo.
                </div>
              @else
                @foreach($grupos as $key => $gru)
                <tr>
                    <td>
                        <a href="{{ route('grupos.show', $gru->id) }}" class="btn-outline-info bg-white"> {{ $gru->nombre }} </a>
                    </td>
                </tr>
                @endforeach
                <th>
                  <tr>
                    <td>
                      <a href="{{ route('grupos.create') }}" class="btn-outline-info bg-white"> Crear grupo </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="{{ route('users.show', $profeId) }}" class="btn-outline-info bg-white"> Perfil </a>
                    </td>
                  </tr>
                </th>
              @endif
            </tbody>
        </table>
    </div>
    <br>
</div>
@endsection
