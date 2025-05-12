<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Unidad Porcina - SIPORK</title>
    <link rel="icon" href="{{ asset('images/Favicon2.png') }}" type="image/x-icon">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fuente profesional -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        #background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 44;
        }
    </style>
</head>
<body class="text-white">

<!-- Fondo con video -->
<video autoplay muted loop id="background-video" playsinline>
    <source src="{{ asset('images/porcina.mp4') }}" type="video/mp4">
    Tu navegador no soporta el video.
</video>

<!-- Navbar -->
<nav class="fixed top-0 w-full z-50 bg-black/20 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <a href="#" class="flex items-center text-white font-bold text-2xl tracking-tight">
            <img src="{{ asset('images/sipork.png') }}" alt="SIPORK" class="w-9 h-9 mr-3">
            SIPORK
        </a>
        <div class="hidden md:flex space-x-6 text-sm font-semibold">
            @auth
                @if(checkRol('sipork.admin'))
                    <a href="{{ route('sipork.admin.welcome') }}" class="hover:text-green-400 transition">Administrador</a>
                @endif
                @if(checkRol('sipork.liderDeUnidad'))
                    <a href="{{ route('sipork.liderDeUnidad.panelLider') }}" class="hover:text-green-400 transition">Líder de Unidad</a>
                @endif
                @if(checkRol('sipork.aprendiz'))
                    <a href="{{ route('sipork.aprendiz.panelAprendiz') }}" class="hover:text-green-400 transition">Aprendiz</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

   <!-- Contenido principal -->
   <main class="flex items-center justify-center min-h-screen px-6 pt-24 text-center">
    <div class="space-y-8 max-w-3xl">
        <h1 class="text-5xl md:text-6xl font-extrabold leading-tight drop-shadow-[0_3px_6px_rgba(0,0,0,0.7)]">
            Bienvenido a <span class="text-green-400">SIPORK</span>
        </h1>
        <p class="text-xl md:text-2xl text-white/90 font-light drop-shadow-[0_2px_4px_rgba(0,0,0,0.5)] leading-relaxed">
            Una plataforma profesional para la gestión estratégica de tu unidad porcina.
            Control total, monitoreo inteligente y toma de decisiones basada en datos reales.
        </p>
        @guest
            <a href="{{ route('login') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-full transition-all duration-300 shadow-lg text-lg">
                Iniciar Sesión
            </a>
        @else
            <a href="{{ url('/') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-full transition-all duration-300 shadow-lg text-lg">
                Ir al Panel
            </a>
        @endguest
    </div>
</main>

<!-- Secciones intercaladas -->
<!-- Sección 1 -->
<section class="py-10 px-6 bg-black/0 backdrop-blur-md">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <img src="{{ asset('images/cerdo1.jpg') }}" alt="Gestión porcina"
             class="w-full md:w-1/2 h-72 object-cover rounded-2xl shadow-lg transition-transform duration-300 hover:scale-105 active:scale-110">
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4 text-green-400">Gestión Eficiente</h2>
            <p class="text-white/90 text-lg leading-relaxed">
                Administra cada módulo de tu unidad porcina: desde la reproducción hasta el engorde...
            </p>
        </div>
    </div>
</section>

<!-- Sección 2 -->
<section class="py-10 px-6 bg-black/50 backdrop-blur-md">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row-reverse items-center gap-12">
        <img src="{{ asset('images/cerdo2.jpg') }}" alt="Estadísticas"
             class="w-full md:w-1/2 h-72 object-cover rounded-2xl shadow-lg transition-transform duration-300 hover:scale-105 active:scale-110">
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4 text-green-400">Estadísticas Inteligentes</h2>
            <p class="text-white/90 text-lg leading-relaxed">
                Visualiza indicadores clave como tasas de conversión alimenticia, ganancia diaria de peso...
            </p>
        </div>
    </div>
</section>

<!-- Sección 3 -->
<section class="py-10 px-6 bg-black/0 backdrop-blur-md">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <img src="{{ asset('images/cerdo3.jpg') }}" alt="Gestión porcina"
             class="w-full md:w-1/2 h-72 object-cover rounded-2xl shadow-lg transition-transform duration-300 hover:scale-105 active:scale-110">
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4 text-green-400">Control de Actividades</h2>
            <p class="text-white/90 text-lg leading-relaxed">
                Organiza tareas diarias como alimentación, limpieza, vacunación y registros reproductivos...
            </p>
        </div>
    </div>
</section>

<!-- Sección 4 -->
<section class="py-10 px-6 bg-black/50 backdrop-blur-md">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row-reverse items-center gap-12">
        <img src="{{ asset('images/cerdo4.jpg') }}" alt="Estadísticas"
             class="w-full md:w-1/2 h-72 object-cover rounded-2xl shadow-lg transition-transform duration-300 hover:scale-105 active:scale-110">
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold mb-4 text-green-400">Alertas y Seguimiento</h2>
            <p class="text-white/90 text-lg leading-relaxed">
                Detecta variaciones críticas como caídas de consumo o aumento de mortalidad...
            </p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-black/20 backdrop-blur-md py-4 text-sm text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6">
        <div class="mb-2 md:mb-0">
            <strong>© 2023-2025 <a href="#" class="text-green-400 underline hover:text-green-300">SIPORK</a></strong> — Todos los derechos reservados.
        </div>
        <div class="font-semibold">Versión 3.2.0</div>
    </div>
</footer>

</body>
</html>