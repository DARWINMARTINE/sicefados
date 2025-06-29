@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg shadow-sm mb-4" style="position:sticky;top:0;z-index:1050;background: linear-gradient(90deg, #ffb6c1 0%, #ffe4ec 100%); box-shadow: 0 4px 24px rgba(0,0,0,0.07); border-radius: 0 0 1.5rem 1.5rem;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="#" style="font-size:1.7rem; letter-spacing:2px; color:#d72660;">
            <img src="{{ asset('images/sipork.png') }}" alt="SIPORK" style="width:48px;height:48px;box-shadow:0 2px 8px rgba(215,38,96,0.15);border-radius:50%;" class="me-3 animate__animated animate__pulse animate__infinite">
            SIPORK
        </a>
        <div class="ms-auto">
            <a href="{{ route('cefa.sipork.index') }}" class="btn btn-gradient-pink px-4 py-2 fw-bold shadow-sm" style="border-radius:2rem; font-size:1.1rem;">
                <i class="fas fa-home me-2"></i>Inicio
            </a>
        </div>
    </div>
</nav>
<style>
    .btn-gradient-pink {
        background: linear-gradient(90deg, #d72660 0%, #ffb6c1 100%);
        color: #fff !important;
        border: none;
        transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
        box-shadow: 0 2px 8px rgba(215,38,96,0.10);
    }
    .btn-gradient-pink:hover, .btn-gradient-pink:focus {
        background: linear-gradient(90deg, #ffb6c1 0%, #d72660 100%);
        color: #fff !important;
        box-shadow: 0 4px 16px rgba(215,38,96,0.18);
        transform: translateY(-2px) scale(1.04);
    }
    .navbar-brand img {
        transition: transform 0.3s;
    }
    .navbar-brand:hover img {
        transform: rotate(-8deg) scale(1.08);
    }
</style>

<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold" style="letter-spacing:2px;">Equipo de Desarrollo SIPORK</h2>
    <div class="row justify-content-center g-4">
        <!-- Darwin Martinez -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <img src="{{ asset('images/gt4.jpg') }}" class="rounded-circle mb-3" alt="Darwin Martinez" style="width: 140px; height: 140px; object-fit: cover;">
                    <h5 class="card-title fw-bold">Darwin Martinez</h5>
                    <p class="text-pink mb-1">Desarrollador Líder</p>
                    <p class="card-text small">Responsable de la arquitectura y dirección técnica del proyecto SIPORK, asegurando calidad y eficiencia en cada entrega.</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="https://www.facebook.com/darwin.martinez.421597/" target="_blank" class="btn btn-outline-primary btn-sm" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/darwin_martinez1610/" target="_blank" class="btn btn-outline-danger btn-sm" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/DARWINMARTINE" target="_blank" class="btn btn-outline-dark btn-sm" title="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Juan David Ricaurte -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Juan+David+Ricaurte&background=0D8ABC&color=fff&size=128" class="rounded-circle mb-3" alt="Juan David Ricaurte">
                    <h5 class="card-title fw-bold">Juan David Ricaurte</h5>
                    <p class="text-pink mb-1">Desarrollador</p>
                    <p class="card-text small">Especialista en backend y optimización de procesos, contribuyendo a la robustez y escalabilidad del sistema.</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="https://facebook.com/juan.ricaurte" target="_blank" class="btn btn-outline-primary btn-sm" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/juan.ricaurte" target="_blank" class="btn btn-outline-danger btn-sm" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/juanricaurte" target="_blank" class="btn btn-outline-dark btn-sm" title="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cristian Mauricio Santos -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Cristian+Mauricio+Santos&background=0D8ABC&color=fff&size=128" class="rounded-circle mb-3" alt="Cristian Mauricio Santos">
                    <h5 class="card-title fw-bold">Cristian Mauricio Santos</h5>
                    <p class="text-pink mb-1">Desarrollador</p>
                    <p class="card-text small">Encargado de la integración de servicios y desarrollo de nuevas funcionalidades para el usuario final.</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="https://facebook.com/cristian.santos" target="_blank" class="btn btn-outline-primary btn-sm" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/cristian.santos" target="_blank" class="btn btn-outline-danger btn-sm" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/cristiansantos" target="_blank" class="btn btn-outline-dark btn-sm" title="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nicolle Andrea Ramirez -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Nicolle+Andrea+Ramirez&background=0D8ABC&color=fff&size=128" class="rounded-circle mb-3" alt="Nicolle Andrea Ramirez">
                    <h5 class="card-title fw-bold">Nicolle Andrea Ramirez</h5>
                    <p class="text-pink mb-1">Desarrolladora</p>
                    <p class="card-text small">Responsable del diseño de interfaces y experiencia de usuario, aportando creatividad y usabilidad al proyecto.</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="https://facebook.com/nicolle.ramirez" target="_blank" class="btn btn-outline-primary btn-sm" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/nicolle.ramirez" target="_blank" class="btn btn-outline-danger btn-sm" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/nicolleramirez" target="_blank" class="btn btn-outline-dark btn-sm" title="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jeifrey Camilo Castaño -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Jeifrey+Camilo+Castaño&background=0D8ABC&color=fff&size=128" class="rounded-circle mb-3" alt="Jeifrey Camilo Castaño">
                    <h5 class="card-title fw-bold">Jeifrey Camilo Castaño</h5>
                    <p class="text-pink mb-1">Desarrollador</p>
                    <p class="card-text small">Enfocado en la calidad del código y pruebas, asegurando la estabilidad y confiabilidad del sistema.</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="https://facebook.com/jeifrey.castano" target="_blank" class="btn btn-outline-primary btn-sm" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/jeifrey.castano" target="_blank" class="btn btn-outline-danger btn-sm" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/jeifreycastano" target="_blank" class="btn btn-outline-dark btn-sm" title="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Credits Section -->
    <div class="mt-5">
        <h2 class="text-center mb-5 fw-bold" style="letter-spacing:2px;">Créditos y Herramientas</h2>
        <div class="row justify-content-center g-4">
            <div class="col-12 col-lg-10">
                <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-pink mb-4">Herramientas Utilizadas</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <i class="fab fa-laravel fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold">Laravel</h6>
                                        <p class="card-text small text-muted">Framework PHP para el backend y estructura del proyecto.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <i class="fab fa-bootstrap fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold">Bootstrap</h6>
                                        <p class="card-text small text-muted">Framework CSS para el diseño responsive y componentes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <i class="fab fa-php fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold">PHP</h6>
                                        <p class="card-text small text-muted">Lenguaje principal del backend del sistema.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <i class="fab fa-html5 fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold">HTML5</h6>
                                        <p class="card-text small text-muted">Estructura base de las interfaces del proyecto.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <i class="fab fa-css3-alt fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold">CSS3</h6>
                                        <p class="card-text small text-muted">Estilizado personalizado y animaciones.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 bg-light">
                                    <div class="card-body text-center p-4">
                                        <i class="fab fa-js fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold">JavaScript</h6>
                                        <p class="card-text small text-muted">Interactividad y lógica del frontend.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <p class="text-muted small">Ejemplo de uso de herramientas: <img src="{{ asset('images/tools-example.jpg') }}" alt="Herramientas en acción" style="max-width: 100%; height: auto; border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .text-pink {
        color: #d72660 !important;
    }
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    @media (max-width: 768px) {
        .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .card-body p {
            font-size: 0.9rem;
        }
    }
</style>