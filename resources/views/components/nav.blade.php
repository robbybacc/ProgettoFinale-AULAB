<header class="mb-4 fixed-top">
    <div class="p-3 text-center border-bottom-white navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div
                    class="col-md-5 d-flex justify-content-center justify-content-md-start align-items-center d-none d-lg-flex">
                    <form action="{{ route('article.search') }}" method="GET"
                        class="d-flex input-group w-auto my-auto mb-3 mb-md-0" role="search">
                        <input type="search" class="form-control rounded mx-3 me-2" name="query" placeholder="Search"
                            aria-label="Search" />
                        <button class="btn btn-outline-primary input-group-text d-none d-lg-flex rounded"
                            type="submit"><i class="fas fa-search"></i></span>
                    </form>
                </div>
                <!-- Center elements -->
                <div class="col-md-2 d-none d-lg-block">
                    <a href="#!" class="ms-md-2">
                        <img src="/img/logo2.png" class="imgLogo" height="40" width="115" />
                    </a>
                </div>
                <!-- Center elements -->

                <!-- Right elements -->
                <div class="col-lg-5 d-flex justify-content-center justify-content-md-end align-items-center">
                    {{-- <a class="text-reset me-3" href="#"> --}}
                    {{-- <i class="fas fa-plus"></i> --}}
                    {{-- </a> --}}
                    {{-- <a class="text-reset me-3" href="#"> --}}
                    {{-- <i class="fas fa-info-circle"></i> --}}
                    {{-- </a> --}}


                    <!-- Utente loggato -->
                    <div class="dropdown">
                        @auth
                            <li class="nav-item linkLogout dropdown">
                                <a class="nav-link active dropdown-toggle mx-3" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Ciao, {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    @if (Auth::user()->is_admin)
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                                Dashboard dell'Amministratore
                                            </a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->is_revisor)
                                        <li>
                                            <a href="{{ route('revisor.dashboard') }}" class="dropdown-item">
                                                Dashboard del Revisore
                                            </a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->is_writer)
                                        <li>
                                            <a href="{{ route('writer.dashboard') }}" class="dropdown-item">
                                                Dashboard del Redattore
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item linkLogout">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn text-danger mx-5">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg borderCustom colorCover d-none d-lg-block">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli
                            articoli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('careers') }}">Lavora con noi</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('article.create') }}">Inserisci un articolo</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>