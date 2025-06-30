@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Agregar Medida de Bioseguridad')

@section('content_header')
    <h1 class="text-center">Agregar Medida de Bioseguridad</h1>
@stop

@section('content')
<br><br><br><br>

<style>
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
    .btn-primary, .btn-secondary {
        border-radius: 8px;
        padding: 0.75rem 2rem;
        transition: transform 0.2s ease;
    }
    .btn-primary:hover, .btn-secondary:hover {
        transform: translateY(-2px);
    }
    .form-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Formulario de Medida de Bioseguridad</h3>
                    </div>

                    <form method="POST" action="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.store') }}">
                        @csrf
                        <div class="card-body">
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
                                    <span class="form-icon"><i class="fas fa-calendar-check"></i></span>
                                    @error('implementation_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-12 form-group">
                                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder=" ">{{ old('description') }}</textarea>
                                    <label for="description" class="floating-label">Descripción</label>
                                    <span class="form-icon"><i class="fas fa-align-left"></i></span>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Costo -->
                                <div class="col-md-6 form-group">
                                    <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror" placeholder=" ">
                                        <option value="">Seleccionar Costo</option>
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
                                        <option value="">Seleccionar Lote</option>
                                        @foreach ($lots as $lot)
                                            <option value="{{ $lot->id_lot }}" {{ old('lot_id') == $lot->id_lot ? 'selected' : '' }}>
                                                {{ $lot->lot_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="lot_id" class="floating-label">Lote <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-th-list"></i></span>
                                    @error('lot_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index') }}" class="btn btn-secondary mr-2">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('js')
<script>
    // Activar floating label en selects ya seleccionados
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
