<!-- Authentication Links -->
@guest
    
@else
    <div class="nav-item nav-links-profe dropdown">
        <a class="dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user fa-fw"></i>{{ Auth::user()->nombre }}
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href=" {{ route('users.show', Auth::user()->username) }}">Perfil</a>
            <a class="dropdown-item" href=" {{ route('grupos.entrar') }}">Grupos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}">
            {{ __('Cerrar Sesión') }}
            </a>
        </div>
    </div>
@endguest
