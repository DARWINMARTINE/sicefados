@extends('sipork::layouts.master')

@section('title', 'Edit Environmental Condition')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Editar Condición Ambiental 
                    <small class="text-muted">#{{ $condition->id_condition }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.condiciones_ambientales.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-leaf"></i> Condiciones Ambientales
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Editar Condición
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
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="font-weight-bold m-0">
                            <i class="fas fa-edit"></i> Editar Detalles de la Condición Ambiental
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.admin.sipork.condiciones_ambientales.update', $condition->id_condition) }}">
                        @csrf
                        @method('PUT')
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
                                <!-- Fecha y hora -->
                                <div class="col-md-6 form-group">
                                    <label for="date_time" class="font-weight-bold">Fecha y hora <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="datetime-local" name="date_time" id="date_time" class="form-control @error('date_time') is-invalid @enderror" value="{{ old('date_time', $condition->date_time->format('Y-m-d\TH:i')) }}" required>
                                    </div>
                                    @error('date_time')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Temperatura -->
                                <div class="col-md-6 form-group">
                                    <label for="temperature" class="font-weight-bold">Temperatura</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-thermometer-half"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="temperature" id="temperature" class="form-control @error('temperature') is-invalid @enderror" value="{{ old('temperature', $condition->temperature) }}">
                                    </div>
                                    @error('temperature')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Humedad -->
                                <div class="col-md-6 form-group">
                                    <label for="humidity" class="font-weight-bold">Humedad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-tint"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="humidity" id="humidity" class="form-control @error('humidity') is-invalid @enderror" value="{{ old('humidity', $condition->humidity) }}">
                                    </div>
                                    @error('humidity')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Ventilación -->
                                <div class="col-md-6 form-group">
                                    <label for="ventilation" class="font-weight-bold">Ventilación</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-wind"></i></span>
                                        </div>
                                        <input type="text" name="ventilation" id="ventilation" class="form-control @error('ventilation') is-invalid @enderror" value="{{ old('ventilation', $condition->ventilation) }}">
                                    </div>
                                    @error('ventilation')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lote -->
                                <div class="col-md-6 form-group">
                                    <label for="lot_id" class="font-weight-bold">Lote <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                                            <option value="" disabled>Seleccionar lote</option>
                                            @foreach ($lots as $lot)
                                                <option value="{{ $lot->id_lot }}" {{ old('lot_id', $condition->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                                                    {{ $lot->lot_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lot_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.condiciones_ambientales.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Edit Environmental Condition Page Loaded');
    </script>
@stop