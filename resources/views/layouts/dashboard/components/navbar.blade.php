<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->getMedia('profiles')->last()? Auth::user()->getMedia('profiles')->last()->getUrl(): 'https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg' }}"
                        alt="Descripción de la imagen" class="rounded-circle" width="50" height="50">
                    <span class="text-dark fw-bold">{{ Auth::user()->full_name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('profiles.index')}}"><i class="align-middle me-1"
                            data-feather="user"></i> Mi perfil</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post" id="logout-formNavbar">
                        @csrf
                        <a class="dropdown-item" href="javascript:;" id="logout-linkNavbar">
                            <i class="align-middle me-1" data-feather="log-out"></i> Cerrar sesión
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    const logoutLinkNavbar = document.getElementById('logout-linkNavbar');
    const logoutFormNavbar = document.getElementById('logout-formNavbar');

    logoutLinkNavbar.addEventListener('click', () => {
        logoutFormNavbar.submit();
    });
</script>
