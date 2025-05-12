@extends('sipork::layouts.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <title>Dashboard Admin</title>
    </head>
    <style>
        body {
            color: rgb(15, 84, 153);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            padding-left: 5%;
            background: url('{{ asset('images/admin7.jpg') }}') no-repeat center center fixed;
            opacity: 0.9;
            background-size: cover;
        }

        .welcome-card {
            background: linear-gradient(to bottom, #fff2f2, #ffe6e6);
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            max-width: 800px;
            margin: 4rem auto;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .welcome-card:hover {
            transform: translateY(-5px);
        }

        .welcome-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a3c5e;
            margin-bottom: 1rem;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 600px;
            margin: 0 auto 1.5rem;
        }

        .welcome-badge {
            font-size: 1rem;
            padding: 0.5rem 1.25rem;
            border-radius: 20px;
            background: #28a745;
            color: white;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .quick-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .quick-link-btn {
            background: #1a3c5e;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .quick-link-btn:hover {
            background: #152e47;
            transform: translateY(-2px);
        }

        .icon-prefix {
            margin-right: 0.5rem;
        }

        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }

            .welcome-card {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }

            .welcome-title {
                font-size: 1.75rem;
            }

            .welcome-subtitle {
                font-size: 1rem;
            }

            .quick-links {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>

    <body>
    </body>

    </html>

    <br><br><br>

    <section class="container my-5 ">
        <div class="welcome-card animate__animated animate__slideInUp">
            <h1 class="welcome-title">Bienvenido  Administrator</h1>
            <p class="welcome-subtitle">
                Tome el control de las operaciones de su granja con SIPORK. Acceda a funciones clave para gestionar cerdos,
                inventario y más fácilmente.
            </p>
            <div>
                <span class="welcome-badge">{!! config('sipork.name') !!}</span>
            </div>
            <div class="quick-links">
                <a href="" class="btn quick-link-btn">
                    <i class="fas fa-piggy-bank icon-prefix"></i>Pig Management
                </a>
                <a href="" class="btn quick-link-btn">
                    <i class="fas fa-warehouse icon-prefix"></i>Inventory
                </a>
                <a href="" class="btn quick-link-btn">
                    <i class="fas fa-chart-line icon-prefix"></i>Reports
                </a>
            </div>
        </div>

        <!-- Nueva sección: Información adicional sobre la unidad -->
        <section class="py-10 px-6 bg-gray-900 bg-opacity-75">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Tarjeta izquierda: imagen representativa -->
            <div class="overflow-hidden rounded-2xl shadow-lg">
                <img src="{{ asset('images/admin6.jpg') }}" alt="Unidad Porcina"
                class="w-full h-72 object-cover transition-transform duration-300 hover:scale-105">
            </div>

            <!-- Tarjeta derecha: contenido informativo -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-4xl font-extrabold mb-6 text-green-600">Estadísticas Inteligentes</h2>
                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                Visualiza indicadores clave como tasas de conversión alimenticia, ganancia diaria de peso y más.
                Nuestra tecnología avanzada te permite tomar decisiones informadas para optimizar tu producción.
                </p>
                <ul class="text-gray-700 list-disc pl-6 space-y-3">
                <li>Monitoreo en tiempo real de parámetros críticos.</li>
                <li>Reportes detallados para análisis de rendimiento.</li>
                <li>Integración con sistemas automatizados de alimentación.</li>
                <li>Foco en sostenibilidad y bienestar animal.</li>
                </ul>
            </div>
            </div>
        </section>
        </div>
    </section>
    </section>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.querySelector('.welcome-card');
            card.style.opacity = '0';
            setTimeout(() => {
                card.style.opacity = '1';
            }, 100);
        });
    </script>
@endsection
