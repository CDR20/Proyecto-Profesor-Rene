@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="container-fluid mt-3 p-3 w-75 mx-auto" id="main-content-home">
        <div class="row w-100 rounded align-items-center justify-content-around mx-auto">
            <div class="col-12">
                <a href="{{ route('index') }}"
                    class="text-center py-5 border-bottom border-3 border-cuaternario text-center d-block w-100 mb-2 fs-1 text-primario text-decoration-none fw-bold fst-italic">
                    <span class="text-secundario fst-italic">D</span><span class="text-secundario fst-italic">R</span> Muebles
                    "Di-Ro"</a>
            </div>

            <div class="col-12 col-md-5 my-3 shadow-lg rounded bg-light">
                <div class="text-center rounded-pill bg-warning mx-auto icon-container mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                    </svg>
                </div>
                <h3 class="bg-primario text-white rounded fw-bold fs-2 text-center p-2">¿Quienes Somos?</h3>
                <p class="text-center fs-3 mt-2">Somos un empresa mexicana integrada por un equipo familiar que trabaja en
                    conjunto con el objetivo de satisfacer las necesidades de amueblamiento de hogares, ofreciendo
                    soluciones integrales a sus espacios.</p>
            </div>

            <div class="col-12 col-md-5 my-3 shadow-lg rounded bg-light">
                <div class="text-center rounded-pill bg-warning mx-auto icon-container mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>
                </div>
                <h3 class="bg-primario text-white rounded fw-bold fs-2 text-center p-2">¿A que nos dedicamos?</h3>
                <p class="text-center fs-3 mt-2">Muebles Di-Ro ofrece el servicio de venta de productos como; recamaras,
                    roperos, vitrinas, comedores, salas y electrodomesticos de una forma donde los clientes pueden elegir la
                    forma de compra.
                </p>
            </div>

            <div class="col-12 my-3 shadow-lg rounded bg-light">
                <div class="text-center rounded-pill bg-warning mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-clock-history" viewBox="0 0 16 16">
                        <path
                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                        <path
                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </div>
                <h3 class="bg-cuaternario text-white rounded fw-bold fs-2 text-center p-2">Galeria</h3>


                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/muebles1.jpg') }}" class="d-block w-100" width="600px" height="400px"
                                alt="mueble-1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/muebles2.jpg') }}" class="d-block w-100" width="600px" height="400px"
                                alt="mueble-2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/muebles3.jpg') }}" class="d-block w-100" width="600px" height="400px"
                                alt="mueble-3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-5 my-3 shadow-lg rounded bg-light">
                <div class="text-center rounded-pill bg-warning mx-auto icon-container mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-bullseye" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                        <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                </div>
                <h3 class="bg-primario text-white rounded fw-bold fs-2 text-center p-2">Mision</h3>
                <p class="text-center fs-3 mt-2">Brindar las mejores soluciones a las necesidades de amueblamiento,
                    desarrollando, fabricando e innovando el mobiliario del hogar, que mejore las áreas y espacios
                    familiares haciendo de ellos lugares confortables.</p>
            </div>

            <div class="col-12 col-md-5 my-3 shadow-lg rounded bg-light">
                <div class="text-center rounded-pill bg-warning mx-auto icon-container mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path
                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                </div>
                <h3 class="bg-primario text-white rounded fw-bold fs-2 text-center p-2">Vision</h3>
                <p class="text-center fs-3 mt-2">Cimentar el desarrollo comercial de la empresa Muebles Di-Ro en la red de
                    internet así como en el ramo mueblero, ofrecer siempre productos y servicios de calidad a nuestros
                    clientes.</p>
            </div>

            <div class="col-12 my-3">
                <h3 class="bg-cuaternario text-white rounded fw-bold fs-3 text-center p-2">Contacto</h3>

                <div id="contacto">
                    <div class="row w-100 align-items-start">
                        <div class="col-12 text-md-start text-center mt-2">
                            <div class="d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                                <span class="text-secondary fs-4 fw-bold">muebles.Di_Ro@gmail.com</span>
                            </div>

                            <div class="d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z" />
                                </svg>
                                <span class="text-secondary fs-4 fw-bold">+52 722 223 8363</span>
                            </div>

                            <div class="d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                <span class="text-secondary fs-4 fw-bold">722 616 8986</span>
                            </div>

                            <div class="d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z" />
                                </svg>
                                <span class="text-secondary fs-4 fw-bold">Emiliano Zapata #12, Col. El Panteón Lerma,
                                    Estado de México, México</span>
                            </div>

                        </div>
                    </div>
                    <div class="row w-100">
                        <div class="col-12 overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d665.7185595034094!2d-99.50705207346032!3d19.287894302870548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cdf50ed42decad%3A0xc9a8a5a6e0d5ed75!2sEmiliano%20Zapata%2012%2C%20El%20pante%C3%B3n%2C%2052005%20Lerma%20de%20Villada%2C%20M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v1655443799466!5m2!1ses-419!2smx"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                {{-- Mapa de Google Maps --}}
            </div>
        </div>
    </div>
@endsection
