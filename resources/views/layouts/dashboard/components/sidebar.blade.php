<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand d-flex justify-content-center" href="index.html">
           <img src="https://appcore.trymyride.co/images/tmr-logo.svg" alt="" class="w-75">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menú
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{URL::to('/')}}">
                    <span class="iconify" data-icon="solar:home-bold-duotone" data-width="25"></span>  <span class="align-middle">Inicio</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                    <span class="iconify" data-icon="solar:map-point-wave-bold-duotone" data-width="25"></span>  <span class="align-middle">Mapas</span>
                </a>
            </li>

            <li class="sidebar-header">
                Utilidades
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-in.html">
                    <span class="iconify" data-icon="solar:user-bold-duotone" data-width="25"></span> <span class="align-middle">Mi perfil</span>
                </a>
            </li>

            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                    <a class="sidebar-link" href="javascript:;" id="logout-link">
                        <span class="iconify" data-icon="solar:logout-3-bold-duotone" data-width="25"></span> <span
                            class="align-middle">Cerrar sesión</span>
                    </a>
                </form>
            </li>

    </div>
</nav>

<script>
    const logoutLink = document.getElementById('logout-link');
    const logoutForm = document.getElementById('logout-form');

    logoutLink.addEventListener('click', () => {
        localStorage.removeItem('modalOpened');
        logoutForm.submit();
    });
</script>
