@extends('sipork::layouts.masterAprendiz')

@section('title', 'Add Supply Feeding')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-utensils"></i> Agregar Insumo Alimenticio
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded shadow-sm float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="" class="text-primary font-weight-bold">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Insumos Alimenticios
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-plus"></i> Agregar Insumo Alimenticio
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h3 class="card-title mb-0">Formulario de Registro de Insumo Alimenticio</h3>
                    </div>
                    <form method="POST" action="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.store') }}">
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
                                <!-- Feeding Event -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-utensils"></i></span>
                                        </div>
                                        <select name="feeding_id" id="feeding_id" class="form-control @error('feeding_id') is-invalid @enderror" required>
                                            <option value="" disabled selected>Seleccionar Evento de Alimentación</option>
                                            @foreach ($feedings as $feeding)
                                                <option value="{{ $feeding->id_feeding }}" {{ old('feeding_id') == $feeding->id_feeding ? 'selected' : '' }}>
                                                    {{ $feeding->id_feeding }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('feeding_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Supply -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-box"></i></span>
                                        </div>
                                        <select name="supply_id" id="supply_id" class="form-control @error('supply_id') is-invalid @enderror" required>
                                            <option value="" disabled selected>Seleccionar Insumo</option>
                                            @foreach ($supplies as $supply)
                                                <option value="{{ $supply->id_supply }}" {{ old('supply_id') == $supply->id_supply ? 'selected' : '' }}>
                                                    {{ $supply->id_supply }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('supply_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity Used -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-balance-scale"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="quantity_used" id="quantity_used" class="form-control @error('quantity_used') is-invalid @enderror" value="{{ old('quantity_used') }}" required placeholder=" ">
                                        <label for="quantity_used" class="floating-label">Cantidad Usada <span class="text-danger">*</span></label>
                                    </div>
                                    @error('quantity_used')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Usage Date -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="usage_date" id="usage_date" class="form-control @error('usage_date') is-invalid @enderror" value="{{ old('usage_date') }}" required placeholder=" ">
                                        <label for="usage_date" class="floating-label">Fecha de Uso <span class="text-danger">*</span></label>
                                    </div>
                                    @error('usage_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

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
        left: 2.5rem;
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
    @media (max-width: 768px) {
        .form-card {
            box-shadow: none;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
    }
</style>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@stop

@section('js')
    <script>
        console.log('Create Supply Feeding Page Loaded');
        // Ensure floating labels work for pre-filled inputs and selects
        document.querySelectorAll('input, select').forEach(input => {
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
    </script>
@stop