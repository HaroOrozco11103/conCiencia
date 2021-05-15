@extends('layouts.index')

@section('content')
<div class="card shadow">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Dinamicas</th>
                </tr>
            </thead>
            <tbody>
              @if(count($dinamicas)==0)
                <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                  No hay dinamicas registradas.
                </div>
              @else
                @foreach($dinamicas as $key => $din)
                <tr>
                    <td>
                        <a href="{{ route('dinamicas.show', $din->id) }}" class="btn-outline-info bg-white"> {{ $din->nombre }} </a>
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
