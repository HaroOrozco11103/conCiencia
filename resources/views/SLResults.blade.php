@extends('layouts.index')

@section('content')
<div class="card shadow">
    @foreach($regLin as $key => $SLR)
      <div class="card-header">{{ $SLR["nombre"] }}: {{ $SLR["resultado"] }}</div>
      <br>
    @endforeach
</div>
@endsection
