    <!-- Navbar Code -->

    <nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('courses.index') }}">Tutor UTVT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disabled">UTVT - Universidad Tecnologica del Valle de Toluca</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @auth
                        <a class="btn btn-dark" href="{{ route('dashboard') }}">Ir al panel</a>
                    @endauth
                    @guest
                        @if (Request::is('login'))
                            <a class="btn btn-dark" href="{{ route('register') }}">Registrate aquí</a>
                        @else
                            <a class="btn btn-dark" href="{{ route('login') }}">Iniciar sesión</a>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- End Navbar Code -->
