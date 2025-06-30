@extends('sipork::layouts.master')

@section('title', 'Add Report')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-alt"></i> Agregar Reporte
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
                            <a href="{{ route('sipork.admin.sipork.reportes.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-file-alt"></i> Reportes
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-plus"></i> Agregar Reporte
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
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="font-weight-bold m-0">
                            <i class="fas fa-file-alt"></i> Formulario de Registro de Reporte
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.admin.sipork.reportes.store') }}">
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
                                <!-- Tipo de reporte -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-file-alt"></i></span>
                                        </div>
                                        <input type="text" name="report_type" id="report_type" class="form-control @error('report_type') is-invalid @enderror" value="{{ old('report_type') }}" required placeholder=" ">
                                        <label for="report_type" class="floating-label">Tipo de reporte <span class="text-danger">*</span></label>
                                    </div>
                                    @error('report_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Fecha del informe -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="report_date" id="report_date" class="form-control @error('report_date') is-invalid @enderror" value="{{ old('report_date') }}" required placeholder=" ">
                                        <label for="report_date" class="floating-label">Fecha del informe <span class="text-danger">*</span></label>
                                    </div>
                                    @error('report_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-12 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder=" ">{{ old('description') }}</textarea>
                                        <label for="description" class="floating-label">Descripción</label>
                                    </div>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lote -->
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror">
                                            <option value="" disabled selected>Seleccionar lote (Opcional)</option>
                                            @foreach ($lots as $lot)
                                                <option value="{{ $lot->id_lot }}" {{ old('lot_id') == $lot->id_lot ? 'selected' : '' }}>
                                                    {{ $lot->lot_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="lot_id" class="floating-label">Lote</label>
                                    </div>
                                    @error('lot_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.reportes.index') }}" class="btn btn-secondary mr-2">
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
    .card {
        border-radius: 15px;
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
        left: 2.5rem; /* Ajustado para alinearse con el input-group-prepend */
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
        .card {
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
        console.log('Create Report Page Loaded');
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
    </script>
@stop