@extends('layouts.index')

@section('content')
<br><br><br>
<div class="card shadow">
    <div class="card-header">{{ __('Inscribir alumno') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('alumnos.store') }}">
            @csrf

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Grupo</label>
                <div class="col-md-6">
                    <select name="grupo_id" class="form-control">
                        @foreach($grupos as $gru)
                        <option value="{{ $gru->id }}" {{ $gru->id == $grupo->id ? 'selected' : '' }}>
                            {{ $gru->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Nombre del alumno</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Nombre único<br>de ingreso</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="username" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('Inscribir') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
