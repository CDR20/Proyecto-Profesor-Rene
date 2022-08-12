<header>
    {{-- Navbar Escritorio --}}
    <nav id="navbar-desktop" class="d-none d-lg-flex py-2 position-relative">

        <a href="{{ route('index') }}"
            class="text-decoration-none ps-5 pt-2 text-white fw-bold fs-2 fst-italic"> <span
                class="text-secundario fst-italic">D</span><span class="text-secundario fst-italic">R</span> Muebles
            "Di-Ro"</a>

        <ul id="navbar--menu-desktop">
            @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="py-1 px-2 fs-4">
                        Inicio
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('index') }}" class="py-1 px-2 fs-4">
                        Inicio
                    </a>
                </li>
            @endauth

            @auth
                <li class="position-relative">
                    <a href="{{ route('clients.index') }}" class="py-1 px-2 fs-4">Clientes</a>
                <li>
                @endauth

                @auth
                    @if (Auth::user()->role === 'ADMIN')
                <li class="position-relative">
                    <a href="{{ route('users.index') }}" class="py-1 px-2 fs-4">Operadores</a>
                <li>
                    @endif
                @endauth


                @auth
                    @if (Auth::user()->role === 'ADMIN')
                <li class="position-relative">
                    <a href="{{ route('providers.index') }}" class="py-1 px-3 fs-4">Proveedores</a>
                </li>
                @endif
            @endauth

            @auth
                <li class="position-relative">
                    <a href="{{ route('products.index') }}" class="py-1 px-2 fs-4">Productos</a>
                <li>
            @endauth

            @auth
                <li class="position-relative">
                    <a href="{{ route('sales.index') }}" class="py-1 px-2 fs-4">Ventas</a>
                <li>
            @endauth
        </ul>

        @auth
            <div class="ms-auto">
                <button class="cart-button btn btn-light me-3 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <span class="badge bg-danger mb-0" id="badge-cart-desktop"></span>
                </button>
                <div class="cart p-3" id="cart">
                    <table class="border border-2 border-primario w-100 text-center h-100 fs-5" id="cart-list">
                        <thead>
                            <th>Producto</th>
                            <th>Pz</th>
                            <th>Subtotal</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody class="center"></tbody>
                        <tfoot>
                            <button class="btn btn-light w-100 fs-5 fw-bold my-1" id="empty-cart">Vaciar Carrito</button>
                            <button class="btn btn-info w-100 fs-5 fw-bold my-1 text-white" id="go-to-payment">Proceder a Pago</button>
                        </tfoot>
                    </table>
                    <h6 id="cart-total" class="fw-bold fs-5 text-center text-success mt-3">Total: $500</h6>
                </div>
            </div>
            <div class="pe-5 pt-3 text-white fs-4 mb-0">
                <span class="me-3">
                    {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" class="d-inline" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" id="logout-button">
                        <span>Cerrar Sesión</span>
                        <img src="{{ asset('assets/icons/box-arrow-left.svg') }}" alt="left-icon">
                    </button>
                </form>
            </div>
        @else
            <div class="ms-auto text-white fs-4 mb-0 mt-1">
                <a href="{{ route('login') }}" class="btn btn-primary fs-5 btn-lg">Iniciar Sesion</a>
            </div>
            <div class="me-3 ms-3 text-white fs-4 mb-0 mt-1">
                <a href="{{ route('register') }}" class="btn btn-info text-white fs-5 btn-lg">Registrarse</a>
            </div>
        @endauth
    </nav>

    <nav class="navbar navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        @auth
            <div class="ms-3 mt-3">
                <button class="cart-button btn btn-light me-3 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </button>
                <div class="cart p-3" id="cart">
                    <table class="border border-2 border-primario w-100 text-center h-100 fs-5" id="cart-list">
                        <thead>
                            <th>Producto</th>
                            <th>Pzs.</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody class="text-start"></tbody>
                        <tfoot>
                            <button class="btn btn-light w-100 fs-5 fw-bold" id="empty-cart">Vaciar Carrito</button>
                            <form action="{{ route('sales.create') }}" method="POST" id="payment-form">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-info w-100 fs-5 fw-bold my-1 text-white btn-pay" id="go-to-payment">Proceder a Pago</button>
                            </form>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="pe-5 pt-3 text-white fs-4 mb-0">
                <span class="me-3">
                    {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" class="d-inline" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" id="logout-button-desktop" class="btn">
                        <span>Cerrar Sesión</span>
                        <img src="{{ asset('assets/icons/box-arrow-left.svg') }}" alt="left-icon">
                    </button>
                </form>
            </div>
        @else
            <div class="ms-auto text-white fs-4 mb-0 mt-1">
                <a href="{{ route('login') }}" class="btn btn-primary fs-5 btn-lg">Iniciar Sesion</a>
            </div>
            <div class="me-3 ms-3 text-white fs-4 mb-0 mt-1">
                <a href="{{ route('register') }}" class="btn btn-info text-white fs-5 btn-lg">Registrarse</a>
            </div>
        @endauth
    </nav>
    <div class="collapse d-lg-none" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <ul id="d-flex flex-column justify-content-center align-items-center">
                @auth
                    <li class="position-relative">
                        <a href="{{ route('clients.index') }}"
                            class="py-1 px-2 text-decoration-none text-white fw-bold fs-3 text-center w-100 d-block">Clientes</a>
                    <li>
                    @endauth

                    @auth
                        @if (Auth::user()->role === 'ADMIN')
                    <li class="position-relative">
                        <a href="{{ route('users.index') }}"
                            class="py-1 px-2 text-decoration-none text-white fw-bold fs-3 text-center w-100 d-block">Operadores
                        </a>
                    <li>
                        @endif
                    @endauth

                    @auth
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="py-1 px-2 my-2 text-decoration-none text-white fw-bold fs-3 text-center w-100 d-block">
                            Inicio
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('index') }}"
                            class="py-1 px-2 my-2 text-decoration-none text-white fw-bold fs-3 text-center w-100 d-block">
                            Inicio
                        </a>
                    </li>
                @endauth

                @auth
                    @if (Auth::user()->role === 'ADMIN')
                        <li class="position-relative">
                            <a href="{{ route('providers.index') }}"
                                class="py-1 px-3 my-2 text-decoration-none text-white fw-bold fs-3 text-center w-100 d-block">Proveedores</a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->role === 'ADMIN')
                        <li class="position-relative">
                            <a href="{{ route('products.index') }}"
                                class="py-1 px-2 my-2 text-decoration-none text-white fw-bold fs-3 text-center w-100 d-block">Productos</a>
                        <li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</header>
