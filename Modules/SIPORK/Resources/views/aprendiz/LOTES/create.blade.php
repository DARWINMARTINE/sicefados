@extends('sipork::layouts.masterAprendiz')

@section('title', 'Create Lot')

@section('content_header')
    <h1 class="text-center font-weight-bold mb-4">Crear Lote</h1>
@stop

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4 class="mb-0"><i class="fas fa-layer-group mr-2"></i> Nuevo Lote</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('sipork.aprendiz.sipork.LOTES.store') }}">
                        @csrf

                        <div class="form-group position-relative mb-4">
                            <label for="lot_name" class="font-weight-bold">Nombre del Lote <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-tag"></i></span>
                                </div>
                                <input type="text" name="lot_name" id="lot_name" class="form-control @error('lot_name') is-invalid @enderror" value="{{ old('lot_name') }}" required>
                            </div>
                            @error('lot_name')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group position-relative mb-4">
                            <label for="creation_date" class="font-weight-bold">Fecha de Creación <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="creation_date" id="creation_date" class="form-control @error('creation_date') is-invalid @enderror" value="{{ old('creation_date') }}" required>
                            </div>
                            @error('creation_date')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group position-relative mb-4">
                            <label for="status" class="font-weight-bold">Estado <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-toggle-on"></i></span>
                                </div>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="">Seleccione Estado</option>
                                    <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                            @error('status')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.LOTES.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Crear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .card {
            border-radius: 1rem;
        }
        .input-group-text {
            border-radius: .5rem 0 0 .5rem;
        }
        .form-control:focus {
            box-shadow: 0 0 8px #007bff33;
            border-color: #007bff;
        }
        .btn-primary, .btn-secondary {
            border-radius: .5rem;
        }
    </style>
@stop

@section('js')
    <script>
        // Puedes agregar validaciones o animaciones aquí si lo deseas
        console.log('Create Lot Page Loaded');
    </script>
@stop