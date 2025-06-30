@extends('sipork::layouts.master')

@section('title', 'Add Biosecurity Measure')

@section('content')
<br><br><br><br>
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
                        <h3 class="card-title mb-0">Agregar Medida de Bioseguridad</h3>
                    </div>
                    <form method="POST" action="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.store') }}">
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
                                <!-- Tipo de medida -->
                                <div class="col-md-6 form-group">
                                    <input type="text" name="measure_type" id="measure_type" class="form-control @error('measure_type') is-invalid @enderror" value="{{ old('measure_type') }}" required placeholder=" ">
                                    <label for="measure_type" class="floating-label">Tipo de medida <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-shield-alt"></i></span>
                                    @error('measure_type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Fecha de implementación -->
                                <div class="col-md-6 form-group">
                                    <input type="date" name="implementation_date" id="implementation_date" class="form-control @error('implementation_date') is-invalid @enderror" value="{{ old('implementation_date') }}" required placeholder=" ">
                                    <label for="implementation_date" class="floating-label">Fecha de implementación <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-calendar-alt"></i></span>
                                    @error('implementation_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-12 form-group">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder=" ">{{ old('description') }}</textarea>
                                    <label for="description" class="floating-label">Descripción</label>
                                    <span class="form-icon"><i class="fas fa-align-left"></i></span>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Costo -->
                                <div class="col-md-6 form-group">
                                    <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror">
                                        <option value="" disabled selected>Seleccionar costo</option>
                                        @foreach ($costs as $cost)
                                            <option value="{{ $cost->id_cost }}" {{ old('cost_id') == $cost->id_cost ? 'selected' : '' }}>
                                                {{ $cost->id_cost }} ({{ $cost->cost_type }} - {{ $cost->amount }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="cost_id" class="floating-label">Costo</label>
                                    <span class="form-icon"><i class="fas fa-dollar-sign"></i></span>
                                    @error('cost_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lote -->
                                <div class="col-md-6 form-group">
                                    <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Seleccionar lote</option>
                                        @foreach ($lots as $lot)
                                            <option value="{{ $lot->id_lot }}" {{ old('lot_id') == $lot->id_lot ? 'selected' : '' }}>
                                                {{ $lot->lot_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="lot_id" class="floating-label">Lote <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-layer-group"></i></span>
                                    @error('lot_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</center>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@stop

@section('js')
<script>
    // Ensure floating labels work for pre-filled inputs and selects
    document.querySelectorAll('input, select, textarea').forEach(input => {
        if (input.value) {
            input.nextElementSibling.classList.add('active');
        }
        input.addEventListener('input', () => {
            if (input.value) {
                input.nextElementSibling.classList.add('active');
            } else {
                input.nextElementSibling.classList.remove('active');
            }
        });
    });
    console.log('Create Biosecurity Measure Page Loaded');
</script>
@stop