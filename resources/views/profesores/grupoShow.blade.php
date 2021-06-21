@extends('layouts.index')

@section('content')
<div class="contenedor-nav nav-visible">
    <nav class="nav-dinamica">
        <div class="burger" onclick=navSlide()>
            <i class="fas fa-times burger-grupo" id="btn-nav"></i>
        </div>
        <div class="titulo-nav titulo-nav-grupo">
            <h2>Grupos</h2>
            <i class="fas fa-plus fa-2x fa-fw" title="Agregar grupo"></i>
        </div>
        <ul class="nav-links">
            @if(count($grupos) == 0)
            <div class="alert alert-dismissible text-center alert-dismissible" style="background-color:#ff9d16;" role="alert">
                No hay grupos registrados a su cargo.
            </div>
            @else
            @foreach($grupos as $key => $gru)
            <li onclick="window.location.href='{{ route('grupos.show', $gru->id) }}'"><a id="{{$gru->id}}"> {{ $gru->nombre }} </a></li>
            @endforeach
            @endif
        </ul>
    </nav>
    <div class="detalle-grupo">
        <div class="info-grupo">
            <input class="grupo-nombre" value="{{ $grupo->nombre ?? '' }}" readonly="readonly"></input>
            <div class="grupo-codigo">
                <h2>{{ $grupo->codigo }}</h2>
            </div>
            <div class="edicion-nombre">
                <a class="editar-nombre link-active" onclick="editarNombre()">editar nombre</a>
                <a class="guardar-nombre" href="#" onclick="guardarNombre({{$gru->id}})">guardar nombre</a>
            </div>
        </div>
        <div class="tabs">
            <div class="tab-header">
                <div class="active">
                    <i class="fas fa-users"></i><br> Grupo
                </div>
                <div>
                    <i class="fas fa-chart-bar"></i><br> Estadisticas
                </div>
            </div>
            <div class="tab-indicator"></div>
            <div class="tab-body">
                <div class="tab-content active">
                    <div>
                        <table class="alumnos-table">
                            <thead>
                                <th class="col">nombre</th>
                                <th class="col">usuario</th>
                                <th class="col">opciones</th>
                            </thead>
                            <tbody>
                                @foreach($alumnos as $key => $alu)
                                <tr class="active-row">
                                    <td>{{ $alu->nombre }}</td>
                                    <td>{{ $alu->username }}</td>
                                    <td class="detalles">
                                        <span id="abrir-stats"><i class="fas fa-chart-bar"></i>Stats</span>
                                        <span id="abrir-editar"><i class="fas fa-user-edit"></i>Editar</span>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-content">
                    <div>
                      <div class="contenedor-stats">
                        <div class="instrucciones">
                          <h2>Stats</h2>
                          En esta página podrás consultar información del grupo, como el promedio de puntajes y una proyección que muestra el progreso de los alumnos.
                          <ol>
                            <li>Selecciona la materia que desees consultar o aplica la consulta para el grupo entero sin distinguir entre materias.</li>
                            <li>Selecciona el porcentaje para acotar el número de registros a tomar en cuenta.</li>
                            <li>Si el porcentaje es igual o menor al 100%, se mostrarán resultados tomando en cuenta los registros existentes.</li>
                            <li>Si el porcentaje es mayor a 100%, se mostrará la predicción del promedio de puntajes de acuerdo al porcentaje ingresado.</li>
                          </ol>
                        </div>
                        <div class="separador"></div>
                        <div class="estadisticas">
                          <div class="regresiones">
                            <div class="reg-btn">
                              <h3>Materia</h3>
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
                                  <div>
                                      <button type="submit" class="btn btn-outline-primary btn-consultar">
                                        Consultar
                                      </button>
                                  </div>
                              </form>
                            </div>

                            <div class="reg-btn">
                              <h3>Grupo</h3>
                              <form id="SLR-form" action="{{ route('stats.SLR', 'profeGrupo') }}" method="POST">
                                @csrf
                                  <input type="hidden" name="grupo" value="{{ $grupo->id }}">
                                  {{ $grupo->nombre }}
                                  <select name="porcentaje">
                                      @for($i=0.05; $i<=1.01; $i+=0.05)
                                        <option value="{{ $i }}">{{ $i * 100 }}%</option>
                                      @endfor
                                      @for($i=1.5; $i<=10.00; $i+=0.50)
                                        <option value="{{ $i }}">{{ $i * 100 }}%</option>
                                      @endfor
                                  </select>
                                  <div>
                                      <button type="submit" class="btn btn-outline-primary btn-consultar">
                                        Consultar
                                      </button>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay">
        <div class="pop-up editar">
            <a href="#" class="cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Editar alumno</h3>
            <h4>Al dar click en "guardar" se modificará el registro del alumno</h4>
            <form action="" class="form-editar">
                <div class="form-editar">
                    <input type="text" placeholder="Nombre">
                    <input type="text" placeholder="Usuario">
                </div>
                <input type="submit" class="submit" value="Guardar">
            </form>
        </div>
        <div class="pop-up stats">
            <a href="#" class="cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Estadisticas alumno</h3>
            <h4>A continuación se muestran las estadisticas del alumno</h4>

        </div>
    </div>
</div>
<script src="{{ asset('js/scripts/side-nav.js') }}"></script>
<!--JS usado para vistas-->

<!--<div class="card shadow">
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
                        <br>
                        <a href="{{ route('stats.cKNN', $alu->id) }}" class="btn-outline-info bg-white"> Clasificación </a>
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
</div>-->
@endsection
