@extends('layouts.index')

@section('content')
<head>
    <meta charset="UTF-8">
    <title>Dinamicas</title>
    <link rel="stylesheet" href="{{ asset('css/style/style.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Recursive" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
    <div class="contenedor nav-oculta">
        <nav class="nav nav-dinamicas">
            <div class="burger">
                <i class="fas fa-bars" id="btn"></i>
            </div>
            <div class="titulo-nav nav-active">
                <h2>Dinamicas</h2>
            </div>
            <ul class="nav-links nav-active">
                @if(count($dinamicas)==0)
                  <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                    No hay dinamicas registradas.
                  </div>
                @else
                  @foreach($dinamicas as $key => $din)
                    <li><a href="{{ route('dinamicas.show', $din->id) }}" class="btn-outline-info bg-white"> {{ $din->nombre }} </a></li>
                  @endforeach
                @endif
            </ul>
        </nav>
        <div class="dinamica">
            *dinamica aqui*
        </div>
    </div>
    <script src="{{ asset('js/scripts/app.js') }}"></script>
</body>
@endsection
