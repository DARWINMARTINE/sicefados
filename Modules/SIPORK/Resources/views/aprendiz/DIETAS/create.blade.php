@extends('sipork::layouts.masterAprendiz')

@section('title', 'Add Diet')

@section('content_header')
    <h1>Add Diet</h1>
@stop

@section('content')
<br><br><br>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        min-height: 100vh;
        padding-left: 14%;
        background-color: #f4f4f4;
    }
    .form-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .form-card .card-header {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 1.5rem;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }
    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
    }
    .floating-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
        color: #6c757d;
        transition: all 0.2s ease;
        pointer-events: none;
    }
    .form-control:not(:placeholder-shown) + .floating-label,
    .form-control:focus + .floating-label {
        top: 0;
        font-size: 0.85rem;
        color: #007bff;
        background: white;
        padding: 0 0.2rem;
    }
    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }
    .btn-primary {
        background: #007bff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }
    .btn-secondary {
        border-radius: 8px;
        padding: 0.75rem 2rem;
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .btn-secondary:hover {
        transform: translateY(-2px);
    }
    .form-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    @media (max-width: 768px) {
        body {
            padding: 1rem;
        }
        .form-card {
            box-shadow: none;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
    }
</style>

<center>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Add Diet</h3>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.DIETAS.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <!-- Diet Name -->
                                <div class="col-md-6 form-group">
                                    <input type="text" name="diet_name" id="diet_name" class="form-control @error('diet_name') is-invalid @enderror" value="{{ old('diet_name') }}" required placeholder=" ">
                                    <label for="diet_name" class="floating-label">Nombre de la dieta <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-utensils"></i></span>
                                    @error('diet_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Min Age -->
                                <div class="col-md-6 form-group">
                                    <input type="number" name="min_age" id="min_age" class="form-control @error('min_age') is-invalid @enderror" value="{{ old('min_age') }}" placeholder=" ">
                                    <label for="min_age" class="floating-label">Edad mínima</label>
                                    <span class="form-icon"><i class="fas fa-child"></i></span>
                                    @error('min_age')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Max Age -->
                                <div class="col-md-6 form-group">
                                    <input type="number" name="max_age" id="max_age" class="form-control @error('max_age') is-invalid @enderror" value="{{ old('max_age') }}" placeholder=" ">
                                    <label for="max_age" class="floating-label">Edad máxima</label>
                                    <span class="form-icon"><i class="fas fa-child"></i></span>
                                    @error('max_age')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Min Weight -->
                                <div class="col-md-6 form-group">
                                    <input type="number" step="0.01" name="min_weight" id="min_weight" class="form-control @error('min_weight') is-invalid @enderror" value="{{ old('min_weight') }}" placeholder=" ">
                                    <label for="min_weight" class="floating-label">Peso mínimo</label>
                                    <span class="form-icon"><i class="fas fa-weight"></i></span>
                                    @error('min_weight')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Max Weight -->
                                <div class="col-md-6 form-group">
                                    <input type="number" step="0.01" name="max_weight" id="max_weight" class="form-control @error('max_weight') is-invalid @enderror" value="{{ old('max_weight') }}" placeholder=" ">
                                    <label for="max_weight" class="floating-label">Peso máximo</label>
                                    <span class="form-icon"><i class="fas fa-weight"></i></span>
                                    @error('max_weight')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Physiological State -->
                                <div class="col-md-6 form-group">
                                    <input type="text" name="physiological_state" id="physiological_state" class="form-control @error('physiological_state') is-invalid @enderror" value="{{ old('physiological_state') }}" placeholder=" ">
                                    <label for="physiological_state" class="floating-label">Estado fisiológico</label>
                                    <span class="form-icon"><i class="fas fa-heartbeat"></i></span>
                                    @error('physiological_state')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 form-group">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder=" ">{{ old('description') }}</textarea>
                                    <label for="description" class="floating-label">Descripción</label>
                                    <span class="form-icon"><i class="fas fa-sticky-note"></i></span>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.DIETAS.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</center>

@section('scripts')
<script>
    document.querySelectorAll('select').forEach(select => {
        if (select.value) {
            select.nextElementSibling.classList.add('active');
        }
        select.addEventListener('change', () => {
            if (select.value) {
                select.nextElementSibling.classList.add('active');
            } else {
                select.nextElementSibling.classList.remove('active');
            }
        });
    });
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Diet Page Loaded'); </script>
@stop
@endsection