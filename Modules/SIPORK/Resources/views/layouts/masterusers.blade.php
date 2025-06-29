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
    <div class="flex items-center">
      <a href="#" class="flex items-center text-white font-bold text-2xl tracking-tight">
        <img src="{{ asset('images/sipork.png') }}" alt="SIPORK" class="w-9 h-9 mr-3">
        SIPORK
      </a>
      <a href="{{ route('sipork.desarrolladores') }}" class="ml-4 hover:text-green-400 transition text-base font-normal flex items-center">
        <!-- Icono de usuario/desarrollador -->
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-8 0v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
        </svg>
        Desarrolladores
      </a>
    </div>
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
<br><br><br><br><br><br><br>


<footer class="bg-green-900 text-green-100">
    <!-- Mapa -->
    <div class="w-full h-96">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.2237987706496!2d-75.3637138!3d2.6132906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b3f4b1c54ddc5%3A0x6a0d5a458d5d190d!2sCentro%20de%20Formaci%C3%B3n%20Agroindustrial%20La%20Angostura!5e0!3m2!1ses!2sco!4v1715222177168!5m2!1ses!2sco"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="w-full h-full">
      </iframe>
    </div>

    <!-- Info -->
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 border-t border-gray-700">
      <!-- Sobre -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Sobre Nosotros</h3>
        <p class="text-gray-400 text-sm">
          Centro de Formación Agroindustrial La Angostura – SENA. Comprometidos con la formación integral para el desarrollo agroindustrial del país.
        </p>
      </div>

      {{-- <!-- Enlaces -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Enlaces Rápidos</h3>
        <ul class="text-gray-400 text-sm space-y-2">
          <li><a href="#" class="hover:text-white transition">Inicio</a></li>
          <li><a href="#" class="hover:text-white transition">Programas</a></li>
          <li><a href="#" class="hover:text-white transition">Contacto</a></li>
          <li><a href="#" class="hover:text-white transition">Términos y Condiciones</a></li>
        </ul>
      </div> --}}


    <!-- Redes -->
    <div>
        <h3 class="text-xl font-semibold mb-4">Síguenos</h3>
        <div class="flex space-x-4">
          <!-- Facebook -->
          <a href="https://www.facebook.com/share/1Dt2viGR4v/" class="text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.675 0H1.325C.6 0 0 .6 0 1.326v21.348C0 23.4.6 24 1.326 24h11.495V14.706h-3.13v-3.622h3.13V8.413c0-3.1 1.894-4.788 4.66-4.788 1.325 0 2.463.098 2.794.142v3.24l-1.917.001c-1.504 0-1.794.715-1.794 1.763v2.312h3.587l-.467 3.622h-3.12V24h6.116C23.4 24 24 23.4 24 22.674V1.326C24 .6 23.4 0 22.675 0z"/>
            </svg>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/cefa_angostura?igsh=Y2gwbng3MGYwb25l" class="text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.33 3.608 1.304.975.974 1.242 2.242 1.305 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.33 2.633-1.305 3.608-.974.975-2.242 1.242-3.608 1.305-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.33-3.608-1.305-.975-.974-1.242-2.242-1.305-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.33-2.633 1.305-3.608C4.517 2.493 5.784 2.226 7.15 2.163c1.266-.058 1.646-.07 4.85-.07zm0-2.163C8.741 0 8.332.012 7.052.07 5.697.129 4.417.391 3.293 1.515 2.169 2.639 1.907 3.919 1.848 5.274.79 6.552.778 6.962.778 12c0 5.038.012 5.448.07 6.726.059 1.355.321 2.635 1.445 3.759 1.124 1.124 2.404 1.386 3.759 1.445 1.278.058 1.687.07 6.726.07s5.448-.012 6.726-.07c1.355-.059 2.635-.321 3.759-1.445 1.124-1.124 1.386-2.404 1.445-3.759.058-1.278.07-1.687.07-6.726s-.012-5.448-.07-6.726c-.059-1.355-.321-2.635-1.445-3.759C20.635.391 19.355.129 18 .07 16.722.012 16.313 0 12 0z"/>
              <path d="M12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zM18.406 4.594a1.44 1.44 0 1 0 0 2.879 1.44 1.44 0 0 0 0-2.879z"/>
            </svg>
          </a>

          {{-- <!-- TikTok -->
          <a href="#" class="text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M16.5 1.5H13.5V14.25C13.5 16.3211 11.8211 18 9.75 18C7.67893 18 6 16.3211 6 14.25C6 12.1789 7.67893 10.5 9.75 10.5C10.2361 10.5 10.6939 10.6053 11.1015 10.7978V7.65318C10.7235 7.58249 10.337 7.54688 9.94531 7.54688C6.85362 7.54688 4.3125 10.088 4.3125 13.1797C4.3125 16.2714 6.85362 18.8125 9.94531 18.8125C13.037 18.8125 15.5781 16.2714 15.5781 13.1797V6.8025C16.0733 7.0986 16.6194 7.30728 17.1995 7.41562C17.7776 7.52408 18.3719 7.53089 18.9492 7.43594V4.48125C18.2635 4.52988 17.5793 4.42789 16.9375 4.18125C16.2961 3.93483 15.7111 3.54774 15.2188 3.04688C14.7263 2.54584 14.3361 1.94777 14.0709 1.29375H16.5V1.5Z"/>
            </svg>
          </a> --}}

          <!-- X (Twitter) -->
          <a href="https://x.com/SENAComunica?t=hrAJagK-mGfI1n321dVquA&s=09" class="text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.254 0L13.768 9.073l10.646 14.927h-5.052L12.106 14.51 4.735 24H0l9.094-10.067L-.03 0h5.128l7.203 9.819L19.247 0z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Créditos -->
    <div class="bg-gray-800 text-center py-4 text-sm text-gray-400">
      © 2025 Centro de Formación Agroindustrial La Angostura – SENA. Todos los derechos reservados. version:3.2.0
    </div>
  </footer>
</body>
</html>
