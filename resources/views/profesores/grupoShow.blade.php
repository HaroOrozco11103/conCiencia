@extends('layouts.index')

@section('content')
<div class="contenedor-nav nav-visible">
    <nav class="nav-dinamica">
        <div class="burger" onclick=navSlide()>
            <i class="fas fa-times burger-grupo" id="btn-nav"></i>
        </div>
        <div class="titulo-nav titulo-nav-grupo">
            <h2>Grupos</h2>
            <div><i class="fas fa-plus fa-2x fa-fw" title="Agregar grupo" onclick="btnAbrirPopupCrear()"></i></div>
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
            <div class="">
                <a class="" onclick="btnAbrirPopupInscribir()">Inscribir alumno</a>
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
                                <th class="col">nombre único<br>de ingreso</th>
                                <th class="col">opciones</th>
                            </thead>
                            <tbody>
                                @foreach($alumnos as $key => $alu)
                                <tr class="active-row">
                                    <td>{{ $alu->nombre }}</td>
                                    <td>{{ $alu->username }}</td>
                                    <td class="detalles">
                                        <span id="abrir-stats" onclick="btnAbrirPopupStats({{$alu->id}}, '{{$alu->nombre}}')"><i class="fas fa-chart-bar"></i>Stats</span>
                                        <span id="abrir-editar" onclick="btnAbrirPopupEditar({{$alu->id}}, '{{$alu->nombre}}', '{{$alu->username}}')"><i class="fas fa-user-edit"></i>Editar</span>
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
    <div class="overlay-crear overlay">
        <div class="pop-up-crear pop-up">
        <a href="#" class="cerrar-popup-crear cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Crear grupo</h3>
            <form class="form-editar" method="POST" action="{{ route('grupos.store') }}">
              @csrf
              <div class="form-editar">
                <label>Nombre del grupo</label>
                <input class="nom-grupo-popup" type="text" name="nombre" required>
                <br>
                <label>Código del grupo</label>
                <input class="cod-grupo-popup" type="text" name="codigo" required>
              </div>
              <input type="submit" class="submit" value="Crear grupo">
            </form>
        </div>
    </div>
    <div class="overlay-inscribir overlay">
        <div class="pop-up-inscribir pop-up">
        <a href="#" class="cerrar-popup-inscribir cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Inscribir alumno</h3>
            <form class="form-editar" method="POST" action="{{ route('alumnos.store') }}">
              @csrf
              <div class="form-editar">
                <select name="grupo_id">
                    @foreach($grupos as $gru)
                    <option value="{{ $gru->id }}" {{ $gru->id == $grupo->id ? 'selected' : '' }}>
                        {{ $gru->nombre }}</option>
                    @endforeach
                </select>
                <label>Nombre del alumno</label>
                <input class="nom-grupo-popup" type="text" name="nombre" required>
                <br>
                <label>Nombre único de ingreso</label>
                <input class="cod-grupo-popup" type="text" name="username" required>
              </div>
              <input type="submit" class="submit" value="Inscribir grupo">
            </form>
        </div>
    </div>
    <div class="overlay-editar overlay">
        <div class="pop-up-editar pop-up">
        <a href="#" class="cerrar-popup-editar cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Editar alumno</h3>
            <form class="form-editar" method="POST" action="{{ route('alumnos.update', $grupo->id) }}">
              <input type="hidden" name="_method" value="PATCH">
              @csrf
              <div class="form-editar">
                <input class="idAlu-popup" type="hidden" name="idAlu">
                <select name="grupo_id">
                    @foreach($grupos as $gru)
                    <option value="{{ $gru->id }}" {{ $gru->id == $grupo->id ? 'selected' : '' }}>
                        {{ $gru->nombre }}</option>
                    @endforeach
                </select>
                <label>Nombre del alumno</label>
                <input class="nomAlu-popup" type="text" name="nombre" required>
                <br>
                <label>Nombre único de ingreso</label>
                <input class="unAlu-popup" type="text" name="username" required>
              </div>
              <input type="submit" class="submit" value="Modificar alumno">
            </form>
        </div>
    </div>
    <div class="overlay-stats overlay">
        <div class="pop-up-stats pop-up">
        <a href="#" class="cerrar-popup-stats cerrar-popup"><i class="fas fa-times"></i></a>
        <!-- <a href="" class="btn-outline-info bg-white"> Clasificación </a> -->
            <div class="">
              <div class="instrucciones">
                <h2>Stats</h2>
                <div>
                  <button type="submit" class="btn btn-outline-primary" onclick="clasificarAlumno()">
                    Clasificar alumno
                  </button>
                  <div class="nom-alu-clasf"></div>
                </div>
                <br><br>
                En esta página podrás consultar información del alumno seleccionado, como el promedio de puntajes y una proyección que muestra su progreso.
                <ol>
                  <li>Selecciona la materia que desees consultar o aplica la consulta para el alumno sin distinguir entre materias.</li>
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
                    <form method="POST" action="{{ route('stats.SLR', 'profeAlumnoMateria') }}">
                      @csrf
                        <input class="idAluStatsMat-popup" type="hidden" name="alumno">
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
                    <h3>Alumno</h3>
                    <form id="SLR-form" action="{{ route('stats.SLR', 'profeAlumno') }}" method="POST">
                      @csrf
                        <input class="idAluStats-popup" type="hidden" name="alumno">
                        <input class="nomAluStats-popup" type="text" readonly="readonly">
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
<script src="{{ asset('js/scripts/side-nav.js') }}"></script>
@endsection
