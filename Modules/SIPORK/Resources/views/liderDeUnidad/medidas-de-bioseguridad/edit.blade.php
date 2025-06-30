@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Editar Medida de Bioseguridad')

@section('content_header')
<h1>Editar Medida de Bioseguridad</h1>
@stop

@section('content')
<br><br><br>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-shield-virus"></i> Editar Medida
                    <small class="text-muted">#{{ $measure->id_biosecurity }}</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded shadow-sm float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-primary font-weight-bold">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-shield-alt"></i> Medidas
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Editar
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
                            <i class="fas fa-edit"></i> Editar Detalles de la Medida de Bioseguridad
                        </h5>
                    </div>

                    <form method="POST" action="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.update', $measure->id_biosecurity) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <!-- Tipo de Medida -->
                                <div class="col-md-6 form-group">
                                    <label for="measure_type" class="font-weight-bold">Tipo de Medida <span class="text-danger">*</span></label>
                                    <input type="text" name="measure_type" id="measure_type" class="form-control @error('measure_type') is-invalid @enderror" value="{{ old('measure_type', $measure->measure_type) }}" required>
                                    @error('measure_type')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Fecha de Implementación -->
                                <div class="col-md-6 form-group">
                                    <label for="implementation_date" class="font-weight-bold">Fecha de Implementación <span class="text-danger">*</span></label>
                                    <input type="date" name="implementation_date" id="implementation_date" class="form-control @error('implementation_date') is-invalid @enderror" value="{{ old('implementation_date', $measure->implementation_date) }}" required>
                                    @error('implementation_date')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-12 form-group">
                                    <label for="description" class="font-weight-bold">Descripción</label>
                                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $measure->description) }}</textarea>
                                    @error('description')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Costo -->
                                <div class="col-md-6 form-group">
                                    <label for="cost_id" class="font-weight-bold">Costo</label>
                                    <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror">
                                        <option value="">Seleccionar Costo</option>
                                        @foreach ($costs as $cost)
                                        <option value="{{ $cost->id_cost }}" {{ old('cost_id', $measure->cost_id) == $cost->id_cost ? 'selected' : '' }}>
                                            {{ $cost->cost_type }} - ${{ $cost->amount }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('cost_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lote -->
                                <div class="col-md-6 form-group">
                                    <label for="lot_id" class="font-weight-bold">Lote <span class="text-danger">*</span></label>
                                    <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                                        <option value="">Seleccionar Lote</option>
                                        @foreach ($lots as $lot)
                                        <option value="{{ $lot->id_lot }}" {{ old('lot_id', $measure->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                                            {{ $lot->lot_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('lot_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar medida
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Edit Biosecurity Measure Page Loaded');
</script>
@stop
