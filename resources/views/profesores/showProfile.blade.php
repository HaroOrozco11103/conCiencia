@extends('layouts.index')

@section('content')
<br><br><br>
<div class="card shadow">
    <div class="card-header">Mi perfil</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo<br>electrónico</th>
                    <th scope="col">Nombre<br>de usuario</th>
                    <th scope="col">Fecha<br>de creación</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->created_at }}</td>
                    <th>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
