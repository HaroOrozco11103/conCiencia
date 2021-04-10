@extends('layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">{{ __('Entrar a un grupo') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('grupos.autenticar') }}">
            @csrf

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Código de grupo</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="codigo" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('ENTRAR!') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
